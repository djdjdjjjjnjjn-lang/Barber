@extends('layouts.main')

@section('content')
    {{-- Awal Hero Section --}}
    <div class="bg-stone-100">
        <div class="mx-auto max-w-7xl px-4 py-16 text-center sm:px-6 sm:py-24 lg:px-8">
            
            <img class="mx-auto h-24 w-auto mb-8" src="images/logo.png" alt="Logo Barbershop Keren">

            <h1 class="text-4xl font-bold tracking-tight text-stone-900 sm:text-5xl">
                <span class="block">Gaya Rambut Terbaik.</span>
                <span class="block text-amber-500">Layanan Profesional.</span>
            </h1>

            <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-stone-700">
                Kami menyediakan layanan potong rambut premium dengan para barber berpengalaman untuk memastikan penampilan terbaikmu setiap saat.
            </p>

            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="{{ route('booking.create') }}" class="rounded-md bg-amber-500 px-3.5 py-2.5 text-sm font-semibold text-stone-900 shadow-sm hover:bg-amber-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-amber-500">
                    Booking Sekarang
                </a>
                <a href="{{ route('layanan.public') }}" class="text-sm font-semibold leading-6 text-stone-900">
                    Lihat Layanan <span aria-hidden="true">→</span>
                </a>
            </div>
        </div>
    </div>
    {{-- Akhir Hero Section --}}

    {{-- Awal Section Layanan Unggulan --}}
    {{-- Latar belakang diubah menjadi stone-100 agar menyatu --}}
    <div class="bg-stone-100 py-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base font-semibold text-amber-500">Layanan Unggulan</h2>
                <p class="mt-1 text-4xl font-bold tracking-tight text-stone-900 sm:text-5xl">
                    Perawatan Terbaik dari Kami
                </p>
            </div>
    
            <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($layanans as $layanan)
                {{-- Latar kartu diubah menjadi putih untuk kontras --}}
                <div class="flex flex-col rounded-lg bg-white shadow-lg overflow-hidden transition-transform duration-300 hover:-translate-y-2">
                    <div class="flex-shrink-0">
                        @if ($layanan->gambar)
                            <img class="h-48 w-full object-cover" src="{{ asset('storage/' . $layanan->gambar) }}" alt="Gambar {{ $layanan->nama }}">
                        @else
                            <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1559599238-308793207162?q=80&w=2070" alt="Gambar placeholder">
                        @endif
                    </div>
                    <div class="flex flex-1 flex-col justify-between p-6">
                        <div class="flex-1">
                            <p class="text-xl font-semibold text-stone-900">{{ $layanan->nama }}</p>
                            <p class="mt-3 text-base text-stone-700">{{ Str::limit($layanan->deskripsi, 100) }}</p>
                        </div>
                        <div class="mt-6 flex items-center justify-between">
                            <p class="text-lg font-medium text-stone-800">
                                Rp {{ number_format($layanan->harga, 0, ',', '.') }}
                            </p>
                            {{-- Tombol booking diubah agar konsisten dengan warna gelap utama --}}
                            <a href="{{ route('booking.create') }}" class="rounded-md bg-stone-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-stone-700">Booking</a>
                        </div>
                    </div>
                </div>
                @empty
                    <p class="col-span-3 text-center text-gray-500">Layanan unggulan akan segera ditampilkan.</p>
                @endforelse
            </div>
    
            <div class="mt-12 text-center">
                {{-- Tombol utama menggunakan warna aksen amber --}}
                <a href="{{ route('layanan.public') }}" class="rounded-md bg-amber-500 px-4 py-3 text-base font-semibold text-stone-900 shadow-sm hover:bg-amber-400">
                    Lihat Semua Layanan
                </a>
            </div>
        </div>
    </div>
    {{-- Akhir Section Layanan Unggulan --}}
@endsection
