@extends('admin.layouts.app')
@section('title', 'Teklif Talepleri')
@section('content')
    <h2 class="text-lg font-semibold text-gray-900 mb-6">Teklif Talepleri</h2>
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ad</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">E-posta</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Durum</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tarih</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">İşlemler</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">@forelse($quotes as $q)<tr
                class="hover:bg-gray-50 {{ !$q->is_read ? 'bg-blue-50' : '' }}">
                <td class="px-6 py-4">
                    <div class="font-medium text-gray-900 {{ !$q->is_read ? 'font-bold' : '' }}">{{ $q->name }}</div>
                    @if($q->company)
                    <div class="text-sm text-gray-500">{{ $q->company }}</div>@endif
                </td>
                <td class="px-6 py-4 text-gray-600">{{ $q->email }}</td>
                <td class="px-6 py-4 text-gray-600">{{ $q->category->name ?? '-' }}</td>
                <td class="px-6 py-4"><span
                        class="px-2 py-1 text-xs rounded-full @if($q->status == 'pending') bg-yellow-100 text-yellow-700 @elseif($q->status == 'contacted') bg-blue-100 text-blue-700 @elseif($q->status == 'quoted') bg-green-100 text-green-700 @else bg-gray-100 text-gray-700 @endif">{{ $q->status }}</span>
                </td>
                <td class="px-6 py-4 text-gray-500 text-sm">{{ $q->created_at->format('d.m.Y H:i') }}</td>
                <td class="px-6 py-4 text-right space-x-2"><a href="{{ route('admin.quotes.show', $q) }}"
                        class="text-blue-600">Görüntüle</a>
                    <form action="{{ route('admin.quotes.destroy', $q) }}" method="POST" class="inline"
                        onsubmit="return confirm('Sil?')">@csrf @method('DELETE')<button
                            class="text-red-600">Sil</button></form>
                </td>
            </tr>@empty<tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">Henüz teklif talebi yok.</td>
                </tr>@endforelse</tbody>
        </table>
    </div>
    <div class="mt-6">{{ $quotes->links() }}</div>
@endsection