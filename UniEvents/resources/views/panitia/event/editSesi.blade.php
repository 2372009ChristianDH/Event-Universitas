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
                        <h1>Edit Sesi Event</h1>
                    </div>
                </div>
            </header>

            <div class="dashboard-content">
                <div class="admin-form">
                    <div class="admin-form-header">
                        <h2>Edit Sesi - <span style="color: blue;">{{ $kegiatan->nama_kegiatan }}</span></h2>
                        <p>Perbarui detail sesi berikut</p>
                    </div>

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6"
                             style="margin-top:-15px;" role="alert">
                            @foreach ($errors->all() as $error)
                                <p style="margin-top: 11px;">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ route('panitia.event.sesi.update', ['id_sesi' => $sesi->id_detail_kegiatan]) }}">
                        @csrf
                        <div class="admin-form-section">
                            <div class="form-group">
                                <label for="nama_sesi">Judul Sesi</label>
                                <input type="text" id="nama_sesi" name="nama_sesi" value="{{ old('nama_sesi', $sesi->nama_sesi) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', $sesi->tanggal) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="waktu_mulai">Waktu Mulai</label>
                                <input type="time" id="waktu_mulai" name="waktu_mulai" value="{{ old('waktu_mulai', $sesi->waktu_mulai) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="waktu_selesai">Waktu Selesai</label>
                                <input type="time" id="waktu_selesai" name="waktu_selesai" value="{{ old('waktu_selesai', $sesi->waktu_selesai) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="lokasi">Lokasi</label>
                                <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi', $sesi->lokasi) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="narasumber">Narasumber</label>
                                <input type="text" id="narasumber" name="narasumber" value="{{ old('narasumber', $sesi->narasumber) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="biaya_registrasi">Biaya Registrasi</label>
                                <input type="number" id="biaya_registrasi" name="biaya_registrasi" step="0.01" min="0"
                                       value="{{ old('biaya_registrasi', $sesi->biaya_registrasi) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="maksimal_peserta">Maksimal Peserta</label>
                                <input type="number" id="maksimal_peserta" name="maksimal_peserta" min="1"
                                       value="{{ old('maksimal_peserta', $sesi->maksimal_peserta) }}" required>
                            </div>
                        </div>
                        <div class="admin-form-footer">
                            <a href="{{ route('panitia.event.index') }}" class="btn btn-outline">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    @endsection
