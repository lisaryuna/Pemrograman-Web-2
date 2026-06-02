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
            'hobi' => 'Listening to music and reading any kind of things that I can Read',
            'skill' => 'Java, Kotlin, PHP, HTML, CSS',
            'foto' => 'images/profile.jpeg',
        ];
    }
}