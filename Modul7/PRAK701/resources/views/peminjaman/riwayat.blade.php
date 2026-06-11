@extends('layouts.app')
@section('title', 'Buku Pinjamanku - PerpusTech')
@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-soft-periwinkle">Buku Pinjamanku</h1>
    <p class="text-gray-500 mt-1">Pantau riwayat peminjaman dan tanggungan buku Anda.</p>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-periwinkle/30 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-ghost-white border-b border-periwinkle/30 text-gray-700 uppercase tracking-wider font-semibold">
                <tr>
                    <th scope="col" class="px-6 py-4">No</th>
                    <th scope="col" class="px-6 py-4">Judul Buku (Barcode)</th>
                    <th scope="col" class="px-6 py-4">Tanggal Pinjam</th>
                    <th scope="col" class="px-6 py-4">Batas Kembali</th>
                    <th scope="col" class="px-6 py-4">Status</th>
                    <th scope="col" class="px-6 py-4">Total Denda</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($peminjaman as $index => $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 align-top">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 align-top">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($item->detail as $det)
                                <li class="text-gray-800 font-medium">
                                    {{ $det->eksemplar->buku->judul }} 
                                    <span class="text-xs text-gray-400 font-normal">({{ $det->eksemplar->kode_barcode }})</span>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="px-6 py-4 align-top">{{ $item->tanggal_pinjam }}</td>
                    <td class="px-6 py-4 align-top">{{ $item->batas_kembali }}</td>
                    <td class="px-6 py-4 align-top">
                        <span class="px-2.5 py-1 text-xs font-semibold rounded-full {{ $item->status == 'berjalan' ? 'bg-orange-50 text-orange-600' : 'bg-green-50 text-green-600' }}">
                            {{ strtoupper($item->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 align-top text-red-500 font-medium">
                        Rp {{ number_format($item->detail->sum('denda'), 0, ',', '.') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-400 font-medium">
                        Anda belum memiliki riwayat peminjaman buku.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection