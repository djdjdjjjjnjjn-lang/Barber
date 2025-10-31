{{-- /resources/views/layouts/partials/navbar-public.blade.php --}}
<nav class="bg-stone-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="shrink-0">
                    <a href="{{ route('home') }}">
                        {{-- INI BAGIAN YANG DIPERBAIKI: Menggunakan asset() --}}
                        <img class="h-10 w-auto" src="{{ asset('images/logo.png') }}" alt="Logo H2O Barbershop">
                    </a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'bg-amber-500 text-stone-900' : 'text-stone-200 hover:bg-stone-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Home</a>
                        <a href="{{ route('layanan.public') }}" class="{{ request()->routeIs('layanan.public') ? 'bg-amber-500 text-stone-900' : 'text-gray-300 hover:bg-stone-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Layanan</a>
                        <a href="{{ route('tentang') }}" class="{{ request()->routeIs('tentang') ? 'bg-amber-500 text-stone-900' : 'text-gray-300 hover:bg-stone-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Tentang</a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="rounded-md bg-amber-500 px-3 py-2 text-sm font-semibold text-stone-900 shadow-sm hover:bg-amber-400">Dasbor Admin</a>
                    @else
                        <a href="{{ route('login') }}" class="text-stone-200 hover:bg-stone-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
