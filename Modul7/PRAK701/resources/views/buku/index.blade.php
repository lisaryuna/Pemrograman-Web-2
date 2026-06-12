@extends('layouts.app')
@section('title', 'Katalog Buku - PerpusTech')
@section('content')
<div class="mb-8 flex items-center justify-between">
    <div class="flex items-center gap-4">
        <div class="w-12 h-12 rounded-2xl bg-white shadow-sm border border-periwinkle/30 flex items-center justify-center text-soft-periwinkle flex-shrink-0">
            <i class='bx bx-book-open text-2xl'></i>
        </div>
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Katalog Buku</h1>
            <p class="text-gray-500 mt-0.5 text-sm">Daftar lengkap koleksi buku perpustakaan.</p>
        </div>
    </div>

    <div class="flex items-center gap-3">
        <form action="{{ route('buku.index') }}" method="GET" class="flex items-center">
            <div class="relative">
                <select name="kategori_id" onchange="this.form.submit()" class="appearance-none pl-4 pr-10 py-2.5 bg-white border border-gray-200 rounded-xl text-sm text-gray-700 focus:ring-2 focus:ring-soft-periwinkle focus:border-soft-periwinkle outline-none transition-all cursor-pointer">
                    <option value="">Semua Kategori</option>
                    @foreach($kategori as $kat)
                    <option value="{{ $kat->kategori_id }}" {{ request('kategori_id') == $kat->kategori_id ? 'selected' : '' }}>
                        {{ $kat->nama_kategori }}
                    </option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400">
                    <i class='bx bx-chevron-down text-xl'></i>
                </div>
            </div>
        </form>

        @if(auth()->check() && auth()->user()->peran === 'admin')
        <a href="/buku/create" class="px-5 py-2.5 bg-soft-periwinkle hover:bg-indigo-600 text-white rounded-xl font-bold shadow-lg shadow-soft-periwinkle/30 transition-all flex items-center gap-2 flex-shrink-0">
            <i class='bx bx-plus'></i> Tambah Buku
        </a>
        @endif
    </div>
</div>

@if(session('success'))
<div class="mb-6 p-4 bg-green-50 border border-green-100 text-green-700 rounded-xl text-sm flex items-center gap-2 font-medium">
    <i class='bx bx-check-circle text-lg'></i> {{ session('success') }}
</div>
@endif

<div class="bg-white rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-[#F8F9FA] border-b border-gray-100 text-gray-500 uppercase tracking-widest font-bold text-[11px]">
                <tr>
                    <th class="px-6 py-4 w-[5%]">No</th>
                    <th class="px-6 py-4">Judul Buku</th>
                    <th class="px-6 py-4">Penulis</th>
                    <th class="px-6 py-4">Penerbit</th>
                    <th class="px-6 py-4">Tahun</th>
                    <th class="px-6 py-4 text-center">Stok</th>
                    <th class="px-6 py-4 text-center">Kondisi Fisik</th>
                    @if(auth()->check() && auth()->user()->peran === 'admin')
                        <th class="px-6 py-4 text-center">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach ($buku as $index => $item)
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-5 font-bold text-gray-400">{{ $index + 1 }}</td>
                    <td class="px-6 py-5 font-bold text-gray-800">{{ $item->judul }}</td>
                    <td class="px-6 py-5 font-medium text-gray-600">{{ $item->penulis }}</td>
                    <td class="px-6 py-5 font-medium text-gray-600">{{ $item->penerbit }}</td>
                    <td class="px-6 py-5 font-medium text-gray-600">{{ $item->tahun_terbit }}</td>
                    
                    <td class="px-6 py-5 text-center">
                        @if($item->stok_tersedia > 0)
                            <span class="inline-flex items-center px-2.5 py-1 text-[11px] font-bold rounded-lg bg-green-50 text-green-600 border border-green-100 whitespace-nowrap">
                                {{ $item->stok_tersedia }} Unit
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-1 text-[11px] font-bold rounded-lg bg-red-50 text-red-500 border border-red-100 whitespace-nowrap">
                                Habis
                            </span>
                        @endif
                    </td>
                    
                    <td class="px-6 py-5 text-center">
                        @if($item->stok_tersedia > 0)
                            <div class="flex flex-col items-center gap-1.5">
                                @php 
                                    $kondisi_grup = $item->eksemplar->where('status', 'tersedia')->countBy('kondisi');
                                @endphp
                                @foreach($kondisi_grup as $kondisi => $jumlah)
                                    <span class="inline-flex items-center px-2 py-0.5 text-[10px] font-bold uppercase tracking-wider rounded-md border whitespace-nowrap
                                        {{ $kondisi == 'baik' ? 'bg-blue-50 text-blue-600 border-blue-200' : ($kondisi == 'rusak_ringan' ? 'bg-orange-50 text-orange-600 border-orange-200' : 'bg-red-50 text-red-600 border-red-200') }}">
                                        {{ str_replace('_', ' ', $kondisi) }}: {{ $jumlah }}
                                    </span>
                                @endforeach
                            </div>
                        @else
                            <span class="text-[11px] font-bold text-gray-300">-</span>
                        @endif
                    </td>
                    
                    @if(auth()->check() && auth()->user()->peran === 'admin')
                    <td class="px-6 py-5 text-center">
                        <div class="flex justify-center gap-2">
                            
                            <a href="{{ route('eksemplar.index', $item->buku_id) }}" class="p-2 bg-emerald-50 text-emerald-600 hover:bg-emerald-500 hover:text-white rounded-lg transition-all" title="Kelola Fisik Buku">
                                <i class='bx bx-barcode-reader text-lg'></i>
                            </a>

                            <a href="{{ route('buku.edit', $item->buku_id) }}" class="p-2 bg-indigo-50 text-soft-periwinkle hover:bg-soft-periwinkle hover:text-white rounded-lg transition-all">
                                <i class='bx bx-edit text-lg'></i>
                            </a>
                            
                            <form action="{{ route('buku.destroy', $item->buku_id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Hapus buku ini?')" class="p-2 bg-red-50 text-red-500 hover:bg-red-500 hover:text-white rounded-lg transition-all">
                                    <i class='bx bx-trash text-lg'></i>
                                </button>
                            </form>

                        </div>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50">
        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wide">Menampilkan {{ $buku->count() }} buku</p>
    </div>
</div>
@endsection