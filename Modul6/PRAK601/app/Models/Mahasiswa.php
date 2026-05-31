<?php

namespace App\Models;

class Mahasiswa 
{
    public static function getProfile()
    {
        return [
            'nama' => 'Noor Khalisa',
            'nim' => '2410817220012',
            'prodi' => 'Teknologi Informasi',
            'fakultas' => 'Teknik',
            'universitas' => 'Universitas Lambung Mangkurat',
            'skill' => 'Java, Kotlin, PHP, HTML, CSS',
            'foto' => 'images/profile.jpeg',
        ];
    }
}
