@extends('admin.layouts.app')
@section('title', isset($testimonial) ? 'Yorum Düzenle' : 'Yeni Yorum')
@section('content')
    <div class="max-w-2xl">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <form
                action="{{ isset($testimonial) ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}"
                method="POST" enctype="multipart/form-data" class="space-y-6">@csrf
                @if(isset($testimonial))@method('PUT')@endif
                <div><label class="block text-sm font-medium text-gray-700 mb-2">Ad Soyad *</label><input type="text"
                        name="name" value="{{ old('name', $testimonial->name ?? '') }}" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 outline-none"></div>
                <div class="grid grid-cols-2 gap-6">
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Firma</label><input type="text"
                            name="company" value="{{ old('company', $testimonial->company ?? '') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Pozisyon</label><input type="text"
                            name="position" value="{{ old('position', $testimonial->position ?? '') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none"></div>
                </div>
                <div><label class="block text-sm font-medium text-gray-700 mb-2">Yorum *</label><textarea name="content"
                        rows="4" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none">{{ old('content', $testimonial->content ?? '') }}</textarea>
                </div>
                <div><label
                        class="block text-sm font-medium text-gray-700 mb-2">Fotoğraf</label>@if(isset($testimonial) && $testimonial->image)<img
                        src="{{ $testimonial->image_url }}" class="w-16 h-16 rounded-full object-cover mb-2">@endif<input
                        type="file" name="image" accept="image/*"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none"></div>
                <div class="grid grid-cols-3 gap-6">
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Puan</label><select name="rating"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none">@for($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}" {{ old('rating', $testimonial->rating ?? 5) == $i ? 'selected' : '' }}>
                            {{ $i }} Yıldız</option>@endfor
                        </select></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Sıra</label><input type="number"
                            name="order" value="{{ old('order', $testimonial->order ?? 0) }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none"></div>
                    <div class="flex items-center pt-8"><input type="checkbox" name="is_active" value="1" {{ old('is_active', $testimonial->is_active ?? true) ? 'checked' : '' }}
                            class="w-5 h-5 text-blue-600 rounded"><label class="ml-3 text-sm text-gray-700">Aktif</label>
                    </div>
                </div>
                <div class="flex space-x-4 pt-4"><button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700">{{ isset($testimonial) ? 'Güncelle' : 'Kaydet' }}</button><a
                        href="{{ route('admin.testimonials.index') }}"
                        class="px-6 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200">İptal</a></div>
            </form>
        </div>
    </div>
@endsection