@extends('layouts.app')
@section('title', 'Detail Transaksi - PerpusTech')
@section('content')
<div class="mb-8 flex justify-between items-center">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Detail Peminjaman</h1>
        <p class="text-gray-500 mt-1 flex items-center gap-2">
            <i class='bx bx-barcode-reader'></i> Kode Transaksi: <span class="font-mono font-bold text-soft-periwinkle">TRX-{{ $peminjaman->peminjaman_id }}</span>
        </p>
    </div>
    <a href="/peminjaman" class="px-5 py-2.5 bg-white border border-gray-200 hover:bg-gray-50 text-gray-700 font-bold rounded-xl text-sm transition-all flex items-center gap-2">
        <i class='bx bx-arrow-back'></i> Kembali
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.03)]">
        <h2 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-4 flex items-center gap-2">
            <i class='bx bx-user'></i> Informasi Peminjam
        </h2>
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-soft-periwinkle to-indigo-300 text-white flex items-center justify-center font-bold text-lg shadow-sm">
                {{ substr($peminjaman->user->nama_user, 0, 1) }}
            </div>
            <div>
                <strong class="block text-gray-800 text-lg">{{ $peminjaman->user->nama_user }}</strong>
                <span class="text-gray-500 text-sm flex items-center gap-1"><i class='bx bx-envelope'></i> {{ $peminjaman->user->email }}</span>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.03)]">
        <h2 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-4 flex items-center gap-2">
            <i class='bx bx-calendar-check'></i> Durasi & Status
        </h2>
        <div class="flex justify-between items-end">
            <div class="space-y-3">
                <div>
                    <span class="text-xs text-gray-400 block font-bold">TANGGAL PINJAM</span>
                    <strong class="text-gray-700">{{ $peminjaman->tanggal_pinjam }}</strong>
                </div>
                <div>
                    <span class="text-xs text-gray-400 block font-bold">BATAS KEMBALI</span>
                    <strong class="text-gray-700">{{ $peminjaman->batas_kembali }}</strong>
                </div>
            </div>
            <div class="text-right">
                <span class="text-xs text-gray-400 block font-bold">TOTAL DENDA</span>
                <span class="text-2xl font-black text-red-500">Rp {{ number_format($peminjaman->detail->sum('denda'), 0, ',', '.') }}</span>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.03)] md:col-span-2">
        <h2 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-6 flex items-center gap-2">
            <i class='bx bx-book-stack'></i> Daftar Buku Dipinjam
        </h2>
        <div class="space-y-3">
            @foreach($peminjaman->detail as $det)
                <div class="flex justify-between items-center bg-gray-50 p-4 rounded-xl border border-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-white border flex items-center justify-center text-soft-periwinkle">
                            <i class='bx bx-book'></i>
                        </div>
                        <div>
                            <strong class="block text-gray-800 font-bold">{{ $det->eksemplar->buku->judul }}</strong>
                            <span class="text-xs text-gray-400 font-medium tracking-wide">BARCODE: {{ $det->eksemplar->kode_barcode }}</span>
                        </div>
                    </div>
                    <span class="px-3 py-1 rounded-lg text-xs font-bold {{ $det->tanggal_dikembalikan ? 'bg-green-50 text-green-600' : 'bg-orange-50 text-orange-500' }}">
                        {{ $det->tanggal_dikembalikan ? 'Sudah Kembali' : 'Belum Kembali' }}
                    </span>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection