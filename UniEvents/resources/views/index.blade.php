<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniEvents - Kelola Acara Kampus</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Montserrat:wght@500;600;700&display=swap">
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
                        <a href="{{ route('login.index') }}" class="btn btn-outline">Log In</a>
                        <a href="{{ route('register.index') }}" class="btn btn-outline">Sign In</a>
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
                        <img src="https://images.pexels.com/photos/2774556/pexels-photo-2774556.jpeg"
                            alt="Acara kampus dengan mahasiswa">
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Events -->
        <section id="acara" class="featured-events py-12">
            <div class="container">
                <h2 class="text-2xl font-bold mb-6">Event Terbaru</h2>
                <div class="event-grid grid grid-cols-1 md:grid-cols-3 gap-6">
                    @forelse ($events as $event)
                        @if($event->status == 'Coming Soon')
                            <div class="event-card bg-white rounded-xl shadow-md overflow-hidden">
                                <div class="event-image relative">
                                    <img src="https://images.pexels.com/photos/2774556/pexels-photo-2774556.jpeg"
                                        alt="{{ $event->nama_kegiatan }}" class="w-full h-48 object-cover">
                                    <div class="event-date">
                                        <span class="day">{{ $event->tanggal_display }}</span>
                                    </div>
                                </div>
                                <div class="event-content p-4">
                                    <div class="event-category text-sm text-blue-600 font-semibold mb-1">Event</div>
                                    <h3 class="event-title text-lg font-bold mb-2">{{ $event->nama_kegiatan }}</h3>
                                    <p class="event-info text-sm text-gray-600 mb-4"><i
                                            class="fas fa-pencil-alt mr-1"></i>Status: {{ $event->status }}</p>
                                    <div class="event-footer">
                                        <button onclick="openModal()"
                                            class="btn btn-sm btn-outline w-full text-blue-600 border border-blue-600 rounded-lg py-2 hover:bg-blue-50 transition">Lihat
                                            Detail Event </button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                        <p>Tidak ada event yang tersedia.</p>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- How It Works -->
        <section class="how-it-works py-16 bg-gray-50">
            <div class="container">
                <h2 class="text-2xl font-bold mb-10 text-center">Gimana Cara Kerjanya?</h2>
                <div class="steps grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                    <div class="step">
                        <div class="step-icon text-3xl text-blue-600 mb-3">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h3 class="text-lg font-semibold">Daftar Dulu</h3>
                        <p class="text-sm text-gray-600">Bikin akun biar kamu bisa ikutan semua acara event.</p>
                    </div>
                    <div class="step">
                        <div class="step-icon text-3xl text-blue-600 mb-3">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h3 class="text-lg font-semibold">Cari Acara</h3>
                        <p class="text-sm text-gray-600">Pilih acara yang kamu suka dan langsung daftar.</p>
                    </div>
                    <div class="step">
                        <div class="step-icon text-3xl text-blue-600 mb-3">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <h3 class="text-lg font-semibold">Bayar & Dapet Konfirmasi</h3>
                        <p class="text-sm text-gray-600">Kalau ada biaya, tinggal bayar dan langsung dapet konfirmasi.
                        </p>
                    </div>
                    <div class="step">
                        <div class="step-icon text-3xl text-blue-600 mb-3">
                            <i class="fas fa-qrcode"></i>
                        </div>
                        <h3 class="text-lg font-semibold">Check-in</h3>
                        <p class="text-sm text-gray-600">Datang ke acara dan scan QR-nya buat absen. Gampang kan?</p>
                    </div>
                </div>
            </div>
        </section>

        @include('layouts.footer')
    </div>

    <!-- Modal Login Required -->
    <div id="loginModal"
        style="display: none; position: fixed; inset: 0; z-index: 9999; background-color: rgba(0, 0, 0, 0.5); backdrop-filter: blur(3px); justify-content: center; align-items: center; font-family: 'Segoe UI', sans-serif;">
        <div
            style="background: #fff; border-radius: 12px; width: 90%; max-width: 400px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); animation: fadeIn 0.3s ease-out; overflow: hidden; position: relative;">

            <!-- Header -->
            <div style="display: flex; align-items: center; gap: 12px; padding: 20px; border-bottom: 1px solid #eee;">
                <div style="background: #e0f0ff; padding: 10px; border-radius: 50%;">
                    <i class="fas fa-lock" style="color: #007BFF; font-size: 18px;"></i>
                </div>
                <div>
                    <h3 style="margin: 0; font-size: 18px; color: #333;">Akses Dibatasi</h3>
                    <p style="margin: 0; font-size: 13px; color: #777;">Login diperlukan untuk melihat detail acara</p>
                </div>
                <button onclick="closeModal()"
                    style="margin-left: auto; background: none; border: none; font-size: 18px; color: #999; cursor: pointer;">
                    &times;
                </button>
            </div>

            <!-- Body -->
            <div style="padding: 25px; text-align: center;">
                <p style="font-size: 14px; color: #555;">Silakan login terlebih dahulu untuk mengakses informasi lebih
                    lengkap tentang acara ini.</p>
                <img src="https://cdn-icons-png.flaticon.com/512/3064/3064197.png" alt="Login Illustration"
                    style="width: 80px; margin-top: 15px; opacity: 0.9; margin-left: 135px;">
            </div>

            <!-- Footer -->
            <div style="padding: 20px; display: flex; gap: 10px; border-top: 1px solid #eee;">
                <a href="{{ route('login.index') }}"
                    style="flex: 1; background: #007BFF; color: white; padding: 10px 0; text-align: center; border-radius: 6px; text-decoration: none; font-weight: 500;">
                    Login Sekarang
                </a>
                <button onclick="closeModal()"
                    style="flex: 1; background: #f2f2f2; color: #333; padding: 10px 0; border-radius: 6px; border: none; font-weight: 500; cursor: pointer;">
                    Batal
                </button>
            </div>
        </div>
    </div>

    <!-- Inline JS -->
    <script>
        function openModal() {
            document.getElementById('loginModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('loginModal').style.display = 'none';
        }

        // Close modal when clicking outside
        window.addEventListener('click', function(e) {
            const modal = document.getElementById('loginModal');
            if (e.target === modal) {
                closeModal();
            }
        });
    </script>

    <!-- Optional: Fade-in animation -->
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>


</body>

</html>
