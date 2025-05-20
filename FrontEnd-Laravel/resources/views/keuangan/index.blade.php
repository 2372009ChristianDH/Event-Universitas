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
                        <h1>Finance Dashboard</h1>
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

            <!-- Dashboard Content -->
            <div class="dashboard-content">
                <div class="dashboard-welcome">
                    <h2>Finance Management</h2>
                    <p>Manage payments and financial records for university events</p>
                </div>

                <div class="dashboard-stats">
                    <div class="stat-card">
                        <div class="stat-icon orange">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-info">
                            <h3>24</h3>
                            <p>Pending Verifications</p>
                        </div>
                        <div class="stat-change">
                            <i class="fas fa-arrow-up"></i>
                            <span>8</span>
                            <span>New Today</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon green">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="stat-info">
                            <h3>185</h3>
                            <p>Verified Payments</p>
                        </div>
                        <div class="stat-change">
                            <i class="fas fa-arrow-up"></i>
                            <span>12</span>
                            <span>This Week</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon blue">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="stat-info">
                            <h3>$4,850</h3>
                            <p>Total Revenue</p>
                        </div>
                        <div class="stat-change">
                            <i class="fas fa-arrow-up"></i>
                            <span>15%</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon purple">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="stat-info">
                            <h3>48</h3>
                            <p>Active Events</p>
                        </div>
                        <div class="stat-change">
                            <i class="fas fa-equals"></i>
                            <span>0%</span>
                        </div>
                    </div>
                </div>
                
                <div class="dashboard-sections">
                    <div class="section pending-payments">
                        <div class="section-header">
                            <h3>Pending Payment Verifications</h3>
                            <a href="finance-pending.html">View All</a>
                        </div>
                        <div class="payment-table-wrapper">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Event</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Receipt</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="user-info">
                                                <img src="https://images.pexels.com/photos/3771807/pexels-photo-3771807.jpeg" alt="User">
                                                <span>Emma Wilson</span>
                                            </div>
                                        </td>
                                        <td>Annual Tech Conference 2025</td>
                                        <td>$25.00</td>
                                        <td>Jun 10, 2025</td>
                                        <td>
                                            <button class="btn-icon view-receipt" title="View Receipt">
                                                <i class="fas fa-file-invoice"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn-icon approve" title="Approve">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                <button class="btn-icon reject" title="Reject">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="user-info">
                                                <img src="https://images.pexels.com/photos/1181686/pexels-photo-1181686.jpeg" alt="User">
                                                <span>Michael Chen</span>
                                            </div>
                                        </td>
                                        <td>Leadership Excellence Seminar</td>
                                        <td>$20.00</td>
                                        <td>Jun 9, 2025</td>
                                        <td>
                                            <button class="btn-icon view-receipt" title="View Receipt">
                                                <i class="fas fa-file-invoice"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn-icon approve" title="Approve">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                <button class="btn-icon reject" title="Reject">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="user-info">
                                                <img src="https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg" alt="User">
                                                <span>Jessica Adams</span>
                                            </div>
                                        </td>
                                        <td>Professional Development Workshop</td>
                                        <td>$15.00</td>
                                        <td>Jun 8, 2025</td>
                                        <td>
                                            <button class="btn-icon view-receipt" title="View Receipt">
                                                <i class="fas fa-file-invoice"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn-icon approve" title="Approve">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                <button class="btn-icon reject" title="Reject">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
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