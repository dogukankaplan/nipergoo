@extends('admin.layouts.app')

@section('title', isset($product) ? 'Ürün Düzenle' : 'Yeni Ürün')

@section('content')
    <div class="max-w-4xl">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <form action="{{ isset($product) ? route('admin.products.update', $product) : route('admin.products.store') }}"
                method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @if(isset($product))
                    @method('PUT')
                @endif

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Başlık *</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $product->title ?? '') }}"
                            required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors outline-none">
                    </div>
                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">URL Slug</label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug', $product->slug ?? '') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors outline-none">
                        <p class="text-sm text-gray-500 mt-1">Boş bırakılırsa başlıktan otomatik oluşturulur</p>
                    </div>
                </div>

                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Kategori *</label>
                    <select name="category_id" id="category_id" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors outline-none">
                        <option value="">Kategori Seçin</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="short_description" class="block text-sm font-medium text-gray-700 mb-2">Kısa
                        Açıklama</label>
                    <textarea name="short_description" id="short_description" rows="2"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors outline-none">{{ old('short_description', $product->short_description ?? '') }}</textarea>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Detaylı Açıklama</label>
                    <textarea name="description" id="description" rows="6"
                        class="tinymce w-full">{{ old('description', $product->description ?? '') }}</textarea>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Ana Resim</label>
                        @if(isset($product) && $product->image)
                            <div class="mb-4">
                                <img src="{{ $product->image_url }}" alt="{{ $product->title }}"
                                    class="w-32 h-24 object-cover rounded-lg">
                            </div>
                        @endif
                        <input type="file" name="image" accept="image/*"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Galeri Resimleri</label>
                        @if(isset($product) && $product->gallery)
                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach($product->gallery_urls as $img)
                                    <img src="{{ $img }}" alt="Gallery" class="w-16 h-16 object-cover rounded">
                                @endforeach
                            </div>
                        @endif
                        <input type="file" name="gallery[]" accept="image/*" multiple
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors outline-none">
                        <p class="text-sm text-gray-500 mt-1">Birden fazla resim seçebilirsiniz</p>
                    </div>
                </div>

                <div class="border-t pt-6">
                    <h3 class="font-medium text-gray-900 mb-4">SEO Ayarları</h3>
                    <div class="space-y-4">
                        <div>
                            <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">Meta Başlık</label>
                            <input type="text" name="meta_title" id="meta_title"
                                value="{{ old('meta_title', $product->meta_title ?? '') }}"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors outline-none">
                        </div>
                        <div>
                            <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">Meta
                                Açıklama</label>
                            <textarea name="meta_description" id="meta_description" rows="2"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors outline-none">{{ old('meta_description', $product->meta_description ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-6">
                    <div>
                        <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Sıra</label>
                        <input type="number" name="order" id="order" value="{{ old('order', $product->order ?? 0) }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors outline-none">
                    </div>
                    <div class="flex items-center pt-8">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}
                            class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="is_active" class="ml-3 text-sm font-medium text-gray-700">Aktif</label>
                    </div>
                    <div class="flex items-center pt-8">
                        <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $product->is_featured ?? false) ? 'checked' : '' }}
                            class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="is_featured" class="ml-3 text-sm font-medium text-gray-700">Öne Çıkan</label>
                    </div>
                </div>

                <div class="flex items-center space-x-4 pt-4">
                    <button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700 transition-colors">
                        {{ isset($product) ? 'Güncelle' : 'Kaydet' }}
                    </button>
                    <a href="{{ route('admin.products.index') }}"
                        class="px-6 py-3 bg-gray-100 text-gray-700 font-medium rounded-xl hover:bg-gray-200 transition-colors">
                        İptal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection