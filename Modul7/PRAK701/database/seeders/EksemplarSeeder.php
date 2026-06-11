<?php

namespace Database\Seeders;

use App\Models\EksemplarBuku;
use Illuminate\Database\Seeder;

class EksemplarSeeder extends Seeder
{
    public function run(): void
    {
        EksemplarBuku::create([
            'buku_id' => 1,
            'kode_barcode' => 'B-001',
            'kondisi' => 'baik',
            'status' => 'tersedia'
        ]);

        EksemplarBuku::create([
            'buku_id' => 1,
            'kode_barcode' => 'B-002',
            'kondisi' => 'baik',
            'status' => 'tersedia'
        ]);

        EksemplarBuku::create([
            'buku_id' => 2,
            'kode_barcode' => 'B-003',
            'kondisi' => 'baik',
            'status' => 'tersedia'
        ]);
    }
}
