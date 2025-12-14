<?php

namespace App\Http\Controllers;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource (READ - Index).
     */
    public function index()
    {
        $pengurus = Pengurus::latest()->get();
        // Mengubah view dari 'pengurus' ke 'pengurus.index'
        return view('pengurus.index', compact('pengurus'));
    }

    /**
     * Show the form for creating a new resource (CREATE - Form).
     */
    public function create()
    {
        // View form tambah data
        return view('pengurus.create');
    }

    /**
     * Store a newly created resource in storage (CREATE - Store).
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nomor_hp' => 'nullable|string|max:15',
            'tahun_jabatan' => 'nullable|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/pengurus_photos');
            $data['foto'] = str_replace('public/', 'storage/', $path);
        }

        Pengurus::create($data);

        return redirect()->route('pengurus.index')
                         ->with('success', 'Data pengurus berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource (UPDATE - Form).
     */
    public function edit(Pengurus $pengurus)
    {
        // View form edit data
        return view('pengurus.edit', compact('pengurus'));
    }

    /**
     * Update the specified resource in storage (UPDATE - Store).
     */
    public function update(Request $request, Pengurus $pengurus)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nomor_hp' => 'nullable|string|max:15',
            'tahun_jabatan' => 'nullable|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($pengurus->foto && Storage::exists(str_replace('storage/', 'public/', $pengurus->foto))) {
                Storage::delete(str_replace('storage/', 'public/', $pengurus->foto));
            }
            
            $path = $request->file('foto')->store('public/pengurus_photos');
            $data['foto'] = str_replace('public/', 'storage/', $path);
        }

        $pengurus->update($data);

        return redirect()->route('pengurus.index')
                         ->with('success', 'Data pengurus berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage (DELETE).
     */
    public function destroy(Pengurus $pengurus)
    {
        // Hapus foto terkait
        if ($pengurus->foto && Storage::exists(str_replace('storage/', 'public/', $pengurus->foto))) {
            Storage::delete(str_replace('storage/', 'public/', $pengurus->foto));
        }
        
        $pengurus->delete();

        return redirect()->route('pengurus.index')
                         ->with('success', 'Data pengurus berhasil dihapus.');
    }
}