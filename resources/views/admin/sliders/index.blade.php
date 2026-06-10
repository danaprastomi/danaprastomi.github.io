@extends('layouts.admin')

@section('title', 'Slider Banner')
@section('subtitle', 'Daftar gambar carousel banner yang ditampilkan di halaman beranda')

@section('content')
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        {{-- Header Actions --}}
        <div class="p-6 border-b border-slate-200/80 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h3 class="font-bold text-slate-800 text-lg">Kelola Carousel Banner</h3>
            <a href="{{ route('admin.sliders.create') }}" class="px-5 py-2.5 bg-sky-500 hover:bg-sky-600 text-white font-bold text-xs rounded-lg inline-flex items-center gap-2 shadow-md hover:shadow-sky-500/20 hover:scale-102 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                <span>Tambah Banner</span>
            </a>
        </div>

        {{-- Table Container --}}
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-slate-400 font-bold text-xs uppercase border-b border-slate-200/80">
                        <th class="py-4 px-6 w-16">No</th>
                        <th class="py-4 px-6 w-32">Image</th>
                        <th class="py-4 px-6">Informasi Banner</th>
                        <th class="py-4 px-6 w-24 text-center">Urutan</th>
                        <th class="py-4 px-6 w-28 text-center">Status</th>
                        <th class="py-4 px-6 w-40 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($sliders as $index => $slider)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="py-4 px-6 text-sm text-slate-500 font-medium">{{ $index + 1 }}</td>
                            <td class="py-4 px-6">
                                <div class="w-24 aspect-video rounded-lg overflow-hidden bg-slate-100 border border-slate-200 shadow-sm">
                                    <img src="{{ Storage::url($slider->image) }}" alt="Slider Image" class="w-full h-full object-cover">
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="max-w-md">
                                    <span class="inline-block px-2.5 py-0.5 bg-sky-50 text-sky-600 font-bold text-[10px] uppercase tracking-wide rounded mb-1 border border-sky-100">
                                        {{ $slider->subtitle }}
                                    </span>
                                    <h4 class="font-bold text-slate-800 text-sm mb-1">{{ $slider->title }}</h4>
                                    <p class="text-xs text-slate-400 line-clamp-2 leading-relaxed">{{ $slider->description ?? '-' }}</p>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-center text-sm font-semibold text-slate-600">{{ $slider->order }}</td>
                            <td class="py-4 px-6 text-center">
                                @if($slider->is_active)
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
                                    <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="p-2 hover:bg-sky-50 text-sky-500 hover:text-sky-600 rounded-lg transition-colors" title="Edit Banner">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.sliders.destroy', $slider->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus banner ini?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 hover:bg-red-50 text-red-400 hover:text-red-500 rounded-lg transition-colors cursor-pointer" title="Hapus Banner">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 px-6 text-center text-slate-400">
                                <svg class="w-12 h-12 mx-auto mb-3 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <p class="text-sm font-medium">Belum ada data carousel banner.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
