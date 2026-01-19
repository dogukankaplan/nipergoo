@extends('admin.layouts.app')
@section('title', isset($feature) ? 'Özellik Düzenle' : 'Yeni Özellik')
@section('content')
    <div class="max-w-2xl">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <form action="{{ isset($feature) ? route('admin.features.update', $feature) : route('admin.features.store') }}"
                method="POST" class="space-y-6">@csrf @if(isset($feature))@method('PUT')@endif
                <div><label class="block text-sm font-medium text-gray-700 mb-2">Başlık *</label><input type="text"
                        name="title" value="{{ old('title', $feature->title ?? '') }}" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 outline-none"></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-2">Açıklama</label><textarea
                        name="description" rows="3"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none">{{ old('description', $feature->description ?? '') }}</textarea>
                </div>
                <div><label class="block text-sm font-medium text-gray-700 mb-2">İkon (heroicons ismi)</label><input
                        type="text" name="icon" value="{{ old('icon', $feature->icon ?? '') }}"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none"
                        placeholder="shield-check, cog, light-bulb"></div>
                <div class="grid grid-cols-2 gap-6">
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Sıra</label><input type="number"
                            name="order" value="{{ old('order', $feature->order ?? 0) }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none"></div>
                    <div class="flex items-center pt-8"><input type="checkbox" name="is_active" value="1" {{ old('is_active', $feature->is_active ?? true) ? 'checked' : '' }}
                            class="w-5 h-5 text-blue-600 rounded"><label class="ml-3 text-sm text-gray-700">Aktif</label>
                    </div>
                </div>
                <div class="flex space-x-4 pt-4"><button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700">{{ isset($feature) ? 'Güncelle' : 'Kaydet' }}</button><a
                        href="{{ route('admin.features.index') }}"
                        class="px-6 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200">İptal</a></div>
            </form>
        </div>
    </div>
@endsection