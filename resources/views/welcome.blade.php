<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nirwanatravel - Paket Wisata</title>

    <!-- Fonts: Inter (Lebih modern dari font bawaan) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --primary-color: #0d6efd;
            --text-dark: #2d3436;
            --bg-light: #f8f9fa;
        }

        body {
            background-color: var(--bg-light);
            font-family: 'Inter', sans-serif;
            color: var(--text-dark);
        }

        /* Card Styling - Dibuat lebih slim */
        .travel-card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: #fff;
        }

        .travel-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.08) !important;
        }

        /* Foto Ratio 4:3 yang lebih pendek */
        .img-container {
            height: 180px;
            position: relative;
            overflow: hidden;
        }

        .img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Floating Badge */
        .badge-type {
            position: absolute;
            top: 12px;
            left: 12px;
            padding: 6px 12px;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.9);
            color: var(--primary-color);
            backdrop-filter: blur(4px);
        }

        /* Info Section */
        .card-body {
            padding: 1.25rem;
        }

        .tour-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .location-text {
            font-size: 0.8rem;
            color: #636e72;
            margin-bottom: 1rem;
        }

        /* Box Ketentuan - Memperbaiki logika label */
        .ketentuan-box {
            background-color: #f1f3f5;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 1rem;
        }

        .ketentuan-title {
            font-size: 0.65rem;
            font-weight: 800;
            color: #adb5bd;
            text-transform: uppercase;
            margin-bottom: 5px;
            display: block;
        }

        .ketentuan-list {
            font-size: 0.75rem;
            color: #495057;
            margin-bottom: 0;
            padding-left: 0;
            list-style: none;
        }

        .ketentuan-list li {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Footer Card */
        .price-label {
            font-size: 0.6rem;
            color: #adb5bd;
            margin-bottom: -2px;
            display: block;
            font-weight: 700;
        }

        .price-value {
            font-size: 1.2rem;
            font-weight: 800;
            color: var(--primary-color);
        }

        .btn-detail {
            font-size: 0.85rem;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <!-- Header Section -->
    <div class="mb-5 text-center">
        <h2 class="fw-extrabold text-dark">Paket Wisata Populer</h2>
        <p class="text-muted">Temukan pengalaman tak terlupakan di destinasi impian.</p>
    </div>

    <!-- Grid Paket -->
    <div class="row g-4">
        @foreach($pakets as $paket)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card travel-card shadow-sm h-100">
                    
                    <!-- Area Foto -->
                    <div class="img-container">
                        <span class="badge-type shadow-sm">
                            <i class="bi bi-tag-fill me-1"></i>{{ $paket->jenis_wisata }}
                        </span>
                        <img src="{{ Storage::url($paket->foto) }}" alt="{{ $paket->nama }}">
                    </div>

                    <!-- Area Detail -->
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start mb-1">
                            <h5 class="tour-title">{{ $paket->nama }}</h5>
                            <span class="badge bg-primary-subtle text-primary rounded-pill border border-primary-subtle" style="font-size: 0.65rem;">
                                <i class="bi bi-clock me-1"></i>{{ $paket->durasi }}
                            </span>
                        </div>
                        
                        <p class="location-text">
                            <i class="bi bi-geo-alt-fill text-danger"></i> {{ $paket->lokasi }}
                        </p>

                        <!-- Box Ketentuan: Menjelaskan syarat perjalanan -->
                        <div class="ketentuan-box">
                            <span class="ketentuan-title">Syarat & Ketentuan:</span>
                            <ul class="ketentuan-list">
                                @forelse($paket->syaratKetentuan->take(2) as $syarat)
                                    <li>📌 {{ $syarat->isi }}</li>
                                @empty
                                    <li><small class="text-muted italic">Tidak ada syarat khusus</small></li>
                                @endforelse
                            </ul>
                        </div>

                        <!-- Footer Card: Harga & Tombol -->
                        <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                            <div>
                                <span class="price-label text-uppercase">Mulai Dari</span>
                                <span class="price-value">Rp{{ number_format($paket->harga, 0, ',', '.') }}</span>
                            </div>
                            <a href="#" class="btn btn-primary btn-detail shadow-sm">
                                Detail <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>