@extends('layouts.app')
@section('title', 'Edit Data Buku - PerpusTech')
@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-soft-periwinkle">Edit Data Buku</h1>
    <p class="text-gray-500 mt-1">Perbarui informasi detail buku ini.</p>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-periwinkle/30 p-8 max-w-2xl">
    <form action="/buku/{id}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul Buku</label>
            <input type="text" id="judul" name="judul" value="{{ old('judul', 'Android Development dengan Jetpack Compose') }}"
            class="w-full px-4 py-2.5 bg-ghost-white border border-periwinkle/50 rounded-lg focus:outline-none focus:ring-2 focus:ring-soft-periwinkle focus:border-transparent transition-colors 
            @error('judul') border-red-400 @enderror">
            @error('judul')
                <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="penulis" class="block text-sm font-medium text-gray-700 mb-1">Penulis</label>
            <input type="text" id="penulis" name="penulis" value="{{ old('penulis', 'Petani Kode') }}"
            class="w-full px-4 py-2.5 bg-ghost-white border border-periwinkle/50 rounded-lg focus:outline-none focus:ring-2 focus:ring-soft-periwinkle focus:border-transparent transition-colors 
            @error('penulis') border-red-400 @enderror">
            @error('penulis')
                <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="penerbit" class="block text-sm font-medium text-gray-700 mb-1">Penerbit</label>
            <input type="text" id="penerbit" name="penerbit" value="{{ old('penerbit', 'Informatika') }}"
            class="w-full px-4 py-2.5 bg-ghost-white border border-periwinkle/50 rounded-lg focus:outline-none focus:ring-2 focus:ring-soft-periwinkle focus:border-transparent transition-colors 
            @error('penerbit') border-red-400 @enderror">
            @error('penerbit')
                    <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                @enderror
        </div>

        <div>
            <label for="tahun_terbit" class="block text-sm font-medium text-gray-700 mb-1">Tahun Terbit</label>
            <input type="number" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit', 2023) }}" min="1800" max="2026"
            class="w-full px-4 py-2.5 bg-ghost-white border border-periwinkle/50 rounded-lg focus:outline-none focus:ring-2 focus:ring-soft-periwinkle focus:border-transparent transition-colors 
            @error('tahun_terbit') border-red-400 @enderror">
            <p class="text-xs text-gray-400 mt-1">Rentang tahun valid: 1800 - 2026</p>
            @error('tahun_terbit')
                <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
            <button type="submit" class="px-6 py-2.5 bg-soft-periwinkle hover:bg-periwinkle text-white font-medium rounded-lg transition-colors shadow-sm">
                Simpan Perubahan
            </button>
            <a href="/buku" class="px-6 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-colors text-center">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection