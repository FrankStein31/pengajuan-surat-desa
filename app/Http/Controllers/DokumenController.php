<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokumens = Dokumen::all();
        return view('dokumen.index', compact('dokumens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dokumens = Dokumen::all(); 
        return view('dokumen.create', compact('dokumens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_dokumen' => 'required|string|unique:dokumen,nama_dokumen|max:255'
        ]);

        Dokumen::create([
            'nama_dokumen' => $request->nama_dokumen,
            // 'pengajuan_id' => null, // Jangan diisi karena ini hanya daftar syarat
            // 'nama_dokumen' => null,
        ]);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dokumen = Dokumen::findOrFail($id);
        return view('dokumen.edit', compact('dokumen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_dokumen' => 'required|string|max:255',
        ]);

        $dokumen = Dokumen::findOrFail($id);
        $dokumen->update([
            'nama_dokumen' => $request->nama_dokumen,
        ]);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Dokumen::findOrFail($id)->delete();
        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil dihapus.');
    }
}
