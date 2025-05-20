<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});

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
Route::get('/panitia/create', function () {
    return view('panitia.create');
});
Route::get('/panitia/absensi', function () {
    return view('panitia.absensi');
});

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