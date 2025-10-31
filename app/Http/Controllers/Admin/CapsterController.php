<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Capster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // <-- Import Storage untuk mengelola file

class CapsterController extends Controller
{
    public function index()
    {
        $capsters = Capster::latest()->get();
        return view('admin.capster.index', compact('capsters'));
    }

    public function create()
    {
        return view('admin.capster.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            // Validasi untuk foto: harus gambar, format jpg/png/jpeg, maks 2MB
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Jika ada file foto yang di-upload
        if ($request->hasFile('foto')) {
            // Simpan foto ke folder 'public/capsters' dan dapatkan path-nya
            $path = $request->file('foto')->store('capsters', 'public');
            $validatedData['foto'] = $path;
        }

        Capster::create($validatedData);

        return redirect()->route('admin.capster.index')->with('success', 'Capster baru berhasil ditambahkan!');
    }

    public function edit(Capster $capster)
    {
        return view('admin.capster.edit', compact('capster'));
    }

    public function update(Request $request, Capster $capster)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Jika ada file foto BARU yang di-upload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($capster->foto) {
                Storage::disk('public')->delete($capster->foto);
            }
            // Simpan foto baru dan update path-nya
            $path = $request->file('foto')->store('capsters', 'public');
            $validatedData['foto'] = $path;
        }

        $capster->update($validatedData);

        return redirect()->route('admin.capster.index')->with('success', 'Data capster berhasil diubah!');
    }

    public function destroy(Capster $capster)
    {
        // Hapus foto dari storage saat data dihapus
        if ($capster->foto) {
            Storage::disk('public')->delete($capster->foto);
        }
        
        $capster->delete();

        return redirect()->route('admin.capster.index')->with('success', 'Data capster berhasil dihapus!');
    }
}
