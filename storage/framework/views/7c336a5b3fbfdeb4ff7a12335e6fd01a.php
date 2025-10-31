

<?php $__env->startSection('content'); ?>
    
    <div class="bg-white py-16 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 items-center gap-x-16 gap-y-16 lg:grid-cols-2">
                
                <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg bg-stone-100">
                    <img src="<?php echo e(asset('images/gambar1.jpg')); ?>" alt="Tampak depan H2O Barbershop" class="h-full w-full object-cover object-center">
                </div>

                
                <div class="text-center lg:text-left">
                    <h2 class="text-3xl font-bold tracking-tight text-stone-900 sm:text-4xl">
                        <span class="block text-amber-500">Cerita Kami</span>
                        Di Balik Gunting & Sisir.
                    </h2>
                    <p class="mt-6 text-lg leading-8 text-stone-700">
                        Berawal dari sebuah hasrat untuk melestarikan seni pangkas rambut klasik, Barbershop Keren didirikan. Kami percaya bahwa potong rambut bukan hanya soal mengubah gaya, tapi juga tentang memberikan momen relaksasi dan kepercayaan diri.
                    </p>
                    <p class="mt-4 text-lg leading-8 text-stone-700">
                        Setiap guntingan, setiap sapuan pisau cukur, kami lakukan dengan presisi dan dedikasi, memastikan Anda tidak hanya mendapatkan potongan rambut terbaik, tetapi juga pengalaman yang tak terlupakan.
                    </p>
                </div>
            </div>
        </div>
    </div>

    
    <div class="bg-stone-100 py-16 sm:py-24">
        <div class="mx-auto max-w-7xl px-6 text-center lg:px-8">
            <div class="mx-auto max-w-2xl">
                <h2 class="text-3xl font-bold tracking-tight text-stone-900 sm:text-4xl">Temui Tim Profesional Kami</h2>
                <p class="mt-4 text-lg leading-8 text-stone-600">Para seniman di balik setiap karya rambut yang luar biasa.</p>
            </div>
            <ul role="list" class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                <?php $__empty_1 = true; $__currentLoopData = $capsters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $capster): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li>
                        <?php if($capster->foto): ?>
                            <img class="mx-auto h-56 w-56 rounded-full object-cover" src="<?php echo e(asset('storage/' . $capster->foto)); ?>" alt="Foto <?php echo e($capster->nama); ?>">
                        <?php else: ?>
                            <img class="mx-auto h-56 w-56 rounded-full object-cover" src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($capster->nama)); ?>&size=224&color=FFFFFF&background=292524" alt="Avatar <?php echo e($capster->nama); ?>">
                        <?php endif; ?>
                        <h3 class="mt-6 text-base font-semibold leading-7 tracking-tight text-stone-900"><?php echo e($capster->nama); ?></h3>
                        <p class="text-sm leading-6 text-stone-600"><?php echo e($capster->deskripsi); ?></p>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <li class="col-span-3">
                        <p class="text-center text-gray-500">Data tim capster akan segera kami perbarui.</p>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    
    <div class="bg-stone-800">
        <div class="mx-auto max-w-4xl px-6 py-16 text-center sm:px-6 sm:py-20 lg:px-8">
            <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">
                <span class="block">Rasakan Langsung Pelayanan Terbaik Kami.</span>
            </h2>
            <a href="<?php echo e(route('booking.create')); ?>" class="mt-8 inline-flex w-full items-center justify-center rounded-md border border-transparent bg-amber-500 px-5 py-3 text-base font-medium text-stone-900 hover:bg-amber-400 sm:w-auto">Booking Jadwalmu Sekarang</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\barber\resources\views/tentang.blade.php ENDPATH**/ ?>