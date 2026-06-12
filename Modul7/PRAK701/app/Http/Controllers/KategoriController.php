<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index() {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    public function create() {
        return view('kategori.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:kategori,nama_kategori'
        ], [
            'required' => 'Nama kategori wajib diisi.',
            'unique' => 'Nama kategori ini sudah ada.'
        ]);

        Kategori::create($request->all());
        return redirect('/kategori')->with('success', 'Kategori baru berhasil ditambahkan.');
    }

    public function edit($id) {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:kategori,nama_kategori,' . $id . ',kategori_id'
        ], [
            'required' => 'Nama kategori wajib diisi.',
            'unique' => 'Nama kategori ini sudah ada.'
        ]);

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
