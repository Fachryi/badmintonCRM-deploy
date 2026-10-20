@echo off
title BadmintonCRM - Online Tunnel (Cloudflare)
echo ========================================================
echo   MENJALANKAN BADMINTON CRM ONLINE (100%% GRATIS & AMAN)
echo ========================================================
echo.
echo 1. Memulai server Laravel internal...
start /b php artisan serve --host=127.0.0.1 --port=8000
timeout /t 2 /nobreak >nul
echo.
echo 2. Menghubungkan ke Cloudflare Tunnel publik...
echo.
echo Link website HTTPS aktif Anda akan muncul di bawah ini:
echo --------------------------------------------------------
cloudflared.exe tunnel --url http://127.0.0.1:8000
pause
