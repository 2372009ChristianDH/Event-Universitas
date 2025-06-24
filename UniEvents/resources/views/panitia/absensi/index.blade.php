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
                    <h1>Absensi Scanner</h1>
                </div>
            </div>
        </header>

        <div class="dashboard-content">
            <div class="scanner-container">
                <select id="event" name="event">
                    <option value="">Pilih Event</option>
                    @foreach ($events as $event)
                        <option value="{{ $event->id_kegiatan }}">{{ $event->nama_kegiatan }}</option>
                    @endforeach
                </select>

                <select id="session" name="session" style="margin-top:10px; display: none;">
                    <option value="">Pilih Sesi</option>
                </select>

                <div class="scanner-section">
                    <div class="scanner-frame">
                        <div id="reader" style="width: 100%; height: 300px;"></div>
                        <div style="text-align:center; margin: 10px 0;">
                            <input type="file" id="qr-image-input" accept="image/*" />
                            <label for="qr-image-input" style="font-size:13px; color:#888;">Atau upload gambar QR</label>
                        </div>
                    </div>

                    <div id="scan-status" class="alert alert-processing" style="display: flex; margin-top: 10px;">
                        <i class="fas fa-spinner fa-spin"></i> Sedang memindai QR...
                    </div>
                    <div id="scan-result" style="margin-top: 10px; color: green;"></div>
                    <div class="scanner-controls">
                        <button class="btn btn-outline" onclick="resetScanner()">
                            <i class="fas fa-sync-alt"></i> Reset Scanner
                        </button>
                    </div>
                </div>

                <div class="attendance-list">
                    <h3>Check-in Terbaru</h3>
                    <div id="recent-checkins" class="attendance-table-wrapper">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Waktu</th>
                                    <th>ID Registrasi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="checkin-table-body"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Alert Styling -->
<style>
    .alert {
        padding: 10px 15px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        display: none;
        align-items: center;
        gap: 10px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-error {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .alert-processing {
        background-color: #fff3cd;
        color: #856404;
        border: 1px solid #ffeeba;
    }
</style>

<!-- QR Scanner & Script -->
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    let scanner = null;
    let isProcessing = false;

    function startScanner() {
        scanner = new Html5Qrcode("reader");
        showScanStatus("🔎 Sedang memindai QR...", "processing");
        scanner.start({ facingMode: "environment" }, { fps: 10, qrbox: 250 }, onScanSuccess, onScanError)
            .then(() => console.log("Scanner started"))
            .catch(err => {
                showScanStatus("❌ Gagal memulai scanner: " + err, "error");
            });
    }

    function resetScanner() {
        if (scanner) {
            scanner.stop().then(() => {
                document.getElementById('scan-result').innerText = '';
                isProcessing = false;
                startScanner();
            });
        }
    }

    function onScanSuccess(decodedText) {
        if (isProcessing) return;
        isProcessing = true;

        let qrData;
        try {
            qrData = JSON.parse(decodedText);
        } catch (err) {
            showScanStatus("❌ QR tidak valid.", "error");
            isProcessing = false;
            return;
        }

        const eventId = document.getElementById('event').value;
        const sessionId = document.getElementById('session').value;

        if (!eventId || !sessionId) {
            showScanStatus("❌ Harap pilih event dan sesi terlebih dahulu.", "error");
            isProcessing = false;
            return;
        }

        if (qrData.event_id != eventId) {
            showScanStatus("❌ QR ini bukan untuk event yang dipilih.", "error");
            isProcessing = false;
            return;
        }

        if (qrData.session_id != sessionId) {
            showScanStatus("❌ QR ini tidak sesuai dengan sesi yang dipilih.", "error");
            isProcessing = false;
            return;
        }

        const id = qrData.id_registrasi;
        showScanStatus("⏳ Memproses kehadiran...", "processing");

        fetch(`/absensi/scan/${id}?event_id=${eventId}&session_id=${sessionId}`)
            .then(response => {
                if (!response.ok) throw new Error("Data tidak ditemukan.");
                return response.json();
            })
            .then(data => {
                showScanStatus("✅ " + data.message, "success");
                document.getElementById('scan-result').innerText = data.message;
                addCheckinToTable(id);
                scanner.stop().then(() => {
                    setTimeout(() => {
                        isProcessing = false;
                        startScanner();
                    }, 2000);
                });
            })
            .catch(error => {
                showScanStatus("❌ Gagal mencatat kehadiran: " + error.message, "error");
                setTimeout(() => {
                    isProcessing = false;
                    showScanStatus("🔎 Sedang memindai QR...", "processing");
                }, 3000);
            });
    }

    function onScanError(errorMessage) {
        // Silent
    }

    function showScanStatus(message, type = 'success') {
        const statusDiv = document.getElementById('scan-status');
        let icon;
        switch (type) {
            case 'success':
                icon = '<i class="fas fa-check-circle"></i>';
                statusDiv.className = 'alert alert-success';
                break;
            case 'error':
                icon = '<i class="fas fa-times-circle"></i>';
                statusDiv.className = 'alert alert-error';
                break;
            case 'processing':
                icon = '<i class="fas fa-spinner fa-spin"></i>';
                statusDiv.className = 'alert alert-processing';
                break;
            default:
                icon = '';
                statusDiv.className = 'alert';
        }
        statusDiv.innerHTML = `${icon} ${message}`;
        statusDiv.style.display = 'flex';

        if (type === 'success' || type === 'error') {
            setTimeout(() => statusDiv.style.display = 'none', 5000);
        }
    }

    function addCheckinToTable(id) {
        const now = new Date();
        const time = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        const tbody = document.getElementById('checkin-table-body');
        const row = document.createElement('tr');
        row.innerHTML = `<td>${time}</td><td>${id}</td><td><span class="status-badge active">Hadir</span></td>`;
        tbody.prepend(row);
    }

    document.addEventListener('DOMContentLoaded', function () {
        startScanner();

        document.getElementById('event').addEventListener('change', function () {
            const eventId = this.value;
            const sessionSelect = document.getElementById('session');
            sessionSelect.innerHTML = '<option value="">Pilih Sesi</option>';
            sessionSelect.style.display = eventId ? 'block' : 'none';

            if (eventId) {
                fetch(`/api/sessions/by-event/${eventId}`)
                    .then(res => res.json())
                    .then(data => {
                        data.forEach(session => {
                            const option = document.createElement('option');
                            option.value = session.id_detail_kegiatan;
                            option.textContent = `${session.nama_sesi}`;
                            sessionSelect.appendChild(option);
                        });
                    })
                    .catch(err => {
                        alert("Gagal mengambil sesi.");
                        console.error(err);
                    });
            }
        });

        document.getElementById('qr-image-input').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (!file) return;
            showScanStatus("⏳ Memproses gambar QR...", "processing");
            scanner.scanFile(file, true)
                .then(decodedText => onScanSuccess(decodedText))
                .catch(err => {
                    showScanStatus("❌ Gagal membaca QR dari gambar.", "error");
                });
        });
    });
</script>
@endsection
