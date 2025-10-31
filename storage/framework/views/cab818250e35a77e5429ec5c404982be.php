<div class="flex grow flex-col gap-y-5 overflow-y-auto bg-stone-800 px-6 pb-4">
    <div class="flex h-16 shrink-0 items-center">
        <img class="h-10 w-auto" src="<?php echo e(asset('images/logo.png')); ?>" alt="Your Company">
    </div>
    <nav class="flex flex-1 flex-col">
        <ul role="list" class="flex flex-1 flex-col gap-y-7">
            <li>
                <ul role="list" class="-mx-2 space-y-1">
                    <li>
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="<?php echo e(request()->routeIs('admin.dashboard') ? 'bg-amber-500 text-stone-900' : 'text-stone-300 hover:text-white hover:bg-stone-700'); ?> group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h7.5" /></svg>
                            Dasbor
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('admin.layanan.index')); ?>" class="<?php echo e(request()->routeIs('admin.layanan.*') ? 'bg-amber-500 text-stone-900' : 'text-stone-300 hover:text-white hover:bg-stone-700'); ?> group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122a3 3 0 00-5.78 1.128 2.25 2.25 0 01-2.4 2.245 4.5 4.5 0 008.4-2.245c0-.399-.078-.78-.22-1.128zm0 0a15.998 15.998 0 003.388-1.62m-5.043-.025a15.998 15.998 0 013.388-1.62" /></svg>
                            Kelola Layanan
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('admin.capster.index')); ?>" class="<?php echo e(request()->routeIs('admin.capster.*') ? 'bg-amber-500 text-stone-900' : 'text-stone-300 hover:text-white hover:bg-stone-700'); ?> group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                            Kelola Capster
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('admin.bookings.index')); ?>" class="<?php echo e(request()->routeIs('admin.bookings.*') ? 'bg-amber-500 text-stone-900' : 'text-stone-300 hover:text-white hover:bg-stone-700'); ?> group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" /></svg>
                            Kelola Booking
                        </a>
                    </li>
                </ul>
            </li>
            <li class="mt-auto">
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();this.closest('form').submit();" class="group -mx-2 flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-stone-300 hover:bg-stone-700 hover:text-white">
                        <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" /></svg>
                        Log out
                    </a>
                </form>
            </li>
        </ul>
    </nav>
</div>
<?php /**PATH C:\laragon\www\barber\resources\views/layouts/partials/sidebar-content.blade.php ENDPATH**/ ?>