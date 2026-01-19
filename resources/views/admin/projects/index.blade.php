@extends('admin.layouts.app')
@section('title', 'Projeler')
@section('content')
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-lg font-semibold text-gray-900">Proje Listesi</h2><a href="{{ route('admin.projects.create') }}"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">+ Yeni Ekle</a>
    </div>
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Resim</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Başlık</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Durum</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">İşlemler</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">@forelse($projects as $p)<tr class="hover:bg-gray-50">
                <td class="px-6 py-4"><img src="{{ $p->image_url }}" class="w-16 h-12 object-cover rounded"></td>
                <td class="px-6 py-4">
                    <div class="font-medium text-gray-900">{{ $p->title }}</div>
                    <div class="text-sm text-gray-500">{{ $p->client }}</div>
                </td>
                <td class="px-6 py-4 text-gray-600">{{ $p->category->name ?? '-' }}</td>
                <td class="px-6 py-4"><span
                        class="px-2 py-1 text-xs rounded-full {{ $p->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">{{ $p->is_active ? 'Aktif' : 'Pasif' }}</span>@if($p->is_featured)<span
                        class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700 ml-1">Öne Çıkan</span>@endif
                </td>
                <td class="px-6 py-4 text-right space-x-2"><a href="{{ route('admin.projects.edit', $p) }}"
                        class="text-blue-600">Düzenle</a>
                    <form action="{{ route('admin.projects.destroy', $p) }}" method="POST" class="inline"
                        onsubmit="return confirm('Sil?')">@csrf @method('DELETE')<button
                            class="text-red-600">Sil</button></form>
                </td>
            </tr>@empty<tr>
                    <td colspan="5" class="px-6 py-12 text-center text-gray-500">Henüz proje yok.</td>
                </tr>@endforelse</tbody>
        </table>
    </div>
@endsection