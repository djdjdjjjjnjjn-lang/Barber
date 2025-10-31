<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbershop Keren</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-gray-100 text-gray-800">
    
    
    <?php echo $__env->make('layouts.partials.navbar-public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="py-10">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    
    <footer class="bg-stone-800 text-stone-300">
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                
                <div>
                    <a href="<?php echo e(route('home')); ?>">
                        
                        <img class="h-10 w-auto" src="images/logo.png" alt="Logo Barbershop Keren">
                    </a>
                    <p class="mt-4 text-sm leading-relaxed">
                        Barbershop H20 adalah tempat terbaik untuk mendapatkan potongan rambut premium dengan gaya terkini dan pelayanan profesional.
                    </p>
                </div>

                
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:col-span-2">
                    <div>
                        <h4 class="font-semibold text-white">Navigasi</h4>
                        <ul class="mt-4 space-y-2">
                            <li><a href="<?php echo e(route('home')); ?>" class="hover:text-amber-500 transition-colors">Home</a></li>
                            <li><a href="<?php echo e(route('layanan.public')); ?>" class="hover:text-amber-500 transition-colors">Layanan</a></li>
                            <li><a href="<?php echo e(route('tentang')); ?>" class="hover:text-amber-500 transition-colors">Tentang</a></li>
                            <li><a href="<?php echo e(route('booking.create')); ?>" class="hover:text-amber-500 transition-colors">Booking Online</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white">Alamat Kami</h4>
                        <ul class="mt-4 space-y-2">
                            <li>Sungai Bangek</li>
                            <li>Balai Gadang, Koto Tangah</li>
                            <li>Koda Padang, Sumatera Barat</li>
                            <li class="pt-2"> (tlpn) 0831-8106-5439 </li>
                        </ul>
                    </div>
                </div>
            </div>

            
            <div class="mt-12 border-t border-stone-700 pt-8">
                <p class="text-center text-sm">&copy; <?php echo e(date('Y')); ?> H20 Barbershop. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>
<?php /**PATH C:\laragon\www\barber\resources\views/layouts/main.blade.php ENDPATH**/ ?>