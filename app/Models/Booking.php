<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * Ini adalah daftar kolom yang boleh diisi secara massal.
     */
    protected $fillable = [
        'nama_pelanggan',
        'no_hp_pelanggan',
        'layanan_id',
        'capster_id',
        'tanggal_booking',
        'jam_booking',
        'total_harga',
        'status',
    ];

    /**
     * Mendefinisikan relasi "belongsTo" ke model Layanan.
     * Artinya: "Satu Booking ini milik satu Layanan".
     */
    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    /**
     * Mendefinisikan relasi "belongsTo" ke model Capster.
     * Artinya: "Satu Booking ini milik satu Capster".
     */
    public function capster()
    {
        return $this->belongsTo(Capster::class);
    }
}
