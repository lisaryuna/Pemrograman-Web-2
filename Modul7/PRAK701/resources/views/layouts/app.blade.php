<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Perpustakaan')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-ghost-white font-sans text-gray-800 antialiased">
    <div class="min-h-screen flex">
        <aside class="w-64 bg-white border-r border-periwinkle/30 flex flex-col shadow-sm">
            <div class="p-6 border-b border-periwinkle/30">
                <h2 class="text-2xl font-bold text-soft-periwinkle tracking-wide">PerpusTech</h2>
            </div>

            <nav class="flex-1 p-4 space-y-4">
                <a href="/dashboard" class="block px-4 py-2.5 rounded-lg font-medium transition-all {{ request()->is('dashboard') ? 'bg-soft-periwinkle text-white shadow-md' : 'text-gray-600 hover:bg-antique-white hover:text-soft-periwinkle' }}">
                    Dashboard
                </a>

                <a href="/buku" class="block px-4 py-2.5 rounded-lg font-medium transition-all {{ request()->is('buku*') ? 'bg-soft-periwinkle text-white shadow-md' : 'text-gray-600 hover:bg-antique-white hover:text-soft-periwinkle' }}">
                    Katalog Buku
                </a>

                @if(auth()->check() && auth()->user()->peran === 'admin')
                    <a href="/kategori" class="block px-4 py-2.5 rounded-lg font-medium transition-all {{ request()->is('kategori*') ? 'bg-soft-periwinkle text-white shadow-md' : 'text-gray-600 hover:bg-antique-white hover:text-soft-periwinkle' }}">
                        Kategori Buku
                    </a>

                    <a href="/peminjaman" class="block px-4 py-2.5 rounded-lg font-medium transition-all {{ request()->is('peminjaman*') ? 'bg-soft-periwinkle text-white shadow-md' : 'text-gray-600 hover:bg-antique-white hover:text-soft-periwinkle' }}">
                        Sirkulasi Admin
                    </a>
                @endif
                
                @if(auth()->check() && auth()->user()->peran === 'anggota')
                    <a href="/riwayat-pinjam" class="block px-4 py-2.5 rounded-lg font-medium transition-all {{ request()->is('riwayat-pinjam*') ? 'bg-soft-periwinkle text-white shadow-md' : 'text-gray-600 hover:bg-antique-white hover:text-soft-periwinkle' }}">
                        Buku Pinjamanku
                    </a>
                @endif
            </nav>

            <div class="p-4 border-t border-periwinkle/30">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-red-500 hover:bg-red-50 rounded-lg font-medium transition-colors">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 flex flex-col">
            <header class="bg-white border-b border-periwinkle/30 p-4 flex justify-end items-center shadow-sm h-[73px]">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full bg-peach-fuzz text-soft-periwinkle flex items-center justify-center font-bold uppercase">
                        {{ substr(auth()->user()->nama_user, 0, 1) }}
                    </div>
                    <span class="font-medium text-gray-600 mr-4">Halo, {{ explode(' ', auth()->user()->nama_user)[0] }}</span>
                </div>
            </header>

            <div class="p-8">
                @yield('content')
            </div>
        </main>
    </div>
</body>