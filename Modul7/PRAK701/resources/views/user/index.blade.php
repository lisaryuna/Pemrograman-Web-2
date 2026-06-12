@extends('layouts.app')
@section('title', 'Manajemen Anggota - PerpusTech')
@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Manajemen Anggota</h1>
    <p class="text-gray-500 text-sm">Daftar dan kelola user yang terdaftar di sistem.</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 h-fit">
        <h2 class="font-bold mb-4">Daftarkan Anggota Baru</h2>
        <form action="{{ route('user.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="text" name="name" placeholder="Nama Lengkap" class="w-full px-4 py-2 border rounded-xl" required>
            <input type="email" name="email" placeholder="Email" class="w-full px-4 py-2 border rounded-xl" required>
            <input type="password" name="password" placeholder="Password" class="w-full px-4 py-2 border rounded-xl" required>
            <select name="peran" class="w-full px-4 py-2 border rounded-xl">
                <option value="anggota">Anggota</option>
                <option value="admin">Admin</option>
            </select>
            <button type="submit" class="w-full bg-soft-periwinkle text-white py-2 rounded-xl font-bold">Daftarkan</button>
        </form>
    </div>

    <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="bg-gray-50 uppercase text-[10px] text-gray-500">
                    <th class="px-6 py-4">Nama</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Peran</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $u)
                <tr class="border-t">
                    <td class="px-6 py-4 font-bold">{{ $u->name }}</td>
                    <td class="px-6 py-4">{{ $u->email }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded text-[10px] {{ $u->peran == 'admin' ? 'bg-purple-100 text-purple-600' : 'bg-blue-100 text-blue-600' }}">
                            {{ $u->peran }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection