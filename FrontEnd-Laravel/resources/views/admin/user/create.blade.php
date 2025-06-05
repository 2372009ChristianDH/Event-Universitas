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

                    <form method="POST" action="{{ route('admin.user.store') }}" class="form-horizontal">
                        @csrf
                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6"
                                style="margin-top:-15px;" role="alert">
                                @foreach ($errors->all() as $error)
                                    <p style="margin-top: 11px;">{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
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
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" required>
                            </div>
                            <label for="id_role">Pilih Role</label>
                            <select name="id_role" id="id_role" class="form-control" required>
                                <option value="">-- Pilih Role --</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id_role }}">{{ $role->nama_role }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="admin-form-footer">
                            <a href="{{ route('admin.user.index') }}" class="btn btn-outline">Batal</a>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    @endsection
