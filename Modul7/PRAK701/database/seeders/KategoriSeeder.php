<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama_kategori' => 'Teknologi Informasi'],
            ['nama_kategori' => 'Sains & Matematika'],
            ['nama_kategori' => 'Novel & Sastra'],
            ['nama_kategori' => 'Sejarah & Budaya'],
        ];

        foreach ($data as $kat) {
            Kategori::create($kat);
        }
    }
}
