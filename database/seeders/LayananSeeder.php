<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Layanan; // <-- Import Model Layanan agar bisa kita gunakan

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Layanan::create([
            'nama' => 'Potong Rambut Pria',
            'deskripsi' => 'Gaya rambut modern dan klasik sesuai keinginan Anda.',
            'harga' => 50000,
            'gambar' => 'images/potong-rambut.jpg'
        ]);

        Layanan::create([
            'nama' => 'Creambath',
            'deskripsi' => 'Perawatan rambut untuk menutrisi dan merelaksasi kulit kepala.',
            'harga' => 75000,
            'gambar' => 'images/creambath.jpg'
        ]);

        Layanan::create([
            'nama' => 'Shaving & Trimming',
            'deskripsi' => 'Merapikan jenggot dan kumis untuk penampilan yang tajam.',
            'harga' => 35000,
            'gambar' => 'images/shaving.jpg'
        ]);

        Layanan::create([
            'nama' => 'Pewarnaan Rambut',
            'deskripsi' => 'Ubah penampilanmu dengan warna rambut baru yang cerah.',
            'harga' => 250000,
            'gambar' => 'images/coloring.jpg'
        ]);

        // Membuat 6 data bohongan lainnya agar total ada 10
        for ($i = 1; $i <= 6; $i++) {
            Layanan::create([
                'nama' => "Layanan Tambahan {$i}",
                'deskripsi' => "Deskripsi detail untuk layanan tambahan nomor {$i}.",
                'harga' => 25000 * $i,
                'gambar' => "images/tambahan-{$i}.jpg"
            ]);
        }
    }
}