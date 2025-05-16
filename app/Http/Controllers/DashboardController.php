<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
{
    $user = Auth::user();

    // Data pengajuan terbaru
    $pengajuans = Pengajuan::with(['user', 'surat'])->latest()->take(2)->get();

    // Statistik umum
    $jumlahMasyarakat = User::where('role', 'masyarakat')->count();
    $total = Pengajuan::count();
    $pending = Pengajuan::where('status', 'pending')->count();
    $proses = Pengajuan::where('status', 'diproses')->count();
    $selesai = Pengajuan::where('status', 'selesai')->count();
    $jumlahDokumen = Dokumen::count();

    // Statistik pengajuan per jenis surat per bulan
    $data = DB::table('pengajuans')
        ->selectRaw('jenis_surat_id, MONTH(created_at) as bulan, COUNT(*) as total')
        ->groupBy('jenis_surat_id', 'bulan')
        ->orderBy('bulan')
        ->get();

    $jenisIds = $data->pluck('jenis_surat_id')->unique();

    // Ambil nama surat dari tabel jenis_surat
    $jenisSurat = DB::table('surat')
        ->whereIn('id', $jenisIds)
        ->pluck('jenis_surat', 'id'); // [id => nama]

    $dataChart = [];

    foreach ($jenisIds as $id) {
        $nama = $jenisSurat[$id] ?? "Surat ID $id";
        $dataChart[$nama] = array_fill(1, 12, 0); // bulan 1-12 isi 0
    }

    foreach ($data as $item) {
        $nama = $jenisSurat[$item->jenis_surat_id] ?? "Surat ID $item->jenis_surat_id";
        $dataChart[$nama][$item->bulan] = $item->total;
    }

    return view('dashboard', compact(
        'user',
        'jumlahDokumen',
        'jumlahMasyarakat',
        'total',
        'pending',
        'proses',
        'selesai',
        'pengajuans',
        'dataChart'
    ));
}

public function indexuser()
{
    $user = Auth::user();

    // Data pengajuan terbaru
    $pengajuans = Pengajuan::with(['user', 'surat'])->where('user_id', auth()->id())->latest()->take(2)->get();

    // Statistik umum
    $jumlahMasyarakat = User::where('role', 'masyarakat')->count();
    $total = Pengajuan::where('user_id', auth()->id())->count();
$pending = Pengajuan::where('user_id', auth()->id())
                ->where('status', 'pending')
                ->count();
$proses = Pengajuan::where('user_id', auth()->id())
                ->where('status', 'diproses')
                ->count();
$selesai = Pengajuan::where('user_id', auth()->id())
                ->where('status', 'selesai')
                ->count();
    $jumlahDokumen = Dokumen::count();



    return view('userdashboard', compact(
        'user',
        'jumlahDokumen',
        'jumlahMasyarakat',
        'total',
        'pending',
        'proses',
        'selesai',
        'pengajuans'
    ));
}

}
