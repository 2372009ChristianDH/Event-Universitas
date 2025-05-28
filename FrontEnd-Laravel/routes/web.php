<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PanitiaController;

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

// Route Peserta
Route::get('/peserta/index', function () {
    return view('peserta.index');
});
Route::get('/peserta/event', function () {
    return view('peserta.event');
});
Route::get('/peserta/eventDetail', function () {
    return view('peserta.eventDetail');
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


// Route panitia
Route::get('/panitia/index', function () {
    return view('panitia.index');
});
Route::get('/panitia/event', function () {
    return view('panitia.event');
});
Route::get('/panitia/absensi', function () {
    return view('panitia.absensi');
});
Route::get('panitia/create',[PanitiaController::class, 'createEvent'])->name('panitia.createEvent');

// Route keuangan
Route::get('/keuangan/index', function () {
    return view('keuangan.index');
});

// Route admin
Route::get('/admin/index', function () {
    return view('admin.index');
});
Route::get('/admin/create', function () {
    return view('admin.create');
});
Route::get('/admin/user/index', [AdminController::class, 'index'])->name('admin.user.index'); 
Route::get('/admin/user/create', [AdminController::class, 'create'])->name('admin.user.create');



Route::get('/setting', function () {
    return view('setting');
});