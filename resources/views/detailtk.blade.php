<?php
session_start();
$isLoggedIn = isset($_SESSION['name']) && isset($_SESSION['email']);
$avatarLetter = $isLoggedIn ? strtoupper(substr($_SESSION['name'], 0, 1)) : 'G';

// Data layanan — nanti bisa diganti dari database
$layananList = [
  1 => [
    'icon'   => '🏝️',
    'thumb'  => 'thumb-1',
    'judul'  => 'Paket Wisata Lokal',
    'sub'    => 'Wisata Nusantara',
    'harga'  => 'Rp 2.500.000',
    'satuan' => 'Per Orang',
    'durasi' => '3 Hari 2 Malam',
    'tipe'   => 'Wisata Lokal',
    'keberangkatan' => 'Surabaya',
    'tanggal' => '15 Mei 2025',
    'fasilitas' => ['Transportasi AC', 'Hotel Bintang 3', 'Pemandu Wisata', 'Makan 3x Sehari', 'Asuransi Perjalanan'],
    'keunggulan' => ['Harga terjangkau', 'Pemandu berpengalaman', 'Armada nyaman', 'Itinerary terstruktur'],
    'deskripsi' => 'Nikmati keindahan wisata nusantara bersama Nirwana Tour & Travel. Paket wisata lokal kami dirancang untuk memberikan pengalaman perjalanan yang menyenangkan, aman, dan berkesan dengan harga yang sangat terjangkau. Kami menyediakan layanan lengkap mulai dari transportasi, akomodasi, hingga pemandu wisata profesional yang siap menemani perjalanan Anda.',
    'syarat' => ['Membawa KTP/identitas diri', 'Booking minimal 7 hari sebelum keberangkatan', 'DP minimal 50% dari total biaya', 'Pelunasan H-3 keberangkatan'],
  ],
  2 => [
    'icon'   => '✈️',
    'thumb'  => 'thumb-2',
    'judul'  => 'Paket Wisata Mancanegara',
    'sub'    => 'Wisata Internasional',
    'harga'  => 'Rp 15.000.000',
    'satuan' => 'Per Orang',
    'durasi' => '7 Hari 6 Malam',
    'tipe'   => 'Wisata Internasional',
    'keberangkatan' => 'Jakarta',
    'tanggal' => '20 Juni 2025',
    'fasilitas' => ['Tiket Pesawat PP', 'Hotel Bintang 4', 'Pemandu Wisata', 'Makan 3x Sehari', 'Visa & Asuransi'],
    'keunggulan' => ['All-in termasuk visa', 'Hotel berkualitas', 'Guide lokal berbahasa Indonesia', 'Free bagasi 30kg'],
    'deskripsi' => 'Jelajahi keindahan dunia bersama Nirwana Tour & Travel. Paket wisata mancanegara kami mencakup berbagai destinasi populer di Asia, Eropa, dan Timur Tengah dengan layanan lengkap dan terpercaya. Semua kebutuhan perjalanan Anda sudah kami siapkan secara terperinci.',
    'syarat' => ['Paspor berlaku min. 6 bulan', 'Booking minimal 30 hari sebelum keberangkatan', 'DP minimal 30% dari total biaya', 'Menyerahkan foto paspor untuk proses visa'],
  ],
  3 => [
    'icon'   => '🎫',
    'thumb'  => 'thumb-3',
    'judul'  => 'Tiket Pesawat',
    'sub'    => 'Domestik & Internasional',
    'harga'  => 'Mulai Rp 500.000',
    'satuan' => 'Per Tiket',
    'durasi' => 'Sesuai Rute',
    'tipe'   => 'Tiket Pesawat',
    'keberangkatan' => 'Semua Bandara',
    'tanggal' => 'Sesuai Permintaan',
    'fasilitas' => ['Semua Maskapai', 'Rute Domestik & Internasional', 'E-ticket Langsung', 'Harga Kompetitif', 'Bantuan Reschedule'],
    'keunggulan' => ['Harga terbaik', 'Proses cepat', 'Semua maskapai tersedia', 'Layanan 24 jam'],
    'deskripsi' => 'Pesan tiket pesawat domestik maupun internasional dengan mudah dan cepat melalui Nirwana Tour & Travel. Kami bekerja sama dengan semua maskapai terkemuka untuk memberikan harga terbaik dan layanan pemesanan yang mudah.',
    'syarat' => ['Nama sesuai KTP/paspor', 'Pembayaran dilakukan dalam 1x24 jam', 'Reschedule sesuai kebijakan maskapai', 'Tidak dapat di-refund kecuali kebijakan maskapai'],
  ],
  4 => [
    'icon'   => '🚌',
    'thumb'  => 'thumb-4',
    'judul'  => 'Sewa Kendaraan',
    'sub'    => 'Armada Lengkap & Nyaman',
    'harga'  => 'Mulai Rp 350.000',
    'satuan' => 'Per Hari',
    'durasi' => 'Sesuai Kebutuhan',
    'tipe'   => 'Sewa Kendaraan',
    'keberangkatan' => 'Seluruh Kota',
    'tanggal' => 'Sesuai Permintaan',
    'fasilitas' => ['Minibus & Bus Pariwisata', 'Driver Berpengalaman', 'AC Full', 'BBM Ditanggung', 'Asuransi Kendaraan'],
    'keunggulan' => ['Armada terawat', 'Driver profesional', 'Harga transparan', 'Bisa antar-jemput'],
    'deskripsi' => 'Nirwana Tour & Travel menyediakan armada kendaraan pariwisata yang nyaman dan terawat untuk menemani setiap perjalanan Anda. Tersedia berbagai pilihan kendaraan mulai dari minibus hingga bus besar untuk rombongan.',
    'syarat' => ['Booking minimal 3 hari sebelumnya', 'DP 50% saat pemesanan', 'Pelunasan saat hari keberangkatan', 'Kerusakan akibat kelalaian ditanggung penyewa'],
  ],
  5 => [
    'icon'   => '🏨',
    'thumb'  => 'thumb-5',
    'judul'  => 'Hotel & Penginapan',
    'sub'    => 'Akomodasi Terbaik',
    'harga'  => 'Mulai Rp 200.000',
    'satuan' => 'Per Malam',
    'durasi' => 'Sesuai Check-in',
    'tipe'   => 'Akomodasi',
    'keberangkatan' => 'Seluruh Indonesia',
    'tanggal' => 'Sesuai Permintaan',
    'fasilitas' => ['Budget hingga Bintang 5', 'Breakfast Included', 'Free WiFi', 'Lokasi Strategis', 'Harga Spesial'],
    'keunggulan' => ['Pilihan hotel lengkap', 'Harga terjamin terbaik', 'Konfirmasi cepat', 'Free cancellation tersedia'],
    'deskripsi' => 'Temukan akomodasi terbaik untuk perjalanan Anda melalui Nirwana Tour & Travel. Kami menawarkan pilihan hotel dari budget hingga bintang lima di berbagai kota di seluruh Indonesia dengan harga yang kompetitif.',
    'syarat' => ['Pembayaran di muka', 'Check-in sesuai jadwal yang disepakati', 'Bawa identitas diri saat check-in', 'Kebijakan pembatalan sesuai hotel'],
  ],
  6 => [
    'icon'   => '💑',
    'thumb'  => 'thumb-6',
    'judul'  => 'Paket Honeymoon',
    'sub'    => 'Romantic Getaway',
    'harga'  => 'Rp 8.500.000',
    'satuan' => 'Per Pasang',
    'durasi' => '4 Hari 3 Malam',
    'tipe'   => 'Paket Khusus',
    'keberangkatan' => 'Surabaya / Bali',
    'tanggal' => 'Sesuai Permintaan',
    'fasilitas' => ['Hotel Romantis Bintang 4', 'Sarapan & Makan Malam', 'Dekorasi Kamar', 'Couple Spa', 'Dokumentasi Foto'],
    'keunggulan' => ['Paket all-inclusive', 'Dekorasi spesial', 'Layanan personal', 'Momen tak terlupakan'],
    'deskripsi' => 'Rayakan momen spesial bersama pasangan dengan paket honeymoon romantis dari Nirwana Tour & Travel. Kami menyiapkan semua detail perjalanan agar momen bulan madu Anda menjadi kenangan yang tak terlupakan seumur hidup.',
    'syarat' => ['Menunjukkan buku nikah saat check-in', 'Booking minimal 14 hari sebelumnya', 'DP 50% saat pemesanan', 'Tidak dapat diubah H-7 keberangkatan'],
  ],
  7 => [
    'icon'   => '🕌',
    'thumb'  => 'thumb-7',
    'judul'  => 'Wisata Religi',
    'sub'    => 'Perjalanan Spiritual',
    'harga'  => 'Rp 25.000.000',
    'satuan' => 'Per Jamaah',
    'durasi' => '9 Hari 8 Malam',
    'tipe'   => 'Wisata Religi',
    'keberangkatan' => 'Surabaya',
    'tanggal' => '05 Sep 2025',
    'fasilitas' => ['Tiket Pesawat PP', 'Hotel Bintang 4 Dekat Masjid', 'Pembimbing Ibadah', 'Makan 3x Sehari', 'Visa & Asuransi', 'Perlengkapan Ibadah'],
    'keunggulan' => ['Pembimbing ibadah berpengalaman', 'Hotel dekat Masjidil Haram', 'Biaya transparan', 'Kuota terbatas & terjamin'],
    'deskripsi' => 'Wujudkan perjalanan spiritual penuh makna bersama Nirwana Tour & Travel. Paket wisata religi kami dirancang dengan penuh perhatian untuk memberikan pengalaman ibadah yang khusyuk dan nyaman, didampingi oleh pembimbing ibadah yang berpengalaman.',
    'syarat' => ['Paspor berlaku min. 6 bulan', 'Buku nikah / KK untuk mahram', 'Booking minimal 60 hari sebelumnya', 'DP Rp 5.000.000 saat pendaftaran', 'Pelunasan 30 hari sebelum keberangkatan'],
  ],
  8 => [
    'icon'   => '👥',
    'thumb'  => 'thumb-8',
    'judul'  => 'Paket Grup & Rombongan',
    'sub'    => 'Corporate & Instansi',
    'harga'  => 'Hubungi Kami',
    'satuan' => 'Per Orang (Nego)',
    'durasi' => 'Sesuai Kebutuhan',
    'tipe'   => 'Paket Grup',
    'keberangkatan' => 'Seluruh Indonesia',
    'tanggal' => 'Sesuai Jadwal',
    'fasilitas' => ['Transportasi Rombongan', 'Akomodasi Grup', 'Pemandu Wisata', 'Konsumsi Lengkap', 'Dokumentasi', 'Free Leader 1:10'],
    'keunggulan' => ['Harga khusus rombongan', 'Free 1 leader per 10 pax', 'Bisa kustom itinerary', 'Layanan profesional'],
    'deskripsi' => 'Nirwana Tour & Travel melayani perjalanan wisata untuk grup, instansi pemerintah, perusahaan swasta, maupun komunitas. Kami siap merancang paket wisata yang sesuai dengan kebutuhan dan anggaran rombongan Anda.',
    'syarat' => ['Minimal 10 orang', 'Konfirmasi peserta H-14', 'DP 30% saat pemesanan', 'Surat Pesanan dari instansi (jika instansi pemerintah)'],
  ],
];

