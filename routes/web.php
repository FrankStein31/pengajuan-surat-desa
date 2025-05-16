<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\PengajuanSuratController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//auth default laravel
Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// Route::middleware(['auth'])->group(function() {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });

// Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/logout', function (){
    Auth::logout();
    return redirect('/login');
})->name('logout');

// Route::resource('surat', SuratController::class);

// // CRUD Manajemen User
Route::resource('users', UserController::class)->middleware('auth');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

// Halaman daftar pengguna (hanya admin yang bisa mengakses)
// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/users', [UserController::class, 'index'])->name('users.index');
//     Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
//     Route::post('/users', [UserController::class, 'store'])->name('users.store');
//     Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
//     Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
//     Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
// });

// CRUD SURAT (Jenis Surat)
// Route untuk menampilkan daftar surat
Route::get('/tampil-surat', [SuratController::class, 'index'])->name('surat.index');

// Route untuk menampilkan form tambah surat
Route::get('/surat/create', [SuratController::class, 'create'])->name('surat.create');

// Route untuk menyimpan surat baru
Route::post('/surat/store', [SuratController::class, 'store'])->name('surat.store');

// Route untuk menampilkan form edit surat berdasarkan ID
Route::get('/surat/{id}/edit', [SuratController::class, 'edit'])->name('surat.edit');

// Route untuk memperbarui data surat berdasarkan ID
Route::put('/surat/{id}', [SuratController::class, 'update'])->name('surat.update');

// Route untuk menghapus surat berdasarkan ID
Route::delete('/surat/{id}', [SuratController::class, 'destroy'])->name('surat.destroy');


//Pengajuan
Route::middleware('auth')->group(function () {
    Route::get('/ajukan-surat', [PengajuanController::class, 'create'])->name('pengajuan.create');
    Route::post('/ajukan-surat', [PengajuanController::class, 'store'])->name('pengajuan.store');
});
Route::get('/get-form-surat/{id}', [PengajuanController::class, 'getFormSurat']);
Route::get('/riwayat', [PengajuanController::class, 'riwayat'])->middleware('auth')->name('pengajuan.riwayat');

//Dokumen
Route::middleware(['auth'])->group(function () {
    Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen.index');
    Route::get('/dokumen/create', [DokumenController::class, 'create'])->name('dokumen.create');
    Route::post('/dokumen', [DokumenController::class, 'store'])->name('dokumen.store');
    Route::get('/dokumen/{id}/edit', [DokumenController::class, 'edit'])->name('dokumen.edit');
    Route::put('/dokumen/{id}', [DokumenController::class, 'update'])->name('dokumen.update');
    Route::delete('/dokumen/{id}', [DokumenController::class, 'destroy'])->name('dokumen.destroy');
});

//pengajuan surat admin
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/pengajuan-surat', [\App\Http\Controllers\Admin\PengajuanSuratController::class, 'index'])->name('admin.pengajuan.index');
    Route::get('/pengajuan-surat/{id}', [\App\Http\Controllers\Admin\PengajuanSuratController::class, 'show'])->name('admin.pengajuan.show');
    Route::post('/pengajuan-surat/{id}/verifikasi', [\App\Http\Controllers\Admin\PengajuanSuratController::class, 'verifikasi'])->name('admin.pengajuan.verifikasi');
});

//Lampiran
Route::post('/lampiran/{pengajuanId}', [LampiranController::class, 'store'])->name('lampiran.store');



