@extends('layouts.sidebar')

@section('content')
    <div class="dashboard-container">
        <main class="dashboard-main">
            <header class="dashboard-header">
                <div class="header-container">
                    <button type="button" class="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="header-title" style="padding: 10px">
                        <h1>Upload Sertifikat</h1>
                    </div>
                </div>
            </header>

            <div class="dashboard-content">
                <div class="admin-form">
                    <div class="admin-form-header">
                        <h4>Unggah Sertifikat untuk <span style="color: blue"> - {{ $registrasi->user->nama }}</span></h4>
                        <p>Event: <strong>{{ $registrasi->detailKegiatan->kegiatan->nama_kegiatan ?? '-' }}</strong></p>
                        <p>Sesi: <strong>{{ $registrasi->detailKegiatan->nama_sesi ?? '-' }}</strong></p>
                    </div>

                    <form method="POST" action="{{ route('panitia.sertifikat.store', $registrasi->id_registrasi) }}"
                        enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="event" value="{{ request('event') }}">
                        <input type="hidden" name="sesi" value="{{ request('sesi') }}">

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="admin-form-section">
                            <div class="form-group upload-wrapper">
                                <label class="form-label">File Sertifikat (PDF)</label>
                                <label for="sertifikat" class="upload-label">
                                    <i class="fas fa-upload upload-icon"></i> Pilih File
                                </label>
                                <input type="file" id="sertifikat" name="sertifikat" accept=".pdf" required hidden>
                                <div id="file-name" class="file-name">Belum ada file yang dipilih</div>
                            </div>
                        </div>

                        <div class="admin-form-footer">
                            <a href="{{ route('panitia.sertifikat.index') }}" class="btn btn-outline">Kembali</a>
                            <button type="submit" class="btn btn-primary">Upload Sertifikat</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('sertifikat');
            const fileNameDisplay = document.getElementById('file-name');

            fileInput.addEventListener('change', function() {
                if (fileInput.files.length > 0) {
                    fileNameDisplay.textContent = fileInput.files[0].name;
                } else {
                    fileNameDisplay.textContent = 'Belum ada file yang dipilih';
                }
            });
        });
    </script>
@endsection
