@extends('layouts.admin')

@section('title', 'Detail Pesan')
@section('subtitle', 'Detail pesan masuk dari pengirim kontak website')

@section('content')
    <div class="max-w-4xl bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        {{-- Header Actions --}}
        <div class="p-6 border-b border-slate-200/80 flex items-center justify-between">
            <h3 class="font-bold text-slate-800 text-lg">Pesan Masuk</h3>
            <a href="{{ route('admin.contacts.index') }}" class="text-xs text-slate-500 hover:text-slate-600 font-semibold inline-flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <span>Kembali ke Inbox</span>
            </a>
        </div>

        {{-- Details Area --}}
        <div class="p-6 sm:p-8 space-y-8">
            {{-- Sender Info --}}
            <div class="bg-slate-50 p-6 rounded-xl border border-slate-150 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full gradient-brand-reverse flex items-center justify-center text-white font-extrabold shadow-md">
                        {{ strtoupper(substr($contact->name, 0, 1)) }}
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-base leading-tight">{{ $contact->name }}</h4>
                        <p class="text-xs text-slate-400 mt-1">Pengirim Pesan</p>
                    </div>
                </div>

                {{-- Contact Details Meta --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-2.5 text-xs text-slate-600 font-medium">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <a href="mailto:{{ $contact->email }}" class="hover:underline hover:text-sky-500">{{ $contact->email }}</a>
                    </div>
                    @if($contact->phone)
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span class="font-mono">{{ $contact->phone }}</span>
                        </div>
                    @endif
                    <div class="flex items-center gap-2 text-slate-400">
                        <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>Diterima pada: {{ $contact->created_at->timezone('Asia/Jakarta')->format('d M Y, H:i') }}</span>
                    </div>
                </div>
            </div>

            {{-- Subject --}}
            <div>
                <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Perihal (Subject)</span>
                <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-3">{{ $contact->subject }}</h3>
            </div>

            {{-- Message Body --}}
            <div>
                <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-3">Isi Pesan (Message)</span>
                <div class="bg-slate-50/50 p-6 rounded-2xl border border-slate-200/60 text-slate-700 text-sm leading-relaxed whitespace-pre-wrap min-h-[150px]">
                    {{ $contact->message }}
                </div>
            </div>

            {{-- Attachment Section --}}
            @if($contact->attachment)
                <div>
                    <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-3">Lampiran (Attachment)</span>
                    <div class="bg-slate-50/50 p-6 rounded-2xl border border-slate-200/60">
                        <div class="flex items-center gap-3">
                            <svg class="w-6 h-6 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-slate-700">{{ basename($contact->attachment) }}</p>
                                <p class="text-xs text-slate-500 mt-1">File lampiran dari pesan</p>
                            </div>
                            <a href="{{ route('admin.contacts.download-attachment', $contact->id) }}" class="px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white font-semibold text-sm rounded-lg transition-colors inline-flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                <span>Unduh</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Quick Actions --}}
            <div class="pt-6 border-t border-slate-200/80 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <form method="POST" action="{{ route('admin.contacts.destroy', $contact->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-5 py-2.5 bg-red-50 hover:bg-red-100 text-red-600 font-semibold text-sm rounded-lg border border-red-200 transition-colors cursor-pointer">
                        Hapus Pesan
                    </button>
                </form>

                <div class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
                    @if($contact->phone)
                        <form method="POST" action="{{ route('admin.contacts.send-whatsapp', $contact->id) }}" class="flex-1 sm:flex-none">
                            @csrf
                            <button type="submit" class="w-full px-5 py-2.5 bg-green-500 hover:bg-green-600 text-white font-bold text-sm rounded-lg shadow-md hover:shadow-green-500/10 transition-all inline-flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-5.031 1.378c-1.602.92-2.846 2.471-3.297 4.33-.45 1.859-.163 3.855 1.015 5.495.596.843 1.38 1.531 2.306 1.986.923.454 1.962.68 3.01.662 1.048-.018 2.068-.268 2.978-.797.91-.527 1.618-1.326 1.993-2.322.375-.996.408-2.089.093-3.111-.315-1.022-.889-1.878-1.659-2.433-.77-.555-1.751-.832-2.805-.817zm0-1.386c1.322 0 2.627.36 3.766 1.04 1.139.68 2.05 1.65 2.575 2.83.525 1.18.588 2.515.182 3.752-.405 1.237-1.208 2.286-2.27 3.001-1.06.714-2.35 1.057-3.644 1.03-1.295-.027-2.558-.406-3.59-1.088-1.03-.682-1.833-1.66-2.251-2.826-.419-1.165-.362-2.47.158-3.623.52-1.154 1.344-2.107 2.414-2.73 1.07-.623 2.37-.96 3.66-.96z"/></svg>
                                <span>Kirim WhatsApp</span>
                            </button>
                        </form>
                    @endif
                    <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" class="flex-1 sm:flex-none px-5 py-2.5 bg-sky-500 hover:bg-sky-600 text-white font-bold text-sm rounded-lg shadow-md hover:shadow-sky-500/10 transition-all inline-flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/></svg>
                        <span>Balas Email</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
