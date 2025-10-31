<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Capster;
use App\Models\Layanan;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Menampilkan halaman formulir booking awal.
     */
    public function create()
    {
        $layanans = Layanan::all();
        $capsters = Capster::all();

        return view('booking.create', [
            'layanans' => $layanans,
            'capsters' => $capsters,
        ]);
    }

    /**
     * Mengecek dan menampilkan jadwal yang tersedia.
     */
    public function checkAvailability(Request $request)
    {
        $request->validate([
            'layanan_id' => 'required|exists:layanans,id',
            'capster_id' => 'required|exists:capsters,id',
            'tanggal_booking' => 'required|date',
        ]);

        $tanggal = Carbon::parse($request->tanggal_booking);
        $capsterId = $request->capster_id;

        $jamSudahDipesan = Booking::where('capster_id', $capsterId)
                                ->where('tanggal_booking', $tanggal->format('Y-m-d'))
                                ->pluck('jam_booking')
                                ->map(fn ($time) => Carbon::parse($time)->format('H:i'))
                                ->toArray();

        $jamBuka = Carbon::parse($tanggal->format('Y-m-d') . ' 09:00');
        $jamTutup = Carbon::parse($tanggal->format('Y-m-d') . ' 21:00');
        $durasiLayanan = 60;

        $slotTersedia = [];
        $waktuSekarang = $jamBuka->copy();

        while ($waktuSekarang->copy()->addMinutes($durasiLayanan)->lte($jamTutup)) {
            $slot = $waktuSekarang->format('H:i');
            if (!in_array($slot, $jamSudahDipesan)) {
                $slotTersedia[] = $slot;
            }
            $waktuSekarang->addMinutes($durasiLayanan);
        }

        return view('booking.create', [
            'layanans' => Layanan::all(),
            'capsters' => Capster::all(),
            'old_data' => $request->all(),
            'available_slots' => $slotTersedia,
        ]);
    }

    /**
     * Menyimpan data booking final ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi semua data yang dikirim dari form
        $validatedData = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'no_hp_pelanggan' => 'required|string|max:20',
            'layanan_id' => 'required|exists:layanans,id',
            'capster_id' => 'required|exists:capsters,id',
            'tanggal_booking' => 'required|date',
            'jam_booking' => 'required|string',
        ]);

        // 2. Ambil harga dari layanan yang dipilih
        $layanan = Layanan::findOrFail($validatedData['layanan_id']);
        $validatedData['total_harga'] = $layanan->harga;

        // 3. Simpan data booking baru ke database
        $booking = Booking::create($validatedData);

        // 4. Arahkan ke halaman pembayaran dengan membawa data booking yang baru dibuat
        return redirect()->route('booking.payment', $booking->id);
    }
}
