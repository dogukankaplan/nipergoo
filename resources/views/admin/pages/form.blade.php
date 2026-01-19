@extends('admin.layouts.app')
@section('title', isset($page) ? 'Sayfa Düzenle' : 'Yeni Sayfa')
@section('content')
    <div class="max-w-3xl">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <form action="{{ isset($page) ? route('admin.pages.update', $page) : route('admin.pages.store') }}"
                method="POST" class="space-y-6">@csrf @if(isset($page))@method('PUT')@endif
                <div class="grid grid-cols-2 gap-6">
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Başlık *</label><input type="text"
                            name="title" value="{{ old('title', $page->title ?? '') }}" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 outline-none">
                    </div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Slug</label><input type="text"
                            name="slug" value="{{ old('slug', $page->slug ?? '') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none"></div>
                </div>
                <div><label class="block text-sm font-medium text-gray-700 mb-2">İçerik</label><textarea name="content"
                        rows="10" class="tinymce w-full">{{ old('content', $page->content ?? '') }}</textarea></div>
                <div class="grid grid-cols-2 gap-6">
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label><input type="text"
                            name="meta_title" value="{{ old('meta_title', $page->meta_title ?? '') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Meta Desc</label><textarea
                            name="meta_description" rows="1"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none">{{ old('meta_description', $page->meta_description ?? '') }}</textarea>
                    </div>
                </div>
                <div class="flex items-center"><input type="checkbox" name="is_active" value="1" {{ old('is_active', $page->is_active ?? true) ? 'checked' : '' }} class="w-5 h-5 text-blue-600 rounded"><label
                        class="ml-3 text-sm text-gray-700">Aktif</label></div>
                <div class="flex space-x-4 pt-4"><button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700">{{ isset($page) ? 'Güncelle' : 'Kaydet' }}</button><a
                        href="{{ route('admin.pages.index') }}"
                        class="px-6 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200">İptal</a></div>
            </form>
        </div>
    </div>
@endsection