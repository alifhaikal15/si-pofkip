<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function index()
    {
        // Mengambil data presensi beserta data kegiatannya (eager loading)
        $presensi = Presensi::with('kegiatan')->latest()->get();
        return view('presensi.index', compact('presensi'));
    }

    public function create()
    {
        // Ambil data kegiatan untuk dropdown
        $kegiatan = Kegiatan::all();
        return view('presensi.create', compact('kegiatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kegiatan_id' => 'required|exists:kegiatans,id',
            'nama_anggota' => 'required|string|max:255',
            'status' => 'required|in:Hadir,Izin,Sakit,Alpha',
        ]);

        Presensi::create($request->all());

        return redirect()->route('presensi.index')->with('success', 'Data presensi berhasil ditambahkan.');
    }

    public function edit(Presensi $presensi)
    {
        $kegiatan = Kegiatan::all();
        return view('presensi.edit', compact('presensi', 'kegiatan'));
    }

    public function update(Request $request, Presensi $presensi)
    {
        $request->validate([
            'kegiatan_id' => 'required|exists:kegiatans,id',
            'nama_anggota' => 'required|string|max:255',
            'status' => 'required|in:Hadir,Izin,Sakit,Alpha',
        ]);

        $presensi->update($request->all());

        return redirect()->route('presensi.index')->with('success', 'Data presensi berhasil diperbarui.');
    }

    public function destroy(Presensi $presensi)
    {
        $presensi->delete();
        return redirect()->route('presensi.index')->with('success', 'Data presensi berhasil dihapus.');
    }
}