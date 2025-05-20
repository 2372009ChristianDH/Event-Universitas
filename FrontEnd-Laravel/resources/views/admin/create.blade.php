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
                        <h1>Add Team Member</h1>
                    </div>
                </div>
            </header>

            <!-- Add User Form -->
            <div class="dashboard-content">
                <div class="admin-form">
                    <div class="admin-form-header">
                        <h2>New Team Member Information</h2>
                        <p>Enter the details for the new team member</p>
                    </div>

                    <form>
                        <div class="admin-form-section">
                            <h3>Personal Information</h3>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" id="first_name" name="first_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" id="phone" name="phone">
                                </div>
                            </div>
                        </div>

                        <div class="admin-form-section">
                            <h3>Role & Department</h3>
                            <div class="form-group radio-group">
                                <label>Team Role</label>
                                <div class="radio-options">
                                    <label class="radio-option">
                                        <input type="radio" name="role" value="committee">
                                        <span>Committee</span>
                                    </label>
                                    <label class="radio-option">
                                        <input type="radio" name="role" value="finance">
                                        <span>Finance</span>
                                    </label>
                                    <label class="radio-option">
                                        <input type="radio" name="role" value="admin">
                                        <span>Admin</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="department">Department</label>
                                <select id="department" name="department" required>
                                    <option value="">Select Department</option>
                                    <option value="engineering">Engineering</option>
                                    <option value="business">Business</option>
                                    <option value="science">Science</option>
                                    <option value="arts">Arts</option>
                                    <option value="medicine">Medicine</option>
                                </select>
                            </div>
                        </div>

                        <div class="admin-form-section">
                            <h3>Access & Permissions</h3>
                            <div class="form-group">
                                <label for="access_level">Access Level</label>
                                <select id="access_level" name="access_level" required>
                                    <option value="standard">Standard Access</option>
                                    <option value="elevated">Elevated Access</option>
                                    <option value="full">Full Access</option>
                                </select>
                            </div>

                            <div class="form-group checkbox">
                                <input type="checkbox" id="event_management" name="permissions[]" value="event_management">
                                <label for="event_management">Event Management</label>
                            </div>

                            <div class="form-group checkbox">
                                <input type="checkbox" id="financial_access" name="permissions[]" value="financial_access">
                                <label for="financial_access">Financial Access</label>
                            </div>

                            <div class="form-group checkbox">
                                <input type="checkbox" id="user_management" name="permissions[]" value="user_management">
                                <label for="user_management">User Management</label>
                            </div>
                        </div>

                        <div class="admin-form-footer">
                            <button type="button" class="btn btn-outline">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add Team Member</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection