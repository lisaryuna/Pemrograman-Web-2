<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request) {
        $query = Buku::with('kategori');

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

    public function store(Request $request) {
        $request->validate([
            'kategori_id' => 'required',
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:150',
            'penerbit' => 'required|string|max:150',
            'tahun_terbit' => 'required|integer|between:1800,2026'
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'tahun_terbit.between' => 'Tahun terbit tidak valid (1800 - 2026).',
            'integer' => 'Kolom :attribute harus berupa angka.'
        ]);

        Buku::create($request->all());
        return redirect('/buku')->with('success', 'Data buku berhasil ditambahkan ke katalog.');
    }

    public function edit($id) {
        $buku = Buku::findOrFail($id);
        $kategori = Kategori::all();
        return view('buku.edit', compact('buku', 'kategori'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'kategori_id' => 'required',
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:150',
            'penerbit' => 'required|string|max:150',
            'tahun_terbit' => 'required|integer|between:1800,2026'
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'tahun_terbit.between' => 'Tahun terbit tidak valid (1800 - 2026).',
            'integer' => 'Kolom :attribute harus berupa angka.'
        ]);

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