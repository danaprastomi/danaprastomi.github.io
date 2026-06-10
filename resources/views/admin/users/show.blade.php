@extends('layouts.admin')

@section('title', 'Detail User')
@section('subtitle', 'Informasi akun pengelola sistem')

@section('content')
    <div class="max-w-3xl bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        {{-- Header Actions --}}
        <div class="p-6 border-b border-slate-200/80 flex items-center justify-between">
            <h3 class="font-bold text-slate-800 text-lg">Profil Pengguna</h3>
            <a href="{{ route('admin.users.index') }}" class="text-xs text-slate-500 hover:text-slate-600 font-semibold inline-flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <span>Kembali</span>
            </a>
        </div>

        {{-- Detail Area --}}
        <div class="p-6 sm:p-8 space-y-6">
            <div class="flex items-center gap-5">
                <div class="w-20 h-20 rounded-full bg-sky-50 text-sky-500 flex items-center justify-center font-black text-3xl shadow-inner border-2 border-sky-100">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <div>
                    <h4 class="text-xl font-bold text-slate-800 leading-tight">{{ $user->name }}</h4>
                    <p class="text-sm text-slate-400 mt-1 capitalize">{{ $user->role }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-4 border-t border-slate-100">
                <div>
                    <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Alamat Email</span>
                    <span class="text-sm font-semibold text-slate-700">{{ $user->email }}</span>
                </div>
                <div>
                    <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Status Keaktifan</span>
                    @if($user->is_active)
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100 mt-0.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            <span>Aktif</span>
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-red-50 text-red-700 border border-red-100 mt-0.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>
                            <span>Menunggu Aktivasi</span>
                        </span>
                    @endif
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-4">
                <div>
                    <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Tanggal Terdaftar</span>
                    <span class="text-sm font-semibold text-slate-700">{{ $user->created_at->timezone('Asia/Jakarta')->format('d F Y, H:i') }}</span>
                </div>
                <div>
                    <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Update Terakhir</span>
                    <span class="text-sm font-semibold text-slate-700">{{ $user->updated_at->timezone('Asia/Jakarta')->format('d F Y, H:i') }}</span>
                </div>
            </div>

            {{-- Footer Controls --}}
            <div class="pt-6 border-t border-slate-200/80 flex justify-end gap-3">
                <a href="{{ route('admin.users.edit', $user->id) }}" class="px-5 py-2.5 bg-sky-500 hover:bg-sky-600 text-white font-bold text-sm rounded-lg shadow-md hover:shadow-sky-500/20 transition-all">
                    Edit Akun
                </a>
            </div>
        </div>
    </div>
@endsection
