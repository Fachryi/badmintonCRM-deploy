<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class RestoreSqlDump extends Command
{
    protected $signature   = 'db:restore-sql {--force : Force execution without confirmation}';
    protected $description = 'Import isi database dari file database/badmintoncrm.sql ke database aktif';

    public function handle(): int
    {
        $sqlPath = database_path('badmintoncrm.sql');

        if (!File::exists($sqlPath)) {
            $this->error("File SQL dump tidak ditemukan di: {$sqlPath}");
            return Command::FAILURE;
        }

        if (!$this->option('force') && !$this->confirm('Perhatian: Ini akan mengimpor seluruh struktur dan data dari badmintoncrm.sql. Lanjutkan?')) {
            $this->info('Dibatalkan.');
            return Command::SUCCESS;
        }

        $this->info('Membaca file database/badmintoncrm.sql...');
        $sql = File::get($sqlPath);

        $this->info('Menjalankan query import ke database...');
        try {
            DB::unprepared($sql);
            $this->info('✅ Database berhasil diimpor dari badmintoncrm.sql!');
            return Command::SUCCESS;
        } catch (\Throwable $e) {
            $this->error('❌ Gagal mengimpor SQL: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
}
