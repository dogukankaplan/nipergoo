@extends('admin.layouts.app')

@section('title', isset($slider) ? 'Slider Düzenle' : 'Yeni Slider')

@section('content')
    <div class="max-w-3xl">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <form action="{{ isset($slider) ? route('admin.sliders.update', $slider) : route('admin.sliders.store') }}"
                method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @if(isset($slider))
                    @method('PUT')
                @endif

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Başlık *</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $slider->title ?? '') }}" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors outline-none">
                </div>

                <div>
                    <label for="subtitle" class="block text-sm font-medium text-gray-700 mb-2">Alt Başlık</label>
                    <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $slider->subtitle ?? '') }}"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors outline-none">
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Açıklama</label>
                    <textarea name="description" id="description" rows="3"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors outline-none">{{ old('description', $slider->description ?? '') }}</textarea>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="button_text" class="block text-sm font-medium text-gray-700 mb-2">Buton Metni</label>
                        <input type="text" name="button_text" id="button_text"
                            value="{{ old('button_text', $slider->button_text ?? '') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors outline-none">
                    </div>
                    <div>
                        <label for="button_url" class="block text-sm font-medium text-gray-700 mb-2">Buton URL</label>
                        <input type="text" name="button_url" id="button_url"
                            value="{{ old('button_url', $slider->button_url ?? '') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Resim</label>
                    @if(isset($slider) && $slider->image)
                        <div class="mb-4">
                            <img src="{{ $slider->image_url }}" alt="{{ $slider->title }}"
                                class="w-40 h-24 object-cover rounded-lg">
                        </div>
                    @endif
                    <input type="file" name="image" accept="image/*"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors outline-none">
                    <p class="text-sm text-gray-500 mt-1">Önerilen boyut: 1920x1080px, Max: 2MB</p>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Sıra</label>
                        <input type="number" name="order" id="order" value="{{ old('order', $slider->order ?? 0) }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors outline-none">
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $slider->is_active ?? true) ? 'checked' : '' }}
                            class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="is_active" class="ml-3 text-sm font-medium text-gray-700">Aktif</label>
                    </div>
                </div>

                <div class="flex items-center space-x-4 pt-4">
                    <button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700 transition-colors">
                        {{ isset($slider) ? 'Güncelle' : 'Kaydet' }}
                    </button>
                    <a href="{{ route('admin.sliders.index') }}"
                        class="px-6 py-3 bg-gray-100 text-gray-700 font-medium rounded-xl hover:bg-gray-200 transition-colors">
                        İptal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection