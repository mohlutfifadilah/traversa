<?php

use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GantiPassword;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\UsersController;
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
    return view('welcome');
});


## Admin

# Admin
Route::middleware(['Auth'])->group(function(){
    Route::get('/dashboard',  [DashboardController::class, 'index']);
    Route::get('/profil-user/edit/{id}', [ProfilController::class, 'edit'])->name('profil-user-edit');
    Route::put('/profil-user/update/{id}', [ProfilController::class, 'update'])->name('profil-user-update');

    // users
    Route::resource('users', UsersController::class);

    // armada
    Route::resource('armada', ArmadaController::class);

    // invoice
    Route::resource('invoice', InvoiceController::class);

    // riwayat
    Route::resource('riwayat', RiwayatController::class);
    // // profil
    // Route::get('/{jenjang}/profil/{id}', [ProfilController::class, 'index'])->name('profil-index');
    // Route::get('/{jenjang}/profil/edit/{id}', [ProfilController::class, 'edit'])->name('profil-edit');
    // Route::put('/{jenjang}/profil/update/{id}', [ProfilController::class, 'update'])->name('profil-update');

    // // tenaga-pengajar
    // Route::get('/{jenjang}/tenaga-pengajar/{id}', [TenagaPengajarController::class, 'index'])->name('tenagapengajar-index');
    // Route::get('/{jenjang}/tenaga-pengajar/create/{id}', [TenagaPengajarController::class, 'create'])->name('tenagapengajar-create');
    // Route::post('/{jenjang}/tenaga-pengajar/store/{id}', [TenagaPengajarController::class, 'store'])->name('tenagapengajar-store');
    // Route::get('/{jenjang}/tenaga-pengajar/edit/{profil}/{id}', [TenagaPengajarController::class, 'edit'])->name('tenagapengajar-edit');
    // Route::put('/{jenjang}/tenaga-pengajar/update/{profil}/{id}', [TenagaPengajarController::class, 'update'])->name('tenagapengajar-update');
    // Route::delete('/{jenjang}/tenaga-pengajar/destroy/{profil}/{id}', [TenagaPengajarController::class, 'destroy'])->name('tenagapengajar-destroy');

    // Route::get('/{jenjang}/tenaga-pengajar/export-excel/{id}', [TenagaPengajarController::class, 'export_excel'])->name('tenagapengajar-export-excel');
    // Route::get('/{jenjang}/tenaga-pengajar/export-pdf/{id}', [TenagaPengajarController::class, 'export_pdf'])->name('tenagapengajar-export-pdf');

    // // kegiatan
    // Route::get('/{jenjang}/kegiatan/{id}', [KegiatanController::class, 'index'])->name('kegiatan-index');
    // Route::get('/{jenjang}/kegiatan/create/{id}', [KegiatanController::class, 'create'])->name('kegiatan-create');
    // Route::post('/{jenjang}/kegiatan/store/{id}', [KegiatanController::class, 'store'])->name('kegiatan-store');
    // Route::get('/{jenjang}/kegiatan/edit/{profil}/{id}', [KegiatanController::class, 'edit'])->name('kegiatan-edit');
    // Route::put('/{jenjang}/kegiatan/update/{profil}/{id}', [KegiatanController::class, 'update'])->name('kegiatan-update');
    // Route::delete('/{jenjang}/kegiatan/destroy/{profil}/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan-destroy');

    // // artikel
    // Route::get('/{jenjang}/artikel/{id}', [ArtikelController::class, 'index'])->name('artikel-index');
    // Route::get('/{jenjang}/artikel/create/{id}', [ArtikelController::class, 'create'])->name('artikel-create');
    // Route::post('/{jenjang}/artikel/store/{id}', [ArtikelController::class, 'store'])->name('artikel-store');
    // Route::get('/{jenjang}/artikel/edit/{profil}/{id}', [ArtikelController::class, 'edit'])->name('artikel-edit');
    // Route::put('/{jenjang}/artikel/update/{profil}/{id}', [ArtikelController::class, 'update'])->name('artikel-update');
    // Route::delete('/{jenjang}/artikel/destroy/{profil}/{id}', [ArtikelController::class, 'destroy'])->name('artikel-destroy');

    Route::get('/gantiPassword/{id}', [GantiPassword::class, 'change'])->name('change-password');
    Route::put('/updatePassword/{id}', [GantiPassword::class, 'update'])->name('update-password');
});

// Login
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
