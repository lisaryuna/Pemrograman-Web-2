@extends('layouts.app')
@section('title', 'Dashboard - PerpusTech')
@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-soft-periwinkle">Dashboard</h1>
    <p class="text-gray-500 mt-2">Ringkasan sistem perpustakaan Anda hari ini.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-periwinkle/30 flex flex-col justify-between transition-transform hover:-translate-y-1">
        <div class="flex justify-between items-center mb-4">
            <span class="text-gray-500 text-sm font-medium tracking-wide uppercase">Katalog Buku</span>
            <span class="w-3 h-3 rounded-full bg-peach-fuzz"></span>
        </div>
        <div class="flex items-baseline gap-2">
            <h3 class="text-4xl font-bold text-gray-800 tracking-tight">{{ $totalBuku }}</h3>
            <span class="text-gray-400 text-sm">Judul</span>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-periwinkle/30 flex flex-col justify-between transition-transform hover:-translate-y-1">
        <div class="flex justify-between items-center mb-4">
            <span class="text-gray-500 text-sm font-medium tracking-wide uppercase">Eksemplar Fisik</span>
            <span class="w-3 h-3 rounded-full bg-periwinkle"></span>
        </div>
        <div class="flex items-baseline gap-2">
            <h3 class="text-4xl font-bold text-gray-800 tracking-tight">{{ $totalEksemplar }}</h3>
            <span class="text-gray-400 text-sm">Unit</span>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-periwinkle/30 flex flex-col justify-between transition-transform hover:-translate-y-1">
        <div class="flex justify-between items-center mb-4">
            <span class="text-gray-500 text-sm font-medium tracking-wide uppercase">Peminjaman Aktif</span>
            <span class="w-3 h-3 rounded-full bg-soft-periwinkle"></span>
        </div>
        <div class="flex items-baseline gap-2">
            <h3 class="text-4xl font-bold text-gray-800 tracking-tight">{{ $peminjamanAktif }}</h3>
            <span class="text-gray-400 text-sm">Transaksi</span>
        </div>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-periwinkle/30 p-6">
    <div class="border-b border-gray-100 pb-4 mb-4">
        <h2 class="text-xl font-bold text-gray-800">Aktivitas Peminjaman Terbaru</h2>
    </div>
    
    @if($aktivitasTerbaru->isEmpty())
        <div class="text-center py-12">
            <p class="text-gray-400 font-medium">Belum ada aktivitas peminjaman terdeteksi hari ini</p>
        </div>
    @else
        <div class="space-y-4">
            @foreach($aktivitasTerbaru as $aktivitas)
            <div class="flex items-center justify-between p-4 bg-ghost-white rounded-xl border border-gray-100">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-soft-periwinkle text-white flex items-center justify-center font-bold uppercase">
                        {{ substr($aktivitas->user->nama_user ?? 'U', 0, 1) }}
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">{{ $aktivitas->user->nama_user ?? 'User Dihapus' }}</p>
                        <p class="text-xs text-gray-500">Meminjam pada {{ $aktivitas->tanggal_pinjam }}</p>
                    </div>
                </div>
                <div>
                    <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $aktivitas->status == 'berjalan' ? 'bg-orange-50 text-orange-600' : 'bg-green-50 text-green-600' }}">
                        {{ strtoupper($aktivitas->status) }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-4 pt-4 border-t border-gray-100 text-center">
            @if(auth()->user()->peran === 'admin')
                <a href="/peminjaman" class="text-sm font-medium text-soft-periwinkle hover:text-periwinkle transition-colors">
                    Lihat Semua Sirkulasi &rarr;
                </a>
            @else
                <a href="/riwayat-pinjam" class="text-sm font-medium text-soft-periwinkle hover:text-periwinkle transition-colors">
                    Lihat Riwayat Pinjamanku &rarr;
                </a>
            @endif
        </div>
    @endif
</div>
@endsection