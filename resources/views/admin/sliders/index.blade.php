@extends('admin.layouts.app')

@section('title', 'Sliderlar')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-lg font-semibold text-gray-900">Slider Listesi</h2>
        <a href="{{ route('admin.sliders.create') }}"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
            + Yeni Ekle
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Resim</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Başlık</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Durum</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sıra</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">İşlemler</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($sliders as $slider)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            @if($slider->image)
                                <img src="{{ $slider->image_url }}" alt="{{ $slider->title }}"
                                    class="w-20 h-12 object-cover rounded">
                            @else
                                <div class="w-20 h-12 bg-gray-200 rounded flex items-center justify-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-medium text-gray-900">{{ $slider->title }}</div>
                            @if($slider->subtitle)
                                <div class="text-sm text-gray-500">{{ $slider->subtitle }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="px-2 py-1 text-xs rounded-full {{ $slider->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                {{ $slider->is_active ? 'Aktif' : 'Pasif' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-600">{{ $slider->order }}</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('admin.sliders.edit', $slider) }}"
                                class="text-blue-600 hover:text-blue-700">Düzenle</a>
                            <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" class="inline"
                                onsubmit="return confirm('Silmek istediğinize emin misiniz?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-700">Sil</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">Henüz slider eklenmemiş.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection