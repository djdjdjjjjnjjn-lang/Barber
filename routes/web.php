<?php

use App\Models\Layanan;
use App\Models\Capster;
use App\Models\Booking;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LayananController as AdminLayananController;
use App\Http\Controllers\Admin\CapsterController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\BookingController as PublicBookingController;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

// --- RUTE PUBLIK ---
Route::get('/', function () { $layanans = Layanan::take(3)->get(); return view('welcome', ['layanans' => $layanans]); })->name('home');
Route::get('/tentang', function () { $capsters = Capster::all(); return view('tentang', ['capsters' => $capsters]); })->name('tentang');
Route::get('/layanan-kami', function () { $layanans = Layanan::all(); return view('layanan-public', ['layanans' => $layanans]); })->name('layanan.public');
Route::get('/booking', [PublicBookingController::class, 'create'])->name('booking.create');
Route::post('/booking/check-availability', [PublicBookingController::class, 'checkAvailability'])->name('booking.check');
Route::post('/booking/store', [PublicBookingController::class, 'store'])->name('booking.store');
Route::get('/booking/{booking}/payment', function (Booking $booking) { return view('booking.payment', ['booking' => $booking]); })->name('booking.payment');

// --- RUTE JEMBATAN & PROFIL ---
Route::get('/dashboard', function () { if (Auth::user()?->role === 'admin') { return redirect()->route('admin.dashboard'); } return redirect()->route('home'); })->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () { Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); });

// --- AREA KHUSUS ADMIN ---
Route::middleware(['auth', 'is.admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Rute dasbor admin (INI YANG DIPERBARUI)
    Route::get('/dashboard', function () {
        $stats = [
            'booking_today' => Booking::whereDate('tanggal_booking', Carbon::today())->count(),
            'booking_pending' => Booking::where('status', 'pending')->count(),
            'total_layanan' => Layanan::count(),
            'total_capster' => Capster::count(),
        ];
        $recent_bookings = Booking::where('status', 'pending')->latest()->take(5)->get();

        return view('admin.dashboard', [
            'stats' => $stats,
            'recent_bookings' => $recent_bookings
        ]);
    })->name('dashboard');
    
    Route::patch('/bookings/{booking}/confirm', [AdminBookingController::class, 'confirm'])->name('bookings.confirm');
    Route::patch('/bookings/{booking}/cancel', [AdminBookingController::class, 'cancel'])->name('bookings.cancel');

    Route::resource('layanan', AdminLayananController::class);
    Route::resource('capster', CapsterController::class);
    Route::resource('bookings', AdminBookingController::class);
});

// File rute bawaan Breeze
require __DIR__.'/auth.php';
