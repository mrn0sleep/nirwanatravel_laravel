<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $paket->nama }} — Nirwana Tour &amp; Travel</title>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<style>
/* ── RESET ───────────────────────────────────────── */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body { font-family: 'Plus Jakarta Sans', sans-serif; color: #111827; background: #fff; }
a { text-decoration: none; }

/* ── NAVBAR ──────────────────────────────────────── */
.navbar-main {
  position: fixed; top: 0; left: 0; right: 0; z-index: 999;
  height: 68px; padding: 0 28px;
  display: flex; align-items: center;
  background: rgba(12,29,58,.95);
  backdrop-filter: blur(14px);
  box-shadow: 0 2px 20px rgba(0,0,0,.2);
}
.nav-wrap { width: 100%; max-width: 1180px; margin: 0 auto; display: flex; align-items: center; }
.logo-box {
  width: 42px; height: 42px; border-radius: 10px;
  background: rgba(255,255,255,.12); border: 1px solid rgba(255,255,255,.22);
  display: flex; align-items: center; justify-content: center;
  overflow: hidden; padding: 4px;
}
.logo-box img { width: 100%; height: 100%; object-fit: contain; display: block; }
.logo-text strong { font-family: 'Playfair Display', serif; color: #fff; font-size: 1.05rem; display: block; line-height: 1.1; }
.logo-text small  { color: rgba(255,255,255,.45); font-size: .6rem; letter-spacing: .1em; text-transform: uppercase; }
.nav-menu { display: flex; list-style: none; gap: 2px; margin: 0 auto; }
.nav-menu a { display: block; padding: 7px 13px; font-size: .87rem; font-weight: 500; color: rgba(255,255,255,.8); border-radius: 8px; transition: .2s; }
.nav-menu a:hover, .nav-menu a.active { color: #fff; background: rgba(255,255,255,.1); }
.btn-masuk {
  display: inline-flex; align-items: center; gap: 6px;
  background: rgba(255,255,255,.1); border: 1.5px solid rgba(255,255,255,.22);
  color: #fff; font-size: .84rem; font-weight: 600;
  padding: 7px 18px; border-radius: 50px; transition: all .2s;
}
.btn-masuk:hover { background: rgba(255,255,255,.18); color: #fff; }
.user-avatar {
  width: 30px; height: 30px; border-radius: 50%;
  background: #c49a2a; color: #fff; font-weight: 700; font-size: .82rem;
  display: flex; align-items: center; justify-content: center;
}

/* ── HERO DETAIL ─────────────────────────────────── */
.hero-detail { padding-top: 68px; background: #0c1d3a; position: relative; overflow: hidden; }
.hero-foto { width: 100%; height: 400px; object-fit: cover; display: block; opacity: .55; }
.hero-foto-placeholder {
  width: 100%; height: 400px;
  background: linear-gradient(145deg, #0a1628, #0e2d5e);
  display: flex; align-items: center; justify-content: center;
  color: rgba(255,255,255,.2); font-size: 4rem;
}
.hero-overlay {
  position: absolute; bottom: 0; left: 0; right: 0; padding: 32px 0;
  background: linear-gradient(to top, rgba(10,22,40,.98) 0%, rgba(10,22,40,.6) 60%, transparent 100%);
}
.hero-overlay .container { max-width: 960px; }
.crumb { color: rgba(255,255,255,.5); font-size: .8rem; margin-bottom: 12px; }
.crumb a { color: rgba(255,255,255,.7); transition: color .2s; }
.crumb a:hover { color: #e8bf60; }
.hero-badge-jenis { display: inline-block; padding: 4px 12px; border-radius: 6px; font-size: .72rem; font-weight: 700; margin-bottom: 10px; }
.jenis-religi { background: #fff4cc; color: #7a5800; }
.jenis-lokal  { background: #d9f5ea; color: #1a6640; }
.jenis-manca  { background: #ddeeff; color: #0a3d80; }
.hero-overlay h1 {
  font-family: 'Playfair Display', serif; color: #fff;
  font-size: clamp(1.6rem, 3.5vw, 2.4rem); line-height: 1.2; margin-bottom: 14px;
}
.info-pill {
  display: inline-flex; align-items: center; gap: 6px;
  background: rgba(255,255,255,.1); border: 1px solid rgba(255,255,255,.18);
  color: rgba(255,255,255,.82); font-size: .78rem; font-weight: 500;
  padding: 5px 12px; border-radius: 50px; margin-right: 6px; margin-bottom: 6px;
}
.info-pill i { color: #e8bf60; }

/* ── KONTEN UTAMA ────────────────────────────────── */
.konten-wrap { background: #f5f2ec; padding: 48px 0 64px; }
.konten-wrap .container { max-width: 960px; }

/* Kartu putih tiap section */
.kartu-section {
  background: #fff; border: 1px solid #dde3ee; border-radius: 16px;
  padding: 28px 32px; margin-bottom: 24px;
}
.kartu-section h2 {
  font-family: 'Playfair Display', serif; font-size: 1.2rem;
  color: #0c1d3a; margin-bottom: 16px; display: flex; align-items: center; gap: 10px;
}
.kartu-section h2 i { color: #1e4dbf; font-size: 1.1rem; }
.teks-deskripsi { font-size: .92rem; color: #4b5563; line-height: 1.85; }

/* Fasilitas */
.list-fasilitas { list-style: none; padding: 0; margin: 0; display: flex; flex-wrap: wrap; gap: 10px; }
.list-fasilitas li {
  display: flex; align-items: center; gap: 8px;
  background: #f0f4ff; border: 1px solid #c9d4ec;
  padding: 7px 14px; border-radius: 50px;
  font-size: .82rem; color: #1e4dbf; font-weight: 500;
}

/* Keunggulan */
.list-keunggulan { list-style: none; padding: 0; margin: 0; }
.list-keunggulan li {
  display: flex; align-items: flex-start; gap: 10px;
  padding: 10px 0; border-bottom: 1px solid #f0f2f8;
  font-size: .88rem; color: #374151;
}
.list-keunggulan li:last-child { border-bottom: none; }
.list-keunggulan li i { color: #1fa563; font-size: 1rem; flex-shrink: 0; margin-top: 2px; }

/* Syarat & ketentuan — nomor otomatis dengan CSS counter */
.list-syarat { list-style: none; padding: 0; margin: 0; counter-reset: syarat-counter; }
.list-syarat li {
  counter-increment: syarat-counter;
  display: flex; align-items: flex-start; gap: 12px;
  padding: 10px 0; border-bottom: 1px solid #f0f2f8;
  font-size: .88rem; color: #374151;
}
.list-syarat li:last-child { border-bottom: none; }
.list-syarat li::before {
  content: counter(syarat-counter);
  width: 24px; height: 24px; border-radius: 50%;
  background: #0c1d3a; color: #fff;
  font-size: .72rem; font-weight: 700;
  display: flex; align-items: center; justify-content: center; flex-shrink: 0;
}

/* Itinerary timeline */
.timeline { position: relative; padding-left: 24px; }
.timeline::before { content: ''; position: absolute; left: 11px; top: 0; bottom: 0; width: 2px; background: #dde3ee; }
.timeline-item { position: relative; margin-bottom: 20px; }
.timeline-item:last-child { margin-bottom: 0; }
.timeline-dot {
  position: absolute; left: -20px; top: 4px;
  width: 22px; height: 22px; border-radius: 50%;
  background: #1e4dbf; color: #fff;
  font-size: .65rem; font-weight: 700;
  display: flex; align-items: center; justify-content: center;
}
.timeline-label { font-size: .72rem; font-weight: 700; color: #1e4dbf; text-transform: uppercase; letter-spacing: .08em; margin-bottom: 4px; }
.timeline-desc { font-size: .87rem; color: #4b5563; line-height: 1.75; }

/* Sidebar harga */
.sidebar-harga {
  background: #fff; border: 1px solid #dde3ee; border-radius: 16px;
  padding: 24px; position: sticky; top: 84px;
}
.harga-label-kecil { font-size: .7rem; color: #9baac8; text-transform: uppercase; letter-spacing: .08em; }
.harga-besar { color: #e8400c; font-size: 1.6rem; font-weight: 800; line-height: 1.1; }
.harga-satuan { font-size: .75rem; color: #8a9bc0; font-weight: 400; }
.info-sidebar { font-size: .82rem; color: #4b5563; display: flex; gap: 8px; margin-bottom: 8px; }
.info-sidebar i { color: #1e4dbf; width: 16px; flex-shrink: 0; }
.btn-wa-besar {
  display: flex; align-items: center; justify-content: center; gap: 8px;
  width: 100%; padding: 13px; border-radius: 12px;
  background: #1fa563; color: #fff; font-size: .92rem; font-weight: 700;
  transition: all .2s; margin-top: 16px;
}
.btn-wa-besar:hover { background: #18935a; color: #fff; }
.btn-kembali {
  display: flex; align-items: center; justify-content: center; gap: 6px;
  width: 100%; padding: 10px; border-radius: 12px; margin-top: 8px;
  background: #f0f4ff; color: #1e4dbf; font-size: .85rem; font-weight: 600;
  border: 1.5px solid #c9d4ec; transition: all .2s;
}
.btn-kembali:hover { background: #1e4dbf; color: #fff; }

/* ── FOOTER ──────────────────────────────────────── */
footer { background: #0a1628; padding: 60px 0 28px; }
.foot-inner { max-width: 1040px; margin: 0 auto; padding: 0 24px; }
footer h3 { font-family: 'Playfair Display', serif; color: #fff; font-size: 1.2rem; margin-bottom: 4px; }
.foot-since { color: rgba(255,255,255,.32); font-size: .68rem; letter-spacing: .12em; text-transform: uppercase; display: block; margin-bottom: 12px; }
.foot-desc  { font-size: .83rem; color: rgba(255,255,255,.46); line-height: 1.75; margin-bottom: 18px; }
.socials { display: flex; gap: 8px; }
.socials a { width: 36px; height: 36px; border-radius: 9px; background: rgba(255,255,255,.07); border: 1px solid rgba(255,255,255,.1); display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,.5); font-size: .95rem; transition: all .2s; }
.socials a:hover { background: #1e4dbf; border-color: #1e4dbf; color: #fff; }
footer h4 { font-size: .72rem; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; color: rgba(255,255,255,.32); margin-bottom: 16px; }
.foot-link { display: block; font-size: .83rem; color: rgba(255,255,255,.52); margin-bottom: 10px; transition: color .2s; }
.foot-link:hover { color: #fff; }
.foot-link i { margin-right: 6px; color: rgba(255,255,255,.3); }
.foot-copy { font-size: .78rem; color: rgba(255,255,255,.28); }

/* ── RESPONSIF ───────────────────────────────────── */
@media (max-width: 991px) {
  .nav-menu { display: none; }
  .sidebar-harga { position: static; margin-top: 24px; }
}
@media (max-width: 575px) {
  .navbar-main { padding: 0 16px; }
  .hero-foto, .hero-foto-placeholder { height: 260px; }
  .kartu-section { padding: 20px; }
}
</style>
</head>
<body>

{{-- ══ NAVBAR ══ --}}
<nav class="navbar-main">
  <div class="nav-wrap">

    {{-- Logo — double-klik untuk masuk ke admin (tersembunyi dari pengunjung) --}}
    <a href="{{ route('beranda') }}" id="logo-link" class="d-flex align-items-center gap-2 me-4">
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
            data-bs-toggle="dropdown">
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
      @endauth
    </div>
  </div>
</nav>


{{-- ══ HERO ══
     Semua data dari $paket (dikirim PageController@dtk)
     Relasi yang dipakai: fasilitas, keunggulanPaket, syaratKetentuan, itinerary
══ --}}
<section class="hero-detail">

  @if($paket->foto)
    <img src="{{ asset('storage/' . $paket->foto) }}" alt="{{ $paket->nama }}" class="hero-foto">
  @else
    <div class="hero-foto-placeholder"><i class="bi bi-image"></i></div>
  @endif

  <div class="hero-overlay">
    <div class="container">

      <p class="crumb">
        <a href="{{ route('beranda') }}">Beranda</a> &rsaquo;
        <a href="{{ route('lyn') }}">Layanan</a> &rsaquo;
        {{ $paket->nama }}
      </p>

      @php
        $jenisClass = match($paket->jenis_wisata) {
          'Wisata Religi'      => 'jenis-religi',
          'Wisata Lokal'       => 'jenis-lokal',
          'Wisata Mancanegara' => 'jenis-manca',
          default              => 'jenis-lokal',
        };
      @endphp
      <span class="hero-badge-jenis {{ $jenisClass }}">{{ $paket->jenis_wisata }}</span>

      <h1>{{ $paket->nama }}</h1>
      <div>
        <span class="info-pill"><i class="bi bi-geo-alt-fill"></i> {{ $paket->lokasi }}</span>
        <span class="info-pill"><i class="bi bi-clock-fill"></i> {{ $paket->durasi }}</span>
      </div>

    </div>
  </div>
</section>


{{-- ══ KONTEN UTAMA ══ --}}
<div class="konten-wrap">
  <div class="container">
    <div class="row g-4">

      {{-- Kolom kiri: detail lengkap --}}
      <div class="col-lg-8">

        {{-- 1. Deskripsi --}}
        @if($paket->deskripsi)
          <div class="kartu-section">
            <h2><i class="bi bi-file-text"></i> Tentang Paket Ini</h2>
            <div class="teks-deskripsi">{!! $paket->deskripsi !!}</div>
          </div>
        @endif

        {{-- 2. Fasilitas --}}
        @if($paket->fasilitas->count() > 0)
          <div class="kartu-section">
            <h2><i class="bi bi-check2-circle"></i> Fasilitas Termasuk</h2>
            <ul class="list-fasilitas">
              @foreach($paket->fasilitas->sortBy('urutan') as $item)
                <li><i class="bi bi-check-lg"></i> {{ $item->nama }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        {{-- 3. Keunggulan --}}
        @if($paket->keunggulanPaket->count() > 0)
          <div class="kartu-section">
            <h2><i class="bi bi-star"></i> Keunggulan Paket</h2>
            <ul class="list-keunggulan">
              @foreach($paket->keunggulanPaket->sortBy('urutan') as $item)
                <li><i class="bi bi-shield-check"></i> {{ $item->isi }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        {{-- 4. Itinerary --}}
        @if($paket->itinerary->count() > 0)
          <div class="kartu-section">
            <h2><i class="bi bi-calendar3"></i> Itinerary Perjalanan</h2>
            <div class="timeline">
              @foreach($paket->itinerary->sortBy('hari') as $item)
                <div class="timeline-item">
                  <div class="timeline-dot">{{ $item->hari }}</div>
                  <p class="timeline-label">Hari ke-{{ $item->hari }}</p>
                  <p class="timeline-desc">{{ $item->deskripsi }}</p>
                </div>
              @endforeach
            </div>
          </div>
        @endif

        {{-- 5. Syarat & Ketentuan --}}
        @if($paket->syaratKetentuan->count() > 0)
          <div class="kartu-section">
            <h2><i class="bi bi-clipboard-check"></i> Syarat &amp; Ketentuan</h2>
            <ul class="list-syarat">
              @foreach($paket->syaratKetentuan->sortBy('urutan') as $item)
                <li>{{ $item->isi }}</li>
              @endforeach
            </ul>
          </div>
        @endif

      </div>{{-- /col kiri --}}

      {{-- Kolom kanan: sidebar harga --}}
      <div class="col-lg-4">
        <div class="sidebar-harga">

          <p class="harga-label-kecil">Harga mulai dari</p>
          <p class="harga-besar">
            Rp {{ number_format($paket->harga, 0, ',', '.') }}
            <span class="harga-satuan">/ orang</span>
          </p>

          <hr style="border-color:#f0f2f8;margin:16px 0;">

          <div class="info-sidebar"><i class="bi bi-geo-alt-fill"></i> <span>{{ $paket->lokasi }}</span></div>
          <div class="info-sidebar"><i class="bi bi-clock-fill"></i> <span>{{ $paket->durasi }}</span></div>
          <div class="info-sidebar"><i class="bi bi-tag-fill"></i> <span>{{ $paket->jenis_wisata }}</span></div>

          <a href="https://wa.me/6282324246645?text={{ urlencode('Halo, saya ingin memesan paket ' . $paket->nama) }}"
             target="_blank" rel="noopener noreferrer" class="btn-wa-besar">
            <i class="bi bi-whatsapp"></i> Pesan Sekarang
          </a>
          <a href="{{ route('lyn') }}" class="btn-kembali">
            <i class="bi bi-arrow-left"></i> Kembali ke Layanan
          </a>

        </div>
      </div>{{-- /col kanan --}}

    </div>
  </div>
</div>


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
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="https://wa.me/6282324246645" target="_blank" rel="noopener"><i class="bi bi-whatsapp"></i></a>
          <a href="#"><i class="bi bi-youtube"></i></a>
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
        <a href="tel:+6282324246645" class="foot-link"><i class="bi bi-telephone"></i>+62 823-2424-6645</a>
        <a href="https://wa.me/6282324246645" target="_blank" rel="noopener" class="foot-link"><i class="bi bi-whatsapp"></i>+62 823-2424-6645</a>
        <a href="mailto:info@nirwanatravel.id" class="foot-link"><i class="bi bi-envelope"></i>info@nirwanatravel.id</a>
      </div>

    </div>
    <hr style="border-color:rgba(255,255,255,.07);margin:44px 0 22px;">
    <div class="d-flex flex-wrap justify-content-between gap-2">
      <p class="foot-copy mb-0">&copy; {{ date('Y') }} Nirwana Tour &amp; Travel. Hak cipta dilindungi.</p>
      <p class="foot-copy mb-0">Berizin resmi &mdash; Terdaftar Kemenparekraf</p>
    </div>
  </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // ── Double-klik logo → masuk admin (tersembunyi) ──────────
  document.getElementById('logo-link').addEventListener('dblclick', function (e) {
    e.preventDefault();
    window.location.href = '/admin';
  });
</script>
</body>
</html>