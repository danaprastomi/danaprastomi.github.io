@extends('layouts.app')

@section('title', 'Hubungi Kami - ' . ($profile['name'] ?? 'CV. Cakrawala Langit Semesta'))

@section('content')
    {{-- ===== Sub Hero Banner ===== --}}
    <section class="relative pt-32 pb-20 bg-slate-900 overflow-hidden">
        {{-- Ambient glows --}}
        <div class="absolute top-0 right-0 w-96 h-96 rounded-full bg-sky-500/10 blur-[120px]"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center text-white">
            <span class="inline-block px-4 py-1.5 bg-brand-gold/90 backdrop-blur-sm text-slate-900 font-bold text-xs uppercase tracking-widest rounded-full mb-4 shadow-lg border border-white/20">
                Hubungan Pelanggan
            </span>
            <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight mb-4">
                Kontak Kami
            </h1>
            <p class="max-w-2xl mx-auto text-slate-300 text-base sm:text-lg font-light leading-relaxed">
                Ada pertanyaan atau ingin meminta penawaran harga? Tim kami siap memberikan respon cepat dan profesional untuk bisnis Anda.
            </p>
        </div>
    </section>

    {{-- ===== Contact Content Section ===== --}}
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
                
                {{-- Left Column: Contact Details & Map --}}
                <div class="lg:col-span-5 space-y-8">
                    <div>
                        <span class="text-sky-500 font-bold text-sm uppercase tracking-wider block mb-3">Informasi Kontak</span>
                        <h2 class="text-3xl font-extrabold text-slate-800 leading-tight mb-4">
                            Hubungi Kantor Kami
                        </h2>
                        <p class="text-slate-600 text-sm sm:text-base font-light leading-relaxed">
                            Kami menyambut baik kunjungan maupun inquiries dari calon mitra bisnis. Berikut saluran komunikasi resmi kami.
                        </p>
                    </div>

                    {{-- Contact items --}}
                    <div class="space-y-5">
                        {{-- Address --}}
                        <div class="flex items-start gap-4 p-5 bg-slate-50 border border-slate-100 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                            <span class="flex items-center justify-center w-12 h-12 rounded-xl bg-white text-sky-500 shrink-0 shadow border border-slate-100 font-bold">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </span>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">Alamat Kantor</h4>
                                <p class="text-slate-500 text-sm mt-1 leading-relaxed">{{ $profile['alamat'] ?? 'Jakarta, Indonesia' }}</p>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="flex items-start gap-4 p-5 bg-slate-50 border border-slate-100 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                            <span class="flex items-center justify-center w-12 h-12 rounded-xl bg-white text-sky-500 shrink-0 shadow border border-slate-100 font-bold">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </span>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">E-mail Resmi</h4>
                                <a href="mailto:{{ $profile['email'] ?? 'info@cls.co.id' }}" class="text-slate-500 text-sm mt-1 block hover:text-sky-500 transition-colors font-medium">{{ $profile['email'] ?? 'info@cls.co.id' }}</a>
                            </div>
                        </div>

                        {{-- Telepon --}}
                        <div class="flex items-start gap-4 p-5 bg-slate-50 border border-slate-100 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                            <span class="flex items-center justify-center w-12 h-12 rounded-xl bg-white text-sky-500 shrink-0 shadow border border-slate-100 font-bold">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </span>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">Telepon / Fax</h4>
                                <p class="text-slate-500 text-sm mt-1 leading-relaxed font-medium">{{ $profile['telepon'] ?? '(021) 1234-5678' }}</p>
                            </div>
                        </div>

                        {{-- WhatsApp --}}
                        <div class="flex items-start gap-4 p-5 bg-slate-50 border border-slate-100 rounded-2xl shadow-sm hover:shadow-md transition-shadow">
                            <span class="flex items-center justify-center w-12 h-12 rounded-xl bg-white text-green-500 shrink-0 shadow border border-slate-100 font-bold">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            </span>
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm">WhatsApp Marketing</h4>
                                @php
                                    $waRaw = $profile['whatsapp'] ?? '081234567890';
                                    $waFormatted = preg_replace('/[^0-9]/', '', $waRaw);
                                    if(str_starts_with($waFormatted, '0')) {
                                        $waFormatted = '62' . substr($waFormatted, 1);
                                    }
                                @endphp
                                <a href="https://wa.me/{{ $waFormatted }}?text=Halo%20CV.%20Cakrawala%20Langit%20Semesta" target="_blank" class="text-slate-500 text-sm mt-1 block hover:text-green-500 font-semibold transition-colors">
                                    {{ $waRaw }}
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Google Maps Placeholder --}}
                    <div class="relative w-full h-64 rounded-3xl overflow-hidden border border-slate-150 shadow-md bg-gradient-to-tr from-slate-900 to-slate-800 flex items-center justify-center group">
                        <div class="absolute inset-0 opacity-40 bg-[radial-gradient(#0EA5E9_1px,transparent_1px)] [background-size:16px_16px]"></div>
                        <div class="text-center relative z-10 p-6">
                            <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-red-500/20 text-red-500 border border-red-500/30 mb-4 animate-bounce">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            </span>
                            <h5 class="text-white font-bold text-sm mb-1">Lokasi Kami</h5>
                            <p class="text-slate-400 text-xs max-w-xs mx-auto mb-4 leading-relaxed">{{ $profile['alamat'] ?? 'Jakarta, Indonesia' }}</p>
                            <a href="https://maps.google.com" target="_blank" class="inline-flex px-4 py-2 bg-white/10 hover:bg-white/20 border border-white/20 rounded-xl text-white text-xs font-bold transition-all">Buka di Google Maps</a>
                        </div>
                    </div>
                </div>

                {{-- Right Column: Form --}}
                <div class="lg:col-span-7">
                    <div class="bg-white p-8 sm:p-10 rounded-3xl border border-slate-100 shadow-xl relative">
                        <h3 class="text-2xl font-bold text-slate-800 mb-6">Kirim Pesan Permintaan Penawaran harga</h3>
                        
                        <form method="POST" action="{{ route('contact.send') }}" enctype="multipart/form-data" class="space-y-6">
                            @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap *</label>
                                    <input type="text" id="name" name="name" required value="{{ old('name') }}"
                                        class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all">
                                    @error('name') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Alamat Email *</label>
                                    <input type="email" id="email" name="email" required value="{{ old('email') }}"
                                        class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all">
                                    @error('email') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label for="phone" class="block text-sm font-semibold text-slate-700 mb-2">No. Telepon / HP</label>
                                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                        class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all">
                                    @error('phone') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="subject" class="block text-sm font-semibold text-slate-700 mb-2">Subjek *</label>
                                    <input type="text" id="subject" name="subject" required value="{{ old('subject') }}"
                                        class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all">
                                    @error('subject') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div>
                                <label for="message" class="block text-sm font-semibold text-slate-700 mb-2">Isi Pesan *</label>
                                <textarea id="message" name="message" rows="5" required
                                    class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all resize-y">{{ old('message') }}</textarea>
                                @error('message') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="attachment" class="block text-sm font-semibold text-slate-700 mb-2">Lampiran Dokumen/Gambar (Opsional)</label>
                                <input type="file" id="attachment" name="attachment"
                                    accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.xls,.xlsx,.txt,.zip"
                                    class="w-full px-4 py-3 border border-slate-200 rounded-xl text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all">
                                <p class="text-xs text-slate-500 mt-2">Format yang diizinkan: JPG, PNG, PDF, DOC, DOCX, XLS, XLSX, ZIP (Maksimal 5MB)</p>
                                @error('attachment') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                            </div>

                            <button type="submit" class="w-full py-4 bg-gradient-to-r from-sky-500 to-sky-600 hover:from-sky-400 hover:to-sky-500 text-white font-bold text-sm rounded-xl shadow-lg hover:shadow-sky-500/20 hover:scale-102 transition-all duration-300">
                                Kirim Pesan Sekarang
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
