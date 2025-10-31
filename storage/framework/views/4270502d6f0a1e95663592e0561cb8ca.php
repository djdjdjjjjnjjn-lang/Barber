

<?php $__env->startSection('content'); ?>

<div class="bg-stone-100 py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-base font-semibold text-amber-500">Layanan Kami</h2>
            <p class="mt-1 text-4xl font-bold tracking-tight text-stone-900 sm:text-5xl">
                Semua yang Anda Butuhkan untuk Tampil Prima
            </p>
            <p class="mx-auto mt-5 max-w-xl text-xl text-stone-700">
                Kami menawarkan berbagai layanan premium untuk memenuhi semua kebutuhan perawatan rambut dan penampilan Anda.
            </p>
        </div>

        
        <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            <?php $__empty_1 = true; $__currentLoopData = $layanans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="flex flex-col rounded-lg bg-white shadow-lg overflow-hidden transition-transform duration-300 hover:-translate-y-2">
                <div class="flex-shrink-0">
                    <?php if($layanan->gambar): ?>
                        <img class="h-56 w-full object-cover" src="<?php echo e(asset('storage/' . $layanan->gambar)); ?>" alt="Gambar <?php echo e($layanan->nama); ?>">
                    <?php else: ?>
                        <img class="h-56 w-full object-cover" src="https://images.unsplash.com/photo-1559599238-308793207162?q=80&w=2070" alt="Gambar placeholder">
                    <?php endif; ?>
                </div>
                <div class="flex flex-1 flex-col justify-between p-6">
                    <div class="flex-1">
                        <p class="text-xl font-semibold text-stone-900"><?php echo e($layanan->nama); ?></p>
                        <p class="mt-3 text-base text-stone-600"><?php echo e($layanan->deskripsi); ?></p>
                    </div>
                    <div class="mt-6 flex items-center justify-between">
                        <p class="text-lg font-medium text-stone-800">
                            Rp <?php echo e(number_format($layanan->harga, 0, ',', '.')); ?>

                        </p>
                        <a href="<?php echo e(route('booking.create')); ?>" class="rounded-md bg-stone-800 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-stone-700 transition-colors">Booking</a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="col-span-3 text-center text-lg text-stone-500">Saat ini belum ada layanan yang tersedia.</p>
            <?php endif; ?>
        </div>
    </div>
</div>


<div class="bg-white py-16 sm:py-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:text-center">
            <h2 class="text-base font-semibold leading-7 text-amber-500">Kualitas Terjamin</h2>
            <p class="mt-2 text-3xl font-bold tracking-tight text-stone-900 sm:text-4xl">Pengalaman Terbaik untuk Penampilan Anda</p>
            <p class="mt-6 text-lg leading-8 text-stone-600">Kami tidak hanya memotong rambut, kami menciptakan karya seni yang sesuai dengan kepribadian Anda.</p>
        </div>
        <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
            <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
                
                <div class="relative pl-16">
                    <dt class="text-base font-semibold leading-7 text-stone-900">
                        <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-amber-500">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        Capster Profesional
                    </dt>
                    <dd class="mt-2 text-base leading-7 text-stone-600">Tim kami terdiri dari para barber berpengalaman yang ahli dalam berbagai gaya rambut, dari klasik hingga tren terkini.</dd>
                </div>
                
                <div class="relative pl-16">
                    <dt class="text-base font-semibold leading-7 text-stone-900">
                        <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-amber-500">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" /></svg>
                        </div>
                        Produk Berkualitas
                    </dt>
                    <dd class="mt-2 text-base leading-7 text-stone-600">Kami hanya menggunakan produk perawatan rambut premium yang aman untuk rambut dan kulit kepala Anda.</dd>
                </div>
                
                <div class="relative pl-16">
                    <dt class="text-base font-semibold leading-7 text-stone-900">
                        <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-amber-500">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.17 48.17 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" /></svg>
                        </div>
                        Suasana Nyaman
                    </dt>
                    <dd class="mt-2 text-base leading-7 text-stone-600">Nikmati pengalaman potong rambut yang santai di tempat kami yang didesain khusus untuk kenyamanan Anda.</dd>
                </div>
                
                <div class="relative pl-16">
                    <dt class="text-base font-semibold leading-7 text-stone-900">
                        <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-amber-500">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" /></svg>
                        </div>
                        Booking Mudah
                    </dt>
                    <dd class="mt-2 text-base leading-7 text-stone-600">Amankan jadwalmu dengan mudah melalui sistem booking online kami yang cepat dan praktis.</dd>
                </div>
            </dl>
        </div>
    </div>
</div>


<div class="bg-stone-800">
    <div class="mx-auto max-w-4xl px-6 py-16 text-center sm:px-6 sm:py-20 lg:px-8">
        <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">
            <span class="block">Siap untuk Tampil Beda?</span>
            <span class="block text-amber-500">Jadwalkan Potonganmu Sekarang.</span>
        </h2>
        <a href="<?php echo e(route('booking.create')); ?>" class="mt-8 inline-flex w-full items-center justify-center rounded-md border border-transparent bg-white px-5 py-3 text-base font-medium text-stone-900 hover:bg-stone-50 sm:w-auto">Booking Sekarang</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\barber\resources\views/layanan-public.blade.php ENDPATH**/ ?>