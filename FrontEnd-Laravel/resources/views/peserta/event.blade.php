@extends('layouts.sidebar')
@section('content')
    <div class="app-container">
         <main class="dashboard-main">
            <header class="dashboard-header">
                <div class="header-container">
                    <button type="button" class="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="header-title">
                        <h1>MyEvent</h1>
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

            <!-- Event Filters -->
            <section class="event-filters">
                <div class="container">
                    <div class="filter-container">
                        <div class="filter-group">
                            <label for="category">Category</label>
                            <select id="category" name="category">
                                <option value="">All Categories</option>
                                <option value="tech">Technology</option>
                                <option value="cultural">Cultural</option>
                                <option value="academic">Academic</option>
                                <option value="workshop">Workshop</option>
                                <option value="seminar">Seminar</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label for="date">Date</label>
                            <select id="date" name="date">
                                <option value="">Any Date</option>
                                <option value="today">Today</option>
                                <option value="week">This Week</option>
                                <option value="month">This Month</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label for="location">Location</label>
                            <select id="location" name="location">
                                <option value="">All Locations</option>
                                <option value="main-auditorium">Main Auditorium</option>
                                <option value="business-school">Business School</option>
                                <option value="engineering-building">Engineering Building</option>
                                <option value="campus-square">Campus Square</option>
                            </select>
                        </div>
                        <div class="filter-group search-filter">
                            <label for="search">Search</label>
                            <div class="search-input">
                                <input type="text" id="search" name="search" placeholder="Search events...">
                                <button type="button" class="search-button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="view-toggle">
                        <button type="button" class="view-button active" data-view="grid">
                            <i class="fas fa-th"></i>
                        </button>
                        <button type="button" class="view-button" data-view="list">
                            <i class="fas fa-list"></i>
                        </button>
                    </div>
                </div>
            </section>

            <!-- Events List -->
            <section class="events-list">
                <div class="container">
                    <div class="event-grid">
                        <!-- Event Card 1 -->
                        <div class="event-card">
                            <div class="event-image">
                                <img src="https://images.pexels.com/photos/2774556/pexels-photo-2774556.jpeg" alt="Tech Conference">
                                <div class="event-date">
                                    <span class="day">15</span>
                                    <span class="month">Jun</span>
                                </div>
                            </div>
                            <div class="event-content">
                                <div class="event-category tech">Technology</div>
                                <h3 class="event-title">Annual Tech Conference 2025</h3>
                                <div class="event-info">
                                    <p><i class="fas fa-map-marker-alt"></i> Main Auditorium</p>
                                    <p><i class="fas fa-clock"></i> 9:00 AM - 5:00 PM</p>
                                    <p><i class="fas fa-user"></i> Prof. Jonathan Blake</p>
                                </div>
                                <div class="event-footer">
                                    <span class="event-price">$25.00</span>
                                    <a href="event-details.html" class="btn btn-sm btn-outline">Details</a>
                                </div>
                            </div>
                        </div>

                        <!-- Event Card 2 -->
                        <div class="event-card">
                            <div class="event-image">
                                <img src="https://images.pexels.com/photos/2608517/pexels-photo-2608517.jpeg" alt="Cultural Festival">
                                <div class="event-date">
                                    <span class="day">22</span>
                                    <span class="month">Jun</span>
                                </div>
                            </div>
                            <div class="event-content">
                                <div class="event-category cultural">Cultural</div>
                                <h3 class="event-title">International Cultural Festival</h3>
                                <div class="event-info">
                                    <p><i class="fas fa-map-marker-alt"></i> Campus Square</p>
                                    <p><i class="fas fa-clock"></i> 11:00 AM - 8:00 PM</p>
                                    <p><i class="fas fa-user"></i> Student Council</p>
                                </div>
                                <div class="event-footer">
                                    <span class="event-price">Free</span>
                                    <a href="event-details.html" class="btn btn-sm btn-outline">Details</a>
                                </div>
                            </div>
                        </div>

                        <!-- Event Card 3 -->
                        <div class="event-card">
                            <div class="event-image">
                                <img src="https://images.pexels.com/photos/2774545/pexels-photo-2774545.jpeg" alt="Workshop">
                                <div class="event-date">
                                    <span class="day">30</span>
                                    <span class="month">Jun</span>
                                </div>
                            </div>
                            <div class="event-content">
                                <div class="event-category workshop">Workshop</div>
                                <h3 class="event-title">Professional Development Workshop</h3>
                                <div class="event-info">
                                    <p><i class="fas fa-map-marker-alt"></i> Business School</p>
                                    <p><i class="fas fa-clock"></i> 2:00 PM - 6:00 PM</p>
                                    <p><i class="fas fa-user"></i> Career Services</p>
                                </div>
                                <div class="event-footer">
                                    <span class="event-price">$15.00</span>
                                    <a href="event-details.html" class="btn btn-sm btn-outline">Details</a>
                                </div>
                            </div>
                        </div>

                        <!-- Event Card 4 -->
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
                                    <p><i class="fas fa-clock"></i> 10:00 AM - 3:00 PM</p>
                                    <p><i class="fas fa-user"></i> Science Department</p>
                                </div>
                                <div class="event-footer">
                                    <span class="event-price">$10.00</span>
                                    <a href="event-details.html" class="btn btn-sm btn-outline">Details</a>
                                </div>
                            </div>
                        </div>

                        <!-- Event Card 5 -->
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
                                    <p><i class="fas fa-clock"></i> 9:00 AM - 4:00 PM</p>
                                    <p><i class="fas fa-user"></i> Career Services</p>
                                </div>
                                <div class="event-footer">
                                    <span class="event-price">Free</span>
                                    <a href="event-details.html" class="btn btn-sm btn-outline">Details</a>
                                </div>
                            </div>
                        </div>

                        <!-- Event Card 6 -->
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
                                    <p><i class="fas fa-clock"></i> 1:00 PM - 5:00 PM</p>
                                    <p><i class="fas fa-user"></i> Dr. Amanda Harris</p>
                                </div>
                                <div class="event-footer">
                                    <span class="event-price">$20.00</span>
                                    <a href="event-details.html" class="btn btn-sm btn-outline">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="pagination" style="margin-bottom: 20px">
                        <a href="#" class="pagination-arrow disabled">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <a href="#" class="pagination-number active">1</a>
                        <a href="#" class="pagination-number">2</a>
                        <a href="#" class="pagination-number">3</a>
                        <span class="pagination-ellipsis">...</span>
                        <a href="#" class="pagination-number">8</a>
                        <a href="#" class="pagination-arrow">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </section>
            @include('layouts.footer')
        </main>
    </div>
@endsection