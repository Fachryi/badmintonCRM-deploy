<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->index(['status_verifikasi', 'created_at'], 'idx_pembayaran_verif_created');
        });

        Schema::table('membership_payments', function (Blueprint $table) {
            $table->index(['lapangan_id', 'hari', 'status_verifikasi'], 'idx_mp_lapangan_hari_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->dropIndex('idx_pembayaran_verif_created');
        });

        Schema::table('membership_payments', function (Blueprint $table) {
            $table->dropIndex('idx_mp_lapangan_hari_status');
        });
    }
};
