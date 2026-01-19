@extends('layouts.app')

@section('title', setting('seo_title'))
@section('meta_description', setting('seo_description'))

@section('content')
    <!-- Hero Section -->
    <section
        class="relative min-h-[85vh] flex items-center overflow-hidden bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\" 60\"
                height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\"
                fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.4\"%3E%3Cpath d=\"M36
                34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6
                4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>

        <!-- Slider Content -->
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl">
                @if($sliders->count() > 0)
                    @php $slider = $sliders->first(); @endphp
                    <div class="animate-fade-in-up">
                        <span
                            class="inline-block px-4 py-2 bg-blue-500/20 text-blue-300 rounded-full text-sm font-medium mb-6 backdrop-blur-sm border border-blue-500/30">
                            İzmir Otomatik Pergola Sistemleri
                        </span>
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                            {{ $slider->title }}
                        </h1>
                        @if($slider->subtitle)
                            <p class="text-xl md:text-2xl text-blue-200 mb-4">{{ $slider->subtitle }}</p>
                        @endif
                        @if($slider->description)
                            <p class="text-lg text-gray-300 mb-8 max-w-2xl">{{ $slider->description }}</p>
                        @endif
                        <div class="flex flex-wrap gap-4">
                            @if($slider->button_url)
                                <a href="{{ $slider->button_url }}"
                                    class="px-8 py-4 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-semibold rounded-full hover:from-blue-600 hover:to-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1 inline-flex items-center">
                                    {{ $slider->button_text ?? 'İletişime Geç' }}
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                            @endif
                            <a href="#products"
                                class="px-8 py-4 bg-white/10 backdrop-blur-sm text-white font-semibold rounded-full hover:bg-white/20 transition-all duration-300 border border-white/30">
                                Ürünleri İncele
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Decorative Elements -->
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-white to-transparent"></div>
        <div class="absolute top-20 right-10 w-72 h-72 bg-blue-500/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-10 w-96 h-96 bg-blue-600/20 rounded-full blur-3xl"></div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white" id="features">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Neden Biz?</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2 mb-4">Neden Bizi Seçmelisiniz?</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Modern pergola sistemlerimiz ve uzman ekibimizle yaşam
                    alanlarınıza değer katıyoruz.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($features as $feature)
                    <div
                        class="group p-8 bg-gray-50 rounded-2xl hover:bg-gradient-to-br hover:from-blue-600 hover:to-blue-700 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl">
                        <div
                            class="w-14 h-14 bg-blue-100 group-hover:bg-white/20 rounded-xl flex items-center justify-center mb-6 transition-colors">
                            <svg class="w-7 h-7 text-blue-600 group-hover:text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 group-hover:text-white mb-3 transition-colors">
                            {{ $feature->title }}</h3>
                        <p class="text-gray-600 group-hover:text-blue-100 transition-colors">{{ $feature->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="py-20 bg-gray-50" id="products">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Ürünlerimiz</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2 mb-4">Pergola Sistemlerimiz</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">En kaliteli malzemeler ve modern tasarımla üretilen pergola
                    sistemlerimiz ile yaşam alanlarınızı dönüştürün.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($categories as $category)
                    <a href="{{ route('category', $category->slug) }}"
                        class="group relative overflow-hidden rounded-2xl bg-white shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                        <div class="aspect-[4/3] bg-gradient-to-br from-blue-600 to-blue-800 relative overflow-hidden">
                            @if($category->image)
                                <img src="{{ $category->image_url }}" alt="{{ $category->name }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-20 h-20 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-transparent to-transparent">
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                                {{ $category->name }}</h3>
                            <p class="text-gray-600 mb-4">{{ $category->description }}</p>
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

            @if($featuredProducts->count() > 0)
                <div class="mt-16">
                    <h3 class="text-2xl font-bold text-center text-gray-900 mb-8">Öne Çıkan Ürünler</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($featuredProducts as $product)
                            <a href="{{ route('product', [$product->category->slug, $product->slug]) }}"
                                class="group bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-100">
                                <h4 class="text-lg font-semibold text-gray-900 group-hover:text-blue-600 transition-colors mb-2">
                                    {{ $product->title }}</h4>
                                <p class="text-gray-600 text-sm mb-3">{{ $product->short_description }}</p>
                                <span class="text-blue-600 text-sm font-medium inline-flex items-center">
                                    Detay
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-gradient-to-r from-blue-600 to-blue-800">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="text-white">
                    <div class="text-4xl md:text-5xl font-bold mb-2">{{ setting('about_experience', '10+') }}</div>
                    <div class="text-blue-200">Yıllık Tecrübe</div>
                </div>
                <div class="text-white">
                    <div class="text-4xl md:text-5xl font-bold mb-2">{{ setting('about_projects', '10000+') }}</div>
                    <div class="text-blue-200">Tamamlanan Proje</div>
                </div>
                <div class="text-white">
                    <div class="text-4xl md:text-5xl font-bold mb-2">100%</div>
                    <div class="text-blue-200">Müşteri Memnuniyeti</div>
                </div>
                <div class="text-white">
                    <div class="text-4xl md:text-5xl font-bold mb-2">7/24</div>
                    <div class="text-blue-200">Teknik Destek</div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 bg-white" id="faq">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto">
                <div class="text-center mb-12">
                    <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">SSS</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Sıkça Sorulan Sorular</h2>
                </div>

                <div class="space-y-4">
                    @foreach($faqs as $index => $faq)
                        <div class="faq-item border border-gray-200 rounded-xl overflow-hidden">
                            <button
                                class="faq-toggle w-full px-6 py-5 text-left flex items-center justify-between bg-white hover:bg-gray-50 transition-colors">
                                <span class="font-semibold text-gray-900">{{ $faq->question }}</span>
                                <svg class="w-5 h-5 text-gray-500 transform transition-transform faq-icon" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="faq-content hidden px-6 pb-5">
                                <p class="text-gray-600">{{ $faq->answer }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    @if($latestPosts->count() > 0)
        <section class="py-20 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Blog</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Son Yazılar</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($latestPosts as $post)
                        <article
                            class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                            <div class="aspect-[16/10] overflow-hidden bg-gray-200">
                                @if($post->image)
                                    <img src="{{ $post->image_url }}" alt="{{ $post->title }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center">
                                        <svg class="w-12 h-12 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="p-6">
                                <time class="text-sm text-gray-500">{{ $post->formatted_date }}</time>
                                <h3 class="text-xl font-bold text-gray-900 mt-2 mb-3 group-hover:text-blue-600 transition-colors">
                                    <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                </h3>
                                <p class="text-gray-600 mb-4 line-clamp-2">{{ $post->excerpt }}</p>
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

                <div class="text-center mt-12">
                    <a href="{{ route('blog') }}"
                        class="inline-flex items-center px-8 py-3 bg-gray-900 text-white font-semibold rounded-full hover:bg-gray-800 transition-colors">
                        Tüm Yazıları Gör
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    @endif

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-br from-gray-900 via-blue-900 to-gray-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-blue-500 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-600 rounded-full blur-3xl"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                    Modern Pergola Sistemleri ile Yaşam Alanlarınızı Güzelleştirin
                </h2>
                <p class="text-xl text-blue-200 mb-8">
                    Bioklimatik pergola, motorlu pergola ve LED aydınlatmalı pergola sistemlerimizle mekanlarınıza değer
                    katın. Hemen iletişime geçin, size özel çözümler sunalım.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('contact') }}"
                        class="px-8 py-4 bg-white text-blue-900 font-semibold rounded-full hover:bg-blue-50 transition-all duration-300 shadow-xl hover:shadow-2xl hover:-translate-y-1 inline-flex items-center">
                        Ücretsiz Keşif
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                    <a href="tel:{{ setting('contact_phone') }}"
                        class="px-8 py-4 bg-transparent text-white font-semibold rounded-full border-2 border-white/30 hover:bg-white/10 transition-all duration-300 inline-flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        Hemen Ara
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // FAQ Toggle
        document.querySelectorAll('.faq-toggle').forEach(button => {
            button.addEventListener('click', () => {
                const item = button.closest('.faq-item');
                const content = item.querySelector('.faq-content');
                const icon = item.querySelector('.faq-icon');

                // Close other items
                document.querySelectorAll('.faq-item').forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.querySelector('.faq-content').classList.add('hidden');
                        otherItem.querySelector('.faq-icon').classList.remove('rotate-180');
                    }
                });

                // Toggle current item
                content.classList.toggle('hidden');
                icon.classList.toggle('rotate-180');
            });
        });
    </script>
@endpush