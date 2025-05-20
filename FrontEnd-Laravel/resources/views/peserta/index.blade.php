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
                        <h1>Dashboard Peserta</h1>
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
                <div class="dashboard-welcome">
                    <h2>Welcome back, Emma!</h2>
                    <p>Here's what's happening with your events</p>
                </div>

                <div class="dashboard-stats">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="stat-info">
                            <h3>5</h3>
                            <p>Registered Events</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <div class="stat-info">
                            <h3>3</h3>
                            <p>Certificates Earned</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-info">
                            <h3>2</h3>
                            <p>Upcoming Events</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <div class="stat-info">
                            <h3>$45</h3>
                            <p>Total Spent</p>
                        </div>
                    </div>
                </div>

                <div class="dashboard-sections">
                    <div class="section upcoming-events">
                        <div class="section-header">
                            <h3>Upcoming Events</h3>
                            <a href="member-events.html">View All</a>
                        </div>
                        <div class="event-list">
                            <div class="event-item">
                                <div class="event-date">
                                    <span class="day">15</span>
                                    <span class="month">Jun</span>
                                </div>
                                <div class="event-details">
                                    <h4>Annual Tech Conference 2025</h4>
                                    <p><i class="fas fa-map-marker-alt"></i> Main Auditorium</p>
                                    <p><i class="fas fa-clock"></i> 9:00 AM - 5:00 PM</p>
                                </div>
                                <div class="event-status">
                                    <span class="status paid">Paid</span>
                                    <a href="#" class="btn btn-sm btn-outline">View QR</a>
                                </div>
                            </div>
                            <div class="event-item">
                                <div class="event-date">
                                    <span class="day">30</span>
                                    <span class="month">Jun</span>
                                </div>
                                <div class="event-details">
                                    <h4>Professional Development Workshop</h4>
                                    <p><i class="fas fa-map-marker-alt"></i> Business School</p>
                                    <p><i class="fas fa-clock"></i> 2:00 PM - 6:00 PM</p>
                                </div>
                                <div class="event-status">
                                    <span class="status pending">Pending</span>
                                    <a href="#" class="btn btn-sm btn-secondary">Pay Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section recent-certificates">
                        <div class="section-header">
                            <h3>Recent Certificates</h3>
                            <a href="member-certificates.html">View All</a>
                        </div>
                        <div class="certificates-list">
                            <div class="certificate-item">
                                <img src="https://images.pexels.com/photos/3760514/pexels-photo-3760514.jpeg" alt="Certificate" class="certificate-thumbnail">
                                <div class="certificate-details">
                                    <h4>Leadership Workshop</h4>
                                    <p>Issued on May 10, 2025</p>
                                </div>
                                <div class="certificate-actions">
                                    <a href="#" class="btn btn-sm btn-outline">Download</a>
                                </div>
                            </div>
                            <div class="certificate-item">
                                <img src="https://images.pexels.com/photos/3760514/pexels-photo-3760514.jpeg" alt="Certificate" class="certificate-thumbnail">
                                <div class="certificate-details">
                                    <h4>Design Thinking Seminar</h4>
                                    <p>Issued on April 22, 2025</p>
                                </div>
                                <div class="certificate-actions">
                                    <a href="#" class="btn btn-sm btn-outline">Download</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dashboard-sections">
                    <div class="section recommended-events">
                        <div class="section-header">
                            <h3>Recommended Events</h3>
                            <a href="events.html">Explore More</a>
                        </div>
                        <div class="recommended-list">
                            <div class="event-card">
                                <div class="event-image">
                                    <img src="https://images.pexels.com/photos/1367269/pexels-photo-1367269.jpeg" alt="Science Symposium">
                                    <div class="event-date">
                                        <span class="day">05</span>
                                        <span class="month">Jul</span>
                                    </div>
                                </div>
                                <div class="event-content">
                                    <div class="event-category academic">Academic</div>
                                    <h3 class="event-title">Science Research Symposium</h3>
                                    <div class="event-info">
                                        <p><i class="fas fa-map-marker-alt"></i> Science Building</p>
                                    </div>
                                    <div class="event-footer">
                                        <span class="event-price">$10.00</span>
                                        <a href="event-details.html" class="btn btn-sm btn-outline">Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="event-card">
                                <div class="event-image">
                                    <img src="https://images.pexels.com/photos/3153204/pexels-photo-3153204.jpeg" alt="Leadership Seminar">
                                    <div class="event-date">
                                        <span class="day">18</span>
                                        <span class="month">Jul</span>
                                    </div>
                                </div>
                                <div class="event-content">
                                    <div class="event-category seminar">Seminar</div>
                                    <h3 class="event-title">Leadership Excellence Seminar</h3>
                                    <div class="event-info">
                                        <p><i class="fas fa-map-marker-alt"></i> Business School</p>
                                    </div>
                                    <div class="event-footer">
                                        <span class="event-price">$20.00</span>
                                        <a href="event-details.html" class="btn btn-sm btn-outline">Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="event-card">
                                <div class="event-image">
                                    <img src="https://images.pexels.com/photos/1708936/pexels-photo-1708936.jpeg" alt="Career Fair">
                                    <div class="event-date">
                                        <span class="day">12</span>
                                        <span class="month">Jul</span>
                                    </div>
                                </div>
                                <div class="event-content">
                                    <div class="event-category career">Career</div>
                                    <h3 class="event-title">Annual Career Fair 2025</h3>
                                    <div class="event-info">
                                        <p><i class="fas fa-map-marker-alt"></i> Student Center</p>
                                    </div>
                                    <div class="event-footer">
                                        <span class="event-price">Free</span>
                                        <a href="event-details.html" class="btn btn-sm btn-outline">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </main>
    </div>
@endsection