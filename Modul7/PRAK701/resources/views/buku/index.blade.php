@extends('layouts.app')
@section('title', 'Katalog Buku - PerpusTech')
@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-3xl font-bold text-soft-periwinkle">Katalog Buku</h1>
        <p class="text-gray-500 mt-1">Kelola data buku perpustakaan.</p>
    </div>

    <a href="/buku/create" class="px-5 py-2.5 bg-soft-periwinkle hover:bg-periwinkle text-white rounded-lg font-medium shadow-md">
        + Tambah Buku Baru
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
                    <th scope="col" class="px-6 py-4">Judul Buku</th>
                    <th scope="col" class="px-6 py-4">Penulis</th>
                    <th scope="col" class="px-6 py-4">Penerbit</th>
                    <th scope="col" class="px-6 py-4">Tahun Terbit</th>
                    <th scope="col" class="px-6 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">1</td>
                    <td class="px-6 py-4 font-medium text-gray-800">Pemrograman Web dengan Laravel</td>
                    <td class="px-6 py-4">Budi Santoso</td>
                    <td class="px-6 py-4">Erlangga</td>
                    <td class="px-6 py-4">2023</td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center gap-2">
                            <a href="#" class="px-3 py-1.5 text-xs font-medium text-soft-periwinkle border border-soft-periwinkle hover:bg-soft-periwinkle hover:text-white rounded transition-colors">
                            Edit
                        </a>
                        <form action="#" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')" class="px-3 py-1.5 text-xs font-medium text-red-500 border border-red-500 hover:bg-red-500 hover:text-white rounded transition-colors">
                                Hapus
                            </button>
                        </form>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="px-6 py-4 border-t border-gray-100">
        <p class="text-xs text-gray-400">Menampilkan 1 data (data dummy statis)</p>
    </div>
</div>
@endsection