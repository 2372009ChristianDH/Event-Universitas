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
                    <img src="https://images.pexels.com/photos/2774556/pexels-photo-2774556.jpeg" alt="Tech Conference" class="event-hero-image">
                    <div class="event-hero-overlay">
                        <div class="container">
                            <div class="event-hero-content">
                                <div class="event-date-large">
                                    <div class="day">15</div>
                                    <div class="month-year">
                                        <span>June</span>
                                        <span>2025</span>
                                    </div>
                                </div>
                                <div class="event-title-container">
                                    <div class="event-category tech">Technology</div>
                                    <h1>Annual Tech Conference 2025</h1>
                                    <div class="event-meta">
                                        <span><i class="fas fa-map-marker-alt"></i> Main Auditorium</span>
                                        <span><i class="fas fa-clock"></i> 9:00 AM - 5:00 PM</span>
                                        <span><i class="fas fa-user"></i> Prof. Jonathan Blake</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="event-content-wrapper">
                        <div class="event-main-content">
                            <div class="event-section">
                                <h2>About This Event</h2>
                                <p>Join us for the Annual Tech Conference 2025, where leading experts from across the industry will share insights on the latest technological trends and innovations. This year's conference focuses on artificial intelligence, blockchain technology, and sustainable tech solutions.</p>
                                <p>Whether you're a student, researcher, or industry professional, this conference offers valuable networking opportunities and cutting-edge knowledge to enhance your career in technology.</p>
                            </div>

                            <div class="event-section">
                                <h2>What You'll Learn</h2>
                                <ul class="event-highlights">
                                    <li><i class="fas fa-check-circle"></i> Advanced AI implementation strategies</li>
                                    <li><i class="fas fa-check-circle"></i> Blockchain applications for various industries</li>
                                    <li><i class="fas fa-check-circle"></i> Sustainable technology practices</li>
                                    <li><i class="fas fa-check-circle"></i> Future trends in software development</li>
                                    <li><i class="fas fa-check-circle"></i> Networking with industry leaders</li>
                                </ul>
                            </div>

                            <div class="event-section">
                                <h2>Event Schedule</h2>
                                <div class="schedule-timeline">
                                    <div class="timeline-item">
                                        <div class="timeline-time">9:00 AM - 9:30 AM</div>
                                        <div class="timeline-content">
                                            <h4>Registration and Welcome Coffee</h4>
                                            <p>Pick up your badge and enjoy refreshments</p>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-time">9:30 AM - 10:30 AM</div>
                                        <div class="timeline-content">
                                            <h4>Opening Keynote: The Future of Technology</h4>
                                            <p>Prof. Jonathan Blake, Head of Computer Science Department</p>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-time">10:45 AM - 12:15 PM</div>
                                        <div class="timeline-content">
                                            <h4>Panel Discussion: AI Ethics and Implementation</h4>
                                            <p>Industry leaders discuss the ethical considerations of AI</p>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-time">12:15 PM - 1:30 PM</div>
                                        <div class="timeline-content">
                                            <h4>Lunch Break</h4>
                                            <p>Networking lunch provided for all attendees</p>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-time">1:30 PM - 3:00 PM</div>
                                        <div class="timeline-content">
                                            <h4>Workshop Sessions</h4>
                                            <p>Choose from three parallel workshops on blockchain, sustainable tech, or advanced programming</p>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-time">3:15 PM - 4:15 PM</div>
                                        <div class="timeline-content">
                                            <h4>Future Trends: What's Next in Tech</h4>
                                            <p>Dr. Sarah Johnson, Tech Futurist</p>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-time">4:15 PM - 5:00 PM</div>
                                        <div class="timeline-content">
                                            <h4>Closing Remarks and Networking</h4>
                                            <p>Final session with refreshments and networking opportunities</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="event-section">
                                <h2>Speakers</h2>
                                <div class="speakers-grid">
                                    <div class="speaker-card">
                                        <img src="https://images.pexels.com/photos/2379004/pexels-photo-2379004.jpeg" alt="Prof. Jonathan Blake">
                                        <h4>Prof. Jonathan Blake</h4>
                                        <p>Head of Computer Science</p>
                                    </div>
                                    <div class="speaker-card">
                                        <img src="https://images.pexels.com/photos/3771807/pexels-photo-3771807.jpeg" alt="Dr. Sarah Johnson">
                                        <h4>Dr. Sarah Johnson</h4>
                                        <p>Tech Futurist</p>
                                    </div>
                                    <div class="speaker-card">
                                        <img src="https://images.pexels.com/photos/3778680/pexels-photo-3778680.jpeg" alt="Michael Rodriguez">
                                        <h4>Michael Rodriguez</h4>
                                        <p>AI Research Lead</p>
                                    </div>
                                    <div class="speaker-card">
                                        <img src="https://images.pexels.com/photos/1181686/pexels-photo-1181686.jpeg" alt="Lisa Chen">
                                        <h4>Lisa Chen</h4>
                                        <p>Blockchain Specialist</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="event-sidebar">
                            <div class="registration-card">
                                <div class="card-header">
                                    <h3>Registration Details</h3>
                                </div>
                                <div class="card-body">
                                    <div class="price-badge">
                                        <span class="currency">$</span>
                                        <span class="amount">25</span>
                                        <span class="period">.00</span>
                                    </div>
                                    <div class="registration-info">
                                        <div class="info-item">
                                            <span class="label">Available Spots</span>
                                            <span class="value">143 / 200</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="label">Registration Deadline</span>
                                            <span class="value">June 10, 2025</span>
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
                                    <img src="https://images.pexels.com/photos/408503/pexels-photo-408503.jpeg" alt="Map location">
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
                                    <img src="https://images.pexels.com/photos/2774545/pexels-photo-2774545.jpeg" alt="Workshop">
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
                                    <img src="https://images.pexels.com/photos/1367269/pexels-photo-1367269.jpeg" alt="Science Symposium">
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
                                    <img src="https://images.pexels.com/photos/3153204/pexels-photo-3153204.jpeg" alt="Leadership Seminar">
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