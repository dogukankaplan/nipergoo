@extends('admin.layouts.app')
@section('title', 'Site Ayarları')
@section('content')
    <div class="max-w-4xl">
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            @foreach($settings as $group => $items)
                <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6 capitalize">
                        {{ $group == 'general' ? 'Genel' : ($group == 'contact' ? 'İletişim' : ($group == 'social' ? 'Sosyal Medya' : ($group == 'seo' ? 'SEO' : ($group == 'about' ? 'Hakkımızda' : $group)))) }}
                    </h3>
                    <div class="space-y-6">
                        @foreach($items as $setting)
                            <div>
                                <label
                                    class="block text-sm font-medium text-gray-700 mb-2">{{ str_replace('_', ' ', ucwords($setting->key)) }}</label>
                                @if($setting->type == 'image')
                                    @if($setting->value)<img src="{{ asset('storage/' . $setting->value) }}"
                                    class="w-32 h-20 object-contain rounded mb-2">@endif
                                    <input type="file" name="{{ $setting->key }}" accept="image/*"
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none">
                                @elseif($setting->type == 'textarea')
                                    <textarea name="{{ $setting->key }}" rows="3"
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none">{{ $setting->value }}</textarea>
                                @elseif($setting->type == 'boolean')
                                    <input type="checkbox" name="{{ $setting->key }}" value="1" {{ $setting->value ? 'checked' : '' }}
                                        class="w-5 h-5 text-blue-600 rounded">
                                @else
                                    <input type="text" name="{{ $setting->key }}" value="{{ $setting->value }}"
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <button type="submit"
                class="px-6 py-3 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700">Kaydet</button>
        </form>
    </div>
@endsection