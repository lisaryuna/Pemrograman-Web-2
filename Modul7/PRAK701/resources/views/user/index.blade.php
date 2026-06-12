@extends('layouts.app')
@section('title', 'Manajemen Anggota - PerpusTech')
@section('content')
<div class="mb-8 flex items-center gap-4">
    <div class="w-12 h-12 rounded-2xl bg-white shadow-sm border border-periwinkle/30 flex items-center justify-center text-soft-periwinkle">
        <i class='bx bx-user-plus text-2xl'></i>
    </div>
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Manajemen Anggota</h1>
        <p class="text-gray-500 mt-0.5 text-sm">Kelola akses dan data user yang terdaftar di sistem.</p>
    </div>
</div>

@if(session('success'))
<div class="mb-6 p-4 bg-green-50 border border-green-100 text-green-700 rounded-xl text-sm flex items-center gap-2 font-medium">
    <i class='bx bx-check-circle text-lg'></i> {{ session('success') }}
</div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="bg-white rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 p-6 h-fit">
        <h2 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-6">Daftarkan Anggota Baru</h2>
        <form action="{{ route('user.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="text-[11px] font-bold text-gray-500 uppercase tracking-wide">Nama Lengkap</label>
                <input type="text" name="name" class="w-full mt-1 px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-soft-periwinkle/20 outline-none transition-all" placeholder="Masukkan nama..." required>
            </div>
            <div>
                <label class="text-[11px] font-bold text-gray-500 uppercase tracking-wide">Email</label>
                <input type="email" name="email" class="w-full mt-1 px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-soft-periwinkle/20 outline-none transition-all" placeholder="email@contoh.com" required>
            </div>
            <div>
                <label class="text-[11px] font-bold text-gray-500 uppercase tracking-wide">Password</label>
                <input type="password" name="password" class="w-full mt-1 px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-soft-periwinkle/20 outline-none transition-all" placeholder="••••••••" required>
            </div>
            <div>
                <label class="text-[11px] font-bold text-gray-500 uppercase tracking-wide">Pilih Peran</label>
                <div class="relative mt-1">
                    <select name="peran" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-soft-periwinkle/20 outline-none transition-all cursor-pointer appearance-none text-gray-700">
                        <option value="anggota">Anggota</option>
                        <option value="admin">Admin</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400">
                        <i class='bx bx-chevron-down text-xl'></i>
                    </div>
                </div>
            </div>
            <button type="submit" class="w-full mt-2 py-3 bg-soft-periwinkle hover:bg-indigo-600 text-white font-bold rounded-xl transition-all shadow-lg shadow-soft-periwinkle/20">
                Daftarkan Anggota
            </button>
        </form>
    </div>

    <div class="lg:col-span-2 bg-white rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-gray-100 overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead class="bg-[#F8F9FA] border-b border-gray-100 text-gray-500 uppercase tracking-widest font-bold text-[11px]">
                <tr>
                    <th class="px-6 py-4">Nama Anggota</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4 text-center">Peran</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($users as $u)
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-5 font-bold text-gray-800">{{ $u->nama_user }}</td>
                    <td class="px-6 py-5 font-medium text-gray-500">{{ $u->email }}</td>
                    <td class="px-6 py-5 text-center">
                        <span class="inline-flex items-center px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider rounded-lg border {{ $u->peran == 'admin' ? 'bg-purple-50 text-purple-600 border-purple-100' : 'bg-blue-50 text-blue-600 border-blue-100' }}">
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