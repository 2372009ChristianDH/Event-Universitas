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
                        <h1>Event Committee Dashboard</h1>
                    </div>
                </div>
            </header>

            <div class="dashboard-content">
                <div class="dashboard-header-actions">
                    <h2>Kelola Event Anda</h2>
                </div>

                <div class="dashboard-stats">
                    <div class="stat-card">
                        <div class="stat-icon purple">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <div class="stat-info">
                            <h3>{{ $totalEvents }}</h3>
                            <p>Total Event</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon blue">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="stat-info">
                            <h3>{{ $activeEvents }}</h3>
                            <p>Event Aktif</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon green">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <div class="stat-info">
                            <h3>{{ $totalRegistrasi }}</h3>
                            <p>Total Registrasi</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon orange">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <div class="stat-info">
                            <h3>{{ $totalSertifikat }}</h3>
                            <p>Certificates Issued</p>
                        </div>
                    </div>
                </div>

                <div class="dashboard-sections">
                    <div class="section active-events">
                        <div class="section-header">
                            <h3>Event Aktif</h3>
                        </div>
                        <div class="event-table-wrapper">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>Nama Event</th>
                                        <th>Sesi</th>
                                        <th>Total Registrasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kegiatan as $k)
                                        <tr>
                                            <td>{{ $k->nama_kegiatan }}</td>
                                            <td>{{ $k->detailKegiatan->count() }}</td>
                                            <td>{{ $k->registrasi_count }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Tidak ada event aktif saat ini.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="dashboard-sections">
                    <div class="section certificate-uploads">
                        <div class="section-header">
                            <h3>Unggahan Sertifikat yang Tertunda</h3>
                        </div>
                        <div class="certificates-list">
                            @forelse ($pendingCertificates as $detail)
                                <div class="certificate-task">
                                    <div class="task-info">
                                        <h4>{{ $detail->kegiatan->nama_kegiatan }} - Sesi {{ $detail->sesi }}</h4>
                                        <p>{{ $detail->pending_count }} peserta sedang menunggu sertifikat</p>
                                    </div>
                                </div>
                            @empty
                                <p>Tidak ada sertifikat yang tertunda untuk diunggah.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
