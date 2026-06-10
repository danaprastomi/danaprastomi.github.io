<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - CLS Admin</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased min-h-screen">
    <div class="min-h-screen flex">
        {{-- Left Side - Decorative --}}
        <div class="hidden lg:flex lg:w-1/2 gradient-hero relative items-center justify-center overflow-hidden">
            <div class="absolute top-20 left-20 w-72 h-72 bg-white/5 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-sky-400/10 rounded-full blur-3xl"></div>
            <div class="absolute top-1/3 right-1/4 w-48 h-48 border border-white/10 rounded-2xl rotate-12"></div>
            <div class="absolute bottom-1/4 left-1/3 w-36 h-36 border border-white/10 rounded-full"></div>

            <div class="relative z-10 text-center text-white px-12">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-24 w-auto mx-auto mb-8 drop-shadow-2xl animate-float">
                <h1 class="text-4xl font-extrabold mb-4 leading-tight">Bergabung<br>Bersama Kami</h1>
                <div class="w-20 h-1 bg-brand-gold mx-auto mb-6 rounded-full"></div>
                <p class="text-lg text-sky-200 max-w-md mx-auto leading-relaxed">Daftarkan diri Anda untuk mengakses panel administrasi CV. Cakrawala Langit Semesta</p>
            </div>
        </div>

        {{-- Right Side - Register Form --}}
        <div class="flex-1 flex items-center justify-center p-6 sm:p-12 bg-gradient-to-br from-slate-50 to-sky-50 relative">
            <div class="absolute inset-0 dots-pattern"></div>

            <div class="relative z-10 w-full max-w-md">
                {{-- Mobile Logo --}}
                <div class="lg:hidden text-center mb-8">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-16 w-auto mx-auto mb-4">
                    <h2 class="text-2xl font-bold text-brand-dark">CV. Cakrawala Langit Semesta</h2>
                </div>

                <div class="bg-white rounded-2xl shadow-xl shadow-sky-500/10 p-8 sm:p-10 border border-slate-100">
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-extrabold text-slate-800">Buat Akun Baru</h2>
                        <p class="text-slate-500 mt-2 text-sm">Isi formulir di bawah untuk mendaftar</p>
                    </div>

                    {{-- Admin Approval Notice --}}
                    <div class="mb-6 bg-amber-50 border border-amber-200 text-amber-700 px-4 py-3 rounded-xl text-sm flex items-start gap-2">
                        <svg class="w-5 h-5 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>Akun baru memerlukan persetujuan admin sebelum dapat digunakan.</span>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="space-y-5">
                        @csrf

                        {{-- Name --}}
                        <div>
                            <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                                <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                                       class="w-full pl-12 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-brand-blue focus:border-brand-blue focus:bg-white transition-all outline-none"
                                       placeholder="Nama lengkap Anda">
                            </div>
                            @error('name')
                                <p class="mt-1.5 text-sm text-red-500 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <input id="email" name="email" type="email" value="{{ old('email') }}" required
                                       class="w-full pl-12 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-brand-blue focus:border-brand-blue focus:bg-white transition-all outline-none"
                                       placeholder="nama@email.com">
                            </div>
                            @error('email')
                                <p class="mt-1.5 text-sm text-red-500 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div>
                            <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                </div>
                                <input id="password" name="password" type="password" required
                                       class="w-full pl-12 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-brand-blue focus:border-brand-blue focus:bg-white transition-all outline-none"
                                       placeholder="Minimal 8 karakter">
                            </div>
                            @error('password')
                                <p class="mt-1.5 text-sm text-red-500 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Confirm Password --}}
                        <div>
                            <label for="password_confirmation" class="block text-sm font-semibold text-slate-700 mb-2">Konfirmasi Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                </div>
                                <input id="password_confirmation" name="password_confirmation" type="password" required
                                       class="w-full pl-12 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-brand-blue focus:border-brand-blue focus:bg-white transition-all outline-none"
                                       placeholder="Ulangi password">
                            </div>
                        </div>

                        {{-- Submit --}}
                        <button type="submit"
                                class="w-full py-3.5 gradient-brand text-white font-bold rounded-xl shadow-lg shadow-sky-500/30 hover:shadow-xl hover:shadow-sky-500/40 hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 text-sm">
                            Daftar Akun
                        </button>
                    </form>

                    <div class="mt-6 text-center">
                        <p class="text-sm text-slate-500">
                            Sudah punya akun?
                            <a href="{{ route('login') }}" class="font-semibold text-brand-blue hover:text-brand-dark transition-colors">Masuk di sini</a>
                        </p>
                    </div>
                </div>

                <div class="mt-6 text-center">
                    <a href="{{ route('home') }}" class="text-sm text-slate-400 hover:text-brand-blue transition-colors inline-flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        Kembali ke website
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
