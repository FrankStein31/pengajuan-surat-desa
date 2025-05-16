<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\Dokumen;
use App\Models\Surat;
use App\Models\Lampiran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengajuanController extends Controller
{
    public function create()
    {
        $surat = Surat::all(); // Ambil semua data surat
        return view('pengajuan.ajukan-surat', compact('surat')); // kirim ke view
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_surat' => 'required|exists:surat,id',
            'lampiran' => 'required|array',
            'lampiran.*' => 'file|mimes:pdf,jpg,jpeg,png|max:2048',
            // 'dokumen.*' => 'file|mimes:pdf,jpg,png|max:2048',
        ]);

        // Simpan data pengajuan surat
        $pengajuan = Pengajuan::create([
            'user_id' => Auth::id(),
            'jenis_surat_id' => $request->jenis_surat, 
            'status' => 'pending', // Default status
        ]);

        // Simpan dokumen yang diunggah
        if ($request->hasFile('lampiran')) {
            foreach ($request->file('lampiran') as $file) {
                $nama = $file->getClientOriginalName();
                $path = $file->store('lampiran');
    
                Lampiran::create([
                    'pengajuan_id' => $pengajuan->id,
                    'nama_lampiran' => $nama,
                    'file' => $path,
        // if ($request->hasFile('dokumen')) {
        //     foreach ($request->file('dokumen') as $file) {
        //         $filePath = $file->store('dokumen_pengajuan'); // Simpan ke storage
        //         $pengajuan->dokumen()->create([
        //             'pengajuan_id' => $pengajuan->id,
        //             'nama_file' => $filePath,
                ]);
            }
        }

        return redirect()->route('pengajuan.create')->with('success', 'Pengajuan berhasil dikirim!');
    }

    public function getFormSurat($id)
    {
        $surat = Surat::find($id);

        if (!$surat) {
            return response()->json(['error' => 'Jenis surat tidak ditemukan'], 404);
        }

        // Debug: tampilkan jenis surat yang dikirim
        \Log::info("Jenis Surat Dipilih: " . $surat->jenis_surat);
    
        $view = '';

        switch ($surat->jenis_surat) {
            case 'Surat Keterangan Usaha':
                $view = view('pengajuan.form_usaha')->render();
                break;
            case 'SKTM Sekolah':
                $view = view('pengajuan.form_tidak_mampu')->render();
                break;
            case 'Surat Pindah Domisili':
                $view = view('pengajuan.form_domisili')->render();
                break;
            default:
                return response()->json(['error' => 'Jenis surat tidak ditemukan'], 404);
        }
    
        return response()->json(['html' => $view]);
    }    

    public function riwayat()
    {
        // $pengajuans = Pengajuan::where('user_id', auth()->id())->with('dokumen')->latest()->get();
        $pengajuans = Pengajuan::with(['surat', 'lampiran'])->where('user_id', auth()->id())->latest()->get();
        return view('pengajuan.riwayat', compact('pengajuans'));
    }

}


