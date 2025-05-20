<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Committee Dashboard - UniEvents</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Montserrat:wght@500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="dashboard-body">
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="dashboard-sidebar">
            <div class="sidebar-header">
                <a href="index.html" class="logo">
                    <i class="fa-solid fa-calendar-check"></i>
                    <span>UniEvents</span>
                </a>
                <button type="button" class="close-sidebar">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="user-profile">
                <img src="https://images.pexels.com/photos/2379004/pexels-photo-2379004.jpeg" alt="Committee Profile" class="profile-img">
                <div class="profile-info">
                    <h3>David Kim</h3>
                    <p>Event Committee</p>
                </div>
            </div>

            <nav class="sidebar-nav">
                <ul>
                    <li class="active">
                        <a href="committee-dashboard.html">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="committee-events.html">
                            <i class="fas fa-calendar-alt"></i>
                            <span>My Events</span>
                        </a>
                    </li>
                    <li>
                        <a href="committee-create-event.html">
                            <i class="fas fa-plus-circle"></i>
                            <span>Create Event</span>
                        </a>
                    </li>
                    <li>
                        <a href="committee-attendance.html">
                            <i class="fas fa-qrcode"></i>
                            <span>Attendance Scanner</span>
                        </a>
                    </li>
                    <li>
                        <a href="committee-certificates.html">
                            <i class="fas fa-certificate"></i>
                            <span>Certificates</span>
                        </a>
                    </li>
                    <li>
                        <a href="committee-reports.html">
                            <i class="fas fa-chart-bar"></i>
                            <span>Reports</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="sidebar-footer">
                <a href="login.html" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>


    </div>
</body>
</html>