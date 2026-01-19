<!-- Premium Loading Screen -->
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 1500)" x-show="show"
    x-transition:leave="transition ease-in duration-500" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0" class="fixed inset-0 z-[100] flex items-center justify-center"
    style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);">
    <!-- Animated background particles -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-indigo-500/10 rounded-full blur-3xl animate-pulse"
            style="animation-delay: 0.5s;"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-purple-500/5 rounded-full blur-3xl animate-pulse"
            style="animation-delay: 1s;"></div>
    </div>

    <!-- Centered content -->
    <div class="relative flex flex-col items-center gap-8">
        <!-- Logo with animation -->
        <div class="relative">
            <!-- Glow effect -->
            <div class="absolute inset-0 blur-2xl opacity-50">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="NiPergo" class="h-16 lg:h-20 opacity-50">
            </div>

            <!-- Main logo -->
            <img src="<?php echo e(asset('images/logo.png')); ?>" alt="NiPergo" class="relative h-16 lg:h-20 animate-pulse">
        </div>

        <!-- Loading indicator -->
        <div class="flex flex-col items-center gap-4">
            <!-- Spinner -->
            <div class="relative w-12 h-12">
                <!-- Outer ring -->
                <div class="absolute inset-0 rounded-full border-2 border-slate-700"></div>
                <!-- Spinning gradient -->
                <div
                    class="absolute inset-0 rounded-full border-2 border-transparent border-t-blue-500 border-r-indigo-500 animate-spin">
                </div>
                <!-- Inner dot -->
                <div class="absolute inset-3 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 animate-pulse">
                </div>
            </div>

            <!-- Loading text -->
            <div class="flex items-center gap-1 text-slate-400 text-sm font-medium tracking-wider">
                <span>Yükleniyor</span>
                <span class="inline-flex">
                    <span class="animate-bounce" style="animation-delay: 0s;">.</span>
                    <span class="animate-bounce" style="animation-delay: 0.2s;">.</span>
                    <span class="animate-bounce" style="animation-delay: 0.4s;">.</span>
                </span>
            </div>
        </div>
    </div>

    <!-- Bottom gradient line -->
    <div
        class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-blue-500 to-transparent opacity-50">
    </div>
</div><?php /**PATH C:\Users\HUAWEI\Documents\GitHub\nipergo\resources\views/components/loading-screen.blade.php ENDPATH**/ ?>