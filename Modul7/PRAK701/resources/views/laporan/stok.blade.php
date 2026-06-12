@extends('layouts.app')
@section('title', 'Laporan Riwayat Stok - PerpusTech')
@section('content')
<div class="mb-8 flex items-center gap-4">
    <div class="w-12 h-12 rounded-2xl bg-white shadow-sm border border-periwinkle/30 flex items-center justify-center text-soft-periwinkle">
        <i class='bx bx-history text-2xl'></i>
    </div>
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Laporan Riwayat Stok</h1>
        <p class="text-gray-500 mt-0.5 text-sm">Jurnal audit pergerakan keluar-masuk unit fisik buku perpustakaan.</p>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-[#F8F9FA] border-b border-gray-100 text-gray-500 uppercase tracking-widest font-bold text-[11px]">
                <tr>
                    <th class="px-6 py-4 w-[15%]">Waktu Pencatatan</th>
                    <th class="px-6 py-4">Judul Buku Terkait</th>
                    <th class="px-6 py-4 text-center">Jenis Transaksi</th>
                    <th class="px-6 py-4 text-center">Qty</th>
                    <th class="px-6 py-4">Keterangan / Alasan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($riwayat as $log)
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-4 font-bold text-gray-500 text-xs">{{ date('d M Y, H:i', strtotime($log->dibuat_pada)) }}</td>
                    <td class="px-6 py-4 font-bold text-gray-800">{{ $log->buku->judul ?? 'Buku Dihapus' }}</td>
                    <td class="px-6 py-4 text-center">
                        <span class="px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider rounded-lg border 
                            {{ $log->jenis_transaksi == 'masuk' ? 'bg-green-50 text-green-600 border-green-200' : 
                              ($log->jenis_transaksi == 'keluar' ? 'bg-red-50 text-red-600 border-red-200' : 'bg-orange-50 text-orange-600 border-orange-200') }}">
                            {{ $log->jenis_transaksi }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center font-black {{ $log->jumlah > 0 ? 'text-green-500' : 'text-red-500' }}">
                        {{ $log->jumlah > 0 ? '+'.$log->jumlah : $log->jumlah }}
                    </td>
                    <td class="px-6 py-4 text-xs font-medium text-gray-500 leading-relaxed">{{ $log->keterangan }}</td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center py-10 text-gray-400 font-medium">Belum ada riwayat pergerakan stok.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection