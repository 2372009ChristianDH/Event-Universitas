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

                    <form method="POST" action="{{ route('panitia.event.store') }}">
                        @csrf
                        <div class="admin-form-section">
                            <div class="form-group">
                                <label for="nama_kegiatan">Nama Event</label>
                                <input type="text" id="nama_kegiatan" name="nama_kegiatan" required maxlength="100">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_mulai">Tanggal Mulai</label>
                                <input type="date" id="tanggal_mulai" name="tanggal_mulai" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_selesai">Tanggal Selesai</label>
                                <input type="date" id="tanggal_selesai" name="tanggal_selesai" required>
                            </div>
                        </div>
                        <div class="admin-form-footer">
                            <a href="{{ route('panitia.event.index') }}" class="btn btn-outline">Cancel</a>
                            <button type="submit" class="btn btn-primary">Buat Event</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    @endsection
