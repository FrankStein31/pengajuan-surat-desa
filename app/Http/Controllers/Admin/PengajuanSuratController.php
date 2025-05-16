<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PengajuanSuratController extends Controller
{
    public function index()
    {
        $pengajuans = Pengajuan::with(['user', 'surat'])->latest()->get();
        return view('admin.pengajuan.index', compact('pengajuans'));
    }

    public function indexkadsek()
    {
        $pengajuans = Pengajuan::with(['user', 'surat'])->where('status', 'diproses')->latest()->get();

        return view('admin.pengajuan.index', compact('pengajuans'));
    }

    public function show($id)
    {
        $pengajuan = Pengajuan::with(['user', 'surat', 'lampiran'])->findOrFail($id);
        return view('admin.pengajuan.show', compact('pengajuan'));
    }

    public function verifikasi(Request $request, $id)
    {
        // dd($request->status); // pastikan nilainya valid: 'pending', 'diproses', 'selesai', atau 'ditolak'

        $validStatus = ['pending', 'diproses', 'selesai', 'ditolak'];

        if (!in_array($request->status, $validStatus)) {
            return back()->with('error', 'Status tidak valid.');
        }

        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = $request->status;
        $pengajuan->save();

        return redirect()->route('admin.pengajuan.index')->with('success', 'Pengajuan berhasil diverifikasi.');
    }
}
