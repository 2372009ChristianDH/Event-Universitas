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
                        <h1>Data User</h1>
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
                                <span class="notification-badge">5</span>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- User Management Content -->
            <div class="dashboard-content">
                <form method="GET" action="{{ route('admin.user.index') }}" style="margin-bottom: 30px;">
                    <div
                        style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); padding: 25px; border-radius: 15px; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                        <div style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">
                            <label for="role"
                                style="font-weight: 600; color: #374151; font-size: 14px; min-width: 80px;">Filter
                                Role:</label>
                            <select id="role" name="role" onchange="this.form.submit()"
                                style="background: white; border: 2px solid #e5e7eb; padding: 12px 16px; border-radius: 10px; color: #374151; font-weight: 500; min-width: 200px; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.05);"
                                onfocus="this.style.borderColor='#4f46e5'; this.style.boxShadow='0 0 0 3px rgba(79, 70, 229, 0.1)'"
                                onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='0 2px 4px rgba(0,0,0,0.05)'">
                                <option value="">🔍 Semua Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->nama_role }}"
                                        {{ $roleFilter == $role->nama_role ? 'selected' : '' }}>
                                        {{ $role->nama_role }}
                                    </option>
                                @endforeach
                            </select>

                            <!-- Input Search Email -->
                            <label for="email"
                                style="font-weight: 600; color: #374151; font-size: 14px; min-width: 80px;">
                                Cari Email:
                            </label>
                            <div style="display: flex; align-items: center; gap: 10px; flex-grow: 1; width: 100%;">
                                <input type="text" id="email" name="email" placeholder="Masukkan email..."
                                    value="{{ request('email') }}"
                                    style="padding: 12px 16px; border-radius: 10px; border: 2px solid #e5e7eb; min-width: 250px; color: #374151; font-weight: 500;"
                                    onfocus="this.style.borderColor='#4f46e5'; this.style.boxShadow='0 0 0 3px rgba(79, 70, 229, 0.1)'"
                                    onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'">
                                <button type="submit"
                                    style="background: #4f46e5; color: white; padding: 8px 20px; border-radius: 10px; border: none; cursor: pointer; font-weight: 600; display: flex; align-items: center; transition: background 0.3s ease;">
                                    <i class="fas fa-search" style="margin-right: 8px;"></i>
                                    Cari
                                </button>

                            </div>

                            <div style="margin-left: auto;">
                                <span
                                    style="background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%); color: white; padding: 8px 16px; border-radius: 20px; font-size: 12px; font-weight: 600;">{{ count($users) }}
                                    User Ditemukan</span>
                            </div>
                        </div>
                    </div>
                </form>

            @if (session('success'))
                <div id="success-alert"
                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 flex justify-between items-center gap-4"
                    role="alert" style="width: 100%;">

                    <div class="flex items-start gap-2">
                        <i class="fas fa-check-circle text-green-600 mt-1 text-lg"></i>
                        <div>
                            <strong class="font-semibold">Success!</strong>
                            <span class="block">{{ session('success') }}</span>
                        </div>
                    </div>

                    <button onclick="document.getElementById('success-alert').remove()"
                        class="text-green-700 hover:text-green-900 focus:outline-none self-center">
                        <i class="fas fa-times text-xl" style="margin-right: 20px"></i> <!-- ✅ ukuran ikon diperbesar -->
                    </button>
                </div>
            @endif

                {{-- tamabah user --}}
                <div class="create-event-button"
                    style="margin-top: 20px; margin-right:50px; margin-bottom:25px; text-align: right;">
                    <a href={{ route('admin.user.create') }} class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah User
                    </a>
                </div>

                {{-- table user --}}
                <div
                    style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.1); border: 1px solid #e2e8f0;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);">
                                <th
                                    style="padding: 20px; text-align: center; font-weight: 700; color: #374151; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 2px solid #e5e7eb;">
                                    <i class="fas fa-user" style="margin-right: 8px; color: #6b7280;"></i>Nama
                                </th>
                                <th
                                    style="padding: 20px; text-align: center; font-weight: 700; color: #374151; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 2px solid #e5e7eb;">
                                    <i class="fas fa-envelope" style="margin-right: 8px; color: #6b7280;"></i>Email
                                </th>
                                <th
                                    style="padding: 20px; text-align: center; font-weight: 700; color: #374151; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 2px solid #e5e7eb;">
                                    <i class="fas fa-shield-alt" style="margin-right: 8px; color: #6b7280;"></i>Role
                                </th>
                                <th
                                    style="padding: 20px; text-align: center; font-weight: 700; color: #374151; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 2px solid #e5e7eb;">
                                    <i class="fas fa-cogs" style="margin-right: 8px; color: #6b7280;"></i>Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr style="transition: all 0.3s ease; border-bottom: 1px solid #f3f4f6;"
                                    onmouseover="this.style.background='#f8fafc'; this.style.transform='scale(1.01)'"
                                    onmouseout="this.style.background='white'; this.style.transform='scale(1)'">
                                    <td style="padding: 20px; text-align: center; color: #374151; font-weight: 600;">
                                        <div
                                            style="display: flex; align-items: center; justify-content: center; gap: 12px;">
                                            <div
                                                style="width: 40px; height: 40px; border-radius: 50%; background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 16px;">
                                                {{ strtoupper(substr($user['nama'], 0, 1)) }}
                                            </div>
                                            <span>{{ $user['nama'] }}</span>
                                        </div>
                                    </td>
                                    <td style="padding: 20px; text-align: center; color: #6b7280; font-weight: 500;">
                                        <span
                                            style="background: #f3f4f6; padding: 6px 12px; border-radius: 20px; font-size: 13px;">{{ $user['email'] }}</span>
                                    </td>
                                    <td style="padding: 20px; text-align: center;">{{ $user->role['nama_role'] }}</td>
                                    <td style="padding: 20px; text-align: center;">
                                        <div>
                                            <a href="{{ route('admin.user.edit', ['id' => $user->id_user]) }}" class="btn-icon" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a class="btn-icon" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" style="padding: 60px; text-align: center; color: #6b7280;">
                                        <div style="display: flex; flex-direction: column; align-items: center; gap: 15px;">
                                            <i class="fas fa-users" style="font-size: 48px; color: #d1d5db;"></i>
                                            <h3 style="margin: 0; color: #374151; font-weight: 600;">Tidak ada data user
                                            </h3>
                                            <p style="margin: 0; color: #6b7280;">Belum ada user yang terdaftar dalam sistem
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="pagination">
                    <a href="#" class="pagination-arrow disabled">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <a href="#" class="pagination-number active">1</a>
                    <a href="#" class="pagination-number">2</a>
                    <a href="#" class="pagination-number">3</a>
                    <span class="pagination-ellipsis">...</span>
                    <a href="#" class="pagination-number">8</a>
                    <a href="#" class="pagination-arrow">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </main>
    </div>
@endsection
