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
                        <h1>Event Committee Dashboard</h1>
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
                                <span class="notification-badge">3</span>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="dashboard-content">
                <div class="dashboard-header-actions">
                    <h2>Manage Your Events</h2>
                </div>

                <div class="dashboard-stats">
                    <div class="stat-card">
                        <div class="stat-icon purple">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <div class="stat-info">
                            <h3>8</h3>
                            <p>Total Events</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon blue">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="stat-info">
                            <h3>3</h3>
                            <p>Active Events</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon green">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <div class="stat-info">
                            <h3>245</h3>
                            <p>Total Registrations</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon orange">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <div class="stat-info">
                            <h3>156</h3>
                            <p>Certificates Issued</p>
                        </div>
                    </div>
                </div>
                
                <div class="dashboard-sections">
                    <div class="section active-events">
                        <div class="section-header">
                            <h3>Active Events</h3>
                            <a href="committee-events.html">View All</a>
                        </div>
                        <div class="event-table-wrapper">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>Event</th>
                                        <th>Date</th>
                                        <th>Location</th>
                                        <th>Registered</th>
                                        <th>Capacity</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="event-info">
                                                <img src="https://images.pexels.com/photos/2774556/pexels-photo-2774556.jpeg" alt="Event">
                                                <div>
                                                    <h4>Annual Tech Conference 2025</h4>
                                                    <span class="event-category tech">Technology</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Jun 15, 2025</td>
                                        <td>Main Auditorium</td>
                                        <td>57 / 200</td>
                                        <td>
                                            <div class="progress-bar">
                                                <div class="progress" style="width: 28.5%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn-icon" title="Edit"><i class="fas fa-edit"></i></button>
                                                <button class="btn-icon" title="Check Attendance"><i class="fas fa-qrcode"></i></button>
                                                <button class="btn-icon" title="View Details"><i class="fas fa-eye"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="event-info">
                                                <img src="https://images.pexels.com/photos/2774545/pexels-photo-2774545.jpeg" alt="Event">
                                                <div>
                                                    <h4>Professional Development Workshop</h4>
                                                    <span class="event-category workshop">Workshop</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Jun 30, 2025</td>
                                        <td>Business School</td>
                                        <td>25 / 50</td>
                                        <td>
                                            <div class="progress-bar">
                                                <div class="progress" style="width: 50%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn-icon" title="Edit"><i class="fas fa-edit"></i></button>
                                                <button class="btn-icon" title="Check Attendance"><i class="fas fa-qrcode"></i></button>
                                                <button class="btn-icon" title="View Details"><i class="fas fa-eye"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="event-info">
                                                <img src="https://images.pexels.com/photos/3153204/pexels-photo-3153204.jpeg" alt="Event">
                                                <div>
                                                    <h4>Leadership Excellence Seminar</h4>
                                                    <span class="event-category seminar">Seminar</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Jul 18, 2025</td>
                                        <td>Business School</td>
                                        <td>15 / 100</td>
                                        <td>
                                            <div class="progress-bar">
                                                <div class="progress" style="width: 15%"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn-icon" title="Edit"><i class="fas fa-edit"></i></button>
                                                <button class="btn-icon" title="Check Attendance"><i class="fas fa-qrcode"></i></button>
                                                <button class="btn-icon" title="View Details"><i class="fas fa-eye"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="dashboard-sections">
                    <div class="section attendance-stats">
                        <div class="section-header">
                            <h3>Recent Attendance</h3>
                        </div>
                        <div class="summary-cards">
                            <div class="summary-card">
                                <div class="summary-header">
                                    <h4>Leadership Workshop (Completed)</h4>
                                </div>
                                <div class="summary-content">
                                    <div class="attendance-stats">
                                        <div class="attendance-chart">
                                            <div class="chart-placeholder">
                                                <div class="donut-chart">
                                                    <div class="donut-segment" style="--percentage: 85%"></div>
                                                </div>
                                                <div class="chart-center">85%</div>
                                            </div>
                                        </div>
                                        <div class="attendance-details">
                                            <div class="detail-item">
                                                <span class="label">Registered</span>
                                                <span class="value">40</span>
                                            </div>
                                            <div class="detail-item">
                                                <span class="label">Attended</span>
                                                <span class="value">34</span>
                                            </div>
                                            <div class="detail-item">
                                                <span class="label">No-shows</span>
                                                <span class="value">6</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="attendance-actions">
                                        <a href="committee-certificates.html" class="btn btn-sm btn-outline">Manage Certificates</a>
                                        <a href="committee-reports.html" class="btn btn-sm btn-outline">View Report</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="summary-card">
                                <div class="summary-header">
                                    <h4>Blockchain Seminar (Completed)</h4>
                                </div>
                                <div class="summary-content">
                                    <div class="attendance-stats">
                                        <div class="attendance-chart">
                                            <div class="chart-placeholder">
                                                <div class="donut-chart">
                                                    <div class="donut-segment" style="--percentage: 92%"></div>
                                                </div>
                                                <div class="chart-center">92%</div>
                                            </div>
                                        </div>
                                        <div class="attendance-details">
                                            <div class="detail-item">
                                                <span class="label">Registered</span>
                                                <span class="value">75</span>
                                            </div>
                                            <div class="detail-item">
                                                <span class="label">Attended</span>
                                                <span class="value">69</span>
                                            </div>
                                            <div class="detail-item">
                                                <span class="label">No-shows</span>
                                                <span class="value">6</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="attendance-actions">
                                        <a href="committee-certificates.html" class="btn btn-sm btn-outline">Manage Certificates</a>
                                        <a href="committee-reports.html" class="btn btn-sm btn-outline">View Report</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dashboard-sections">
                    <div class="section certificate-uploads">
                        <div class="section-header">
                            <h3>Pending Certificate Uploads</h3>
                        </div>
                        <div class="certificates-list">
                            <div class="certificate-task">
                                <div class="task-info">
                                    <h4>Leadership Workshop</h4>
                                    <p>34 attendees waiting for certificates</p>
                                </div>
                                <a href="committee-certificates.html" class="btn btn-primary">Upload Certificates</a>
                            </div>
                            <div class="certificate-task">
                                <div class="task-info">
                                    <h4>Blockchain Seminar</h4>
                                    <p>69 attendees waiting for certificates</p>
                                </div>
                                <a href="committee-certificates.html" class="btn btn-primary">Upload Certificates</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection