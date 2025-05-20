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
                        <h1>My Certificates</h1>
                    </div>
                    <div class="header-actions">
                        <div class="search-bar">
                            <input type="text" placeholder="Search certificates...">
                            <button type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="dashboard-content">
                <div class="certificates-grid">
                    <!-- Certificate Card 1 -->
                    <div class="certificate-card">
                        <div class="certificate-preview">
                            <img src="https://images.pexels.com/photos/3760514/pexels-photo-3760514.jpeg" alt="Leadership Workshop Certificate">
                            <div class="certificate-overlay">
                                <div class="overlay-actions">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fas fa-download"></i> Download
                                    </button>
                                    <button class="btn btn-outline btn-sm">
                                        <i class="fas fa-share"></i> Share
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="certificate-info">
                            <h3>Leadership Workshop</h3>
                            <p><i class="fas fa-calendar"></i> May 10, 2025</p>
                            <p><i class="fas fa-clock"></i> 4 Hours</p>
                            <div class="certificate-meta">
                                <span class="certificate-id">CERT-2025-001</span>
                                <span class="certificate-type">Workshop</span>
                            </div>
                        </div>
                    </div>

                    <!-- Certificate Card 2 -->
                    <div class="certificate-card">
                        <div class="certificate-preview">
                            <img src="https://images.pexels.com/photos/3760514/pexels-photo-3760514.jpeg" alt="Design Thinking Certificate">
                            <div class="certificate-overlay">
                                <div class="overlay-actions">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fas fa-download"></i> Download
                                    </button>
                                    <button class="btn btn-outline btn-sm">
                                        <i class="fas fa-share"></i> Share
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="certificate-info">
                            <h3>Design Thinking Seminar</h3>
                            <p><i class="fas fa-calendar"></i> April 22, 2025</p>
                            <p><i class="fas fa-clock"></i> 6 Hours</p>
                            <div class="certificate-meta">
                                <span class="certificate-id">CERT-2025-002</span>
                                <span class="certificate-type">Seminar</span>
                            </div>
                        </div>
                    </div>

                    <!-- Certificate Card 3 -->
                    <div class="certificate-card">
                        <div class="certificate-preview">
                            <img src="https://images.pexels.com/photos/3760514/pexels-photo-3760514.jpeg" alt="Tech Conference Certificate">
                            <div class="certificate-overlay">
                                <div class="overlay-actions">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fas fa-download"></i> Download
                                    </button>
                                    <button class="btn btn-outline btn-sm">
                                        <i class="fas fa-share"></i> Share
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="certificate-info">
                            <h3>Annual Tech Conference</h3>
                            <p><i class="fas fa-calendar"></i> March 15, 2025</p>
                            <p><i class="fas fa-clock"></i> 8 Hours</p>
                            <div class="certificate-meta">
                                <span class="certificate-id">CERT-2025-003</span>
                                <span class="certificate-type">Conference</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection