<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PerpusTech</title>
    @vite('resources/css/app.css')
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="bg-[#F8F9FA] min-h-screen flex items-center justify-center font-sans p-4">
    
    <div class="w-full max-w-md bg-white p-10 rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-gray-100">
        <div class="text-center mb-10">
            <div class="w-16 h-16 bg-soft-periwinkle/10 text-soft-periwinkle rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i class='bx bx-book-reader text-4xl'></i>
            </div>
            <h1 class="text-3xl font-extrabold text-gray-800 mb-2">Selamat Datang</h1>
            <p class="text-gray-400 font-medium">Masuk ke akun PerpusTech Anda</p>
        </div>

        @if(session('error'))
            <div class="mb-6 p-4 bg-red-50 border border-red-100 text-red-600 rounded-xl text-sm font-bold text-center flex items-center justify-center gap-2">
                <i class='bx bx-error-circle'></i> {{ session('error') }}
            </div>
        @endif

        <form action="/login" method="POST" class="space-y-6">
            @csrf
            <div class="space-y-2">
                <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Email</label>
                <div class="relative">
                    <i class='bx bx-envelope absolute left-4 top-3.5 text-gray-400 text-lg'></i>
                    <input type="email" name="email" class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-soft-periwinkle/20 focus:border-soft-periwinkle transition-all" placeholder="nama@email.com" required>
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-1">Kata Sandi</label>
                <div class="relative">
                    <i class='bx bx-lock-alt absolute left-4 top-3.5 text-gray-400 text-lg'></i>
                    <input type="password" name="password" class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-soft-periwinkle/20 focus:border-soft-periwinkle transition-all" placeholder="••••••••" required>
                </div>
            </div>

            <button type="submit" class="w-full bg-soft-periwinkle hover:bg-indigo-600 text-white font-bold py-3.5 rounded-xl transition-all shadow-lg shadow-soft-periwinkle/20 active:scale-[0.98]">
                Masuk ke Sistem
            </button>
        </form>
    </div>
</body>
</html>