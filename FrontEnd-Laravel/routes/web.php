<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\Panitia\EventController;
use App\Http\Middleware\AuthenticateRole;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\AbsensiController;

Route::get('/', function () {
    return view('index');
});



// Route login
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Route register
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.submit');


// ======================= PESERTA =======================
Route::middleware([AuthenticateRole::class . ':Peserta'])->group(function () {
    Route::get('/peserta/event/index', function () {
        return view('peserta.event.index');
    });
    
    Route::get('/peserta/event/index', [PesertaController::class, 'index'])->name('peserta.event.index');
    Route::get('/peserta/registrasi/{id_kegiatan}', [PesertaController::class, 'create'])->name('peserta.event.create');
    Route::post('/peserta/event/store', [PesertaController::class, 'store'])->name('peserta.event.store');


    Route::get('/peserta/index', function () {
        return view('peserta.index');
    });
    Route::get('/peserta/event', function () {
        return view('peserta.event');
    });
    Route::get('/peserta/eventRegristrasi', function () {
        return view('peserta.eventRegristrasi');
    });
    Route::get('/peserta/eventQr', function () {
        return view('peserta.eventQr');
    });
    Route::get('/peserta/eventSertifikat', function () {
        return view('peserta.eventSertifikat');
    });
});


// ======================= PANITIA =======================
Route::middleware([AuthenticateRole::class . ':Panitia'])->group(function () {
    Route::get('/panitia/index', function () {
        return view('panitia.index');
    });

    Route::get('/panitia/absensi/index', function () {
        return view('panitia.absensi');
    });

    // Event Routes
    Route::get('panitia/event', [EventController::class, 'index'])->name('panitia.event.index');
    Route::get('panitia/event/create',[EventController::class, 'create'])->name('panitia.event.create');
    Route::post('panitia/event/store',[EventController::class, 'store'])->name('panitia.event.store');
    Route::get('panitia/event/createSesi/{id_kegiatan}', [EventController::class, 'createSesi'])->name('panitia.event.createSesi');
    Route::post('panitia/event/storeSesi/{id_kegiatan}', [EventController::class, 'storeSesi'])->name('panitia.event.storeSesi');
});


// ======================= KEUANGAN =======================
Route::middleware([AuthenticateRole::class . ':Keuangan'])->group(function () {
    Route::get('/keuangan/index', function () {
        return view('keuangan.index');
    });
    Route::get('keuangan/index', [KeuanganController::class, 'index'])->name('keuangan.index');
    Route::get('keuangan/laporanPembayaran', [KeuanganController::class, 'indexLP'])->name('keuangan.laporanPembayaran');
    Route::post('keuangan/laporanPembayaran/{id}/terima', [KeuanganController::class, 'terima'])->name('registrasi.terima');
    Route::post('keuangan/laporanPembayaran/{id}/tolak', [KeuanganController::class, 'tolak'])->name('registrasi.tolak');
});


// ======================= ADMIN =======================
Route::middleware([AuthenticateRole::class . ':Admin'])->group(function () {
    Route::get('/admin/index', function () {
        return view('admin.index');
    });
    Route::get('/admin/user/index', [AdminController::class, 'index'])->name('admin.user.index'); 
    Route::get('/admin/user/create', [AdminController::class, 'create'])->name('admin.user.create');
    Route::post('/admin/user/store', [AdminController::class, 'store'])->name('admin.user.store');
    Route::get('/admin/user/edit/{id}', [AdminController::class, 'edit'])->name('admin.user.edit');
    Route::put('/admin/user/{id}', [AdminController::class, 'update'])->name('admin.user.update');
});


Route::middleware([AuthenticateRole::class . ':Panitia,Admin,Keuangan,Peserta'])->get('/setting', function () {
    return view('setting');
});
Route::middleware([AuthenticateRole::class . ':Panitia,Admin,Keuangan,Peserta'])->get('/eventDetail/{id}', [EventController::class, 'eventDetail'])->name('event.detailEvent'); 

Route::get('/absensi/scan/{id}', [AbsensiController::class, 'scan'])->name('absensi.scan');
