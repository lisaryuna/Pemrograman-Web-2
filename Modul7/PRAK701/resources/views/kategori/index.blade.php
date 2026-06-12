@extends('layouts.app')
@section('title', 'Manajemen Kategori - PerpusTech')
@section('content')
<div class="mb-8 flex items-center gap-4">
    <div class="w-12 h-12 rounded-2xl bg-white shadow-sm border border-periwinkle/30 flex items-center justify-center text-soft-periwinkle">
        <i class='bx bx-category text-2xl'></i>
    </div>
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Kategori Buku</h1>
        <p class="text-gray-500 mt-0.5 text-sm">Kelola klasifikasi koleksi buku perpustakaan.</p>
    </div>
</div>

@if(session('success'))
<div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm flex items-center gap-2">
    <i class='bx bx-check-circle text-lg'></i> {{ session('success') }}
</div>
@endif

<div class="bg-white rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 overflow-hidden max-w-3xl">
    <table class="w-full text-left text-sm">
        <thead class="bg-[#F8F9FA] border-b border-gray-100 text-gray-500 uppercase tracking-widest font-bold text-[11px]">
            <tr>
                <th class="px-6 py-4 w-[10%]">No</th>
                <th class="px-6 py-4">Nama Kategori</th>
                <th class="px-6 py-4 text-center w-[25%]">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @foreach ($kategori as $index => $item)
            <tr class="hover:bg-gray-50/50 transition-colors">
                <td class="px-6 py-5 font-bold text-gray-400">{{ $index + 1 }}</td>
                <td class="px-6 py-5 font-bold text-gray-800">{{ $item->nama_kategori }}</td>
                <td class="px-6 py-5 text-center">
                    <div class="flex justify-center gap-2">
                        <a href="{{ route('kategori.edit', $item->kategori_id) }}" class="p-2 bg-indigo-50 text-soft-periwinkle hover:bg-soft-periwinkle hover:text-white rounded-lg transition-all">
                            <i class='bx bx-edit text-lg'></i>
                        </a>
                        <form action="{{ route('kategori.destroy', $item->kategori_id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus kategori ini?')" class="p-2 bg-red-50 text-red-500 hover:bg-red-500 hover:text-white rounded-lg transition-all">
                                <i class='bx bx-trash text-lg'></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection