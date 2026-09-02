<?php

namespace App\Console\Commands;

use App\Models\Booking;
use App\Models\BookingFasilitas;
use App\Models\Jadwal;
use App\Models\MembershipPayment;
use App\Models\Pembayaran;
use App\Models\PointHistory;
use App\Models\Redemption;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class WipeCustomerData extends Command
{
    protected $signature   = 'db:wipe-customer-data';
    protected $description = 'Hapus seluruh data transaksi pelanggan beserta akun pelanggan dari database sistem BadmintonCRM';

    public function handle(): int
    {
        $this->info('Memulai pembersihan data transaksi dan akun pelanggan...');

        DB::beginTransaction();

        try {
            // 1. Ambil ID semua pelanggan
            $customerIds = User::where('role', 'pelanggan')->pluck('id')->toArray();

            // 2. Bersihkan tabel sesi login
            if (Schema::hasTable('sessions')) {
                if (!empty($customerIds)) {
                    DB::table('sessions')->whereIn('user_id', $customerIds)->delete();
                }
            }

            // 3. Hapus data transaksi turunan
            $deletedFasilitas = BookingFasilitas::query()->delete();
            $deletedPembayaran = Pembayaran::query()->delete();
            $deletedMembership = MembershipPayment::query()->delete();
            $deletedPointHistory = PointHistory::query()->delete();
            $deletedRedemptions = Redemption::query()->delete();
            $deletedVouchers = Voucher::query()->delete();

            // 4. Hapus data bookings
            $deletedBookings = Booking::query()->delete();

            // 5. Reset status jadwal kembali ke 'tersedia' (kecuali yang ditutup karena hari libur)
            $resetJadwal = Jadwal::whereIn('status', ['dipesan', 'terisi', 'pending'])
                ->update(['status' => 'tersedia']);

            // Bersihkan keterangan slot member jika ada
            Jadwal::where('keterangan', 'LIKE', 'Slot Member:%')
                ->update(['keterangan' => null]);

            // 6. Hapus akun pelanggan
            $deletedUsers = User::where('role', 'pelanggan')->delete();

            DB::commit();

            // 7. Bersihkan file storage terkait
            $this->cleanStorageFiles();

            $this->info('Pembersihan berhasil dilakukan!');
            $this->table(
                ['Tipe Data / Komponen', 'Jumlah Dihapus / Di-reset'],
                [
                    ['Akun Pelanggan (Users)', $deletedUsers],
                    ['Transaksi Booking', $deletedBookings],
                    ['Pembayaran Booking', $deletedPembayaran],
                    ['Booking Fasilitas', $deletedFasilitas],
                    ['Pembayaran Membership', $deletedMembership],
                    ['Histori Poin Loyalty', $deletedPointHistory],
                    ['Redemption / Penukaran Poin', $deletedRedemptions],
                    ['Voucher', $deletedVouchers],
                    ['Jadwal Di-reset ke Tersedia', $resetJadwal],
                ]
            );

            return Command::SUCCESS;
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->error('Gagal menghapus data: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }

    private function cleanStorageFiles(): void
    {
        try {
            $disk = Storage::disk('public');

            // Clear pembayaran receipts
            foreach ($disk->files('pembayaran') as $file) {
                if ($file !== '.gitignore') {
                    $disk->delete($file);
                }
            }

            // Clear membership payment receipts
            foreach ($disk->files('membership_payments') as $file) {
                if ($file !== '.gitignore') {
                    $disk->delete($file);
                }
            }

            // Clear customer profile photos
            foreach ($disk->files('profil') as $file) {
                if ($file !== '.gitignore') {
                    $disk->delete($file);
                }
            }
        } catch (\Throwable $e) {
            $this->warn('Catatan storage cleanup: ' . $e->getMessage());
        }
    }
}
