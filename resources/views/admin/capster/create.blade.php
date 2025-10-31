@extends('layouts.admin')

@section('header', 'Tambah Capster Baru')

@section('content')
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Oops! Ada yang salah.</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Tambahkan enctype="multipart/form-data" agar form bisa handle upload file --}}
    <form action="{{ route('admin.capster.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="space-y-6">
            <div>
                <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama Capster</label>
                <div class="mt-2"><input type="text" name="nama" id="nama" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300" required value="{{ old('nama') }}"></div>
            </div>
            
            <div>
                <label for="deskripsi" class="block text-sm font-medium leading-6 text-gray-900">Deskripsi Singkat (Keahlian)</label>
                <div class="mt-2"><textarea name="deskripsi" id="deskripsi" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300">{{ old('deskripsi') }}</textarea></div>
            </div>

            {{-- INPUT UNTUK FOTO --}}
            <div>
                <label for="foto" class="block text-sm font-medium leading-6 text-gray-900">Foto Capster</label>
                <div class="mt-2">
                    <input type="file" name="foto" id="foto" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                </div>
            </div>
        </div>

        <div class="mt-8 flex gap-x-4">
            <button type="submit" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Simpan Capster</button>
            <a href="{{ route('admin.capster.index') }}" class="rounded-md bg-gray-200 px-3.5 py-2.5 text-center text-sm font-semibold text-gray-800 shadow-sm hover:bg-gray-300">Batal</a>
        </div>
    </form>
@endsection
