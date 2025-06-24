@extends('layouts.sidebar')

@section('content')
    <div class="dashboard-container">
        <main class="dashboard-main">
            <header class="dashboard-header">
                <div class="header-container">
                    <button type="button" class="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="header-title">
                        <h1>Register Kegiatan</h1>
                    </div>
                </div>
            </header>

            <div class="dashboard-content">
                <div class="admin-form">
                    <div class="admin-form-header">
                        <h2>Daftar Event - <span style="color: blue">{{ $kegiatan->nama_kegiatan }}</span></h2>
                        <p>Masukkan detail pendaftaran kegiatan</p>
                    </div>

                    <form method="POST" action="{{ route('peserta.event.store') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- Menampilkan error validasi --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="admin-form-section">
                            <input type="hidden" name="tanggal_registrasi" value="{{ now() }}">

                            <div class="form-group">
                                <label class="form-label"><strong>Pilih Sesi Kegiatan</strong></label>
                                <div class="checkbox-list">
                                    @foreach ($sesiKegiatans as $detail)
                                        <div class="checkbox-card">
                                            <label>
                                                <input type="checkbox" name="id_detail_kegiatan[]"
                                                    value="{{ $detail->id_detail_kegiatan }}"
                                                    data-biaya="{{ $detail->biaya_registrasi }}" >
                                                <div class="checkbox-content">
                                                    <div class="session-title">Sesi {{ $detail->sesi }}:
                                                        {{ $detail->nama_sesi }}</div>
                                                    <div class="session-info">
                                                        <span>Tanggal:
                                                            {{ \Carbon\Carbon::parse($detail->tanggal)->format('d M Y') }}</span>
                                                        |
                                                        <span>Biaya: Rp
                                                            {{ number_format($detail->biaya_registrasi, 0, ',', '.') }}</span>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group upload-wrapper">
                                <label class="form-label">Bukti Pembayaran</label>
                                <label for="bukti_pembayaran" class="upload-label">
                                    <i class="fas fa-upload upload-icon"></i> Choose File
                                </label>
                                <input type="file" id="bukti_pembayaran" name="bukti_pembayaran"
                                    accept=".jpg,.jpeg,.png,.pdf" required hidden>
                                <div id="file-name" class="file-name">Belum ada file yang dipilih</div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label><strong>Total Biaya:</strong> <span id="total-biaya">Rp. 0</span></label>
                        </div>
                        <div class="admin-form-footer">
                            <a href="{{ route('peserta.event.index') }}" class="btn btn-outline">Cancel</a>
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>
                    </form>

                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('input[name="id_detail_kegiatan[]"]');
            const totalBiayaElem = document.getElementById('total-biaya');

            function formatRupiah(angka) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(angka);
            }

            function hitungTotal() {
                let total = 0;
                checkboxes.forEach(cb => {
                    if (cb.checked) {
                        total += parseInt(cb.dataset.biaya) || 0;
                    }
                });
                totalBiayaElem.textContent = formatRupiah(total);
            }

            // Pasang event listener ke semua checkbox
            checkboxes.forEach(cb => {
                cb.addEventListener('change', hitungTotal);
            });

            // Hitung total saat halaman dimuat (jika ada yang sudah dicentang)
            hitungTotal();
        });


        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('bukti_pembayaran');
            const fileNameDisplay = document.getElementById('file-name');

            fileInput.addEventListener('change', function() {
                if (fileInput.files.length > 0) {
                    fileNameDisplay.textContent = fileInput.files[0].name;
                } else {
                    fileNameDisplay.textContent = 'Belum ada file yang dipilih';
                }
            });
        });
    </script>
@endsection
