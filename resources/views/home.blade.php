@extends('layouts.app')

@section('title', $profile['name'] ?? 'CV. Cakrawala Langit Semesta - General Supplier & Safety')

@section('content')
    {{-- ===== Hero Carousel ===== --}}
    <section class="relative pt-20 h-[85vh] sm:h-screen min-h-[500px] bg-slate-900 overflow-hidden">
        <div class="carousel-container h-full w-full">
            @forelse($sliders as $index => $slider)
                <div class="carousel-slide h-full w-full {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}">
                    {{-- Slide Background Image --}}
                    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat transition-transform duration-10000" style="background-image: url('{{ Storage::url($slider->image) }}');"></div>
                    {{-- Hero Overlay --}}
                    <div class="absolute inset-0 hero-overlay"></div>
                    
                    {{-- Content --}}
                    <div class="absolute inset-0 flex items-center">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                            <div class="max-w-3xl slide-content text-white">
                                <span class="inline-block px-4 py-1.5 bg-brand-gold/90 backdrop-blur-sm text-slate-900 font-bold text-xs uppercase tracking-widest rounded-full mb-5 shadow-lg border border-white/20">
                                    {{ $slider->subtitle }}
                                </span>
                                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight mb-6 drop-shadow-md">
                                    {{ $slider->title }}
                                </h2>
                                <p class="text-base sm:text-lg lg:text-xl text-slate-200 mb-8 leading-relaxed font-light drop-shadow">
                                    {{ $slider->description }}
                                </p>
                                <div class="flex flex-wrap gap-4">
                                    <a href="{{ route('produk') }}" class="px-8 py-3.5 bg-gradient-to-r from-sky-500 to-sky-600 hover:from-sky-400 hover:to-sky-500 text-white font-bold rounded-lg shadow-lg hover:shadow-sky-500/30 hover:scale-105 transition-all duration-300">
                                        Lihat Produk
                                    </a>
                                    <a href="{{ route('kontak') }}" class="px-8 py-3.5 bg-white/10 backdrop-blur-md hover:bg-white/20 text-white border border-white/30 font-bold rounded-lg hover:scale-105 transition-all duration-300">
                                        Hubungi Kami
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="carousel-slide h-full w-full active">
                    <div class="absolute inset-0 gradient-hero"></div>
                    <div class="absolute inset-0 flex items-center justify-center text-white">
                        <div class="text-center px-4">
                            <h2 class="text-4xl font-bold mb-4">CV. Cakrawala Langit Semesta</h2>
                            <p class="text-lg opacity-85">General Supplier & Services</p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Carousel Navigation Controls --}}
        @if(count($sliders) > 1)
            <button onclick="prevSlide()" class="absolute left-4 top-1/2 -translate-y-1/2 z-30 p-3 rounded-full bg-white/10 hover:bg-white/20 text-white backdrop-blur border border-white/15 hover:scale-110 transition-all cursor-pointer" aria-label="Slide sebelumnya">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button onclick="nextSlide()" class="absolute right-4 top-1/2 -translate-y-1/2 z-30 p-3 rounded-full bg-white/10 hover:bg-white/20 text-white backdrop-blur border border-white/15 hover:scale-110 transition-all cursor-pointer" aria-label="Slide berikutnya">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </button>

            {{-- Indicators (Dots) --}}
            <div class="absolute bottom-8 left-0 right-0 z-30 flex justify-center gap-3">
                @foreach($sliders as $index => $slider)
                    <button onclick="goToSlide({{ $index }})" class="carousel-dot w-3.5 h-3.5 rounded-full bg-white/30 border border-white/20 transition-all cursor-pointer" data-slide-index="{{ $index }}" aria-label="Menuju slide {{ $index + 1 }}"></button>
                @endforeach
            </div>
        @endif
    </section>

    {{-- ===== About Section ===== --}}
    <section id="about" class="relative py-24 bg-slate-50 overflow-hidden">
        {{-- Decorative Dots Background --}}
        <div class="absolute top-0 right-0 w-96 h-96 dots-pattern -mr-20 -mt-20"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 dots-pattern -ml-20 -mb-20"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
                {{-- Left Side: Text --}}
                <div class="lg:col-span-7 scroll-animate animate-fade-in-left">
                    <span class="text-sky-500 font-bold text-sm uppercase tracking-wider block mb-3">Tentang Kami</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-800 leading-tight mb-8">
                        Solusi Penyuplai Bisnis Terpercaya
                    </h2>
                    <div class="prose prose-slate max-w-none text-slate-600 text-base sm:text-lg leading-relaxed mb-8">
                        <p class="mb-4">
                            {{ $profile['about'] ?? 'CV. Cakrawala Langit Semesta adalah perusahaan yang bergerak di bidang General Supplier, menyediakan berbagai jenis produk dan jasa berkualitas tinggi untuk memenuhi kebutuhan operasional kantor dan industri Anda.' }}
                        </p>
                        <p>
                            Kami mengutamakan kualitas, kecepatan pengiriman, dan harga kompetitif untuk menjamin kepuasan mitra bisnis kami. Mulai dari alat tulis kantor (ATK), kebutuhan mekanikal/elektrikal, hingga peralatan keselamatan kerja (Safety).
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-4 mt-8">
                        <a href="{{ route('about') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-sky-500 hover:bg-sky-600 text-white font-bold text-sm rounded-lg shadow-md hover:scale-105 transition-all">
                            <span>Baca Selengkapnya</span>
                            <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>

                    {{-- Features Quick Grid --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-12">
                        <div class="flex gap-4 p-4 bg-white rounded-xl shadow-sm border border-slate-100">
                            <span class="flex items-center justify-center w-12 h-12 rounded-lg bg-sky-50 text-sky-500 shrink-0 font-bold">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </span>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">Produk Orisinil</h4>
                                <p class="text-slate-500 text-xs mt-1">Hanya menyediakan produk berkualitas tinggi dari brand terpercaya.</p>
                            </div>
                        </div>
                        <div class="flex gap-4 p-4 bg-white rounded-xl shadow-sm border border-slate-100">
                            <span class="flex items-center justify-center w-12 h-12 rounded-lg bg-sky-50 text-sky-500 shrink-0 font-bold">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            </span>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">Respon Cepat</h4>
                                <p class="text-slate-500 text-xs mt-1">Tim kami siap memproses pesanan dan membalas inquiries dengan cepat.</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Side: Image Showcase --}}
                <div class="lg:col-span-5 relative scroll-animate animate-fade-in-right">
                    <div class="relative mx-auto max-w-md lg:max-w-none">
                        {{-- Underlay decorative box --}}
                        <div class="absolute inset-0 bg-gradient-to-tr from-sky-500 to-sky-300 rounded-3xl transform rotate-6 scale-95 shadow-xl"></div>
                        {{-- Front Image --}}
                        <div class="relative overflow-hidden rounded-3xl shadow-2xl border-4 border-white bg-slate-200">
                            <img src="{{ asset('images/company-profile-1.jpg') }}" alt="Ilustrasi General Supplier" class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-500">
                        </div>
                        {{-- Overlay Small Card --}}
                        <div class="absolute -bottom-6 -left-6 bg-slate-900 text-white p-5 rounded-2xl shadow-2xl border border-white/10 hidden sm:block">
                            <p class="text-2xl font-black text-brand-gold">100%</p>
                            <p class="text-xs text-sky-400 font-semibold uppercase tracking-wider">Mitra Terpercaya</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== Visi & Misi Section ===== --}}
    <section id="visi-misi" class="py-24 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white relative overflow-hidden">
        {{-- Ambient glows --}}
        <div class="absolute -top-40 -right-40 w-96 h-96 rounded-full bg-sky-500/10 blur-[120px]"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 rounded-full bg-sky-500/10 blur-[120px]"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16 scroll-animate animate-scale-in">
                <span class="text-brand-gold font-bold text-sm uppercase tracking-wider block mb-3">Tujuan & Nilai</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold mb-5 section-underline">Visi & Misi Kami</h2>
                <p class="text-slate-300 text-base sm:text-lg font-light leading-relaxed mt-4">Fokus utama kami adalah memberikan dedikasi pelayanan terbaik demi memajukan operasional bisnis mitra kami.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-12">
                {{-- Visi Card --}}
                <div class="glass-dark p-8 sm:p-10 rounded-2xl shadow-xl flex flex-col justify-between scroll-animate animate-fade-in-left">
                    <div>
                        <div class="inline-flex items-center justify-center p-4 bg-sky-500/25 border border-sky-400/20 text-sky-400 rounded-xl mb-6 shadow-inner">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-white">Visi</h3>
                        <p class="text-slate-300 text-base leading-relaxed font-light">
                            "{{ $profile['visi'] ?? 'Menjadikan perusahaan General Supplier dengan reputasi dan pelayanan yang baik serta berkualitas tinggi.' }}"
                        </p>
                    </div>
                </div>

                {{-- Misi Card --}}
                <div class="glass-dark p-8 sm:p-10 rounded-2xl shadow-xl flex flex-col justify-between scroll-animate animate-fade-in-right">
                    <div>
                        <div class="inline-flex items-center justify-center p-4 bg-yellow-500/20 border border-yellow-400/20 text-brand-gold rounded-xl mb-6 shadow-inner">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-white">Misi</h3>
                        <p class="text-slate-300 text-base leading-relaxed font-light">
                            "{{ $profile['misi'] ?? 'Menyediakan produk dan jasa yang berkualitas tinggi, serta memberikan pelayanan prima dan responsif kepada pelanggan.' }}"
                        </p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12 scroll-animate animate-fade-in-up">
                <a href="{{ route('visi-misi') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-white/10 hover:bg-white/20 border border-white/20 text-white font-bold text-sm rounded-lg transition-all hover:scale-105">
                    <span>Lihat Nilai & Detail Visi Misi</span>
                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </section>

    {{-- ===== Products & Services Section ===== --}}
    <section id="services" class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 scroll-animate animate-scale-in">
                <span class="text-sky-500 font-bold text-sm uppercase tracking-wider block mb-3">Layanan Kami</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-800 mb-5 section-underline">Produk & Jasa Unggulan</h2>
                <p class="text-slate-500 text-base sm:text-lg mt-4 leading-relaxed">Kami menyuplai bermacam-macam barang kebutuhan perkantoran, konstruksi, hingga safety equipment.</p>
            </div>

            {{-- Products Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @forelse($featuredServices as $service)
                    <div class="service-card group bg-slate-50 rounded-2xl overflow-hidden border border-slate-150 shadow-sm hover:shadow-xl hover:-translate-y-2 card-hover">
                        {{-- Image area --}}
                        <div class="relative aspect-video w-full overflow-hidden bg-slate-200">
                            @if($service->image)
                                <img src="{{ Storage::url($service->image) }}" alt="{{ $service->name }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-gradient-to-tr from-slate-200 via-slate-100 to-slate-200 flex items-center justify-center text-slate-400">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                </div>
                            @endif
                            <span class="absolute top-3 right-3 bg-brand-gold/90 backdrop-blur-sm text-slate-900 text-xs font-bold px-3 py-1 rounded-full shadow border border-white/20">
                                {{ $service->category }}
                            </span>
                        </div>

                        {{-- Card Details --}}
                        <div class="p-6">
                            <h3 class="font-bold text-slate-800 text-lg group-hover:text-sky-600 transition-colors mb-2 truncate">
                                {{ $service->name }}
                            </h3>
                            <p class="text-slate-500 text-sm line-clamp-3 leading-relaxed mb-4">
                                {{ $service->description ?? 'Pilihan produk terbaik untuk mendukung efisiensi dan kelancaran operasional bisnis Anda.' }}
                            </p>
                            <a href="{{ route('produk', ['category' => \Illuminate\Support\Str::slug($service->category)]) }}" class="inline-flex items-center gap-2 text-sky-500 font-bold text-sm hover:text-sky-600 group/link">
                                <span>Lihat Kategori</span>
                                <svg class="w-4 h-4 transform group-hover/link:translate-x-1.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center text-slate-400">
                        <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <p class="text-lg">Belum ada produk atau jasa tersedia.</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-16 scroll-animate animate-fade-in-up">
                <a href="{{ route('produk') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-gradient-to-r from-sky-500 to-sky-600 hover:from-sky-400 hover:to-sky-500 text-white font-bold text-sm rounded-lg shadow-lg hover:scale-105 transition-all">
                    <span>Lihat Semua Produk & Jasa</span>
                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </section>

    {{-- ===== Klien Kami Section ===== --}}
    <section id="clients-preview" class="py-24 bg-slate-50 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16 scroll-animate animate-scale-in">
                <span class="text-sky-500 font-bold text-sm uppercase tracking-wider block mb-3">Mitra Terpercaya</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-800 mb-5 section-underline">Klien Kami</h2>
                <p class="text-slate-500 text-sm sm:text-base mt-4 font-light">CLS telah mensuplai kebutuhan operasional ke berbagai perusahaan terkemuka di Indonesia.</p>
            </div>

            {{-- Client logos grid --}}
            <div class="grid grid-cols-2 md:grid-cols-6 gap-8 items-center justify-items-center mb-12">
                <div class="h-16 flex items-center justify-center grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all font-black text-xl text-slate-400">Pertamina</div>
                <div class="h-16 flex items-center justify-center grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all font-black text-xl text-slate-400">Waskita</div>
                <div class="h-16 flex items-center justify-center grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all font-black text-xl text-slate-400">WIKA</div>
                <div class="h-16 flex items-center justify-center grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all font-black text-xl text-slate-400">Unilever</div>
                <div class="h-16 flex items-center justify-center grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all font-black text-xl text-slate-400">Adhi Karya</div>
                <div class="h-16 flex items-center justify-center grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all font-black text-xl text-slate-400">Indofood</div>
            </div>

            <div class="text-center">
                <a href="{{ route('klien') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-white border border-slate-200 text-slate-700 font-bold text-sm rounded-lg shadow-sm hover:bg-slate-50 hover:scale-105 transition-all">
                    <span>Lihat Testimoni & Detail Klien</span>
                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </section>

    {{-- ===== Contact Section ===== --}}
    <section id="contact" class="py-24 bg-white relative overflow-hidden border-t border-slate-100">
        {{-- Background accents --}}
        <div class="absolute -bottom-40 -right-40 w-96 h-96 rounded-full bg-sky-200/40 blur-[100px]"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
                {{-- Left: Contact Info --}}
                <div class="lg:col-span-5 scroll-animate animate-fade-in-left">
                    <span class="text-sky-500 font-bold text-sm uppercase tracking-wider block mb-3">Hubungi Kami</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-800 leading-tight mb-6">
                        Diskusikan Kebutuhan Anda dengan Kami
                    </h2>
                    <p class="text-slate-600 text-base sm:text-lg mb-10 leading-relaxed font-light">Kami siap membantu dan menyediakan produk penawaran terbaik untuk operasional perusahaan Anda.</p>

                    <div class="space-y-6">
                        {{-- Address --}}
                        <div class="flex items-start gap-4">
                            <span class="flex items-center justify-center w-12 h-12 rounded-xl bg-slate-50 text-sky-500 shrink-0 shadow-sm border border-slate-100">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </span>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">Alamat Kantor</h4>
                                <p class="text-slate-500 text-sm mt-1 leading-relaxed">{{ $profile['alamat'] ?? 'Jakarta, Indonesia' }}</p>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="flex items-start gap-4">
                            <span class="flex items-center justify-center w-12 h-12 rounded-xl bg-slate-50 text-sky-500 shrink-0 shadow-sm border border-slate-100">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </span>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">E-mail</h4>
                                <a href="mailto:{{ $profile['email'] ?? 'info@cls.co.id' }}" class="text-slate-500 text-sm mt-1 block hover:text-sky-500 transition-colors">{{ $profile['email'] ?? 'info@cls.co.id' }}</a>
                            </div>
                        </div>

                        {{-- Telepon --}}
                        <div class="flex items-start gap-4">
                            <span class="flex items-center justify-center w-12 h-12 rounded-xl bg-slate-50 text-sky-500 shrink-0 shadow-sm border border-slate-100">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </span>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">Telepon / Fax</h4>
                                <p class="text-slate-500 text-sm mt-1">{{ $profile['telepon'] ?? '(021) 1234-5678' }}</p>
                            </div>
                        </div>

                        {{-- WhatsApp --}}
                        <div class="flex items-start gap-4">
                            <span class="flex items-center justify-center w-12 h-12 rounded-xl bg-slate-50 text-green-500 shrink-0 shadow-sm border border-slate-100">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            </span>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">WhatsApp</h4>
                                @php
                                    $waRaw = $profile['whatsapp'] ?? '081234567890';
                                    $waFormatted = preg_replace('/[^0-9]/', '', $waRaw);
                                    if(str_starts_with($waFormatted, '0')) {
                                        $waFormatted = '62' . substr($waFormatted, 1);
                                    }
                                @endphp
                                <a href="https://wa.me/{{ $waFormatted }}?text=Halo%20CV.%20Cakrawala%20Langit%20Semesta" target="_blank" class="text-slate-500 text-sm mt-1 block hover:text-green-500 font-semibold transition-colors">
                                    {{ $waRaw }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right: Form --}}
                <div class="lg:col-span-7 scroll-animate animate-fade-in-right">
                    <div class="bg-slate-50 p-8 sm:p-10 rounded-2xl border border-slate-150 relative">
                        <h3 class="text-2xl font-bold text-slate-800 mb-6">Kirim Pesan</h3>
                        
                        <form method="POST" action="{{ route('contact.send') }}" enctype="multipart/form-data" class="space-y-6">
                            @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap *</label>
                                    <input type="text" id="name" name="name" required value="{{ old('name') }}"
                                        class="w-full px-4 py-3 border border-slate-200 rounded-lg text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all bg-white">
                                    @error('name') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Alamat Email *</label>
                                    <input type="email" id="email" name="email" required value="{{ old('email') }}"
                                        class="w-full px-4 py-3 border border-slate-200 rounded-lg text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all bg-white">
                                    @error('email') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label for="phone" class="block text-sm font-semibold text-slate-700 mb-2">No. Telepon / HP</label>
                                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                        class="w-full px-4 py-3 border border-slate-200 rounded-lg text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all bg-white">
                                    @error('phone') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="subject" class="block text-sm font-semibold text-slate-700 mb-2">Subjek *</label>
                                    <input type="text" id="subject" name="subject" required value="{{ old('subject') }}"
                                        class="w-full px-4 py-3 border border-slate-200 rounded-lg text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all bg-white">
                                    @error('subject') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div>
                                <label for="message" class="block text-sm font-semibold text-slate-700 mb-2">Isi Pesan *</label>
                                <textarea id="message" name="message" rows="5" required
                                    class="w-full px-4 py-3 border border-slate-200 rounded-lg text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all resize-y bg-white">{{ old('message') }}</textarea>
                                @error('message') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="attachment" class="block text-sm font-semibold text-slate-700 mb-2">Lampiran (Gambar atau Dokumen)</label>
                                <input type="file" id="attachment" name="attachment"
                                    accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.xls,.xlsx,.txt,.zip"
                                    class="w-full px-4 py-3 border border-slate-200 rounded-lg text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all bg-white">
                                <p class="text-xs text-slate-500 mt-2">Format yang diizinkan: JPG, PNG, GIF, PDF, DOC, DOCX, XLS, XLSX, TXT, ZIP (Maksimal 5MB)</p>
                                @error('attachment') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                            </div>

                            <button type="submit" class="w-full py-4 bg-gradient-to-r from-sky-500 to-sky-600 hover:from-sky-400 hover:to-sky-500 text-white font-bold text-sm rounded-lg shadow-lg hover:shadow-sky-500/20 hover:scale-102 transition-all duration-300 cursor-pointer">
                                Kirim Pesan Sekarang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        {{-- ===== Hero Carousel Script ===== --}}
        let currentSlide = 0;
        const slides = document.querySelectorAll('.carousel-slide');
        const dots = document.querySelectorAll('.carousel-dot');
        const totalSlides = slides.length;
        let slideInterval;

        function showSlide(index) {
            if (totalSlides === 0) return;
            
            // Loop boundaries
            if (index >= totalSlides) currentSlide = 0;
            else if (index < 0) currentSlide = totalSlides - 1;
            else currentSlide = index;

            // Remove active classes
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('bg-white', 'w-8'));

            // Set active slide & dot
            slides[currentSlide].classList.add('active');
            if (dots[currentSlide]) {
                dots[currentSlide].classList.add('bg-white', 'w-8');
            }
        }

        function nextSlide() {
            showSlide(currentSlide + 1);
            resetInterval();
        }

        // Initialize Carousel
        function prevSlide() {
            showSlide(currentSlide - 1);
            resetInterval();
        }

        function goToSlide(index) {
            showSlide(index);
            resetInterval();
        }

        function startInterval() {
            if (totalSlides > 1) {
                slideInterval = setInterval(nextSlide, 5000);
            }
        }

        function resetInterval() {
            clearInterval(slideInterval);
            startInterval();
        }

        document.addEventListener('DOMContentLoaded', () => {
            showSlide(0);
            startInterval();
        });
    </script>
@endpush
