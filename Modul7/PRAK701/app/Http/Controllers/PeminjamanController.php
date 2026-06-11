<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;
use App\Models\EksemplarBuku;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index() {
        if (Auth::user()->peran !== 'admin') {
            abort(403, 'Akses Ditolak: Hanya Admin yang boleh membuka halaman sirkulasi.');
        }
        $peminjaman = Peminjaman::with(['user', 'detail'])->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create() {
        if (Auth::user()->peran !== 'admin') {
            abort(403, 'Akses Ditolak: Hanya Admin yang boleh mencatat peminjaman baru.');
        }
        $user = User::all();
        $eksemplar = EksemplarBuku::with('buku')->where('status', 'tersedia')->get();
        return view('peminjaman.create', compact('user', 'eksemplar'));
    }

    public function store(Request $request) {
        if (Auth::user()->peran !== 'admin') {
            abort(403, 'Akses Ditolak: Hanya Admin yang boleh menyimpan transaksi peminjaman.');
        }
        $request->validate([
            'user_id' => 'required',
            'eksemplar_id' => 'required', 
            'tanggal_pinjam' => 'required|date',
            'batas_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

        DB::transaction(function () use ($request) {
            $peminjaman = Peminjaman::create([
                'user_id' => $request->user_id,
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'batas_kembali' => $request->batas_kembali,
                'status' => 'berjalan'
            ]);

            DetailPeminjaman::create([
                'peminjaman_id' => $peminjaman->peminjaman_id,
                'eksemplar_id' => $request->eksemplar_id,
                'denda' => 0,
                'status_denda' => 'nihil'
            ]);

            EksemplarBuku::where('eksemplar_id', $request->eksemplar_id)
                ->update(['status' => 'dipinjam']);
        });

        return redirect('/peminjaman')->with('success', 'Sirkulasi peminjaman baru berhasil dicatat.');
    }

    public function kembalikan($id) {
        if (Auth::user()->peran !== 'admin') {
            abort(403, 'Akses Ditolak: Hanya Admin yang berhak memproses pengembalian buku.');
        }
        $peminjaman = Peminjaman::with('detail')->findOrFail($id);
        $tanggalKembali = Carbon::now();
        $batasKembali = Carbon::parse($peminjaman->batas_kembali);
        
        $denda = 0;
        if ($tanggalKembali->gt($batasKembali)) {
            $denda = $tanggalKembali->diffInDays($batasKembali) * 1000;
        }

        DB::transaction(function () use ($peminjaman, $tanggalKembali, $denda) {
            $peminjaman->update(['status' => 'selesai']);

            foreach($peminjaman->detail as $detail) {
                $detail->update([
                    'tanggal_dikembalikan' => $tanggalKembali->format('Y-m-d'),
                    'denda' => $denda,
                    'status_denda' => $denda > 0 ? 'belum_dibayar' : 'nihil'
                ]);

                EksemplarBuku::where('eksemplar_id', $detail->eksemplar_id)
                    ->update(['status' => 'tersedia']);
            }
        });

        return redirect('/peminjaman')->with('success', 'Buku dikembalikan. Denda: Rp ' . number_format($denda, 0, ',', '.'));
    }

    public function show($id){
        if (Auth::user()->peran !== 'admin') {
            abort(403, 'Akses Ditolak: Hanya Admin yang boleh melihat detail nota transaksi ini.');
        }
        $peminjaman = Peminjaman::with(['user', 'detail.eksemplar.buku'])->findOrFail($id);
        return view('peminjaman.show', compact('peminjaman'));
    }

    public function riwayat(){
        $peminjaman = Peminjaman::with('detail.eksemplar.buku')
            ->where('user_id', Auth::id())
            ->orderBy('dibuat_pada', 'desc')
            ->get();
            
        return view('peminjaman.riwayat', compact('peminjaman'));
    }
}