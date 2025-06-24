@extends('layouts.sidebar')
@section('content')
    <div class="dashboard-container">
        <main class="dashboard-main">
            <header class="dashboard-header">
                <div class="header-container">
                    <button type="button" class="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="header-title" style="padding: 10px">
                        <h1>Edit User</h1>
                    </div>
                </div>
            </header>

            <div class="dashboard-content">
                <div class="admin-form">
                    <div class="admin-form-header">
                        <h2>Edit Akses User</h2>
                        <p>Admin hanya dapat mengubah hak akses user.</p>
                    </div>

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                    @endif
                    <form method="POST" action="{{ route('admin.user.update', $user->id_user) }}">
                        @csrf
                        @method('PUT')

                        <div class="admin-form-section">
                            <h3 style="margin-top: -20px;"></h3>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" name="nama" value="{{ $user->nama }}" readonly
                                    class="form-control" style="background-color: #f9fafb;">
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" value="{{ $user->email }}" readonly
                                    class="form-control" style="background-color: #f9fafb;">
                            </div>
                        </div>

                        <div class="admin-form-section">
                            <h3>Akses & Izin</h3>
                            <label for="role">Pilih Akses Sebagai</label>
                            <select name="id_role" id="role" class="form-control" required>
                                <option value="">-- Pilih Akses --</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id_role }}"
                                        {{ $user->id_role == $role->id_role ? 'selected' : '' }}>
                                        {{ $role->nama_role }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="admin-form-footer">
                            <a href="{{ route('admin.user.index') }}" class="btn btn-outline">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection
