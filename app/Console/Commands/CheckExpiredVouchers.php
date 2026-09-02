<?php

namespace App\Console\Commands;

use App\Models\Voucher;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

/**
 * CheckExpiredVouchers
 *
 * Command untuk mengecek masa aktif voucher di tabel vouchers.
 * Jika expired_date <= NOW() dan status masih 'aktif', ubah menjadi 'kadaluwarsa'.
 *
 * Dijadwalkan: Setiap hari pukul 00:10 WIB
 * Command    : php artisan loyalty:check-expired-vouchers
 */
class CheckExpiredVouchers extends Command
{
    protected $signature   = 'loyalty:check-expired-vouchers';
    protected $description = 'Tandai voucher status keanggotaan dan voucher tukar poin yang sudah kadaluwarsa.';

    public function handle(): int
    {
        $this->info('Menjalankan pengecekan voucher kadaluwarsa...');
        $this->info('Waktu: ' . now()->translatedFormat('d F Y, H:i:s'));

        // 1. Proses Voucher Keanggotaan (Sapu Bersih)
        $expired = Voucher::where('status', 'aktif')
            ->whereNotNull('expired_date')
            ->where('expired_date', '<=', now())
            ->get(['id', 'voucher_code', 'tipe_voucher', 'user_id']);

        $count = $expired->count();
        if (!$expired->isEmpty()) {
            $this->warn("Ditemukan {$count} voucher status keanggotaan yang sudah melewati masa berlaku.");
            $expiredIds = $expired->pluck('id')->toArray();

            \Illuminate\Support\Facades\DB::transaction(function () use ($expiredIds) {
                Voucher::whereIn('id', $expiredIds)->update(['status' => 'kadaluwarsa']);
            });

            foreach ($expired as $voucher) {
                $this->line("  Voucher {$voucher->voucher_code} ({$voucher->tipe_voucher}) — User #{$voucher->user_id}");
            }
        } else {
            $this->info('Tidak ada voucher status keanggotaan yang perlu dikadaluwarsakan.');
        }

        // 2. Proses Voucher Redemption (Penukaran Poin)
        $expiredRedemptions = \App\Models\Redemption::where('status', 'aktif')
            ->whereNotNull('kode_expired_at')
            ->where('kode_expired_at', '<=', now())
            ->get(['id', 'kode_voucher', 'jenis_hadiah', 'user_id']);

        $redemptionCount = $expiredRedemptions->count();
        if (!$expiredRedemptions->isEmpty()) {
            $this->warn("Ditemukan {$redemptionCount} voucher redemption yang sudah melewati masa berlaku.");
            $redemptionIds = $expiredRedemptions->pluck('id')->toArray();

            \Illuminate\Support\Facades\DB::transaction(function () use ($redemptionIds) {
                \App\Models\Redemption::whereIn('id', $redemptionIds)->update(['status' => 'kadaluwarsa']);
            });

            foreach ($expiredRedemptions as $redemption) {
                $this->line("  Redemption {$redemption->kode_display} ({$redemption->jenis_hadiah}) — User #{$redemption->user_id}");
            }
        } else {
            $this->info('Tidak ada voucher redemption yang perlu dikadaluwarsakan.');
        }

        $this->info('');
        $this->info("{$count} voucher keanggotaan ditandai sebagai kadaluwarsa.");
        $this->info("{$redemptionCount} voucher redemption ditandai sebagai kadaluwarsa.");

        Log::info("[loyalty:check-expired-vouchers] Selesai. Vouchers: {$count}, Redemptions: {$redemptionCount} dikadaluwarsakan.");

        return self::SUCCESS;
    }
}
