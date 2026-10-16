#!/bin/bash
set -e

# Port binding Render / PaaS (default 80 jika tidak ada $PORT)
if [ -n "$PORT" ]; then
    sed -i "s/Listen 80/Listen $PORT/g" /etc/apache2/ports.conf
    sed -i "s/<VirtualHost \*:80>/<VirtualHost \*:$PORT>/g" /etc/apache2/sites-available/000-default.conf
fi

# Pastikan kepemilikan dan permission direktori storage dan cache
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

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

# Jalankan Apache Web Server
exec apache2-foreground
