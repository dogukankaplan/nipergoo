@extends('layouts.app')

@section('title', 'Teklif Al')
@section('description', 'NiPergo\'dan ücretsiz teklif alın - Pergola, tente, cam balkon sistemleri')

@section('content')
    <!-- Hero -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4" data-aos="fade-up">Ücretsiz Teklif Alın</h1>
            <p class="text-blue-100 text-lg" data-aos="fade-up" data-aos-delay="100">Projeniz için detaylı teklif
                hazırlayalım</p>
        </div>
    </section>

    <!-- Quote Form -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto">
                @if(session('success'))
                    <div class="mb-8 p-6 bg-green-100 border border-green-200 text-green-700 rounded-2xl" data-aos="fade-up">
                        <div class="flex items-center">
                            <span class="text-3xl mr-4">✅</span>
                            <div>
                                <h3 class="font-bold">Teklif Talebiniz Alındı!</h3>
                                <p>{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="bg-white rounded-2xl shadow-xl p-8" data-aos="fade-up">
                    <form action="{{ route('quote.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Personal Info -->
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Ad Soyad *</label>
                                <input type="text" name="name" value="{{ old('name') }}" required
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none @error('name') border-red-500 @enderror">
                                @error('name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Firma Adı</label>
                                <input type="text" name="company" value="{{ old('company') }}"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">E-posta *</label>
                                <input type="email" name="email" value="{{ old('email') }}" required
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none @error('email') border-red-500 @enderror">
                                @error('email')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Telefon</label>
                                <input type="tel" name="phone" value="{{ old('phone') }}"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">
                            </div>
                        </div>

                        <!-- Product Selection -->
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                                <select name="category_id"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 outline-none">
                                    <option value="">Seçiniz...</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Ürün</label>
                                <select name="product_id"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 outline-none">
                                    <option value="">Seçiniz...</option>
                                    @foreach($products as $prod)
                                        <option value="{{ $prod->id }}" {{ old('product_id') == $prod->id ? 'selected' : '' }}>
                                            {{ $prod->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Project Details -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Proje Detayları</label>
                            <textarea name="project_details" rows="4"
                                placeholder="Projeniz hakkında detaylı bilgi verin (ölçüler, konum, özel istekler vb.)"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">{{ old('project_details') }}</textarea>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Bütçe Aralığı</label>
                                <select name="budget_range"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 outline-none">
                                    <option value="">Seçiniz...</option>
                                    <option value="0-50000" {{ old('budget_range') == '0-50000' ? 'selected' : '' }}>0 -
                                        50.000 TL</option>
                                    <option value="50000-100000" {{ old('budget_range') == '50000-100000' ? 'selected' : '' }}>50.000 - 100.000 TL</option>
                                    <option value="100000-250000" {{ old('budget_range') == '100000-250000' ? 'selected' : '' }}>100.000 - 250.000 TL</option>
                                    <option value="250000+" {{ old('budget_range') == '250000+' ? 'selected' : '' }}>250.000
                                        TL ve üzeri</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Zamanlama</label>
                                <select name="timeline"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 outline-none">
                                    <option value="">Seçiniz...</option>
                                    <option value="hemen" {{ old('timeline') == 'hemen' ? 'selected' : '' }}>Hemen Başlamak
                                        İstiyorum</option>
                                    <option value="1-ay" {{ old('timeline') == '1-ay' ? 'selected' : '' }}>1 Ay İçinde
                                    </option>
                                    <option value="3-ay" {{ old('timeline') == '3-ay' ? 'selected' : '' }}>3 Ay İçinde
                                    </option>
                                    <option value="arastirma" {{ old('timeline') == 'arastirma' ? 'selected' : '' }}>Sadece
                                        Araştırıyorum</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Ek Mesaj</label>
                            <textarea name="message" rows="3" placeholder="Eklemek istediğiniz başka bilgiler..."
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none">{{ old('message') }}</textarea>
                        </div>

                        <button type="submit"
                            class="w-full px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all shadow-lg">
                            Teklif Talebi Gönder
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection