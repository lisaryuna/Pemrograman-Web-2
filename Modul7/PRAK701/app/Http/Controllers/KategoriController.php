<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Requests\KategoriRequest;

class KategoriController extends Controller
{
    public function index() {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    public function create() {
        return view('kategori.create');
    }

    public function store(KategoriRequest $request) {
        Kategori::create($request->all());
        return redirect('/kategori')->with('success', 'Kategori baru berhasil ditambahkan.');
    }

    public function edit($id) {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(KategoriRequest $request, $id) {
        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());
        return redirect('/kategori')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id) {
    try {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        
        return redirect('/kategori')->with('success', 'Kategori berhasil dihapus.');
    } catch (\Illuminate\Database\QueryException $e) {
        return redirect('/kategori')->with('error', 'Gagal dihapus: Kategori ini masih digunakan oleh buku.');
    }
}
}
