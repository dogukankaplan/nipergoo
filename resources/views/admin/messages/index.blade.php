@extends('admin.layouts.app')
@section('title', 'Mesajlar')
@section('content')
    <h2 class="text-lg font-semibold text-gray-900 mb-6">Mesajlar</h2>
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">İsim</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">E-posta</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Konu</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tarih</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">İşlemler</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">@forelse($messages as $m)<tr
                class="hover:bg-gray-50 {{ !$m->is_read ? 'bg-blue-50' : '' }}">
                <td class="px-6 py-4">
                    <div class="font-medium text-gray-900 {{ !$m->is_read ? 'font-bold' : '' }}">{{ $m->name }}</div>
                </td>
                <td class="px-6 py-4 text-gray-600">{{ $m->email }}</td>
                <td class="px-6 py-4 text-gray-600">{{ $m->subject ?? '-' }}</td>
                <td class="px-6 py-4 text-gray-500 text-sm">{{ $m->created_at->format('d.m.Y H:i') }}</td>
                <td class="px-6 py-4 text-right space-x-2"><a href="{{ route('admin.messages.show', $m) }}"
                        class="text-blue-600">Görüntüle</a>
                    <form action="{{ route('admin.messages.destroy', $m) }}" method="POST" class="inline"
                        onsubmit="return confirm('Sil?')">@csrf @method('DELETE')<button
                            class="text-red-600">Sil</button></form>
                </td>
            </tr>@empty<tr>
                    <td colspan="5" class="px-6 py-12 text-center text-gray-500">Henüz mesaj yok.</td>
                </tr>@endforelse</tbody>
        </table>
    </div>
    <div class="mt-6">{{ $messages->links() }}</div>
@endsection