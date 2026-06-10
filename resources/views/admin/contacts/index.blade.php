@extends('layouts.admin')

@section('title', 'Pesan Kontak')
@section('subtitle', 'Daftar pesan masuk dari form hubungi kami di website')

@section('content')
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-slate-200/80">
            <h3 class="font-bold text-slate-800 text-lg">Kotak Masuk Pesan</h3>
        </div>

        {{-- Table Container --}}
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-slate-400 font-bold text-xs uppercase border-b border-slate-200/80">
                        <th class="py-4 px-6 w-16">No</th>
                        <th class="py-4 px-6 w-48">Pengirim</th>
                        <th class="py-4 px-6">Subjek & Cuplikan Pesan</th>
                        <th class="py-4 px-6 w-40">Tanggal Masuk</th>
                        <th class="py-4 px-6 w-28 text-center">Status</th>
                        <th class="py-4 px-6 w-36 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($contacts as $index => $contact)
                        <tr class="hover:bg-slate-50/50 transition-colors {{ !$contact->is_read ? 'bg-sky-50/20 font-medium' : '' }}">
                            <td class="py-4 px-6 text-sm text-slate-500">{{ $contacts->firstItem() + $index }}</td>
                            <td class="py-4 px-6">
                                <div class="text-sm">
                                    <h4 class="font-bold text-slate-800">{{ $contact->name }}</h4>
                                    <p class="text-xs text-slate-400 mt-0.5">{{ $contact->email }}</p>
                                    @if($contact->phone)
                                        <p class="text-xs text-slate-400 font-mono mt-0.5">{{ $contact->phone }}</p>
                                    @endif
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="max-w-md">
                                    <h5 class="text-sm text-slate-800 {{ !$contact->is_read ? 'font-bold text-sky-950' : '' }}">{{ $contact->subject }}</h5>
                                    <p class="text-xs text-slate-400 line-clamp-1 mt-1 leading-relaxed">{{ $contact->message }}</p>
                                    @if($contact->attachment)
                                        <div class="flex items-center gap-1.5 mt-2 text-xs text-sky-600 font-medium">
                                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/><path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"/></svg>
                                            <a href="{{ route('admin.contacts.download-attachment', $contact->id) }}" title="Download: {{ basename($contact->attachment) }}" class="hover:underline hover:text-sky-700">
                                                {{ basename($contact->attachment) }}
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="py-4 px-6 text-sm text-slate-500 font-medium">
                                {{ $contact->created_at->timezone('Asia/Jakarta')->format('d M Y, H:i') }}
                            </td>
                            <td class="py-4 px-6 text-center">
                                @if(!$contact->is_read)
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-sky-50 text-sky-700 border border-sky-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-sky-500 animate-pulse"></span>
                                        <span>Baru</span>
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-500 border border-slate-200">
                                        <span>Dibaca</span>
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.contacts.show', $contact->id) }}" class="p-2 hover:bg-sky-50 text-sky-500 hover:text-sky-600 rounded-lg transition-colors" title="Buka Pesan">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.contacts.destroy', $contact->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 hover:bg-red-50 text-red-400 hover:text-red-500 rounded-lg transition-colors cursor-pointer" title="Hapus Pesan">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 px-6 text-center text-slate-400">
                                <svg class="w-12 h-12 mx-auto mb-3 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2a2 2 0 012-2m16 0h-2M4 13H6m10 4h.01M2 20h20"/></svg>
                                <p class="text-sm font-medium">Kotak masuk pesan kosong.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($contacts->hasPages())
            <div class="px-6 py-4 border-t border-slate-100 bg-slate-50/50">
                {{ $contacts->links() }}
            </div>
        @endif
    </div>
@endsection
