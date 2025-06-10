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
                        <h1>Keungan Dashboard</h1>
                    </div>
                    <div class="header-actions">
                        <div class="search-bar">
                            <input type="text" placeholder="Search...">
                            <button type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <div class="notifications">
                            <button type="button" class="notification-btn">
                                <i class="fas fa-bell"></i>
                                <span class="notification-badge">12</span>
                            </button>
                        </div>
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
                        <i class="fas fa-times text-xl" style="margin-right: 20px"></i> <!-- ✅ ukuran ikon diperbesar -->
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
                            <p>Pemabayran Disetujui</p>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon red">
                            <i class="fas fa-times-circle"></i>
                        </div>
                        <div class="stat-info">
                            <h3>{{ $ditolak }}</h3>
                            <p>Pemabayran Ditolak</p>
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
                    <div class="section pending-payments">
                        <div class="section-header">
                            <h3>Menunggu Persetujuan</h3>
                            <a href="finance-pending.html">View All</a>
                        </div>
                        <div class="payment-table-wrapper">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Nama Event</th>
                                        <th>Tanggal Registrasi</th>
                                        <th>Status</th>
                                        {{-- <th>Actions</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pendingRegistrasi as $reg)
                                        <tr>
                                            <td>
                                                <div class="user-info">
                                                    <span>{{ $reg->user->nama }}</span>
                                                </div>
                                            </td>
                                            <td>{{ $reg->detailKegiatan->kegiatan->nama_kegiatan ?? 'N/A' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($reg->tanggal_registrasi)->format('d M Y') }}</td>
                                            {{-- <td>
                                                <a href="{{ asset('storage/' . $reg->bukti_pembayaran) }}" target="_blank"
                                                    class="btn-icon view-receipt" title="View Receipt">
                                                    <i class="fas fa-file-invoice"></i>
                                                </a>
                                            </td> --}}
                                            <td>{{ $reg->status_konfirmasi }}</td>
                                            {{-- <td>
                                                <div class="action-buttons">
                                                    <form action=""
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn-icon approve" title="Approve">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </form>
                                                    <form action=""
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn-icon reject" title="Reject">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td> --}}
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada registrasi pending.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="section revenue-overview">
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
                                <div class="bar-chart">
                                    <div class="chart-bars">
                                        <div class="chart-bar" style="height: 60%">
                                            <div class="bar-tooltip">$750</div>
                                        </div>
                                        <div class="chart-bar" style="height: 45%">
                                            <div class="bar-tooltip">$540</div>
                                        </div>
                                        <div class="chart-bar" style="height: 75%">
                                            <div class="bar-tooltip">$900</div>
                                        </div>
                                        <div class="chart-bar" style="height: 85%">
                                            <div class="bar-tooltip">$1,020</div>
                                        </div>
                                        <div class="chart-bar" style="height: 55%">
                                            <div class="bar-tooltip">$650</div>
                                        </div>
                                        <div class="chart-bar" style="height: 70%">
                                            <div class="bar-tooltip">$840</div>
                                        </div>
                                        <div class="chart-bar" style="height: 30%">
                                            <div class="bar-tooltip">$150</div>
                                        </div>
                                    </div>
                                    <div class="chart-labels">
                                        <span>Jun 1</span>
                                        <span>Jun 5</span>
                                        <span>Jun 10</span>
                                        <span>Jun 15</span>
                                        <span>Jun 20</span>
                                        <span>Jun 25</span>
                                        <span>Jun 30</span>
                                    </div>
                                </div>
                            </div>
                            <div class="revenue-summary">
                                <div class="summary-item">
                                    <span class="label">Total Revenue</span>
                                    <span class="value">$4,850</span>
                                </div>
                                <div class="summary-item">
                                    <span class="label">Most Profitable Event</span>
                                    <span class="value">Tech Conference</span>
                                    <span class="subvalue">$1,425</span>
                                </div>
                                <div class="summary-item">
                                    <span class="label">Average Event Revenue</span>
                                    <span class="value">$485</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
