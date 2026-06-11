@extends('layouts.app')
@section('title', 'Manajemen Kategori - PerpusTech')
@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-3xl font-bold text-soft-periwinkle">Kategori Buku</h1>
        <p class="text-gray-500 mt-1">Kelola daftar kategori untuk klasifikasi buku.</p>
    </div>
    <a href="/kategori/create" class="px-5 py-2.5 bg-soft-periwinkle hover:bg-periwinkle text-white rounded-lg font-medium shadow-md">
        + Tambah Kategori
    </a>
</div>

@if(session('success'))
<div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">
    {{ session('success') }}
</div>
@endif

<div class="bg-white rounded-2xl shadow-sm border border-periwinkle/30 overflow-hidden max-w-2xl">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-ghost-white border-b border-periwinkle/30 text-gray-700 uppercase tracking-wider font-semibold">
                <tr class="hover:bg-gray-50 transition-colors">
                    <th scope="col" class="px-6 py-4 w-20">No</th>
                    <th scope="col" class="px-6 py-4">Nama Kategori</th>
                    <th scope="col" class="px-6 py-4 text-center w-48">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($kategori as $index => $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 font-medium text-gray-800">{{ $item->nama_kategori }}</td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('kategori.edit', $item->kategori_id) }}" class="px-3 py-1.5 text-xs font-medium text-soft-periwinkle border border-soft-periwinkle hover:bg-soft-periwinkle hover:text-white rounded transition-colors">
                                Edit
                            </a>
                            <form action="{{ route('kategori.destroy', $item->kategori_id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Menghapus kategori dapat mempengaruhi data buku terkait. Lanjutkan?')" class="px-3 py-1.5 text-xs font-medium text-red-500 border border-red-500 hover:bg-red-500 hover:text-white rounded transition-colors">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection