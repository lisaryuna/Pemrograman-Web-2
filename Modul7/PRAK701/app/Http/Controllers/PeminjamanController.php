<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;
use App\Models\EksemplarBuku;
use App\Models\User;
use App\Http\Requests\PeminjamanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index() {
        $peminjaman = Peminjaman::with(['user', 'detail'])->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create() {
        $user = User::all();
        $eksemplar = EksemplarBuku::with('buku')->where('status', 'tersedia')->get();
        return view('peminjaman.create', compact('user', 'eksemplar'));
    }

    public function store(PeminjamanRequest $request) {
        try {
            DB::transaction(function () use ($request) {
                $eksemplar = EksemplarBuku::where('eksemplar_id', $request->eksemplar_id)
                    ->where('status', 'tersedia')
                    ->lockForUpdate()
                    ->first();

                if (!$eksemplar) {
                    throw new \Exception("Maaf, buku ini baru saja dipinjam atau stok fisik tidak tersedia saat ini.");
                }
                
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

                $eksemplar->update(['status' => 'dipinjam']);
            });
            return redirect('/peminjaman')->with('success', 'Sirkulasi peminjaman baru berhasil dicatat.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function kembalikan($id) {
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

    public function bayarDenda($detail_id) {  
        $detail = DetailPeminjaman::findOrFail($detail_id);
        $detail->update(['status_denda' => 'lunas']);
        
        return back()->with('success', 'Pembayaran denda berhasil dikonfirmasi.');
    }
}