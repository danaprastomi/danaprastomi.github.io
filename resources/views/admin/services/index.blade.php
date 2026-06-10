@extends('layouts.admin')

@section('title', 'Produk & Jasa')
@section('subtitle', 'Daftar produk barang supplier dan jasa yang dikelola')

@section('content')
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        {{-- Header Actions --}}
        <div class="p-6 border-b border-slate-200/80 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h3 class="font-bold text-slate-800 text-lg">Kelola Katalog Produk</h3>
            <a href="{{ route('admin.services.create') }}" class="px-5 py-2.5 bg-sky-50 hover:bg-sky-500 text-sky-500 hover:text-white font-bold text-xs rounded-lg inline-flex items-center gap-2 border border-sky-200 hover:border-sky-500 shadow-sm hover:shadow-sky-500/10 hover:scale-102 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span>Tambah Produk</span>
            </a>
        </div>

        {{-- Table Container --}}
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-slate-400 font-bold text-xs uppercase border-b border-slate-200/80">
                        <th class="py-4 px-6 w-16">No</th>
                        <th class="py-4 px-6 w-24">Image</th>
                        <th class="py-4 px-6">Nama Produk</th>
                        <th class="py-4 px-6 w-48">Kategori</th>
                        <th class="py-4 px-6 w-24 text-center">Urutan</th>
                        <th class="py-4 px-6 w-28 text-center">Status</th>
                        <th class="py-4 px-6 w-40 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($services as $index => $service)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="py-4 px-6 text-sm text-slate-500 font-medium">{{ $index + 1 }}</td>
                            <td class="py-4 px-6">
                                <div class="w-12 h-12 rounded-lg overflow-hidden bg-slate-100 border border-slate-200 shadow-sm flex items-center justify-center">
                                    @if($service->image)
                                        <img src="{{ Storage::url($service->image) }}" alt="{{ $service->name }}" class="w-full h-full object-cover">
                                    @else
                                        <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                    @endif
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="max-w-md">
                                    <h4 class="font-bold text-slate-800 text-sm mb-1">{{ $service->name }}</h4>
                                    <p class="text-xs text-slate-400 line-clamp-1 leading-relaxed">{{ $service->description ?? '-' }}</p>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="inline-block px-3 py-1 bg-slate-100 text-slate-700 font-semibold text-xs rounded-full border border-slate-200">
                                    {{ $service->category }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-center text-sm font-semibold text-slate-600">{{ $service->order }}</td>
                            <td class="py-4 px-6 text-center">
                                @if($service->is_active)
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        <span>Aktif</span>
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-500 border border-slate-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                        <span>Nonaktif</span>
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.services.edit', $service->id) }}" class="p-2 hover:bg-sky-50 text-sky-500 hover:text-sky-600 rounded-lg transition-colors" title="Edit Produk">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.services.destroy', $service->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 hover:bg-red-50 text-red-400 hover:text-red-500 rounded-lg transition-colors cursor-pointer" title="Hapus Produk">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 px-6 text-center text-slate-400">
                                <svg class="w-12 h-12 mx-auto mb-3 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                <p class="text-sm font-medium">Belum ada data katalog produk.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
