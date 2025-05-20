@extends('layouts.sidebar')
@section('content')
    <div class="app-container">
        <main class="dashboard-main">
            <header class="dashboard-header">
                <div class="header-container">
                    <button type="button" class="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="header-title">
                        <h1>Regristrasi Event</h1>
                    </div>
                    <div class="header-actions">
                        <div class="search-bar">
                            <input type="text" placeholder="Search...">
                            <button type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <div class="notifications">
                            <button type="button" class="notification-btn">
                                <i class="fas fa-bell"></i>
                                <span class="notification-badge">3</span>
                            </button>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Registration Form -->
            <section class="form-section" style="margin-top: -100px;">
                <div class="container">
                    <div class="form-container">
                        <div class="form-sidebar">
                            <div class="form-sidebar-content">
                                <h2>Annual Tech Conference 2025</h2>
                                <div class="event-summary">
                                    <div class="summary-item">
                                        <i class="fas fa-calendar"></i>
                                        <div>
                                            <h4>Date & Time</h4>
                                            <p>June 15, 2025</p>
                                            <p>9:00 AM - 5:00 PM</p>
                                        </div>
                                    </div>
                                    <div class="summary-item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <div>
                                            <h4>Location</h4>
                                            <p>Main Auditorium</p>
                                            <p>University Campus</p>
                                        </div>
                                    </div>
                                    <div class="summary-item">
                                        <i class="fas fa-ticket-alt"></i>
                                        <div>
                                            <h4>Registration Fee</h4>
                                            <p>$25.00</p>
                                        </div>
                                    </div>
                                    <div class="summary-item">
                                        <i class="fas fa-users"></i>
                                        <div>
                                            <h4>Available Spots</h4>
                                            <p>143 of 200</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-content">
                            <h1>Event Registration</h1>
                            <p class="form-subtitle">Complete the form below to register for the event</p>
                            
                            <form class="registration-form">                                
                                <div class="form-group">
                                    <label for="student_id">Student ID</label>
                                    <input type="text" id="student_id" name="student_id" value="STD123456" readonly>
                                </div>
                                
                                <div class="form-group">
                                    <label for="accessibility">Accessibility Requirements</label>
                                    <textarea id="accessibility" name="accessibility" placeholder="Please let us know if you have any accessibility requirements"></textarea>
                                </div>
                                
                                <div class="form-group checkbox">
                                    <input type="checkbox" id="terms" name="terms" required>
                                    <label for="terms">I agree to the event terms and conditions</label>
                                </div>
                                
                                <div class="payment-section">
                                    <h3>Payment Details</h3>
                                    <div class="payment-options">
                                        <div class="payment-option">
                                            <input type="radio" id="bank_transfer" name="payment_method" value="bank_transfer" checked>
                                            <label for="bank_transfer">
                                                <span class="option-title">Bank Transfer</span>
                                                <span class="option-desc">Transfer to our university account</span>
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="bank-details">
                                        <h4>Bank Account Details</h4>
                                        <p><strong>Bank Name:</strong> University Bank</p>
                                        <p><strong>Account Name:</strong> University Events</p>
                                        <p><strong>Account Number:</strong> 1234-5678-9012-3456</p>
                                        <p><strong>Reference:</strong> TC2025-STD123456</p>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="payment_proof">Upload Payment Proof</label>
                                        <div class="file-upload">
                                            <i class="fas fa-cloud-upload-alt file-upload-icon"></i>
                                            <p>Drag and drop your payment proof here or click to browse</p>
                                            <input type="file" id="payment_proof" name="payment_proof" accept="image/*,.pdf" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Complete Registration</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            @include('layouts.footer')
        </main>
    </div>
@endsection