@extends('layouts.sidebar')
@section('content')
    <div class="dashboard-container">
        <!-- Main Content -->
        <main class="dashboard-main">
            <!-- Header -->
            <header class="dashboard-header">
                <div class="header-container">
                    <button type="button" class="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="header-title" style="padding: 10px">
                        <h1>Buat Sesi Event</h1>
                    </div>
                </div>
            </header>

            <div class="dashboard-content">
                <div class="admin-form">
                    <div class="admin-form-header">
                        <h2>Buat Sesi Event - <span style="color: blue;">{{ $kegiatan->nama_kegiatan }}</span></h2>
                        <p>Masukkan detail untuk sesi baru</p>
                    </div>

                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6"
                                style="margin-top:-15px;" role="alert">
                                @foreach ($errors->all() as $error)
                                    <p style="margin-top: 11px;">{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                    <form method="POST" action=" {{ route('panitia.event.storeSesi', ['id_kegiatan' => $kegiatan->id_kegiatan]) }} ">
                        @csrf
                        <div class="admin-form-section">
                            <div class="form-group">
                                <label for="nama_sesi">Judul Sesi</label>
                                <input type="text" id="nama_sesi" name="nama_sesi" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" id="tanggal" name="tanggal" required>
                            </div>
                            <div class="form-group">
                                <label for="waktu_mulai">Waktu Mulai</label>
                                <input type="time" id="waktu_mulai" name="waktu_mulai" required>
                            </div>
                            <div class="form-group">
                                <label for="waktu_selesai">Waktu Selesai</label>
                                <input type="time" id="waktu_selesai" name="waktu_selesai" required>
                            </div>
                            <div class="form-group">
                                <label for="lokasi">Lokasi</label>
                                <input type="text" id="lokasi" name="lokasi" required>
                            </div>
                            <div class="form-group">
                                <label for="narasumber">Narasumber</label>
                                <input type="text" id="narasumber" name="narasumber" required>
                            </div>
                            <div class="form-group">
                                <label for="biaya_registrasi">Biaya Registrasi</label>
                                <input type="number" id="biaya_registrasi" name="biaya_registrasi" step="0.01" min="0" required>
                            </div>
                            <div class="form-group">
                                <label for="maksimal_peserta">Maksimal Peserta</label>
                                <input type="number" id="maksimal_peserta" name="maksimal_peserta" min="1" required>
                            </div>
                        </div>
                        <div class="admin-form-footer">
                            <a href="{{ route('panitia.event.index') }}" class="btn btn-outline">Cancel</a>
                            <button type="submit" class="btn btn-primary">Buat Sesi</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    @endsection
