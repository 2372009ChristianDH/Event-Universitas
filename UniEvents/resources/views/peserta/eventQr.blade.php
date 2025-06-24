@extends('layouts.sidebar')

@section('content')
    <div class="dashboard-container">
        <main class="dashboard-main">
            <header class="dashboard-header">
                <div class="header-container">
                    <button type="button" class="menu-toggle"><i class="fas fa-bars"></i></button>
                    <div class="header-title" style="padding: 10px">
                        <h1>My QR Codes</h1>
                    </div>
                </div>
            </header>

            <!-- Filter Nama Event -->
            <div style="margin: 20px 0;">
                <form method="GET" action="{{ route('qr.my') }}"
                    style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">
                    <label for="eventFilter"
                        style="font-weight: 600; color: #374151; font-size: 14px; min-width: 120px;">Filter Nama Event:</label>

                    <select name="event" id="eventFilter" onchange="this.form.submit()"
                        style="background: white; border: 2px solid #e5e7eb; padding: 12px 16px; border-radius: 10px; color: #374151; font-weight: 500; min-width: 250px; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.05);"
                        onfocus="this.style.borderColor='#4f46e5'; this.style.boxShadow='0 0 0 3px rgba(79, 70, 229, 0.1)'"
                        onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='0 2px 4px rgba(0,0,0,0.05)'">
                        <option value="">🔍 Semua Event</option>
                        @foreach($allEvents as $event)
                            <option value="{{ $event->id_kegiatan }}" {{ request('event') == $event->id_kegiatan ? 'selected' : '' }}>
                                {{ $event->nama_kegiatan }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>

            <div class="dashboard-content">
                <div class="qr-codes-grid">
                    @forelse ($qrRegistrasi as $reg)
                        <div class="qr-code-card">
                            <div class="qr-code-header">
                                <h3>{{ $reg->detailKegiatan->kegiatan->nama_kegiatan }}</h3>
                                <span
                                    class="event-date">{{ \Carbon\Carbon::parse($reg->tanggal_registrasi)->format('d M Y') }}</span>
                            </div>

                            <div class="qr-code-content">
                                <div class="qr-placeholder">
                                    <i><img src="{{ asset('storage/' . $reg->kode_qr) }}" alt="QR Code"
                                            style="width: 150px; height: 150px; object-fit: contain;"></i>
                                </div>

                                <div class="qr-code-info">
                                    <p><strong>Sesi: </strong> {{ $reg->detailKegiatan->nama_sesi ?? '-' }}</p>
                                    <p><strong>Lokasi: </strong> {{ $reg->detailKegiatan->lokasi }} </p>
                                    <p><strong>Tanggal: </strong>{{ \Carbon\Carbon::parse($reg->detailKegiatan->tanggal)->format('d M Y') }} </p>
                                    <p><strong>Waktu: </strong>{{ \Carbon\Carbon::parse($reg->detailKegiatan->waktu_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($reg->detailKegiatan->waktu_selesai)->format('H:i') }} </p>
                                    <p><strong>Narasumber: </strong> {{ $reg->detailKegiatan->narasumber }} </p>
                                </div>
                            </div>

                            <div class="qr-code-actions" style="margin-top: 16px; display: flex; gap: 10px;">
                                <a href="{{ asset('storage/' . $reg->kode_qr) }}" download class="btn btn-primary btn-sm"
                                    style="padding: 8px 16px; border-radius: 8px; background: #4f46e5; color: white;">
                                    <i class="fas fa-download"></i> Download QR
                                </a>
                                <button onclick="shareQr('{{ asset('storage/' . $reg->kode_qr) }}')"
                                    class="btn btn-outline btn-sm"
                                    style="padding: 8px 16px; border-radius: 8px; border: 2px solid #4f46e5; color: #4f46e5;">
                                    <i class="fas fa-share-alt"></i> Share
                                </button>
                            </div>
                        </div>
                    @empty
                        <p style="text-align: center; color: #6B7280;">Belum ada QR code yang tersedia.</p>
                    @endforelse
                </div>

                <div class="qr-instructions" style="margin-top: 40px;">
                    <div class="instruction-card" style="background: #f9fafb; padding: 20px; border-radius: 12px;">
                        <div class="instruction-icon" style="font-size: 20px; color: #2563eb;">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <div class="instruction-content" style="margin-top: 10px;">
                            <h3>Cara Menggunakan Kode QR Anda</h3>
                            <ol style="padding-left: 20px; margin-top: 10px; color: #4b5563;">
                                <li>1. Download atau screenshot QR Code Anda</li>
                                <li>2. Tunjukkan QR Code saat hadir di lokasi</li>
                                <li>3. QR akan discan oleh petugas</li>
                                <li>4. Kehadiran Anda akan langsung tercatat</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function shareQr(qrUrl) {
            if (navigator.share) {
                navigator.share({
                    title: 'My Event QR Code',
                    url: qrUrl
                }).catch(console.error);
            } else {
                prompt("Salin link QR Code:", qrUrl);
            }
        }
    </script>
@endsection
