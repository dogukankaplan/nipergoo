@extends('admin.layouts.app')
@section('title', 'Aktivite Logları')
@section('content')
    <h2 class="text-lg font-semibold text-gray-900 mb-6">Aktivite Logları</h2>
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kullanıcı</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">İşlem</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Açıklama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">IP</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tarih</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">@forelse($logs as $log)<tr class="hover:bg-gray-50">
                <td class="px-6 py-4 text-gray-900">{{ $log->user->name ?? 'Sistem' }}</td>
                <td class="px-6 py-4"><span
                        class="px-2 py-1 text-xs rounded-full @if($log->action == 'create') bg-green-100 text-green-700 @elseif($log->action == 'update') bg-blue-100 text-blue-700 @elseif($log->action == 'delete') bg-red-100 text-red-700 @else bg-gray-100 text-gray-700 @endif">{{ $log->action }}</span>
                </td>
                <td class="px-6 py-4 text-gray-600">{{ $log->description }}</td>
                <td class="px-6 py-4 text-gray-500 text-sm">{{ $log->ip_address }}</td>
                <td class="px-6 py-4 text-gray-500 text-sm">{{ $log->created_at->format('d.m.Y H:i') }}</td>
            </tr>@empty<tr>
                    <td colspan="5" class="px-6 py-12 text-center text-gray-500">Henüz log kaydı yok.</td>
                </tr>@endforelse</tbody>
        </table>
    </div>
    <div class="mt-6">{{ $logs->links() }}</div>
@endsection