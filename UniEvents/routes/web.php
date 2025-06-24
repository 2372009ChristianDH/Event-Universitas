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
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Panitia\PanitiaController;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [IndexController::class, 'index'])->name('index');



// Route login
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Route register
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.submit');


// ======================= PESERTA =======================
Route::middleware([AuthenticateRole::class . ':Peserta'])->group(function () {
    
    
    Route::get('/peserta/index', function () {
        return view('peserta.index');
    });
    Route::get('peserta/index', [PesertaController::class, 'index'])->name('peserta.index');
    Route::get('/peserta/event/index', function () {
        return view('peserta.event.index');
    });
    Route::get('/peserta/event/index', [PesertaController::class, 'indexEvent'])->name('peserta.event.index');
    Route::get('/peserta/registrasi/{id_kegiatan}', [PesertaController::class, 'create'])->name('peserta.event.create');
    Route::post('/peserta/event/store', [PesertaController::class, 'store'])->name('peserta.event.store');
    Route::get('/peserta/eventRegristrasi', function () {
        return view('peserta.eventRegristrasi');
    });
    Route::get('/peserta/eventQr', [PesertaController::class, 'myQrCodes'])->name('qr.my');
    Route::get('/peserta/eventSertifikat', function () {
        return view('peserta.eventSertifikat');
    });
    Route::get('/peserta/eventSertifikat', [PesertaController::class, 'Sertifikat'])->name('peserta.sertifikat');
});


// ======================= PANITIA =======================
Route::middleware([AuthenticateRole::class . ':Panitia'])->group(function () {
    // Route::get('/panitia/index', function () {
    //     return view('panitia.index');
    // });

    Route::get('/panitia/index', [PanitiaController::class, 'index'])->name('panitia.index');

    Route::get('/panitia/absensi/index', function () {
        return view('panitia.absensi.index');
    });

    Route::get('/panitia/absen/index',[AbsensiController::class, 'index'])->name('panitia.absen');

    // Event Routes
    Route::get('panitia/event', [EventController::class, 'index'])->name('panitia.event.index');
    Route::get('panitia/event/create', [EventController::class, 'create'])->name('panitia.event.create');
    Route::post('panitia/event/store', [EventController::class, 'store'])->name('panitia.event.store');
    Route::get('panitia/event/edit/{id_kegiatan}', [EventController::class, 'edit'])->name('panitia.event.edit');
    Route::put('panitia/event/update/{id_kegiatan}', [EventController::class, 'update'])->name('panitia.event.update');

    // Route sesi
    Route::get('panitia/event/createSesi/{id_kegiatan}', [EventController::class, 'createSesi'])->name('panitia.event.createSesi');
    Route::post('panitia/event/storeSesi/{id_kegiatan}', [EventController::class, 'storeSesi'])->name('panitia.event.storeSesi');
    Route::get('/panitia/event/editSesi/{id_sesi}', [EventController::class, 'editSesi'])->name('panitia.event.sesi.edit');
    Route::post('/panitia/event/updateSesi/{id_sesi}', [EventController::class, 'updateSesi'])->name('panitia.event.sesi.update');
    Route::delete('/panitia/event/deleteSesi/{id_sesi}', [EventController::class, 'deleteSesi'])->name('panitia.event.sesi.delete');

    // Route sertifikat
    Route::get('/panitia/sertifikat/index', [PanitiaController::class, 'indexSertifikat'])->name('panitia.sertifikat.index');
    Route::get('/panitia/sesi-by-event/{id}', [PanitiaController::class, 'getSesiByEvent']);
    Route::get('/panitia/sertifikat/upload/{id}', [PanitiaController::class, 'createSertifikat'])->name('panitia.sertifikat.create');
    Route::post('/panitia/sertifikat/upload/{id}', [PanitiaController::class, 'storeSertifikat'])->name('panitia.sertifikat.store');

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
    Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/user/index', [AdminController::class, 'indexUser'])->name('admin.user.index');
    Route::get('/admin/user/create', [AdminController::class, 'create'])->name('admin.user.create');
    Route::post('/admin/user/store', [AdminController::class, 'store'])->name('admin.user.store');
    Route::get('/admin/user/edit/{id}', [AdminController::class, 'edit'])->name('admin.user.edit');
    Route::put('/admin/user/{id}', [AdminController::class, 'update'])->name('admin.user.update');
    Route::post('/admin/user/{id}', [AdminController::class, 'delete'])->name('admin.user.delete');
});


// Route::middleware([AuthenticateRole::class . ':Panitia,Admin,Keuangan,Peserta'])->get('/setting', function () {
//     return view('setting');
// });
Route::middleware([AuthenticateRole::class . ':Panitia,Admin,Keuangan,Peserta'])->get('/eventDetail/{id}', [EventController::class, 'eventDetail'])->name('event.detailEvent');

Route::get('/absensi/scan/{id}', [AbsensiController::class, 'scan'])->name('absensi.scan');
Route::get('/api/sessions/by-event/{id}', [AbsensiController::class, 'getSessionsByEvent']);

