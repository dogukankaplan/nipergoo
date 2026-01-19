@extends('layouts.app')

@section('title', 'Referanslarımız')
@section('description', 'NiPergo tamamlanmış proje referansları - Pergola, tente ve cam balkon sistemleri projeleri')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4" data-aos="fade-up">Referanslarımız</h1>
            <p class="text-blue-100 text-lg" data-aos="fade-up" data-aos-delay="100">Tamamladığımız Projeler</p>
        </div>
    </section>

    <!-- Projects Grid -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($projects as $project)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden group" data-aos="fade-up"
                        data-aos-delay="{{ $loop->index * 50 }}">
                        <div class="relative overflow-hidden aspect-video">
                            @if($project->image)
                                <img src="{{ $project->image_url }}" alt="{{ $project->title }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @endif
                            @if($project->is_featured)
                                <span class="absolute top-4 right-4 bg-yellow-500 text-white text-xs px-3 py-1 rounded-full">Öne
                                    Çıkan</span>
                            @endif
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                                <a href="{{ route('project.show', $project->slug) }}"
                                    class="text-white font-medium hover:underline">Detayları Gör →</a>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $project->title }}</h3>
                            @if($project->client || $project->location)
                                <div class="flex items-center text-gray-500 text-sm space-x-4 mb-3">
                                    @if($project->client)
                                        <span>{{ $project->client }}</span>
                                    @endif
                                    @if($project->location)
                                        <span>📍 {{ $project->location }}</span>
                                    @endif
                                </div>
                            @endif
                            @if($project->category)
                                <span
                                    class="inline-block px-3 py-1 bg-blue-100 text-blue-600 text-xs rounded-full">{{ $project->category->name }}</span>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12 text-gray-500">
                        Henüz proje eklenmemiş.
                    </div>
                @endforelse
            </div>

            <div class="mt-12">
                {{ $projects->links() }}
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-16 bg-blue-600">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Sizin Projeniz Bir Sonraki Olsun</h2>
            <p class="text-blue-100 mb-8">Bizimle iletişime geçin, ücretsiz keşif ve teklif alın.</p>
            <a href="{{ route('quote') }}"
                class="inline-block px-8 py-4 bg-white text-blue-600 font-semibold rounded-xl hover:bg-blue-50 transition-colors">
                Teklif Al
            </a>
        </div>
    </section>
@endsection