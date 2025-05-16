<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\Dokumen;
use App\Models\JenisSuratDokumen;
use App\Models\Surat;
use App\Models\Lampiran;
use App\Models\MasyarakatProfile;
use App\Models\OrangtuaProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengajuanController extends Controller
{
    public function create()
{
    $surat = Surat::all(); // Ambil semua data surat

    $user = Auth::user(); // Tambahkan ini
    $masyarakat = MasyarakatProfile::where('user_id', $user->id)->first(); // Ambil data masyarakat
    $orangtua = OrangtuaProfile::where('masyarakat_user_id', $user->id)->first(); // Ambil data orang tua

    // Kirim semua data ke view
    return view('pengajuan.ajukan-surat', compact('surat', 'user', 'masyarakat', 'orangtua'));
}


    public function store(Request $request)
{
    $request->validate([
        'jenis_surat' => 'required|exists:surat,id',
        'keperluan' => 'nullable|string',
        'keterangan' => 'nullable|string',
        'lampiran' => 'required|array',
        'lampiran.*' => 'file|mimes:pdf,jpg,jpeg,png|max:2048',
    ]);

    // Buat pengajuan baru
    $pengajuan = Pengajuan::create([
        'user_id' => auth()->id(),
        'jenis_surat_id' => $request->jenis_surat,
        'keperluan' => $request->keperluan,
        'keterangan' => $request->keterangan,
        'status' => 'pending',
    ]);

    // Simpan lampiran berdasarkan dokumen yang dipilih
    if ($request->hasFile('lampiran')) {
        foreach ($request->file('lampiran') as $dokumenId => $file) {
            if ($file) {
                $nama = $file->getClientOriginalName();
                $path = $file->store('lampiran/pengajuan_' . $pengajuan->id . 'public');

                Lampiran::create([
                    'pengajuan_id' => $pengajuan->id,
                    'dokumen_id' => $dokumenId,
                    'nama_lampiran' => $nama,
                    'file' => $path,
                ]);
            }
        }
    }

    return redirect()->route('pengajuan.create')->with('success', 'Pengajuan berhasil dikirim!');
}

    public function getDokumen($id)
    {
        $dokumen = JenisSuratDokumen::where('jenis_surat_id', $id)
            ->with('dokumen') // pastikan ada relasi 'dokumen' di model
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->dokumen->id,
                    'nama_dokumen' => $item->dokumen->nama_dokumen,
                ];
            });

        return response()->json($dokumen);
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


