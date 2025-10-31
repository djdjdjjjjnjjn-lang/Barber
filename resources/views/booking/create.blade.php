@extends('layouts.main')

@section('content')
{{-- Kita gunakan x-data dari Alpine.js untuk menyimpan data & state --}}
<div x-data="{
    capsters: {{ $capsters->map(function($capster) {
        return [
            'id' => $capster->id,
            'nama' => $capster->nama,
            'foto' => $capster->foto ? asset('storage/' . $capster->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($capster->nama) . '&color=FFFFFF&background=111827'
        ];
    })->toJson() }},
    selectedCapsterId: '{{ old('capster_id', $old_data['capster_id'] ?? '') }}',
    get selectedCapster() {
        if (!this.selectedCapsterId) return null;
        return this.capsters.find(c => c.id == this.selectedCapsterId);
    }
}" class="bg-slate-50 py-16">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Booking Online</h2>
            <p class="mt-4 text-lg leading-8 text-gray-600">
                Amankan jadwalmu dengan capster favoritmu dalam beberapa langkah mudah.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-16">
            {{-- Kolom Kiri: Formulir --}}
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <form action="{{ route('booking.check') }}" method="POST">
                    @csrf
                    <div class="space-y-6">
                        <div>
                            <label for="nama_pelanggan" class="block text-sm font-semibold leading-6 text-gray-900">Nama Lengkap</label>
                            <div class="mt-2.5">
                                <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required value="{{ $old_data['nama_pelanggan'] ?? '' }}">
                            </div>
                        </div>
                        <div>
                            <label for="no_hp_pelanggan" class="block text-sm font-semibold leading-6 text-gray-900">Nomor HP (WhatsApp)</label>
                            <div class="mt-2.5">
                                <input type="tel" name="no_hp_pelanggan" id="no_hp_pelanggan" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required value="{{ $old_data['no_hp_pelanggan'] ?? '' }}">
                            </div>
                        </div>
                        <div>
                            <label for="layanan_id" class="block text-sm font-semibold leading-6 text-gray-900">Pilih Layanan</label>
                            <div class="mt-2.5">
                                <select id="layanan_id" name="layanan_id" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                                    <option value="">-- Pilih salah satu layanan --</option>
                                    @foreach ($layanans as $layanan)
                                        <option value="{{ $layanan->id }}" {{ (isset($old_data['layanan_id']) && $old_data['layanan_id'] == $layanan->id) ? 'selected' : '' }}>
                                            {{ $layanan->nama }} - Rp {{ number_format($layanan->harga) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="capster_id" class="block text-sm font-semibold leading-6 text-gray-900">Pilih Capster</label>
                            <div class="mt-2.5">
                                <select x-model="selectedCapsterId" id="capster_id" name="capster_id" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                                    <option value="">-- Pilih salah satu capster --</option>
                                    @foreach ($capsters as $capster)
                                        <option value="{{ $capster->id }}" {{ (isset($old_data['capster_id']) && $old_data['capster_id'] == $capster->id) ? 'selected' : '' }}>
                                            {{ $capster->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="tanggal_booking" class="block text-sm font-semibold leading-6 text-gray-900">Pilih Tanggal</label>
                            <div class="mt-2.5">
                                <input type="date" name="tanggal_booking" id="tanggal_booking" min="{{ date('Y-m-d') }}" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required value="{{ $old_data['tanggal_booking'] ?? '' }}">
                            </div>
                        </div>
                    </div>
                    <div class="mt-10">
                        <button type="submit" class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Cari Jadwal Tersedia
                        </button>
                    </div>
                </form>
            </div>

            {{-- Kolom Kanan: Foto Capster & Jadwal --}}
            <div class="mt-10 md:mt-0">
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold leading-6 text-gray-900 text-center" x-text="selectedCapster ? selectedCapster.nama : 'Capster Pilihanmu'">Capster Pilihanmu</h3>
                    <div class="mt-4 aspect-square w-full bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center">
                        <img :src="selectedCapster ? selectedCapster.foto : 'https://placehold.co/400x400/f1f5f9/cbd5e1?text=Pilih Capster'" alt="Foto Capster" class="object-cover h-full w-full transition-opacity duration-300" :class="{'opacity-0': !selectedCapster}">
                    </div>
                </div>

                {{-- Bagian ini hanya muncul setelah jadwal ditemukan --}}
                @if (isset($available_slots))
                <div class="mt-8 bg-white p-8 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold leading-6 text-gray-900 text-center">Langkah 2: Pilih Jam Tersedia</h3>
                    <form action="{{ route('booking.store') }}" method="POST" class="mt-6">
                        @csrf
                        <input type="hidden" name="nama_pelanggan" value="{{ $old_data['nama_pelanggan'] }}">
                        <input type="hidden" name="no_hp_pelanggan" value="{{ $old_data['no_hp_pelanggan'] }}">
                        <input type="hidden" name="layanan_id" value="{{ $old_data['layanan_id'] }}">
                        <input type="hidden" name="capster_id" value="{{ $old_data['capster_id'] }}">
                        <input type="hidden" name="tanggal_booking" value="{{ $old_data['tanggal_booking'] }}">
                        
                        @if (count($available_slots) > 0)
                            <fieldset>
                                <legend class="sr-only">Pilih Jam</legend>
                                <div class="grid grid-cols-3 sm:grid-cols-4 gap-3">
                                    @foreach ($available_slots as $slot)
                                        <div>
                                            <input type="radio" name="jam_booking" id="slot_{{ $loop->index }}" value="{{ $slot }}" class="sr-only peer" required>
                                            <label for="slot_{{ $loop->index }}" class="block w-full text-center cursor-pointer rounded-md border border-gray-300 p-3 text-sm font-medium text-gray-700 hover:bg-gray-50 peer-checked:bg-indigo-600 peer-checked:text-white peer-checked:border-indigo-600 transition-colors">{{ $slot }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </fieldset>
                            <div class="mt-8">
                                <button type="submit" class="block w-full rounded-md bg-green-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Lanjutkan ke Pembayaran</button>
                            </div>
                        @else
                            <p class="text-center text-gray-500 mt-6 bg-yellow-100 p-4 rounded-lg">Maaf, tidak ada jadwal yang tersedia untuk tanggal dan capster yang dipilih. Silakan coba tanggal lain.</p>
                        @endif
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
