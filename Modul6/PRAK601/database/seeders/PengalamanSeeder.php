<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengalamanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pengalaman') -> insert([
            [
                'judul' => 'Rangkaian PKKMB ULM 2024 (Universitas, Fakultas, dan Prodi)',
                'deskripsi' => 'Kegiatan pengenalan kehidupan kampus bagi mahasiswa baru yang terbagi menjadi tingkat universitas (13-14 Agustus), fakultas (15 Agustus), dan program studi (16 Agustus). Kegiatannya diisi dengan pengenalan kampus dan dinamika kerja kelompok.',
                'tanggal' => '13 - 16 Agustus 2024',
                'kesan' => 'Campur aduk, karena banyak capeknya juga. Tapi sangat menyenangkan saat bersama teman sekelompok PKKMB (kondan) karena kami sudah sering bonding. Cuman, ada rasa sedih ketika harus berpisah seharian di hari PKKMB prodi. Untungnya, saat harus berinteraksi dengan teman seprodi, sudah ada beberapa orang yang aku kenal sehingga tidak seburuk itu.',
                'gambar' => 'images/card1.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Kepanitiaan Vend IT 2025',
                'deskripsi' => 'Bertugas sebagai Koordinator Kesekretariatan dalam kepanitiaan Vend IT. Tim kesekretariatan ini beranggotakan 4 orang, yang terdiri dari 3 teman seangkatan (yang aku pilih sendiri) dan 1 kating angkatan 23.',
                'tanggal' => '1 - 15 September 2025',
                'kesan' => 'Sangat berkesan karena aku sangat menyukai dinamika anggota timnya walau hampir mati karena terkesan sibuk. Karena proker ini, aku jadi agak lebih dekat dengan salah satu teman seangkatan yang kebetulan juga teman sekostku waktu itu. Momen berangkat bareng ke tempat kegiatan membuat kepanitiaan ini terasa lebih seru dan dia yang paling sering aku mintai tolong untuk menyesuaikan absen dari begitu banyaknya rangkaian acara Vend IT dengan jumlah yang mendaftar.',
                'gambar' => 'images/card2.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Apresiasi UTS & UAS Interaksi Manusia dan Komputer (IMK)',
                'deskripsi' => 'Momen mendapatkan dua kali apresiasi dari dosen pengampu mata kuliah IMK, Pak Fahmi. Apresiasi pertama berupa kopi botol Taguk.ha yang diberikan pada 22 Oktober karena menjadi salah satu peraih nilai UTS terbaik. Apresiasi kedua berupa Roti Gembul (kalau ga salah ingat) yang didapatkan bersama teman sekelompok (tim 2 orang) karena terpilih sebagai salah satu tim terbaik setelah presentasi project UAS dan proses selama hampir 1 semester.',
                'tanggal' => '22 Oktober & 10 Desember 2025',
                'kesan' => 'Merasa senang dan tidak menyangka di mata kuliah ini dihargai dengan cara yang aku suka (dapat makan dan minum, walau aku tidak suka kopi). Hadiah kopi yang diberikan di tengah acara ARTECH lumayan menjadi penyemangat, dan bisa kembali mendapatkan apresiasi di akhir semester bersama partner setim membuat semua usaha mengerjakan project terasa sepadan dan berkesan.',
                'gambar' => 'images/card3.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Benchmarking x Standing dengan HIMA PSKPS 2026',
                'deskripsi' => 'Kegiatan studi banding antara HMTI dan HIMA PSKPS. Saat itu aku bagian HMTI Divisi Ristek (dulu aku Divisi Minbak), tmi-nya aku juga panitia proker ini. Acara ini diselenggarakan di ruangan RKB FKIK.',
                'tanggal' => '26 April 2026',
                'kesan' => 'Acaranya seru karena anak-anak HIMA PSKPS sangat heboh dan nampaknya kelebihan social energy, sampai kami juga ikut kepancing. Tapi jujur, aku kurang suka dengan ruangan yang dipakai di RKB FKIK. Secara pribadi, aku merasa ruang A-14 dan A-13 di FT ULM Banjarmasin jauh lebih bagus dan nyaman (emang).',
                'gambar' => 'images/card4.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
