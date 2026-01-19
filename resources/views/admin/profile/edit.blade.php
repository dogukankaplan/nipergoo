@extends('admin.layouts.app')
@section('title', 'Profil Ayarları')
@section('content')
    <div class="max-w-2xl space-y-6">
        <!-- Profile Info -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-6">Profil Bilgileri</h2>
            <form action="{{ route('admin.profile.update') }}" method="POST" class="space-y-6">@csrf @method('PUT')
                <div><label class="block text-sm font-medium text-gray-700 mb-2">Ad Soyad</label><input type="text"
                        name="name" value="{{ auth()->user()->name }}" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 outline-none"></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-2">E-posta</label><input type="email"
                        name="email" value="{{ auth()->user()->email }}" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 outline-none"></div>
                <button type="submit"
                    class="px-6 py-3 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700">Güncelle</button>
            </form>
        </div>

        <!-- Password Change -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-6">Şifre Değiştir</h2>
            <form action="{{ route('admin.profile.password') }}" method="POST" class="space-y-6">@csrf @method('PUT')
                <div><label class="block text-sm font-medium text-gray-700 mb-2">Mevcut Şifre</label><input type="password"
                        name="current_password" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 outline-none"></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-2">Yeni Şifre</label><input type="password"
                        name="password" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 outline-none"></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-2">Yeni Şifre (Tekrar)</label><input
                        type="password" name="password_confirmation" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 outline-none"></div>
                <button type="submit"
                    class="px-6 py-3 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700">Şifreyi
                    Değiştir</button>
            </form>
        </div>
    </div>
@endsection