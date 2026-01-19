@extends('layouts.app')

@section('title', 'Arama: ' . $query)

@section('content')
    <!-- Hero -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-3xl font-bold text-white mb-4">Arama Sonuçları</h1>
            <!-- Search Form -->
            <form action="{{ route('search') }}" method="GET" class="max-w-xl mx-auto">
                <div class="flex">
                    <input type="text" name="q" value="{{ $query }}" placeholder="Ürün, kategori veya blog yazısı ara..."
                        class="flex-1 px-6 py-4 rounded-l-xl border-0 focus:ring-2 focus:ring-blue-300 outline-none">
                    <button type="submit"
                        class="px-8 py-4 bg-blue-700 text-white font-semibold rounded-r-xl hover:bg-blue-800 transition-colors">
                        Ara
                    </button>
                </div>
            </form>
        </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto px-4">
            @if(strlen($query) < 2)
                <div class="text-center py-12">
                    <p class="text-gray-500">Arama yapmak için en az 2 karakter girin.</p>
                </div>
            @else

                @php
                    $totalResults = $products->count() + $categories->count() + $blogPosts->count() + $projects->count();
                @endphp

                <p class="text-gray-600 mb-8">"<strong>{{ $query }}</strong>" için {{ $totalResults }} sonuç bulundu.</p>

                @if($totalResults === 0)
                    <div class="text-center py-12 bg-gray-50 rounded-2xl">
                        <p class="text-gray-500 mb-4">Aramanızla eşleşen sonuç bulunamadı.</p>
                        <a href="{{ route('home') }}" class="text-blue-600 hover:underline">Anasayfaya Dön</a>
                    </div>
                @else

                    <!-- Products -->
                    @if($products->count() > 0)
                        <div class="mb-12">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Ürünler</h2>
                            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                                @foreach($products as $product)
                                    <a href="{{ route('product', [$product->category->slug ?? 'urunler', $product->slug]) }}"
                                        class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                                        @if($product->image)
                                            <img src="{{ $product->image_url }}" alt="{{ $product->title }}" class="w-full h-40 object-cover">
                                        @endif
                                        <div class="p-4">
                                            <h3 class="font-bold text-gray-900">{{ $product->title }}</h3>
                                            <span class="text-sm text-blue-600">{{ $product->category->name ?? '' }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Categories -->
                    @if($categories->count() > 0)
                        <div class="mb-12">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Kategoriler</h2>
                            <div class="flex flex-wrap gap-4">
                                @foreach($categories as $cat)
                                    <a href="{{ route('category', $cat->slug) }}"
                                        class="px-6 py-3 bg-blue-100 text-blue-700 rounded-xl hover:bg-blue-200 transition-colors">
                                        {{ $cat->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Blog Posts -->
                    @if($blogPosts->count() > 0)
                        <div class="mb-12">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Blog Yazıları</h2>
                            <div class="grid md:grid-cols-3 gap-6">
                                @foreach($blogPosts as $post)
                                    <a href="{{ route('blog.show', $post->slug) }}"
                                        class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                                        @if($post->image)
                                            <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-full h-40 object-cover">
                                        @endif
                                        <div class="p-4">
                                            <h3 class="font-bold text-gray-900">{{ $post->title }}</h3>
                                            <span class="text-sm text-gray-500">{{ $post->published_at?->format('d.m.Y') }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Projects -->
                    @if($projects->count() > 0)
                        <div class="mb-12">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Referanslar</h2>
                            <div class="grid md:grid-cols-3 gap-6">
                                @foreach($projects as $project)
                                    <a href="{{ route('project.show', $project->slug) }}"
                                        class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                                        @if($project->image)
                                            <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="w-full h-40 object-cover">
                                        @endif
                                        <div class="p-4">
                                            <h3 class="font-bold text-gray-900">{{ $project->title }}</h3>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                @endif
            @endif
        </div>
    </section>
@endsection