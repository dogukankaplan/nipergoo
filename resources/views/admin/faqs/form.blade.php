@extends('admin.layouts.app')
@section('title', isset($faq) ? 'SSS Düzenle' : 'Yeni SSS')
@section('content')
    <div class="max-w-2xl">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <form action="{{ isset($faq) ? route('admin.faqs.update', $faq) : route('admin.faqs.store') }}" method="POST"
                class="space-y-6">@csrf @if(isset($faq))@method('PUT')@endif
                <div><label class="block text-sm font-medium text-gray-700 mb-2">Soru *</label><input type="text"
                        name="question" value="{{ old('question', $faq->question ?? '') }}" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 outline-none"></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-2">Cevap *</label><textarea name="answer"
                        rows="4" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none">{{ old('answer', $faq->answer ?? '') }}</textarea>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Sıra</label><input type="number"
                            name="order" value="{{ old('order', $faq->order ?? 0) }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none"></div>
                    <div class="flex items-center pt-8"><input type="checkbox" name="is_active" value="1" {{ old('is_active', $faq->is_active ?? true) ? 'checked' : '' }}
                            class="w-5 h-5 text-blue-600 rounded"><label class="ml-3 text-sm text-gray-700">Aktif</label>
                    </div>
                </div>
                <div class="flex space-x-4 pt-4"><button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700">{{ isset($faq) ? 'Güncelle' : 'Kaydet' }}</button><a
                        href="{{ route('admin.faqs.index') }}"
                        class="px-6 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200">İptal</a></div>
            </form>
        </div>
    </div>
@endsection