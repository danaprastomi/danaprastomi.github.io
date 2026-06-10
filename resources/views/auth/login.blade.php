<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CLS Admin</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased min-h-screen">
    <div class="min-h-screen flex">
        {{-- Left Side - Decorative --}}
        <div class="hidden lg:flex lg:w-1/2 gradient-hero relative items-center justify-center overflow-hidden">
            {{-- Decorative shapes --}}
            <div class="absolute top-20 left-20 w-72 h-72 bg-white/5 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-sky-400/10 rounded-full blur-3xl"></div>
            <div class="absolute top-1/2 left-1/4 w-48 h-48 border border-white/10 rounded-2xl rotate-45"></div>
            <div class="absolute bottom-1/3 right-1/3 w-32 h-32 border border-white/10 rounded-full"></div>

            <div class="relative z-10 text-center text-white px-12">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-24 w-auto mx-auto mb-8 drop-shadow-2xl animate-float">
                <h1 class="text-4xl font-extrabold mb-4 leading-tight">CV. Cakrawala<br>Langit Semesta</h1>
                <div class="w-20 h-1 bg-brand-gold mx-auto mb-6 rounded-full"></div>
                <p class="text-lg text-sky-200 max-w-md mx-auto leading-relaxed">General Supplier terpercaya untuk kebutuhan bisnis dan industri Anda</p>
                <div class="mt-10 flex justify-center gap-4">
                    <div class="glass rounded-xl px-6 py-3 text-sm font-medium">✓ Terpercaya</div>
                    <div class="glass rounded-xl px-6 py-3 text-sm font-medium">✓ Profesional</div>
                    <div class="glass rounded-xl px-6 py-3 text-sm font-medium">✓ Berkualitas</div>
                </div>
            </div>
        </div>

        {{-- Right Side - Login Form --}}
        <div class="flex-1 flex items-center justify-center p-6 sm:p-12 bg-gradient-to-br from-slate-50 to-sky-50 relative">
            {{-- Subtle pattern --}}
            <div class="absolute inset-0 dots-pattern"></div>

            <div class="relative z-10 w-full max-w-md">
                {{-- Mobile Logo --}}
                <div class="lg:hidden text-center mb-8">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-16 w-auto mx-auto mb-4">
                    <h2 class="text-2xl font-bold text-brand-dark">CV. Cakrawala Langit Semesta</h2>
                </div>

                <div class="bg-white rounded-2xl shadow-xl shadow-sky-500/10 p-8 sm:p-10 border border-slate-100">
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-extrabold text-slate-800">Selamat Datang</h2>
                        <p class="text-slate-500 mt-2 text-sm">Masuk ke panel administrasi</p>
                    </div>

                    {{-- Session Error --}}
                    @if(session('error'))
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl text-sm flex items-center gap-2">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-600 px-4 py-3 rounded-xl text-sm flex items-center gap-2">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        {{-- Email --}}
                        <div>
                            <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
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
                                       placeholder="••••••••">
                            </div>
                            @error('password')
                                <p class="mt-1.5 text-sm text-red-500 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Remember Me --}}
                        <div class="flex items-center justify-between">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-brand-blue focus:ring-brand-blue transition">
                                <span class="text-sm text-slate-600">Ingat saya</span>
                            </label>
                        </div>

                        {{-- Submit --}}
                        <button type="submit"
                                class="w-full py-3.5 gradient-brand text-white font-bold rounded-xl shadow-lg shadow-sky-500/30 hover:shadow-xl hover:shadow-sky-500/40 hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 text-sm">
                            Masuk
                        </button>
                    </form>

                    <div class="mt-6 text-center">
                        <p class="text-sm text-slate-500">
                            Belum punya akun?
                            <a href="{{ route('register') }}" class="font-semibold text-brand-blue hover:text-brand-dark transition-colors">Daftar di sini</a>
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
