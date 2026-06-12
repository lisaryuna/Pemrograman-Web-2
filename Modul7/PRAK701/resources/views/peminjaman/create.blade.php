@extends('layouts.app')
@section('title', 'Catat Peminjaman - PerpusTech')
@section('content')
<div class="mb-8 flex items-center gap-4">
    <div class="w-12 h-12 rounded-2xl bg-white shadow-sm border border-periwinkle/30 flex items-center justify-center text-soft-periwinkle">
        <i class='bx bx-transfer text-2xl'></i>
    </div>
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Catat Peminjaman Baru</h1>
        <p class="text-gray-500 mt-0.5 text-sm">Formulir untuk mencatat sirkulasi peminjaman buku anggota.</p>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 p-8 max-w-2xl">
    <form action="/peminjaman" method="POST" class="space-y-6">
        @csrf

        <div class="space-y-2">
            <label for="user_id" class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Nama Anggota / Peminjam</label>
            <div class="relative">
                <select id="user_id" name="user_id" class="appearance-none w-full pl-4 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-soft-periwinkle/20 focus:border-soft-periwinkle transition-all cursor-pointer" required>
                    <option value="">Pilih Anggota</option>
                    @foreach($user as $u)
                        <option value="{{ $u->user_id }}">{{ $u->nama_user }} (ID: {{ $u->user_id }})</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400">
                    <i class='bx bx-chevron-down text-xl'></i>
                </div>
            </div>
        </div>

        <div class="space-y-2">
            <label for="eksemplar_id" class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Pilih Buku (Barcode)</label>
            <div class="relative">
                <select id="eksemplar_id" name="eksemplar_id" class="appearance-none w-full pl-4 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-soft-periwinkle/20 focus:border-soft-periwinkle transition-all cursor-pointer" required>
                    <option value="">Pilih Buku yang Tersedia</option>
                    @foreach($eksemplar as $eks)
                        <option value="{{ $eks->eksemplar_id }}">
                            {{ $eks->kode_barcode }} — {{ $eks->buku->judul }}
                        </option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400">
                    <i class='bx bx-chevron-down text-xl'></i>
                </div>
            </div>
            @if($eksemplar->isEmpty())
                <p class="text-red-500 text-xs font-bold mt-1 flex items-center gap-1">
                    <i class='bx bx-error-circle'></i> Tidak ada fisik buku yang tersedia di rak saat ini.
                </p>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
                <label for="tanggal_pinjam" class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Tanggal Pinjam</label>
                <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" value="{{ date('Y-m-d') }}"
                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-soft-periwinkle/20 focus:border-soft-periwinkle transition-all">
            </div>

            <div class="space-y-2">
                <label for="batas_kembali" class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Batas Waktu Pengembalian</label>
                <input type="date" id="batas_kembali" name="batas_kembali" value="{{ date('Y-m-d', strtotime('+7 days')) }}"
                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-soft-periwinkle/20 focus:border-soft-periwinkle transition-all">
            </div>
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
            <button type="submit" class="px-6 py-3 bg-soft-periwinkle hover:bg-indigo-600 text-white font-bold rounded-xl transition-all shadow-lg shadow-soft-periwinkle/20 active:scale-[0.98]">
                Simpan Transaksi
            </button>
            <a href="/peminjaman" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold rounded-xl transition-all">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection