<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengalamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengalaman') -> insert([
            [
                'judul' => 'Sesuatu',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, doloremque.',
                'tanggal' => '24 - 26 Oktober 2025',
                'kesan' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, doloremque.',
                'gambar' => 'https://source.unsplash.com/random/300x300/?nature',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Sesuatu',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, doloremque.',
                'tanggal' => '24 - 26 Oktober 2025',
                'kesan' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, doloremque.',
                'gambar' => 'https://source.unsplash.com/random/300x300/?nature',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
