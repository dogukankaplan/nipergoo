

<?php $__env->startSection('title', 'Arama: ' . $query); ?>

<?php $__env->startSection('content'); ?>
    <!-- Hero -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-3xl font-bold text-white mb-4">Arama Sonuçları</h1>
            <!-- Search Form -->
            <form action="<?php echo e(route('search')); ?>" method="GET" class="max-w-xl mx-auto">
                <div class="flex">
                    <input type="text" name="q" value="<?php echo e($query); ?>" placeholder="Ürün, kategori veya blog yazısı ara..."
                        class="flex-1 px-6 py-4 rounded-l-xl border-0 focus:ring-2 focus:ring-blue-300 outline-none">
                    <button type="submit"
                        class="px-8 py-4 bg-blue-700 text-white font-semibold rounded-r-xl hover:bg-blue-800 transition-colors">
                        Ara
                    </button>
                </div>
            </form>
        </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto px-4">
            <?php if(strlen($query) < 2): ?>
                <div class="text-center py-12">
                    <p class="text-gray-500">Arama yapmak için en az 2 karakter girin.</p>
                </div>
            <?php else: ?>

                <?php
                    $totalResults = $products->count() + $categories->count() + $blogPosts->count() + $projects->count();
                ?>

                <p class="text-gray-600 mb-8">"<strong><?php echo e($query); ?></strong>" için <?php echo e($totalResults); ?> sonuç bulundu.</p>

                <?php if($totalResults === 0): ?>
                    <div class="text-center py-12 bg-gray-50 rounded-2xl">
                        <p class="text-gray-500 mb-4">Aramanızla eşleşen sonuç bulunamadı.</p>
                        <a href="<?php echo e(route('home')); ?>" class="text-blue-600 hover:underline">Anasayfaya Dön</a>
                    </div>
                <?php else: ?>

                    <!-- Products -->
                    <?php if($products->count() > 0): ?>
                        <div class="mb-12">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Ürünler</h2>
                            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('product', [$product->category->slug ?? 'urunler', $product->slug])); ?>"
                                        class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                                        <?php if($product->image): ?>
                                            <img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->title); ?>" class="w-full h-40 object-cover">
                                        <?php endif; ?>
                                        <div class="p-4">
                                            <h3 class="font-bold text-gray-900"><?php echo e($product->title); ?></h3>
                                            <span class="text-sm text-blue-600"><?php echo e($product->category->name ?? ''); ?></span>
                                        </div>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Categories -->
                    <?php if($categories->count() > 0): ?>
                        <div class="mb-12">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Kategoriler</h2>
                            <div class="flex flex-wrap gap-4">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('category', $cat->slug)); ?>"
                                        class="px-6 py-3 bg-blue-100 text-blue-700 rounded-xl hover:bg-blue-200 transition-colors">
                                        <?php echo e($cat->name); ?>

                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Blog Posts -->
                    <?php if($blogPosts->count() > 0): ?>
                        <div class="mb-12">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Blog Yazıları</h2>
                            <div class="grid md:grid-cols-3 gap-6">
                                <?php $__currentLoopData = $blogPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('blog.show', $post->slug)); ?>"
                                        class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                                        <?php if($post->image): ?>
                                            <img src="<?php echo e($post->image_url); ?>" alt="<?php echo e($post->title); ?>" class="w-full h-40 object-cover">
                                        <?php endif; ?>
                                        <div class="p-4">
                                            <h3 class="font-bold text-gray-900"><?php echo e($post->title); ?></h3>
                                            <span class="text-sm text-gray-500"><?php echo e($post->published_at?->format('d.m.Y')); ?></span>
                                        </div>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Projects -->
                    <?php if($projects->count() > 0): ?>
                        <div class="mb-12">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Referanslar</h2>
                            <div class="grid md:grid-cols-3 gap-6">
                                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('project.show', $project->slug)); ?>"
                                        class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                                        <?php if($project->image): ?>
                                            <img src="<?php echo e($project->image_url); ?>" alt="<?php echo e($project->title); ?>" class="w-full h-40 object-cover">
                                        <?php endif; ?>
                                        <div class="p-4">
                                            <h3 class="font-bold text-gray-900"><?php echo e($project->title); ?></h3>
                                        </div>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HUAWEI\Documents\GitHub\nipergo\resources\views/pages/search.blade.php ENDPATH**/ ?>