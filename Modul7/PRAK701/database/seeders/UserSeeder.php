<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nama_user' => 'Administrator',
            'email' => 'admin@perpustech.com',
            'kata_sandi' => Hash::make('password123'),
            'peran' => 'admin',
        ]);

        $anggota = [
            ['nama_user' => 'Lisa', 'email' => 'lisa@gmail.com'],
            ['nama_user' => 'Febriana', 'email' => 'febriana@gmail.com'],
            ['nama_user' => 'Andi Wijaya', 'email' => 'andi@gmail.com'],
        ];

        foreach ($anggota as $user) {
            User::create([
                'nama_user' => $user['nama_user'],
                'email' => $user['email'],
                'kata_sandi' => Hash::make('password123'),
                'peran' => 'anggota',
            ]);
        }
    }
}
