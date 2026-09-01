<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    protected $table    = 'lapangan';
    protected $fillable = ['nama_lapangan', 'deskripsi', 'harga_weekday', 'harga_weekend', 'status', 'foto'];

    public function jadwals()  { return $this->hasMany(Jadwal::class); }
    public function bookings() { return $this->hasMany(Booking::class); }

    public function getFotoUrlAttribute(): string
    {
        if ($this->foto) {
            return asset('storage/' . $this->foto);
        }

        // Default fallback images based on ID or name
        if (str_contains(strtolower($this->nama_lapangan), '3') || $this->id == 3) {
            return asset('images/lapangan/lapangan-3.jpg');
        }
        if (str_contains(strtolower($this->nama_lapangan), '2') || $this->id == 2) {
            return asset('images/lapangan/lapangan-2.jpg');
        }

        return asset('images/lapangan/lapangan-1.jpg');
    }
}
