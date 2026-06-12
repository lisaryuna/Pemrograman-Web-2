@extends('layouts.app')
@section('title', 'Dashboard - PerpusTech')
@section('content')
<div class="mb-8 flex items-center gap-4">
    <div class="w-12 h-12 rounded-2xl bg-white shadow-sm border border-periwinkle/30 flex items-center justify-center text-soft-periwinkle">
        <i class='bx bxs-dashboard text-2xl'></i>
    </div>
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
        <p class="text-gray-500 mt-0.5 text-sm">Ringkasan sistem sirkulasi perpustakaan hari ini.</p>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1.5 hover:shadow-[0_8px_25px_rgba(147,129,255,0.15)] group">
        <div class="flex justify-between items-start mb-4">
            <span class="text-gray-400 text-xs font-bold tracking-widest uppercase">Katalog Buku</span>
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-peach-fuzz to-orange-200 text-orange-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                <i class='bx bx-book-open text-xl'></i>
            </div>
        </div>
        <div class="flex items-baseline gap-2">
            <h3 class="text-4xl font-extrabold text-gray-800 tracking-tight">{{ $totalBuku }}</h3>
            <span class="text-gray-400 text-sm font-medium">Judul</span>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1.5 hover:shadow-[0_8px_25px_rgba(147,129,255,0.15)] group">
        <div class="flex justify-between items-start mb-4">
            <span class="text-gray-400 text-xs font-bold tracking-widest uppercase">Eksemplar Fisik</span>
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-periwinkle to-indigo-300 text-white flex items-center justify-center group-hover:scale-110 transition-transform">
                <i class='bx bx-layer text-xl'></i>
            </div>
        </div>
        <div class="flex items-baseline gap-2">
            <h3 class="text-4xl font-extrabold text-gray-800 tracking-tight">{{ $totalEksemplar }}</h3>
            <span class="text-gray-400 text-sm font-medium">Unit</span>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1.5 hover:shadow-[0_8px_25px_rgba(147,129,255,0.15)] group">
        <div class="flex justify-between items-start mb-4">
            <span class="text-gray-400 text-xs font-bold tracking-widest uppercase">Peminjaman Aktif</span>
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-soft-periwinkle to-purple-500 text-white flex items-center justify-center group-hover:scale-110 transition-transform">
                <i class='bx bx-transfer text-xl'></i>
            </div>
        </div>
        <div class="flex items-baseline gap-2">
            <h3 class="text-4xl font-extrabold text-gray-800 tracking-tight">{{ $peminjamanAktif }}</h3>
            <span class="text-gray-400 text-sm font-medium">Transaksi</span>
        </div>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 p-6 md:p-8">
    <div class="flex justify-between items-center border-b border-gray-100 pb-4 mb-6">
        <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2">
            <i class='bx bx-pulse text-soft-periwinkle text-xl'></i> Aktivitas Peminjaman Terbaru
        </h2>
    </div>
    
    @if($aktivitasTerbaru->isEmpty())
        <div class="text-center py-16 flex flex-col items-center">
            <i class='bx bx-ghost text-6xl text-gray-200 mb-4'></i>
            <p class="text-gray-400 font-medium">Belum ada aktivitas peminjaman hari ini.</p>
        </div>
    @else
        <div class="space-y-3">
            @foreach($aktivitasTerbaru as $aktivitas)
            <div class="group flex items-center justify-between p-4 bg-white hover:bg-gray-50 rounded-xl border border-gray-100 transition-colors">
                <div class="flex items-center gap-4">
                    <div class="w-11 h-11 rounded-full bg-gradient-to-tr from-peach-fuzz to-orange-200 text-orange-700 flex items-center justify-center font-bold text-lg shadow-sm border-2 border-white">
                        {{ substr($aktivitas->user->nama_user ?? 'U', 0, 1) }}
                    </div>
                    <div>
                        <p class="font-bold text-gray-800">{{ $aktivitas->user->nama_user ?? 'User Dihapus' }}</p>
                        <p class="text-xs text-gray-400 font-medium flex items-center gap-1 mt-0.5">
                            <i class='bx bx-calendar-event'></i> Meminjam pada {{ $aktivitas->tanggal_pinjam }}
                        </p>
                    </div>
                </div>
                <div>
                    <span class="px-3 py-1.5 text-[11px] font-bold tracking-wide rounded-full border {{ $aktivitas->status == 'berjalan' ? 'bg-orange-50 text-orange-600 border-orange-200' : 'bg-green-50 text-green-600 border-green-200' }}">
                        {{ strtoupper($aktivitas->status) }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="mt-6 pt-6 border-t border-gray-100 text-center">
            <a href="{{ auth()->user()->peran === 'admin' ? '/peminjaman' : '/riwayat-pinjam' }}" class="inline-flex items-center gap-1 text-sm font-bold text-soft-periwinkle hover:text-periwinkle transition-colors bg-soft-periwinkle/5 px-4 py-2 rounded-lg">
                Lihat Selengkapnya <i class='bx bx-right-arrow-alt text-lg'></i>
            </a>
        </div>
    @endif
</div>
@endsection