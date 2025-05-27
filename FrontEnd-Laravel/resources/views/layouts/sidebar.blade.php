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
                <img src="https://images.pexels.com/photos/3771807/pexels-photo-3771807.jpeg" alt="User Profile" class="profile-img">
                <div class="profile-info">
                    <h3>{{ session('user')['nama'] }}</h3>
                    <p>{{ session('user')['nama_role'] }}</p>
                </div>
            </div>

            <nav class="sidebar-nav">
                <ul>
                    {{-- Role 1: admin --}}
                    @if (session('user.id_role') == 1)
                        <li><a href="/admin/index"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
                        <li><a href="/admin-users"><i class="fas fa-users"></i><span>User Management</span></a></li>
                        <li><a href="/admin-finance"><i class="fas fa-money-bill-wave"></i><span>Finance Team</span></a></li>
                        <li><a href="/admin-committee"><i class="fas fa-user-tie"></i><span>Event Committee</span></a></li>
                        <li><a href="/admin-events"><i class="fas fa-calendar-alt"></i><span>All Events</span></a></li>
                        <li><a href="/admin-settings"><i class="fas fa-cog"></i><span>Settings</span></a></li>
                    {{-- Role 2: Panitia --}}
                    @elseif (session('user.id_role') == 2)
                        <li><a href="/panitia/index"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
                        <li><a href="/panitia/event"><i class="fas fa-plus-circle"></i><span>Event</span></a></li>
                        <li><a href="/panitia/absensi"><i class="fas fa-qrcode"></i><span>Attendance Scanner</span></a></li>
                        <li><a href=""><i class="fas fa-chart-bar"></i><span>Reports</span></a></li>

                    {{-- Role 3: Keuangan --}}
                    @elseif (session('user.id_role') == 3)
                        <li><a href="/keuangan/index"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
                        <li><a href="/finance-pending"><i class="fas fa-clock"></i><span>Pending Payments</span></a></li>
                        <li><a href="/finance-verified"><i class="fas fa-check-circle"></i><span>Verified Payments</span></a></li>
                        <li><a href="/finance-reports"><i class="fas fa-chart-line"></i><span>Financial Reports</span></a></li>
                        <li><a href="/finance-settings"><i class="fas fa-cog"></i><span>Settings</span></a></li>

                    {{-- Role 4: peserta --}}
                    @elseif (session('user.id_role') == 4)
                        <li><a href="/peserta/inndex"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
                        <li><a href="/peserta/event"><i class="fas fa-calendar-alt"></i><span>My Events</span></a></li>
                        <li><a href="/peserta/eventSertifikat"><i class="fas fa-certificate"></i><span>Certificates</span></a></li>
                        <li><a href=""><i class="fas fa-credit-card"></i><span>Payment History</span></a></li>
                        <li><a href=""><i class="fas fa-user-circle"></i><span>My Profile</span></a></li>
                        <li><a href="/peserta/eventQr"><i class="fas fa-qrcode"></i><span>My QR Codes</span></a></li>
                    @endif
                </ul>
            </nav>

        <div class="sidebar-footer">
            <a href="{{ route('logout') }}" class="logout-btn"
            onclick="event.preventDefault(); confirmLogout();">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        </aside>

    <main>
        @yield('content')
    </main>
    <script>
        function confirmLogout() {
            if (confirm("Apakah Anda yakin ingin logout?")) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>
</body>
</html>

