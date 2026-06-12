@extends('layouts.app')
@section('title', 'Sirkulasi Peminjaman - PerpusTech')
@section('content')
<div class="mb-8 flex items-center justify-between">
    <div class="flex items-center gap-4">
        <div class="w-12 h-12 rounded-2xl bg-white shadow-sm border border-periwinkle/30 flex items-center justify-center text-soft-periwinkle flex-shrink-0">
            <i class='bx bx-transfer text-2xl'></i>
        </div>
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Sirkulasi Peminjaman</h1>
            <p class="text-gray-500 mt-0.5 text-sm">Pantau transaksi pinjam dan kembalikan buku perpustakaan.</p>
        </div>
    </div>
    <a href="/peminjaman/create" class="px-5 py-3 bg-soft-periwinkle hover:bg-indigo-600 text-white rounded-xl font-bold shadow-lg shadow-soft-periwinkle/30 flex items-center gap-2 transition-all flex-shrink-0">
        <i class='bx bx-plus'></i> Tambah Transaksi
    </a>
</div>

<div class="bg-white rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-[#F8F9FA] border-b border-gray-100 text-gray-500 uppercase tracking-widest font-bold text-[11px]">
                <tr>
                    <th class="px-6 py-4 w-[5%]">No</th>
                    <th class="px-6 py-4">Nama Peminjam</th>
                    <th class="px-6 py-4">Tanggal Pinjam</th>
                    <th class="px-6 py-4">Batas Kembali</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Denda</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach ($peminjaman as $index => $item)
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-4 font-medium">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 font-bold text-gray-800">{{ $item->user->nama_user ?? 'Umum' }}</td>
                    <td class="px-6 py-4 font-medium text-gray-500">{{ $item->tanggal_pinjam }}</td>
                    <td class="px-6 py-4 font-medium text-gray-500">{{ $item->batas_kembali }}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 text-[11px] font-bold rounded-full {{ $item->status == 'berjalan' ? 'bg-orange-50 text-orange-600' : 'bg-green-50 text-green-600' }}">
                            {{ strtoupper($item->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 font-bold text-red-500">Rp {{ number_format($item->detail->sum('denda'), 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-center">
                        @if($item->status == 'berjalan')
                        <form action="{{ route('peminjaman.kembalikan', $item->peminjaman_id) }}" method="POST">
                            @csrf
                            <button type="submit" onclick="return confirm('Proses pengembalian buku?')" class="flex items-center gap-1.5 px-3 py-1.5 text-xs font-bold text-white bg-soft-periwinkle hover:bg-indigo-600 rounded-lg transition-all mx-auto">
                                <i class='bx bx-check-circle'></i> Selesaikan
                            </button>
                        </form>
                        @else
                        <span class="text-[11px] font-bold text-gray-300">SELESAI</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection