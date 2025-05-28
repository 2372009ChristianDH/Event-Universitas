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
                    <div class="header-title">
                        <h1>Buat Event</h1>
                    </div>
                </div>
            </header>

            <div class="dashboard-content">
                <div class="admin-form">
                    <div class="admin-form-header">
                        <h2>Buat Event Universitas</h2>
                        <p>Masukkan detail untuk Event baru</p>
                    </div>

                    <form metthod="POST" action="">
                        @csrf
                        <div class="admin-form-section">
                            <h3 style="margin-top: -20px;"></h3>
                            <div class="form-group">
                                <label for="nama_kegiatan">Nama Event</label>
                                <input type="text" id="nama_kegiatan" name="nama_kegiatan" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_mulai">Tanggal Mulai</label>
                                <input type="date" id="tanggal_mulai" name="tanggal_mulai" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_selesai">Tanggal Selesai</label>
                                <input type="date" id="tanggal_selesai" name="tanggal_selesai" required>
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
                                <label for="maksimal_peserta">Maksimal Peseta</label>
                                <input type="number" id="maksimal_peserta" name="maksimal_peserta" min="0" required>
                            </div>
                        </div>
                        <div class="admin-form-footer">
                            <a href="" class="btn btn-outline">Cancel</a>
                            <button type="submit" class="btn btn-primary">Add Team Member</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
@endsection