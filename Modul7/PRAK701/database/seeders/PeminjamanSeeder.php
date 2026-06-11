<?php

namespace Database\Seeders;

use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;
use App\Models\EksemplarBuku;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PeminjamanSeeder extends Seeder
{
    public function run(): void
    {
        $trx1 = Peminjaman::create([
            'user_id' => 2, 
            'tanggal_pinjam' => Carbon::now()->format('Y-m-d'),
            'batas_kembali' => Carbon::now()->addDays(7)->format('Y-m-d'),
            'status' => 'berjalan'
        ]);

        DetailPeminjaman::create([
            'peminjaman_id' => $trx1->peminjaman_id,
            'eksemplar_id' => 1, 
            'denda' => 0,
            'status_denda' => 'nihil'
        ]);
        
        EksemplarBuku::where('eksemplar_id', 1)->update(['status' => 'dipinjam']);

        $trx2 = Peminjaman::create([
            'user_id' => 3, 
            'tanggal_pinjam' => Carbon::now()->subDays(10)->format('Y-m-d'),
            'batas_kembali' => Carbon::now()->subDays(3)->format('Y-m-d'),
            'status' => 'selesai'
        ]);

        DetailPeminjaman::create([
            'peminjaman_id' => $trx2->peminjaman_id,
            'eksemplar_id' => 3,
            'tanggal_dikembalikan' => Carbon::now()->subDays(1)->format('Y-m-d'),
            'denda' => 2000, 
            'status_denda' => 'belum_dibayar'
        ]);
    }
}