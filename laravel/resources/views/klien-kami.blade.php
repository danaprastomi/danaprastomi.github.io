@extends('layouts.app')

@section('title', 'Klien Kami - ' . ($profile['name'] ?? 'CV. Cakrawala Langit Semesta'))

@section('content')
    {{-- ===== Sub Hero Banner ===== --}}
    <section class="relative pt-32 pb-20 bg-slate-900 overflow-hidden">
        {{-- Ambient glows --}}
        <div class="absolute top-0 right-0 w-96 h-96 rounded-full bg-sky-500/10 blur-[120px]"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center text-white">
            <span class="inline-block px-4 py-1.5 bg-brand-gold/90 backdrop-blur-sm text-slate-900 font-bold text-xs uppercase tracking-widest rounded-full mb-4 shadow-lg border border-white/20">
                Kemitraan & Kepercayaan
            </span>
            <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight mb-4">
                Klien Kami
            </h1>
            <p class="max-w-2xl mx-auto text-slate-300 text-base sm:text-lg font-light leading-relaxed">
                Kami bangga telah dipercaya oleh berbagai perusahaan terkemuka di Indonesia untuk menyuplai berbagai kebutuhan operasional dan industri mereka.
            </p>
        </div>
    </section>

    {{-- ===== Clients Grid Section ===== --}}
    <section class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-sky-500 font-bold text-sm uppercase tracking-wider block mb-3">Daftar Mitra</span>
                <h2 class="text-3xl font-extrabold text-slate-800 mb-5 section-underline">Perusahaan Yang Bekerja Sama</h2>
                <p class="text-slate-500 text-sm sm:text-base mt-4 font-light">Kami melayani pengadaan barang skala kecil, menengah, hingga suplai rutin korporasi besar (BUMN & Swasta).</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($clients as $client)
                    <div class="p-8 bg-slate-50 border border-slate-150 rounded-3xl shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between h-72">
                        <div>
                            {{-- Logo Avatar Placeholder --}}
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-14 h-14 rounded-2xl flex items-center justify-center text-white font-extrabold text-lg shadow-md {{ $client['bg_color'] }}">
                                    {{ $client['logo_initial'] }}
                                </div>
                                <div>
                                    <h3 class="font-bold text-slate-800 text-base line-clamp-1" title="{{ $client['name'] }}">{{ $client['name'] }}</h3>
                                    <span class="text-xs text-sky-500 font-semibold uppercase tracking-wider">{{ $client['industry'] }}</span>
                                </div>
                            </div>
                            <p class="text-slate-500 text-sm leading-relaxed line-clamp-4">
                                {{ $client['description'] }}
                            </p>
                        </div>
                        <div class="text-xs font-bold text-slate-400 uppercase tracking-widest pt-4 border-t border-slate-150/70">
                            Status Mitra: Aktif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== Client Statistics Section ===== --}}
    <section class="py-20 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white relative overflow-hidden">
        {{-- Decorative glows --}}
        <div class="absolute -top-40 -right-40 w-96 h-96 rounded-full bg-sky-500/10 blur-[120px]"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 rounded-full bg-sky-500/10 blur-[120px]"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-10 text-center">
                <div>
                    <span class="block text-4xl sm:text-5xl font-black text-brand-gold mb-2">99%</span>
                    <h4 class="text-sm text-slate-300 font-semibold uppercase tracking-wider">Tingkat Kepuasan</h4>
                    <p class="text-xs text-slate-500 mt-2">Berdasarkan survey berkala tahunan klien kami</p>
                </div>
                <div>
                    <span class="block text-4xl sm:text-5xl font-black text-sky-400 mb-2">100+</span>
                    <h4 class="text-sm text-slate-300 font-semibold uppercase tracking-wider">Perusahaan Mitra</h4>
                    <p class="text-xs text-slate-500 mt-2">Klien aktif di bidang konstruksi, IT, dan GA</p>
                </div>
                <div>
                    <span class="block text-4xl sm:text-5xl font-black text-sky-400 mb-2">500+</span>
                    <h4 class="text-sm text-slate-300 font-semibold uppercase tracking-wider">Pesan Terkirim</h4>
                    <p class="text-xs text-slate-500 mt-2">Pengiriman logistik lancar tanpa hambatan berarti</p>
                </div>
                <div>
                    <span class="block text-4xl sm:text-5xl font-black text-brand-gold mb-2">24/7</span>
                    <h4 class="text-sm text-slate-300 font-semibold uppercase tracking-wider">Layanan Bantuan</h4>
                    <p class="text-xs text-slate-500 mt-2">Tim support siap siaga melayani darurat proyek</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== Testimonials Section ===== --}}
    <section class="py-24 bg-slate-50 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-sky-500 font-bold text-sm uppercase tracking-wider block mb-3">Testimoni</span>
                <h2 class="text-3xl font-extrabold text-slate-800 mb-5 section-underline">Apa Kata Klien Kami?</h2>
                <p class="text-slate-500 text-sm sm:text-base mt-4 font-light">Kepuasan Anda adalah prioritas kami. Simak umpan balik jujur dari beberapa manajer proyek mitra kami.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                @foreach($testimonials as $testimonial)
                    <div class="p-8 bg-white border border-slate-100 rounded-3xl shadow-sm flex flex-col justify-between hover:shadow-lg transition-shadow duration-300">
                        <div>
                            {{-- Stars --}}
                            <div class="flex gap-1 text-yellow-400 mb-6">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $testimonial['rating'])
                                        <svg class="w-5 h-5 fill-currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    @else
                                        <svg class="w-5 h-5 text-slate-200 fill-currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    @endif
                                @endfor
                            </div>
                            <blockquote class="text-slate-600 text-sm leading-relaxed italic mb-8">
                                "{{ $testimonial['comment'] }}"
                            </blockquote>
                        </div>
                        <div class="flex items-center gap-4 border-t border-slate-100 pt-5">
                            <div class="w-10 h-10 rounded-full bg-sky-100 text-sky-600 font-bold flex items-center justify-center text-sm shadow-inner shrink-0">
                                {{ $testimonial['avatar_letter'] }}
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">{{ $testimonial['client_name'] }}</h4>
                                <p class="text-slate-400 text-xs font-semibold">{{ $testimonial['role'] }}, {{ $testimonial['company'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== CTA Partnership Section ===== --}}
    <section class="py-20 bg-white border-t border-slate-100 text-center">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-800 mb-4">
                Siap Meningkatkan Efisiensi Bisnis Anda?
            </h2>
            <p class="text-slate-500 text-sm sm:text-base mb-8 leading-relaxed font-light">
                Bergabunglah dengan ratusan perusahaan lain yang telah mempercayakan kebutuhan logistik dan pengadaan mereka kepada kami. Tim representatif kami siap mengirimkan proposal penawaran resmi.
            </p>
            <a href="{{ route('kontak') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-gradient-to-r from-sky-500 to-sky-600 hover:from-sky-400 hover:to-sky-500 text-white font-bold rounded-lg shadow-lg hover:shadow-sky-500/25 hover:scale-105 transition-all duration-300">
                <span>Ajukan Permintaan Proposal</span>
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
    </section>
@endsection
