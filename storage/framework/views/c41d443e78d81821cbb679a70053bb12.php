<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Admin Panel'); ?> | <?php echo e(setting('site_name', 'NiPergo')); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css']); ?>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body class="bg-gray-100 min-h-screen">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 min-h-screen fixed left-0 top-0">
            <div class="p-6 border-b border-gray-800">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-xl font-bold text-white">
                    <?php echo e(setting('site_name', 'NiPergo')); ?>

                </a>
                <p class="text-gray-500 text-sm mt-1">Admin Panel</p>
            </div>

            <nav class="p-4 space-y-1">
                <a href="<?php echo e(route('admin.dashboard')); ?>"
                    class="flex items-center px-4 py-3 rounded-lg <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white'); ?> transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                </a>

                <a href="<?php echo e(route('admin.sliders.index')); ?>"
                    class="flex items-center px-4 py-3 rounded-lg <?php echo e(request()->routeIs('admin.sliders.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white'); ?> transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Sliderlar
                </a>

                <a href="<?php echo e(route('admin.categories.index')); ?>"
                    class="flex items-center px-4 py-3 rounded-lg <?php echo e(request()->routeIs('admin.categories.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white'); ?> transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Kategoriler
                </a>

                <a href="<?php echo e(route('admin.products.index')); ?>"
                    class="flex items-center px-4 py-3 rounded-lg <?php echo e(request()->routeIs('admin.products.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white'); ?> transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    Ürünler
                </a>

                <a href="<?php echo e(route('admin.features.index')); ?>"
                    class="flex items-center px-4 py-3 rounded-lg <?php echo e(request()->routeIs('admin.features.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white'); ?> transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Özellikler
                </a>

                <a href="<?php echo e(route('admin.faqs.index')); ?>"
                    class="flex items-center px-4 py-3 rounded-lg <?php echo e(request()->routeIs('admin.faqs.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white'); ?> transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    SSS
                </a>

                <a href="<?php echo e(route('admin.blog.index')); ?>"
                    class="flex items-center px-4 py-3 rounded-lg <?php echo e(request()->routeIs('admin.blog.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white'); ?> transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    Blog
                </a>

                <a href="<?php echo e(route('admin.pages.index')); ?>"
                    class="flex items-center px-4 py-3 rounded-lg <?php echo e(request()->routeIs('admin.pages.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white'); ?> transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Sayfalar
                </a>

                <a href="<?php echo e(route('admin.messages.index')); ?>"
                    class="flex items-center px-4 py-3 rounded-lg <?php echo e(request()->routeIs('admin.messages.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white'); ?> transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Mesajlar
                    <?php $unread = \App\Models\ContactMessage::unread()->count(); ?>
                    <?php if($unread > 0): ?>
                        <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full"><?php echo e($unread); ?></span>
                    <?php endif; ?>
                </a>

                <a href="<?php echo e(route('admin.settings.index')); ?>"
                    class="flex items-center px-4 py-3 rounded-lg <?php echo e(request()->routeIs('admin.settings.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white'); ?> transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Ayarlar
                </a>

                <div class="border-t border-gray-800 my-4"></div>

                <a href="<?php echo e(route('admin.testimonials.index')); ?>"
                    class="flex items-center px-4 py-3 rounded-lg <?php echo e(request()->routeIs('admin.testimonials.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white'); ?> transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                    Yorumlar
                </a>

                <a href="<?php echo e(route('admin.projects.index')); ?>"
                    class="flex items-center px-4 py-3 rounded-lg <?php echo e(request()->routeIs('admin.projects.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white'); ?> transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Projeler
                </a>

                <a href="<?php echo e(route('admin.quotes.index')); ?>"
                    class="flex items-center px-4 py-3 rounded-lg <?php echo e(request()->routeIs('admin.quotes.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white'); ?> transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Teklifler
                    <?php $unreadQuotes = \App\Models\QuoteRequest::unread()->count(); ?>
                    <?php if($unreadQuotes > 0): ?>
                        <span
                            class="ml-auto bg-orange-500 text-white text-xs px-2 py-1 rounded-full"><?php echo e($unreadQuotes); ?></span>
                    <?php endif; ?>
                </a>

                <a href="<?php echo e(route('admin.activity-logs.index')); ?>"
                    class="flex items-center px-4 py-3 rounded-lg <?php echo e(request()->routeIs('admin.activity-logs.*') ? 'bg-blue-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white'); ?> transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Aktivite Log
                </a>
            </nav>

            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-800">
                <a href="<?php echo e(route('home')); ?>" target="_blank"
                    class="flex items-center px-4 py-2 text-gray-400 hover:text-white transition-colors text-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                    Siteyi Görüntüle
                </a>
                <form action="<?php echo e(route('admin.logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit"
                        class="w-full flex items-center px-4 py-2 text-gray-400 hover:text-red-400 transition-colors text-sm mt-2">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Çıkış Yap
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="ml-64 flex-1 min-h-screen">
            <!-- Top Bar -->
            <header class="bg-white shadow-sm px-8 py-4 flex items-center justify-between">
                <h1 class="text-xl font-semibold text-gray-900"><?php echo $__env->yieldContent('title', 'Dashboard'); ?></h1>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600"><?php echo e(Auth::user()->name); ?></span>
                </div>
            </header>

            <!-- Content -->
            <div class="p-8">
                <?php if(session('success')): ?>
                    <div class="mb-6 p-4 bg-green-100 border border-green-200 text-green-700 rounded-xl">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <?php if($errors->any()): ?>
                    <div class="mb-6 p-4 bg-red-100 border border-red-200 text-red-700 rounded-xl">
                        <ul class="list-disc list-inside">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </main>
    </div>

    <script>
        // TinyMCE initialization
        tinymce.init({
            selector: '.tinymce',
            plugins: 'lists link image',
            toolbar: 'undo redo | bold italic | bullist numlist | link',
            menubar: false,
            height: 300
        });
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html><?php /**PATH C:\Users\HUAWEI\Documents\GitHub\nipergo\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>