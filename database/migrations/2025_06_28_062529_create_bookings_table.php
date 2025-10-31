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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            // Kolom untuk data pelanggan
            $table->string('nama_pelanggan');
            $table->string('no_hp_pelanggan');

            // Kolom untuk menghubungkan ke tabel lain (Foreign Key)
            // Ini akan menyimpan ID dari layanan yang dipilih
            $table->foreignId('layanan_id')->constrained('layanans')->cascadeOnDelete();
            
            // Ini akan menyimpan ID dari capster yang dipilih
            $table->foreignId('capster_id')->constrained('capsters')->cascadeOnDelete();

            // Kolom untuk jadwal
            $table->date('tanggal_booking');
            $table->time('jam_booking');

            // Kolom untuk detail booking lainnya
            $table->integer('total_harga');
            $table->string('status')->default('pending'); // (pending, confirmed, canceled)
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
