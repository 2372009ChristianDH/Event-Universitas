@extends('layouts.sidebar')
@section('content')
    <div class="app-container">
        <main class="dashboard-main">
            <header class="dashboard-header">
                <div class="header-container">
                    <button type="button" class="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="header-title" style="padding: 10px">
                        <h1>Event</h1>
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

            @if (session('success'))
                <div id="success-alert" style="margin-top: -15; margin-bottom: 15px;"
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

            <!-- Events List -->
            <section class="events-list">
                <div class="container">
                    <div class="event-grid">
                        @forelse ($events as $event)
                            <div class="event-card">
                                <div class="event-image">
                                    <img src="https://images.pexels.com/photos/2774556/pexels-photo-2774556.jpeg"
                                        alt="{{ $event->nama_kegiatan }}">
                                    <div class="event-date">
                                        <span class="day">{{ $event->tanggal_display }}</span>
                                    </div>

                                </div>
                                <div class="event-content">
                                    <div class="event-category tech">Event</div>
                                    <h3 class="event-title">{{ $event->nama_kegiatan }}</h3>
                                    <div class="event-info">
                                        <p><i class="fas fa-pencil-alt"></i> Status : {{ $event->status }}</p>
                                    </div>
                                    <div class="event-footer">
                                        <a href="{{ route('event.detailEvent', ['id' => $event->id_kegiatan]) }}" class="btn btn-sm btn-outline">Details Event</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>Tidak ada event yang tersedia.</p>
                        @endforelse
                    </div>

            </section>
        </main>
    </div>
@endsection
