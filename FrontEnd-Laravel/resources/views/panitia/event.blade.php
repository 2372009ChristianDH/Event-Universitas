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
                        <div class="create-event-button" style="margin-top: 20px;">
                            <a href="committee-create-event.html" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Create New Event
                            </a>
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
            {{-- <section class="events-list">
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
                </div>
            </section> --}}
            @include('layouts.footer')
        </main>
    </div>
@endsection