@extends('layouts.app')

@section('title', 'Katalog Produk & Jasa - ' . ($profile['name'] ?? 'CV. Cakrawala Langit Semesta'))

@section('content')
    {{-- ===== Sub Hero Banner ===== --}}
    <section class="relative pt-32 pb-20 bg-slate-900 overflow-hidden">
        {{-- Ambient glows --}}
        <div class="absolute top-0 right-0 w-96 h-96 rounded-full bg-sky-500/10 blur-[120px]"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center text-white">
            <span class="inline-block px-4 py-1.5 bg-brand-gold/90 backdrop-blur-sm text-slate-900 font-bold text-xs uppercase tracking-widest rounded-full mb-4 shadow-lg border border-white/20">
                Penyedia Kebutuhan Bisnis
            </span>
            <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight mb-4">
                Katalog Produk & Jasa
            </h1>
            <p class="max-w-2xl mx-auto text-slate-300 text-base sm:text-lg font-light leading-relaxed">
                Temukan berbagai macam alat tulis kantor, perlengkapan safety, mekanikal elektrikal, furnitur, hingga jasa kontraktor bangunan.
            </p>
        </div>
    </section>

    {{-- ===== Products Catalog Section ===== --}}
    <section class="py-16 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Search & Filtering Panel --}}
            <div class="bg-slate-50 border border-slate-150 p-6 sm:p-8 rounded-3xl shadow-sm mb-12 flex flex-col md:flex-row items-center justify-between gap-6">
                {{-- Search Input --}}
                <form action="{{ route('produk') }}" method="GET" class="w-full md:w-96 relative flex items-center">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari produk atau jasa..."
                        class="w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none bg-white shadow-inner transition-all">
                    <span class="absolute left-4 text-slate-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </span>
                    @if(request('search'))
                        <a href="{{ route('produk', request()->only('category')) }}" class="absolute right-4 text-slate-400 hover:text-slate-600 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </a>
                    @endif
                </form>

                {{-- Category Info Badge / Clear Filters --}}
                <div class="flex items-center gap-3 flex-wrap">
                    @if(request('category') || request('search'))
                        <span class="text-xs font-semibold text-slate-500">Filter Aktif:</span>
                        @if(request('category'))
                            @php
                                $activeCatName = collect($categories)->first(function ($cat) {
                                    return \Illuminate\Support\Str::slug($cat) === request('category');
                                }) ?? request('category');
                            @endphp
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-sky-50 border border-sky-100 text-sky-600 text-xs font-bold rounded-full">
                                Kategori: {{ $activeCatName }}
                                <a href="{{ route('produk', request()->only('search')) }}" class="text-sky-400 hover:text-sky-600"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></a>
                            </span>
                        @endif
                        @if(request('search'))
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-yellow-50 border border-yellow-150 text-brand-gold text-xs font-bold rounded-full">
                                Kata Kunci: "{{ request('search') }}"
                                <a href="{{ route('produk', request()->only('category')) }}" class="text-yellow-400 hover:text-brand-gold"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></a>
                            </span>
                        @endif
                        <a href="{{ route('produk') }}" class="text-xs font-bold text-red-500 hover:text-red-600 transition-colors uppercase tracking-wider">Bersihkan Semua</a>
                    @else
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Menampilkan Semua Kategori</span>
                    @endif
                </div>
            </div>

            {{-- Category Selector Grid/Tabs --}}
            <div class="flex flex-wrap items-center justify-center gap-2 mb-12">
                <a href="{{ route('produk', request()->only('search')) }}" 
                    class="px-5 py-2.5 rounded-full text-xs font-bold border transition-all duration-300 {{ !request('category') ? 'bg-gradient-to-r from-sky-500 to-sky-600 text-white shadow-md border-transparent hover:scale-105' : 'bg-slate-50 border-slate-200 text-slate-600 hover:bg-slate-100' }}">
                    Semua Kategori
                </a>
                @foreach($categories as $category)
                    @php
                        $slug = \Illuminate\Support\Str::slug($category);
                        $isActive = request('category') === $slug;
                    @endphp
                    <a href="{{ route('produk', array_merge(request()->only('search'), ['category' => $slug])) }}"
                        class="px-5 py-2.5 rounded-full text-xs font-bold border transition-all duration-300 {{ $isActive ? 'bg-gradient-to-r from-sky-500 to-sky-600 text-white shadow-md border-transparent hover:scale-105' : 'bg-slate-50 border-slate-200 text-slate-600 hover:bg-slate-100' }}">
                        {{ $category }}
                    </a>
                @endforeach
            </div>

            {{-- Products Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @forelse($services as $service)
                    @php
                        $waRaw = $profile['whatsapp'] ?? '081234567890';
                        $waFormatted = preg_replace('/[^0-9]/', '', $waRaw);
                        if(str_starts_with($waFormatted, '0')) {
                            $waFormatted = '62' . substr($waFormatted, 1);
                        }
                        $waMessage = 'Halo CV. Cakrawala Langit Semesta, saya ingin memesan/bertanya tentang produk: ' . $service->name;
                        $waUrl = 'https://wa.me/' . $waFormatted . '?text=' . urlencode($waMessage);
                    @endphp

                    <div class="service-card group bg-slate-50 rounded-2xl overflow-hidden border border-slate-150 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between">
                        {{-- Image area --}}
                        <div class="relative aspect-video w-full overflow-hidden bg-slate-200">
                            @if($service->image)
                                <img src="{{ Storage::url($service->image) }}" alt="{{ $service->name }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-gradient-to-tr from-slate-200 via-slate-100 to-slate-200 flex items-center justify-center text-slate-400">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                </div>
                            @endif
                            <span class="absolute top-3 right-3 bg-brand-gold/90 backdrop-blur-sm text-slate-900 text-[10px] font-extrabold px-3 py-1 rounded-full shadow border border-white/20 uppercase tracking-wider">
                                {{ $service->category }}
                            </span>
                        </div>

                        {{-- Card Details --}}
                        <div class="p-6 flex-grow flex flex-col justify-between">
                            <div>
                                <h3 class="font-bold text-slate-800 text-lg group-hover:text-sky-600 transition-colors mb-2 line-clamp-1" title="{{ $service->name }}">
                                    {{ $service->name }}
                                </h3>
                                <p class="text-slate-500 text-xs sm:text-sm line-clamp-3 leading-relaxed mb-6">
                                    {{ $service->description ?? 'Pilihan produk terbaik untuk mendukung efisiensi dan kelancaran operasional bisnis Anda.' }}
                                </p>
                            </div>
                            <div class="border-t border-slate-150 pt-4 flex items-center justify-between">
                                <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">General Supply</span>
                                <a href="{{ $waUrl }}" target="_blank" class="inline-flex items-center gap-1.5 text-green-500 hover:text-green-600 font-bold text-xs group/link bg-green-50 px-3.5 py-2 rounded-lg border border-green-100 transition-all duration-300">
                                    <svg class="w-4 h-4 fill-currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                    <span>Pesan</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center text-slate-400">
                        <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <p class="text-lg">Tidak ada produk atau jasa ditemukan.</p>
                        <p class="text-sm text-slate-500 mt-2">Coba bersihkan filter pencarian atau kategori Anda.</p>
                    </div>
                @endforelse
            </div>

            {{-- Pagination Links --}}
            <div class="mt-16 flex justify-center">
                {{ $services->links() }}
            </div>
        </div>
    </section>

    {{-- ===== Call to Action Section ===== --}}
    <section class="py-20 bg-slate-50 border-t border-slate-100 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-800 mb-4">
                Butuh Produk Kustom atau Jasa Lainnya?
            </h2>
            <p class="max-w-2xl mx-auto text-slate-500 text-sm sm:text-base mb-8 leading-relaxed font-light">
                Sebagai general supplier, kami memiliki jaringan pasokan yang luas. Jika Anda memerlukan barang spesifik yang belum terdaftar di katalog kami, diskusikan langsung dengan tim procurement kami.
            </p>
            <a href="{{ route('kontak') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-gradient-to-r from-sky-500 to-sky-600 hover:from-sky-400 hover:to-sky-500 text-white font-bold rounded-lg shadow-lg hover:shadow-sky-500/25 hover:scale-105 transition-all duration-300">
                <span>Hubungi Penjualan Kami</span>
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
    </section>
@endsection
