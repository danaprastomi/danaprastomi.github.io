<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CV. Cakrawala Langit Semesta - General Supplier terpercaya untuk kebutuhan bisnis Anda.">
    <meta name="keywords" content="general supplier, cakrawala langit semesta, CLS, supplier kantor, supplier bahan bangunan">
    <meta name="author" content="CV. Cakrawala Langit Semesta">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'CV. Cakrawala Langit Semesta - General Supplier')</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-sans antialiased text-slate-700 bg-white">

    {{-- ===== Flash Messages ===== --}}
    @if(session('success'))
        <div class="flash-message fixed top-24 right-6 z-[100] max-w-sm">
            <div class="bg-emerald-500 text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3">
                <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        </div>
    @endif
    @if(session('error'))
        <div class="flash-message fixed top-24 right-6 z-[100] max-w-sm">
            <div class="bg-brand-red text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3">
                <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span class="font-medium">{{ session('error') }}</span>
            </div>
        </div>
    @endif

    {{-- ===== Navigation Bar ===== --}}
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                {{-- Logo & Company Name --}}
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo CLS" class="h-12 w-auto transition-transform duration-300 group-hover:scale-110">
                    <div class="hidden sm:block">
                        <h1 class="text-lg font-bold leading-tight text-slate-900 transition-colors duration-300">CV. Cakrawala Langit Semesta</h1>
                        <p class="text-xs text-slate-600 transition-colors duration-300">General Supplier</p>
                    </div>
                </a>

                {{-- Desktop Navigation --}}
                <div class="hidden lg:flex items-center gap-1">
                    <a href="{{ route('home') }}" class="nav-link px-4 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:bg-brand-light hover:text-brand-dark transition-all duration-300">Beranda</a>
                    <a href="{{ route('about') }}" class="nav-link px-4 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:bg-brand-light hover:text-brand-dark transition-all duration-300">Tentang Kami</a>
                    
                    {{-- Dropdown Produk --}}
                    <div class="relative group py-2">
                        <button class="nav-link flex items-center gap-1 px-4 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:bg-brand-light hover:text-brand-dark transition-all duration-300 focus:outline-none">
                            <span>Produk</span>
                            <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div class="absolute left-0 mt-2 w-56 rounded-xl bg-white shadow-xl border border-slate-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-[100] overflow-hidden">
                            <a href="{{ route('produk') }}" class="block px-4 py-3 text-xs font-bold uppercase tracking-wider text-slate-400 hover:bg-brand-light hover:text-brand-dark border-b border-slate-50 transition-colors">Semua Kategori</a>
                            @foreach($categories as $category)
                                <a href="{{ route('produk', ['category' => \Illuminate\Support\Str::slug($category)]) }}" class="block px-4 py-2.5 text-sm text-slate-700 hover:bg-brand-light hover:text-brand-dark transition-colors">{{ $category }}</a>
                            @endforeach
                        </div>
                    </div>

                    <a href="{{ route('visi-misi') }}" class="nav-link px-4 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:bg-brand-light hover:text-brand-dark transition-all duration-300">Visi & Misi</a>
                    <a href="{{ route('klien') }}" class="nav-link px-4 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:bg-brand-light hover:text-brand-dark transition-all duration-300">Klien Kami</a>
                    <a href="{{ route('kontak') }}" class="nav-link px-4 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:bg-brand-light hover:text-brand-dark transition-all duration-300">Kontak</a>
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="ml-3 px-5 py-2.5 bg-brand-gold text-white text-sm font-semibold rounded-lg shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="ml-3 px-5 py-2.5 bg-brand-dark text-white text-sm font-semibold rounded-lg hover:bg-slate-800 transition-all duration-300">Login</a>
                    @endauth
                </div>

                {{-- Mobile Menu Button --}}
                <button id="mobile-menu-btn" class="lg:hidden p-2 rounded-lg text-slate-700 hover:bg-slate-100 transition-colors" aria-label="Toggle menu">
                    <svg id="menu-icon-open" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg id="menu-icon-close" class="w-7 h-7 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="lg:hidden hidden bg-white border-b border-slate-100 shadow-md">
            <div class="px-4 py-6 space-y-2">
                <a href="{{ route('home') }}" class="block px-4 py-3 rounded-xl text-slate-700 font-semibold hover:bg-brand-light hover:text-brand-dark transition-all">Beranda</a>
                <a href="{{ route('about') }}" class="block px-4 py-3 rounded-xl text-slate-700 font-semibold hover:bg-brand-light hover:text-brand-dark transition-all mobile-nav-link">Tentang Kami</a>
                
                {{-- Mobile Produk Accordion --}}
                <div class="space-y-1">
                    <button onclick="toggleMobileDropdown()" class="w-full flex items-center justify-between px-4 py-3 rounded-xl text-slate-700 font-semibold hover:bg-brand-light hover:text-brand-dark transition-all focus:outline-none">
                        <span>Produk & Jasa</span>
                        <svg id="mobile-arrow" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div id="mobile-produk-submenu" class="hidden pl-6 pr-4 py-2 space-y-1 bg-slate-50 rounded-xl">
                        <a href="{{ route('produk') }}" class="block px-4 py-2 text-sm text-slate-600 hover:text-brand-blue font-semibold transition-colors">Semua Kategori</a>
                        @foreach($categories as $category)
                            <a href="{{ route('produk', ['category' => \Illuminate\Support\Str::slug($category)]) }}" class="block px-4 py-2 text-sm text-slate-600 hover:text-brand-blue transition-colors">{{ $category }}</a>
                        @endforeach
                    </div>
                </div>

                <a href="{{ route('visi-misi') }}" class="block px-4 py-3 rounded-xl text-slate-700 font-semibold hover:bg-brand-light hover:text-brand-dark transition-all mobile-nav-link">Visi & Misi</a>
                <a href="{{ route('klien') }}" class="block px-4 py-3 rounded-xl text-slate-700 font-semibold hover:bg-brand-light hover:text-brand-dark transition-all mobile-nav-link">Klien Kami</a>
                <a href="{{ route('kontak') }}" class="block px-4 py-3 rounded-xl text-slate-700 font-semibold hover:bg-brand-light hover:text-brand-dark transition-all mobile-nav-link">Kontak</a>
                <div class="pt-4 border-t border-slate-200">
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 bg-brand-gold text-white font-semibold rounded-xl text-center shadow-lg">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="block px-4 py-3 gradient-brand text-white font-semibold rounded-xl text-center shadow-lg">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- ===== Main Content ===== --}}
    <main>
        @yield('content')
    </main>

    {{-- ===== Footer ===== --}}
    <footer class="relative bg-slate-900 text-white overflow-hidden">
        {{-- Decorative top wave --}}
        <div class="absolute top-0 left-0 right-0">
            <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 40L48 35C96 30 192 20 288 25C384 30 480 50 576 55C672 60 768 50 864 40C960 30 1056 20 1152 25C1248 30 1344 50 1392 60L1440 70V0H0V40Z" fill="#0C4A6E" fill-opacity="0.3"/></svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                {{-- Company Info --}}
                <div class="lg:col-span-1">
                    <div class="flex items-center gap-3 mb-5">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 w-auto">
                        <div>
                            <h3 class="font-bold text-lg">CV. Cakrawala Langit Semesta</h3>
                            <p class="text-sm text-sky-300">General Supplier</p>
                        </div>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed">Menyediakan berbagai kebutuhan bisnis dan industri dengan kualitas terbaik dan harga kompetitif.</p>
                    <div class="flex gap-3 mt-6">
                        <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-brand-blue hover:scale-110 transition-all duration-300" aria-label="Facebook">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-brand-blue hover:scale-110 transition-all duration-300" aria-label="Instagram">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-green-500 hover:scale-110 transition-all duration-300" aria-label="WhatsApp">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Quick Links --}}
                <div>
                    <h4 class="font-bold text-lg mb-5 text-brand-gold">Navigasi</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}" class="text-slate-400 hover:text-white hover:pl-2 transition-all duration-300 text-sm">Beranda</a></li>
                        <li><a href="{{ route('about') }}" class="text-slate-400 hover:text-white hover:pl-2 transition-all duration-300 text-sm">Tentang Kami</a></li>
                        <li><a href="{{ route('produk') }}" class="text-slate-400 hover:text-white hover:pl-2 transition-all duration-300 text-sm">Katalog Produk</a></li>
                        <li><a href="{{ route('visi-misi') }}" class="text-slate-400 hover:text-white hover:pl-2 transition-all duration-300 text-sm">Visi & Misi</a></li>
                        <li><a href="{{ route('klien') }}" class="text-slate-400 hover:text-white hover:pl-2 transition-all duration-300 text-sm">Klien Kami</a></li>
                        <li><a href="{{ route('kontak') }}" class="text-slate-400 hover:text-white hover:pl-2 transition-all duration-300 text-sm">Hubungi Kami</a></li>
                    </ul>
                </div>

                {{-- Services --}}
                <div>
                    <h4 class="font-bold text-lg mb-5 text-brand-gold">Layanan Kami</h4>
                    <ul class="space-y-3">
                        <li><span class="text-slate-400 text-sm">Perlengkapan Kantor</span></li>
                        <li><span class="text-slate-400 text-sm">Mekanikal & Elektrikal</span></li>
                        <li><span class="text-slate-400 text-sm">Percetakan & Dekorasi</span></li>
                        <li><span class="text-slate-400 text-sm">Bahan Bangunan</span></li>
                        <li><span class="text-slate-400 text-sm">Safety & Security</span></li>
                    </ul>
                </div>

                {{-- Contact Info --}}
                <div>
                    <h4 class="font-bold text-lg mb-5 text-brand-gold">Kontak</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-brand-blue shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span class="text-slate-400 text-sm">Jakarta, Indonesia</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-brand-blue shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <span class="text-slate-400 text-sm">info@cls.co.id</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-brand-blue shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span class="text-slate-400 text-sm">+62 21 xxxx xxxx</span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Bottom Bar --}}
            <div class="mt-14 pt-8 border-t border-slate-800 flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-slate-500 text-sm">&copy; {{ date('Y') }} CV. Cakrawala Langit Semesta. All rights reserved.</p>
                <p class="text-slate-600 text-xs">Designed with ❤️ for excellence</p>
            </div>
        </div>
    </footer>

    {{-- ===== Mobile Menu & Scroll Animation Script ===== --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuIconOpen = document.getElementById('menu-icon-open');
            const menuIconClose = document.getElementById('menu-icon-close');

            // Mobile menu toggle
            mobileMenuBtn.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
                menuIconOpen.classList.toggle('hidden');
                menuIconClose.classList.toggle('hidden');
            });

            // Mobile dropdown toggle function
            window.toggleMobileDropdown = function() {
                const submenu = document.getElementById('mobile-produk-submenu');
                const arrow = document.getElementById('mobile-arrow');
                submenu.classList.toggle('hidden');
                arrow.classList.toggle('rotate-180');
            };

            // Close mobile menu on link click
            document.querySelectorAll('.mobile-nav-link').forEach(link => {
                link.addEventListener('click', function() {
                    mobileMenu.classList.add('hidden');
                    menuIconOpen.classList.remove('hidden');
                    menuIconClose.classList.add('hidden');
                });
            });

            // Scroll animation observer
            const scrollElements = document.querySelectorAll('.scroll-animate');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animated');
                        const animClass = entry.target.dataset.animation || 'animate-fade-in-up';
                        entry.target.classList.add(animClass);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

            scrollElements.forEach(el => observer.observe(el));
        });
    </script>

    @stack('scripts')
</body>
</html>
