@extends('layouts.admin')

@section('title', 'Tambah Produk & Jasa')
@section('subtitle', 'Buat katalog barang supplier atau jasa baru')

@section('content')
    <div class="max-w-4xl bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-slate-200/80 flex items-center justify-between">
            <h3 class="font-bold text-slate-800 text-lg">Form Tambah Produk</h3>
            <a href="{{ route('admin.services.index') }}" class="text-xs text-slate-500 hover:text-slate-600 font-semibold inline-flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <span>Kembali</span>
            </a>
        </div>

        <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                {{-- Name --}}
                <div>
                    <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">Nama Produk / Jasa *</label>
                    <input type="text" id="name" name="name" required value="{{ old('name') }}" placeholder="Contoh: Lampu Philips 18 Watt"
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all">
                    @error('name') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>
                {{-- Category --}}
                <div>
                    <label for="category" class="block text-sm font-semibold text-slate-700 mb-2">Kategori *</label>
                    <input type="text" id="category" name="category" required value="{{ old('category') }}" placeholder="Ketik atau pilih kategori..." list="category-list"
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all">
                    <datalist id="category-list">
                        @foreach($categories as $category)
                            <option value="{{ $category }}"></option>
                        @endforeach
                    </datalist>
                    @error('category') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Produk</label>
                <textarea id="description" name="description" rows="4" placeholder="Detail spesifikasi barang, ukuran, merk, dll..."
                    class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all resize-y">{{ old('description') }}</textarea>
                @error('description') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 items-center">
                {{-- Icon --}}
                <div>
                    <label for="icon" class="block text-sm font-semibold text-slate-700 mb-2">Icon (Opsional)</label>
                    <input type="text" id="icon" name="icon" value="{{ old('icon') }}" placeholder="Contoh: lightbulb"
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all">
                    @error('icon') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>
                {{-- Order --}}
                <div>
                    <label for="order" class="block text-sm font-semibold text-slate-700 mb-2">Urutan Tampil (Order)</label>
                    <input type="number" id="order" name="order" value="{{ old('order', 0) }}" min="0"
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all">
                    @error('order') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>
                {{-- Is Active Switch --}}
                <div class="sm:pt-6">
                    <label class="inline-flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-slate-200 rounded-full peer peer-focus:ring-2 peer-focus:ring-sky-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-sky-500 relative"></div>
                        <span class="text-sm font-semibold text-slate-600 peer-checked:text-sky-600 select-none">Aktif</span>
                    </label>
                    @error('is_active') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- Image Upload & Preview --}}
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Foto / Gambar Produk (Opsional)</label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
                    {{-- Upload Area --}}
                    <div>
                        <label for="image" class="image-preview-area flex flex-col items-center justify-center p-8 rounded-2xl cursor-pointer text-center">
                            <svg class="w-10 h-10 text-slate-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span class="text-sm font-bold text-slate-600">Klik untuk upload foto</span>
                            <span class="text-xs text-slate-400 mt-1">Maks. 2MB (format: PNG, JPG, JPEG, WEBP)</span>
                            <input type="file" id="image" name="image" class="hidden" accept="image/*" onchange="previewImage(event)">
                        </label>
                        @error('image') <span class="text-xs text-red-500 mt-2 block">{{ $message }}</span> @enderror
                    </div>
                    {{-- Preview Area --}}
                    <div>
                        <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Pratinjau Foto</span>
                        <div class="relative w-full aspect-video rounded-2xl overflow-hidden bg-slate-50 border border-slate-200/60 shadow-sm flex items-center justify-center">
                            <img id="image-preview" src="#" alt="Preview" class="hidden w-full h-full object-cover">
                            <span id="preview-placeholder" class="text-xs text-slate-400 font-medium">Belum ada gambar terpilih</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Submit buttons --}}
            <div class="pt-6 border-t border-slate-200/80 flex justify-end gap-3">
                <a href="{{ route('admin.services.index') }}" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-sm rounded-lg transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 bg-sky-500 hover:bg-sky-600 text-white font-bold text-sm rounded-lg shadow-md hover:shadow-sky-500/20 transition-all cursor-pointer">
                    Simpan Produk
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('image-preview');
            const placeholder = document.getElementById('preview-placeholder');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '#';
                preview.classList.add('hidden');
                placeholder.classList.remove('hidden');
            }
        }
    </script>
@endpush
