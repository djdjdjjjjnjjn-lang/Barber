@extends('layouts.admin')

@section('header', 'Kelola Booking')

@section('content')
    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            <p class="font-bold">Sukses!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if (session('whatsapp_url'))
        <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-4" role="alert">
            <p class="font-bold">Kirim Notifikasi ke Pelanggan</p>
            <p>
                <a href="{{ session('whatsapp_url') }}" target="_blank" class="font-bold underline hover:text-blue-900">
                    Klik di sini untuk mengirim konfirmasi via WhatsApp →
                </a>
            </p>
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
        <table class="min-w-full">
            <thead class="bg-stone-800 text-white">
                <tr>
                    <th class="py-3 px-6 text-left uppercase font-semibold text-sm">Pelanggan</th>
                    <th class="py-3 px-6 text-left uppercase font-semibold text-sm">Layanan</th>
                    <th class="py-3 px-6 text-left uppercase font-semibold text-sm">Capster</th>
                    <th class="py-3 px-6 text-left uppercase font-semibold text-sm">Jadwal</th>
                    <th class="py-3 px-6 text-center uppercase font-semibold text-sm">Status</th>
                    <th class="py-3 px-6 text-center uppercase font-semibold text-sm">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse ($bookings as $booking)
                    <tr class="border-b border-gray-200 hover:bg-stone-100">
                        <td class="py-4 px-6 align-middle">
                            <span class="font-medium">{{ $booking->nama_pelanggan }}</span>
                            <span class="text-xs text-gray-500 block">{{ $booking->no_hp_pelanggan }}</span>
                        </td>
                        <td class="py-4 px-6 align-middle">{{ $booking->layanan->nama }}</td>
                        <td class="py-4 px-6 align-middle">{{ $booking->capster->nama }}</td>
                        <td class="py-4 px-6 align-middle">
                            {{ \Carbon\Carbon::parse($booking->tanggal_booking)->isoFormat('dddd, D MMM Y') }}
                            <span class="text-xs text-gray-500 block">{{ \Carbon\Carbon::parse($booking->jam_booking)->format('H:i') }}</span>
                        </td>
                        <td class="py-4 px-6 align-middle text-center">
                            @if($booking->status == 'pending')
                                <span class="bg-yellow-200 text-yellow-800 text-xs font-medium px-2.5 py-1 rounded-full">Pending</span>
                            @elseif($booking->status == 'confirmed')
                                <span class="bg-green-200 text-green-800 text-xs font-medium px-2.5 py-1 rounded-full">Confirmed</span>
                            @else
                                <span class="bg-red-200 text-red-800 text-xs font-medium px-2.5 py-1 rounded-full">Canceled</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 align-middle text-center">
                            @if ($booking->status == 'pending')
                                <div class="flex justify-center gap-x-4">
                                    <form action="{{ route('admin.bookings.confirm', $booking->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-green-600 hover:text-green-900 font-semibold">Confirm</button>
                                    </form>
                                    <form action="{{ route('admin.bookings.cancel', $booking->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-red-600 hover:text-red-900 font-semibold">Cancel</button>
                                    </form>
                                </div>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-6 text-gray-500">Belum ada data booking.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
