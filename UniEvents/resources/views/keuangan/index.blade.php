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
                    <h1>Keuangan Dashboard</h1>
                </div>
            </div>
        </header>

        @if (session('success'))
        <div id="success-alert"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 flex justify-between items-center gap-4"
            role="alert" style="width: 100%;">
            <div class="flex items-start gap-2">
                <i class="fas fa-check-circle text-green-600 mt-1 text-lg"></i>
                <div>
                    <strong class="font-semibold">Success!</strong>
                    <span class="block">{{ session('success') }}</span>
                </div>
            </div>
            <button onclick="document.getElementById('success-alert').remove()"
                class="text-green-700 hover:text-green-900 focus:outline-none self-center">
                <i class="fas fa-times text-xl" style="margin-right: 20px"></i>
            </button>
        </div>
        @endif

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <div class="dashboard-welcome">
                <h2>Manajemen Keuangan</h2>
                <p>Mengelola pembayaran dan catatan keuangan untuk event universitas</p>
            </div>

            <div class="dashboard-stats">
                <div class="stat-card">
                    <div class="stat-icon orange">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-info">
                        <h3>{{ $pendingVerifications }}</h3>
                        <p>Menunggu Persetujuan</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon green">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-info">
                        <h3>{{ $disetujui }}</h3>
                        <p>Pembayaran Disetujui</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon red">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="stat-info">
                        <h3>{{ $ditolak }}</h3>
                        <p>Pembayaran Ditolak</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon purple">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="stat-info">
                        <h3>{{ $activeEvents }}</h3>
                        <p>Event Aktif</p>
                    </div>
                </div>
            </div>

            <div class="dashboard-sections">
                <!-- Registrasi Pending -->
                <div class="section pending-payments">
                    <div class="section-header">
                        <h3>Menunggu Persetujuan</h3>
                        <a href="#">View All</a>
                    </div>
                    <div class="payment-table-wrapper">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Nama Event</th>
                                    <th>Tanggal Registrasi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pendingRegistrasi as $reg)
                                <tr>
                                    <td>{{ $reg->user->nama }}</td>
                                    <td>{{ $reg->detailKegiatan->kegiatan->nama_kegiatan ?? 'N/A' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($reg->tanggal_registrasi)->format('d M Y') }}</td>
                                    <td>{{ $reg->status_konfirmasi }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada registrasi pending.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Revenue Overview -->
                <div class="section revenue-overview mt-6">
                    <div class="section-header">
                        <h3>Revenue Overview</h3>
                        <div class="date-filter">
                            <select id="time-period">
                                <option value="week">This Week</option>
                                <option value="month" selected>This Month</option>
                                <option value="quarter">This Quarter</option>
                                <option value="year">This Year</option>
                            </select>
                        </div>
                    </div>
                    <div class="revenue-chart">
                        <div class="chart-placeholder">
                            <canvas id="revenueChart" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const revenueData = @json($revenueByDate);

    const labels = revenueData.map(item => item.tanggal);
    const values = revenueData.map(item => item.total);

    const ctx = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Pendapatan Harian (Rp)',
                data: values,
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function (value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });
</script>
@endsection
