<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Auth;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $user = Auth::user(); // Mengambil data user yang sedang login
        $jumlahMasyarakat = User::where('role', 'masyarakat')->count(); // Contoh pengambilan jumlah masyarakat

        return view('home', compact('jumlahMasyarakat'));
    }
}
