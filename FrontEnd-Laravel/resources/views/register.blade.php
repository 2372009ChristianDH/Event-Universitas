<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - UniEvents</title>
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
                        <a href="login.html" class="btn btn-outline">Log In</a>
                        <a href="register.html" class="btn btn-primary active">Sign Up</a>
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
                            <h2>Join UniEvents</h2>
                            <p>Create an account to discover and participate in campus events.</p>
                            <ul class="feature-list">
                                <li><i class="fas fa-check"></i> Register for exclusive events</li>
                                <li><i class="fas fa-check"></i> Track your event history</li>
                                <li><i class="fas fa-check"></i> Receive certificates for attendance</li>
                                <li><i class="fas fa-check"></i> Get event recommendations</li>
                            </ul>
                            <div class="testimonial-card">
                                <p>"UniEvents has transformed how I engage with campus activities!"</p>
                                <div class="testimonial-author">
                                    <img src="https://images.pexels.com/photos/1181686/pexels-photo-1181686.jpeg" alt="Student">
                                    <div class="author-info">
                                        <h4>Michael Chen</h4>
                                        <span>Engineering Student</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-content">
                        <h1>Create Account</h1>
                        <p class="form-subtitle">Fill in your details to get started</p>
                        
                        <form class="registration-form">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" placeholder="Enter your name" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="password-input">
                                    <input type="password" id="password" name="password" placeholder="Create a password" required>
                                    <button type="button" class="password-toggle">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="form-group checkbox">
                                <input type="checkbox" id="terms" name="terms" required>
                                <label for="terms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                            </div>
                            
                            <div class="form-footer">
                                <p>Already have an account? <a href="login.html">Log In</a></p>
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