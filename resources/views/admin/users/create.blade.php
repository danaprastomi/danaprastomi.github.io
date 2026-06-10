@extends('layouts.admin')

@section('title', 'Tambah User')
@section('subtitle', 'Daftarkan administrator baru untuk panel kontrol')

@section('content')
    <div class="max-w-4xl bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-slate-200/80 flex items-center justify-between">
            <h3 class="font-bold text-slate-800 text-lg">Form Tambah Pengguna</h3>
            <a href="{{ route('admin.users.index') }}" class="text-xs text-slate-500 hover:text-slate-600 font-semibold inline-flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <span>Kembali</span>
            </a>
        </div>

        <form method="POST" action="{{ route('admin.users.store') }}" class="p-6 sm:p-8 space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                {{-- Name --}}
                <div>
                    <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap *</label>
                    <input type="text" id="name" name="name" required value="{{ old('name') }}" placeholder="Contoh: Danar Prasetyo"
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all">
                    @error('name') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>
                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Alamat Email *</label>
                    <input type="email" id="email" name="email" required value="{{ old('email') }}" placeholder="Contoh: danar@cls.co.id"
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all">
                    @error('email') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                {{-- Password --}}
                <div>
                    <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">Kata Sandi (Password) *</label>
                    <input type="password" id="password" name="password" required placeholder="Minimal 8 karakter"
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all">
                    @error('password') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>
                {{-- Password Confirmation --}}
                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold text-slate-700 mb-2">Konfirmasi Kata Sandi *</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Ulangi kata sandi"
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 items-center">
                {{-- Role --}}
                <div>
                    <label for="role" class="block text-sm font-semibold text-slate-700 mb-2">Peran (Role) *</label>
                    <select id="role" name="role" required
                        class="w-full px-4 py-2.5 border border-slate-200 bg-white rounded-lg text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all">
                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin (Pengelola Konten)</option>
                        <option value="superadmin" {{ old('role') === 'superadmin' ? 'selected' : '' }}>Superadmin (Akses Penuh)</option>
                    </select>
                    @error('role') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>
                {{-- Is Active Switch --}}
                <div class="sm:pt-6">
                    <label class="inline-flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-slate-200 rounded-full peer peer-focus:ring-2 peer-focus:ring-sky-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-sky-500 relative"></div>
                        <span class="text-sm font-semibold text-slate-600 peer-checked:text-sky-600 select-none">Aktifkan Akun (Bisa langsung login)</span>
                    </label>
                    @error('is_active') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- Submit buttons --}}
            <div class="pt-6 border-t border-slate-200/80 flex justify-end gap-3">
                <a href="{{ route('admin.users.index') }}" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-sm rounded-lg transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 bg-sky-500 hover:bg-sky-600 text-white font-bold text-sm rounded-lg shadow-md hover:shadow-sky-500/20 transition-all cursor-pointer">
                    Simpan User
                </button>
            </div>
        </form>
    </div>
@endsection
