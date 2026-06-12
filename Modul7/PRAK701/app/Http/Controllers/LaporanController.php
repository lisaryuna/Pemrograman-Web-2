<?php

namespace App\Http\Controllers;

use App\Models\RiwayatStok;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function stok() {
        $riwayat = RiwayatStok::with('buku')
            ->orderBy('dibuat_pada', 'desc')
            ->get();
            
        return view('laporan.stok', compact('riwayat'));
    }
}