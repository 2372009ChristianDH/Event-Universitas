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
                    <div class="header-title" style="padding: 10px">
                        <h1>Keungan Dashboard</h1>
                    </div>
                </div>
            </header>

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

            <!-- Dashboard Content -->
            <div class="dashboard-content">
                <div class="dashboard-welcome">
                    <h2>Manajemen Keuangan</h2>
                    <p>Mengelola pembayaran dan catatan keuangan untuk event universitas</p>
                </div>

                <!-- Filter Nama Event -->
                <div style="margin: 20px 0;">
                    <form method="GET" action="{{ route('keuangan.laporanPembayaran') }}"
                        style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">
                        <label for="eventFilter"
                            style="font-weight: 600; color: #374151; font-size: 14px; min-width: 120px;">Filter Nama
                            Event:</label>

                        <select name="event" id="eventFilter" onchange="this.form.submit()"
                            style="background: white; border: 2px solid #e5e7eb; padding: 12px 16px; border-radius: 10px; color: #374151; font-weight: 500; min-width: 250px; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.05);"
                            onfocus="this.style.borderColor='#4f46e5'; this.style.boxShadow='0 0 0 3px rgba(79, 70, 229, 0.1)'"
                            onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='0 2px 4px rgba(0,0,0,0.05)'">
                            <option value="">🔍 Semua Event</option>
                            @foreach ($allEvents as $event)
                                <option value="{{ $event->id_kegiatan }}"
                                    {{ request('event') == $event->id_kegiatan ? 'selected' : '' }}>
                                    {{ $event->nama_kegiatan }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>

                <div>
                    <div class="section pending-payments">
                        <div class="section-header">
                            <h3>Menunggu Persetujuan</h3>
                        </div>
                        <div style="overflow-x: auto; width: 100%;">
                            <table class="data-table" style="width: 100%; table-layout: auto;">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">Nama</th>
                                        <th style="text-align: center">Nama Sesi</th>
                                        <th style="text-align: center">Biaya Registrasi</th>
                                        <th style="text-align: center">Tanggal Registrasi</th>
                                        <th style="text-align: center">Bukti Pembayaran</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center">
                                    @forelse ($pendingRegistrasi as $reg)
                                        <tr>
                                            <td>
                                                <div class="user-info"><span>{{ $reg->user->nama }}</span></div>
                                            </td>
                                            <td>{{ $reg->detailKegiatan->nama_sesi ?? 'N/A' }}</td>
                                            <td>Rp. {{ number_format($reg->detailKegiatan->biaya_registrasi, 0, ',', '.') }}
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($reg->tanggal_registrasi)->format('d M Y') }}</td>
                                            <td>
                                                <a href="{{ asset('storage/' . $reg->bukti_pembayaran) }}" target="_blank"
                                                    class="btn-icon view-receipt" title="View Receipt">
                                                    <i class="fas fa-file-invoice"></i>
                                                </a>
                                            </td>
                                            <td>{{ $reg->status_konfirmasi }}</td>
                                            <td>
                                                @if ($reg->status_konfirmasi == 'Pending')
                                                    <div class="action-buttons">
                                                        <form
                                                            action="{{ route('registrasi.terima', $reg->id_registrasi) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            <button type="submit" class="btn-icon approve" title="Approve">
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                        </form>

                                                        <form action="{{ route('registrasi.tolak', $reg->id_registrasi) }}"
                                                            method="POST" onsubmit="return rejectConfirm(this)"
                                                            style="display:inline;">
                                                            @csrf
                                                            <input type="hidden" name="alasan_penolakan" value="">
                                                            <button type="submit" class="btn-icon reject" title="Reject">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </form>

                                                        <script>
                                                            function rejectConfirm(form) {
                                                                const reason = prompt("Masukkan alasan penolakan:");
                                                                if (!reason) return false;
                                                                form.querySelector('input[name="alasan_penolakan"]').value = reason;
                                                                return true;
                                                            }
                                                        </script>
                                                @endif
                        </div>
                        </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada registrasi pending.</td>
                        </tr>
                        @endforelse
                        </tbody>
                        </table>
                    </div>

                </div>
            </div>
    </div>
    </main>
    </div>
@endsection
