<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - UniEvents</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Montserrat:wght@500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="form-page">
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
                        <a href={{ route('login.index') }} class="btn btn-outline active">Log In</a>
                        <a href={{ route('register.index') }} class="btn btn-outline">Sign Up</a>
                    </div>
                    <button class="mobile-menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </header>

        <!-- Form Section -->
        @if (session('success'))
            <div id="success-alert"
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
        <section class="form-section">
            <div class="container">
                <div class="form-container">
                    <div class="form-sidebar">
                        <div class="form-sidebar-content">
                            <h2>Selamat Datang kembali</h2>
                            <p>Log in untuk mengakses akun Anda dan mengelola pendaftaran acara Anda.</p>
                            <img src="https://images.pexels.com/photos/7103/writing-notes-idea-conference.jpg"
                                alt="University event" class="sidebar-image">
                        </div>
                    </div>
                    <div class="form-content">
                        <h1>Log In</h1>
                        <p class="form-subtitle">Masukkan kredensial Anda untuk mengakses akun Anda</p>

                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6"
                                style="margin-top:-15px;" role="alert">
                                @foreach ($errors->all() as $error)
                                    <p style="margin-top: 11px;">{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif


                        <form class="login-form" method="POST" action="{{ route('login.submit') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email"
                                    placeholder="Masukkan alamat email Anda" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="password-input">
                                    <input type="password" id="password" name="password"
                                        placeholder="Masukkan kata sandi Anda" required>
                                    <button type="button" class="password-toggle">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="form-group checkbox">
                                <div class="remember-me">
                                    <input type="checkbox" id="remember" name="remember">
                                    <label for="remember">Remember me</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Log In</button>
                            </div>

                            <div class="form-footer">
                                <p>Belum punya akun? <a href={{ route('register.index') }}>Sign Up</a></p>
                            </div>
                            <div class="form-footer">
                                <a href="/" class="btn btn-outline" style="margin-top: 12px;">
                                    &larr; Kembali ke Beranda
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer footer-light">
            <div class="container">
                <div class="footer-bottom">
                    <p>&copy; 2025 UniEvents. All rights reserved.</p>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
