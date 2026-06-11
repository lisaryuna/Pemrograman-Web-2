<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        Buku::create([
            'kategori_id' => 1,
            'judul' => 'Android Development dengan Jetpack Compose',
            'penulis' => 'Petani Kode',
            'penerbit' => 'Informatika',
            'tahun_terbit' => 2023
        ]);

        Buku::create([
            'kategori_id' => 1,
            'judul' => 'Clean Architecture',
            'penulis' => 'Robert C. Martin',
            'penerbit' => 'Scribner',
            'tahun_terbit' => 2017
        ]);
    }
}