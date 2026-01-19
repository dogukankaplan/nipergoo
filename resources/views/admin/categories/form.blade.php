@extends('admin.layouts.app')
@section('title', isset($category) ? 'Kategori Düzenle' : 'Yeni Kategori')
@section('content')
    <div class="max-w-3xl">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <form
                action="{{ isset($category) ? route('admin.categories.update', $category) : route('admin.categories.store') }}"
                method="POST" enctype="multipart/form-data" class="space-y-6">@csrf
                @if(isset($category))@method('PUT')@endif
                <div class="grid grid-cols-2 gap-6">
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Ad *</label><input type="text"
                            name="name" value="{{ old('name', $category->name ?? '') }}" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 outline-none">
                    </div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Slug</label><input type="text"
                            name="slug" value="{{ old('slug', $category->slug ?? '') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 outline-none">
                    </div>
                </div>
                <div><label class="block text-sm font-medium text-gray-700 mb-2">Üst Kategori</label><select
                        name="parent_id"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 outline-none">
                        <option value="">Ana Kategori</option>@foreach($parentCategories as $p)<option value="{{ $p->id }}"
                            {{ old('parent_id', $category->parent_id ?? '') == $p->id ? 'selected' : '' }}>{{ $p->name }}
                        </option>@endforeach
                    </select></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-2">Açıklama</label><textarea
                        name="description" rows="2"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none">{{ old('description', $category->description ?? '') }}</textarea>
                </div>
                <div><label class="block text-sm font-medium text-gray-700 mb-2">İçerik</label><textarea name="content"
                        rows="4" class="tinymce w-full">{{ old('content', $category->content ?? '') }}</textarea></div>
                <div><label
                        class="block text-sm font-medium text-gray-700 mb-2">Resim</label>@if(isset($category) && $category->image)<img
                        src="{{ $category->image_url }}" class="w-24 h-18 object-cover rounded mb-2">@endif<input
                        type="file" name="image" accept="image/*"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none"></div>
                <div class="grid grid-cols-2 gap-6">
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label><input type="text"
                            name="meta_title" value="{{ old('meta_title', $category->meta_title ?? '') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Meta Desc</label><textarea
                            name="meta_description" rows="1"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none">{{ old('meta_description', $category->meta_description ?? '') }}</textarea>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Sıra</label><input type="number"
                            name="order" value="{{ old('order', $category->order ?? 0) }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none"></div>
                    <div class="flex items-center pt-8"><input type="checkbox" name="is_active" value="1" {{ old('is_active', $category->is_active ?? true) ? 'checked' : '' }}
                            class="w-5 h-5 text-blue-600 rounded"><label class="ml-3 text-sm text-gray-700">Aktif</label>
                    </div>
                </div>
                <div class="flex space-x-4 pt-4"><button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700">{{ isset($category) ? 'Güncelle' : 'Kaydet' }}</button><a
                        href="{{ route('admin.categories.index') }}"
                        class="px-6 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200">İptal</a></div>
            </form>
        </div>
    </div>
@endsection