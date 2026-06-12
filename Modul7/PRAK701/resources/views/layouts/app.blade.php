<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Perpustakaan')</title>
    @vite('resources/css/app.css')
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="bg-[#F8F9FA] font-sans text-gray-800 antialiased selection:bg-soft-periwinkle selection:text-white">
    <div class="h-screen flex overflow-hidden">
        
        <aside class="w-72 bg-white border-r border-gray-100 flex flex-col shadow-[4px_0_24px_rgba(0,0,0,0.02)] flex-shrink-0 z-20">
            
            <div class="h-[76px] px-6 border-b border-gray-100 flex items-center gap-3 flex-shrink-0">
                <div class="w-10 h-10 bg-gradient-to-br from-soft-periwinkle to-periwinkle rounded-xl flex items-center justify-center text-white shadow-lg shadow-soft-periwinkle/30">
                    <i class='bx bx-book-reader text-2xl'></i>
                </div>
                <h2 class="text-2xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-soft-periwinkle to-indigo-400 tracking-tight">PerpusTech</h2>
            </div>

            <nav class="flex-1 p-4 space-y-1.5 overflow-y-auto">
                
                <p class="px-4 text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-3 mt-2">Menu Utama</p>
                
                <a href="/dashboard" class="group flex items-center gap-3 px-4 py-3 rounded-xl font-medium transition-all duration-200 {{ request()->is('dashboard') ? 'bg-soft-periwinkle text-white shadow-md shadow-soft-periwinkle/30' : 'text-gray-500 hover:bg-gray-50 hover:text-soft-periwinkle' }}">
                    <i class='bx bxs-dashboard text-xl transition-colors {{ request()->is('dashboard') ? 'text-white' : 'text-gray-400 group-hover:text-soft-periwinkle' }}'></i>
                    Dashboard
                </a>

                <a href="/buku" class="group flex items-center gap-3 px-4 py-3 rounded-xl font-medium transition-all duration-200 {{ request()->is('buku*') ? 'bg-soft-periwinkle text-white shadow-md shadow-soft-periwinkle/30' : 'text-gray-500 hover:bg-gray-50 hover:text-soft-periwinkle' }}">
                    <i class='bx bx-book text-xl transition-colors {{ request()->is('buku*') ? 'text-white' : 'text-gray-400 group-hover:text-soft-periwinkle' }}'></i>
                    Katalog Buku
                </a>

                @if(auth()->check() && auth()->user()->peran === 'admin')
                    <p class="px-4 text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-3 mt-6">Administrator</p>
                    
                    <a href="/kategori" class="group flex items-center gap-3 px-4 py-3 rounded-xl font-medium transition-all duration-200 {{ request()->is('kategori*') ? 'bg-soft-periwinkle text-white shadow-md shadow-soft-periwinkle/30' : 'text-gray-500 hover:bg-gray-50 hover:text-soft-periwinkle' }}">
                        <i class='bx bx-category text-xl transition-colors {{ request()->is('kategori*') ? 'text-white' : 'text-gray-400 group-hover:text-soft-periwinkle' }}'></i>
                        Kategori Buku
                    </a>

                    <a href="/peminjaman" class="group flex items-center gap-3 px-4 py-3 rounded-xl font-medium transition-all duration-200 {{ request()->is('peminjaman*') ? 'bg-soft-periwinkle text-white shadow-md shadow-soft-periwinkle/30' : 'text-gray-500 hover:bg-gray-50 hover:text-soft-periwinkle' }}">
                        <i class='bx bx-transfer text-xl transition-colors {{ request()->is('peminjaman*') ? 'text-white' : 'text-gray-400 group-hover:text-soft-periwinkle' }}'></i>
                        Sirkulasi Admin
                    </a>

                    <a href="/laporan/stok" class="group flex items-center gap-3 px-4 py-3 rounded-xl font-medium transition-all duration-200 {{ request()->is('laporan/stok') ? 'bg-soft-periwinkle text-white shadow-md shadow-soft-periwinkle/30' : 'text-gray-500 hover:bg-gray-50 hover:text-soft-periwinkle' }}">
                        <i class='bx bx-history text-xl transition-colors {{ request()->is('laporan/stok') ? 'text-white' : 'text-gray-400 group-hover:text-soft-periwinkle' }}'></i>
                        Laporan Stok
                    </a>

                    <a href="/user" class="group flex items-center gap-3 px-4 py-3 rounded-xl font-medium transition-all duration-200 {{ request()->is('user*') ? 'bg-soft-periwinkle text-white shadow-md shadow-soft-periwinkle/30' : 'text-gray-500 hover:bg-gray-50 hover:text-soft-periwinkle' }}">
                        <i class='bx bx-user-plus text-xl transition-colors {{ request()->is('user*') ? 'text-white' : 'text-gray-400 group-hover:text-soft-periwinkle' }}'></i>
                        Manajemen Anggota
                    </a>
                @endif
                
                @if(auth()->check() && auth()->user()->peran === 'anggota')
                    <p class="px-4 text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-3 mt-6">Area Anggota</p>

                    <a href="/riwayat-pinjam" class="group flex items-center gap-3 px-4 py-3 rounded-xl font-medium transition-all duration-200 {{ request()->is('riwayat-pinjam*') ? 'bg-soft-periwinkle text-white shadow-md shadow-soft-periwinkle/30' : 'text-gray-500 hover:bg-gray-50 hover:text-soft-periwinkle' }}">
                        <i class='bx bx-book-bookmark text-xl transition-colors {{ request()->is('riwayat-pinjam*') ? 'text-white' : 'text-gray-400 group-hover:text-soft-periwinkle' }}'></i>
                        Buku Pinjamanku
                    </a>
                @endif
            </nav>

            <div class="p-4 border-t border-gray-100 bg-gray-50/50">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center justify-center gap-2 w-full px-4 py-2.5 text-red-500 hover:bg-red-50 hover:text-red-600 rounded-xl font-semibold transition-all duration-200 group">
                        <i class='bx bx-log-out text-xl group-hover:-translate-x-1 transition-transform'></i>
                        Keluar Sistem
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 flex flex-col overflow-hidden bg-ghost-white">
            
            <header class="bg-white/80 backdrop-blur-md border-b border-gray-100 px-8 flex justify-between items-center h-[76px] flex-shrink-0 sticky top-0 z-10 shadow-sm">
                <div class="text-sm font-medium text-gray-500 hidden md:block">
                    <span class="text-gray-400">{{ date('d M Y') }}</span> - Selamat bertugas!
                </div>

                <div class="flex items-center gap-3 cursor-pointer hover:bg-gray-50 px-3 py-1.5 rounded-full transition-colors border border-transparent hover:border-gray-100">
                    <div class="text-right hidden sm:block">
                        <p class="font-bold text-gray-700 text-sm leading-tight">{{ auth()->user()->nama_user }}</p>
                        <p class="text-[11px] text-gray-400 uppercase tracking-wide font-bold mt-0.5">{{ auth()->user()->peran }}</p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-peach-fuzz to-orange-200 text-orange-700 flex items-center justify-center font-bold text-lg border-2 border-white shadow-sm">
                        {{ substr(auth()->user()->nama_user, 0, 1) }}
                    </div>
                    <i class='bx bx-chevron-down text-gray-400 text-lg'></i>
                </div>
            </header>

            <div class="flex-1 overflow-y-auto p-8">
                @yield('content')
            </div>
        </main>
        
    </div>
</body>
</html>