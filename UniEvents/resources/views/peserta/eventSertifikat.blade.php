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
                        <h1>My Certificates</h1>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="dashboard-content">
                <div class="dashboard-welcome">
                    <h2>Sertifikat Saya</h2>
                    <p>Lihat dan unduh sertifikat dari kegiatan yang telah Anda ikuti.</p>

                </div>

                <form method="GET" action="{{ route('peserta.sertifikat') }}">
                    <select name="event" onchange="this.form.submit()" class="form-control">
                        <option value="all" {{ request('event') == 'all' ? 'selected' : '' }}>Semua Kegiatan</option>
                        @foreach ($allEvents as $event)
                            <option value="{{ $event->id_kegiatan }}"
                                {{ request('event') == $event->id_kegiatan ? 'selected' : '' }}>
                                {{ $event->nama_kegiatan }}
                            </option>
                        @endforeach
                    </select>
                </form>

                <div class="certificates-grid">
                    @forelse ($sertifikatSaya as $serti)
                        <div class="certificate-card">
                            <div class="certificate-preview">
                                <iframe src="{{ asset('storage/' . $serti->file) }}" width="100%" height="200px"
                                    frameborder="0"></iframe>
                            </div>
                            <div class="certificate-info">
                                <h3>{{ $serti->kegiatan_nama }} <span class="certificate-type">{{ $serti->sesi }}</span>
                                </h3>
                                <p><i class="fas fa-calendar"></i> {{ $serti->tanggal }}</p>
                                <p><i class="fas fa-clock"></i> {{ $serti->waktu }} </p>
                                <div class="certificate-meta">
                                    <div class="overlay-actions">
                                        <a href="{{ asset('storage/' . $serti->file) }}" download
                                            class="btn btn-outline btn-sm">
                                            <i class="fas fa-download"></i> Download
                                        </a>
                                        <button onclick="shareSertifikat('{{ asset('storage/' . $serti->file) }}')"
                                            class="btn btn-outline btn-sm">
                                            <i class="fas fa-share"></i> Share
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p style="text-align: center; color: #6B7280;">Belum ada sertifikat yang tersedia.</p>
                    @endforelse

                </div>
            </div>
        </main>
    </div>

    <script>
        function shareSertifikat(url) {
            if (navigator.share) {
                navigator.share({
                    title: 'Sertifikat Kegiatan',
                    url: url
                }).catch(console.error);
            } else {
                prompt("Salin link sertifikat:", url);
            }
        }
    </script>
@endsection
