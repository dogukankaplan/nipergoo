@php
    $categories = \App\Models\Category::active()->parentOnly()->ordered()->get();
@endphp

<footer class="relative overflow-hidden">
    <!-- Gradient Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900"></div>
    
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-indigo-500/5 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>
    
    <!-- Main Footer Content -->
    <div class="relative container mx-auto px-4 lg:px-8 py-16 lg:py-20">
        
        <!-- Top Section: Logo + Newsletter -->
        <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-8 pb-12 border-b border-slate-700/50">
            <!-- Logo & Tagline -->
            <div class="max-w-md">
                <a href="{{ route('home') }}" class="group inline-flex items-center gap-1 mb-4">
                    @if(setting('site_logo'))
                        <img src="{{ asset('storage/' . setting('site_logo')) }}" alt="{{ setting('site_name') }}" class="h-10 transition-transform group-hover:scale-105">
                    @else
                        <span class="font-display font-black text-3xl text-white group-hover:drop-shadow-[0_0_15px_rgba(59,130,246,0.4)] transition-all">
                            {{ setting('site_name', 'NiPergo') }}<span class="bg-gradient-to-r from-blue-400 to-indigo-400 bg-clip-text text-transparent">.</span>
                        </span>
                    @endif
                </a>
                <p class="text-slate-400 text-sm leading-relaxed">
                    {{ setting('about_short', 'Alüminyum doğrama, pergola ve gölgelendirme sistemlerinde uzman çözümler. İzmir ve çevresinde kaliteli hizmet.') }}
                </p>
            </div>
            
            <!-- CTA Section -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                <a href="{{ route('contact') }}" class="group flex items-center gap-3 px-6 py-3 btn-premium text-white rounded-xl font-semibold text-sm">
                    <span>Ücretsiz Keşif</span>
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="tel:{{ setting('contact_phone', '+90 532 134 30 16') }}" class="flex items-center gap-3 px-6 py-3 bg-white/5 hover:bg-white/10 border border-white/10 rounded-xl text-white font-medium text-sm transition-all hover:scale-105">
                    <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    <span>{{ setting('contact_phone', '+90 532 134 30 16') }}</span>
                </a>
            </div>
        </div>
        
        <!-- Middle Section: Links Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 lg:gap-12 py-12">
            <!-- Quick Links -->
            <div>
                <h4 class="font-bold text-white mb-5 flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-gradient-to-br from-blue-400 to-indigo-500"></span>
                    Hızlı Bağlantılar
                </h4>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('home') }}" class="text-slate-400 hover:text-white text-sm transition-colors inline-flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-px bg-blue-400 transition-all"></span>
                            Anasayfa
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="text-slate-400 hover:text-white text-sm transition-colors inline-flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-px bg-blue-400 transition-all"></span>
                            Hakkımızda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blog') }}" class="text-slate-400 hover:text-white text-sm transition-colors inline-flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-px bg-blue-400 transition-all"></span>
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="text-slate-400 hover:text-white text-sm transition-colors inline-flex items-center gap-2 group">
                            <span class="w-0 group-hover:w-2 h-px bg-blue-400 transition-all"></span>
                            İletişim
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Services -->
            <div>
                <h4 class="font-bold text-white mb-5 flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-gradient-to-br from-purple-400 to-pink-500"></span>
                    Hizmetlerimiz
                </h4>
                <ul class="space-y-3">
                    @foreach($categories->take(5) as $category)
                        <li>
                            <a href="{{ route('category', $category->slug) }}" class="text-slate-400 hover:text-white text-sm transition-colors inline-flex items-center gap-2 group">
                                <span class="w-0 group-hover:w-2 h-px bg-purple-400 transition-all"></span>
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div>
                <h4 class="font-bold text-white mb-5 flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-gradient-to-br from-emerald-400 to-teal-500"></span>
                    İletişim
                </h4>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <span class="w-8 h-8 rounded-lg bg-gradient-to-br from-blue-500/20 to-indigo-500/20 flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </span>
                        <span class="text-slate-400 text-sm">{{ setting('contact_address', 'Barbaros Mahallesi 5301 Sokak No:6 Bornova-İzmir') }}</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="w-8 h-8 rounded-lg bg-gradient-to-br from-green-500/20 to-emerald-500/20 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </span>
                        <a href="tel:{{ setting('contact_phone') }}" class="text-slate-400 hover:text-white text-sm transition-colors">{{ setting('contact_phone', '+90 532 134 30 16') }}</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="w-8 h-8 rounded-lg bg-gradient-to-br from-purple-500/20 to-pink-500/20 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </span>
                        <a href="mailto:{{ setting('contact_email') }}" class="text-slate-400 hover:text-white text-sm transition-colors">{{ setting('contact_email', 'info@nipergo.com.tr') }}</a>
                    </li>
                </ul>
            </div>
            
            <!-- Working Hours -->
            <div>
                <h4 class="font-bold text-white mb-5 flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-gradient-to-br from-amber-400 to-orange-500"></span>
                    Çalışma Saatleri
                </h4>
                <div class="space-y-3">
                    <div class="flex items-center gap-3 p-3 rounded-xl bg-white/5 border border-white/5">
                        <span class="w-8 h-8 rounded-lg bg-gradient-to-br from-amber-500/20 to-orange-500/20 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </span>
                        <div>
                            <p class="text-white text-sm font-medium">Pazartesi - Cumartesi</p>
                            <p class="text-slate-400 text-xs">09:00 - 18:00</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-3 rounded-xl bg-red-500/5 border border-red-500/10">
                        <span class="w-8 h-8 rounded-lg bg-red-500/20 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </span>
                        <div>
                            <p class="text-white text-sm font-medium">Pazar</p>
                            <p class="text-slate-400 text-xs">Kapalı</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Social & Bottom Bar -->
        <div class="pt-8 border-t border-slate-700/50">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                <!-- Social Links -->
                <div class="flex items-center gap-3">
                    <span class="text-slate-500 text-sm mr-2">Bizi Takip Edin:</span>
                    @if(setting('social_facebook'))
                        <a href="{{ setting('social_facebook') }}" target="_blank" class="w-10 h-10 rounded-xl bg-white/5 hover:bg-blue-500/20 flex items-center justify-center text-slate-400 hover:text-blue-400 transition-all hover:scale-110 border border-white/5 hover:border-blue-500/30">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                    @endif
                    @if(setting('social_instagram'))
                        <a href="{{ setting('social_instagram') }}" target="_blank" class="w-10 h-10 rounded-xl bg-white/5 hover:bg-gradient-to-br hover:from-purple-500/20 hover:to-pink-500/20 flex items-center justify-center text-slate-400 hover:text-pink-400 transition-all hover:scale-110 border border-white/5 hover:border-pink-500/30">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                    @endif
                    @if(setting('social_youtube'))
                        <a href="{{ setting('social_youtube') }}" target="_blank" class="w-10 h-10 rounded-xl bg-white/5 hover:bg-red-500/20 flex items-center justify-center text-slate-400 hover:text-red-400 transition-all hover:scale-110 border border-white/5 hover:border-red-500/30">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                    @endif
                    @if(setting('social_linkedin'))
                        <a href="{{ setting('social_linkedin') }}" target="_blank" class="w-10 h-10 rounded-xl bg-white/5 hover:bg-blue-600/20 flex items-center justify-center text-slate-400 hover:text-blue-500 transition-all hover:scale-110 border border-white/5 hover:border-blue-600/30">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                    @endif
                </div>
                
                <!-- Copyright -->
                <div class="flex flex-col sm:flex-row items-center gap-4 text-slate-500 text-sm">
                    <span>© {{ date('Y') }} {{ setting('site_name', 'NiPergo') }}. Tüm hakları saklıdır.</span>
                    <span class="hidden sm:block">•</span>
                    <div class="flex items-center gap-1 text-slate-400">
                        <span>Made with</span>
                        <svg class="w-4 h-4 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/></svg>
                        <span>in İzmir</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Gradient line at top -->
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-blue-500/50 to-transparent"></div>
</footer>