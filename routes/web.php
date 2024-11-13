<?php

use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GantiPassword;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\UsersController;
use App\Models\Armada;
use App\Models\Kategori;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Route;

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
    $armada = Armada::orderBy('created_at', 'ASC')->limit(3)->get();
    return view('home', compact('armada'));
});
Route::get('/list-armada', function () {
    $kategori = Kategori::all();
    $armada = Armada::all();
    return view('armada', compact('kategori', 'armada'));
});
Route::get('/pesan', function () {
    $jenis_pembayaran = Pembayaran::all();
    return view('pesan', compact('jenis_pembayaran'));
});
Route::post('/submit_pesan', [InvoiceController::class, 'submit_pesan'])->name('submit_pesan');

// Login
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

# Admin
Route::middleware(['Auth'])->group(function(){
    Route::get('/dashboard',  [DashboardController::class, 'index']);
    Route::get('/profil-user/edit/{id}', [ProfilController::class, 'edit'])->name('profil-user-edit');
    Route::put('/profil-user/update/{id}', [ProfilController::class, 'update'])->name('profil-user-update');

    // users
    Route::resource('users', UsersController::class);

    // kategori
    Route::resource('kategori', KategoriController::class);

    // armada
    Route::resource('armada', ArmadaController::class);

    // invoice
    Route::resource('invoice', InvoiceController::class);
    Route::post('/submit_tarif/{id}', [InvoiceController::class, 'submit_tarif'])->name('submit_tarif');

    // riwayat
    Route::resource('riwayat', RiwayatController::class);
    Route::get('/cetak_invoice/{id}', [RiwayatController::class, 'cetak_invoice'])->name('cetak_invoice');
    Route::post('/riwayat_paid/{id}', [RiwayatController::class, 'riwayat_paid'])->name('riwayat_paid');
    Route::get('/export-excel', [RiwayatController::class, 'export_excel'])->name('riwayat-export-excel');
    Route::get('/export-pdf', [RiwayatController::class, 'export_pdf'])->name('riwayat-export-pdf');

    Route::get('/gantiPassword/{id}', [GantiPassword::class, 'change'])->name('change-password');
    Route::put('/updatePassword/{id}', [GantiPassword::class, 'update'])->name('update-password');
});


