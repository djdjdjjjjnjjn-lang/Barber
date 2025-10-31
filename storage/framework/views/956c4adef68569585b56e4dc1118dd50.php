

<?php $__env->startSection('content'); ?>
<div class="bg-white py-12">
    <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="mt-1 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Konfirmasi & Pembayaran</h1>
            <p class="mx-auto mt-5 max-w-xl text-xl text-gray-500">
                Booking Anda sudah hampir selesai! Silakan lakukan pembayaran untuk mengkonfirmasi.
            </p>
        </div>

        <div class="mt-10 bg-gray-50 p-8 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-gray-900">Detail Booking Anda:</h3>
            <dl class="mt-4 space-y-4">
                <div class="flex justify-between">
                    <dt class="text-sm text-gray-600">Nama Pelanggan</dt>
                    <dd class="text-sm font-medium text-gray-900"><?php echo e($booking->nama_pelanggan); ?></dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-sm text-gray-600">Nomor HP</dt>
                    <dd class="text-sm font-medium text-gray-900"><?php echo e($booking->no_hp_pelanggan); ?></dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-sm text-gray-600">Layanan</dt>
                    <dd class="text-sm font-medium text-gray-900"><?php echo e($booking->layanan->nama); ?></dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-sm text-gray-600">Capster</dt>
                    <dd class="text-sm font-medium text-gray-900"><?php echo e($booking->capster->nama); ?></dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-sm text-gray-600">Jadwal</dt>
                    <dd class="text-sm font-medium text-gray-900"><?php echo e(\Carbon\Carbon::parse($booking->tanggal_booking)->format('d F Y')); ?>, Pukul <?php echo e(\Carbon\Carbon::parse($booking->jam_booking)->format('H:i')); ?></dd>
                </div>
                <div class="flex justify-between border-t border-gray-200 pt-4">
                    <dt class="text-base font-semibold text-gray-900">Total Pembayaran</dt>
                    <dd class="text-base font-semibold text-gray-900">Rp <?php echo e(number_format($booking->total_harga)); ?></dd>
                </div>
            </dl>

            <div class="mt-8 text-center">
                <h4 class="text-md font-medium text-gray-700">Scan QRIS di bawah ini untuk membayar:</h4>
                
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=ContohQRIS-Barbershop-Booking-<?php echo e($booking->id); ?>" alt="QRIS Pembayaran" class="mx-auto mt-4 border rounded-lg">
                <p class="mt-4 text-sm text-gray-500">Setelah membayar, booking Anda akan diproses oleh admin kami. Notifikasi akan dikirim melalui WhatsApp.</p>
                <a href="<?php echo e(route('home')); ?>" class="mt-6 inline-block w-full rounded-md bg-green-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-green-500">
                    Selesai & Kembali ke Halaman Utama
                </a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\barber\resources\views/booking/payment.blade.php ENDPATH**/ ?>