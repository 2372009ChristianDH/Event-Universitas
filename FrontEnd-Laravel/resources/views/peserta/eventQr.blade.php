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
                        <h1>My QR Codes</h1>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="dashboard-content">
                <div class="qr-codes-grid">
                    <!-- QR Code Card 1 -->
                    <div class="qr-code-card">
                        <div class="qr-code-header">
                            <h3>Annual Tech Conference 2025</h3>
                            <span class="event-date">June 15, 2025</span>
                        </div>
                        <div class="qr-code-content">
                            <div class="qr-code-image">
                                <!-- Placeholder for QR Code -->
                                <div class="qr-placeholder">
                                    <i class="fas fa-qrcode"></i>
                                </div>
                            </div>
                            <div class="qr-code-info">
                                <p><strong>Event ID:</strong> TECH-2025-001</p>
                                <p><strong>Location:</strong> Main Auditorium</p>
                                <p><strong>Time:</strong> 9:00 AM - 5:00 PM</p>
                            </div>
                        </div>
                        <div class="qr-code-actions">
                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-download"></i> Download QR
                            </button>
                            <button class="btn btn-outline btn-sm">
                                <i class="fas fa-share-alt"></i> Share
                            </button>
                        </div>
                    </div>

                    <!-- QR Code Card 2 -->
                    <div class="qr-code-card">
                        <div class="qr-code-header">
                            <h3>Professional Development Workshop</h3>
                            <span class="event-date">June 30, 2025</span>
                        </div>
                        <div class="qr-code-content">
                            <div class="qr-code-image">
                                <!-- Placeholder for QR Code -->
                                <div class="qr-placeholder">
                                    <i class="fas fa-qrcode"></i>
                                </div>
                            </div>
                            <div class="qr-code-info">
                                <p><strong>Event ID:</strong> WORKSHOP-2025-001</p>
                                <p><strong>Location:</strong> Business School</p>
                                <p><strong>Time:</strong> 2:00 PM - 6:00 PM</p>
                            </div>
                        </div>
                        <div class="qr-code-actions">
                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-download"></i> Download QR
                            </button>
                            <button class="btn btn-outline btn-sm">
                                <i class="fas fa-share-alt"></i> Share
                            </button>
                        </div>
                    </div>
                </div>

                <div class="qr-instructions">
                    <div class="instruction-card">
                        <div class="instruction-icon">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <div class="instruction-content">
                            <h3>How to Use Your QR Code</h3>
                            <ol>
                                <li>Download or screenshot your QR code</li>
                                <li>Present the QR code at the event registration desk</li>
                                <li>Wait for the event staff to scan your code</li>
                                <li>Your attendance will be automatically recorded</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection