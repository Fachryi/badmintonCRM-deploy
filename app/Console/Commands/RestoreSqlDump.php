<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class RestoreSqlDump extends Command
{
    protected $signature   = 'db:restore-sql {--force : Force execution without confirmation} {--if-empty : Only restore if database has no lapangan/users}';
    protected $description = 'Import isi database dari file database/badmintoncrm.sql ke database aktif';

    public function handle(): int
    {
        $sqlPath = database_path('badmintoncrm.sql');

        if (!File::exists($sqlPath)) {
            $this->error("File SQL dump tidak ditemukan di: {$sqlPath}");
            return Command::FAILURE;
        }

        // Jika opsi --if-empty diberikan, cek apakah database sudah ada data
        if ($this->option('if-empty')) {
            try {
                if (\Illuminate\Support\Facades\Schema::hasTable('users') && DB::table('users')->count() > 0) {
                    $this->info('Database sudah memiliki data. Melewati import SQL dump.');
                    return Command::SUCCESS;
                }
            } catch (\Throwable $e) {
                // Jika tabel belum ada, lanjutkan import
            }
        }

        if (!$this->option('force') && !$this->option('if-empty') && !$this->confirm('Perhatian: Ini akan mengimpor seluruh struktur dan data dari badmintoncrm.sql. Lanjutkan?')) {
            $this->info('Dibatalkan.');
            return Command::SUCCESS;
        }

        $this->info('Membaca file database/badmintoncrm.sql...');
        $sql = File::get($sqlPath);

        $this->info('Menjalankan query import ke database...');
        try {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::unprepared($sql);
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            $this->info('✅ Database berhasil diimpor dari badmintoncrm.sql!');
            return Command::SUCCESS;
        } catch (\Throwable $e) {
            $this->error('❌ Gagal mengimpor SQL: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
}
