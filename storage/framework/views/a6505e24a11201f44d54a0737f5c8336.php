

<?php $__env->startSection('header', 'Kelola Booking'); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            <p class="font-bold">Sukses!</p>
            <p><?php echo e(session('success')); ?></p>
        </div>
    <?php endif; ?>

    <?php if(session('whatsapp_url')): ?>
        <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-4" role="alert">
            <p class="font-bold">Kirim Notifikasi ke Pelanggan</p>
            <p>
                <a href="<?php echo e(session('whatsapp_url')); ?>" target="_blank" class="font-bold underline hover:text-blue-900">
                    Klik di sini untuk mengirim konfirmasi via WhatsApp →
                </a>
            </p>
        </div>
    <?php endif; ?>

    <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
        <table class="min-w-full">
            <thead class="bg-stone-800 text-white">
                <tr>
                    <th class="py-3 px-6 text-left uppercase font-semibold text-sm">Pelanggan</th>
                    <th class="py-3 px-6 text-left uppercase font-semibold text-sm">Layanan</th>
                    <th class="py-3 px-6 text-left uppercase font-semibold text-sm">Capster</th>
                    <th class="py-3 px-6 text-left uppercase font-semibold text-sm">Jadwal</th>
                    <th class="py-3 px-6 text-center uppercase font-semibold text-sm">Status</th>
                    <th class="py-3 px-6 text-center uppercase font-semibold text-sm">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <?php $__empty_1 = true; $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-b border-gray-200 hover:bg-stone-100">
                        <td class="py-4 px-6 align-middle">
                            <span class="font-medium"><?php echo e($booking->nama_pelanggan); ?></span>
                            <span class="text-xs text-gray-500 block"><?php echo e($booking->no_hp_pelanggan); ?></span>
                        </td>
                        <td class="py-4 px-6 align-middle"><?php echo e($booking->layanan->nama); ?></td>
                        <td class="py-4 px-6 align-middle"><?php echo e($booking->capster->nama); ?></td>
                        <td class="py-4 px-6 align-middle">
                            <?php echo e(\Carbon\Carbon::parse($booking->tanggal_booking)->isoFormat('dddd, D MMM Y')); ?>

                            <span class="text-xs text-gray-500 block"><?php echo e(\Carbon\Carbon::parse($booking->jam_booking)->format('H:i')); ?></span>
                        </td>
                        <td class="py-4 px-6 align-middle text-center">
                            <?php if($booking->status == 'pending'): ?>
                                <span class="bg-yellow-200 text-yellow-800 text-xs font-medium px-2.5 py-1 rounded-full">Pending</span>
                            <?php elseif($booking->status == 'confirmed'): ?>
                                <span class="bg-green-200 text-green-800 text-xs font-medium px-2.5 py-1 rounded-full">Confirmed</span>
                            <?php else: ?>
                                <span class="bg-red-200 text-red-800 text-xs font-medium px-2.5 py-1 rounded-full">Canceled</span>
                            <?php endif; ?>
                        </td>
                        <td class="py-4 px-6 align-middle text-center">
                            <?php if($booking->status == 'pending'): ?>
                                <div class="flex justify-center gap-x-4">
                                    <form action="<?php echo e(route('admin.bookings.confirm', $booking->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PATCH'); ?>
                                        <button type="submit" class="text-green-600 hover:text-green-900 font-semibold">Confirm</button>
                                    </form>
                                    <form action="<?php echo e(route('admin.bookings.cancel', $booking->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PATCH'); ?>
                                        <button type="submit" class="text-red-600 hover:text-red-900 font-semibold">Cancel</button>
                                    </form>
                                </div>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center py-6 text-gray-500">Belum ada data booking.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\barber\resources\views/admin/booking/index.blade.php ENDPATH**/ ?>