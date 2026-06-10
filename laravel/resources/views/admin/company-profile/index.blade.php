@extends('layouts.admin')

@section('title', 'Company Profile Settings')
@section('subtitle', 'Kelola informasi publik perusahaan CV. Cakrawala Langit Semesta')

@section('content')
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        {{-- Header Actions --}}
        <div class="p-6 border-b border-slate-200/80 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h3 class="font-bold text-slate-800 text-lg">Informasi Profil Perusahaan</h3>
            <a href="{{ route('admin.company-profile.create') }}" class="px-5 py-2.5 bg-sky-500 hover:bg-sky-600 text-white font-bold text-xs rounded-lg inline-flex items-center gap-2 shadow-md hover:shadow-sky-500/20 hover:scale-102 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span>Tambah Variabel</span>
            </a>
        </div>

        {{-- Table Container --}}
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-slate-400 font-bold text-xs uppercase border-b border-slate-200/80">
                        <th class="py-4 px-6 w-16">No</th>
                        <th class="py-4 px-6 w-48">Key (Kunci Variabel)</th>
                        <th class="py-4 px-6">Value (Isi / Konten)</th>
                        <th class="py-4 px-6 w-40 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($profiles as $index => $profile)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="py-4 px-6 text-sm text-slate-500 font-medium">{{ $index + 1 }}</td>
                            <td class="py-4 px-6">
                                <span class="inline-block px-2.5 py-1 bg-slate-100 text-slate-700 font-mono font-semibold text-xs rounded border border-slate-200 uppercase">
                                    {{ $profile->key }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-sm text-slate-600">
                                <div class="max-w-2xl line-clamp-3 leading-relaxed">
                                    {{ $profile->value }}
                                </div>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.company-profile.edit', $profile->id) }}" class="p-2 hover:bg-sky-50 text-sky-500 hover:text-sky-600 rounded-lg transition-colors" title="Edit Nilai">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.company-profile.destroy', $profile->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus variabel profil ini?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 hover:bg-red-50 text-red-400 hover:text-red-500 rounded-lg transition-colors cursor-pointer" title="Hapus Variabel">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-12 px-6 text-center text-slate-400">
                                <svg class="w-12 h-12 mx-auto mb-3 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                <p class="text-sm font-medium">Belum ada variabel profil perusahaan.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
