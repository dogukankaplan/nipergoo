@extends('layouts.app')

@section('title', $page->meta_title ?? $page->title . ' | ' . setting('site_name'))
@section('meta_description', $page->meta_description ?? setting('seo_description'))

@section('content')
    <!-- Page Header -->
    <section class="py-20 bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500 rounded-full blur-3xl"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ $page->title ?? 'Hakkımızda' }}</h1>
                <nav class="text-blue-200">
                    <a href="{{ route('home') }}" class="hover:text-white">Anasayfa</a>
                    <span class="mx-2">/</span>
                    <span class="text-white">Hakkımızda</span>
                </nav>
            </div>
        </div>
    </section>

    <!-- About Content -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Text Content -->
                <div>
                    <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Biz Kimiz?</span>
                    <h2 class="text-3xl font-bold text-gray-900 mt-2 mb-6">{{ setting('about_experience', '10+') }} Yıllık
                        Tecrübe</h2>

                    <div class="prose prose-lg text-gray-600 max-w-none">
                        {!! $page->content ?? '<p>2010 yılından bu yana, modern pergola sistemleri konusunda uzmanlaşmış firmamız, yaşam alanlarınızı güzelleştirmek ve konforlu hale getirmek için çalışıyoruz.</p><p>Motorlu pergola, LED aydınlatmalı pergola ve özel tasarım pergola sistemlerimizle, en son teknoloji ve en kaliteli malzemeleri kullanarak müşterilerimize en iyi hizmeti sunmaktadır.</p>' !!}
                    </div>

                    <div class="mt-8">
                        <a href="{{ route('contact') }}"
                            class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-full hover:from-blue-700 hover:to-blue-800 transition-all duration-300 shadow-lg hover:shadow-xl">
                            Bize Ulaşın
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-blue-50 p-8 rounded-2xl text-center">
                        <div class="text-4xl font-bold text-blue-600 mb-2">{{ setting('about_experience', '10+') }}</div>
                        <div class="text-gray-600">Yıllık Tecrübe</div>
                    </div>
                    <div class="bg-blue-50 p-8 rounded-2xl text-center">
                        <div class="text-4xl font-bold text-blue-600 mb-2">{{ setting('about_projects', '10000+') }}</div>
                        <div class="text-gray-600">Tamamlanan Proje</div>
                    </div>
                    <div class="bg-blue-50 p-8 rounded-2xl text-center">
                        <div class="text-4xl font-bold text-blue-600 mb-2">100%</div>
                        <div class="text-gray-600">Memnuniyet</div>
                    </div>
                    <div class="bg-blue-50 p-8 rounded-2xl text-center">
                        <div class="text-4xl font-bold text-blue-600 mb-2">7/24</div>
                        <div class="text-gray-600">Destek</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Değerlerimiz</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">Bizi Farklı Kılan Değerler</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Kalite ve Güvenilirlik</h3>
                    <p class="text-gray-600">En kaliteli pergola malzemeleri ve güvenilir hizmet anlayışı ile çalışıyoruz.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Müşteri Memnuniyeti</h3>
                    <p class="text-gray-600">Müşteri odaklı yaklaşım ve memnuniyet garantisi ile hizmet veriyoruz.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Yenilikçilik</h3>
                    <p class="text-gray-600">Sürekli gelişim ve yenilikçi pergola çözümleri üretiyoruz.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Sürdürülebilirlik</h3>
                    <p class="text-gray-600">Çevre dostu ve sürdürülebilir pergola sistemleri tasarlıyoruz.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Profesyonellik</h3>
                    <p class="text-gray-600">Uzman ekip ve profesyonel pergola montaj hizmeti sunuyoruz.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Hızlı Teslimat</h3>
                    <p class="text-gray-600">Zamanında ve hızlı proje teslimi garantisi veriyoruz.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-blue-600 to-blue-800">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Projeniz İçin Bize Ulaşın</h2>
            <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                Ücretsiz keşif ve fiyat teklifi için hemen iletişime geçin. Size özel çözümler sunalım.
            </p>
            <a href="{{ route('contact') }}"
                class="inline-flex items-center px-8 py-4 bg-white text-blue-600 font-semibold rounded-full hover:bg-blue-50 transition-all duration-300 shadow-xl hover:shadow-2xl">
                İletişime Geç
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </section>
@endsection