@extends('admin.layouts.app')
@section('title', 'Blog Yazıları')
@section('content')
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-lg font-semibold text-gray-900">Blog Listesi</h2><a href="{{ route('admin.blog.create') }}"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">+ Yeni Ekle</a>
    </div>
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Başlık</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tarih</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Durum</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">İşlemler</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">@forelse($posts as $post)<tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                    <div class="font-medium text-gray-900">{{ $post->title }}</div>
                    <div class="text-sm text-gray-500">{{ $post->slug }}</div>
                </td>
                <td class="px-6 py-4 text-gray-600">{{ $post->published_at?->format('d.m.Y') ?? '-' }}</td>
                <td class="px-6 py-4"><span
                        class="px-2 py-1 text-xs rounded-full {{ $post->is_published ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">{{ $post->is_published ? 'Yayında' : 'Taslak' }}</span>
                </td>
                <td class="px-6 py-4 text-right space-x-2"><a href="{{ route('admin.blog.edit', $post) }}"
                        class="text-blue-600 hover:text-blue-700">Düzenle</a>
                    <form action="{{ route('admin.blog.destroy', $post) }}" method="POST" class="inline"
                        onsubmit="return confirm('Sil?')">@csrf @method('DELETE')<button
                            class="text-red-600">Sil</button></form>
                </td>
            </tr>@empty<tr>
                    <td colspan="4" class="px-6 py-12 text-center text-gray-500">Henüz yazı yok.</td>
                </tr>@endforelse</tbody>
        </table>
    </div>
@endsection