@extends('layouts.app')

@section('title', 'Blog | ' . setting('site_name'))
@section('meta_description', 'Pergola, tente ve gölgelendirme sistemleri hakkında güncel bilgiler ve blog yazıları.')

@section('content')
    <!-- Page Header -->
    <section class="py-20 bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500 rounded-full blur-3xl"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Blog</h1>
                <p class="text-xl text-blue-200">Pergola ve gölgelendirme sistemleri hakkında güncel bilgiler</p>
            </div>
        </div>
    </section>

    <!-- Blog List -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            @if($posts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($posts as $post)
                        <article
                            class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                            <div class="aspect-[16/10] overflow-hidden bg-gray-200">
                                @if($post->image)
                                    <img src="{{ $post->image_url }}" alt="{{ $post->title }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="p-6">
                                <time class="text-sm text-gray-500">{{ $post->formatted_date }}</time>
                                <h2 class="text-xl font-bold text-gray-900 mt-2 mb-3 group-hover:text-blue-600 transition-colors">
                                    <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                </h2>
                                <p class="text-gray-600 mb-4 line-clamp-3">{{ $post->excerpt }}</p>
                                <a href="{{ route('blog.show', $post->slug) }}"
                                    class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-700">
                                    Devamını Oku
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="text-center py-20">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    <h3 class="text-xl text-gray-500">Henüz blog yazısı yok</h3>
                </div>
            @endif
        </div>
    </section>
@endsection