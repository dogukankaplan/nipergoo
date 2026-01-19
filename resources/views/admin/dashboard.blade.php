@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Toplam Ürün</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['products'] }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Kategoriler</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['categories'] }}</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Blog Yazıları</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['blog_posts'] }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Okunmamış Mesaj</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['unread_messages'] }}</p>
                </div>
                <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Messages -->
    <div class="bg-white rounded-xl shadow-sm">
        <div class="p-6 border-b border-gray-100">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-900">Son Mesajlar</h2>
                <a href="{{ route('admin.messages.index') }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                    Tümünü Gör →
                </a>
            </div>
        </div>
        <div class="divide-y divide-gray-100">
            @forelse($recentMessages as $message)
                <div class="p-6 hover:bg-gray-50 transition-colors">
                    <div class="flex items-start justify-between">
                        <div>
                            <div class="flex items-center space-x-3">
                                <span class="font-medium text-gray-900">{{ $message->name }}</span>
                                @if(!$message->is_read)
                                    <span class="px-2 py-1 bg-blue-100 text-blue-600 text-xs rounded-full">Yeni</span>
                                @endif
                            </div>
                            <p class="text-gray-500 text-sm mt-1">{{ $message->email }}</p>
                            <p class="text-gray-600 mt-2 line-clamp-2">{{ $message->message }}</p>
                        </div>
                        <span class="text-gray-400 text-sm">{{ $message->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            @empty
                <div class="p-6 text-center text-gray-500">
                    Henüz mesaj yok.
                </div>
            @endforelse
        </div>
    </div>
@endsection