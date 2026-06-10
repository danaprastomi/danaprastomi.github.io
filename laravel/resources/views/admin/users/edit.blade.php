@extends('layouts.admin')

@section('title', 'Edit User')
@section('subtitle', 'Ubah data dan pengaturan administrator')

@section('content')
    <div class="max-w-4xl bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-slate-200/80 flex items-center justify-between">
            <h3 class="font-bold text-slate-800 text-lg">Form Edit Pengguna</h3>
            <a href="{{ route('admin.users.index') }}" class="text-xs text-slate-500 hover:text-slate-600 font-semibold inline-flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <span>Kembali</span>
            </a>
        </div>

        <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="p-6 sm:p-8 space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                {{-- Name --}}
                <div>
                    <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap *</label>
                    <input type="text" id="name" name="name" required value="{{ old('name', $user->name) }}" placeholder="Contoh: Danar Prasetyo"
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all">
                    @error('name') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>
                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Alamat Email *</label>
                    <input type="email" id="email" name="email" required value="{{ old('email', $user->email) }}" placeholder="Contoh: danar@cls.co.id"
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all">
                    @error('email') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="p-4 bg-slate-50 rounded-xl border border-slate-150">
                <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Ubah Kata Sandi (Kosongkan jika tidak diubah)</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    {{-- Password --}}
                    <div>
                        <label for="password" class="block text-xs font-semibold text-slate-700 mb-1.5">Kata Sandi Baru</label>
                        <input type="password" id="password" name="password" placeholder="Minimal 8 karakter"
                            class="w-full px-4 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all">
                        @error('password') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    {{-- Password Confirmation --}}
                    <div>
                        <label for="password_confirmation" class="block text-xs font-semibold text-slate-700 mb-1.5">Konfirmasi Kata Sandi Baru</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi kata sandi baru"
                            class="w-full px-4 py-2 border border-slate-200 rounded-lg text-sm bg-white focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all">
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 items-center">
                {{-- Role --}}
                <div>
                    <label for="role" class="block text-sm font-semibold text-slate-700 mb-2">Peran (Role) *</label>
                    <select id="role" name="role" required {{ $user->id === auth()->id() ? 'disabled' : '' }}
                        class="w-full px-4 py-2.5 border border-slate-200 bg-white rounded-lg text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all disabled:bg-slate-50 disabled:text-slate-500 disabled:cursor-not-allowed">
                        <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin (Pengelola Konten)</option>
                        <option value="superadmin" {{ old('role', $user->role) === 'superadmin' ? 'selected' : '' }}>Superadmin (Akses Penuh)</option>
                    </select>
                    @if($user->id === auth()->id())
                        <input type="hidden" name="role" value="{{ $user->role }}">
                        <p class="text-slate-400 text-xs mt-1">Anda tidak dapat mengubah peran Anda sendiri.</p>
                    @endif
                    @error('role') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>
                {{-- Is Active Switch --}}
                <div class="sm:pt-6">
                    <label class="inline-flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" class="sr-only peer" {{ $user->is_active ? 'checked' : '' }} {{ $user->id === auth()->id() ? 'disabled' : '' }}>
                        <div class="w-11 h-6 bg-slate-200 rounded-full peer peer-focus:ring-2 peer-focus:ring-sky-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-sky-500 relative"></div>
                        <span class="text-sm font-semibold text-slate-600 peer-checked:text-sky-600 select-none">Akun Aktif</span>
                    </label>
                    @if($user->id === auth()->id())
                        <p class="text-slate-400 text-xs mt-1">Anda tidak dapat menonaktifkan akun Anda sendiri.</p>
                    @endif
                    @error('is_active') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- Submit buttons --}}
            <div class="pt-6 border-t border-slate-200/80 flex justify-end gap-3">
                <a href="{{ route('admin.users.index') }}" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-sm rounded-lg transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 bg-sky-500 hover:bg-sky-600 text-white font-bold text-sm rounded-lg shadow-md hover:shadow-sky-500/20 transition-all cursor-pointer">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
