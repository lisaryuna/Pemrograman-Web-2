@extends('layouts.app')
@section('title', 'Buku Pinjamanku - PerpusTech')
@section('content')
<div class="mb-8 flex items-center gap-4">
    <div class="w-12 h-12 rounded-2xl bg-white shadow-sm border border-periwinkle/30 flex items-center justify-center text-soft-periwinkle">
        <i class='bx bx-book-bookmark text-2xl'></i>
    </div>
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Buku Pinjamanku</h1>
        <p class="text-gray-500 mt-0.5 text-sm">Pantau riwayat peminjaman dan tanggungan buku Anda.</p>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-[#F8F9FA] border-b border-gray-100 text-gray-500 uppercase tracking-widest font-bold text-[11px]">
                <tr>
                    <th scope="col" class="px-6 py-4 w-[5%]">No</th>
                    <th scope="col" class="px-6 py-4 w-[35%]">Judul Buku (Barcode)</th>
                    <th scope="col" class="px-6 py-4 w-[15%]">Tanggal Pinjam</th>
                    <th scope="col" class="px-6 py-4 w-[15%]">Batas Kembali</th>
                    <th scope="col" class="px-6 py-4 w-[15%]">Status</th>
                    <th scope="col" class="px-6 py-4 w-[15%] text-right">Total Denda</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse ($peminjaman as $index => $item)
                <tr class="hover:bg-gray-50/50 transition-colors group">
                    <td class="px-6 py-5 align-top font-medium">{{ $index + 1 }}</td>
                    <td class="px-6 py-5 align-top">
                        <div class="space-y-2">
                            @foreach($item->detail as $det)
                                <div class="flex items-start gap-2">
                                    <i class='bx bx-book text-soft-periwinkle mt-0.5'></i>
                                    <div>
                                        <p class="text-gray-800 font-bold leading-tight">{{ $det->eksemplar->buku->judul }}</p>
                                        <p class="text-[11px] text-gray-400 font-medium mt-0.5 tracking-wide">ID FISIK: {{ $det->eksemplar->kode_barcode }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </td>
                    <td class="px-6 py-5 align-top font-medium">{{ $item->tanggal_pinjam }}</td>
                    <td class="px-6 py-5 align-top font-medium">{{ $item->batas_kembali }}</td>
                    <td class="px-6 py-5 align-top">
                        <span class="px-3 py-1.5 text-[11px] font-bold tracking-wide rounded-full border {{ $item->status == 'berjalan' ? 'bg-orange-50 text-orange-600 border-orange-200' : 'bg-green-50 text-green-600 border-green-200' }}">
                            {{ strtoupper($item->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-5 align-top text-right">
                        @php $totalDenda = $item->detail->sum('denda'); @endphp
                        
                        @if($totalDenda > 0)
                            <span class="inline-block px-2.5 py-1 bg-red-50 text-red-600 font-bold border border-red-100 rounded-lg">
                                Rp {{ number_format($totalDenda, 0, ',', '.') }}
                            </span>
                        @else
                            <span class="text-gray-400 font-semibold">Rp 0</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-16">
                        <div class="flex flex-col items-center justify-center text-center">
                            <i class='bx bx-folder-open text-6xl text-gray-200 mb-3'></i>
                            <p class="text-gray-800 font-bold text-lg">Belum Ada Riwayat</p>
                            <p class="text-gray-400 text-sm mt-1">Anda belum pernah meminjam buku di perpustakaan ini.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection