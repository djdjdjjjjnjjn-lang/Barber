@extends('layouts.admin')

{{-- Mengatur judul header yang akan muncul di layout admin --}}
@section('header', 'Kelola Layanan')

@section('content')
    {{-- Tombol "Tambah Baru" dipindahkan ke kanan atas agar lebih standar --}}
    <div class="mb-4 text-right">
        <a href="{{ route('admin.layanan.create') }}" class="inline-block rounded-md bg-amber-500 px-4 py-2 text-sm font-semibold text-stone-900 shadow-sm hover:bg-amber-400">
            + Tambah Layanan Baru
        </a>
    </div>

    {{-- Notifikasi Sukses --}}
    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    {{-- Tabel dengan styling baru yang lebih bersih --}}
    <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
        <table class="min-w-full">
            <thead class="bg-stone-800 text-white">
                <tr>
                    <th class="py-3 px-6 text-left uppercase font-semibold text-sm">Gambar</th>
                    <th class="py-3 px-6 text-left uppercase font-semibold text-sm">Nama</th>
                    <th class="py-3 px-6 text-left uppercase font-semibold text-sm">Harga</th>
                    <th class="py-3 px-6 text-center uppercase font-semibold text-sm">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse ($layanans as $layanan)
                    <tr class="border-b border-gray-200 hover:bg-stone-100">
                        <td class="py-3 px-6">
                            @if ($layanan->gambar)
                                <img src="{{ asset('storage/' . $layanan->gambar) }}" alt="Gambar {{ $layanan->nama }}" class="h-12 w-12 rounded-full object-cover">
                            @else
                                <span class="text-xs text-gray-400">No Image</span>
                            @endif
                        </td>
                        <td class="py-3 px-6 font-medium">{{ $layanan->nama }}</td>
                        <td class="py-3 px-6">Rp {{ number_format($layanan->harga, 0, ',', '.') }}</td>
                        <td class="py-3 px-6 text-center">
                            <a href="{{ route('admin.layanan.edit', $layanan->id) }}" class="text-indigo-600 hover:text-indigo-900 font-semibold">Edit</a>
                            <form action="{{ route('admin.layanan.destroy', $layanan->id) }}" method="POST" class="inline-block ml-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 font-semibold" onclick="return confirm('Yakin ingin menghapus layanan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-6 text-gray-500">Belum ada data layanan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
