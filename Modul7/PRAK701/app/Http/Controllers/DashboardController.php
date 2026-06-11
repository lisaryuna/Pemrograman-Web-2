<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\EksemplarBuku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Buku::count();
        $totalEksemplar = EksemplarBuku::count();
        $peminjamanAktif = Peminjaman::where('status', 'berjalan')->count();

        $aktivitasTerbaru = Peminjaman::with('user')
            ->orderBy('dibuat_pada', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact('totalBuku', 'totalEksemplar', 'peminjamanAktif', 'aktivitasTerbaru'));
    }
}