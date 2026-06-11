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
            <h3 class="text-4xl font-bold text-gray-800 tracking-tight">120</h3>
            <span class="text-gray-400 text-sm">Judul</span>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-periwinkle/30 flex flex-col justify-between transition-transform hover:-translate-y-1">
        <div class="flex justify-between items-center mb-4">
            <span class="text-gray-500 text-sm font-medium tracking-wide uppercase">Eksemplar Fisik</span>
            <span class="w-3 h-3 rounded-full bg-periwinkle"></span>
        </div>
        <div class="flex items-baseline gap-2">
            <h3 class="text-4xl font-bold text-gray-800 tracking-tight">350</h3>
            <span class="text-gray-400 text-sm">Unit</span>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-periwinkle/30 flex flex-col justify-between transition-transform hover:-translate-y-1">
        <div class="flex justify-between items-center mb-4">
            <span class="text-gray-500 text-sm font-medium tracking-wide uppercase">Peminjaman Aktif</span>
            <span class="w-3 h-3 rounded-full bg-soft-periwinkle"></span>
        </div>
        <div class="flex items-baseline gap-2">
            <h3 class="text-4xl font-bold text-gray-800 tracking-tight">12</h3>
            <span class="text-gray-400 text-sm">Transaksi</span>
        </div>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-periwinkle/30 p-6">
    <div class="border-b border-gray-100 pb-4 mb-4">
        <h2 class="text-xl font-bold text-gray-800">Aktivitas Terbaru</h2>
    </div>
    <div class="text-center py-12">
        <p class="text-gray-400 font-medium">Belum ada aktivitas peminjaman terdeteksi hari ini</p>
    </div>
</div>
@endsection