// Ambil ID dari URL, default ke 1
$id = isset($_GET['id']) && array_key_exists((int)$_GET['id'], $layananList) ? (int)$_GET['id'] : 1;
$item = $layananList[$id];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($item['judul']) ?> — Nirwana Tour & Travel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../main.css">
  <style>
    /* ===== HERO BANNER DETAIL ===== */
    .detail-hero {
      width: 100%;
      min-height: 220px;
      padding-top: 74px;
      background: linear-gradient(100deg, #0d2a6e 0%, #1a3c8f 60%, #2c6be0 100%);
      display: flex;
      align-items: flex-end;
      position: relative;
      overflow: hidden;
    }
    .detail-hero::before {
      content: '';
      position: absolute;
      inset: 0;
      background: rgba(10,30,80,0.18);
    }
    .detail-hero-body {
      position: relative;
      z-index: 1;
      padding: 32px 0 28px;
    }
    .detail-hero-body .breadcrumb-link {
      color: rgba(255,255,255,0.7);
      font-size: 13px;
      text-decoration: none;
      transition: color 0.18s;
    }
    .detail-hero-body .breadcrumb-link:hover { color: #fff; }
    .detail-hero-body .breadcrumb-sep { color: rgba(255,255,255,0.4); margin: 0 6px; font-size: 13px; }
    .detail-hero-body h1 {
      font-size: 28px;
      font-weight: 700;
      color: #fff;
      margin-top: 10px;
      margin-bottom: 0;
      text-shadow: 0 2px 12px rgba(0,0,0,0.2);
    }
    .detail-hero-body .hero-sub {
      font-size: 14px;
      color: rgba(255,255,255,0.75);
      margin-top: 4px;
    }

    /* ===== MAIN CONTENT ===== */
    .detail-wrap {
      background: #f4f6fb;
      padding: 36px 0 60px;
    }

    /* ===== INFO BAR ===== */
    .info-bar {
      background: #fff;
      border: 1px solid #d6e4ff;
      border-radius: 12px;
      padding: 22px 28px;
      margin-bottom: 24px;
      box-shadow: 0 2px 8px rgba(26,60,143,0.06);
    }
    .info-item {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .info-icon {
      width: 44px;
      height: 44px;
      background: #eef3ff;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      flex-shrink: 0;
    }
    .info-item .info-label {
      font-size: 12px;
      color: #8a9bc0;
      margin-bottom: 2px;
    }
    .info-item .info-val {
      font-size: 14px;
      font-weight: 600;
      color: #1a3c8f;
    }

    /* ===== ACCORDION / PANEL ===== */
    .detail-panel {
      background: #fff;
      border: 1px solid #d6e4ff;
      border-radius: 12px;
      margin-bottom: 16px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(26,60,143,0.05);
    }
    .detail-panel-header {
      padding: 15px 20px;
      background: #1a3c8f;
      color: #fff;
      font-size: 14px;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 10px;
      cursor: pointer;
      user-select: none;
      transition: background 0.18s;
    }
    .detail-panel-header:hover { background: #0d2a6e; }
    .detail-panel-header .panel-icon { font-size: 16px; }
    .detail-panel-header .panel-arrow {
      margin-left: auto;
      transition: transform 0.25s;
      font-size: 12px;
      opacity: 0.8;
    }
    .detail-panel-header.collapsed .panel-arrow { transform: rotate(-90deg); }
    .detail-panel-body {
      padding: 18px 20px;
    }
    .detail-panel-body ul {
      list-style: none;
      padding: 0; margin: 0;
    }
    .detail-panel-body ul li {
      font-size: 13px;
      color: #444;
      padding: 5px 0;
      border-bottom: 1px solid #f0f4ff;
      display: flex;
      align-items: flex-start;
      gap: 8px;
    }
    .detail-panel-body ul li:last-child { border-bottom: none; }
    .detail-panel-body ul li::before {
      content: '✓';
      color: #2c4a9e;
      font-weight: 700;
      font-size: 12px;
      margin-top: 1px;
      flex-shrink: 0;
    }
    .detail-panel-body p {
      font-size: 13px;
      color: #555;
      line-height: 1.75;
      margin: 0;
    }

    /* ===== SIDEBAR HARGA ===== */
    .harga-box {
      background: #fff;
      border: 1px solid #d6e4ff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 2px 10px rgba(26,60,143,0.07);
      position: sticky;
      top: 90px;
    }
    .harga-box-header {
      background: #1a3c8f;
      padding: 16px 20px;
      color: #fff;
      font-size: 13px;
      font-weight: 500;
    }
    .harga-box-body { padding: 20px; }
    .harga-label {
      font-size: 12px;
      color: #8a9bc0;
      margin-bottom: 4px;
    }
    .harga-nilai {
      font-size: 26px;
      font-weight: 700;
      color: #e8400c;
      line-height: 1;
      margin-bottom: 4px;
    }
    .harga-satuan {
      font-size: 12px;
      color: #8a9bc0;
      margin-bottom: 20px;
    }
    .btn-pesan {
      display: block;
      width: 100%;
      padding: 11px;
      border-radius: 8px;
      background: #2c4a9e;
      color: #fff;
      font-size: 14px;
      font-weight: 600;
      text-align: center;
      text-decoration: none;
      border: none;
      transition: background 0.18s;
      margin-bottom: 10px;
    }
    .btn-pesan:hover { background: #1a3c8f; color: #fff; }
    .btn-wa {
      display: block;
      width: 100%;
      padding: 11px;
      border-radius: 8px;
      background: #25d366;
      color: #fff;
      font-size: 14px;
      font-weight: 600;
      text-align: center;
      text-decoration: none;
      border: none;
      transition: background 0.18s;
    }
    .btn-wa:hover { background: #1ebe5d; color: #fff; }

    /* Divider harga */
    .harga-divider {
      border: none;
      border-top: 1px solid #eef3ff;
      margin: 16px 0;
    }

    /* Info ringkas di sidebar */
    .sidebar-info-item {
      display: flex;
      justify-content: space-between;
      font-size: 12px;
      padding: 5px 0;
      border-bottom: 1px solid #f0f4ff;
      color: #555;
    }
    .sidebar-info-item:last-child { border-bottom: none; }
    .sidebar-info-item span:first-child { color: #8a9bc0; }
    .sidebar-info-item span:last-child { font-weight: 500; color: #1a3c8f; }

    /* ===== SHARE BAR ===== */
    .share-bar {
      background: #fff;
      border: 1px solid #d6e4ff;
      border-radius: 12px;
      padding: 16px 20px;
      margin-top: 16px;
      box-shadow: 0 2px 8px rgba(26,60,143,0.05);
    }
    .share-bar p {
      font-size: 12px;
      color: #8a9bc0;
      margin-bottom: 10px;
    }
    .share-btn {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 6px 14px;
      border-radius: 8px;
      font-size: 12px;
      font-weight: 500;
      text-decoration: none;
      transition: opacity 0.18s;
      color: #fff;
    }
    .share-btn:hover { opacity: 0.85; color: #fff; }
    .share-btn.wa  { background: #25d366; }
    .share-btn.fb  { background: #1877f2; }
    .share-btn.cp  { background: #6b7c9e; }
  </style>
</head>
<body>

<!-- ======== NAVBAR — sama persis ======== -->
<nav class="navbar navbar-expand-lg navbar-nirwana">
  <div class="container-fluid px-4">
    <a class="navbar-brand" href="index.php">
      <img src="../img/logo.PNG" alt="Logo Nirwana" class="logo-img">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav mx-auto gap-3">
        <li class="nav-item">
          <a class="nav-link" href="../index.php#beranda">Beranda</a>
        </li>
        <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle active" href="#" data-bs-toggle="dropdown">Layanan</a>
  <ul class="dropdown-menu">
    <li>
      <a class="dropdown-item" href="../layanan/layanan.php#keberangkatan-terdekat">
        Keberangkatan Terdekat
      </a>
    </li>
    <li>
      <a class="dropdown-item" href="../layanan/layanan.php#jenis-layanan">
        Jenis-jenis Layanan
      </a>
    </li>
  </ul>
</li>
        <li class="nav-item">
          <a class="nav-link" href="../kontak.php">Hubungi Kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../tentang/tentang_kami.php">Tentang Kami</a>
        </li>
      </ul>
      <div class="d-flex gap-2 align-items-center">
        <div class="profile-box" id="profilebox" style="display:none;">
          <div class="profile-header">
            <div class="avatar-circle" id="avatarCircle">C</div>
            <span class="username-display" id="usernameDisplay">Username</span>
          </div>
          <div class="profile-dropdown">
            <a href="#">Pesanan saya</a>
            <a href="/nirwanatravel/login/logout.php">Logout</a>
          </div>
        </div>
        <form action="login/login.php" id="loginForm" style="display:none;">
          <button type="submit" class="login-btn-01">Login</button>
        </form>
      </div>
    </div>
  </div>
</nav>

<!-- ======== HERO BANNER ======== -->
<div class="detail-hero">
  <div class="container detail-hero-body">
    <div>
      <a href="index.php" class="breadcrumb-link">Beranda</a>
      <span class="breadcrumb-sep">›</span>
      <a href="index.php#layanan" class="breadcrumb-link">Layanan</a>
      <span class="breadcrumb-sep">›</span>
      <span style="color:rgba(255,255,255,0.55);font-size:13px;"><?= htmlspecialchars($item['judul']) ?></span>
    </div>
    <h1><?= htmlspecialchars($item['judul']) ?></h1>
    <p class="hero-sub"><?= htmlspecialchars($item['sub']) ?></p>
  </div>
</div>

<!-- ======== KONTEN DETAIL ======== -->
<div class="detail-wrap">
  <div class="container">

    <!-- INFO BAR -->
    <div class="info-bar">
      <div class="row g-3 align-items-center">
        <div class="col-6 col-md-3">
          <div class="info-item">
            <div class="info-icon">🗂️</div>
            <div>
              <div class="info-label">Tipe Layanan</div>
              <div class="info-val"><?= htmlspecialchars($item['tipe']) ?></div>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="info-item">
            <div class="info-icon">⏱️</div>
            <div>
              <div class="info-label">Durasi</div>
              <div class="info-val"><?= htmlspecialchars($item['durasi']) ?></div>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="info-item">
            <div class="info-icon">📍</div>
            <div>
              <div class="info-label">Keberangkatan</div>
              <div class="info-val"><?= htmlspecialchars($item['keberangkatan']) ?></div>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="info-item">
            <div class="info-icon">📅</div>
            <div>
              <div class="info-label">Tanggal</div>
              <div class="info-val"><?= htmlspecialchars($item['tanggal']) ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 2 KOLOM: KONTEN KIRI + SIDEBAR KANAN -->
    <div class="row g-4">

      <!-- KOLOM KIRI -->
      <div class="col-lg-8">

        <!-- DESKRIPSI -->
        <div class="detail-panel">
          <div class="detail-panel-header" data-target="panel-deskripsi">
            <span class="panel-icon">📋</span> Deskripsi Layanan
            <span class="panel-arrow">▼</span>
          </div>
          <div class="detail-panel-body" id="panel-deskripsi">
            <p><?= htmlspecialchars($item['deskripsi']) ?></p>
          </div>
        </div>

        <!-- FASILITAS -->
        <div class="detail-panel">
          <div class="detail-panel-header" data-target="panel-fasilitas">
            <span class="panel-icon">🎁</span> Fasilitas
            <span class="panel-arrow">▼</span>
          </div>
          <div class="detail-panel-body" id="panel-fasilitas">
            <ul>
              <?php foreach ($item['fasilitas'] as $f): ?>
              <li><?= htmlspecialchars($f) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>

        <!-- KEUNGGULAN -->
        <div class="detail-panel">
          <div class="detail-panel-header" data-target="panel-keunggulan">
            <span class="panel-icon">⭐</span> Keunggulan Paket
            <span class="panel-arrow">▼</span>
          </div>
          <div class="detail-panel-body" id="panel-keunggulan">
            <ul>
              <?php foreach ($item['keunggulan'] as $k): ?>
              <li><?= htmlspecialchars($k) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>

        <!-- SYARAT & KETENTUAN -->
        <div class="detail-panel">
          <div class="detail-panel-header collapsed" data-target="panel-syarat">
            <span class="panel-icon">📄</span> Syarat & Ketentuan
            <span class="panel-arrow">▼</span>
          </div>
          <div class="detail-panel-body" id="panel-syarat" style="display:none;">
            <ul>
              <?php foreach ($item['syarat'] as $s): ?>
              <li><?= htmlspecialchars($s) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>

        <!-- SHARE -->
        <div class="share-bar">
          <p>Bagikan layanan ini:</p>
          <div class="d-flex gap-2 flex-wrap">
            <a href="https://wa.me/?text=Cek%20layanan%20ini%20dari%20Nirwana%20Tour%20%26%20Travel:%20<?= urlencode($item['judul']) ?>"
               target="_blank" class="share-btn wa">
              📲 WhatsApp
            </a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) ?>"
               target="_blank" class="share-btn fb">
              👍 Facebook
            </a>
            <button onclick="navigator.clipboard.writeText(window.location.href); alert('Link disalin!')"
                    class="share-btn cp" style="border:none;cursor:pointer;">
              🔗 Salin Link
            </button>
          </div>
        </div>

      </div><!-- /col-lg-8 -->

      <!-- SIDEBAR KANAN -->
      <div class="col-lg-4">
        <div class="harga-box">
          <div class="harga-box-header">Informasi Harga</div>
          <div class="harga-box-body">
            <div class="harga-label">Mulai dari</div>
            <div class="harga-nilai"><?= htmlspecialchars($item['harga']) ?></div>
            <div class="harga-satuan"><?= htmlspecialchars($item['satuan']) ?></div>

            <hr class="harga-divider">

            <div class="sidebar-info-item">
              <span>Tipe</span><span><?= htmlspecialchars($item['tipe']) ?></span>
            </div>
            <div class="sidebar-info-item">
              <span>Durasi</span><span><?= htmlspecialchars($item['durasi']) ?></span>
            </div>
            <div class="sidebar-info-item">
              <span>Keberangkatan</span><span><?= htmlspecialchars($item['keberangkatan']) ?></span>
            </div>
            <div class="sidebar-info-item">
              <span>Tanggal</span><span><?= htmlspecialchars($item['tanggal']) ?></span>
            </div>

            <hr class="harga-divider">

            <a href="kontak.php" class="btn-pesan">Pesan Sekarang</a>
            <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20info%20<?= urlencode($item['judul']) ?>"
               target="_blank" class="btn-wa">
              💬 Konsultasi Gratis
            </a>
          </div>
        </div>
      </div><!-- /sidebar -->

    </div><!-- /row -->
  </div><!-- /container -->
</div><!-- /detail-wrap -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  /* userData untuk profile box — sama seperti index.php */
  window.userData = {
    isLoggedIn: <?= json_encode($isLoggedIn) ?>,
    avatarLetter: "<?= $avatarLetter ?>",
    userName: "<?= $isLoggedIn ? htmlspecialchars($_SESSION['name']) : '' ?>"
  };

  /* Profile box logic — sama seperti carousel.js */
  const profileBox    = document.querySelector('.profile-box');
  const avatarCircle  = document.querySelector('.avatar-circle');
  const usernameDisplay = document.getElementById('usernameDisplay');
  const loginForm     = document.getElementById('loginForm');

  if (window.userData.isLoggedIn) {
    profileBox.style.display = 'block';
    avatarCircle.textContent = window.userData.avatarLetter;
    usernameDisplay.textContent = window.userData.userName.split(' ')[0];
    if (loginForm) loginForm.style.display = 'none';
  } else {
    profileBox.style.display = 'none';
    if (loginForm) loginForm.style.display = 'block';
  }

  if (avatarCircle && profileBox) {
    document.querySelector('.profile-header').addEventListener('click', (e) => {
      e.stopPropagation();
      profileBox.classList.toggle('show');
    });
    document.addEventListener('click', (e) => {
      if (!profileBox.contains(e.target)) profileBox.classList.remove('show');
    });
  }

  /* Toggle panel accordion */
  document.querySelectorAll('.detail-panel-header').forEach(header => {
    header.addEventListener('click', () => {
      const targetId = header.getAttribute('data-target');
      const body = document.getElementById(targetId);
      const isCollapsed = header.classList.contains('collapsed');

      if (isCollapsed) {
        body.style.display = 'block';
        header.classList.remove('collapsed');
      } else {
        body.style.display = 'none';
        header.classList.add('collapsed');
      }
    });
  });
</script>
</body>
</html>