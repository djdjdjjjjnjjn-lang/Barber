<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon; // <-- Jangan lupa import Carbon

class BookingController extends Controller
{
    /**
     * Menampilkan daftar semua booking.
     */
    public function index()
    {
        $bookings = Booking::with(['layanan', 'capster'])->latest()->get();
        return view('admin.booking.index', compact('bookings'));
    }

    /**
     * Mengubah status booking menjadi 'confirmed' dan menyiapkan notifikasi WA.
     */
    public function confirm(Booking $booking)
    {
        // 1. Ubah status booking
        $booking->update(['status' => 'confirmed']);

        // --- LOGIKA NOTIFIKASI WHATSAPP ---

        // 2. Ambil semua data yang diperlukan untuk pesan
        $namaPelanggan = $booking->nama_pelanggan;
        $namaLayanan = $booking->layanan->nama;
        $tanggal = Carbon::parse($booking->tanggal_booking)->isoFormat('dddd, D MMMM Y');
        $jam = Carbon::parse($booking->jam_booking)->format('H:i');
        $noHp = $booking->no_hp_pelanggan;

        // 3. Format nomor HP ke format internasional (ganti 0 di depan dengan 62)
        if (substr($noHp, 0, 1) === '0') {
            $noHp = '62' . substr($noHp, 1);
        }

        // 4. Buat template pesan
        $pesan = "Halo, *{$namaPelanggan}*!\n\nBooking Anda di *H20 BARBERSHOP* telah dikonfirmasi.\n\n";
        $pesan .= "*Detail Booking:*\n";
        $pesan .= "Layanan: *{$namaLayanan}*\n";
        $pesan .= "Jadwal: *{$tanggal}, Pukul {$jam}*\n\n";
        $pesan .= "Mohon untuk datang tepat waktu. Terima kasih dan sampai jumpa!";

        // 5. Encode pesan agar aman untuk URL
        $pesanEncoded = urlencode($pesan);

        // 6. Buat URL WhatsApp "Click to Chat"
        $waUrl = "https://wa.me/{$noHp}?text={$pesanEncoded}";

        // 7. Alihkan kembali ke halaman daftar dengan pesan sukses DAN link WhatsApp
        return redirect()->route('admin.bookings.index')
                         ->with('success', 'Booking berhasil dikonfirmasi!')
                         ->with('whatsapp_url', $waUrl);
    }

    /**
     * Mengubah status booking menjadi 'canceled'.
     */
    public function cancel(Booking $booking)
    {
        $booking->update(['status' => 'canceled']);
        return redirect()->route('admin.bookings.index')->with('success', 'Booking berhasil dibatalkan.');
    }

    // ... sisa method biarkan kosong ...
    public function create() {}
    public function store(Request $request) {}
    public function show(Booking $booking) {}
    public function edit(Booking $booking) {}
    public function update(Request $request, Booking $booking) {}
    public function destroy(Booking $booking) {}
}
