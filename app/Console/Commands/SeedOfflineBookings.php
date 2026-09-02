<?php

namespace App\Console\Commands;

use App\Models\Booking;
use App\Models\Jadwal;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SeedOfflineBookings extends Command
{
    protected $signature   = 'db:seed-offline-bookings';
    protected $description = 'Import data pemesanan offline dari spreadsheet / jadwal fisik (Batch 1 s/d Batch 12 - Des 2025 s/d Mei 2026)';

    public function handle(): int
    {
        $this->info('Memulai penginputan data pemesanan offline (Batch 1 s/d Batch 12 - Des 2025 s/d Mei 2026)...');

        $data = [
            // ==========================================
            // BATCH 1: 02 DESEMBER - 07 DESEMBER 2025 (29 Transaksi)
            // ==========================================
            ['tanggal' => '2025-12-02', 'nama' => 'FIRMAN', 'jam_mulai' => '08:00:00', 'jam_selesai' => '11:00:00', 'lapangan_id' => 1, 'harga' => 150000],
            ['tanggal' => '2025-12-02', 'nama' => 'IKAA', 'jam_mulai' => '14:00:00', 'jam_selesai' => '16:00:00', 'lapangan_id' => 1, 'harga' => 100000],
            ['tanggal' => '2025-12-02', 'nama' => 'PB ROYAL', 'jam_mulai' => '19:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 2, 'harga' => 100000],
            ['tanggal' => '2025-12-02', 'nama' => 'ANIAH', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 3, 'harga' => 50000],

            ['tanggal' => '2025-12-03', 'nama' => 'PB UBK', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 100000],
            ['tanggal' => '2025-12-03', 'nama' => 'MABAR 13', 'jam_mulai' => '19:00:00', 'jam_selesai' => '22:00:00', 'lapangan_id' => 2, 'harga' => 150000],
            ['tanggal' => '2025-12-03', 'nama' => 'ARI', 'jam_mulai' => '18:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 50000],

            ['tanggal' => '2025-12-04', 'nama' => 'AHFA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 50000],
            ['tanggal' => '2025-12-04', 'nama' => 'BESSE', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 100000],
            ['tanggal' => '2025-12-04', 'nama' => 'SUARDI', 'jam_mulai' => '19:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 2, 'harga' => 100000],
            ['tanggal' => '2025-12-04', 'nama' => 'ALFATH', 'jam_mulai' => '20:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 3, 'harga' => 50000],

            ['tanggal' => '2025-12-05', 'nama' => 'FIKRI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 100000],
            ['tanggal' => '2025-12-05', 'nama' => 'ALFIKRI', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 2, 'harga' => 100000],
            ['tanggal' => '2025-12-05', 'nama' => 'AYU', 'jam_mulai' => '08:00:00', 'jam_selesai' => '16:00:00', 'lapangan_id' => 1, 'harga' => 400000],
            ['tanggal' => '2025-12-05', 'nama' => 'FIRMAN', 'jam_mulai' => '19:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 3, 'harga' => 100000],
            ['tanggal' => '2025-12-05', 'nama' => 'ALIM', 'jam_mulai' => '20:00:00', 'jam_selesai' => '22:00:00', 'lapangan_id' => 2, 'harga' => 100000],

            ['tanggal' => '2025-12-06', 'nama' => 'ALIF', 'jam_mulai' => '15:00:00', 'jam_selesai' => '16:00:00', 'lapangan_id' => 1, 'harga' => 50000],
            ['tanggal' => '2025-12-06', 'nama' => 'NYILO', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 100000],
            ['tanggal' => '2025-12-06', 'nama' => 'ALFATH', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 2, 'harga' => 50000],
            ['tanggal' => '2025-12-06', 'nama' => 'PB CERIA', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 2, 'harga' => 100000],
            ['tanggal' => '2025-12-06', 'nama' => 'PB ROYAL', 'jam_mulai' => '19:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 3, 'harga' => 100000],
            ['tanggal' => '2025-12-06', 'nama' => 'MAKMUR', 'jam_mulai' => '19:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 1, 'harga' => 100000],
            ['tanggal' => '2025-12-06', 'nama' => 'FAIZ', 'jam_mulai' => '19:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 2, 'harga' => 50000],

            ['tanggal' => '2025-12-07', 'nama' => 'JEJE', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 100000],
            ['tanggal' => '2025-12-07', 'nama' => 'HERIL', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 100000],
            ['tanggal' => '2025-12-07', 'nama' => 'BOCIL', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 3, 'harga' => 50000],
            ['tanggal' => '2025-12-07', 'nama' => 'RE 3', 'jam_mulai' => '19:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 1, 'harga' => 100000],
            ['tanggal' => '2025-12-07', 'nama' => 'LUKMAN', 'jam_mulai' => '19:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 2, 'harga' => 50000],
            ['tanggal' => '2025-12-07', 'nama' => 'BASRI', 'jam_mulai' => '19:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 3, 'harga' => 50000],

            // ==========================================
            // BATCH 2: 08 DESEMBER - 14 DESEMBER 2025 (37 Transaksi)
            // ==========================================
            ['tanggal' => '2025-12-08', 'nama' => 'ARNI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2025-12-08', 'nama' => 'MONDO', 'jam_mulai' => '17:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 55000],

            ['tanggal' => '2025-12-09', 'nama' => 'MONDO', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2025-12-09', 'nama' => 'ARDI', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2025-12-09', 'nama' => 'PB FM', 'jam_mulai' => '19:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 2, 'harga' => 900000, 'catatan' => 'Member Paket PB FM'],
            ['tanggal' => '2025-12-09', 'nama' => 'ADIN', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 2, 'harga' => 55000],
            ['tanggal' => '2025-12-09', 'nama' => 'ANIAH', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 3, 'harga' => 55000],
            ['tanggal' => '2025-12-09', 'nama' => 'FIRMAN', 'jam_mulai' => '17:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 3, 'harga' => 55000],

            ['tanggal' => '2025-12-10', 'nama' => 'YULHAM', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2025-12-10', 'nama' => 'ARIFIN', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2025-12-10', 'nama' => 'HAMWA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 2, 'harga' => 55000],
            ['tanggal' => '2025-12-10', 'nama' => 'COWO', 'jam_mulai' => '17:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 55000],
            ['tanggal' => '2025-12-10', 'nama' => 'COWO', 'jam_mulai' => '17:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 3, 'harga' => 55000],

            ['tanggal' => '2025-12-11', 'nama' => 'PB TANPA NAMA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2025-12-11', 'nama' => 'TUNAS BARU', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2025-12-11', 'nama' => 'NITA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 2, 'harga' => 55000],
            ['tanggal' => '2025-12-11', 'nama' => 'TUNAS BARU', 'jam_mulai' => '17:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 55000],
            ['tanggal' => '2025-12-11', 'nama' => 'UCI', 'jam_mulai' => '19:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 3, 'harga' => 110000],

            ['tanggal' => '2025-12-12', 'nama' => 'KLASTER RUTH', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2025-12-12', 'nama' => 'ALIA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 110000],
            ['tanggal' => '2025-12-12', 'nama' => 'FIRMAN', 'jam_mulai' => '19:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 3, 'harga' => 110000],

            ['tanggal' => '2025-12-13', 'nama' => 'ALIF', 'jam_mulai' => '15:00:00', 'jam_selesai' => '16:00:00', 'lapangan_id' => 1, 'harga' => 60000],
            ['tanggal' => '2025-12-13', 'nama' => 'PB TANPA NAMA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2025-12-13', 'nama' => 'HARIANTO', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 120000],
            ['tanggal' => '2025-12-13', 'nama' => 'RIA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 3, 'harga' => 60000],
            ['tanggal' => '2025-12-13', 'nama' => 'ALFATH', 'jam_mulai' => '18:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 2, 'harga' => 60000],
            ['tanggal' => '2025-12-13', 'nama' => 'ANIAH', 'jam_mulai' => '17:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 3, 'harga' => 60000],

            ['tanggal' => '2025-12-14', 'nama' => 'FADLI', 'jam_mulai' => '15:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2025-12-14', 'nama' => 'PB BSR', 'jam_mulai' => '15:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 2, 'harga' => 120000],
            ['tanggal' => '2025-12-14', 'nama' => 'HERIL', 'jam_mulai' => '15:00:00', 'jam_selesai' => '16:00:00', 'lapangan_id' => 3, 'harga' => 60000],
            ['tanggal' => '2025-12-14', 'nama' => 'AAN', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2025-12-14', 'nama' => 'AGUS', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 2, 'harga' => 120000],
            ['tanggal' => '2025-12-14', 'nama' => 'SAKTI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 3, 'harga' => 60000],
            ['tanggal' => '2025-12-14', 'nama' => 'FADHIL', 'jam_mulai' => '17:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 3, 'harga' => 60000],
            ['tanggal' => '2025-12-14', 'nama' => 'ICHAL', 'jam_mulai' => '18:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 3, 'harga' => 60000],
            ['tanggal' => '2025-12-14', 'nama' => 'WIWIN', 'jam_mulai' => '19:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2025-12-14', 'nama' => 'ALFATH', 'jam_mulai' => '19:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 2, 'harga' => 60000],

            // ==========================================
            // BATCH 3: 15 DESEMBER - 21 DESEMBER 2025 (27 Transaksi)
            // ==========================================
            ['tanggal' => '2025-12-15', 'nama' => 'RESKY ARAS', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2025-12-15', 'nama' => 'AHMAD', 'jam_mulai' => '17:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2025-12-15', 'nama' => 'IKKI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 2, 'harga' => 55000],
            ['tanggal' => '2025-12-15', 'nama' => 'UNO', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 2, 'harga' => 110000],
            ['tanggal' => '2025-12-15', 'nama' => 'ADIN', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 3, 'harga' => 55000],

            ['tanggal' => '2025-12-16', 'nama' => 'PB ROYAL', 'jam_mulai' => '19:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 1, 'harga' => 110000],

            ['tanggal' => '2025-12-17', 'nama' => 'PB UBK', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2025-12-17', 'nama' => 'MAESTRO', 'jam_mulai' => '19:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 2, 'harga' => 110000],
            ['tanggal' => '2025-12-17', 'nama' => 'MARDIN', 'jam_mulai' => '19:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 3, 'harga' => 110000],

            ['tanggal' => '2025-12-18', 'nama' => 'BFM 3', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2025-12-18', 'nama' => 'MAESTRO', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 2, 'harga' => 55000],
            ['tanggal' => '2025-12-18', 'nama' => 'AKBAR ALFATH', 'jam_mulai' => '17:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 55000],
            ['tanggal' => '2025-12-18', 'nama' => 'SOREBA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 3, 'harga' => 55000],

            ['tanggal' => '2025-12-19', 'nama' => 'AYU', 'jam_mulai' => '08:00:00', 'jam_selesai' => '14:00:00', 'lapangan_id' => 1, 'harga' => 330000],
            ['tanggal' => '2025-12-19', 'nama' => 'DIANA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2025-12-19', 'nama' => 'AMAR', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 110000],
            ['tanggal' => '2025-12-19', 'nama' => 'AMAR', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 2, 'harga' => 110000],

            ['tanggal' => '2025-12-20', 'nama' => 'PB CERIA', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2025-12-20', 'nama' => 'ALFATH LAND', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 2, 'harga' => 120000],
            ['tanggal' => '2025-12-20', 'nama' => 'KASMAN', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 3, 'harga' => 60000],
            ['tanggal' => '2025-12-20', 'nama' => 'AKBAR ALFATH', 'jam_mulai' => '17:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 3, 'harga' => 60000],

            ['tanggal' => '2025-12-21', 'nama' => 'EDI', 'jam_mulai' => '15:00:00', 'jam_selesai' => '16:00:00', 'lapangan_id' => 1, 'harga' => 60000],
            ['tanggal' => '2025-12-21', 'nama' => 'FADHIL', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 60000],
            ['tanggal' => '2025-12-21', 'nama' => 'WATI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 120000],
            ['tanggal' => '2025-12-21', 'nama' => 'RIZALDI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 3, 'harga' => 120000],
            ['tanggal' => '2025-12-21', 'nama' => 'AKBAR ALFATH', 'jam_mulai' => '17:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 180000],
            ['tanggal' => '2025-12-21', 'nama' => 'FADHIL', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 2, 'harga' => 120000],

            // ==========================================
            // BATCH 4: 22 DESEMBER - 28 DESEMBER 2025 (25 Transaksi)
            // ==========================================
            // SENIN 22 DESEMBER 2025
            ['tanggal' => '2025-12-22', 'nama' => 'MAESTRO', 'jam_mulai' => '19:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 1, 'harga' => 110000],

            // SELASA 23 DESEMBER 2025
            ['tanggal' => '2025-12-23', 'nama' => 'PB BFM 2', 'jam_mulai' => '15:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 1, 'harga' => 330000, 'catatan' => 'Member Paket PB BFM 2'],
            ['tanggal' => '2025-12-23', 'nama' => 'HERI', 'jam_mulai' => '18:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 2, 'harga' => 165000],

            // RABU 24 DESEMBER 2025
            ['tanggal' => '2025-12-24', 'nama' => 'IQBAL', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2025-12-24', 'nama' => 'HENDRI', 'jam_mulai' => '18:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2025-12-24', 'nama' => 'MABAR', 'jam_mulai' => '19:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2025-12-24', 'nama' => 'PB UBK', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 110000],
            ['tanggal' => '2025-12-24', 'nama' => 'FATHUR', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 2, 'harga' => 110000],
            ['tanggal' => '2025-12-24', 'nama' => 'CAPUNG', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 3, 'harga' => 55000],
            ['tanggal' => '2025-12-24', 'nama' => 'MABAR', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 3, 'harga' => 110000],

            // KAMIS 25 DESEMBER 2025
            ['tanggal' => '2025-12-25', 'nama' => 'MAESTRO', 'jam_mulai' => '19:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2025-12-25', 'nama' => 'HERIL', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 2, 'harga' => 55000],
            ['tanggal' => '2025-12-25', 'nama' => 'ALFATH LAND', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 3, 'harga' => 55000],

            // JUMAT 26 DESEMBER 2025
            ['tanggal' => '2025-12-26', 'nama' => 'ALFATH LAND', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2025-12-26', 'nama' => 'AMAR', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2025-12-26', 'nama' => 'PATUR', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 110000],
            ['tanggal' => '2025-12-26', 'nama' => 'RIRI', 'jam_mulai' => '18:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 2, 'harga' => 55000],
            ['tanggal' => '2025-12-26', 'nama' => 'HERI', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 3, 'harga' => 110000],
            ['tanggal' => '2025-12-26', 'nama' => 'PB CERIA', 'jam_mulai' => '19:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 3, 'harga' => 110000],

            // SABTU 27 DESEMBER 2025
            ['tanggal' => '2025-12-27', 'nama' => 'HARIS', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2025-12-27', 'nama' => 'PB TANPA NAMA', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 2, 'harga' => 120000],

            // MINGGU 28 DESEMBER 2025
            ['tanggal' => '2025-12-28', 'nama' => 'PB BSR', 'jam_mulai' => '15:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2025-12-28', 'nama' => 'FADHIL', 'jam_mulai' => '17:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 60000],
            ['tanggal' => '2025-12-28', 'nama' => 'PB TANPA NAMA', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 2, 'harga' => 120000],
            ['tanggal' => '2025-12-28', 'nama' => 'AGUS', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 3, 'harga' => 120000],

            // ==========================================
            // BATCH 5: 29 DESEMBER 2025 - 04 JANUARI 2026 (23 Transaksi)
            // CATATAN: Di spreadsheet, 02-04 tertulis "DESEMBER" namun sebenarnya adalah JANUARI 2026
            // ==========================================
            // SENIN 29 DESEMBER 2025
            ['tanggal' => '2025-12-29', 'nama' => 'HARIS', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2025-12-29', 'nama' => 'MAEDTRO', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 110000],
            ['tanggal' => '2025-12-29', 'nama' => 'HARI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 3, 'harga' => 110000],

            // SELASA 30 DESEMBER 2025
            ['tanggal' => '2025-12-30', 'nama' => 'GAURI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2025-12-30', 'nama' => 'LHIA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 2, 'harga' => 55000],
            ['tanggal' => '2025-12-30', 'nama' => 'PB BFM', 'jam_mulai' => '19:00:00', 'jam_selesai' => '22:00:00', 'lapangan_id' => 2, 'harga' => 165000, 'catatan' => 'Member Paket PB BFM'],
            ['tanggal' => '2025-12-30', 'nama' => 'ARIS', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 3, 'harga' => 110000],

            // RABU 31 DESEMBER 2025
            ['tanggal' => '2025-12-31', 'nama' => 'ALFATH LAND', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],

            // KAMIS 01 JANUARI 2026
            ['tanggal' => '2026-01-01', 'nama' => 'ALFATH LAND', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2026-01-01', 'nama' => 'OM BUDI', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 2, 'harga' => 110000],

            // JUMAT 02 JANUARI 2026 (di spreadsheet tertulis salah: "02 DESEMBER")
            ['tanggal' => '2026-01-02', 'nama' => 'ACO', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2026-01-02', 'nama' => 'DIDI', 'jam_mulai' => '17:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 165000],
            ['tanggal' => '2026-01-02', 'nama' => 'PB TANPA NAMA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 110000],
            ['tanggal' => '2026-01-02', 'nama' => 'PB BSR', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 3, 'harga' => 110000],

            // SABTU 03 JANUARI 2026 (di spreadsheet tertulis salah: "03 DESEMBER")
            ['tanggal' => '2026-01-03', 'nama' => 'PB FOMO', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2026-01-03', 'nama' => 'PB FOMO', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 120000],
            ['tanggal' => '2026-01-03', 'nama' => 'AHMAD', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 3, 'harga' => 60000],
            ['tanggal' => '2026-01-03', 'nama' => 'MAESTRO', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2026-01-03', 'nama' => 'LILIA', 'jam_mulai' => '17:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 3, 'harga' => 60000],

            // MINGGU 04 JANUARI 2026 (di spreadsheet tertulis salah: "04 DESEMBER")
            ['tanggal' => '2026-01-04', 'nama' => 'SAHIR', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2026-01-04', 'nama' => 'FINDARIA MAS', 'jam_mulai' => '16:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 2, 'harga' => 180000, 'catatan' => 'Member Paket FINDARIA MAS'],
            ['tanggal' => '2026-01-04', 'nama' => 'TAKDIR', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 3, 'harga' => 60000],
            ['tanggal' => '2026-01-04', 'nama' => 'MAESTRO', 'jam_mulai' => '19:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 1, 'harga' => 120000],

            // ==========================================
            // BATCH 6: 05 JANUARI - 15 JANUARI 2026 (34 Transaksi)
            // CATATAN: Di spreadsheet, 05-09 tertulis "DESEMBER" namun sebenarnya adalah JANUARI 2026
            // ==========================================

            // SENIN 05 JANUARI 2026 (di spreadsheet tertulis salah: "05 DESEMBER")
            ['tanggal' => '2026-01-05', 'nama' => 'CICI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-01-05', 'nama' => 'ATI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 2, 'harga' => 55000],

            // SELASA 06 JANUARI 2026 (di spreadsheet tertulis salah: "06 DESEMBER")
            ['tanggal' => '2026-01-06', 'nama' => 'ALFATH LAND', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-01-06', 'nama' => 'PB BFM 2', 'jam_mulai' => '15:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 2, 'harga' => 330000, 'catatan' => 'Member Paket PB BFM 2'],

            // RABU 07 JANUARI 2026 (di spreadsheet tertulis salah: "07 DESEMBER")
            ['tanggal' => '2026-01-07', 'nama' => 'ALFATH LAND', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2026-01-07', 'nama' => 'ALWI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 110000],
            ['tanggal' => '2026-01-07', 'nama' => 'PV UBK', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 3, 'harga' => 55000],
            ['tanggal' => '2026-01-07', 'nama' => 'MAESTRO', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 110000],

            // KAMIS 08 JANUARI 2026 (di spreadsheet tertulis salah: "08 DESEMBER")
            ['tanggal' => '2026-01-08', 'nama' => 'PRIVATE', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],

            // JUMAT 09 JANUARI 2026 (di spreadsheet: ARNI/BEKKEN/HERI tertulis "09 DESEMBER", AMAR tertulis benar "09 JANUARI")
            ['tanggal' => '2026-01-09', 'nama' => 'ARNI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2026-01-09', 'nama' => 'BEKKEN', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 110000],
            ['tanggal' => '2026-01-09', 'nama' => 'HERI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 3, 'harga' => 110000],
            ['tanggal' => '2026-01-09', 'nama' => 'AMAR', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 110000],

            // SABTU 10 JANUARI 2026
            ['tanggal' => '2026-01-10', 'nama' => 'ALFATH LAND', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 120000],

            // MINGGU 11 JANUARI 2026
            ['tanggal' => '2026-01-11', 'nama' => 'BFM 2', 'jam_mulai' => '15:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 180000, 'catatan' => 'Member Paket BFM 2'],
            ['tanggal' => '2026-01-11', 'nama' => 'DYAN KRIS', 'jam_mulai' => '15:00:00', 'jam_selesai' => '16:00:00', 'lapangan_id' => 2, 'harga' => 60000],
            ['tanggal' => '2026-01-11', 'nama' => 'AKBAR', 'jam_mulai' => '15:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 3, 'harga' => 120000],
            ['tanggal' => '2026-01-11', 'nama' => 'MAESTRO', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 120000],
            ['tanggal' => '2026-01-11', 'nama' => 'FITRAH', 'jam_mulai' => '17:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 3, 'harga' => 60000],
            ['tanggal' => '2026-01-11', 'nama' => 'ALWI', 'jam_mulai' => '18:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 60000],
            ['tanggal' => '2026-01-11', 'nama' => 'BFM 3', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 2, 'harga' => 120000],
            ['tanggal' => '2026-01-11', 'nama' => 'UKI', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 3, 'harga' => 120000],
            ['tanggal' => '2026-01-11', 'nama' => 'NANONG', 'jam_mulai' => '19:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 1, 'harga' => 150000],

            // SENIN 12 JANUARI 2026
            ['tanggal' => '2026-01-12', 'nama' => 'ANAK-ANAK PAGI KESI', 'jam_mulai' => '08:00:00', 'jam_selesai' => '09:00:00', 'lapangan_id' => 1, 'harga' => 50000],
            ['tanggal' => '2026-01-12', 'nama' => 'ENTITAS TAK BERNAMA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 2, 'harga' => 165000],

            // SELASA 13 JANUARI 2026
            ['tanggal' => '2026-01-13', 'nama' => 'FITRAH', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2026-01-13', 'nama' => 'HARIANTO', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 110000],
            ['tanggal' => '2026-01-13', 'nama' => 'PB BFM 2', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 3, 'harga' => 110000, 'catatan' => 'Member Paket PB BFM 2'],

            // RABU 14 JANUARI 2026
            ['tanggal' => '2026-01-14', 'nama' => 'AL FATH LAND', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2026-01-14', 'nama' => 'PELATI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 2, 'harga' => 165000],
            ['tanggal' => '2026-01-14', 'nama' => 'AL FATH LAND', 'jam_mulai' => '17:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2026-01-14', 'nama' => 'NO NAME', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 3, 'harga' => 110000],

            // KAMIS 15 JANUARI 2026
            ['tanggal' => '2026-01-15', 'nama' => 'AYU KRIS', 'jam_mulai' => '16:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 330000],
            ['tanggal' => '2026-01-15', 'nama' => 'YANTI DKK', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 110000],

            // ==========================================
            // BATCH 7: 16 JANUARI - 18 JANUARI 2026 (17 Transaksi)
            // ==========================================

            // JUMAT 16 JANUARI 2026 (weekday)
            ['tanggal' => '2026-01-16', 'nama' => 'NYILO KRIS', 'jam_mulai' => '16:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 220000],
            ['tanggal' => '2026-01-16', 'nama' => 'AL FATH LAND', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 55000],

            // SABTU 17 JANUARI 2026 (weekend)
            ['tanggal' => '2026-01-17', 'nama' => 'PRIVATE JET', 'jam_mulai' => '15:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 180000],
            ['tanggal' => '2026-01-17', 'nama' => 'MANJALITA', 'jam_mulai' => '15:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 2, 'harga' => 120000],
            ['tanggal' => '2026-01-17', 'nama' => 'ITERI', 'jam_mulai' => '15:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 3, 'harga' => 120000],
            ['tanggal' => '2026-01-17', 'nama' => 'WINSON LO SIENTO', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2026-01-17', 'nama' => 'YANTI DKK', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 2, 'harga' => 120000],
            ['tanggal' => '2026-01-17', 'nama' => 'RIFKA', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 3, 'harga' => 120000],

            // MINGGU 18 JANUARI 2026 (weekend)
            ['tanggal' => '2026-01-18', 'nama' => 'ANA', 'jam_mulai' => '09:00:00', 'jam_selesai' => '11:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2026-01-18', 'nama' => 'BFM 2', 'jam_mulai' => '15:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 1, 'harga' => 360000, 'catatan' => 'Member Paket BFM 2'],
            ['tanggal' => '2026-01-18', 'nama' => 'ILLA', 'jam_mulai' => '15:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 2, 'harga' => 120000],
            ['tanggal' => '2026-01-18', 'nama' => 'CEWE', 'jam_mulai' => '15:00:00', 'jam_selesai' => '16:00:00', 'lapangan_id' => 3, 'harga' => 60000],
            ['tanggal' => '2026-01-18', 'nama' => 'JNARA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 3, 'harga' => 60000],
            ['tanggal' => '2026-01-18', 'nama' => 'NYILO KRIS', 'jam_mulai' => '17:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 2, 'harga' => 240000],
            ['tanggal' => '2026-01-18', 'nama' => 'ERIL', 'jam_mulai' => '17:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 3, 'harga' => 60000],
            ['tanggal' => '2026-01-18', 'nama' => 'ALWI', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 3, 'harga' => 120000],
            ['tanggal' => '2026-01-18', 'nama' => 'IBU IBU', 'jam_mulai' => '20:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 3, 'harga' => 60000],

            // ==========================================
            // BATCH 8: 20 JANUARI - 28 JANUARI 2026 (27 Transaksi)
            // ==========================================

            // SELASA 20 JANUARI 2026 (weekday)
            ['tanggal' => '2026-01-20', 'nama' => 'ALFATH LAND', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2026-01-20', 'nama' => 'QALBY', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-01-20', 'nama' => 'HERI', 'jam_mulai' => '19:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-01-20', 'nama' => 'BFM 2', 'jam_mulai' => '15:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 2, 'harga' => 330000, 'catatan' => 'Member Paket BFM 2'],

            // RABU 21 JANUARI 2026 (weekday)
            ['tanggal' => '2026-01-21', 'nama' => 'NONAMW', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],

            // KAMIS 22 JANUARI 2026 (weekday)
            ['tanggal' => '2026-01-22', 'nama' => 'NONAME', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2026-01-22', 'nama' => 'NONAME', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 110000],

            // JUMAT 23 JANUARI 2026 (weekday)
            ['tanggal' => '2026-01-23', 'nama' => 'HUJRA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-01-23', 'nama' => 'GAURI', 'jam_mulai' => '18:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2026-01-23', 'nama' => 'AMAR', 'jam_mulai' => '19:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2026-01-23', 'nama' => 'BKM', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 110000],
            ['tanggal' => '2026-01-23', 'nama' => 'RR LAUNDY', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 2, 'harga' => 110000],
            ['tanggal' => '2026-01-23', 'nama' => 'ANDI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 3, 'harga' => 55000],

            // SABTU 24 JANUARI 2026 (weekend)
            ['tanggal' => '2026-01-24', 'nama' => 'EVELIN', 'jam_mulai' => '15:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2026-01-24', 'nama' => 'RAHAYU', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2026-01-24', 'nama' => 'ADIN', 'jam_mulai' => '15:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 2, 'harga' => 120000],
            ['tanggal' => '2026-01-24', 'nama' => 'ALFATH LAND', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 2, 'harga' => 120000],

            // MINGGU 25 JANUARI 2026 (weekend)
            ['tanggal' => '2026-01-25', 'nama' => 'BFM 2', 'jam_mulai' => '15:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 1, 'harga' => 360000, 'catatan' => 'Member Paket BFM 2'],
            ['tanggal' => '2026-01-25', 'nama' => 'BAIM', 'jam_mulai' => '15:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 180000],
            ['tanggal' => '2026-01-25', 'nama' => 'NO NAME', 'jam_mulai' => '18:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 2, 'harga' => 60000],
            ['tanggal' => '2026-01-25', 'nama' => 'ALWI', 'jam_mulai' => '19:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 2, 'harga' => 60000],
            ['tanggal' => '2026-01-25', 'nama' => 'NO NAME', 'jam_mulai' => '15:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 3, 'harga' => 180000],
            ['tanggal' => '2026-01-25', 'nama' => 'NO NAME', 'jam_mulai' => '18:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 3, 'harga' => 60000],
            ['tanggal' => '2026-01-25', 'nama' => 'NO NAME', 'jam_mulai' => '19:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 3, 'harga' => 60000],

            // SENIN 26 JANUARI 2026 (weekday)
            ['tanggal' => '2026-01-26', 'nama' => 'ALFATH LAND', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],

            // SELASA 27 JANUARI 2026 (weekday - di spreadsheet tertulis salah: "SELASA 20 JANUARI")
            ['tanggal' => '2026-01-27', 'nama' => 'BFM 2', 'jam_mulai' => '14:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 1, 'harga' => 350000, 'catatan' => 'Member Paket BFM 2'],

            // RABU 28 JANUARI 2026 (weekday - di spreadsheet tertulis salah: "RABU 27 JANUARI")
            ['tanggal' => '2026-01-28', 'nama' => 'REXKY', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],

            // ==========================================
            // BATCH 9: 01 FEBRUARI - 28 FEBRUARI 2026 (67 Transaksi, 129 Jam, Rp6.975.000)
            // ==========================================

            // MINGGU 1 FEBRUARI 2026 (10 jam - Rp600.000)
            ['tanggal' => '2026-02-01', 'nama' => 'PB TANPA NAMA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2026-02-01', 'nama' => 'MAESTRO', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2026-02-01', 'nama' => 'PB FOMO', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 120000],
            ['tanggal' => '2026-02-01', 'nama' => 'BFM 3', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 2, 'harga' => 120000],
            ['tanggal' => '2026-02-01', 'nama' => 'AKBAR', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 3, 'harga' => 120000],

            // SENIN 2 FEBRUARI 2026 (2 jam - Rp110.000)
            ['tanggal' => '2026-02-02', 'nama' => 'ALFATH LAND', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2026-02-02', 'nama' => 'HARIS', 'jam_mulai' => '17:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 55000],

            // SELASA 3 FEBRUARI 2026 (5 jam + member - Rp275.000)
            ['tanggal' => '2026-02-03', 'nama' => 'PB BFM 2', 'jam_mulai' => '16:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 165000, 'catatan' => 'Member PB BFM 2'],
            ['tanggal' => '2026-02-03', 'nama' => 'GAURI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 110000],

            // RABU 4 FEBRUARI 2026 (6 jam - Rp330.000)
            ['tanggal' => '2026-02-04', 'nama' => 'ALFATH LAND', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-02-04', 'nama' => 'PB UBK', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-02-04', 'nama' => 'MAESTRO', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 2, 'harga' => 110000],

            // KAMIS 5 FEBRUARI 2026 (4 jam - Rp220.000)
            ['tanggal' => '2026-02-05', 'nama' => 'OM BUDI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-02-05', 'nama' => 'HERI', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 110000],

            // JUMAT 6 FEBRUARI 2026 (9 jam - Rp495.000)
            ['tanggal' => '2026-02-06', 'nama' => 'AMAR', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-02-06', 'nama' => 'PB CERIA', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-02-06', 'nama' => 'PB BSR', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 110000],
            ['tanggal' => '2026-02-06', 'nama' => 'PB ROYAL', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 2, 'harga' => 110000],
            ['tanggal' => '2026-02-06', 'nama' => 'ARNI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 3, 'harga' => 55000],

            // SABTU 7 FEBRUARI 2026 (16 jam - Rp960.000)
            ['tanggal' => '2026-02-07', 'nama' => 'PRIVATE JET', 'jam_mulai' => '15:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 180000],
            ['tanggal' => '2026-02-07', 'nama' => 'PB FOMO', 'jam_mulai' => '18:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 1, 'harga' => 180000],
            ['tanggal' => '2026-02-07', 'nama' => 'MANJALITA', 'jam_mulai' => '15:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 180000],
            ['tanggal' => '2026-02-07', 'nama' => 'PB TANPA NAMA', 'jam_mulai' => '18:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 2, 'harga' => 180000],
            ['tanggal' => '2026-02-07', 'nama' => 'MAESTRO', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 3, 'harga' => 120000],
            ['tanggal' => '2026-02-07', 'nama' => 'EVELIN', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 3, 'harga' => 120000],

            // MINGGU 8 FEBRUARI 2026 (12 jam - Rp720.000)
            ['tanggal' => '2026-02-08', 'nama' => 'BFM 2', 'jam_mulai' => '15:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 240000, 'catatan' => 'Member BFM 2'],
            ['tanggal' => '2026-02-08', 'nama' => 'NYILO KRIS', 'jam_mulai' => '17:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 2, 'harga' => 240000],
            ['tanggal' => '2026-02-08', 'nama' => 'ALWI', 'jam_mulai' => '15:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 3, 'harga' => 120000],
            ['tanggal' => '2026-02-08', 'nama' => 'UKI', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 3, 'harga' => 120000],

            // SENIN 9 FEBRUARI 2026 (2 jam - Rp110.000)
            ['tanggal' => '2026-02-09', 'nama' => 'ALFATH LAND', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2026-02-09', 'nama' => 'FIRMAN', 'jam_mulai' => '17:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 55000],

            // SELASA 10 FEBRUARI 2026 (10 jam - Rp530.000)
            ['tanggal' => '2026-02-10', 'nama' => 'PB BFM 2', 'jam_mulai' => '15:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 1, 'harga' => 310000, 'catatan' => 'Member Paket PB BFM 2'],
            ['tanggal' => '2026-02-10', 'nama' => 'HERI', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 2, 'harga' => 110000],
            ['tanggal' => '2026-02-10', 'nama' => 'QALBY', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 3, 'harga' => 110000],

            // RABU 11 FEBRUARI 2026 (6 jam - Rp330.000)
            ['tanggal' => '2026-02-11', 'nama' => 'ALFATH LAND', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-02-11', 'nama' => 'PELATI', 'jam_mulai' => '18:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 1, 'harga' => 165000],
            ['tanggal' => '2026-02-11', 'nama' => 'PV UBK', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 2, 'harga' => 55000],

            // KAMIS 12 FEBRUARI 2026 (2 jam - Rp110.000)
            ['tanggal' => '2026-02-12', 'nama' => 'NONAME', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],

            // JUMAT 13 FEBRUARI 2026 (1 jam - Rp55.000)
            ['tanggal' => '2026-02-13', 'nama' => 'GAURI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],

            // SABTU 14 FEBRUARI 2026 (5 jam - Rp300.000)
            ['tanggal' => '2026-02-14', 'nama' => 'EVELIN', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2026-02-14', 'nama' => 'RAHAYU', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 120000],
            ['tanggal' => '2026-02-14', 'nama' => 'AHMAD', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 3, 'harga' => 60000],

            // MINGGU 15 FEBRUARI 2026 (6 jam - Rp360.000)
            ['tanggal' => '2026-02-15', 'nama' => 'BAIM', 'jam_mulai' => '15:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 180000],
            ['tanggal' => '2026-02-15', 'nama' => 'MAESTRO', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 120000],
            ['tanggal' => '2026-02-15', 'nama' => 'FITRAH', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 3, 'harga' => 60000],

            // SENIN 16 FEBRUARI 2026 (5 jam - Rp275.000)
            ['tanggal' => '2026-02-16', 'nama' => 'ENTITAS TAK BERNAMA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 165000],
            ['tanggal' => '2026-02-16', 'nama' => 'CICI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 110000],

            // SELASA 17 FEBRUARI 2026 (12 jam - Rp680.000)
            ['tanggal' => '2026-02-17', 'nama' => 'PB BFM 2', 'jam_mulai' => '15:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 1, 'harga' => 350000, 'catatan' => 'Member PB BFM 2'],
            ['tanggal' => '2026-02-17', 'nama' => 'HERI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 110000],
            ['tanggal' => '2026-02-17', 'nama' => 'HARIANTO', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 2, 'harga' => 110000],
            ['tanggal' => '2026-02-17', 'nama' => 'ARIS', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 3, 'harga' => 110000],

            // RABU 18 FEBRUARI 2026 (3 jam - Rp165.000)
            ['tanggal' => '2026-02-18', 'nama' => 'MAESTRO', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-02-18', 'nama' => 'ALFATH LAND', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 2, 'harga' => 55000],

            // KAMIS 19 FEBRUARI 2026: Rp0 (0 Jam)

            // JUMAT 20 FEBRUARI 2026 (3 jam - Rp165.000)
            ['tanggal' => '2026-02-20', 'nama' => 'HUJRA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-02-20', 'nama' => 'AMAR', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 2, 'harga' => 55000],

            // SABTU 21 FEBRUARI 2026: Rp0 (0 Jam)

            // MINGGU 22 FEBRUARI 2026 (7 jam - Rp420.000)
            ['tanggal' => '2026-02-22', 'nama' => 'BFM 2', 'jam_mulai' => '15:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 240000, 'catatan' => 'Member BFM 2'],
            ['tanggal' => '2026-02-22', 'nama' => 'SAHIR', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 120000],
            ['tanggal' => '2026-02-22', 'nama' => 'ALWI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 3, 'harga' => 60000],

            // SENIN 23 FEBRUARI 2026: Rp0 (0 Jam)

            // SELASA 24 FEBRUARI 2026 (1 jam - Rp55.000)
            ['tanggal' => '2026-02-24', 'nama' => 'FITRAH', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],

            // RABU 25 FEBRUARI 2026 (3 jam - Rp155.000)
            ['tanggal' => '2026-02-25', 'nama' => 'ALWI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 100000],
            ['tanggal' => '2026-02-25', 'nama' => 'NONAME', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 2, 'harga' => 55000],

            // KAMIS 26 FEBRUARI 2026 (6 jam - Rp330.000)
            ['tanggal' => '2026-02-26', 'nama' => 'AYU KRIS', 'jam_mulai' => '16:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 165000],
            ['tanggal' => '2026-02-26', 'nama' => 'YANTI DKK', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 110000],
            ['tanggal' => '2026-02-26', 'nama' => 'NONAME', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 3, 'harga' => 55000],

            // JUMAT 27 FEBRUARI 2026 (2 jam - Rp110.000)
            ['tanggal' => '2026-02-27', 'nama' => 'BKM', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],

            // SABTU 28 FEBRUARI 2026 (3 jam - Rp180.000)
            ['tanggal' => '2026-02-28', 'nama' => 'WINSON LO SIENTO', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2026-02-28', 'nama' => 'RIFKA', 'jam_mulai' => '17:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 60000],

            // ==========================================
            // BATCH 10: 01 MARET - 31 MARET 2026 (26 Transaksi, Rp2.527.000)
            // ==========================================

            // MINGGU 1 MARET 2026 (Rp400.000)
            ['tanggal' => '2026-03-01', 'nama' => 'PB TANPA NAMA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2026-03-01', 'nama' => 'MAESTRO', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2026-03-01', 'nama' => 'PB FOMO', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 120000],
            ['tanggal' => '2026-03-01', 'nama' => 'FITRAH', 'jam_mulai' => '18:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 2, 'harga' => 40000],

            // SENIN 2 MARET 2026 (Rp110.000)
            ['tanggal' => '2026-03-02', 'nama' => 'ALFATH LAND', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2026-03-02', 'nama' => 'HARIS', 'jam_mulai' => '17:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 55000],

            // SELASA 3 MARET 2026 (Rp210.000)
            ['tanggal' => '2026-03-03', 'nama' => 'PB BFM 2', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000, 'catatan' => 'Member PB BFM 2'],
            ['tanggal' => '2026-03-03', 'nama' => 'GAURI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 100000],

            // KAMIS 5 MARET 2026 (di tabel tertulis: "KAMIS 5 FEEBRUARI" - Rp200.000)
            ['tanggal' => '2026-03-05', 'nama' => 'OM BUDI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 100000],
            ['tanggal' => '2026-03-05', 'nama' => 'HERI', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 100000],

            // JUMAT 6 MARET 2026 (Rp110.000)
            ['tanggal' => '2026-03-06', 'nama' => 'AMAR', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2026-03-06', 'nama' => 'PB CERIA', 'jam_mulai' => '17:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 55000],

            // SABTU 7 MARET 2026 (Rp120.000)
            ['tanggal' => '2026-03-07', 'nama' => 'EVELIN', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 120000],

            // MINGGU 8 MARET 2026 (Rp210.000)
            ['tanggal' => '2026-03-08', 'nama' => 'NYILO KRIS', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-03-08', 'nama' => 'ALWI', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 100000],

            // RABU 11 MARET 2026 (Rp110.000)
            ['tanggal' => '2026-03-11', 'nama' => 'ALFATH LAND', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2026-03-11', 'nama' => 'PV UBK', 'jam_mulai' => '17:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 55000],

            // KAMIS 12 MARET 2026 (Rp100.000)
            ['tanggal' => '2026-03-12', 'nama' => 'NONAME', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 100000],

            // SABTU 14 MARET 2026 (Rp60.000)
            ['tanggal' => '2026-03-14', 'nama' => 'RAHAYU', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 60000],

            // MINGGU 15 MARET 2026 (Rp260.000)
            ['tanggal' => '2026-03-15', 'nama' => 'BAIM', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 130000],
            ['tanggal' => '2026-03-15', 'nama' => 'MAESTRO', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 130000],

            // SENIN 16 MARET 2026 (Rp247.000)
            ['tanggal' => '2026-03-16', 'nama' => 'ENTITAS TAK BERNAMA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 165000],
            ['tanggal' => '2026-03-16', 'nama' => 'CICI', 'jam_mulai' => '17:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 2, 'harga' => 82000],

            // KAMIS 19 MARET 2026 (Rp55.000)
            ['tanggal' => '2026-03-19', 'nama' => 'NONAME', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],

            // KAMIS 26 MARET 2026 (Rp55.000)
            ['tanggal' => '2026-03-26', 'nama' => 'AYU KRIS', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],

            // MINGGU 29 MARET 2026 (Rp280.000)
            ['tanggal' => '2026-03-29', 'nama' => 'BFM 2', 'jam_mulai' => '15:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 160000, 'catatan' => 'Member BFM 2'],
            ['tanggal' => '2026-03-29', 'nama' => 'SAHIR', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 120000],

            // ==========================================
            // BATCH 11: 01 APRIL - 26 APRIL 2026 (51 Transaksi, Rp5.820.000)
            // ==========================================

            // 1 APRIL RABU (Rp110.000)
            ['tanggal' => '2026-04-01', 'nama' => 'ALFATH LAND', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2026-04-01', 'nama' => 'MAESTRO', 'jam_mulai' => '17:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 55000],

            // 2 APRIL KAMIS (Rp110.000)
            ['tanggal' => '2026-04-02', 'nama' => 'NONAME', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],

            // 03/04/2026 JUMAT (Rp165.000)
            ['tanggal' => '2026-04-03', 'nama' => 'AMAR', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-04-03', 'nama' => 'GAURI', 'jam_mulai' => '18:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 55000],

            // 4 APRIL SABTU (Rp240.000)
            ['tanggal' => '2026-04-04', 'nama' => 'EVELIN', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2026-04-04', 'nama' => 'RAHAYU', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 120000],

            // 5 APRIL MINGGU (Rp240.000)
            ['tanggal' => '2026-04-05', 'nama' => 'PB TANPA NAMA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2026-04-05', 'nama' => 'PB FOMO', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 120000],

            // 6 APRIL SENIN (Rp165.000)
            ['tanggal' => '2026-04-06', 'nama' => 'ENTITAS TAK BERNAMA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 165000],

            // 7 APRIL SELASA (Rp110.000)
            ['tanggal' => '2026-04-07', 'nama' => 'HERI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],

            // 08/04/2026 RABU (Rp60.000)
            ['tanggal' => '2026-04-08', 'nama' => 'ALWI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 60000],

            // 9 APRIL KAMIS (Rp330.000)
            ['tanggal' => '2026-04-09', 'nama' => 'AYU KRIS', 'jam_mulai' => '16:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 165000],
            ['tanggal' => '2026-04-09', 'nama' => 'YANTI DKK', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 110000],
            ['tanggal' => '2026-04-09', 'nama' => 'NONAME', 'jam_mulai' => '18:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 2, 'harga' => 55000],

            // 10 APRIL JUMAT (Rp220.000)
            ['tanggal' => '2026-04-10', 'nama' => 'HUJRA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-04-10', 'nama' => 'BKM', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 110000],

            // 11 APRIL SABTU (Rp420.000)
            ['tanggal' => '2026-04-11', 'nama' => 'PRIVATE JET', 'jam_mulai' => '15:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 180000],
            ['tanggal' => '2026-04-11', 'nama' => 'MANJALITA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 120000],
            ['tanggal' => '2026-04-11', 'nama' => 'WINSON LO SIENTO', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 2, 'harga' => 120000],

            // 12 APRIL MINGGU (Rp480.000)
            ['tanggal' => '2026-04-12', 'nama' => 'BFM 2', 'jam_mulai' => '15:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 240000, 'catatan' => 'Member BFM 2'],
            ['tanggal' => '2026-04-12', 'nama' => 'NYILO KRIS', 'jam_mulai' => '17:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 2, 'harga' => 240000],

            // 13 APRIL SENIN (Rp55.000)
            ['tanggal' => '2026-04-13', 'nama' => 'ALFATH LAND', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],

            // 14 APRIL SELASA (Rp110.000)
            ['tanggal' => '2026-04-14', 'nama' => 'PB BFM 2', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000, 'catatan' => 'Member PB BFM 2'],

            // 15 APRIL RABU (Rp220.000)
            ['tanggal' => '2026-04-15', 'nama' => 'ALFATH LAND', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-04-15', 'nama' => 'PELATI', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 110000],

            // 16 APRIL KAMIS (Rp110.000)
            ['tanggal' => '2026-04-16', 'nama' => 'OM BUDI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],

            // 17 APRIL JUMAT (Rp495.000)
            ['tanggal' => '2026-04-17', 'nama' => 'AMAR', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-04-17', 'nama' => 'PB CERIA', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-04-17', 'nama' => 'PB BSR', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 110000],
            ['tanggal' => '2026-04-17', 'nama' => 'PB ROYAL', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 2, 'harga' => 110000],
            ['tanggal' => '2026-04-17', 'nama' => 'ARNI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 3, 'harga' => 55000],

            // 18 APRIL SABTU (Rp60.000)
            ['tanggal' => '2026-04-18', 'nama' => 'AHMAD', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 60000],

            // 19 APRIL MINGGU (Rp600.000)
            ['tanggal' => '2026-04-19', 'nama' => 'BAIM', 'jam_mulai' => '15:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 180000],
            ['tanggal' => '2026-04-19', 'nama' => 'MAESTRO', 'jam_mulai' => '18:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 1, 'harga' => 180000],
            ['tanggal' => '2026-04-19', 'nama' => 'PB TANPA NAMA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 120000],
            ['tanggal' => '2026-04-19', 'nama' => 'AKBAR', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 2, 'harga' => 120000],

            // 20 APRIL SENIN (Rp100.000)
            ['tanggal' => '2026-04-20', 'nama' => 'HARIS', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 100000],

            // 21 APRIL SELASA (Rp210.000)
            ['tanggal' => '2026-04-21', 'nama' => 'PB BFM 2', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000, 'catatan' => 'Member PB BFM 2'],
            ['tanggal' => '2026-04-21', 'nama' => 'GAURI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 100000],

            // 22 APRIL RABU (Rp330.000)
            ['tanggal' => '2026-04-22', 'nama' => 'MAESTRO', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-04-22', 'nama' => 'PB UBK', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-04-22', 'nama' => 'ALFATH LAND', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 110000],

            // 23/04/KAMIS (Rp110.000)
            ['tanggal' => '2026-04-23', 'nama' => 'NONAME', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],

            // 24 APRIL JUMAT (Rp110.000)
            ['tanggal' => '2026-04-24', 'nama' => 'BKM', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],

            // 25 APRIL SABTU (Rp390.000)
            ['tanggal' => '2026-04-25', 'nama' => 'EVELIN', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2026-04-25', 'nama' => 'RAHAYU', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2026-04-25', 'nama' => 'RIFKA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 120000],
            ['tanggal' => '2026-04-25', 'nama' => 'FITRAH', 'jam_mulai' => '18:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 2, 'harga' => 30000],

            // 26 APRIL MINGGU (Rp240.000)
            ['tanggal' => '2026-04-26', 'nama' => 'SAHIR', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2026-04-26', 'nama' => 'ALWI', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 120000],

            // ==========================================
            // BATCH 12: 01 MEI - 27 MEI 2026 (51 Transaksi, Rp6.971.000)
            // ==========================================

            // 1 MEI 2026 JUMAT (Rp440.000)
            ['tanggal' => '2026-05-01', 'nama' => 'AMAR', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-05-01', 'nama' => 'PB CERIA', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-05-01', 'nama' => 'PB BSR', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 110000],
            ['tanggal' => '2026-05-01', 'nama' => 'PB ROYAL', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 2, 'harga' => 110000],

            // 2 MEI 2026 SABTU (Rp420.000)
            ['tanggal' => '2026-05-02', 'nama' => 'PRIVATE JET', 'jam_mulai' => '15:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 180000],
            ['tanggal' => '2026-05-02', 'nama' => 'MANJALITA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 120000],
            ['tanggal' => '2026-05-02', 'nama' => 'WINSON LO SIENTO', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 2, 'harga' => 120000],

            // 3 MEI 2026 MINGGU (Rp240.000)
            ['tanggal' => '2026-05-03', 'nama' => 'PB TANPA NAMA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2026-05-03', 'nama' => 'PB FOMO', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 120000],

            // 5 MEI 2026 SELASA (Rp164.000)
            ['tanggal' => '2026-05-05', 'nama' => 'PB BFM 2', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000, 'catatan' => 'Member PB BFM 2'],
            ['tanggal' => '2026-05-05', 'nama' => 'CICI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 2, 'harga' => 54000],

            // 6 MEI 2026 RABU (Rp165.000)
            ['tanggal' => '2026-05-06', 'nama' => 'ALFATH LAND', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-05-06', 'nama' => 'PV UBK', 'jam_mulai' => '18:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 55000],

            // 7 MEI 2026 KAMIS (Rp275.000)
            ['tanggal' => '2026-05-07', 'nama' => 'AYU KRIS', 'jam_mulai' => '16:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 165000],
            ['tanggal' => '2026-05-07', 'nama' => 'YANTI DKK', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 110000],

            // 8 MEI 2026 JUMAT (Rp82.000)
            ['tanggal' => '2026-05-08', 'nama' => 'ARNI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:30:00', 'lapangan_id' => 1, 'harga' => 82000],

            // 9 MEI 2026 SABTU (Rp420.000)
            ['tanggal' => '2026-05-09', 'nama' => 'EVELIN', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2026-05-09', 'nama' => 'RAHAYU', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2026-05-09', 'nama' => 'RIFKA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 2, 'harga' => 180000],

            // 10 MEI 2026 MINGGU (Rp110.000)
            ['tanggal' => '2026-05-10', 'nama' => 'AKBAR', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],

            // 11 MEI 2026 SENIN (Rp240.000)
            ['tanggal' => '2026-05-11', 'nama' => 'ENTITAS TAK BERNAMA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 165000],
            ['tanggal' => '2026-05-11', 'nama' => 'HARIS', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:30:00', 'lapangan_id' => 2, 'harga' => 75000],

            // 12 MEI 2026 SELASA (Rp265.000)
            ['tanggal' => '2026-05-12', 'nama' => 'PB BFM 2', 'jam_mulai' => '15:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 165000, 'catatan' => 'Member PB BFM 2'],
            ['tanggal' => '2026-05-12', 'nama' => 'GAURI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 100000],

            // 13 MEI 2026 RABU (Rp330.000)
            ['tanggal' => '2026-05-13', 'nama' => 'MAESTRO', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-05-13', 'nama' => 'PB UBK', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-05-13', 'nama' => 'PELATI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 110000],

            // 14 MEI 2026 KAMIS (Rp550.000)
            ['tanggal' => '2026-05-14', 'nama' => 'AYU KRIS', 'jam_mulai' => '15:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 220000],
            ['tanggal' => '2026-05-14', 'nama' => 'OM BUDI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 2, 'harga' => 165000],
            ['tanggal' => '2026-05-14', 'nama' => 'HERI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 3, 'harga' => 165000],

            // 15 MEI 2026 JUMAT (Rp330.000)
            ['tanggal' => '2026-05-15', 'nama' => 'HUJRA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-05-15', 'nama' => 'BKM', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-05-15', 'nama' => 'RR LAUNDY', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 110000],

            // 16 MEI 2026 SABTU (Rp480.000)
            ['tanggal' => '2026-05-16', 'nama' => 'PRIVATE JET', 'jam_mulai' => '15:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 240000],
            ['tanggal' => '2026-05-16', 'nama' => 'MANJALITA', 'jam_mulai' => '15:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 2, 'harga' => 240000],

            // 17 MEI 2026 MINGGU (Rp610.000)
            ['tanggal' => '2026-05-17', 'nama' => 'BFM 2', 'jam_mulai' => '15:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 240000, 'catatan' => 'Member BFM 2'],
            ['tanggal' => '2026-05-17', 'nama' => 'NYILO KRIS', 'jam_mulai' => '17:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 2, 'harga' => 240000],
            ['tanggal' => '2026-05-17', 'nama' => 'ALWI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 3, 'harga' => 130000],

            // 19 MEI 2026 SELASA (Rp330.000)
            ['tanggal' => '2026-05-19', 'nama' => 'PB BFM 2', 'jam_mulai' => '15:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 165000, 'catatan' => 'Member PB BFM 2'],
            ['tanggal' => '2026-05-19', 'nama' => 'HERI', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 110000],
            ['tanggal' => '2026-05-19', 'nama' => 'HARIANTO', 'jam_mulai' => '18:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 2, 'harga' => 55000],

            // 21 MEI 2026 KAMIS (Rp330.000)
            ['tanggal' => '2026-05-21', 'nama' => 'AYU KRIS', 'jam_mulai' => '16:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 1, 'harga' => 165000],
            ['tanggal' => '2026-05-21', 'nama' => 'YANTI DKK', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 110000],
            ['tanggal' => '2026-05-21', 'nama' => 'NONAME', 'jam_mulai' => '18:00:00', 'jam_selesai' => '19:00:00', 'lapangan_id' => 2, 'harga' => 55000],

            // 22 MEI 2026 JUMAT (Rp110.000)
            ['tanggal' => '2026-05-22', 'nama' => 'AMAR', 'jam_mulai' => '16:00:00', 'jam_selesai' => '17:00:00', 'lapangan_id' => 1, 'harga' => 55000],
            ['tanggal' => '2026-05-22', 'nama' => 'GAURI', 'jam_mulai' => '17:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 55000],

            // 23 MEI 2026 SABTU (Rp240.000)
            ['tanggal' => '2026-05-23', 'nama' => 'EVELIN', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 120000],
            ['tanggal' => '2026-05-23', 'nama' => 'RAHAYU', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 120000],

            // 24 MEI 2026 MINGGU (Rp600.000)
            ['tanggal' => '2026-05-24', 'nama' => 'BAIM', 'jam_mulai' => '15:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 180000],
            ['tanggal' => '2026-05-24', 'nama' => 'MAESTRO', 'jam_mulai' => '18:00:00', 'jam_selesai' => '21:00:00', 'lapangan_id' => 1, 'harga' => 180000],
            ['tanggal' => '2026-05-24', 'nama' => 'PB TANPA NAMA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 2, 'harga' => 120000],
            ['tanggal' => '2026-05-24', 'nama' => 'AKBAR', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 2, 'harga' => 120000],

            // 25 MEI 2026 SENIN (Rp220.000)
            ['tanggal' => '2026-05-25', 'nama' => 'ENTITAS TAK BERNAMA', 'jam_mulai' => '16:00:00', 'jam_selesai' => '18:00:00', 'lapangan_id' => 1, 'harga' => 110000],
            ['tanggal' => '2026-05-25', 'nama' => 'ALFATH LAND', 'jam_mulai' => '18:00:00', 'jam_selesai' => '20:00:00', 'lapangan_id' => 1, 'harga' => 110000],
        ];

        DB::beginTransaction();

        try {
            // Bersihkan data booking offline terdahulu jika re-seed
            Booking::where('is_offline', true)->delete();
            Jadwal::where('keterangan', 'LIKE', 'Booking Offline:%')->delete();

            $count = 0;
            foreach ($data as $item) {
                // Hapus slot tersedia yang overlap agar tidak terjadi duplikasi/constraint violation
                Jadwal::where('lapangan_id', $item['lapangan_id'])
                    ->where('tanggal', $item['tanggal'])
                    ->where('jam_mulai', '<', $item['jam_selesai'])
                    ->where('jam_selesai', '>', $item['jam_mulai'])
                    ->delete();

                // 1. Buat record Jadwal
                $jadwal = Jadwal::create([
                    'lapangan_id' => $item['lapangan_id'],
                    'tanggal'     => $item['tanggal'],
                    'jam_mulai'   => $item['jam_mulai'],
                    'jam_selesai' => $item['jam_selesai'],
                    'status'      => 'dipesan',
                    'keterangan'  => 'Booking Offline: ' . $item['nama'],
                ]);

                // 2. Buat record Booking
                $booking = Booking::create([
                    'user_id'              => null,
                    'jadwal_id'            => $jadwal->id,
                    'lapangan_id'          => $item['lapangan_id'],
                    'tanggal_booking'      => $item['tanggal'],
                    'total_harga'          => $item['harga'],
                    'status'               => 'dipesan',
                    'catatan'              => $item['catatan'] ?? 'Input Data Pemesanan Offline',
                    'is_offline'           => true,
                    'nama_pemesan_offline' => $item['nama'],
                    'no_hp_offline'        => null,
                    'fasilitas'            => null,
                ]);

                // 3. Buat Pembayaran tunai otomatis diverifikasi
                $booking->pembayaran()->create([
                    'jumlah_bayar'      => $item['harga'],
                    'metode_pembayaran' => 'tunai',
                    'status_verifikasi' => 'diverifikasi',
                    'catatan_admin'     => 'Pembayaran offline terverifikasi',
                    'verified_at'       => now(),
                ]);

                $count++;
            }

            DB::commit();

            $this->info("Berhasil menginput {$count} total data pemesanan offline (Batch 1 s/d Batch 12) ke dalam sistem!");
            return Command::SUCCESS;
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->error('Gagal menginput data pemesanan offline: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
}
