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
                        <h1>Edit Event</h1>
                    </div>
                </div>
            </header>

            <div class="dashboard-content">
                <div class="admin-form">
                    <div class="admin-form-header">
                        <h2>Edit Event - <span style="color: blue;">{{ $event->nama_kegiatan }}</span></h2>
                        <p>Perbarui detail event berikut</p>
                    </div>

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6"
                             style="margin-top:-15px;" role="alert">
                            @foreach ($errors->all() as $error)
                                <p style="margin-top: 11px;">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ route('panitia.event.update', ['id_kegiatan' => $event->id_kegiatan]) }}">
                        @csrf
                        @method('PUT')
                        <div class="admin-form-section">
                            <div class="form-group">
                                <label for="nama_kegiatan">Nama Event</label>
                                <input type="text" id="nama_kegiatan" name="nama_kegiatan" value="{{ old('nama_kegiatan', $event->nama_kegiatan) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_mulai">Tanggal Mulai</label>
                                <input type="date" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai', $event->tanggal_mulai) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_selesai">Tanggal Selesai</label>
                                <input type="date" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai', $event->tanggal_selesai) }}" required>
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
    </div>
@endsection