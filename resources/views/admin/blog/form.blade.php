@extends('admin.layouts.app')
@section('title', isset($post) ? 'Blog Düzenle' : 'Yeni Blog')
@section('content')
    <div class="max-w-3xl">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <form action="{{ isset($post) ? route('admin.blog.update', $post) : route('admin.blog.store') }}" method="POST"
                enctype="multipart/form-data" class="space-y-6">@csrf @if(isset($post))@method('PUT')@endif
                <div class="grid grid-cols-2 gap-6">
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Başlık *</label><input type="text"
                            name="title" value="{{ old('title', $post->title ?? '') }}" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 outline-none">
                    </div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Slug</label><input type="text"
                            name="slug" value="{{ old('slug', $post->slug ?? '') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none"></div>
                </div>
                <div><label class="block text-sm font-medium text-gray-700 mb-2">Özet</label><textarea name="excerpt"
                        rows="2"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
                </div>
                <div><label class="block text-sm font-medium text-gray-700 mb-2">İçerik</label><textarea name="content"
                        rows="8" class="tinymce w-full">{{ old('content', $post->content ?? '') }}</textarea></div>
                <div><label
                        class="block text-sm font-medium text-gray-700 mb-2">Resim</label>@if(isset($post) && $post->image)<img
                        src="{{ $post->image_url }}" class="w-32 h-20 object-cover rounded mb-2">@endif<input type="file"
                        name="image" accept="image/*"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none"></div>
                <div class="grid grid-cols-2 gap-6">
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label><input type="text"
                            name="meta_title" value="{{ old('meta_title', $post->meta_title ?? '') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label><textarea
                            name="meta_description" rows="1"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none">{{ old('meta_description', $post->meta_description ?? '') }}</textarea>
                    </div>
                </div>
                <div class="flex items-center"><input type="checkbox" name="is_published" value="1" {{ old('is_published', $post->is_published ?? false) ? 'checked' : '' }} class="w-5 h-5 text-blue-600 rounded"><label
                        class="ml-3 text-sm text-gray-700">Yayınla</label></div>
                <div class="flex space-x-4 pt-4"><button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700">{{ isset($post) ? 'Güncelle' : 'Kaydet' }}</button><a
                        href="{{ route('admin.blog.index') }}"
                        class="px-6 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200">İptal</a></div>
            </form>
        </div>
    </div>
@endsection