@extends('layouts.app')
@section('title', 'Tambah Kategori - PerpusTech')
@section('content')
<div class="mb-8 flex items-center gap-4">
    <div class="w-12 h-12 rounded-2xl bg-white shadow-sm border border-periwinkle/30 flex items-center justify-center text-soft-periwinkle">
        <i class='bx bx-plus-circle text-2xl'></i>
    </div>
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Tambah Kategori</h1>
        <p class="text-gray-500 mt-0.5 text-sm">Buat golongan klasifikasi baru untuk koleksi buku.</p>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 p-8 max-w-xl">
    <form action="/kategori" method="POST" class="space-y-6">
        @csrf
        
        <div class="space-y-2">
            <label for="nama_kategori" class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Nama Kategori</label>
            <input type="text" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}"
            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-soft-periwinkle/20 focus:border-soft-periwinkle transition-all @error('nama_kategori') border-red-400 @enderror"
            placeholder="Contoh: Teknologi Informasi, Novel, dll." required>
            
            @error('nama_kategori')
                <p class="text-red-500 text-xs font-bold mt-1 flex items-center gap-1">
                    <i class='bx bx-error-circle'></i> {{ $message }}
                </p>
            @enderror
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
            <button type="submit" class="px-6 py-3 bg-soft-periwinkle hover:bg-indigo-600 text-white font-bold rounded-xl transition-all shadow-lg shadow-soft-periwinkle/20 active:scale-[0.98]">
                Simpan Kategori
            </button>
            <a href="/kategori" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold rounded-xl transition-all">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection