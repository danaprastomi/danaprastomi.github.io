@extends('layouts.admin')

@section('title', 'Edit Banner')
@section('subtitle', 'Ubah data gambar carousel banner yang sudah ada')

@section('content')
    <div class="max-w-4xl bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-slate-200/80 flex items-center justify-between">
            <h3 class="font-bold text-slate-800 text-lg">Form Edit Banner</h3>
            <a href="{{ route('admin.sliders.index') }}" class="text-xs text-slate-500 hover:text-slate-600 font-semibold inline-flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <span>Kembali</span>
            </a>
        </div>

        <form method="POST" action="{{ route('admin.sliders.update', $slider->id) }}" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                {{-- Title --}}
                <div>
                    <label for="title" class="block text-sm font-semibold text-slate-700 mb-2">Judul Utama (Title) *</label>
                    <input type="text" id="title" name="title" required value="{{ old('title', $slider->title) }}" placeholder="Contoh: CV. Cakrawala Langit Semesta"
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all">
                    @error('title') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>
                {{-- Subtitle --}}
                <div>
                    <label for="subtitle" class="block text-sm font-semibold text-slate-700 mb-2">Subjudul (Subtitle) *</label>
                    <input type="text" id="subtitle" name="subtitle" required value="{{ old('subtitle', $slider->subtitle) }}" placeholder="Contoh: General Supplier Terpercaya"
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all">
                    @error('subtitle') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Singkat</label>
                <textarea id="description" name="description" rows="3" placeholder="Tulis deskripsi promo atau penawaran menarik..."
                    class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all resize-y">{{ old('description', $slider->description) }}</textarea>
                @error('description') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 items-center">
                {{-- Order --}}
                <div>
                    <label for="order" class="block text-sm font-semibold text-slate-700 mb-2">Urutan Tampil (Order)</label>
                    <input type="number" id="order" name="order" value="{{ old('order', $slider->order) }}" min="0"
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg text-sm focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none transition-all">
                    @error('order') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>
                {{-- Is Active Switch --}}
                <div>
                    <span class="block text-sm font-semibold text-slate-700 mb-2">Status Banner</span>
                    <label class="inline-flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" class="sr-only peer" {{ $slider->is_active ? 'checked' : '' }}>
                        <div class="w-11 h-6 bg-slate-200 rounded-full peer peer-focus:ring-2 peer-focus:ring-sky-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-sky-500 relative"></div>
                        <span class="text-sm font-semibold text-slate-600 peer-checked:text-sky-600 select-none">Aktif (Ditampilkan)</span>
                    </label>
                    @error('is_active') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- Image Upload & Preview --}}
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Gambar Banner</label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
                    {{-- Upload Area --}}
                    <div>
                        <label for="image" class="image-preview-area flex flex-col items-center justify-center p-8 rounded-2xl cursor-pointer text-center">
                            <svg class="w-10 h-10 text-slate-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span class="text-sm font-bold text-slate-600">Klik untuk ganti gambar</span>
                            <span class="text-xs text-slate-400 mt-1">Biarkan kosong jika tidak ingin mengubah gambar</span>
                            <input type="file" id="image" name="image" class="hidden" accept="image/*" onchange="previewImage(event)">
                        </label>
                        @error('image') <span class="text-xs text-red-500 mt-2 block">{{ $message }}</span> @enderror
                    </div>
                    {{-- Preview Area --}}
                    <div>
                        <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Pratinjau Gambar</span>
                        <div class="relative w-full aspect-video rounded-2xl overflow-hidden bg-slate-50 border border-slate-200/60 shadow-sm flex items-center justify-center">
                            <img id="image-preview" src="{{ Storage::url($slider->image) }}" alt="Preview" class="w-full h-full object-cover">
                            <span id="preview-placeholder" class="hidden text-xs text-slate-400 font-medium">Belum ada gambar terpilih</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Submit buttons --}}
            <div class="pt-6 border-t border-slate-200/80 flex justify-end gap-3">
                <a href="{{ route('admin.sliders.index') }}" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-sm rounded-lg transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 bg-sky-500 hover:bg-sky-600 text-white font-bold text-sm rounded-lg shadow-md hover:shadow-sky-500/20 transition-all cursor-pointer">
                    Simpan Perubahan
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
            }
        }
    </script>
@endpush
