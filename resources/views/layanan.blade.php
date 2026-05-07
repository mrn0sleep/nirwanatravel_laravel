<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Layanan — Nirwana Tour &amp; Travel</title>

  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

  <style>
    /* ── RESET ─────────────────────────────────────────── */
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: smooth; }
    body { font-family: 'Plus Jakarta Sans', sans-serif; color: #111827; background: #fff; }
    a { text-decoration: none; }

    /* ── NAVBAR ─────────────────────────────────────────── */
    .navbar-main {
      position: fixed; top: 0; left: 0; right: 0; z-index: 1000;
      height: 68px; padding: 0 28px;
      display: flex; align-items: center;
      background: rgba(12, 29, 58, .96); backdrop-filter: blur(14px);
      box-shadow: 0 2px 20px rgba(0,0,0,.22);
    }
    .nav-wrap {
      width: 100%; max-width: 1180px; margin: 0 auto;
      display: flex; align-items: center;
    }
    .logo-box {
      width: 42px; height: 42px; border-radius: 10px; flex-shrink: 0;
      background: rgba(255,255,255,.12); border: 1px solid rgba(255,255,255,.22);
      display: flex; align-items: center; justify-content: center; overflow: hidden; padding: 4px;
    }
    .logo-box img { width: 100%; height: 100%; object-fit: contain; display: block; }
    .logo-text strong { font-family: 'Playfair Display', serif; color: #fff; font-size: 1.05rem; display: block; line-height: 1.1; }
    .logo-text small  { color: rgba(255,255,255,.45); font-size: .6rem; letter-spacing: .1em; text-transform: uppercase; }
    .nav-menu { display: flex; list-style: none; gap: 2px; margin: 0 auto; padding: 0; }
    .nav-menu a {
      display: block; padding: 7px 14px; font-size: .87rem; font-weight: 500;
      color: rgba(255,255,255,.78); border-radius: 8px; transition: all .2s;
    }
    .nav-menu a:hover, .nav-menu a.active { color: #fff; background: rgba(255,255,255,.1); }
    .btn-masuk {
      display: inline-flex; align-items: center; gap: 6px;
      background: rgba(255,255,255,.1); border: 1.5px solid rgba(255,255,255,.22);
      color: #fff; font-size: .84rem; font-weight: 600;
      padding: 7px 18px; border-radius: 50px; transition: all .2s; white-space: nowrap;
    }
    .btn-masuk:hover { background: rgba(255,255,255,.18); color: #fff; }
    .user-avatar {
      width: 30px; height: 30px; border-radius: 50%;
      background: #c49a2a; color: #fff; font-weight: 700; font-size: .82rem;
      display: flex; align-items: center; justify-content: center; flex-shrink: 0;
    }

    /* ── HERO ─────────────────────────────────────────── */
    .hero-lyn {
      padding: 132px 20px 72px; text-align: center;
      position: relative; overflow: hidden;
      background: linear-gradient(145deg, #0a1628 0%, #0c2447 40%, #0e2d5e 65%, #0c1d3a 100%);
    }
    .hero-lyn::before {
      content: ''; position: absolute; top: -10%; right: -8%;
      width: 480px; height: 480px; border-radius: 50%; pointer-events: none;
      background: radial-gradient(circle, rgba(30,77,191,.55) 0%, transparent 70%);
      opacity: .3;
    }
    .hero-lyn::after {
      content: ''; position: absolute; bottom: -15%; left: -6%;
      width: 360px; height: 360px; border-radius: 50%; pointer-events: none;
      background: radial-gradient(circle, rgba(232,191,96,.18) 0%, transparent 70%);
    }
    .hero-body { position: relative; z-index: 1; max-width: 720px; margin: 0 auto; }
    .crumb { color: rgba(255,255,255,.5); font-size: .8rem; margin-bottom: 16px; }
    .crumb a { color: rgba(255,255,255,.7); transition: color .2s; }
    .crumb a:hover { color: #e8bf60; }
    .hero-badge {
      display: inline-flex; align-items: center; gap: 8px;
      background: rgba(255,255,255,.1); border: 1px solid rgba(255,255,255,.18);
      color: rgba(255,255,255,.92); font-size: .73rem; font-weight: 600;
      letter-spacing: .1em; text-transform: uppercase;
      padding: 6px 16px; border-radius: 50px; margin-bottom: 22px;
    }
    .dot { width: 6px; height: 6px; border-radius: 50%; background: #e8bf60; animation: blink 2s infinite; }
    .hero-lyn h1 {
      font-family: 'Playfair Display', serif; color: #fff;
      font-size: clamp(1.9rem, 4.5vw, 2.9rem); line-height: 1.15; margin-bottom: 16px;
    }
    .hero-lyn h1 em { font-style: italic; color: #e8bf60; }
    .hero-lyn .lead { color: rgba(255,255,255,.68); font-size: .95rem; line-height: 1.8; max-width: 540px; margin: 0 auto; }

    /* ── SECTION HEADER ─────────────────────────────────── */
    .sec-label {
      display: inline-block; background: #eef2ff; color: #1e4dbf;
      font-size: .69rem; font-weight: 700; letter-spacing: .11em; text-transform: uppercase;
      padding: 5px 14px; border-radius: 50px; margin-bottom: 12px;
    }
    .sec-title {
      font-family: 'Playfair Display', serif;
      font-size: clamp(1.5rem, 3vw, 2.1rem); color: #0c1d3a; margin-bottom: 10px;
    }
    .sec-sub { font-size: .93rem; color: #6b7a90; max-width: 520px; margin: 0 auto; line-height: 1.78; }

    /* ── FILTER TABS ─────────────────────────────────────── */
    .filter-wrap { display: flex; gap: 8px; flex-wrap: wrap; justify-content: center; margin-bottom: 38px; }
    .filter-btn {
      padding: 7px 20px; border-radius: 50px; font-size: .82rem; font-weight: 600;
      border: 1.5px solid #dde3ee; background: #fff; color: #6b7a90;
      cursor: pointer; transition: all .2s;
    }
    .filter-btn:hover { border-color: #0c1d3a; color: #0c1d3a; }
    .filter-btn.aktif { background: #0c1d3a; color: #fff; border-color: #0c1d3a; }

    /* ── KARTU PAKET ─────────────────────────────────────── */
    .kartu-paket {
      background: #fff; border: 1px solid #dde3ee; border-radius: 18px;
      overflow: hidden; height: 100%; transition: all .25s;
      display: flex; flex-direction: column;
    }
    .kartu-paket:hover {
      transform: translateY(-6px);
      box-shadow: 0 18px 44px rgba(13,31,60,.13);
      border-color: #c9d4ec;
    }
    .kartu-paket .thumb { position: relative; overflow: hidden; }
    .kartu-paket .thumb img {
      width: 100%; height: 190px; object-fit: cover; display: block;
      transition: transform .42s ease;
    }
    .kartu-paket:hover .thumb img { transform: scale(1.06); }
    .no-img {
      width: 100%; height: 190px;
      background: linear-gradient(135deg, #e8ecf4, #d0d9ee);
      display: flex; align-items: center; justify-content: center;
      color: #9baac8; font-size: 2.2rem;
    }
    .badge-lokasi {
      position: absolute; top: 10px; left: 10px;
      background: rgba(12,29,58,.88); color: #fff;
      padding: 5px 11px; border-radius: 50px;
      font-size: .7rem; font-weight: 600;
      display: inline-flex; align-items: center; gap: 4px;
      backdrop-filter: blur(4px);
    }
    .badge-jenis {
      position: absolute; top: 10px; right: 10px;
      padding: 4px 10px; border-radius: 6px;
      font-size: .68rem; font-weight: 700; letter-spacing: .02em;
    }
    .jenis-religi { background: #fff4cc; color: #7a5800; }
    .jenis-lokal  { background: #d9f5ea; color: #1a6640; }
    .jenis-manca  { background: #ddeeff; color: #0a3d80; }
    .kartu-paket .isi {
      padding: 18px 18px 10px; flex: 1; display: flex; flex-direction: column;
    }
    .kartu-paket .judul-paket {
      font-size: .95rem; font-weight: 700; color: #0c1d3a;
      margin-bottom: 8px; line-height: 1.4; min-height: 46px;
    }
    .kartu-paket .deskripsi-singkat {
      font-size: .8rem; color: #6b7a90; line-height: 1.65; margin-bottom: 12px;
    }
    .info-row {
      display: flex; align-items: center; gap: 6px;
      font-size: .78rem; color: #8a9bc0; margin-bottom: 6px;
    }
    .info-row i { font-size: .82rem; color: #1e4dbf; flex-shrink: 0; }
    .harga-wrap { margin-top: auto; padding-top: 10px; border-top: 1px solid #f0f2f8; }
    .harga-label { font-size: .68rem; color: #9baac8; text-transform: uppercase; letter-spacing: .08em; margin-bottom: 2px; }
    .harga-nominal { color: #e8400c; font-size: 1.13rem; font-weight: 800; }
    .harga-nominal small { color: #8a9bc0; font-weight: 500; font-size: .72rem; }
    .kartu-paket .aksi { padding: 14px 18px 18px; display: flex; gap: 8px; }
    .btn-detail {
      flex: 1; display: inline-flex; align-items: center; justify-content: center; gap: 6px;
      padding: 9px 12px; border-radius: 10px;
      background: #f0f4ff; color: #1e4dbf; font-size: .82rem; font-weight: 600;
      border: 1.5px solid #c9d4ec; transition: all .2s;
    }
    .btn-detail:hover { background: #1e4dbf; color: #fff; border-color: #1e4dbf; }
    .btn-pesan {
      flex: 1; display: inline-flex; align-items: center; justify-content: center; gap: 6px;
      padding: 9px 12px; border-radius: 10px;
      background: #1fa563; color: #fff; font-size: .82rem; font-weight: 600;
      transition: all .2s;
    }
    .btn-pesan:hover { background: #18935a; color: #fff; }

    /* ── STATE KOSONG ─────────────────────────────────────── */
    .state-kosong { text-align: center; padding: 70px 20px; color: #8a9bc0; }
    .state-kosong .icon-wrap {
      width: 80px; height: 80px; border-radius: 50%;
      background: #f0f2f8; display: flex; align-items: center; justify-content: center;
      font-size: 2rem; color: #c3cde3; margin: 0 auto 18px;
    }
    .state-kosong h5 { font-size: 1rem; color: #3d4f6e; margin-bottom: 6px; }
    .state-kosong p  { font-size: .87rem; }

    /* ── FOOTER ─────────────────────────────────────────── */
    footer { background: #0a1628; padding: 60px 0 28px; }
    .foot-inner { max-width: 1040px; margin: 0 auto; padding: 0 24px; }
    footer h3 { font-family: 'Playfair Display', serif; color: #fff; font-size: 1.2rem; margin-bottom: 4px; }
    .foot-since { color: rgba(255,255,255,.32); font-size: .68rem; letter-spacing: .12em; text-transform: uppercase; display: block; margin-bottom: 12px; }
    .foot-desc  { font-size: .83rem; color: rgba(255,255,255,.46); line-height: 1.75; margin-bottom: 18px; }
    .socials { display: flex; gap: 8px; flex-wrap: wrap; }
    .socials a {
      width: 36px; height: 36px; border-radius: 9px;
      background: rgba(255,255,255,.07); border: 1px solid rgba(255,255,255,.1);
      display: flex; align-items: center; justify-content: center;
      color: rgba(255,255,255,.5); font-size: .95rem; transition: all .2s;
    }
    .socials a:hover { background: #1e4dbf; border-color: #1e4dbf; color: #fff; }
    footer h4 {
      font-size: .72rem; font-weight: 700; letter-spacing: .12em; text-transform: uppercase;
      color: rgba(255,255,255,.32); margin-bottom: 16px;
    }
    .foot-link { display: block; font-size: .83rem; color: rgba(255,255,255,.52); margin-bottom: 10px; transition: color .2s; }
    .foot-link:hover { color: #fff; }
    .foot-link i { margin-right: 6px; color: rgba(255,255,255,.3); }
    .foot-divider { border-color: rgba(255,255,255,.07); margin: 44px 0 22px; }
    .foot-copy { font-size: .78rem; color: rgba(255,255,255,.28); }

    /* ── ANIMASI ─────────────────────────────────────────── */
    @keyframes blink { 0%, 100% { opacity: 1; } 50% { opacity: .3; } }
    #paket { scroll-margin-top: 88px; }

    /* ── RESPONSIF ─────────────────────────────────────── */
    @media (max-width: 991px) { .nav-menu { display: none; } }
    @media (max-width: 575px) {
      .navbar-main { padding: 0 16px; }
      .hero-lyn { padding: 112px 16px 56px; }
      .kartu-paket .thumb img, .no-img { height: 170px; }
    }
  </style>
</head>
<body>

{{-- ══ NAVBAR ══ --}}
<nav class="navbar-main">
  <div class="nav-wrap">

    <a href="{{ route('beranda') }}" class="d-flex align-items-center gap-2 me-4">
      <div class="logo-box">
        <img src="{{ asset('img/logo.png') }}" alt="Logo Nirwana Tour & Travel">
      </div>
      <div class="logo-text">
        <strong>Nirwana</strong>
        <small>Tour &amp; Travel</small>
      </div>
    </a>

    <ul class="nav-menu">
      <li><a href="{{ route('beranda') }}">Beranda</a></li>
      <li><a href="{{ route('lyn') }}" class="active">Layanan</a></li>
      <li><a href="{{ route('tk') }}">Tentang Kami</a></li>
    </ul>

    <div class="ms-auto">
      @auth
        <div class="dropdown">
          <button class="btn btn-sm d-flex align-items-center gap-2 rounded-pill text-white"
            style="background:rgba(255,255,255,.1);border:1.5px solid rgba(255,255,255,.18);padding:5px 14px 5px 6px;"
            data-bs-toggle="dropdown" aria-expanded="false">
            <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
            <span style="font-size:.83rem;font-weight:600;">{{ Auth::user()->name }}</span>
            <i class="bi bi-chevron-down" style="font-size:.7rem;opacity:.6;"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-end mt-2 rounded-3 shadow-lg border-0" style="min-width:200px;">
            <li class="px-3 py-2">
              <p class="mb-0" style="font-size:.78rem;color:#8a9bc0;">Masuk sebagai</p>
              <p class="mb-0 fw-semibold" style="font-size:.88rem;color:#0c1d3a;">{{ Auth::user()->name }}</p>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('profile.edit') }}">
                <i class="bi bi-person-circle text-secondary"></i> Profil Saya
              </a>
            </li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item d-flex align-items-center gap-2 text-danger">
                  <i class="bi bi-box-arrow-right"></i> Keluar
                </button>
              </form>
            </li>
          </ul>
        </div>
      @else
        <a href="{{ route('login') }}" class="btn-masuk">
          <i class="bi bi-person"></i> Masuk
        </a>
      @endauth
    </div>

  </div>
</nav>


{{-- ══ HERO ══ --}}
<section class="hero-lyn">
  <div class="hero-body">
    <p class="crumb"><a href="{{ route('beranda') }}">Beranda</a> &rsaquo; Layanan</p>
    <div class="hero-badge">
      <span class="dot"></span>
      Pilih Paket Sesuai Kebutuhan
    </div>
    <h1>Jelajahi <em>Paket Wisata</em> Kami</h1>
    <p class="lead">
      Dari umroh, haji, hingga wisata domestik &amp; mancanegara — semua paket dikelola
      langsung oleh tim profesional Nirwana Tour &amp; Travel.
    </p>
  </div>
</section>


{{-- ══ SECTION DAFTAR PAKET ══
     $paket dikirim dari PageController@lyn()
     berisi koleksi JenisLayanan dari database.
--}}
<section class="py-5" id="paket" style="background:#f5f2ec;">
  <div class="container" style="max-width:1120px;">

    <div class="text-center mb-4">
      <span class="sec-label">Layanan Kami</span>
      <h2 class="sec-title">Jenis-Jenis Paket Wisata</h2>
      <p class="sec-sub">
        Pilih paket yang sesuai dengan kebutuhan dan anggaran Anda.
        Klik <strong>Detail</strong> untuk informasi lengkap.
      </p>
    </div>

    {{-- Filter tab — berjalan di sisi klien, tanpa reload --}}
    <div class="filter-wrap">
      <button class="filter-btn aktif" data-filter="semua">
        <i class="bi bi-grid-3x3-gap-fill me-1"></i> Semua
      </button>
      <button class="filter-btn" data-filter="Wisata Religi">
        <i class="bi bi-moon-stars me-1"></i> Wisata Religi
      </button>
      <button class="filter-btn" data-filter="Wisata Lokal">
        <i class="bi bi-geo-alt me-1"></i> Wisata Lokal
      </button>
      <button class="filter-btn" data-filter="Wisata Mancanegara">
        <i class="bi bi-globe me-1"></i> Wisata Mancanegara
      </button>
    </div>

    {{-- Grid kartu paket --}}
    <div class="row g-4" id="grid-paket">

      @forelse($paket as $p)

        @php
          $jenisClass = match($p->jenis_wisata) {
            'Wisata Religi'      => 'jenis-religi',
            'Wisata Lokal'       => 'jenis-lokal',
            'Wisata Mancanegara' => 'jenis-manca',
            default              => 'jenis-lokal',
          };
          $waText = urlencode('Halo, saya ingin menanyakan paket ' . $p->nama);
        @endphp

        <div class="col-12 col-sm-6 col-lg-3 kartu-col" data-jenis="{{ $p->jenis_wisata }}">
          <div class="kartu-paket">

            {{-- Thumbnail --}}
            <div class="thumb">
              @if($p->foto)
                <img src="{{ asset('storage/' . $p->foto) }}" alt="{{ $p->nama }}" loading="lazy">
              @else
                <div class="no-img"><i class="bi bi-image"></i></div>
              @endif
              <span class="badge-lokasi">
                <i class="bi bi-geo-alt-fill"></i> {{ $p->lokasi }}
              </span>
              <span class="badge-jenis {{ $jenisClass }}">{{ $p->jenis_wisata }}</span>
            </div>

            {{-- Konten --}}
            <div class="isi">
              <p class="judul-paket">{{ $p->nama }}</p>
              <p class="deskripsi-singkat">{{ Str::limit($p->p_singkat, 88) }}</p>
              <div class="info-row">
                <i class="bi bi-clock"></i>
                <span>{{ $p->durasi }}</span>
              </div>
              <div class="harga-wrap">
                <p class="harga-label">Mulai dari</p>
                <p class="harga-nominal mb-0">
                  Rp {{ number_format($p->harga, 0, ',', '.') }}
                  <small>/ orang</small>
                </p>
              </div>
            </div>

            {{-- Tombol aksi --}}
            <div class="aksi">
              <a href="{{ route('detailtk', ['id' => $p->id]) }}" class="btn-detail">
                <i class="bi bi-eye"></i> Detail
              </a>
              <a href="https://wa.me/6282324246645?text={{ $waText }}"
                 target="_blank" rel="noopener noreferrer" class="btn-pesan">
                <i class="bi bi-whatsapp"></i> Pesan
              </a>
            </div>

          </div>
        </div>

      @empty
        <div class="col-12">
          <div class="state-kosong">
            <div class="icon-wrap"><i class="bi bi-inbox"></i></div>
            <h5>Belum Ada Paket Tersedia</h5>
            <p>Paket wisata belum ditambahkan.<br>Silakan tambahkan melalui panel admin.</p>
          </div>
        </div>
      @endforelse

    </div>{{-- /#grid-paket --}}

  </div>
</section>


{{-- ══ FOOTER ══ --}}
<footer>
  <div class="foot-inner">
    <div class="row g-5">

      <div class="col-12 col-md-5">
        <h3>Nirwana Tour &amp; Travel</h3>
        <span class="foot-since">Since 2005</span>
        <p class="foot-desc">
          Mitra perjalanan terpercaya Anda. Kami menghadirkan pengalaman wisata tak terlupakan
          dengan layanan profesional dan harga yang transparan.
        </p>
        <div class="socials">
          <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
          <a href="https://wa.me/6282324246645" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
          <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
        </div>
      </div>

      <div class="col-6 col-md-3">
        <h4>Navigasi</h4>
        <a href="{{ route('beranda') }}" class="foot-link">Beranda</a>
        <a href="{{ route('lyn') }}"     class="foot-link">Layanan</a>
        <a href="{{ route('tk') }}"      class="foot-link">Tentang Kami</a>
      </div>

      <div class="col-6 col-md-4">
        <h4>Kontak</h4>
        <a href="tel:+6282324246645" class="foot-link">
          <i class="bi bi-telephone"></i>+62 823-2424-6645
        </a>
        <a href="https://wa.me/6282324246645" target="_blank" rel="noopener" class="foot-link">
          <i class="bi bi-whatsapp"></i>+62 823-2424-6645
        </a>
        <a href="mailto:info@nirwanatravel.id" class="foot-link">
          <i class="bi bi-envelope"></i>info@nirwanatravel.id
        </a>
      </div>

    </div>

    <hr class="foot-divider">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
      <p class="foot-copy mb-0">&copy; {{ date('Y') }} Nirwana Tour &amp; Travel. Hak cipta dilindungi.</p>
      <p class="foot-copy mb-0">Berizin resmi &mdash; Terdaftar Kemenparekraf</p>
    </div>
  </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
(function () {
  const filterBtns = document.querySelectorAll('.filter-btn');
  const kartuCols  = document.querySelectorAll('.kartu-col');
  const grid       = document.getElementById('grid-paket');
  let msgEl = null;

  function createEmptyMsg() {
    if (msgEl) return;
    msgEl = document.createElement('div');
    msgEl.className = 'col-12';
    msgEl.innerHTML = `
      <div class="state-kosong">
        <div class="icon-wrap"><i class="bi bi-search"></i></div>
        <h5>Tidak Ada Paket</h5>
        <p>Tidak ditemukan paket untuk kategori yang dipilih.</p>
      </div>`;
    grid.appendChild(msgEl);
  }

  function removeEmptyMsg() {
    if (msgEl) { msgEl.remove(); msgEl = null; }
  }

  filterBtns.forEach(btn => {
    btn.addEventListener('click', function () {
      filterBtns.forEach(b => b.classList.remove('aktif'));
      this.classList.add('aktif');

      const filter = this.dataset.filter;
      let visible = 0;

      kartuCols.forEach(col => {
        const tampil = filter === 'semua' || col.dataset.jenis === filter;
        col.style.display = tampil ? '' : 'none';
        if (tampil) visible++;
      });

      visible === 0 ? createEmptyMsg() : removeEmptyMsg();
    });
  });
})();
</script>

</body>
</html>