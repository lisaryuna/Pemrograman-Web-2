<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Http\Requests\BukuRequest;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request) {
        $query = Buku::with('kategori', 'eksemplar')
            ->withCount(['eksemplar as stok_tersedia' => function ($q) {
                $q->where('status', 'tersedia');
            }]);

        if ($request->has('kategori_id') && $request->kategori_id != '') {
            $query->where('kategori_id', $request->kategori_id);
        }

        $buku = $query->get();
        $kategori = Kategori::all();
        return view('buku.index', compact('buku', 'kategori'));
    }

    public function create() {
        $kategori = Kategori::all();
        return view('buku.create', compact('kategori'));
    }

    public function store(BukuRequest $request) {
        Buku::create($request->all());
        return redirect('/buku')->with('success', 'Data buku berhasil ditambahkan ke katalog.');
    }

    public function edit($id) {
        $buku = Buku::findOrFail($id);
        $kategori = Kategori::all();
        return view('buku.edit', compact('buku', 'kategori'));
    }

    public function update(BukuRequest $request, $id) {
        $buku = Buku::findOrFail($id);
        $buku->update($request->all());
        return redirect('/buku')->with('success', 'Data buku berhasil diperbarui.');
    }

    public function destroy($id) {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect('/buku')->with('success', 'Data buku berhasil dihapus dari katalog.');
    }
}