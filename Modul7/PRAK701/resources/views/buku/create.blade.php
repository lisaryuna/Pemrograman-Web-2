@extends('layouts.app')
@section('title', 'Tambah Buku Baru - PerpusTech')
@section('content')
<div class="mb-8 flex items-center gap-4">
    <div class="w-12 h-12 rounded-2xl bg-white shadow-sm border border-periwinkle/30 flex items-center justify-center text-soft-periwinkle">
        <i class='bx bx-plus-circle text-2xl'></i>
    </div>
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Tambah Buku Baru</h1>
        <p class="text-gray-500 mt-0.5 text-sm">Masukkan detail informasi buku ke dalam katalog sistem.</p>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 p-8 max-w-2xl">
    <form action="/buku" method="POST" class="space-y-6">
        @csrf

        <div class="space-y-2">
            <label for="kategori_id" class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Kategori</label>
            <select id="kategori_id" name="kategori_id" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-soft-periwinkle/20 focus:border-soft-periwinkle transition-all @error('kategori_id') border-red-400 @enderror">
                <option value="">Pilih Kategori</option>
                @foreach($kategori as $kat)
                    <option value="{{ $kat->kategori_id }}" {{ old('kategori_id') == $kat->kategori_id ? 'selected' : '' }}>
                        {{ $kat->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id') <p class="text-red-500 text-xs font-bold">{{ $message }}</p> @enderror
        </div>

        <div class="space-y-2">
            <label for="judul" class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Judul Buku</label>
            <input type="text" id="judul" name="judul" value="{{ old('judul') }}"
            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-soft-periwinkle/20 focus:border-soft-periwinkle transition-all @error('judul') border-red-400 @enderror"
            placeholder="Contoh: Android Development dengan Jetpack Compose">
            @error('judul') <p class="text-red-500 text-xs font-bold">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label for="penulis" class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Penulis</label>
                <input type="text" id="penulis" name="penulis" value="{{ old('penulis') }}"
                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-soft-periwinkle/20 focus:border-soft-periwinkle transition-all @error('penulis') border-red-400 @enderror">
            </div>
            <div class="space-y-2">
                <label for="penerbit" class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Penerbit</label>
                <input type="text" id="penerbit" name="penerbit" value="{{ old('penerbit') }}"
                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-soft-periwinkle/20 focus:border-soft-periwinkle transition-all @error('penerbit') border-red-400 @enderror">
            </div>
        </div>

        <div class="space-y-2">
            <label for="tahun_terbit" class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Tahun Terbit</label>
            <input type="number" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit') }}" min="1800" max="2026"
            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-soft-periwinkle/20 focus:border-soft-periwinkle transition-all @error('tahun_terbit') border-red-400 @enderror">
            @error('tahun_terbit') <p class="text-red-500 text-xs font-bold">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
            <button type="submit" class="px-6 py-3 bg-soft-periwinkle hover:bg-indigo-600 text-white font-bold rounded-xl transition-all shadow-lg shadow-soft-periwinkle/20">
                Simpan Buku
            </button>
            <a href="/buku" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold rounded-xl transition-all">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection