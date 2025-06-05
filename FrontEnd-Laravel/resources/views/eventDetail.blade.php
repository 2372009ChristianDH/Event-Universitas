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
                        <h1>Event Detail</h1>
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
            <!-- Event Details Section -->
            <section class="event-details">
                <div class="event-hero">
                    <img src="https://images.pexels.com/photos/2774556/pexels-photo-2774556.jpeg" alt="Tech Conference"
                        class="event-hero-image">
                    <div class="event-hero-overlay">
                        <div class="container">
                            <div class="event-hero-content">
                                <div class="event-date-large" style="margin-bottom: 15px">
                                    <div class="day"></div>
                                    <div class="month-year">
                                        <span style="font-size: 1.5rem;">{{ $kegiatan->tanggal_display }}</span>
                                    </div>
                                </div>
                                <div class="event-title-container">
                                    <h1>{{ $kegiatan->nama_kegiatan }}</h1>
                                    <div class="event-info">
                                        <p style="color: white"><i class="fas fa-users"></i> Maksimal
                                            {{ $kegiatan->maksimal_peserta }} peserta</p>
                                    </div>
                                    <div class="event-info" style="margin-top: -15px;">
                                        <p style="color: white"><i class="fas fa-pencil-alt"></i> Status :
                                            {{ $kegiatan->status }}</p>
                                    </div>

                                    {{-- <div class="event-meta">
                                        <span><i class="fas fa-map-marker-alt"></i> Main Auditorium</span>
                                        <span><i class="fas fa-clock"></i> 9:00 AM - 5:00 PM</span>
                                        <span><i class="fas fa-user"></i> Prof. Jonathan Blake</span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="event-content-wrapper">
                        <div class="event-main-content">
                            <div class="event-section">
                                <h2>Informasi Event</h2>
                                <div class="schedule-timeline">
                                    @foreach ($detailKegiatan as $sesi)
                                        <div class="timeline-item">
                                            <div class="timeline-content">
                                                <h3>Sesi: {{ $sesi->sesi }}</h3>
                                                <div class="event-time">
                                                    <i class="fas fa-clock"></i>
                                                    {{ \Carbon\Carbon::parse($sesi->waktu_mulai)->format('H:i') }} -
                                                    {{ \Carbon\Carbon::parse($sesi->waktu_selesai)->format('H:i') }}
                                                </div>
                                                <div>
                                                    <i class="fas fa-map-marker-alt"></i> {{ $sesi->lokasi }}
                                                </div>
                                                <div class="event-speaker">
                                                    <i class="fas fa-user"></i> {{ $sesi->narasumber }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>


                            <div class="event-section">
                                <h2>Speakers</h2>
                                <div class="speakers-grid">
                                    <div class="speaker-card">
                                        <img src="https://images.pexels.com/photos/2379004/pexels-photo-2379004.jpeg"
                                            alt="Prof. Jonathan Blake">
                                        <h4>Prof. Jonathan Blake</h4>
                                        <p>Head of Computer Science</p>
                                    </div>
                                    <div class="speaker-card">
                                        <img src="https://images.pexels.com/photos/3771807/pexels-photo-3771807.jpeg"
                                            alt="Dr. Sarah Johnson">
                                        <h4>Dr. Sarah Johnson</h4>
                                        <p>Tech Futurist</p>
                                    </div>
                                    <div class="speaker-card">
                                        <img src="https://images.pexels.com/photos/3778680/pexels-photo-3778680.jpeg"
                                            alt="Michael Rodriguez">
                                        <h4>Michael Rodriguez</h4>
                                        <p>AI Research Lead</p>
                                    </div>
                                    <div class="speaker-card">
                                        <img src="https://images.pexels.com/photos/1181686/pexels-photo-1181686.jpeg"
                                            alt="Lisa Chen">
                                        <h4>Lisa Chen</h4>
                                        <p>Blockchain Specialist</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="event-sidebar">
                            <div class="registration-card">
                                <div class="card-header">
                                    <h3>Detail Registrasi</h3>
                                </div>
                                <div class="card-body">
                                    <div class="price-badge">
                                        <span class="currency">Rp.</span>
                                        <span class="amount">{{ number_format($kegiatan->biaya_registrasi, 0, ',', '.') }}</span>
                                        
                                    </div>
                                    <div class="registration-info">
                                        <div class="info-item">
                                            <span class="label">Available Spots</span>
                                            <span class="value"> / {{ $kegiatan->maksimal_peserta }}</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="label">Registration Deadline</span>
                                            <span class="value">{{ \Carbon\Carbon::parse($kegiatan->tanggal_selesai)->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="event-registration.html" class="btn btn-primary btn-block">Register Now</a>
                                    </div>
                                </div>
                            </div>

                            <div class="event-location">
                                <h3>Location</h3>
                                <div class="location-info">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <div>
                                        <p class="location-name">Main Auditorium</p>
                                        <p class="location-address">University Campus, Building 3, Floor 1</p>
                                        <p class="location-city">University City, UC 12345</p>
                                    </div>
                                </div>
                                <div class="location-map">
                                    <img src="https://images.pexels.com/photos/408503/pexels-photo-408503.jpeg"
                                        alt="Map location">
                                    <a href="#" class="btn btn-outline btn-sm">View on Map</a>
                                </div>
                            </div>

                            <div class="share-event">
                                <h3>Share This Event</h3>
                                <div class="share-buttons">
                                    <a href="#" class="share-button facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="share-button twitter">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="share-button linkedin">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a href="#" class="share-button email">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Related Events -->
                    <div class="related-events">
                        <h2>You Might Also Be Interested In</h2>
                        <div class="related-events-slider">
                            <div class="event-card">
                                <div class="event-image">
                                    <img src="https://images.pexels.com/photos/2774545/pexels-photo-2774545.jpeg"
                                        alt="Workshop">
                                    <div class="event-date">
                                        <span class="day">30</span>
                                        <span class="month">Jun</span>
                                    </div>
                                </div>
                                <div class="event-content">
                                    <div class="event-category workshop">Workshop</div>
                                    <h3 class="event-title">Professional Development Workshop</h3>
                                    <div class="event-footer">
                                        <span class="event-price">$15.00</span>
                                        <a href="event-details.html" class="btn btn-sm btn-outline">Details</a>
                                    </div>
                                </div>
                            </div>

                            <div class="event-card">
                                <div class="event-image">
                                    <img src="https://images.pexels.com/photos/1367269/pexels-photo-1367269.jpeg"
                                        alt="Science Symposium">
                                    <div class="event-date">
                                        <span class="day">05</span>
                                        <span class="month">Jul</span>
                                    </div>
                                </div>
                                <div class="event-content">
                                    <div class="event-category academic">Academic</div>
                                    <h3 class="event-title">Science Research Symposium</h3>
                                    <div class="event-footer">
                                        <span class="event-price">$10.00</span>
                                        <a href="event-details.html" class="btn btn-sm btn-outline">Details</a>
                                    </div>
                                </div>
                            </div>

                            <div class="event-card">
                                <div class="event-image">
                                    <img src="https://images.pexels.com/photos/3153204/pexels-photo-3153204.jpeg"
                                        alt="Leadership Seminar">
                                    <div class="event-date">
                                        <span class="day">18</span>
                                        <span class="month">Jul</span>
                                    </div>
                                </div>
                                <div class="event-content">
                                    <div class="event-category seminar">Seminar</div>
                                    <h3 class="event-title">Leadership Excellence Seminar</h3>
                                    <div class="event-footer">
                                        <span class="event-price">$20.00</span>
                                        <a href="event-details.html" class="btn btn-sm btn-outline">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
@endsection
