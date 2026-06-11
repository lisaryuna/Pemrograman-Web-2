<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Perpustakaan</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-ghost-white min-h-screen flex items-center justify-center font-sans">
    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg border border-periwinkle/30">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-soft-periwinkle mb-2">Selamat Datang</h1>
            <p class="text-gray-500 text-sm">Silakan masuk ke akun perpustakaan Anda</p>
        </div>

        @if(session('error'))
            <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded-lg text-sm text-center">
                {{ session('error') }}
            </div>
        @endif

        <form action="#" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-soft-periwinkle mb-1">Email</label>
                <input type="email" id="email" name="email" 
                    class="w-full px-4 py-2 bg-antique-white border border-peach-fuzz rounded-lg focus:outline-none focus:ring-2 focus:ring-periwinkle focus:border-transparent transition-colors"
                    placeholder="nama@email.com" required>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-soft-periwinkle mb-1">Kata Sandi</label>
                <input type="password" id="password" name="password" 
                    class="w-full px-4 py-2 bg-antique-white border border-peach-fuzz rounded-lg focus:outline-none focus:ring-2 focus:ring-periwinkle focus:border-transparent transition-colors"
                    placeholder="••••••••" required>
            </div>

            <button type="submit" 
                class="w-full bg-soft-periwinkle hover:bg-periwinkle text-white font-semibold py-2.5 rounded-lg transition-colors shadow-md mt-4">
                Masuk
            </button>
        </form>
    </div>
</body>
</html>