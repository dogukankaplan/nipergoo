@extends('admin.layouts.app')
@section('title', isset($project) ? 'Proje Düzenle' : 'Yeni Proje')
@section('content')
    <div class="max-w-4xl">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <form action="{{ isset($project) ? route('admin.projects.update', $project) : route('admin.projects.store') }}"
                method="POST" enctype="multipart/form-data" class="space-y-6">@csrf @if(isset($project))@method('PUT')@endif
                <div class="grid grid-cols-2 gap-6">
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Başlık *</label><input type="text"
                            name="title" value="{{ old('title', $project->title ?? '') }}" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 outline-none">
                    </div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Slug</label><input type="text"
                            name="slug" value="{{ old('slug', $project->slug ?? '') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none"></div>
                </div>
                <div class="grid grid-cols-3 gap-6">
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label><select
                            name="category_id" class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none">
                            <option value="">Seçiniz</option>@foreach($categories as $c)<option value="{{ $c->id }}" {{ old('category_id', $project->category_id ?? '') == $c->id ? 'selected' : '' }}>{{ $c->name }}
                            </option>@endforeach
                        </select></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Müşteri</label><input type="text"
                            name="client" value="{{ old('client', $project->client ?? '') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Konum</label><input type="text"
                            name="location" value="{{ old('location', $project->location ?? '') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none"></div>
                </div>
                <div><label class="block text-sm font-medium text-gray-700 mb-2">Açıklama</label><textarea
                        name="description" rows="4"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none">{{ old('description', $project->description ?? '') }}</textarea>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Ana Resim
                            *</label>@if(isset($project) && $project->image)<img src="{{ $project->image_url }}"
                            class="w-24 h-16 object-cover rounded mb-2">@endif<input type="file" name="image"
                            accept="image/*" {{ !isset($project) ? 'required' : '' }}
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none"></div>
                    <div><label
                            class="block text-sm font-medium text-gray-700 mb-2">Galeri</label>@if(isset($project) && $project->gallery)
                                <div class="flex gap-2 mb-2">@foreach($project->gallery_urls as $img)<img src="{{ $img }}"
                            class="w-12 h-12 object-cover rounded">@endforeach</div>@endif<input type="file"
                            name="gallery[]" accept="image/*" multiple
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none">
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-6">
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Tamamlanma</label><input type="date"
                            name="completed_at"
                            value="{{ old('completed_at', isset($project) && $project->completed_at ? $project->completed_at->format('Y-m-d') : '') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none"></div>
                    <div class="flex items-center pt-8"><input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $project->is_featured ?? false) ? 'checked' : '' }}
                            class="w-5 h-5 text-blue-600 rounded"><label class="ml-3 text-sm text-gray-700">Öne
                            Çıkan</label></div>
                    <div class="flex items-center pt-8"><input type="checkbox" name="is_active" value="1" {{ old('is_active', $project->is_active ?? true) ? 'checked' : '' }}
                            class="w-5 h-5 text-blue-600 rounded"><label class="ml-3 text-sm text-gray-700">Aktif</label>
                    </div>
                </div>
                <div class="flex space-x-4 pt-4"><button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700">{{ isset($project) ? 'Güncelle' : 'Kaydet' }}</button><a
                        href="{{ route('admin.projects.index') }}"
                        class="px-6 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200">İptal</a></div>
            </form>
        </div>
    </div>
@endsection