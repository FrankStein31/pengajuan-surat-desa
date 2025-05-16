<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\Dokumen;

class SuratController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $dataSurat = Surat::with('dokumen')->get(); // Ambil jenis surat beserta dokumennya
        return view('surat.index', compact('dataSurat'));
    }

    public function create()
    {
        $dokumens = Dokumen::all();
        return view('surat.create', compact('dokumens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'id' => 'required|int',
            'jenis_surat' => 'required|string|max:100',
            'deskripsi_surat' => 'required|string',
            // 'syarat_id' => 'required|exists:dokumens,id', // Pastikan syarat_id ada di tabel dokumens',
            'dokumen_id' => 'required|array', // Bisa memilih lebih dari satu
            'dokumen_id.*' => 'exists:dokumen,id', // Validasi setiap ID
        ]);

        // dd($request->all()); // Cek apakah syarat_id terkirim
        
        $surat = Surat::create([
            'jenis_surat' => $request->jenis_surat,
            'deskripsi_surat' => $request->deskripsi_surat,
            // 'syarat_id' => $request->syarat_id,
        ]);
    
        $surat->dokumen()->attach($request->dokumen_id);

        return redirect()->route('surat.index')->with('success', 'Jenis Surat berhasil ditambahkan');
    }

    public function edit($id)
    {
        $surat = Surat::findOrFail($id); // Ambil data surat berdasarkan ID
        $dokumens = Dokumen::all(); // Ambil semua dokumen syarat

        return view('surat.edit', compact('surat', 'dokumens')); // Kirim ke view
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required|int',
            'jenis_surat' => 'required|string|max:255',
            'deskripsi_surat' => 'required|string',
            'syarat_surat' => 'nullable|string',
        ]);
    
        $surat = Surat::findOrFail($id); // Cari surat berdasarkan ID
        $surat->update([
            'jenis_surat' => $request->jenis_surat,
            'deskripsi_surat' => $request->deskripsi_surat,
            'syarat_surat' => $request->syarat_surat,
        ]);
    
        return redirect()->route('surat.index')->with('success', 'Data surat berhasil diperbarui');
    }

    public function destroy($id)
    {
        Surat::destroy($id);
        
        return redirect()->route('surat.index')->with('success', 'Surat berhasil dihapus');
    }
}


