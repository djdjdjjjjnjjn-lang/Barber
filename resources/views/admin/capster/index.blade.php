@extends('layouts.admin')

@section('header', 'Kelola Capster')

@section('content')
    <div class="mb-4 text-right">
        <a href="{{ route('admin.capster.create') }}" class="inline-block rounded-md bg-amber-500 px-4 py-2 text-sm font-semibold text-stone-900 shadow-sm hover:bg-amber-400">
            + Tambah Capster Baru
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

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
                @forelse ($capsters as $capster)
                    <tr class="border-b border-gray-200 hover:bg-stone-100">
                        <td class="py-3 px-6">
                            @if ($capster->foto)
                                <img src="{{ asset('storage/' . $capster->foto) }}" alt="Foto {{ $capster->nama }}" class="h-12 w-12 rounded-full object-cover">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($capster->nama) }}&color=FFFFFF&background=292524" alt="Avatar {{ $capster->nama }}" class="h-12 w-12 rounded-full">
                            @endif
                        </td>
                        <td class="py-3 px-6 font-medium">{{ $capster->nama }}</td>
                        <td class="py-3 px-6">{{ $capster->deskripsi }}</td>
                        <td class="py-3 px-6 text-center">
                            <a href="{{ route('admin.capster.edit', $capster->id) }}" class="text-indigo-600 hover:text-indigo-900 font-semibold">Edit</a>
                            <form action="{{ route('admin.capster.destroy', $capster->id) }}" method="POST" class="inline-block ml-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 font-semibold" onclick="return confirm('Yakin ingin menghapus capster ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-6 text-gray-500">Belum ada data capster.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
