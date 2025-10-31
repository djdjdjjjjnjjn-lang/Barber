

<?php $__env->startSection('header', 'Kelola Capster'); ?>

<?php $__env->startSection('content'); ?>
    <div class="mb-4 text-right">
        <a href="<?php echo e(route('admin.capster.create')); ?>" class="inline-block rounded-md bg-amber-500 px-4 py-2 text-sm font-semibold text-stone-900 shadow-sm hover:bg-amber-400">
            + Tambah Capster Baru
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            <p><?php echo e(session('success')); ?></p>
        </div>
    <?php endif; ?>

    <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
        <table class="min-w-full">
            <thead class="bg-stone-800 text-white">
                <tr>
                    <th class="py-3 px-6 text-left uppercase font-semibold text-sm">Foto</th>
                    <th class="py-3 px-6 text-left uppercase font-semibold text-sm">Nama</th>
                    <th class="py-3 px-6 text-left uppercase font-semibold text-sm">Deskripsi</th>
                    <th class="py-3 px-6 text-center uppercase font-semibold text-sm">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <?php $__empty_1 = true; $__currentLoopData = $capsters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $capster): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-b border-gray-200 hover:bg-stone-100">
                        <td class="py-3 px-6">
                            <?php if($capster->foto): ?>
                                <img src="<?php echo e(asset('storage/' . $capster->foto)); ?>" alt="Foto <?php echo e($capster->nama); ?>" class="h-12 w-12 rounded-full object-cover">
                            <?php else: ?>
                                <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($capster->nama)); ?>&color=FFFFFF&background=292524" alt="Avatar <?php echo e($capster->nama); ?>" class="h-12 w-12 rounded-full">
                            <?php endif; ?>
                        </td>
                        <td class="py-3 px-6 font-medium"><?php echo e($capster->nama); ?></td>
                        <td class="py-3 px-6"><?php echo e($capster->deskripsi); ?></td>
                        <td class="py-3 px-6 text-center">
                            <a href="<?php echo e(route('admin.capster.edit', $capster->id)); ?>" class="text-indigo-600 hover:text-indigo-900 font-semibold">Edit</a>
                            <form action="<?php echo e(route('admin.capster.destroy', $capster->id)); ?>" method="POST" class="inline-block ml-4">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-red-600 hover:text-red-900 font-semibold" onclick="return confirm('Yakin ingin menghapus capster ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="text-center py-6 text-gray-500">Belum ada data capster.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\barber\resources\views/admin/capster/index.blade.php ENDPATH**/ ?>