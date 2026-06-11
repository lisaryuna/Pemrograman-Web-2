@extends('layouts.app')
@section('title', 'Tambah Kategori - PerpusTech')
@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-soft-periwinkle">Tambah Kategori Baru</h1>
    <p class="text-gray-500 mt-1">Buat golongan klasifikasi baru untuk buku.</p>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-periwinkle/30 p-8 max-w-xl">
    <form action="/kategori" method="POST" class="space-y-6">
        @csrf
        <div>
            <label for="nama_kategori" class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
            <input type="text" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}"
            class="w-full px-4 py-2.5 bg-ghost-white border border-periwinkle/50 rounded-lg focus:outline-none focus:ring-2 focus:ring-soft-periwinkle focus:border-transparent transition-colors @error('nama_kategori') border-red-400 @enderror"
            placeholder="Contoh: Filsafat, Seni, Biografi">
            @error('nama_kategori')
                <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
            <button type="submit" class="px-6 py-2.5 bg-soft-periwinkle hover:bg-periwinkle text-white font-medium rounded-lg transition-colors shadow-sm">
                Simpan Kategori
            </button>
            <a href="/kategori" class="px-6 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-colors text-center">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection