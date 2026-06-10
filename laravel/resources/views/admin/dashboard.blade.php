@extends('layouts.admin')

@section('title', 'Dashboard')
@section('subtitle', 'Ikhtisar data website CV. Cakrawala Langit Semesta')

@section('content')
    {{-- ===== Stats Grid ===== --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        {{-- Slider Card --}}
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm flex items-center gap-5 card-hover">
            <div class="w-14 h-14 rounded-xl stat-gradient-blue text-white flex items-center justify-center shadow-lg shadow-sky-500/20 shrink-0">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Slider Banner</p>
                <h3 class="text-3xl font-bold text-slate-800 mt-1">{{ $stats['sliders'] }}</h3>
                <a href="{{ route('admin.sliders.index') }}" class="text-xs text-sky-500 hover:text-sky-600 font-semibold inline-flex items-center gap-1 mt-1.5">
                    <span>Kelola Slider</span>
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>

        {{-- Services Card --}}
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm flex items-center gap-5 card-hover">
            <div class="w-14 h-14 rounded-xl stat-gradient-gold text-white flex items-center justify-center shadow-lg shadow-yellow-500/20 shrink-0">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Produk & Jasa</p>
                <h3 class="text-3xl font-bold text-slate-800 mt-1">{{ $stats['services'] }}</h3>
                <a href="{{ route('admin.services.index') }}" class="text-xs text-brand-gold hover:text-yellow-600 font-semibold inline-flex items-center gap-1 mt-1.5">
                    <span>Kelola Produk</span>
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>

        {{-- Inbox Card --}}
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm flex items-center gap-5 card-hover">
            <div class="w-14 h-14 rounded-xl {{ $stats['unread_contacts'] > 0 ? 'stat-gradient-red' : 'stat-gradient-green' }} text-white flex items-center justify-center shadow-lg shrink-0">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Pesan Baru</p>
                <h3 class="text-3xl font-bold text-slate-800 mt-1">{{ $stats['unread_contacts'] }}</h3>
                <a href="{{ route('admin.contacts.index') }}" class="text-xs text-slate-500 hover:text-slate-600 font-semibold inline-flex items-center gap-1 mt-1.5">
                    <span>Lihat Inbox (Total: {{ $stats['total_contacts'] }})</span>
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>

        {{-- Users Card --}}
        <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm flex items-center gap-5 card-hover">
            <div class="w-14 h-14 rounded-xl stat-gradient-blue text-white flex items-center justify-center shadow-lg shadow-sky-500/20 shrink-0">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            </div>
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Kelola User</p>
                <h3 class="text-3xl font-bold text-slate-800 mt-1">{{ $stats['users'] }}</h3>
                @if(auth()->user()->isSuperAdmin())
                    <a href="{{ route('admin.users.index') }}" class="text-xs text-sky-500 hover:text-sky-600 font-semibold inline-flex items-center gap-1 mt-1.5">
                        <span>Kelola Pengguna</span>
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                @else
                    <span class="text-xs text-slate-400 mt-1.5 block">Hanya untuk Superadmin</span>
                @endif
            </div>
        </div>
    </div>

    {{-- ===== Welcome Banner ===== --}}
    <div class="bg-slate-900 rounded-3xl p-8 sm:p-10 relative overflow-hidden shadow-xl mb-8 border border-white/5">
        <div class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-sky-500/20 blur-[80px]"></div>
        <div class="absolute -bottom-24 -left-24 w-72 h-72 rounded-full bg-yellow-500/10 blur-[80px]"></div>
        
        <div class="relative z-10 max-w-2xl">
            <h2 class="text-2xl sm:text-3xl font-bold text-white mb-3">Selamat Datang, {{ auth()->user()->name }}!</h2>
            <p class="text-slate-300 text-sm sm:text-base leading-relaxed font-light mb-6">
                Ini adalah halaman kontrol utama admin panel CV. Cakrawala Langit Semesta. Di sini Anda bisa mengedit profil perusahaan, menambahkan produk baru, mengunggah banner promosi carousel, dan membaca pesan pelanggan secara real-time.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('admin.company-profile.index') }}" class="px-5 py-2.5 bg-brand-gold hover:bg-yellow-600 text-slate-900 text-xs font-bold rounded-lg transition-colors">
                    Edit Company Profile
                </a>
                <a href="{{ route('home') }}" target="_blank" class="px-5 py-2.5 bg-white/10 hover:bg-white/20 text-white border border-white/20 text-xs font-bold rounded-lg transition-colors">
                    Lihat Website Utama
                </a>
            </div>
        </div>
    </div>
@endsection
