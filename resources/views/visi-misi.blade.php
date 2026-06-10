@extends('layouts.app')

@section('title', 'Visi & Misi - ' . ($profile['name'] ?? 'CV. Cakrawala Langit Semesta'))

@section('content')
    {{-- ===== Sub Hero Banner ===== --}}
    <section class="relative pt-32 pb-20 bg-slate-900 overflow-hidden">
        {{-- Ambient glows --}}
        <div class="absolute top-0 right-0 w-96 h-96 rounded-full bg-sky-500/10 blur-[120px]"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 rounded-full bg-sky-500/10 blur-[120px]"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center text-white">
            <span class="inline-block px-4 py-1.5 bg-brand-gold/90 backdrop-blur-sm text-slate-900 font-bold text-xs uppercase tracking-widest rounded-full mb-4 shadow-lg border border-white/20">
                Tujuan & Arah
            </span>
            <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight mb-4">
                Visi & Misi
            </h1>
            <p class="max-w-2xl mx-auto text-slate-300 text-base sm:text-lg font-light leading-relaxed">
                Melihat komitmen jangka panjang dan nilai-nilai luhur yang memandu operasional CV. Cakrawala Langit Semesta.
            </p>
        </div>
    </section>

    {{-- ===== Visi & Misi Cards Section ===== --}}
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                {{-- Visi Card --}}
                <div class="p-10 bg-slate-900 text-white rounded-3xl shadow-xl flex flex-col justify-between relative overflow-hidden group">
                    {{-- Decorative background glow --}}
                    <div class="absolute -top-24 -right-24 w-48 h-48 rounded-full bg-sky-500/25 blur-3xl transition-transform duration-500 group-hover:scale-125"></div>
                    
                    <div class="relative z-10">
                        <div class="inline-flex items-center justify-center p-4 bg-sky-500/20 border border-sky-400/20 text-sky-400 rounded-2xl mb-8 shadow-inner">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </div>
                        <h2 class="text-3xl font-extrabold mb-6">Visi Kami</h2>
                        <blockquote class="text-slate-300 text-xl italic leading-relaxed font-light mb-6 border-l-4 border-brand-gold pl-6">
                            "{{ $profile['visi'] ?? 'Menjadikan perusahaan General Supplier dengan reputasi dan pelayanan yang baik serta berkualitas tinggi.' }}"
                        </blockquote>
                    </div>
                    <div class="mt-8 border-t border-slate-800 pt-6 text-sm text-slate-400 font-medium tracking-wide relative z-10">
                        Menjadi Standard Utama Kemitraan General Supplier
                    </div>
                </div>

                {{-- Misi Card --}}
                <div class="p-10 bg-slate-50 border border-slate-150 rounded-3xl shadow-md flex flex-col justify-between relative overflow-hidden group">
                    {{-- Decorative background glow --}}
                    <div class="absolute -top-24 -right-24 w-48 h-48 rounded-full bg-yellow-500/10 blur-3xl transition-transform duration-500 group-hover:scale-125"></div>

                    <div class="relative z-10">
                        <div class="inline-flex items-center justify-center p-4 bg-yellow-500/10 border border-yellow-400/20 text-brand-gold rounded-2xl mb-8 shadow-inner">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <h2 class="text-3xl font-extrabold text-slate-800 mb-6">Misi Kami</h2>
                        
                        <div class="space-y-4">
                            @if(isset($profile['misi']))
                                <div class="flex items-start gap-4">
                                    <span class="flex items-center justify-center w-6 h-6 rounded-full bg-green-100 text-green-600 mt-1 shrink-0">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    </span>
                                    <p class="text-slate-600 text-base leading-relaxed">
                                        {{ $profile['misi'] }}
                                    </p>
                                </div>
                            @else
                                <div class="flex items-start gap-4">
                                    <span class="flex items-center justify-center w-6 h-6 rounded-full bg-green-100 text-green-600 mt-1 shrink-0">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    </span>
                                    <p class="text-slate-600 text-base leading-relaxed">
                                        Menyediakan produk dan jasa pengadaan berkualitas tinggi dari berbagai kategori kebutuhan industri.
                                    </p>
                                </div>
                                <div class="flex items-start gap-4">
                                    <span class="flex items-center justify-center w-6 h-6 rounded-full bg-green-100 text-green-600 mt-1 shrink-0">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    </span>
                                    <p class="text-slate-600 text-base leading-relaxed">
                                        Memberikan pelayanan yang profesional, komunikatif, responsif, dan fleksibel guna memuaskan pelanggan.
                                    </p>
                                </div>
                                <div class="flex items-start gap-4">
                                    <span class="flex items-center justify-center w-6 h-6 rounded-full bg-green-100 text-green-600 mt-1 shrink-0">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    </span>
                                    <p class="text-slate-600 text-base leading-relaxed">
                                        Menjamin ketepatan waktu pengiriman barang dan keaslian spesifikasi teknis produk demi kelancaran operasional mitra.
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="mt-8 border-t border-slate-200 pt-6 text-sm text-slate-500 font-medium tracking-wide relative z-10">
                        Integritas Pelayanan & Kualitas Terbaik
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== Core Values Section ===== --}}
    <section class="py-24 bg-slate-50 relative overflow-hidden">
        {{-- Glow decorative --}}
        <div class="absolute -bottom-40 -left-40 w-96 h-96 rounded-full bg-sky-500/5 blur-[120px]"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-sky-500 font-bold text-sm uppercase tracking-wider block mb-3">Nilai Perusahaan</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-800 mb-5 section-underline">Core Values Kami</h2>
                <p class="text-slate-500 text-base sm:text-lg mt-4 font-light">Fondasi etika kerja yang dianut oleh seluruh jajaran tim CV. Cakrawala Langit Semesta.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                {{-- Integrity --}}
                <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm text-center">
                    <div class="w-16 h-16 mx-auto bg-sky-50 text-sky-500 rounded-2xl flex items-center justify-center mb-6 font-bold shadow-inner text-xl">
                        I
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 mb-3">Integrity</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Kejujuran dan tanggung jawab penuh dalam memberikan kesesuaian spesifikasi produk bagi pelanggan.</p>
                </div>

                {{-- Quality --}}
                <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm text-center">
                    <div class="w-16 h-16 mx-auto bg-sky-50 text-sky-500 rounded-2xl flex items-center justify-center mb-6 font-bold shadow-inner text-xl">
                        Q
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 mb-3">Quality</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Mengutamakan kesempurnaan mutu barang dan jasa demi efisiensi operasional bisnis jangka panjang.</p>
                </div>

                {{-- Responsibility --}}
                <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm text-center">
                    <div class="w-16 h-16 mx-auto bg-sky-50 text-sky-500 rounded-2xl flex items-center justify-center mb-6 font-bold shadow-inner text-xl">
                        R
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 mb-3">Responsibility</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Komitmen dan kepedulian yang tinggi dalam merespon dan menyelesaikan setiap kebutuhan serta keluhan mitra.</p>
                </div>

                {{-- Synergy --}}
                <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm text-center">
                    <div class="w-16 h-16 mx-auto bg-sky-50 text-sky-500 rounded-2xl flex items-center justify-center mb-6 font-bold shadow-inner text-xl">
                        S
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 mb-3">Synergy</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Bekerja sama erat menyatukan visi dengan klien untuk mencapai pertumbuhan bersama yang berkelanjutan.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
