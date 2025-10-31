<!DOCTYPE html>
{{-- Menambahkan class="light" untuk memaksa tema terang --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin Login - {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    {{-- Latar belakang diubah menjadi stone-200 agar lebih hangat --}}
    <body class="font-sans text-gray-900 antialiased bg-stone-200">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div>
                <a href="/">
                    {{-- Menggunakan logo Anda, dibuat lebih besar dan berbentuk lingkaran --}}
                    <img class="h-28 w-28 rounded-full" src="{{ asset('images/logo.png') }}" alt="Logo H2O Barbershop">
                </a>
            </div>

            {{-- Kotak form dengan latar putih dan bayangan --}}
            <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white shadow-xl overflow-hidden sm:rounded-lg">
                <h2 class="text-center text-2xl font-bold text-stone-800 mb-6">
                    Admin Panel Login
                </h2>
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
