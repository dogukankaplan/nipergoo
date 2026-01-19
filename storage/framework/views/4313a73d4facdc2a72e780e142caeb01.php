<?php
    $categories = \App\Models\Category::active()->parentOnly()->ordered()->get();
?>

<header 
    x-data="{ 
        mobileMenuOpen: false, 
        searchOpen: false, 
        scrolled: false,
        mobileSubmenuOpen: null,
        isDark: document.documentElement.classList.contains('dark'),
        toggleMobileSubmenu(id) {
            this.mobileSubmenuOpen = this.mobileSubmenuOpen === id ? null : id;
        },
        toggleTheme() {
            toggleDarkMode();
            this.isDark = document.documentElement.classList.contains('dark');
        },
        init() {
            this.isDark = document.documentElement.classList.contains('dark');
            window.addEventListener('scroll', () => {
                this.scrolled = window.scrollY > 20;
            });
        }
    }" 
    class="fixed top-0 left-0 w-full z-50 font-sans"
>
    <!-- 1. PREMIUM TOP BAR -->
    <div 
        class="relative z-50 transition-all duration-500 ease-out overflow-hidden"
        :class="scrolled ? 'h-0 opacity-0' : 'h-9 opacity-100'"
    >
        <!-- Gradient background -->
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900"></div>
        
        <!-- Animated gradient border -->
        <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-blue-500 to-transparent opacity-50"></div>
        
        <div class="container mx-auto px-4 lg:px-8 h-full flex items-center justify-between relative">
            <!-- Left: Location & Hours -->
            <div class="hidden sm:flex items-center gap-6 text-slate-400 text-xs">
                <span class="flex items-center gap-2 group">
                    <span class="w-5 h-5 rounded-full bg-gradient-to-br from-blue-500/20 to-purple-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-3 h-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </span>
                    <span class="text-slate-300">İzmir, Türkiye</span>
                </span>
                <span class="hidden md:flex items-center gap-2 group">
                    <span class="w-5 h-5 rounded-full bg-gradient-to-br from-blue-500/20 to-purple-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-3 h-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </span>
                    <span class="text-slate-300">Pzt - Cmt: 09:00 - 19:00</span>
                </span>
            </div>
            
            <!-- Right: Actions -->
            <div class="flex items-center gap-4 ml-auto">
                <!-- Dark Mode Toggle -->
                <button @click="toggleTheme()" class="relative group p-1.5 rounded-full hover:bg-white/10 transition-all">
                    <span class="sr-only" x-text="isDark ? 'Aydınlık Mod' : 'Karanlık Mod'"></span>
                    <svg x-show="!isDark" class="w-4 h-4 text-slate-400 group-hover:text-yellow-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                    <svg x-show="isDark" class="w-4 h-4 text-yellow-400 group-hover:text-yellow-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </button>
                
                <!-- Divider -->
                <div class="w-px h-4 bg-gradient-to-b from-transparent via-slate-600 to-transparent"></div>
                
                <!-- Phone -->
                <a href="tel:<?php echo e(setting('contact_phone', '+90 532 134 30 16')); ?>" class="flex items-center gap-2 text-slate-300 hover:text-white transition-colors group">
                    <span class="w-5 h-5 rounded-full bg-gradient-to-br from-green-500/20 to-emerald-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                        <svg class="w-3 h-3 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </span>
                    <span class="text-xs font-medium tracking-wide"><?php echo e(setting('contact_phone', '+90 532 134 30 16')); ?></span>
                </a>
                
                <!-- Divider -->
                <div class="w-px h-4 bg-gradient-to-b from-transparent via-slate-600 to-transparent"></div>
                
                <!-- Social Links -->
                <div class="flex items-center gap-2">
                    <?php if(setting('facebook')): ?>
                        <a href="<?php echo e(setting('facebook')); ?>" target="_blank" class="w-7 h-7 rounded-full bg-white/5 hover:bg-blue-500/20 flex items-center justify-center text-slate-400 hover:text-blue-400 transition-all hover:scale-110">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                    <?php endif; ?>
                    <?php if(setting('instagram')): ?>
                        <a href="<?php echo e(setting('instagram')); ?>" target="_blank" class="w-7 h-7 rounded-full bg-white/5 hover:bg-gradient-to-br hover:from-purple-500/20 hover:to-pink-500/20 flex items-center justify-center text-slate-400 hover:text-pink-400 transition-all hover:scale-110">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. GLASSMORPHIC MAIN NAVBAR -->
    <nav 
        class="transition-all duration-500 ease-out"
        :class="scrolled 
            ? 'glass shadow-lg shadow-slate-900/5 dark:shadow-black/20' 
            : 'bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border-b border-slate-100 dark:border-slate-800'"
    >
        <!-- Animated gradient line at bottom -->
        <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-blue-500/50 to-transparent opacity-0 transition-opacity duration-300" :class="scrolled ? 'opacity-100' : 'opacity-0'"></div>
        
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex items-center justify-between transition-all duration-500" :class="scrolled ? 'h-16' : 'h-18 lg:h-20'">
                
                <!-- Logo with hover glow -->
                <a href="<?php echo e(route('home')); ?>" class="flex-shrink-0 group relative z-10">
                    <?php if(setting('site_logo')): ?>
                        <img src="<?php echo e(asset('storage/' . setting('site_logo'))); ?>" alt="<?php echo e(setting('site_name')); ?>" 
                             class="object-contain transition-all duration-500 group-hover:drop-shadow-[0_0_15px_rgba(59,130,246,0.4)]"
                             :class="scrolled ? 'h-9' : 'h-10 lg:h-12'"
                        >
                    <?php else: ?>
                        <span class="font-display font-black tracking-tight transition-all duration-500 group-hover:drop-shadow-[0_0_15px_rgba(59,130,246,0.4)]"
                              :class="scrolled 
                                  ? 'text-2xl text-slate-900 dark:text-white' 
                                  : 'text-2xl lg:text-3xl text-slate-900 dark:text-white'"
                        >
                            <?php echo e(setting('site_name', 'NiPergo')); ?><span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">.</span>
                        </span>
                    <?php endif; ?>
                </a>

                <!-- Desktop Navigation Links -->
                <div class="hidden lg:flex items-center gap-1">
                    <a href="<?php echo e(route('home')); ?>" 
                       class="nav-link-animated px-4 py-2.5 text-[13px] font-semibold tracking-wide rounded-lg transition-all hover:bg-slate-50/80 dark:hover:bg-slate-800/50 <?php echo e(request()->routeIs('home') ? 'text-blue-600 dark:text-blue-400 active' : 'text-slate-600 dark:text-slate-300'); ?>">
                        Anasayfa
                    </a>

                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                             <a href="<?php echo e(route('category', $category->slug)); ?>" 
                                class="nav-link-animated flex items-center gap-1.5 px-4 py-2.5 text-[13px] font-semibold tracking-wide rounded-lg transition-all hover:bg-slate-50/80 dark:hover:bg-slate-800/50 <?php echo e(request()->is('kategori/' . $category->slug . '*') ? 'text-blue-600 dark:text-blue-400 active' : 'text-slate-600 dark:text-slate-300'); ?>">
                                <?php echo e($category->name); ?>

                                <?php if($category->children->count() || $category->products->count()): ?>
                                    <svg class="w-3 h-3 transition-transform duration-300 group-hover:rotate-180 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                                <?php endif; ?>
                             </a>

                             <!-- PREMIUM DROPDOWN -->
                             <?php if($category->children->count() || $category->products->count()): ?>
                                <div 
                                    x-show="open" 
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                                    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                                    x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                                    class="absolute top-full left-1/2 -translate-x-1/2 pt-3 w-72 z-50"
                                    style="display: none;"
                                >
                                    <!-- Dropdown card -->
                                    <div class="glass rounded-2xl shadow-2xl shadow-slate-900/10 dark:shadow-black/30 overflow-hidden">
                                        <!-- Gradient accent line -->
                                        <div class="h-1 bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500"></div>
                                        
                                        <div class="p-2 max-h-[60vh] overflow-y-auto header-scrollbar">
                                            <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="<?php echo e(route('category', $child->slug)); ?>" 
                                                   class="dropdown-item flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 transition-all">
                                                    <span class="w-2 h-2 rounded-full bg-gradient-to-br from-blue-400 to-indigo-500 opacity-50"></span>
                                                    <span class="text-sm font-medium"><?php echo e($child->name); ?></span>
                                                </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($category->children->count() && $category->products->count()): ?>
                                                <div class="h-px bg-gradient-to-r from-transparent via-slate-200 dark:via-slate-700 to-transparent my-2"></div>
                                            <?php endif; ?>
                                            <?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="<?php echo e(route('product', [$category->slug, $product->slug])); ?>" 
                                                   class="dropdown-item flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 transition-all">
                                                    <span class="w-2 h-2 rounded-full bg-gradient-to-br from-purple-400 to-pink-500 opacity-50"></span>
                                                    <span class="text-sm font-medium"><?php echo e($product->title); ?></span>
                                                </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                             <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <a href="<?php echo e(route('blog')); ?>" 
                       class="nav-link-animated px-4 py-2.5 text-[13px] font-semibold tracking-wide rounded-lg transition-all hover:bg-slate-50/80 dark:hover:bg-slate-800/50 <?php echo e(request()->routeIs('blog') ? 'text-blue-600 dark:text-blue-400 active' : 'text-slate-600 dark:text-slate-300'); ?>">
                        Blog
                    </a>
                    <a href="<?php echo e(route('contact')); ?>" 
                       class="nav-link-animated px-4 py-2.5 text-[13px] font-semibold tracking-wide rounded-lg transition-all hover:bg-slate-50/80 dark:hover:bg-slate-800/50 <?php echo e(request()->routeIs('contact') ? 'text-blue-600 dark:text-blue-400 active' : 'text-slate-600 dark:text-slate-300'); ?>">
                        İletişim
                    </a>
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-3">
                    <!-- Search Button -->
                    <button @click="searchOpen = !searchOpen" 
                            class="hidden lg:flex w-10 h-10 items-center justify-center text-slate-400 hover:text-blue-600 dark:text-slate-400 hover:bg-slate-100/80 dark:hover:bg-slate-800/50 rounded-xl transition-all hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </button>

                    <!-- CTA Button -->
                    <a href="tel:<?php echo e(setting('contact_phone', '+90 532 134 30 16')); ?>" 
                       class="hidden lg:flex items-center gap-2 px-5 py-2.5 btn-premium text-white rounded-xl font-semibold text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span>Hemen Ara</span>
                    </a>

                    <!-- Mobile Menu Button -->
                    <button @click="mobileMenuOpen = true" 
                            class="lg:hidden w-11 h-11 flex items-center justify-center bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-800 dark:to-slate-700 rounded-xl text-slate-700 dark:text-white hover:shadow-lg transition-all hover:scale-105 border border-slate-200/50 dark:border-slate-700/50">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- PREMIUM FULL SCREEN SEARCH -->
    <div 
        x-show="searchOpen" 
        class="fixed inset-0 z-[60] flex items-center justify-center p-4"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-cloak
    >
        <!-- Backdrop with gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-white/95 via-slate-50/95 to-white/95 dark:from-slate-900/95 dark:via-slate-800/95 dark:to-slate-900/95 backdrop-blur-xl"></div>
        
        <div class="w-full max-w-4xl relative z-10" @click.outside="searchOpen = false">
            <!-- Close Button -->
            <button @click="searchOpen = false" 
                    class="absolute -top-20 right-0 w-14 h-14 flex items-center justify-center rounded-full bg-white/80 dark:bg-slate-800/80 text-slate-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 transition-all hover:scale-110 shadow-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            
            <!-- Search Form -->
            <form action="<?php echo e(route('search')); ?>" method="GET" class="relative">
                <div class="relative">
                    <input type="text" name="q" placeholder="Ne arıyorsunuz?" 
                           class="w-full bg-transparent border-0 border-b-2 border-slate-200 dark:border-slate-700 text-4xl md:text-5xl lg:text-6xl font-black text-slate-900 dark:text-white placeholder-slate-300 dark:placeholder-slate-600 focus:border-blue-500 focus:ring-0 px-0 py-6 text-center transition-all" 
                           autofocus>
                    <!-- Animated underline -->
                    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 transition-all duration-300 focus-within:w-full"></div>
                </div>
            </form>
            
            <!-- Search Suggestions -->
            <div class="mt-10 flex flex-wrap justify-center gap-3">
                <span class="text-xs font-bold uppercase tracking-widest text-slate-400">Popüler:</span>
                <a href="<?php echo e(route('home')); ?>" class="px-4 py-2 rounded-full bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 text-sm font-medium text-blue-600 dark:text-blue-400 hover:shadow-lg transition-all hover:scale-105">Pergola</a>
                <a href="<?php echo e(route('home')); ?>" class="px-4 py-2 rounded-full bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 text-sm font-medium text-purple-600 dark:text-purple-400 hover:shadow-lg transition-all hover:scale-105">Bioklimatik</a>
                <a href="<?php echo e(route('home')); ?>" class="px-4 py-2 rounded-full bg-gradient-to-r from-emerald-50 to-teal-50 dark:from-emerald-900/20 dark:to-teal-900/20 text-sm font-medium text-emerald-600 dark:text-emerald-400 hover:shadow-lg transition-all hover:scale-105">Kış Bahçesi</a>
            </div>
        </div>
    </div>

    <!-- PREMIUM MOBILE DRAWER -->
    <div x-show="mobileMenuOpen" class="fixed inset-0 z-[70] lg:hidden" x-cloak>
        <!-- Backdrop -->
        <div 
            class="absolute inset-0 bg-slate-900/70 backdrop-blur-md" 
            @click="mobileMenuOpen = false" 
            x-transition:enter="transition-opacity ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-in duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
        ></div>
        
        <!-- Drawer Panel -->
        <div 
            class="absolute inset-y-0 right-0 w-[85%] max-w-sm bg-white dark:bg-slate-900 shadow-2xl flex flex-col overflow-hidden"
            x-transition:enter="transition ease-out duration-400 transform"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-300 transform"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
        >
            <!-- Gradient accent line -->
            <div class="h-1 bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500"></div>
            
            <!-- Header with gradient background -->
            <div class="relative px-6 py-5 border-b border-slate-100 dark:border-slate-800">
                <div class="absolute inset-0 bg-gradient-to-br from-slate-50 to-white dark:from-slate-800 dark:to-slate-900"></div>
                <div class="relative flex items-center justify-between">
                    <span class="font-display font-black text-xl text-slate-900 dark:text-white flex items-center gap-0.5">
                        <?php echo e(setting('site_name', 'NiPergo')); ?>

                        <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent text-2xl">.</span>
                    </span>
                    <button @click="mobileMenuOpen = false" 
                            class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-500 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>

            <!-- Navigation Content -->
            <div class="flex-1 overflow-y-auto p-4 space-y-1">
                <a href="<?php echo e(route('home')); ?>" class="mobile-nav-item block px-4 py-3.5 rounded-xl text-base font-semibold text-slate-700 dark:text-slate-200 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 dark:hover:from-blue-900/20 dark:hover:to-indigo-900/20 hover:text-blue-600 dark:hover:text-blue-400 transition-all">
                    Anasayfa
                </a>
                
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mobile-nav-item rounded-xl overflow-hidden" style="animation-delay: <?php echo e(($index + 1) * 0.05); ?>s">
                        <button 
                            @click="toggleMobileSubmenu(<?php echo e($category->id); ?>)" 
                            class="w-full flex items-center justify-between px-4 py-3.5 text-base font-semibold text-slate-700 dark:text-slate-200 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 dark:hover:from-blue-900/20 dark:hover:to-indigo-900/20 hover:text-blue-600 dark:hover:text-blue-400 transition-all rounded-xl text-left"
                            :class="mobileSubmenuOpen === <?php echo e($category->id); ?> ? 'bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 text-blue-600 dark:text-blue-400' : ''"
                        >
                            <span><?php echo e($category->name); ?></span>
                            <?php if($category->children->count() || $category->products->count()): ?>
                                <svg class="w-4 h-4 transition-transform duration-300" :class="mobileSubmenuOpen === <?php echo e($category->id); ?> ? 'rotate-180 text-blue-500' : 'text-slate-400'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            <?php endif; ?>
                        </button>

                        <?php if($category->children->count() || $category->products->count()): ?>
                            <div x-show="mobileSubmenuOpen === <?php echo e($category->id); ?>" x-collapse class="pb-2 px-2">
                                <div class="space-y-1 pt-1">
                                    <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e(route('category', $child->slug)); ?>" 
                                           class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-all">
                                            <span class="w-1.5 h-1.5 rounded-full bg-gradient-to-br from-blue-400 to-indigo-500"></span>
                                            <?php echo e($child->name); ?>

                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e(route('product', [$category->slug, $product->slug])); ?>" 
                                           class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-white dark:hover:bg-slate-800 transition-all">
                                            <span class="w-1.5 h-1.5 rounded-full bg-gradient-to-br from-purple-400 to-pink-500"></span>
                                            <?php echo e($product->title); ?>

                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <a href="<?php echo e(route('blog')); ?>" class="mobile-nav-item block px-4 py-3.5 rounded-xl text-base font-semibold text-slate-700 dark:text-slate-200 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 dark:hover:from-blue-900/20 dark:hover:to-indigo-900/20 hover:text-blue-600 dark:hover:text-blue-400 transition-all" style="animation-delay: 0.3s">
                    Blog
                </a>
                <a href="<?php echo e(route('contact')); ?>" class="mobile-nav-item block px-4 py-3.5 rounded-xl text-base font-semibold text-slate-700 dark:text-slate-200 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 dark:hover:from-blue-900/20 dark:hover:to-indigo-900/20 hover:text-blue-600 dark:hover:text-blue-400 transition-all" style="animation-delay: 0.35s">
                    İletişim
                </a>
            </div>

            <!-- Footer Actions -->
            <div class="p-4 border-t border-slate-100 dark:border-slate-800 space-y-3 bg-gradient-to-t from-slate-50 to-white dark:from-slate-800 dark:to-slate-900">
                <!-- Dark Mode Toggle -->
                <button @click="toggleTheme()" class="flex items-center justify-between w-full px-4 py-3.5 rounded-xl bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 font-medium shadow-sm border border-slate-100 dark:border-slate-700">
                    <span class="flex items-center gap-3">
                        <span class="w-8 h-8 rounded-lg bg-gradient-to-br from-slate-100 to-slate-200 dark:from-amber-500/20 dark:to-yellow-500/20 flex items-center justify-center">
                            <svg x-show="!isDark" class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                            <svg x-show="isDark" class="w-4 h-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        </span>
                        <span x-text="isDark ? 'Aydınlık Mod' : 'Karanlık Mod'"></span>
                    </span>
                    <div class="relative w-11 h-6 bg-slate-200 dark:bg-indigo-600 rounded-full transition-colors">
                        <div class="absolute w-5 h-5 bg-white rounded-full top-0.5 transition-all duration-300 shadow-sm" :class="isDark ? 'left-5' : 'left-0.5'"></div>
                    </div>
                </button>

                <!-- Call Button -->
                <a href="tel:<?php echo e(setting('contact_phone', '+90 532 134 30 16')); ?>" 
                   class="flex items-center justify-center gap-3 w-full py-4 btn-premium text-white rounded-xl font-bold text-base">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    Hemen Ara
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Spacer for fixed header -->
<div class="h-[4.5rem] lg:h-[7.25rem]" :class="scrolled ? '' : ''"></div><?php /**PATH C:\Users\HUAWEI\Documents\GitHub\nipergo\resources\views/components/header.blade.php ENDPATH**/ ?>