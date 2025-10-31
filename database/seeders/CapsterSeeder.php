<?php

namespace Database\Seeders;

use App\Models\Capster; // <-- Import Model Capster
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CapsterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Capster::create([
            'nama' => 'Andi "The Snipper" Saputra',
            'deskripsi' => 'Spesialis gaya rambut klasik dan modern fade.',
            'foto' => 'images/capsters/andi.jpg',
        ]);

        Capster::create([
            'nama' => 'Budi "Razor" Santoso',
            'deskripsi' => 'Ahli dalam hot towel shave dan perawatan jenggot.',
            'foto' => 'images/capsters/budi.jpg',
        ]);

        Capster::create([
            'nama' => 'Citra "The Stylist" Lestari',
            'deskripsi' => 'Kreatif dengan pewarnaan rambut dan gaya-gaya unik.',
            'foto' => 'images/capsters/citra.jpg',
        ]);
    }
}