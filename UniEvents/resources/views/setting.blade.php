@extends('layouts.sidebar')
@section('content')
    <div class="dashboard-container">
        <!-- Main Content -->
        <main class="dashboard-main">
            <!-- Header -->
            <header class="dashboard-header">
                <div class="header-container">
                    <button type="button" class="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="header-title">
                        <h1>Settings</h1>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="dashboard-content">
                <div class="settings-container">
                    <!-- Profile Settings -->
                    <div class="settings-section">
                        <h2>Profile Settings</h2>
                        <div class="profile-settings">
                            <div class="profile-photo">
                                <img src="https://images.pexels.com/photos/3772510/pexels-photo-3772510.jpeg" alt="Profile Photo">
                                <button class="btn btn-outline">
                                    <i class="fas fa-camera"></i> Change Photo
                                </button>
                            </div>
                            <div class="profile-form">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" id="nama" value="{{ session('user')['nama'] }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Email</label>
                                    <input type="email" id="email" value="{{ session('user')['email']}}" readonly>
                            </div>
                        </div>
                    </div>

                    <!-- Security Settings -->
                    <div class="settings-section">
                        <h2>Security Settings</h2>
                        <div class="security-settings">
                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input type="password" id="current_password">
                            </div>
                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input type="password" id="new_password">
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm New Password</label>
                                <input type="password" id="confirm_password">
                            </div>
                            <div class="form-group">
                                <label class="checkbox">
                                    <input type="checkbox" checked>
                                    <span>Enable Two-Factor Authentication</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Save Settings -->
                    <div class="settings-actions">
                        @if (session('user.id_role') == 1)
                            <a href="/admin/index" class="btn btn-outline">Cancel Changes</a>
                        @elseif (session('user.id_role') == 2)
                            <a href="/panitia/index" class="btn btn-outline">Cancel Changes</a>
                        @elseif (session('user.id_role') == 3)
                            <a href="/keuangan/index" class="btn btn-outline">Cancel Changes</a>
                        @elseif (session('user.id_role') == 4)
                            <a href="/peserta/index" class="btn btn-outline">Cancel Changes</a>
                        @else
                            <a href="/dashboard" class="btn btn-outline">Cancel Changes</a>
                        @endif

                        <a class="btn btn-primary">Save Changes</a>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection