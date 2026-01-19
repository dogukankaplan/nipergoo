
<?php $__env->startSection('title', 'Site Ayarları'); ?>
<?php $__env->startSection('content'); ?>
    <div class="max-w-4xl">
        <form action="<?php echo e(route('admin.settings.update')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>

            <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6 capitalize">
                        <?php echo e($group == 'general' ? 'Genel' : ($group == 'contact' ? 'İletişim' : ($group == 'social' ? 'Sosyal Medya' : ($group == 'seo' ? 'SEO' : ($group == 'about' ? 'Hakkımızda' : $group))))); ?>

                    </h3>
                    <div class="space-y-6">
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div>
                                <label
                                    class="block text-sm font-medium text-gray-700 mb-2"><?php echo e(str_replace('_', ' ', ucwords($setting->key))); ?></label>
                                <?php if($setting->type == 'image'): ?>
                                    <?php if($setting->value): ?><img src="<?php echo e(asset('storage/' . $setting->value)); ?>"
                                    class="w-32 h-20 object-contain rounded mb-2"><?php endif; ?>
                                    <input type="file" name="<?php echo e($setting->key); ?>" accept="image/*"
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none">
                                <?php elseif($setting->type == 'textarea'): ?>
                                    <textarea name="<?php echo e($setting->key); ?>" rows="3"
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none"><?php echo e($setting->value); ?></textarea>
                                <?php elseif($setting->type == 'boolean'): ?>
                                    <input type="checkbox" name="<?php echo e($setting->key); ?>" value="1" <?php echo e($setting->value ? 'checked' : ''); ?>

                                        class="w-5 h-5 text-blue-600 rounded">
                                <?php else: ?>
                                    <input type="text" name="<?php echo e($setting->key); ?>" value="<?php echo e($setting->value); ?>"
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none">
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <button type="submit"
                class="px-6 py-3 bg-blue-600 text-white font-medium rounded-xl hover:bg-blue-700">Kaydet</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\HUAWEI\Documents\GitHub\nipergo\resources\views/admin/settings/index.blade.php ENDPATH**/ ?>