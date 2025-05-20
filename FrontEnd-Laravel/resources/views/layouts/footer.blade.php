<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniEvents - University Event Management</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <i class="fa-solid fa-calendar-check"></i>
                    <h3>UniEvents</h3>
                    <p>The ultimate platform for university event management</p>
                </div>
                <div class="footer-links">
                    <div class="link-group">
                        <h4>Quick Links</h4>
                        <ul>
                            <li><a href="events.html">Events</a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="register.html">Register</a></li>
                        </ul>
                    </div>
                    <div class="link-group">
                        <h4>Help & Support</h4>
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Support Center</a></li>
                            <li><a href="#">Terms of Service</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="link-group">
                        <h4>Contact Us</h4>
                        <ul class="contact-info">
                            <li><i class="fas fa-envelope"></i> info@unievents.edu</li>
                            <li><i class="fas fa-phone"></i> (555) 123-4567</li>
                            <li><i class="fas fa-map-marker-alt"></i> University Campus, Building 5</li>
                        </ul>
                    </div>
                </div>
            </div>
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

    <main>
        @yield('content')
    </main>
</body>
</html>