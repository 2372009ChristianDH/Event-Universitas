<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniEvents - Kelola Acara Kampus</title>
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
                    <div class="auth-actions">
                        <a href={{ route('login.index') }} class="btn btn-outline">Log In</a>
                        <a href={{ route('register.index') }} class="btn btn-outline">Sign In</a>
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
                        <h1>Temukan Acara Seru di UniEvents</h1>
                        <p>Yuk cari, daftar, dan ikutan berbagai acara seru yang ada di kampus kamu!</p>
                        <div class="hero-actions">
                            <a href="#acara" class="btn btn-primary">Lihat Acara</a>
                            <a href="{{ route('register.index') }}" class="btn btn-secondary">Gabung Sekarang</a>
                        </div>
                    </div>
                    <div class="hero-image">
                        <img src="https://images.pexels.com/photos/2774556/pexels-photo-2774556.jpeg" alt="Acara kampus dengan mahasiswa">
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Events -->
        <section class="featured-events">
            <div class="container">
                <div class="section-header">
                    <h2 href>Acara Unggulan</h2>
                    <a href="events.html" class="view-all">Lihat Semua <i class="fas fa-arrow-right"></i></a>
                </div>
                
                <div class="event-grid">
                    <!-- Event Card 1 -->
                    <div class="event-card">
                        <div class="event-image">
                            <img src="https://images.pexels.com/photos/2774556/pexels-photo-2774556.jpeg" alt="Konferensi Teknologi">
                            <div class="event-date">
                                <span class="day">15</span>
                                <span class="month">Jun</span>
                            </div>
                        </div>
                        <div class="event-content">
                            <div class="event-category tech">Teknologi</div>
                            <h3 class="event-title">Konferensi Teknologi Tahunan 2025</h3>
                            <div class="event-info">
                                <p><i class="fas fa-map-marker-alt"></i> Aula Utama</p>
                                <p><i class="fas fa-clock"></i> 09.00 - 17.00</p>
                                <p><i class="fas fa-user"></i> Prof. Jonathan Blake</p>
                            </div>
                            <div class="event-footer">
                                <span class="event-price">Rp 25.000</span>
                                <a href="event-details.html" class="btn btn-sm btn-outline">Lihat Detail</a>
                            </div>
                        </div>
                    </div>

                    <!-- Event Card 2 -->
                    <div class="event-card">
                        <div class="event-image">
                            <img src="https://images.pexels.com/photos/2608517/pexels-photo-2608517.jpeg" alt="Festival Budaya">
                            <div class="event-date">
                                <span class="day">22</span>
                                <span class="month">Jun</span>
                            </div>
                        </div>
                        <div class="event-content">
                            <div class="event-category cultural">Budaya</div>
                            <h3 class="event-title">Festival Budaya Internasional</h3>
                            <div class="event-info">
                                <p><i class="fas fa-map-marker-alt"></i> Alun-Alun Kampus</p>
                                <p><i class="fas fa-clock"></i> 11.00 - 20.00</p>
                                <p><i class="fas fa-user"></i> BEM Universitas</p>
                            </div>
                            <div class="event-footer">
                                <span class="event-price">Gratis</span>
                                <a href="#" class="btn btn-sm btn-outline">Lihat Detail</a>
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
                            <h3 class="event-title">Workshop Pengembangan Diri</h3>
                            <div class="event-info">
                                <p><i class="fas fa-map-marker-alt"></i> Fakultas Bisnis</p>
                                <p><i class="fas fa-clock"></i> 14.00 - 18.00</p>
                                <p><i class="fas fa-user"></i> Career Center</p>
                            </div>
                            <div class="event-footer">
                                <span class="event-price">Rp 15.000</span>
                                <a href="event-details.html" class="btn btn-sm btn-outline">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works -->
        <section class="how-it-works">
            <div class="container">
                <h2>Gimana Cara Kerjanya?</h2>
                <div class="steps">
                    <div class="step">
                        <div class="step-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h3>Daftar Dulu</h3>
                        <p>Bikin akun biar kamu bisa ikutan semua acara kampus.</p>
                    </div>
                    <div class="step">
                        <div class="step-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h3>Cari Acara</h3>
                        <p>Pilih acara yang kamu suka dan langsung daftar.</p>
                    </div>
                    <div class="step">
                        <div class="step-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <h3>Bayar & Dapet Konfirmasi</h3>
                        <p>Kalau ada biaya, tinggal bayar dan langsung dapet konfirmasi.</p>
                    </div>
                    <div class="step">
                        <div class="step-icon">
                            <i class="fas fa-qrcode"></i>
                        </div>
                        <h3>Check-in</h3>
                        <p>Datang ke acara dan scan QR-nya buat absen. Gampang kan?</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="testimonials">
            <div class="container">
                <h2>Kata Mereka</h2>
                <div class="testimonial-container">
                    <div class="testimonial">
                        <div class="testimonial-content">
                            <p>"Daftar acara di sini cepet banget. Sertifikat juga langsung dapet setelah ikut. Mantap!"</p>
                        </div>
                        <div class="testimonial-author">
                            <img src="https://images.pexels.com/photos/3772510/pexels-photo-3772510.jpeg" alt="Mahasiswa">
                            <div class="author-info">
                                <h4>Sarah Johnson</h4>
                                <span>Teknik Informatika</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial">
                        <div class="testimonial-content">
                            <p>"Sebagai panitia, platform ini ngebantu banget buat ngatur peserta sama bagi-bagi sertifikat."</p>
                        </div>
                        <div class="testimonial-author">
                            <img src="https://images.pexels.com/photos/1300402/pexels-photo-1300402.jpeg" alt="Mahasiswa">
                            <div class="author-info">
                                <h4>Mark Rodriguez</h4>
                                <span>Administrasi Bisnis</span>
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
