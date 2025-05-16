<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\Dokumen;
// use App\Models\Auth;
use App\Models\Pengajuan;
use App\Models\MasyarakatProfile;
use App\Models\OrangtuaProfile;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class SuratController extends Controller
{


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
            'kategori' => 'required|in:Kepala Desa, Sekretaris Desa', // Validasi kategori
            'dokumen_id' => 'required|array', // Bisa memilih lebih dari satu
            'dokumen_id.*' => 'exists:dokumen,id', // Validasi setiap ID
        ]);

        // dd($request->all()); // Cek apakah syarat_id terkirim

        $surat = Surat::create([
            'jenis_surat' => $request->jenis_surat,
            'deskripsi_surat' => $request->deskripsi_surat,
            // 'syarat_id' => $request->syarat_id,
            'kategori' => $request->kategori,
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

    public function cetak($id)
{

    $pengajuan = Pengajuan::where('id', $id)
        ->where('status', 'selesai')
        ->firstOrFail();
        $user = Auth::user();
    $masyarakat = MasyarakatProfile::where('user_id', $pengajuan->user_id)->first();
    $orangtua = OrangtuaProfile::where('masyarakat_user_id', $pengajuan->user_id)->first();

    // Pilih view berdasarkan jenis_surat_id
    switch ($pengajuan->jenis_surat_id) {
        case 179: // Surat Kelahiran
            $view = 'surat.kelahiran';
            break;
        case 178: // SKTM Kuliah
            $view = 'surat.penghasilan';
            break;
        case 177: // SKTM Sekolah (anggap = penghasilan orang tua?)
            $view = 'surat.penghasilan';
            break;
        default:
            abort(404, 'Jenis surat tidak dikenali');
    }
    $sessionKey = 'unduhan_pengajuan_' . $pengajuan->id;
    $jumlahUnduhan = session($sessionKey, 0) + 1;
    session([$sessionKey => $jumlahUnduhan]);

    // Format nama file
    $filename = 'surat-' . $pengajuan->id;
    if ($jumlahUnduhan > 1) {
        $filename .= '-' . str_pad($jumlahUnduhan, 2, '0', STR_PAD_LEFT);
    }
    $filename .= '.pdf';

    $pdf = Pdf::loadView($view, [
        'pengajuan' => $pengajuan,
        'masyarakat' => $masyarakat,
        'orangtua' => $orangtua,
        'user' => $user,
    ]);
    $pdf->setPaper('A4', 'portrait');

    // return $pdf->download($filename);
    return response()->streamDownload(function () use ($pdf) {
        echo $pdf->output();
    }, $filename, [
        'Content-Type' => 'application/pdf',
        'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
        'Pragma' => 'no-cache',
        'Expires' => '0',
    ]); // Untuk menampilkan di browser

}

    public function update(Request $request, $id)
{
    // Validasi data yang diterima dari form
    $request->validate([
        'jenis_surat' => 'required|string|max:255',
        'deskripsi_surat' => 'required|string',
        'dokumen_id' => 'required|array',  // Pastikan dokumen yang dipilih ada
        'dokumen_id.*' => 'exists:dokumen,id', // Pastikan ID dokumen valid
        'kategori' => 'required|in:Kepala Desa,Sekretaris Desa', // Validasi kategori

    ]);

    // Mencari surat berdasarkan ID
    $surat = Surat::findOrFail($id);

    // Update data surat
    $surat->update([
        'jenis_surat' => $request->jenis_surat,
        'deskripsi_surat' => $request->deskripsi_surat,
        'kategori' => $request->kategori,

    ]);

    // Menyinkronkan dokumen yang dipilih dengan surat
    $surat->dokumen()->sync($request->dokumen_id); // sync() akan menambah atau menghapus dokumen terkait

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('surat.index')->with('success', 'Data surat berhasil diperbarui');
}


    public function destroy($id)
    {
        Surat::destroy($id);

        return redirect()->route('surat.index')->with('success', 'Surat berhasil dihapus');
    }
}


