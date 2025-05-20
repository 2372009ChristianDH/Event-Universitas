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
                        <h1>Attendance Scanner</h1>
                    </div>
                    <div class="header-actions">
                        <div class="notifications">
                            <button type="button" class="notification-btn">
                                <i class="fas fa-bell"></i>
                                <span class="notification-badge">2</span>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Scanner Content -->
            <div class="dashboard-content">
                <div class="scanner-container">
                    <div class="event-selector">
                        <label for="event">Select Event</label>
                        <select id="event" name="event">
                            <option value="tech-conf">Annual Tech Conference 2025</option>
                            <option value="workshop">Professional Development Workshop</option>
                            <option value="leadership">Leadership Excellence Seminar</option>
                        </select>
                    </div>

                    <div class="scanner-section">
                        <div class="scanner-frame">
                            <div class="scanner-overlay">
                                <div class="scanner-line"></div>
                            </div>
                            <div class="scanner-instructions">
                                <i class="fas fa-qrcode"></i>
                                <p>Position the QR code within the frame</p>
                            </div>
                        </div>

                        <div class="scanner-controls">
                            <button class="btn btn-primary">
                                <i class="fas fa-camera"></i>
                                Start Scanner
                            </button>
                            <button class="btn btn-outline">
                                <i class="fas fa-sync-alt"></i>
                                Reset
                            </button>
                        </div>
                    </div>

                    <div class="attendance-list">
                        <h3>Recent Check-ins</h3>
                        <div class="attendance-table-wrapper">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Student</th>
                                        <th>ID</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>10:15 AM</td>
                                        <td>
                                            <div class="user-info">
                                                <img src="https://images.pexels.com/photos/3771807/pexels-photo-3771807.jpeg" alt="Student">
                                                <span>Emma Wilson</span>
                                            </div>
                                        </td>
                                        <td>STD123456</td>
                                        <td><span class="status-badge active">Checked In</span></td>
                                    </tr>
                                    <tr>
                                        <td>10:12 AM</td>
                                        <td>
                                            <div class="user-info">
                                                <img src="https://images.pexels.com/photos/1181686/pexels-photo-1181686.jpeg" alt="Student">
                                                <span>Michael Chen</span>
                                            </div>
                                        </td>
                                        <td>STD123457</td>
                                        <td><span class="status-badge active">Checked In</span></td>
                                    </tr>
                                    <tr>
                                        <td>10:10 AM</td>
                                        <td>
                                            <div class="user-info">
                                                <img src="https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg" alt="Student">
                                                <span>Jessica Adams</span>
                                            </div>
                                        </td>
                                        <td>STD123458</td>
                                        <td><span class="status-badge active">Checked In</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="attendance-summary">
                        <div class="summary-stats">
                            <div class="stat-box">
                                <h5>57</h5>
                                <p>Total Registered</p>
                            </div>
                            <div class="stat-box">
                                <h5>42</h5>
                                <p>Checked In</p>
                            </div>
                            <div class="stat-box">
                                <h5>15</h5>
                                <p>Pending</p>
                            </div>
                            <div class="stat-box">
                                <h5>74%</h5>
                                <p>Attendance Rate</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection