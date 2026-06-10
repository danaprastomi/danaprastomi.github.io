@extends('layouts.admin')

@section('title', 'Edit Variabel Profil')
@section('subtitle', 'Ubah nilai dari informasi profil perusahaan')

@section('content')
    <div class="max-w-4xl bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-slate-200/80 flex items-center justify-between">
            <h3 class="font-bold text-slate-800 text-lg">Form Edit Variabel</h3>
            <a href="{{ route('admin.company-profile.index') }}" class="text-xs text-slate-500 hover:text-slate-600 font-semibold inline-flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <span>Kembali</span>
            </a>
        </div>

        <form method="POST" action="{{ route('admin.company-profile.update', $companyProfile->id) }}" class="p-6 sm:p-8 space-y-6">
            @csrf
            @method('PUT')
            
            {{-- Key --}}
            <div>
                <label for="key" class="block text-sm font-semibold text-slate-700 mb-2">Kunci Variabel (Key) *</label>
                <input type="text" id="key" name="key" required value="{{ old('key', $companyProfile->key) }}" placeholder="Contoh: alamat, email, visi, whatsapp"
                    class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm bg-slate-50 text-slate-500 cursor-not-allowed focus:outline-none" readonly>
                <p class="text-slate-400 text-xs mt-1.5 leading-normal">Kunci variabel tidak dapat diubah setelah dibuat untuk menjaga integritas sistem.</p>
                @error('key') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            {{-- Value --}}
            <div>
                <label for="value" class="block text-sm font-semibold text-slate-700 mb-2">Isi Konten (Value) *</label>
                <textarea id="value" name="value" rows="6" required placeholder="Tulis isi informasi atau nilai dari variabel ini..."
                    class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all resize-y">{{ old('value', $companyProfile->value) }}</textarea>
                @error('value') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            {{-- Submit buttons --}}
            <div class="pt-6 border-t border-slate-200/80 flex justify-end gap-3">
                <a href="{{ route('admin.company-profile.index') }}" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-sm rounded-lg transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 bg-sky-500 hover:bg-sky-600 text-white font-bold text-sm rounded-lg shadow-md hover:shadow-sky-500/20 transition-all cursor-pointer">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
