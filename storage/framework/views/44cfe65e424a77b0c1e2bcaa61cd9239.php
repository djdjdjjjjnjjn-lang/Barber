

<?php $__env->startSection('header', 'Tambah Layanan Baru'); ?>

<?php $__env->startSection('content'); ?>
    <?php if($errors->any()): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Oops! Ada yang salah.</strong>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    
    <form action="<?php echo e(route('admin.layanan.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="space-y-6">
            <div>
                <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama Layanan</label>
                <div class="mt-2"><input type="text" name="nama" id="nama" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300" required value="<?php echo e(old('nama')); ?>"></div>
            </div>
            <div>
                <label for="deskripsi" class="block text-sm font-medium leading-6 text-gray-900">Deskripsi</label>
                <div class="mt-2"><textarea name="deskripsi" id="deskripsi" rows="4" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300" required><?php echo e(old('deskripsi')); ?></textarea></div>
            </div>
            <div>
                <label for="harga" class="block text-sm font-medium leading-6 text-gray-900">Harga</label>
                <div class="mt-2"><input type="number" name="harga" id="harga" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300" required value="<?php echo e(old('harga')); ?>"></div>
            </div>
            
            <div>
                <label for="gambar" class="block text-sm font-medium leading-6 text-gray-900">Gambar Layanan</label>
                <div class="mt-2">
                    <input type="file" name="gambar" id="gambar" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                </div>
            </div>
        </div>

        <div class="mt-8 flex gap-x-4">
            <button type="submit" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Simpan Layanan</button>
            <a href="<?php echo e(route('admin.layanan.index')); ?>" class="rounded-md bg-gray-200 px-3.5 py-2.5 text-center text-sm font-semibold text-gray-800 shadow-sm hover:bg-gray-300">Batal</a>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\barber\resources\views/admin/layanan/create.blade.php ENDPATH**/ ?>