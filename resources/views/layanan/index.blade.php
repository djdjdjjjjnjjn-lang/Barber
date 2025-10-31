@extends('layouts.main')

@section('content')
<div class="bg-white py-12">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-base font-semibold text-indigo-600">Layanan Kami</h2>
            <p class="mt-1 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">
                Semua yang Anda Butuhkan untuk Tampil Prima
            </p>
            <p class="mx-auto mt-5 max-w-xl text-xl text-gray-500">
                Kami menawarkan berbagai layanan premium untuk memenuhi semua kebutuhan perawatan rambut dan penampilan Anda.
            </p>
        </div>
        @can('manage-services')
        <div class="mt-8 text-center">
            <a href="{{ route('layanan.create') }}" class="rounded-md bg-green-600 px-4 py-2 text-base font-semibold text-white shadow-sm hover:bg-green-500">
                + Tambah Layanan Baru
            </a>
        </div>
        @endcan
        {{-- Grid untuk menampilkan semua layanan --}}
        <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3">

            {{-- Looping untuk setiap layanan dari database --}}
            @foreach ($layanans as $layanan)
            <div class="flex flex-col rounded-lg bg-gray-50 shadow-lg overflow-hidden">
                <div class="flex-shrink-0">
                    {{-- Kita akan gunakan gambar placeholder dulu --}}
                    <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1559599238-308793207162?q=80&w=2070" alt="Gambar {{ $layanan->nama }}">
                </div>
                <div class="flex flex-1 flex-col justify-between p-6">
                    <div class="flex-1">
                        <p class="text-xl font-semibold text-gray-900">{{ $layanan->nama }}</p>
                        <p class="mt-3 text-base text-gray-500">{{ $layanan->deskripsi }}</p>
                    </div>
                    <div class="mt-6">
                        <p class="text-lg font-medium text-indigo-600">
                            Rp {{ number_format($layanan->harga, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>
@endsection