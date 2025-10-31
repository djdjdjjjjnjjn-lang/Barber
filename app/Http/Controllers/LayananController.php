<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // <-- Import Storage untuk mengelola file

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::latest()->get();
        return view('admin.layanan.index', compact('layanans'));
    }

    public function create()
    {
        return view('admin.layanan.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer',
            // Validasi untuk gambar: harus gambar, format jpg/png/jpeg, maks 2MB
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Jika ada file gambar yang di-upload
        if ($request->hasFile('gambar')) {
            // Simpan gambar ke folder 'public/layanan' dan dapatkan path-nya
            $path = $request->file('gambar')->store('layanan', 'public');
            $validatedData['gambar'] = $path;
        }

        Layanan::create($validatedData);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan baru berhasil ditambahkan!');
    }

    public function edit(Layanan $layanan)
    {
        return view('admin.layanan.edit', compact('layanan'));
    }

    public function update(Request $request, Layanan $layanan)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Jika ada file gambar BARU yang di-upload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($layanan->gambar) {
                Storage::disk('public')->delete($layanan->gambar);
            }
            // Simpan gambar baru dan update path-nya
            $path = $request->file('gambar')->store('layanan', 'public');
            $validatedData['gambar'] = $path;
        }

        $layanan->update($validatedData);

        return redirect()->route('admin.layanan.index')->with('success', 'Data layanan berhasil diubah!');
    }

    public function destroy(Layanan $layanan)
    {
        // Hapus gambar dari storage saat data dihapus
        if ($layanan->gambar) {
            Storage::disk('public')->delete($layanan->gambar);
        }
        
        $layanan->delete();

        return redirect()->route('admin.layanan.index')->with('success', 'Data layanan berhasil dihapus!');
    }
}
