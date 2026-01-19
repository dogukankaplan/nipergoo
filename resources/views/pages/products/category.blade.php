@extends('layouts.app')

@section('title', $category->meta_title ?? $category->name . ' | ' . setting('site_name'))
@section('meta_description', $category->meta_description ?? $category->description)

@section('content')
    <!-- Page Header -->
    <section class="py-20 bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500 rounded-full blur-3xl"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl">
                <nav class="text-blue-200 mb-4">
                    <a href="{{ route('home') }}" class="hover:text-white">Anasayfa</a>
                    <span class="mx-2">/</span>
                    <span class="text-white">{{ $category->name }}</span>
                </nav>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ $category->name }}</h1>
                @if($category->description)
                    <p class="text-xl text-blue-200">{{ $category->description }}</p>
                @endif
            </div>
        </div>
    </section>

    <!-- Category Content -->
    @if($category->content)
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto prose prose-lg">
                    {!! $category->content !!}
                </div>
            </div>
        </section>
    @endif

    <!-- Products Grid -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">{{ $category->name }} Ürünlerimiz</h2>

            @if($products->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($products as $product)
                        <a href="{{ route('product', [$category->slug, $product->slug]) }}"
                            class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                            <div class="aspect-[4/3] overflow-hidden bg-gradient-to-br from-blue-600 to-blue-800">
                                @if($product->image)
                                    <img src="{{ $product->image_url }}" alt="{{ $product->title }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-16 h-16 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                                    {{ $product->title }}</h3>
                                @if($product->short_description)
                                    <p class="text-gray-600 mb-4">{{ $product->short_description }}</p>
                                @endif
                                <span class="inline-flex items-center text-blue-600 font-semibold">
                                    Detaylı İncele
                                    <svg class="w-4 h-4 ml-2 group-hover:translate-x-2 transition-transform" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 bg-white rounded-2xl">
                    <p class="text-gray-500">Bu kategoride henüz ürün bulunmuyor.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-blue-600 to-blue-800">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-white mb-6">{{ $category->name }} İçin Teklif Alın</h2>
            <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                Ücretsiz keşif ve fiyat teklifi için hemen iletişime geçin.
            </p>
            <a href="{{ route('contact') }}"
                class="inline-flex items-center px-8 py-4 bg-white text-blue-600 font-semibold rounded-full hover:bg-blue-50 transition-all duration-300 shadow-xl">
                İletişime Geç
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </section>
@endsection