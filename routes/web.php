<?php

use App\Http\Controllers\BiodataController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\LampiranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman awal (sementara diarahkan ke view 'test')
Route::get('/', function () {
    return view('test');
});

// --------------------------------------
// Autentikasi
// --------------------------------------
Auth::routes();

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/userdashboard', [DashboardController::class, 'indexuser'])->name('userdashboard');



Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register.post');
// --------------------------------------
// Dashboard
// --------------------------------------
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// --------------------------------------
// Manajemen User
// --------------------------------------
Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class)->except(['show']);

});

// --------------------------------------
// Jenis Surat
// --------------------------------------

Route::get('/pengajuan/{id}/cetak', [SuratController::class, 'cetak'])->name('pengajuan.cetak');
// --------------------------------------
// Pengajuan Surat (User)
//—--------------------------------------
Route::middleware('auth')->group(function () {


    Route::get('/tampil-surat', [SuratController::class, 'index'])->name('surat.index');
Route::get('/surat/create', [SuratController::class, 'create'])->name('surat.create');
Route::post('/surat/store', [SuratController::class, 'store'])->name('surat.store');
Route::get('/surat/{id}/edit', [SuratController::class, 'edit'])->name('surat.edit');
Route::put('/surat/{id}', [SuratController::class, 'update'])->name('surat.update');
Route::delete('/surat/{id}', [SuratController::class, 'destroy'])->name('surat.destroy');



    Route::get('/ajukan-surat', [PengajuanController::class, 'create'])->name('pengajuan.create');
    Route::post('/ajukan-surat', [PengajuanController::class, 'store'])->name('pengajuan.store');
    Route::get('/riwayat', [PengajuanController::class, 'riwayat'])->name('pengajuan.riwayat');
    Route::get('/pengajuan_terkirim', [PengajuanController::class, 'pengajuan_terkirim'])->name('pengajuan.pengajuan_terkirim');

    Route::get('/biodata', [BiodataController::class,'index'])->name('biodata.index');
    Route::post('/biodata-update',[BiodataController::class,'update'])->name('biodata.update');

    Route::get('/profile', [UserController::class,'profile'])->name('profile.index');
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');

});

// Digunakan untuk menampilkan form dinamis berdasarkan jenis surat
Route::get('/get-form-surat/{id}', [PengajuanController::class, 'getFormSurat']);
Route::get('/get-dokumen/{id}', [PengajuanController::class, 'getDokumen']);


// --------------------------------------
// Dokumen
// --------------------------------------
Route::middleware('auth')->group(function () {
    Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen.index');
    Route::get('/dokumen/create', [DokumenController::class, 'create'])->name('dokumen.create');
    Route::post('/dokumen', [DokumenController::class, 'store'])->name('dokumen.store');
    Route::get('/dokumen/{id}/edit', [DokumenController::class, 'edit'])->name('dokumen.edit');
    Route::put('/dokumen/{id}', [DokumenController::class, 'update'])->name('dokumen.update');
    Route::delete('/dokumen/{id}', [DokumenController::class, 'destroy'])->name('dokumen.destroy');
});

// --------------------------------------
// Pengajuan Surat (Admin)
// --------------------------------------
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/pengajuan-surat', [\App\Http\Controllers\Admin\PengajuanSuratController::class, 'index'])->name('admin.pengajuan.index');
    Route::get('/pengajuan-surat/{id}', [\App\Http\Controllers\Admin\PengajuanSuratController::class, 'show'])->name('admin.pengajuan.show');
    Route::post('/pengajuan-surat/{id}/verifikasi', [\App\Http\Controllers\Admin\PengajuanSuratController::class, 'verifikasi'])->name('admin.pengajuan.verifikasi');
    // routes/web.php
Route::put('/pengajuan/{id}/status', [\App\Http\Controllers\Admin\PengajuanSuratController::class, 'updateStatus'])->name('pengajuan.updateStatus');

});
Route::get('/pengajuan-surat/kadsek', [\App\Http\Controllers\Admin\PengajuanSuratController::class, 'indexkadsek'])->name('admin.pengajuan.kadsek');
Route::get('/pengajuan-kadsek/{id}', [\App\Http\Controllers\Admin\PengajuanSuratController::class, 'showkadsek'])->name('admin.pengajuan.showkadsek');

Route::middleware('auth')->group(function () {
});
// --------------------------------------
// Lampiran
// --------------------------------------
Route::post('/lampiran/{pengajuanId}', [LampiranController::class, 'store'])->name('lampiran.store');
