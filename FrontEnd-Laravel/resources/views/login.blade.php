<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - UniEvents</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Montserrat:wght@500;600;700&display=swap">
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
                    <nav class="main-nav">
                        <ul>
                            <li><a href="events.html">Events</a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav>
                    <div class="auth-actions">
                        <a href="login.html" class="btn btn-outline active">Log In</a>
                        <a href="register.html" class="btn btn-outline">Sign Up</a>
                    </div>
                    <button class="mobile-menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </header>

        <!-- Form Section -->
        <section class="form-section">
            <div class="container">
                <div class="form-container">
                    <div class="form-sidebar">
                        <div class="form-sidebar-content">
                            <h2>Welcome Back</h2>
                            <p>Log in to access your account and manage your event registrations.</p>
                            <img src="https://images.pexels.com/photos/7103/writing-notes-idea-conference.jpg" alt="University event" class="sidebar-image">
                        </div>
                    </div>
                    <div class="form-content">
                        <h1>Log In</h1>
                        <p class="form-subtitle">Enter your credentials to access your account</p>
                        
                        <div class="role-selector">
                            <span>I am a:</span>
                            <div class="role-options">
                                <label class="role-option">
                                    <input type="radio" name="role" value="member" checked>
                                    <span>Peserta</span>
                                </label>
                                <label class="role-option">
                                    <input type="radio" name="role" value="committee">
                                    <span>Panitia</span>
                                </label>
                                <label class="role-option">
                                    <input type="radio" name="role" value="finance">
                                    <span>Keuangan</span>
                                </label>
                            </div>
                        </div>
                        
                        <form class="login-form">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="password-input">
                                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
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
                                <a href="forgot-password.html" class="forgot-password">Forgot password?</a>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Log In</button>
                            </div>
                            
                            <div class="form-footer">
                                <p>Don't have an account? <a href="register.html">Sign Up</a></p>
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