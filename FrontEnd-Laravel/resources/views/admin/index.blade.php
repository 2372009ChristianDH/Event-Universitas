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
                        <h1>Administrator Dashboard</h1>
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
                                <span class="notification-badge">5</span>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

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
                            <h3>1,245</h3>
                            <p>Total Users</p>
                        </div>
                        <div class="stat-change">
                            <i class="fas fa-arrow-up"></i>
                            <span>12%</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon green">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="stat-info">
                            <h3>48</h3>
                            <p>Active Events</p>
                        </div>
                        <div class="stat-change">
                            <i class="fas fa-arrow-up"></i>
                            <span>8%</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon purple">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="stat-info">
                            <h3>18</h3>
                            <p>Committee Members</p>
                        </div>
                        <div class="stat-change">
                            <i class="fas fa-equals"></i>
                            <span>0%</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon orange">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <div class="stat-info">
                            <h3>5</h3>
                            <p>Finance Team Members</p>
                        </div>
                        <div class="stat-change">
                            <i class="fas fa-arrow-up"></i>
                            <span>25%</span>
                        </div>
                    </div>
                </div>
                
                <div class="dashboard-sections">
                    <div class="section user-management">
                        <div class="section-header">
                            <h3>Team Management</h3>
                            <a href="admin-users.html">View All</a>
                        </div>
                        <div class="user-table-wrapper">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Department</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="user-info">
                                                <img src="https://images.pexels.com/photos/3778603/pexels-photo-3778603.jpeg" alt="User">
                                                <span>John Smith</span>
                                            </div>
                                        </td>
                                        <td>Committee</td>
                                        <td>Engineering</td>
                                        <td><span class="status-badge active">Active</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn-icon" title="Edit"><i class="fas fa-edit"></i></button>
                                                <button class="btn-icon" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="user-info">
                                                <img src="https://images.pexels.com/photos/3772510/pexels-photo-3772510.jpeg" alt="User">
                                                <span>Sarah Johnson</span>
                                            </div>
                                        </td>
                                        <td>Finance</td>
                                        <td>Business</td>
                                        <td><span class="status-badge active">Active</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn-icon" title="Edit"><i class="fas fa-edit"></i></button>
                                                <button class="btn-icon" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="user-info">
                                                <img src="https://images.pexels.com/photos/3779760/pexels-photo-3779760.jpeg" alt="User">
                                                <span>Michael Chen</span>
                                            </div>
                                        </td>
                                        <td>Committee</td>
                                        <td>Science</td>
                                        <td><span class="status-badge inactive">Inactive</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn-icon" title="Edit"><i class="fas fa-edit"></i></button>
                                                <button class="btn-icon" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="add-user">
                            <a href="admin-add-user.html" class="btn btn-primary">Add New Team Member</a>
                        </div>
                    </div>

                    <div class="section recent-activities">
                        <div class="section-header">
                            <h3>Recent Activities</h3>
                        </div>
                        <div class="activity-list">
                            <div class="activity-item">
                                <div class="activity-icon green">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <div class="activity-details">
                                    <p>New committee member <strong>James Wilson</strong> added</p>
                                    <span class="time">Today, 10:30 AM</span>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon blue">
                                    <i class="fas fa-calendar-plus"></i>
                                </div>
                                <div class="activity-details">
                                    <p><strong>Annual Tech Conference</strong> created by David Kim</p>
                                    <span class="time">Yesterday, 2:15 PM</span>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon orange">
                                    <i class="fas fa-user-edit"></i>
                                </div>
                                <div class="activity-details">
                                    <p>Finance team member <strong>Sarah Johnson</strong> updated</p>
                                    <span class="time">Jun 10, 8:45 AM</span>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon red">
                                    <i class="fas fa-user-times"></i>
                                </div>
                                <div class="activity-details">
                                    <p>Committee member <strong>Thomas Lee</strong> deactivated</p>
                                    <span class="time">Jun 8, 11:30 AM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dashboard-sections">
                    <div class="section system-summary">
                        <div class="section-header">
                            <h3>System Summary</h3>
                        </div>
                        <div class="summary-cards">
                            <div class="summary-card">
                                <div class="summary-header">
                                    <h4>User Distribution</h4>
                                </div>
                                <div class="summary-content">
                                    <div class="chart-placeholder">
                                        <div class="pie-chart">
                                            <div class="pie-segment segment-1"></div>
                                            <div class="pie-segment segment-2"></div>
                                            <div class="pie-segment segment-3"></div>
                                        </div>
                                    </div>
                                    <div class="chart-legend">
                                        <div class="legend-item">
                                            <span class="legend-color regular"></span>
                                            <span class="legend-label">Regular Members</span>
                                            <span class="legend-value">1,156</span>
                                        </div>
                                        <div class="legend-item">
                                            <span class="legend-color committee"></span>
                                            <span class="legend-label">Committee Members</span>
                                            <span class="legend-value">18</span>
                                        </div>
                                        <div class="legend-item">
                                            <span class="legend-color finance"></span>
                                            <span class="legend-label">Finance Team</span>
                                            <span class="legend-value">5</span>
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
                                            <h5>48</h5>
                                            <p>Active Events</p>
                                        </div>
                                        <div class="stat-box">
                                            <h5>12</h5>
                                            <p>This Week</p>
                                        </div>
                                        <div class="stat-box">
                                            <h5>156</h5>
                                            <p>This Month</p>
                                        </div>
                                        <div class="stat-box">
                                            <h5>2,450</h5>
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
@endsection