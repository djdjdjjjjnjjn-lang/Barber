@extends('layouts.admin')

@section('content')
    {{-- Grid untuk Kartu Statistik --}}
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Kartu 1: Booking Hari Ini -->
        <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="truncate text-sm font-medium text-gray-500">Booking Hari Ini</dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $stats['booking_today'] }}</dd>
        </div>
        <!-- Kartu 2: Booking Pending -->
        <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="truncate text-sm font-medium text-gray-500">Booking Pending</dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $stats['booking_pending'] }}</dd>
        </div>
        <!-- Kartu 3: Total Layanan -->
        <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="truncate text-sm font-medium text-gray-500">Total Layanan</dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $stats['total_layanan'] }}</dd>
        </div>
        <!-- Kartu 4: Total Capster -->
        <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="truncate text-sm font-medium text-gray-500">Total Capster</dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $stats['total_capster'] }}</dd>
        </div>
    </div>

    {{-- Daftar Booking Terbaru yang Pending --}}
    <div class="mt-8">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Booking Terbaru Menunggu Konfirmasi</h3>
        <div class="mt-4 overflow-hidden bg-white shadow sm:rounded-md">
            <ul role="list" class="divide-y divide-gray-200">
                @forelse($recent_bookings as $booking)
                <li>
                    <a href="{{ route('admin.bookings.index') }}" class="block hover:bg-gray-50">
                        <div class="px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <p class="truncate text-sm font-medium text-indigo-600">{{ $booking->nama_pelanggan }}</p>
                                <div class="ml-2 flex flex-shrink-0">
                                    <p class="inline-flex rounded-full bg-yellow-100 px-2 text-xs font-semibold leading-5 text-yellow-800">Pending</p>
                                </div>
                            </div>
                            <div class="mt-2 sm:flex sm:justify-between">
                                <div class="sm:flex">
                                    <p class="flex items-center text-sm text-gray-500">
                                        <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5A.75.75 0 015 8h10a.75.75 0 010 1.5H5a.75.75 0 01-.75-.75z" clip-rule="evenodd" /></svg>
                                        {{ \Carbon\Carbon::parse($booking->tanggal_booking)->isoFormat('dddd, D MMM Y') }} - {{ \Carbon\Carbon::parse($booking->jam_booking)->format('H:i') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                @empty
                <li>
                    <div class="px-4 py-4 text-center text-sm text-gray-500">
                        Tidak ada booking yang menunggu konfirmasi.
                    </div>
                </li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
