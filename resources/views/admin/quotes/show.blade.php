@extends('admin.layouts.app')
@section('title', 'Teklif Detayı')
@section('content')
    <div class="max-w-3xl">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-900">{{ $quote->name }}</h2><span
                    class="text-gray-500 text-sm">{{ $quote->created_at->format('d.m.Y H:i') }}</span>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="p-4 bg-gray-50 rounded-lg"><span class="text-gray-500 text-sm">E-posta</span>
                    <p class="font-medium"><a href="mailto:{{ $quote->email }}"
                            class="text-blue-600">{{ $quote->email }}</a></p>
                </div>
                @if($quote->phone)
                    <div class="p-4 bg-gray-50 rounded-lg"><span class="text-gray-500 text-sm">Telefon</span>
                        <p class="font-medium"><a href="tel:{{ $quote->phone }}" class="text-blue-600">{{ $quote->phone }}</a>
                        </p>
                </div>@endif
                @if($quote->company)
                    <div class="p-4 bg-gray-50 rounded-lg"><span class="text-gray-500 text-sm">Firma</span>
                        <p class="font-medium">{{ $quote->company }}</p>
                </div>@endif
                @if($quote->category)
                    <div class="p-4 bg-gray-50 rounded-lg"><span class="text-gray-500 text-sm">Kategori</span>
                        <p class="font-medium">{{ $quote->category->name }}</p>
                </div>@endif
                @if($quote->product)
                    <div class="p-4 bg-gray-50 rounded-lg"><span class="text-gray-500 text-sm">Ürün</span>
                        <p class="font-medium">{{ $quote->product->title }}</p>
                </div>@endif
                @if($quote->budget_range)
                    <div class="p-4 bg-gray-50 rounded-lg"><span class="text-gray-500 text-sm">Bütçe</span>
                        <p class="font-medium">{{ $quote->budget_range }}</p>
                </div>@endif
                @if($quote->timeline)
                    <div class="p-4 bg-gray-50 rounded-lg"><span class="text-gray-500 text-sm">Zamanlama</span>
                        <p class="font-medium">{{ $quote->timeline }}</p>
                </div>@endif
            </div>
            @if($quote->project_details)
                <div class="mb-6">
                    <h3 class="font-medium text-gray-700 mb-2">Proje Detayları</h3>
                    <p class="p-4 bg-gray-50 rounded-lg whitespace-pre-wrap">{{ $quote->project_details }}</p>
            </div>@endif
            @if($quote->message)
                <div class="mb-6">
                    <h3 class="font-medium text-gray-700 mb-2">Ek Mesaj</h3>
                    <p class="p-4 bg-gray-50 rounded-lg whitespace-pre-wrap">{{ $quote->message }}</p>
            </div>@endif
            <div class="border-t pt-6">
                <h3 class="font-medium text-gray-700 mb-4">Durum Güncelle</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach(['pending' => 'Beklemede', 'contacted' => 'İletişime Geçildi', 'quoted' => 'Teklif Verildi', 'closed' => 'Kapatıldı'] as $key => $label)
                        <form action="{{ route('admin.quotes.status', [$quote, $key]) }}" method="POST" class="inline">@csrf
                            @method('PUT')
                            <button type="submit"
                                class="px-4 py-2 rounded-lg text-sm {{ $quote->status == $key ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">{{ $label }}</button>
                        </form>
                    @endforeach
                </div>
            </div>
            <div class="flex space-x-4 pt-6"><a href="mailto:{{ $quote->email }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">E-posta Gönder</a><a
                    href="{{ route('admin.quotes.index') }}"
                    class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">Geri</a></div>
        </div>
    </div>
@endsection