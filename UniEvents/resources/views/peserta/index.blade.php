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
                        <h1>Dashboard Peserta</h1>
                    </div>
                </div>
            </header>

            <div class="dashboard-content">
                <div class="dashboard-stats">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="stat-info">
                            <h3>{{ $totalRegistrasi }}</h3>
                            <p>Registered Events</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <div class="stat-info">
                            <h3>{{ $totalSertifikat }}</h3>
                            <p>Certificates Earned</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-info">
                            <h3>{{ $totalUpcoming }}</h3>
                            <p>Upcoming Events</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <div class="stat-info">
                            <h3>Rp {{ number_format($totalBayar, 0, ',', '.') }}</h3>
                            <p>Total Spent</p>
                        </div>
                    </div>
                </div>

                <div class="dashboard-sections">
                    <div class="section upcoming-events">
                        <div class="section-header">
                            <h3>Upcoming Events</h3>
                        </div>
                        <div class="event-list">
                            @forelse ($upcomingEvents as $event)
                                <div class="event-item">
                                    <div class="event-date">
                                        <span
                                            class="day">{{ \Carbon\Carbon::parse($event->tanggal)->format('d') }}</span>
                                        <span
                                            class="month">{{ \Carbon\Carbon::parse($event->tanggal)->format('M') }}</span>
                                    </div>
                                    <div class="event-details">
                                        <h4>{{ $event->detailKegiatan->kegiatan->nama_kegiatan }}</h4>
                                        <p><i class="fas fa-map-marker-alt"></i> {{ $event->detailKegiatan->lokasi }}</p>
                                        <p><i class="fas fa-clock"></i> {{ $event->detailKegiatan->waktu_mulai }} -
                                            {{ $event->detailKegiatan->waktu_selesai }}</p>
                                    </div>
                                    <div class="event-status">
                                        <span class="status"
                                            style="background: {{ $event->status_konfirmasi == 'Pending' ? '#fef9c3' : ($event->status_konfirmasi == 'Ditolak' ? '#fee2e2' : '#dcfce7') }};color: {{ $event->status_konfirmasi == 'Pending' ? '#b45309' : ($event->status_konfirmasi == 'Ditolak' ? '#b91c1c' : '#15803d') }};
                                                border-radius: 8px;
                                                padding: 4px 14px;
                                                font-weight: 600;
                                                display: inline-block;
                                            ">
                                            {{ $event->status_konfirmasi }}
                                        </span>
                                        <button class="btn-detail mt-1"
                                            onclick="openModal({{ $event->id_registrasi }})">Lihat Detail</button>
                                    </div>
                                </div>

                                <div id="modal-{{ $event->id_registrasi }}" class="custom-modal">
                                    <div class="modal-content">
                                        <span class="close"
                                            onclick="closeModal({{ $event->id_registrasi }})">&times;</span>
                                        <h4>Detail Registrasi</h4>
                                        <p><strong>Nama Kegiatan:</strong>
                                            {{ $event->detailKegiatan->kegiatan->nama_kegiatan }}</p>
                                        <p><strong>Tanggal:</strong> {{ $event->detailKegiatan->tanggal }}</p>
                                        <p><strong>Waktu:</strong> {{ $event->detailKegiatan->waktu_mulai }} -
                                            {{ $event->detailKegiatan->waktu_selesai }}</p>
                                        <p><strong>Lokasi:</strong> {{ $event->detailKegiatan->lokasi }}</p>
                                        <p><strong>Status:</strong> {{ $event->status_konfirmasi }}</p>
                                        @if ($event->status_konfirmasi == 'Ditolak')
                                            <div class="alert alert-danger mt-2">
                                                <strong>Alasan Penolakan:</strong><br>
                                                {{ $event->keterangan ?? 'Tidak ada keterangan.' }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-600 px-4" style="text-align: center;">Belum ada event mendatang.</p>
                            @endforelse
                        </div>
                    </div>

                    <div class="section recent-certificates">
                        <div class="section-header">
                            <h3>Recent Certificates</h3>
                        </div>
                        <div class="certificates-list">
                            @forelse ($sertifikat as $item)
                                <div class="certificate-item">
                                    <div class="certificate-preview"
                                        style="width: 130px; height: 160px; border: 1px solid #ccc; overflow: hidden; border-radius: 8px;">
                                        <iframe src="{{ asset('storage/' . $item->sertifikat) }}" width="130px"
                                            height="130px" frameborder="0" style="pointer-events: none;"></iframe>
                                        <p class="text-center mt-2">
                                            <a href="{{ asset('storage/' . $item->sertifikat) }}" target="_blank"
                                                class="btn btn-sm btn-outline-primary">Lihat Sertifikat</a>
                                        </p>
                                    </div>
                                    <div class="certificate-details" style="margin-left: 20px;">
                                        <h4>{{ $item->registrasi->detailKegiatan->kegiatan->nama_kegiatan }}</h4>
                                        <p>Issued on {{ \Carbon\Carbon::parse($item->waktu_unggah)->format('d M Y') }}</p>
                                    </div>
                                </div>
                            @empty
                                <p class="px-4 text-gray-500">Belum ada sertifikat tersedia.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function openModal(id) {
            document.getElementById('modal-' + id).style.display = 'block';
        }

        function closeModal(id) {
            document.getElementById('modal-' + id).style.display = 'none';
        }

        window.addEventListener('click', function(event) {
            document.querySelectorAll('.custom-modal').forEach(function(modal) {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            });
        });
    </script>
@endsection
