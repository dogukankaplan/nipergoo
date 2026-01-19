@extends('layouts.app')

@section('title', $product->meta_title ?? $product->title . ' | ' . setting('site_name'))
@section('meta_description', $product->meta_description ?? $product->short_description)

@section('content')
    <!-- Page Header -->
    <section class="py-16 bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500 rounded-full blur-3xl"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <nav class="text-blue-200 mb-4">
                <a href="{{ route('home') }}" class="hover:text-white">Anasayfa</a>
                <span class="mx-2">/</span>
                <a href="{{ route('category', $category->slug) }}" class="hover:text-white">{{ $category->name }}</a>
                <span class="mx-2">/</span>
                <span class="text-white">{{ $product->title }}</span>
            </nav>
            <h1 class="text-3xl md:text-4xl font-bold text-white">{{ $product->title }}</h1>
        </div>
    </section>

    <!-- Product Content -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                <!-- Product Image -->
                <div>
                    @if($product->image)
                        <div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-xl bg-gray-100">
                            <img src="{{ $product->image_url }}" alt="{{ $product->title }}" class="w-full h-full object-cover">
                        </div>
                    @else
                        <div
                            class="aspect-[4/3] rounded-2xl overflow-hidden shadow-xl bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center">
                            <svg class="w-24 h-24 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                    @endif

                    <!-- Gallery -->
                    @if($product->gallery && count($product->gallery) > 0)
                        <div class="grid grid-cols-4 gap-4 mt-4">
                            @foreach($product->gallery_urls as $image)
                                <div
                                    class="aspect-square rounded-lg overflow-hidden bg-gray-100 cursor-pointer hover:opacity-80 transition-opacity">
                                    <img src="{{ $image }}" alt="{{ $product->title }}" class="w-full h-full object-cover">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Product Info -->
                <div>
                    <div class="mb-6">
                        <span class="inline-block px-4 py-1 bg-blue-100 text-blue-600 rounded-full text-sm font-medium">
                            {{ $category->name }}
                        </span>
                    </div>

                    <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $product->title }}</h2>

                    @if($product->short_description)
                        <p class="text-lg text-gray-600 mb-6">{{ $product->short_description }}</p>
                    @endif

                    @if($product->description)
                        <div class="prose prose-lg max-w-none mb-8">
                            {!! $product->description !!}
                        </div>
                    @endif

                    <!-- CTA Buttons -->
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('contact') }}"
                            class="px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-full hover:from-blue-700 hover:to-blue-800 transition-all duration-300 shadow-lg hover:shadow-xl inline-flex items-center">
                            Teklif Al
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('contact_whatsapp')) }}?text={{ urlencode($product->title . ' hakkında bilgi almak istiyorum.') }}"
                            target="_blank"
                            class="px-8 py-4 bg-green-500 text-white font-semibold rounded-full hover:bg-green-600 transition-all duration-300 shadow-lg inline-flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                            </svg>
                            WhatsApp
                        </a>
                    </div>

                    <!-- Features -->
                    <div class="mt-10 pt-8 border-t border-gray-200">
                        <h3 class="font-semibold text-gray-900 mb-4">Özellikler</h3>
                        <ul class="space-y-3">
                            <li class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Yüksek kaliteli malzeme
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Profesyonel montaj hizmeti
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                2 yıl garanti
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Ücretsiz keşif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
        <section class="py-20 bg-gray-50">
            <div class="container mx-auto px-4">
                <h2 class="text-2xl font-bold text-gray-900 mb-8">Benzer Ürünler</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($relatedProducts as $related)
                        <a href="{{ route('product', [$category->slug, $related->slug]) }}"
                            class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div class="aspect-[4/3] overflow-hidden bg-gradient-to-br from-blue-600 to-blue-800">
                                @if($related->image)
                                    <img src="{{ $related->image_url }}" alt="{{ $related->title }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @endif
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-gray-900 group-hover:text-blue-600 transition-colors">
                                    {{ $related->title }}</h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection