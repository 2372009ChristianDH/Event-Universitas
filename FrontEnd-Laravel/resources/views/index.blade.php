<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniEvents - University Event Management</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Montserrat:wght@500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="app-container">
        <!-- Header -->
        <header class="header">
            <div class="container">
                <div class="header-content">
                    <a href="index.html" class="logo">
                        <i class="fa-solid fa-calendar-check"></i>
                        <span>UniEvents</span>
                    </a>
                    <nav class="main-nav">
                        <ul>
                            <li><a href="events.html" class="active">Events</a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav>
                    <div class="auth-actions">
                        <a href="login.html" class="btn btn-outline">Log In</a>
                        <a href="register.html" class="btn btn-primary">Sign Up</a>
                    </div>
                    <button class="mobile-menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-text">
                        <h1>Discover University Events</h1>
                        <p>Explore, register, and participate in exciting events happening across campus.</p>
                        <div class="hero-actions">
                            <a href="events.html" class="btn btn-primary">Browse Events</a>
                            <a href="register.html" class="btn btn-secondary">Join Today</a>
                        </div>
                    </div>
                    <div class="hero-image">
                        <img src="https://images.pexels.com/photos/2774556/pexels-photo-2774556.jpeg" alt="University event with students">
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Events -->
        <section class="featured-events">
            <div class="container">
                <div class="section-header">
                    <h2>Featured Events</h2>
                    <a href="events.html" class="view-all">View All <i class="fas fa-arrow-right"></i></a>
                </div>
                
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
                </div>
            </div>
        </section>

        <!-- How It Works -->
        <section class="how-it-works">
            <div class="container">
                <h2>How It Works</h2>
                <div class="steps">
                    <div class="step">
                        <div class="step-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h3>Register</h3>
                        <p>Create your account to access all university events.</p>
                    </div>
                    <div class="step">
                        <div class="step-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h3>Browse Events</h3>
                        <p>Discover and register for upcoming campus events.</p>
                    </div>
                    <div class="step">
                        <div class="step-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <h3>Pay & Confirm</h3>
                        <p>Complete payment and receive your confirmation.</p>
                    </div>
                    <div class="step">
                        <div class="step-icon">
                            <i class="fas fa-qrcode"></i>
                        </div>
                        <h3>Attend</h3>
                        <p>Use your QR code to check-in on event day.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="testimonials">
            <div class="container">
                <h2>What Students Say</h2>
                <div class="testimonial-container">
                    <div class="testimonial">
                        <div class="testimonial-content">
                            <p>"The event registration process was seamless. I loved how easy it was to get my certificate after attending!"</p>
                        </div>
                        <div class="testimonial-author">
                            <img src="https://images.pexels.com/photos/3772510/pexels-photo-3772510.jpeg" alt="Student">
                            <div class="author-info">
                                <h4>Sarah Johnson</h4>
                                <span>Computer Science</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial">
                        <div class="testimonial-content">
                            <p>"As an event organizer, the platform made it incredibly easy to manage attendees and distribute certificates."</p>
                        </div>
                        <div class="testimonial-author">
                            <img src="https://images.pexels.com/photos/1300402/pexels-photo-1300402.jpeg" alt="Student">
                            <div class="author-info">
                                <h4>Mark Rodriguez</h4>
                                <span>Business Administration</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @include('layouts.footer')
    </div>
</body>
</html>