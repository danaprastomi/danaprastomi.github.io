@extends('layouts.app')

@section('title', 'Tentang Kami - ' . ($profile['name'] ?? 'CV. Cakrawala Langit Semesta'))

@section('content')
    {{-- ===== Sub Hero Banner ===== --}}
    <section class="relative pt-32 pb-20 bg-slate-900 overflow-hidden">
        {{-- Background glows --}}
        <div class="absolute top-0 right-0 w-96 h-96 rounded-full bg-sky-500/10 blur-[120px]"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 rounded-full bg-sky-500/10 blur-[120px]"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center text-white">
            <span class="inline-block px-4 py-1.5 bg-brand-gold/90 backdrop-blur-sm text-slate-900 font-bold text-xs uppercase tracking-widest rounded-full mb-4 shadow-lg border border-white/20">
                Profil Perusahaan
            </span>
            <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight mb-4">
                Tentang Kami
            </h1>
            <p class="max-w-2xl mx-auto text-slate-300 text-base sm:text-lg font-light leading-relaxed">
                Ketahui lebih mendalam tentang visi operasional, komitmen pelayanan, dan sejarah singkat CV. Cakrawala Langit Semesta.
            </p>
        </div>
    </section>

    {{-- ===== Profile Intro Section ===== --}}
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
                {{-- Left: Text --}}
                <div class="lg:col-span-7">
                    <span class="text-sky-500 font-bold text-sm uppercase tracking-wider block mb-3">Siapa Kami</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-800 leading-tight mb-6">
                        CV. Cakrawala Langit Semesta
                    </h2>
                    <div class="prose prose-slate max-w-none text-slate-600 text-base sm:text-lg leading-relaxed space-y-4">
                        <p>
                            {{ $profile['about'] ?? 'CV. Cakrawala Langit Semesta adalah sebuah perusahaan yang bergerak di bidang General Supplier, yang menyediakan berbagai jenis produk dan jasa untuk memenuhi kebutuhan customer.' }}
                        </p>
                        <p>
                            Didirikan dengan dedikasi tinggi, kami fokus melayani pengadaan perlengkapan kantor, kebutuhan mekanikal & elektrikal, perlengkapan safety (keselamatan kerja), bahan bangunan, furnitur, hingga jasa interior dan pengerjaan event (EO).
                        </p>
                        <p>
                            Kami percaya bahwa kunci kemitraan jangka panjang adalah kejujuran, integritas, kualitas barang yang unggul, dan kepatuhan waktu pengiriman. Sebagai General Supplier terpercaya, kami siap menjadi solusi satu atap (one-stop solution) untuk menunjang kemajuan bisnis dan operasional perusahaan Anda.
                        </p>
                    </div>

                    {{-- Stats Grid --}}
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 mt-12">
                        <div class="p-5 bg-slate-50 border border-slate-100 rounded-2xl text-center shadow-sm">
                            <span class="block text-3xl font-black text-sky-600 mb-1">2020</span>
                            <span class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Tahun Berdiri</span>
                        </div>
                        <div class="p-5 bg-slate-50 border border-slate-100 rounded-2xl text-center shadow-sm">
                            <span class="block text-3xl font-black text-brand-gold mb-1">100+</span>
                            <span class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Klien Aktif</span>
                        </div>
                        <div class="p-5 bg-slate-50 border border-slate-100 rounded-2xl text-center shadow-sm">
                            <span class="block text-3xl font-black text-sky-600 mb-1">1.5k+</span>
                            <span class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Produk Disuplai</span>
                        </div>
                        <div class="p-5 bg-slate-50 border border-slate-100 rounded-2xl text-center shadow-sm">
                            <span class="block text-3xl font-black text-brand-gold mb-1">100%</span>
                            <span class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Kepuasan Mitra</span>
                        </div>
                    </div>
                </div>

                {{-- Right: Graphic Image --}}
                <div class="lg:col-span-5 relative">
                    <div class="relative mx-auto max-w-md lg:max-w-none">
                        <div class="absolute inset-0 bg-gradient-to-tr from-sky-500 to-sky-300 rounded-3xl transform rotate-6 scale-95 shadow-xl"></div>
                        <div class="relative overflow-hidden rounded-3xl shadow-2xl border-4 border-white bg-slate-200">
                            <img src="{{ asset('images/company-profile-1.jpg') }}" alt="Tentang CLS" class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="absolute -bottom-6 -left-6 bg-slate-900 text-white p-5 rounded-2xl shadow-2xl border border-white/10 hidden sm:block">
                            <p class="text-xs text-sky-400 font-bold uppercase tracking-widest mb-1">Legalitas Lengkap</p>
                            <p class="text-sm font-light text-slate-300">Siap melayani Instansi Swasta & Pemerintah</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== Core Values Section ===== --}}
    <section class="py-24 bg-slate-50 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 dots-pattern -mr-20 -mt-20"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-sky-500 font-bold text-sm uppercase tracking-wider block mb-3">Keunggulan</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-800 mb-5 section-underline">Mengapa Memilih Kami?</h2>
                <p class="text-slate-500 text-base sm:text-lg mt-4 font-light">Kami mengutamakan aspek-aspek utama berikut demi kenyamanan dan kepercayaan kemitraan Anda.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                {{-- Fast Service --}}
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                    <span class="flex items-center justify-center w-14 h-14 rounded-xl bg-sky-50 text-sky-500 mb-6 font-bold shadow-inner">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </span>
                    <h3 class="text-lg font-bold text-slate-800 mb-3">Pelayanan Cepat</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Respon cepat dalam melayani pertanyaan, permintaan penawaran harga (inquiry), hingga pengiriman produk tepat waktu.</p>
                </div>

                {{-- Best Price --}}
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                    <span class="flex items-center justify-center w-14 h-14 rounded-xl bg-sky-50 text-sky-500 mb-6 font-bold shadow-inner">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </span>
                    <h3 class="text-lg font-bold text-slate-800 mb-3">Harga Kompetitif</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Menawarkan struktur penawaran harga terbaik yang fleksibel dan terjangkau tanpa mengorbankan kualitas produk.</p>
                </div>

                {{-- Guarantee --}}
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                    <span class="flex items-center justify-center w-14 h-14 rounded-xl bg-sky-50 text-sky-500 mb-6 font-bold shadow-inner">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </span>
                    <h3 class="text-lg font-bold text-slate-800 mb-3">Kualitas Terjamin</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Hanya mensuplai produk dengan spesifikasi orisinil dan bersertifikasi untuk memastikan ketahanan & keamanan pakai.</p>
                </div>

                {{-- One Stop Shop --}}
                <div class="p-8 bg-white rounded-2xl border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                    <span class="flex items-center justify-center w-14 h-14 rounded-xl bg-sky-50 text-sky-500 mb-6 font-bold shadow-inner">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zm0 8a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1v-2zm0 8a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1v-2z"/></svg>
                    </span>
                    <h3 class="text-lg font-bold text-slate-800 mb-3">One Stop Solution</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Kategori suplai yang lengkap mencakup segala aspek operasional, meminimalisir repotnya bekerja dengan banyak vendor.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== Call to Action Section ===== --}}
    <section class="py-20 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h2 class="text-3xl sm:text-4xl font-extrabold mb-6">
                Ingin Menjalin Kemitraan dengan Kami?
            </h2>
            <p class="max-w-2xl mx-auto text-slate-300 text-base sm:text-lg mb-10 leading-relaxed font-light">
                Hubungi tim pemasaran kami hari ini untuk berdiskusi mengenai kebutuhan suplai rutin perkantoran, proyek konstruksi, atau jasa penunjang lainnya.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('produk') }}" class="px-8 py-3.5 bg-gradient-to-r from-sky-500 to-sky-600 hover:from-sky-400 hover:to-sky-500 text-white font-bold rounded-lg shadow-lg hover:scale-105 transition-all duration-300">
                    Lihat Katalog Produk
                </a>
                <a href="{{ route('kontak') }}" class="px-8 py-3.5 bg-white/10 backdrop-blur-md hover:bg-white/20 text-white border border-white/30 font-bold rounded-lg hover:scale-105 transition-all duration-300">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>
@endsection
