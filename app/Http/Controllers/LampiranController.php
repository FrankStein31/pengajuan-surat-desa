<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lampiran;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Storage;

class LampiranController extends Controller
{
    public function store(Request $request, $pengajuanId)
    {
        $request->validate([
            'nama_lampiran' => 'required|string',
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('file')->store('lampiran', 'public');

        Lampiran::create([
            'pengajuan_id' => $pengajuanId,
            'nama_lampiran' => $request->nama_lampiran,
            'file' => $path,
        ]);

        return redirect()->back()->with('success', 'Lampiran berhasil diunggah');
    }
}

