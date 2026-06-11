@extends('layouts.app')
@section('title', 'Catat Peminjaman - PerpusTech')
@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-soft-periwinkle">Catat Peminjaman Baru</h1>
    <p class="text-gray-500 mt-1">Form sirkulasi pencatatan peminjaman buku oleh anggota.</p>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-periwinkle/30 p-8 max-w-2xl">
    <form action="/peminjaman" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="user_id" class="block text-sm font-medium text-gray-700 mb-1">Nama Anggota / Peminjam</label>
            <select id="user_id" name="user_id" class="w-full px-4 py-2.5 bg-ghost-white border border-periwinkle/50 rounded-lg focus:outline-none focus:ring-2 focus:ring-soft-periwinkle focus:border-transparent transition-colors">
                <option value="">Pilih Anggota</option>
                @foreach($user as $u)
                    <option value="{{ $u->user_id }}">{{ $u->nama_user }} (ID: {{ $u->user_id }})</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="eksemplar_id" class="block text-sm font-medium text-gray-700 mb-1">Pilih Buku (Barcode)</label>
            <select id="eksemplar_id" name="eksemplar_id" class="w-full px-4 py-2.5 bg-ghost-white border border-periwinkle/50 rounded-lg focus:outline-none focus:ring-2 focus:ring-soft-periwinkle focus:border-transparent transition-colors">
                <option value="">Pilih Buku yang Tersedia</option>
                @foreach($eksemplar as $eks)
                    <option value="{{ $eks->eksemplar_id }}">
                        {{ $eks->kode_barcode }} - {{ $eks->buku->judul }}
                    </option>
                @endforeach
            </select>
            @if($eksemplar->isEmpty())
                <p class="text-red-500 text-xs mt-1 font-medium">Tidak ada fisik buku yang tersedia di rak saat ini.</p>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="tanggal_pinjam" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pinjam</label>
                <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" value="{{ date('Y-m-d') }}"
                class="w-full px-4 py-2.5 bg-ghost-white border border-periwinkle/50 rounded-lg focus:outline-none focus:ring-2 focus:ring-soft-periwinkle focus:border-transparent transition-colors">
            </div>

            <div>
                <label for="batas_kembali" class="block text-sm font-medium text-gray-700 mb-1">Batas Waktu Pengembalian</label>
                <input type="date" id="batas_kembali" name="batas_kembali" value="{{ date('Y-m-d', strtotime('+7 days')) }}"
                class="w-full px-4 py-2.5 bg-ghost-white border border-periwinkle/50 rounded-lg focus:outline-none focus:ring-2 focus:ring-soft-periwinkle focus:border-transparent transition-colors">
            </div>
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
            <button type="submit" class="px-6 py-2.5 bg-soft-periwinkle hover:bg-periwinkle text-white font-medium rounded-lg transition-colors shadow-sm">
                Simpan Transaksi Sirkulasi
            </button>
            <a href="/peminjaman" class="px-6 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-colors text-center">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection