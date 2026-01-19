@extends('admin.layouts.app')
@section('title', 'Mesaj Detayı')
@section('content')
    <div class="max-w-2xl">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-bold text-gray-900">{{ $message->name }}</h2><span
                        class="text-gray-500 text-sm">{{ $message->created_at->format('d.m.Y H:i') }}</span>
                </div>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div><span class="text-gray-500">E-posta:</span> <a href="mailto:{{ $message->email }}"
                            class="text-blue-600">{{ $message->email }}</a></div>@if($message->phone)
                                <div><span class="text-gray-500">Telefon:</span> <a href="tel:{{ $message->phone }}"
                            class="text-blue-600">{{ $message->phone }}</a></div>@endif
                </div>
                @if($message->subject)
                    <div><span class="text-gray-500 text-sm">Konu:</span>
                        <p class="font-medium text-gray-900">{{ $message->subject }}</p>
                </div>@endif
                <div class="border-t pt-4"><span class="text-gray-500 text-sm">Mesaj:</span>
                    <p class="text-gray-700 mt-2 whitespace-pre-wrap">{{ $message->message }}</p>
                </div>
                <div class="flex space-x-4 pt-4"><a href="mailto:{{ $message->email }}"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Yanıtla</a><a
                        href="{{ route('admin.messages.index') }}"
                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">Geri</a></div>
            </div>
        </div>
    </div>
@endsection