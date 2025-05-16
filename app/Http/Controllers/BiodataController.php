<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MasyarakatProfile;
use App\Models\OrangtuaProfile;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $user = Auth::user();

    // Ambil data masyarakat berdasarkan user_id
    $masyarakat = MasyarakatProfile::where('user_id', $user->id)->first();

    // Ambil data orang tua berdasarkan user_id
    $orangtua = OrangtuaProfile::where('masyarakat_user_id', $user->id)->first();

    return view('biodata.index', compact('user', 'masyarakat', 'orangtua'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
{
    $userId = auth()->id();

    // Simpan atau update data masyarakat
    $masyarakat = MasyarakatProfile::updateOrCreate(
        ['user_id' => $userId],
        [
            'jenis_kelamin' => $request->jenis_kelamin_m,
            'tempat_lahir' => $request->tempat_lahir_m,
            'tanggal_lahir' => $request->tanggal_lahir_m,
            'nik' => $request->nik,
            'sekolah' => $request->sekolah,
            'semester' => $request->semester,
            'nim' => $request->nim,
            'umur' => $request->umur,
            'nis' => $request->nis,
        ]
    );

    // Simpan atau update data orang tua
    $orangtua = OrangtuaProfile::updateOrCreate(
        ['masyarakat_user_id' => $userId],
        [
            'nama' => $request->nama_ortu,
            'jenis_kelamin' => $request->jenis_kelamin_o,
            'tempat_lahir' => $request->tempat_lahir_o,
            'tanggal_lahir' => $request->tanggal_lahir_o,
            'kewarganegaraan' => $request->kewarganegaraan,
            'agama' => $request->agama,
            'status_perkawinan' => $request->status_perkawinan,
            'pekerjaan' => $request->pekerjaan,
            'nomor_ktp' => $request->nomor_ktp,
            'alamat' => $request->alamat,
            'pendidikan' => $request->pendidikan,
            'penghasilan' => $request->penghasilan,
        ]
    );

    return redirect()->route('biodata.index')->with('success', 'Biodata berhasil diperbarui');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
