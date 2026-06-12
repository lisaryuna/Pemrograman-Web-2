<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\EksemplarBuku;
use App\Models\RiwayatStok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EksemplarController extends Controller
{
    public function index($buku_id) {
        $buku = Buku::with('eksemplar')->findOrFail($buku_id);
        return view('eksemplar.index', compact('buku'));
    }

    public function store(Request $request, $buku_id) {
        $request->validate(['kode_barcode' => 'required|unique:eksemplar_buku,kode_barcode']);

        DB::transaction(function () use ($request, $buku_id) {
            EksemplarBuku::create([
                'buku_id' => $buku_id,
                'kode_barcode' => $request->kode_barcode,
                'kondisi' => 'baik',
                'status' => 'tersedia'
            ]);

            RiwayatStok::create([
                'buku_id' => $buku_id,
                'jenis_transaksi' => 'masuk',
                'jumlah' => 1,
                'keterangan' => 'Penambahan stok baru. Barcode: ' . $request->kode_barcode
            ]);
        });
        return back()->with('success', 'Unit buku baru berhasil ditambahkan.');
    }

    public function update(Request $request, $id) {
        $eksemplar = EksemplarBuku::findOrFail($id);
        
        DB::transaction(function () use ($request, $eksemplar) {
            $eksemplar->update([
                'kondisi' => $request->kondisi,
                'status' => $request->status
            ]);

            if ($request->status == 'hilang' || $request->kondisi == 'rusak_berat') {
                RiwayatStok::create([
                    'buku_id' => $eksemplar->buku_id,
                    'jenis_transaksi' => 'penyesuaian',
                    'jumlah' => -1,
                    'keterangan' => 'Buku dilaporkan ' . $request->status . '/' . str_replace('_', ' ', $request->kondisi) . '. Barcode: ' . $eksemplar->kode_barcode
                ]);
            }
        });

        return back()->with('success', 'Kondisi fisik buku berhasil diperbarui.');
    }

    public function destroy($id) {
        $eksemplar = EksemplarBuku::findOrFail($id);
        
        DB::transaction(function () use ($eksemplar) {
            RiwayatStok::create([
                'buku_id' => $eksemplar->buku_id,
                'jenis_transaksi' => 'keluar',
                'jumlah' => -1,
                'keterangan' => 'Penghapusan permanen dari sistem. Barcode: ' . $eksemplar->kode_barcode
            ]);
            
            $eksemplar->delete();
        });

        return back()->with('success', 'Unit fisik dihapus dan dicatat di Laporan Stok.');
    }
}