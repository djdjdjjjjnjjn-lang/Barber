<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbershop Keren</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
    
    {{-- Memanggil komponen navbar publik --}}
    @include('layouts.partials.navbar-public')

    <main class="py-10">
        @yield('content')
    </main>

    {{-- Ini adalah footer --}}
    <footer class="bg-stone-800 text-stone-300">
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                {{-- Kolom 1: Logo & Deskripsi --}}
                <div>
                    <a href="{{ route('home') }}">
                        {{-- Ganti dengan path logo Anda yang berwarna terang/putih --}}
                        <img class="h-10 w-auto" src="images/logo.png" alt="Logo Barbershop Keren">
                    </a>
                    <p class="mt-4 text-sm leading-relaxed">
                        Barbershop H20 adalah tempat terbaik untuk mendapatkan potongan rambut premium dengan gaya terkini dan pelayanan profesional.
                    </p>
                </div>

                {{-- Kolom 2 & 3: Navigasi & Kontak --}}
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:col-span-2">
                    <div>
                        <h4 class="font-semibold text-white">Navigasi</h4>
                        <ul class="mt-4 space-y-2">
                            <li><a href="{{ route('home') }}" class="hover:text-amber-500 transition-colors">Home</a></li>
                            <li><a href="{{ route('layanan.public') }}" class="hover:text-amber-500 transition-colors">Layanan</a></li>
                            <li><a href="{{ route('tentang') }}" class="hover:text-amber-500 transition-colors">Tentang</a></li>
                            <li><a href="{{ route('booking.create') }}" class="hover:text-amber-500 transition-colors">Booking Online</a></li>
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

            {{-- Bagian Copyright --}}
            <div class="mt-12 border-t border-stone-700 pt-8">
                <p class="text-center text-sm">&copy; {{ date('Y') }} H20 Barbershop. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>
