@extends('layouts.app')
@section('title', 'Detail Transaksi Peminjaman - PerpusTech')
@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-3xl font-bold text-soft-periwinkle">Detail Peminjaman</h1>
        <p class="text-gray-500 mt-1">Kode Transaksi: TRX-{{ $peminjaman->peminjaman_id }}</p>
    </div>
    <a href="/peminjaman" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg text-sm transition-colors">
        Kembali ke Daftar
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white p-6 rounded-2xl border border-periwinkle/30 shadow-sm">
        <h2 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2">Informasi Peminjam</h2>
        <div class="space-y-3 text-sm">
            <p><span class="text-gray-400 block">Nama Anggota:</span> <strong class="text-gray-800 text-base">{{ $peminjaman->user->nama_user }}</strong></p>
            <p><span class="text-gray-400 block">Email:</span> <span class="text-gray-700">{{ $peminjaman->user->email }}</span></p>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-periwinkle/30 shadow-sm">
        <h2 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2">Durasi & Status</h2>
        <div class="grid grid-cols-2 gap-4 text-sm mb-4">
            <div>
                <span class="text-gray-400 block">Tanggal Pinjam</span>
                <strong class="text-gray-700">{{ $peminjaman->tanggal_pinjam }}</strong>
            </div>
            <div>
                <span class="text-gray-400 block">Batas Kembali</span>
                <strong class="text-gray-700">{{ $peminjaman->batas_kembali }}</strong>
            </div>
        </div>
        <div class="pt-2 border-t border-gray-100 flex justify-between items-center">
            <div>
                <span class="text-gray-400 text-xs block">Total Denda</span>
                <span class="text-xl font-bold text-red-500">Rp {{ number_format($peminjaman->detail->sum('denda'), 0, ',', '.') }}</span>
            </div>
            <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $peminjaman->status == 'berjalan' ? 'bg-orange-50 text-orange-600' : 'bg-green-50 text-green-600' }}">
                {{ strtoupper($peminjaman->status) }}
            </span>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-periwinkle/30 shadow-sm md:col-span-2">
        <h2 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2">Daftar Buku Yang Dipinjam</h2>
        <div class="space-y-3">
            @foreach($peminjaman->detail as $det)
                <div class="flex justify-between items-center text-sm text-gray-700 bg-ghost-white p-3 rounded-lg border border-gray-100">
                    <div>
                        <strong class="block text-gray-800">{{ $det->eksemplar->buku->judul }}</strong>
                        <span class="text-xs text-gray-500">Barcode Fisik: {{ $det->eksemplar->kode_barcode }}</span>
                    </div>
                    <div class="text-right">
                        @if($det->tanggal_dikembalikan)
                            <span class="text-xs text-green-600 font-medium block">Dikembalikan: {{ $det->tanggal_dikembalikan }}</span>
                        @else
                            <span class="text-xs text-orange-500 font-medium block">Belum Dikembalikan</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection