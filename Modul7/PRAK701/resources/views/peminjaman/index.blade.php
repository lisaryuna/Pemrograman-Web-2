@extends('layouts.app')
@section('title', 'Sirkulasi Peminjaman - PerpusTech')
@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-3xl font-bold text-soft-periwinkle">Sirkulasi Peminjaman</h1>
        <p class="text-gray-500 mt-1">Pantau transaksi pinjam dan kembalikan buku perpustakaan.</p>
    </div>
    <a href="/peminjaman/create" class="px-5 py-2.5 bg-soft-periwinkle hover:bg-periwinkle text-white rounded-lg font-medium shadow-md">
        + Catat Peminjaman Baru
    </a>
</div>

@if(session('success'))
<div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">
    {{ session('success') }}
</div>
@endif

<div class="bg-white rounded-2xl shadow-sm border border-periwinkle/30 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-ghost-white border-b border-periwinkle/30 text-gray-700 uppercase tracking-wider font-semibold">
                <tr>
                    <th scope="col" class="px-6 py-4">No</th>
                    <th scope="col" class="px-6 py-4">Nama Peminjam</th>
                    <th scope="col" class="px-6 py-4">Tanggal Pinjam</th>
                    <th scope="col" class="px-6 py-4">Batas Kembali</th>
                    <th scope="col" class="px-6 py-4">Status</th>
                    <th scope="col" class="px-6 py-4">Denda</th>
                    <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($peminjaman as $index => $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 font-medium text-gray-800">{{ $item->user->nama_user ?? 'Umum' }}</td>
                    <td class="px-6 py-4">{{ $item->tanggal_pinjam }}</td>
                    <td class="px-6 py-4">{{ $item->batas_kembali }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2.5 py-1 text-xs font-semibold rounded-full {{ $item->status == 'berjalan' ? 'bg-orange-50 text-orange-600' : 'bg-green-50 text-green-600' }}">
                            {{ strtoupper($item->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-red-500 font-medium">Rp {{ number_format($item->detail->sum('denda'), 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-center">
                        @if($item->status == 'berjalan')
                        <form action="{{ route('peminjaman.kembalikan', $item->peminjaman_id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" onclick="return confirm('Proses pengembalian buku untuk transaksi ini?')" class="px-3 py-1.5 text-xs font-medium text-white bg-soft-periwinkle hover:bg-periwinkle rounded transition-colors shadow-sm">
                                Proses Kembali
                            </button>
                        </form>
                        @else
                        <span class="text-xs text-gray-400 font-medium">Selesai</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection