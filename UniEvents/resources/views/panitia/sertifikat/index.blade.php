<!-- filepath: d:\EventUniversitas\FrontEnd-Laravel\resources\views\panitia\sertifikat\index.blade.php -->
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
                        <h1>Upload Sertifikat</h1>
                    </div>
                </div>
            </header>

            {{-- ALERT --}}
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
                        <i class="fas fa-times text-xl" style="margin-right: 20px"></i>
                    </button>
                </div>
            @endif

            <!-- Dashboard Content -->
            <div class="dashboard-content">
                <div class="dashboard-welcome">
                    <h2>Manajemen Sertifikat</h2>
                    <p>Mengelola upload dan distribusi sertifikat peserta event universitas</p>
                </div>

                {{-- FILTER --}}
                <form method="GET" action="{{ route('panitia.sertifikat.index') }}" class="flex items-center gap-4 mb-6" id="filterForm" style="width:100%;">
                    <div style="width: 250px;">
                        <label class="block text-sm font-medium text-gray-700">Event</label>
                        <select name="event" id="eventSelect" class="form-select border border-gray-300 rounded px-3 py-2" style="width:100%;">
                            <option value="">-- Semua Event --</option>
                            @foreach($listEvent as $event)
                                <option value="{{ $event->id_kegiatan }}" {{ request('event') == $event->id_kegiatan ? 'selected' : '' }}>
                                    {{ $event->nama_kegiatan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div style="width: 250px;">
                        <label class="block text-sm font-medium text-gray-700">Sesi</label>
                        <select name="sesi" id="sesiSelect" class="form-select border border-gray-300 rounded px-3 py-2" style="width:100%;">
                            <option value="">-- Semua Sesi --</option>
                            @foreach($listSesi->where('id_kegiatan', request('event')) as $sesi)
                                <option value="{{ $sesi->id_detail_kegiatan }}" {{ request('sesi') == $sesi->id_detail_kegiatan ? 'selected' : '' }}>
                                    {{ $sesi->nama_sesi }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="self-end" style="width: 120px;">
                        <button type="submit" class="btn btn-primary" style="width:100%;">Filter</button>
                    </div>
                </form>

                <!-- TABEL -->
                <div style="width:100%; margin-top:20px;" >
                    <div class="section pending-payments" style="width:100%;">
                        <div class="section-header">
                            <h3>Daftar Sertifikat Peserta</h3>
                        </div>
                        <div class="payment-table-wrapper" style="width:100%;">
                            <table class="data-table" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Nama Peserta</th>
                                        <th>Event</th>
                                        <th>Sesi</th>
                                        <th>Status Hadir</th>
                                        <th>Sertifikat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($hadirRegistrasi as $reg)
                                        <tr>
                                            <td>{{ $reg->user->nama }}</td>
                                            <td>{{ $reg->detailKegiatan->kegiatan->nama_kegiatan ?? '-' }}</td>
                                            <td>{{ $reg->detailKegiatan->nama_sesi ?? '-' }}</td>
                                            <td><span class="status-badge active">{{ $reg->presensi->status }}</span></td>
                                            <td>
                                                @if($reg->sertifikat)
                                                    <a href="{{ asset('storage/' . $reg->sertifikat->sertifikat) }}" target="_blank">Lihat Sertifikat</a>
                                                @else
                                                    Belum ada
                                                @endif
                                            </td>
                                            <td>
                                                @if($reg->sertifikat == null)
                                                    <a href="{{ route('panitia.sertifikat.create', $reg->id_registrasi) }}" class="btn btn-primary mt-1">Upload Sertifikat</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada unggahan sertifikat yang tertunda</td>
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

    {{-- SCRIPT DINAMIS --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const eventSelect = document.getElementById('eventSelect');
            const sesiSelect = document.getElementById('sesiSelect');

            eventSelect.addEventListener('change', function () {
                const eventId = this.value;
                sesiSelect.innerHTML = '<option value="">-- Memuat Sesi... --</option>';

                if (eventId) {
                    fetch(`/panitia/sesi-by-event/${eventId}`)
                        .then(response => response.json())
                        .then(data => {
                            sesiSelect.innerHTML = '<option value="">-- Semua Sesi --</option>';
                            data.forEach(sesi => {
                                const option = document.createElement('option');
                                option.value = sesi.id_detail_kegiatan;
                                option.textContent = sesi.nama_sesi;
                                sesiSelect.appendChild(option);
                            });
                        })
                        .catch(() => {
                            sesiSelect.innerHTML = '<option value="">-- Gagal Memuat --</option>';
                        });
                } else {
                    sesiSelect.innerHTML = '<option value="">-- Semua Sesi --</option>';
                }
            });
        });
    </script>
@endsection