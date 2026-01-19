@extends('layouts.app')

@section('title', $project->title)
@section('description', $project->description ?? 'NiPergo proje detayı')

@section('content')
    <!-- Hero -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 py-16">
        <div class="container mx-auto px-4">
            <nav class="text-blue-200 mb-4">
                <a href="{{ route('home') }}" class="hover:text-white">Anasayfa</a> /
                <a href="{{ route('projects') }}" class="hover:text-white">Referanslar</a> /
                <span class="text-white">{{ $project->title }}</span>
            </nav>
            <h1 class="text-3xl md:text-4xl font-bold text-white" data-aos="fade-up">{{ $project->title }}</h1>
        </div>
    </section>

    <!-- Project Detail -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- Main Image with Lightbox -->
                    <div class="relative rounded-2xl overflow-hidden mb-8" data-aos="fade-up">
                        <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="w-full cursor-pointer"
                            onclick="openLightbox(this.src)">
                    </div>

                    <!-- Gallery -->
                    @if($project->gallery && count($project->gallery_urls) > 0)
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8" data-aos="fade-up">
                            @foreach($project->gallery_urls as $img)
                                <img src="{{ $img }}" alt="Gallery"
                                    class="w-full h-24 object-cover rounded-lg cursor-pointer hover:opacity-80 transition-opacity"
                                    onclick="openLightbox(this.src)">
                            @endforeach
                        </div>
                    @endif

                    <!-- Description -->
                    @if($project->description)
                        <div class="prose max-w-none" data-aos="fade-up">
                            {!! nl2br(e($project->description)) !!}
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="bg-gray-50 rounded-2xl p-6 sticky top-24" data-aos="fade-left">
                        <h3 class="text-lg font-bold text-gray-900 mb-6">Proje Bilgileri</h3>

                        <div class="space-y-4">
                            @if($project->client)
                                <div class="flex items-center">
                                    <span
                                        class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">👤</span>
                                    <div>
                                        <span class="text-gray-500 text-sm">Müşteri</span>
                                        <p class="font-medium text-gray-900">{{ $project->client }}</p>
                                    </div>
                                </div>
                            @endif

                            @if($project->location)
                                <div class="flex items-center">
                                    <span
                                        class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">📍</span>
                                    <div>
                                        <span class="text-gray-500 text-sm">Konum</span>
                                        <p class="font-medium text-gray-900">{{ $project->location }}</p>
                                    </div>
                                </div>
                            @endif

                            @if($project->category)
                                <div class="flex items-center">
                                    <span
                                        class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">📁</span>
                                    <div>
                                        <span class="text-gray-500 text-sm">Kategori</span>
                                        <p class="font-medium text-gray-900">{{ $project->category->name }}</p>
                                    </div>
                                </div>
                            @endif

                            @if($project->completed_at)
                                <div class="flex items-center">
                                    <span
                                        class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">📅</span>
                                    <div>
                                        <span class="text-gray-500 text-sm">Tamamlanma</span>
                                        <p class="font-medium text-gray-900">{{ $project->completed_at->format('F Y') }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="mt-8">
                            <a href="{{ route('quote') }}"
                                class="block w-full px-6 py-3 bg-blue-600 text-white text-center font-semibold rounded-xl hover:bg-blue-700 transition-colors">
                                Benzer Proje İçin Teklif Al
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Projects -->
    @if($relatedProjects->count() > 0)
        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <h2 class="text-2xl font-bold text-gray-900 mb-8">Benzer Projeler</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($relatedProjects as $related)
                        <a href="{{ route('project.show', $related->slug) }}"
                            class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                            <img src="{{ $related->image_url }}" alt="{{ $related->title }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="font-bold text-gray-900">{{ $related->title }}</h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Lightbox -->
    <div id="lightbox" class="fixed inset-0 bg-black/90 z-50 hidden items-center justify-center p-4"
        onclick="closeLightbox()">
        <button class="absolute top-4 right-4 text-white text-4xl">&times;</button>
        <img id="lightbox-img" src="" alt="" class="max-w-full max-h-full rounded-lg">
    </div>

    @push('scripts')
        <script>
            function openLightbox(src) {
                document.getElementById('lightbox-img').src = src;
                document.getElementById('lightbox').classList.remove('hidden');
                document.getElementById('lightbox').classList.add('flex');
            }
            function closeLightbox() {
                document.getElementById('lightbox').classList.add('hidden');
                document.getElementById('lightbox').classList.remove('flex');
            }
        </script>
    @endpush
@endsection