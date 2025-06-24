@extends('layouts.sidebar')
@section('content')
    <div class="app-container">
        <main class="dashboard-main">
            <header class="dashboard-header">
                <div class="header-container">
                    <button type="button" class="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="header-title" style="padding: 10px">
                        <h1>Event Detail</h1>
                    </div>
                </div>
            </header>
            <!-- Event Details Section -->
            <section class="event-details">
                <div class="event-hero">
                    <img src="https://images.pexels.com/photos/2774556/pexels-photo-2774556.jpeg" alt="Tech Conference"
                        class="event-hero-image">
                    <div class="event-hero-overlay">
                        <div class="container">
                            <div class="event-hero-content">
                                <div class="event-date-large" style="margin-bottom: 15px">
                                    <div class="day"></div>
                                    <div class="month-year">
                                        <span style="font-size: 1.5rem;">{{ $kegiatan->tanggal_display }}</span>
                                    </div>
                                </div>
                                <div class="event-title-container">
                                    <h1>{{ $kegiatan->nama_kegiatan }}</h1>
                                    <div class="event-info">
                                        <p style="color: white"><i class="fas fa-pencil-alt"></i> Status :
                                            {{ $kegiatan->status }}</p>
                                    </div>

                                    {{-- <div class="event-meta">
                                        <span><i class="fas fa-map-marker-alt"></i> Main Auditorium</span>
                                        <span><i class="fas fa-clock"></i> 9:00 AM - 5:00 PM</span>
                                        <span><i class="fas fa-user"></i> Prof. Jonathan Blake</span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (session('success'))
                    <div id="success-alert" style="margin-top: -15; margin-bottom: 15px;"
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
                            <!-- ✅ ukuran ikon diperbesar -->
                        </button>
                    </div>
                @endif

                <div class="container">
                    <div class="event-content-wrapper">
                        <div class="event-main-content">
                            <div class="event-section">
                                <h2>Informasi Event</h2>
                                <div class="schedule-timeline">
                                    @foreach ($detailKegiatan as $sesi)
                                        <div class="timeline-item"
                                            style="border: 1px solid #ccc; border-radius: 8px; margin-bottom: 20px; padding: 20px; background-color: #f9f9f9; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                            <div class="timeline-content">
                                                <h3>Sesi: {{ $sesi->sesi }}</h3>
                                                <div>
                                                    <i class="fas fa-tag"></i> Nama Sesi : {{ $sesi->nama_sesi }}
                                                </div>
                                                <div>
                                                    <i class="fas fa-calendar-alt"></i> Tanggal :
                                                    {{ \Carbon\Carbon::parse($sesi->tanggal)->format('d M Y') }}
                                                </div>
                                                <div class="event-time">
                                                    <i class="fas fa-clock"></i> Waktu :
                                                    {{ \Carbon\Carbon::parse($sesi->waktu_mulai)->format('H:i') }} -
                                                    {{ \Carbon\Carbon::parse($sesi->waktu_selesai)->format('H:i') }}
                                                </div>
                                                <div>
                                                    <i class="fas fa-map-marker-alt"></i> Lokasi : {{ $sesi->lokasi }}
                                                </div>
                                                <div class="event-speaker">
                                                    <i class="fas fa-user"></i> Narasumber : {{ $sesi->narasumber }}
                                                </div>
                                                <div>
                                                    <i class="fas fa-money-bill-wave"></i> Harga : Rp.
                                                    {{ number_format($sesi->biaya_registrasi, 0, ',', '.') }}
                                                </div>
                                                <div>
                                                    <i class="fas fa-users"></i> Maksimal : {{ $sesi->maksimal_peserta }}
                                                    peserta
                                                </div>

                                                {{-- Tombol edit/hapus untuk panitia --}}
                                                @if (session('user.id_role') === 2)
                                                    <div style="margin-top: 15px; display: flex; gap: 10px;">
                                                        <a href="{{ route('panitia.event.sesi.edit', ['id_sesi' => $sesi->id_detail_kegiatan]) }}"
                                                            style="background-color: #ffc107; color: #000; padding: 6px 12px; text-decoration: none; border-radius: 4px; font-size: 14px;">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        @if (session('user.id_role') === 4)
                            <div class="event-sidebar">
                                <div class="registration-card">
                                    <div class="card-header">
                                        <h3>Registrasi</h3>
                                    </div>
                                    <div class="card-body">
                                        {{-- <div class="price-badge">
                                            <span class="currency">Rp.</span>
                                            <span
                                                class="amount">{{ number_format($kegiatan->biaya_registrasi, 0, ',', '.') }}</span>
                                        </div> --}}
                                        <div class="registration-info">
                                            @foreach ($detailKegiatan as $sesi)
                                                <div class="info-item">
                                                    <span class="label">Kapasitas Sesi {{ $sesi->sesi }} </span>
                                                    <span class="value">
                                                        {{ $sesi->registrasi_count }} / {{ $sesi->maksimal_peserta }}

                                                    </span>
                                                </div>
                                            @endforeach


                                            <div class="info-item">
                                                <span class="label">Batas Waktu Pendaftaran</span>
                                                <span
                                                    class="value">{{ \Carbon\Carbon::parse($kegiatan->tanggal_mulai)->format('d M Y') }}</span>
                                            </div>
                                        </div>
                                        @foreach ($detailKegiatan as $sesi)
                                            @php $status = $sesiStatus[$sesi->id_detail_kegiatan]; @endphp
                                        @endforeach
                                        <div class="card-footer">
                                            @if($status == 'closed')
                                                <button class="btn btn-secondary btn-block" disabled>Registrasi Ditutup</button>
                                            @elseif($status == 'registered')
                                                <button class="btn btn-secondary btn-block" disabled>Anda sudah registrasi</button>
                                            @elseif($status == 're-register')
                                                <a href="{{ route('peserta.event.create', ['id_kegiatan' => $kegiatan->id_kegiatan]) }}"
                                                class="btn btn-primary btn-block">Registrasi Ulang</a>
                                            @elseif($status == 'can-register')
                                                <a href="{{ route('peserta.event.create', ['id_kegiatan' => $kegiatan->id_kegiatan]) }}"
                                                class="btn btn-primary btn-block">Registrasi Sekarang!</a>
                                            @else
                                                <button class="btn btn-secondary btn-block" disabled>Tidak dapat registrasi</button>
                                            @endif
                                        </div>
                                        
                                    </div>

                                    <div class="event-location">
                                        <h3>Location</h3>
                                        <div class="location-info">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <div>
                                                <p class="location-name">Main Auditorium</p>
                                                <p class="location-address">University Campus, Building 3, Floor 1</p>
                                                <p class="location-city">University City, UC 12345</p>
                                            </div>
                                        </div>
                                        <div class="location-map">
                                            <img src="https://images.pexels.com/photos/408503/pexels-photo-408503.jpeg"
                                                alt="Map location">
                                            <a href="#" class="btn btn-outline btn-sm">View on Map</a>
                                        </div>
                                    </div>

                                    <div class="share-event">
                                        <h3>Share This Event</h3>
                                        <div class="share-buttons">
                                            <a href="#" class="share-button facebook">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                            <a href="#" class="share-button twitter">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                            <a href="#" class="share-button linkedin">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                            <a href="#" class="share-button email">
                                                <i class="fas fa-envelope"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                        @endif
                    </div>

                    <!-- Related Events -->
                    <div class="related-events">
                        <h2>You Might Also Be Interested In</h2>
                        <div class="related-events-slider">
                            <div class="event-card">
                                <div class="event-image">
                                    <img src="https://images.pexels.com/photos/2774545/pexels-photo-2774545.jpeg"
                                        alt="Workshop">
                                    <div class="event-date">
                                        <span class="day">30</span>
                                        <span class="month">Jun</span>
                                    </div>
                                </div>
                                <div class="event-content">
                                    <div class="event-category workshop">Workshop</div>
                                    <h3 class="event-title">Professional Development Workshop</h3>
                                    <div class="event-footer">
                                        <span class="event-price">$15.00</span>
                                        <a href="event-details.html" class="btn btn-sm btn-outline">Details</a>
                                    </div>
                                </div>
                            </div>

                            <div class="event-card">
                                <div class="event-image">
                                    <img src="https://images.pexels.com/photos/1367269/pexels-photo-1367269.jpeg"
                                        alt="Science Symposium">
                                    <div class="event-date">
                                        <span class="day">05</span>
                                        <span class="month">Jul</span>
                                    </div>
                                </div>
                                <div class="event-content">
                                    <div class="event-category academic">Academic</div>
                                    <h3 class="event-title">Science Research Symposium</h3>
                                    <div class="event-footer">
                                        <span class="event-price">$10.00</span>
                                        <a href="event-details.html" class="btn btn-sm btn-outline">Details</a>
                                    </div>
                                </div>
                            </div>

                            <div class="event-card">
                                <div class="event-image">
                                    <img src="https://images.pexels.com/photos/3153204/pexels-photo-3153204.jpeg"
                                        alt="Leadership Seminar">
                                    <div class="event-date">
                                        <span class="day">18</span>
                                        <span class="month">Jul</span>
                                    </div>
                                </div>
                                <div class="event-content">
                                    <div class="event-category seminar">Seminar</div>
                                    <h3 class="event-title">Leadership Excellence Seminar</h3>
                                    <div class="event-footer">
                                        <span class="event-price">$20.00</span>
                                        <a href="event-details.html" class="btn btn-sm btn-outline">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
@endsection
