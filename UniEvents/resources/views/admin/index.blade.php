{{-- filepath: d:\EventUniversitas\FrontEnd-Laravel\resources\views\admin\index.blade.php --}}
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
                        <h1>Administrator Dashboard</h1>
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
                    <h2>Administrator Control Panel</h2>
                    <p>Manage users, teams, and system settings</p>
                </div>

                <div class="dashboard-stats">
                    <div class="stat-card">
                        <div class="stat-icon blue">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-info">
                            <h3>{{ $totalUsers }}</h3>
                            <p>Total Users</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon green">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="stat-info">
                            <h3>{{ $activeEvents }}</h3>
                            <p>Event Aktif</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon purple">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="stat-info">
                            <h3>{{ $committeeCount }}</h3>
                            <p>Panitia</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon orange">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <div class="stat-info">
                            <h3>{{ $financeCount }}</h3>
                            <p>Keuangan</p>
                        </div>
                    </div>
                </div>
                
                <div class="dashboard-sections">
                    <div class="section user-management">
                        <div class="section-header">
                            <h3>Team Management</h3>
                        </div>
                        <div class="user-table-wrapper">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($teamMembers as $member)
                                    <tr>
                                        <td>
                                            <div class="user-info">
                                                <span>{{ $member->nama }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $member->role->nama_role }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="section recent-activities">
                        <div class="section-header">
                            <h3>Aktivitas Terkini</h3>
                        </div>
                        <div class="activity-list">
                            @foreach($recentActivities as $activity)
                            <div class="activity-item">
                                <div class="activity-icon {{ $activity->color }}">
                                    <i class="fas {{ $activity->icon }}"></i>
                                </div>
                                <div class="activity-details">
                                    <p>{!! $activity->description !!}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="dashboard-sections">
                    <div class="section system-summary">
                        <div class="section-header">
                            <h3>Ringkasan Sistem</h3>
                        </div>
                        <div class="summary-cards">
                            <div class="summary-card">
                                <div class="summary-header">
                                    <h4>Distribusi Pengguna</h4>
                                </div>
                                <div class="summary-content">
                                    <div class="chart-placeholder" style="width:220px; margin:auto;">
                                        <canvas id="userPieChart" width="200" height="200"></canvas>
                                    </div>
                                    <div class="chart-legend">
                                        <div class="legend-item">
                                            <span class="legend-color regular" style="background:rgba(54,162,235,0.7);"></span>
                                            <span class="legend-label">Peserta</span>
                                            <span class="legend-value">{{ $regularMembers }}</span>
                                        </div>
                                        <div class="legend-item">
                                            <span class="legend-color committee" style="background:rgba(255,206,86,0.7);"></span>
                                            <span class="legend-label">Panitia</span>
                                            <span class="legend-value">{{ $committeeCount }}</span>
                                        </div>
                                        <div class="legend-item">
                                            <span class="legend-color finance" style="background:rgba(255,99,132,0.7);"></span>
                                            <span class="legend-label">Keuangan</span>
                                            <span class="legend-value">{{ $financeCount }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="summary-card">
                                <div class="summary-header">
                                    <h4>Events Overview</h4>
                                </div>
                                <div class="summary-content">
                                    <div class="stats-grid">
                                        <div class="stat-box">
                                            <h5>{{ $activeEvents }}</h5>
                                            <p>Event Aktif</p>
                                        </div>
                                        <div class="stat-box">
                                            <h5>{{ $eventsThisWeek }}</h5>
                                            <p>This Week</p>
                                        </div>
                                        <div class="stat-box">
                                            <h5>{{ $eventsThisMonth }}</h5>
                                            <p>This Month</p>
                                        </div>
                                        <div class="stat-box">
                                            <h5>{{ $totalRegistrations }}</h5>
                                            <p>Registrations</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const userDistribution = @json([$regularMembers, $committeeCount, $financeCount]);
        const userLabels = @json(['Peserta', 'Panitia', 'Keuangan']);
        const ctx = document.getElementById('userPieChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: userLabels,
                datasets: [{
                    data: userDistribution,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.7)',   // Peserta
                        'rgba(255, 206, 86, 0.7)',   // Panitia
                        'rgba(255, 99, 132, 0.7)'    // Keuangan
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false // Legend sudah ada di HTML
                    }
                }
            }
        });
    </script>
@endsection