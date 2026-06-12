@extends('layouts.app')
@section('title', 'Manajemen Fisik Buku - PerpusTech')
@section('content')
<div class="mb-8 flex items-center justify-between">
    <div class="flex items-center gap-4">
        <div class="w-12 h-12 rounded-2xl bg-white shadow-sm border border-periwinkle/30 flex items-center justify-center text-soft-periwinkle flex-shrink-0">
            <i class='bx bx-barcode-reader text-2xl'></i>
        </div>
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Manajemen Fisik Buku</h1>
            <p class="text-gray-500 mt-0.5 text-sm">Judul: <span class="font-bold">{{ $buku->judul }}</span></p>
        </div>
    </div>
    <a href="/buku" class="px-5 py-2.5 bg-white border border-gray-200 hover:bg-gray-50 text-gray-700 font-bold rounded-xl text-sm transition-all flex items-center gap-2">
        <i class='bx bx-arrow-back'></i> Kembali ke Katalog
    </a>
</div>

@if(session('success'))
<div class="mb-6 p-4 bg-green-50 border border-green-100 text-green-700 rounded-xl text-sm flex items-center gap-2 font-medium">
    <i class='bx bx-check-circle text-lg'></i> {{ session('success') }}
</div>
@endif
@error('kode_barcode')
<div class="mb-6 p-4 bg-red-50 border border-red-100 text-red-600 rounded-xl text-sm flex items-center gap-2 font-medium">
    <i class='bx bx-error-circle text-lg'></i> Gagal: Barcode ini sudah terdaftar di sistem.
</div>
@enderror

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="bg-white rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 p-6 h-fit">
        <h2 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-4">Tambah Unit Fisik</h2>
        <form action="{{ route('eksemplar.store', $buku->buku_id) }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="text-xs font-bold text-gray-600">Scan / Ketik Barcode</label>
                <input type="text" name="kode_barcode" class="w-full mt-1 px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-soft-periwinkle/20 outline-none" placeholder="Cth: B-00X-2026" required>
            </div>
            <button type="submit" class="w-full py-2.5 bg-soft-periwinkle hover:bg-indigo-600 text-white font-bold rounded-xl transition-all">Simpan Barcode</button>
        </form>
    </div>

    <div class="lg:col-span-2 bg-white rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead class="bg-[#F8F9FA] border-b border-gray-100 text-gray-500 uppercase tracking-widest font-bold text-[11px]">
                <tr>
                    <th class="px-6 py-4">Kode Barcode</th>
                    <th class="px-6 py-4">Kondisi</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($buku->eksemplar as $eks)
                <tr>
                    <td class="px-6 py-4 font-bold text-gray-800 font-mono">{{ $eks->kode_barcode }}</td>
                    
                    <form action="{{ route('eksemplar.update', $eks->eksemplar_id) }}" method="POST">
                        @csrf @method('PUT')
                        <td class="px-6 py-4">
                            <select name="kondisi" class="bg-gray-50 border border-gray-200 rounded-lg text-xs p-1.5 outline-none font-bold">
                                <option value="baik" {{ $eks->kondisi == 'baik' ? 'selected' : '' }}>Baik</option>
                                <option value="rusak_ringan" {{ $eks->kondisi == 'rusak_ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                                <option value="rusak_berat" {{ $eks->kondisi == 'rusak_berat' ? 'selected' : '' }}>Rusak Berat</option>
                            </select>
                        </td>
                        <td class="px-6 py-4">
                            <select name="status" class="bg-gray-50 border border-gray-200 rounded-lg text-xs p-1.5 outline-none font-bold">
                                <option value="tersedia" {{ $eks->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                                <option value="dipinjam" {{ $eks->status == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                                <option value="diperbaiki" {{ $eks->status == 'diperbaiki' ? 'selected' : '' }}>Diperbaiki</option>
                                <option value="hilang" {{ $eks->status == 'hilang' ? 'selected' : '' }}>Hilang</option>
                            </select>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-1.5">
                                <button type="submit" class="px-3 py-1.5 bg-indigo-50 text-soft-periwinkle font-bold text-[11px] rounded-lg hover:bg-soft-periwinkle hover:text-white transition-all">Update</button>
                    </form>
                                <form action="{{ route('eksemplar.destroy', $eks->eksemplar_id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('Hapus fisik buku ini dari database?')" class="px-2 py-1.5 bg-red-50 text-red-500 rounded-lg hover:bg-red-500 hover:text-white transition-all"><i class='bx bx-trash'></i></button>
                                </form>
                            </div>
                        </td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center py-8 text-gray-400 font-medium">Belum ada unit fisik untuk buku ini.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection