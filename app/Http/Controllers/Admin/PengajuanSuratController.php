<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PengajuanSuratController extends Controller
{
    public function index()
    {
        $pengajuans = Pengajuan::with(['user', 'surat'])
            ->latest()
            ->get();
        return view('admin.pengajuan.index', compact('pengajuans'));
    }

    public function indexkadsek()
    {
        $pengajuans = Pengajuan::with(['user', 'surat'])
            ->where('status', 'diproses')
            ->latest()
            ->get();

        return view('admin.pengajuan.indexkadsek', compact('pengajuans'));
    }

    public function show($id)
    {
        $pengajuan = Pengajuan::with(['user', 'surat', 'lampiran'])->findOrFail($id);
        return view('admin.pengajuan.show', compact('pengajuan'));
    }
    public function showkadsek($id)
    {
        $pengajuan = Pengajuan::with(['user', 'surat', 'lampiran'])->findOrFail($id);
        return view('admin.pengajuan.showkadsek', compact('pengajuan'));
    }
    public function updateStatus(Request $request, $id)
{
    $pengaduan = Pengajuan::findOrFail($id);

    // update status dari tombol yang diklik
    $pengaduan->status = $request->status;
    $pengaduan->save();

    return redirect()->back()->with('success', 'Status berhasil diperbarui.');
}

    public function verifikasi(Request $request, $id)
    {
        // Validasi status yang diperbolehkan
        $validStatus = ['selesai'];
        if (!in_array($request->status, $validStatus)) {
            return back()->with('error', 'Status tidak valid.');
        }

        // Ambil data pengajuan
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = $request->status;
        $pengajuan->save();

        // Ambil nomor dari data pengajuan
        $target = optional(optional($pengajuan->user)->masyarakatProfile)->no_hp;
 // Pastikan kolom 'no_hp' tersedia di tabel pengajuans

        // Cek apakah nomor tersedia
        if ($target) {
            $token = '8YfMDS8FFatVojGHAwW2'; // Token API Fonnte
            $data = "Pengajuan surat atas nama: {$pengajuan->user->name}\n";
            $data .= "Jenis Surat: {$pengajuan->surat->jenis_surat}\n";
            $data .= "Status: Telah diverifikasi\n";
            $data .= "Tanggal Verifikasi: " . $pengajuan->updated_at->format('d-m-Y') . "\n\n";
            $data .= "Silakan buka website kami untuk mencetak surat\n\n";
            $data .= "Terima kasih.\n";
            $data .= "Salam,\n";
            $data .= "Admin Pelayanan Surat Desa";

            // $data = "Pengajuan Anda telah diperbarui.\n\n" . 'Status: ' . strtoupper($request->status) . "\n" . 'Nama Pengaju: ' . $pengajuan->nama . "\n" . 'Tanggal: ' . date('d-m-Y H:i:s') . "\n\n" . 'Diproses oleh: ' . Auth::user()->name . ' (NIP: ' . Auth::user()->nip . ')';
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => 'https://api.fonnte.com/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => [
                    'target' => $target,
                    'message' => $data,
                ],
                CURLOPT_HTTPHEADER => ["Authorization: $token"],
            ]);

            $response = curl_exec($curl);
            curl_close($curl);
        }

        return redirect()->route('admin.pengajuan.kadsek')->with('success', 'Pengajuan berhasil diverifikasi dan pesan WhatsApp telah dikirim.');
    }
}
