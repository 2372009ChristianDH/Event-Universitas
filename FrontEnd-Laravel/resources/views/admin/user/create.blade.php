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
                        <h1>Tambah User</h1>
                    </div>
                </div>
            </header>

            <!-- Add User Form -->
            <div class="dashboard-content">
                <div class="admin-form">
                    <div class="admin-form-header">
                        <h2>Informasi User Baru</h2>
                        <p>Masukkan detail untuk User baru</p>
                    </div>

                    <form metthod="POST" action="">
                        @csrf
                        <div class="admin-form-section">
                            <h3 style="margin-top: -20px;"></h3>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <label for="email">Pilih Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="">-- Pilih Role --</option>
                                @foreach ($roles as $role)
                                    <option value="{{ strtolower($role->nama_role) }}">{{ $role->nama_role }}</option>
                                @endforeach
                            </select>
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
                            <a href="{{ route('admin.user.index') }}" class="btn btn-outline">Cancel</a>
                            <button type="submit" class="btn btn-primary">Add Team Member</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
@endsection