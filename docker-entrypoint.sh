#!/bin/bash
set -e

PORT="${PORT:-7860}"

# Bersihkan cache lama agar variabel environment baru dari hosting terbaca
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Pastikan symlink storage publik tersedia
php artisan storage:link --force

# Restore data awal jika database masih kosong
if [ -f "database/badmintoncrm.sql" ]; then
    php artisan db:restore-sql --if-empty || true
fi

# Jalankan migrasi jika ada struktur baru
php artisan migrate --force || true

# Jalankan Laravel Web Server di port 7860 (standar Hugging Face Spaces)
echo "Starting Laravel server on port $PORT..."
exec php artisan serve --host=0.0.0.0 --port="$PORT"
