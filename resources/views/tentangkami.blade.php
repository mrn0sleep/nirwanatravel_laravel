<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tentang Kami — Nirwana Tour &amp; Travel</title>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<style>
/* ── RESET ───────────────────────────────────────── */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body { font-family: 'Plus Jakarta Sans', sans-serif; color: #111827; }
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
.user-avatar {
  width: 30px; height: 30px; border-radius: 50%;
  background: #c49a2a; color: #fff; font-weight: 700; font-size: .82rem;
  display: flex; align-items: center; justify-content: center;
}

/* ── BURGER BUTTON ───────────────────────────────── */
.burger-btn {
  display: none;
  align-items: center; justify-content: center;
  width: 40px; height: 40px; border-radius: 10px;
  background: rgba(255,255,255,.1); border: 1.5px solid rgba(255,255,255,.18);
  color: #fff; font-size: 1.25rem;
  cursor: pointer; margin-left: auto;
  transition: background .2s;
}
.burger-btn:hover { background: rgba(255,255,255,.2); }

/* ── MOBILE MENU ─────────────────────────────────── */
.mobile-menu {
  display: none;
  position: fixed; top: 68px; left: 0; right: 0;
  background: #0c1d3a;
  border-top: 1px solid rgba(255,255,255,.1);
  box-shadow: 0 12px 32px rgba(0,0,0,.35);
  z-index: 998; padding: 12px 0 20px;
}
.mobile-menu.buka { display: block; }
.mobile-menu a {
  display: flex; align-items: center; gap: 10px;
  padding: 13px 24px; font-size: .93rem; font-weight: 500;
  color: rgba(255,255,255,.78);
  border-bottom: 1px solid rgba(255,255,255,.06);
  transition: background .2s, color .2s;
}
.mobile-menu a:hover, .mobile-menu a.active { background: rgba(255,255,255,.07); color: #fff; }
.mobile-menu a i { font-size: 1rem; color: #e8bf60; width: 20px; }
.mobile-menu .wa-mobile {
  display: flex; align-items: center; justify-content: center; gap: 8px;
  margin: 16px 24px 0;
  background: #1fa563; color: #fff; font-weight: 600; font-size: .88rem;
  padding: 11px; border-radius: 50px;
}
.mobile-menu .wa-mobile:hover { background: #22bd72; color: #fff; }

/* ── TOMBOL ──────────────────────────────────────── */
.btn-wa {
  display: inline-flex; align-items: center; gap: 8px;
  background: #1fa563; color: #fff; font-weight: 600; font-size: .9rem;
  padding: 13px 28px; border-radius: 50px;
  box-shadow: 0 5px 16px rgba(31,165,99,.35); transition: .2s;
}
.btn-wa:hover { background: #22bd72; color: #fff; transform: translateY(-2px); }
.btn-ghost-dark {
  display: inline-flex; align-items: center; gap: 8px;
  background: transparent; color: #0c1d3a; font-weight: 600; font-size: .9rem;
  padding: 12px 26px; border-radius: 50px;
  border: 2px solid #c5cfe3; transition: .2s;
}
.btn-ghost-dark:hover { border-color: #0c1d3a; color: #0c1d3a; transform: translateY(-2px); }
.btn-white {
  display: inline-flex; align-items: center; gap: 8px;
  background: #fff; color: #0c1d3a; font-weight: 700; font-size: .9rem;
  padding: 13px 30px; border-radius: 50px;
  box-shadow: 0 6px 20px rgba(0,0,0,.22); transition: .2s;
}
.btn-white:hover { background: #f5f2ec; color: #0c1d3a; transform: translateY(-2px); }

/* ── HERO TENTANG KAMI ───────────────────────────── */
.hero-tk {
  min-height: 100vh; padding-top: 68px;
  background: linear-gradient(145deg, #0a1628 0%, #0c2447 45%, #0c1d3a 100%);
  display: flex; align-items: center; position: relative; overflow: hidden;
}
.hero-tk::before {
  content: ''; position: absolute;
  top: -15%; right: -10%; width: 520px; height: 520px;
  border-radius: 50%; pointer-events: none;
  background: radial-gradient(circle, rgba(30,77,191,.3) 0%, transparent 70%);
}
.hero-tk::after {
  content: ''; position: absolute;
  bottom: -10%; left: -5%; width: 380px; height: 380px;
  border-radius: 50%; pointer-events: none;
  background: radial-gradient(circle, rgba(232,191,96,.07) 0%, transparent 70%);
}
.hero-tk-inner {
  position: relative; z-index: 1;
  max-width: 1100px; margin: 0 auto; padding: 72px 24px;
  display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;
}
.hero-left .badge-tk {
  display: inline-flex; align-items: center; gap: 7px;
  background: rgba(232,191,96,.15); border: 1px solid rgba(232,191,96,.3);
  color: #e8bf60; font-size: .73rem; font-weight: 700;
  letter-spacing: .12em; text-transform: uppercase;
  padding: 5px 14px; border-radius: 50px; margin-bottom: 22px;
}
.hero-left h1 {
  font-family: 'Playfair Display', serif;
  font-size: clamp(2rem, 4.5vw, 3.1rem);
  color: #fff; line-height: 1.15; margin-bottom: 20px;
}
.hero-left h1 em { font-style: italic; color: #e8bf60; }
.hero-left p { font-size: .95rem; color: rgba(255,255,255,.72); line-height: 1.8; margin-bottom: 14px; }
.hero-btns { display: flex; gap: 12px; flex-wrap: wrap; margin-top: 32px; }
.info-card {
  background: linear-gradient(135deg, #e8bf60 0%, #c49a2a 100%);
  border-radius: 24px; padding: 32px; position: relative; overflow: hidden;
}
.info-card::before {
  content: ''; position: absolute;
  top: -30px; right: -30px; width: 160px; height: 160px;
  border-radius: 50%; background: rgba(255,255,255,.1);
}
.stat-badge {
  position: absolute; top: 24px; right: 24px;
  background: #0c1d3a; color: #fff;
  border-radius: 14px; padding: 12px 18px; text-align: center;
}
.stat-badge strong { display: block; font-family: 'Playfair Display', serif; font-size: 1.6rem; color: #e8bf60; line-height: 1; }
.stat-badge span { font-size: .7rem; color: rgba(255,255,255,.7); line-height: 1.3; display: block; max-width: 80px; }
.card-logo {
  width: 64px; height: 64px; border-radius: 16px;
  background: rgba(255,255,255,.25); border: 2px solid rgba(255,255,255,.4);
  display: flex; align-items: center; justify-content: center;
  font-family: 'Playfair Display', serif; color: #fff;
  font-size: 1.8rem; font-weight: 700; margin-bottom: 80px;
}
.info-box { background: #fff; border-radius: 16px; padding: 20px 22px; }
.info-box small { display: block; font-size: .65rem; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; color: #e8bf60; margin-bottom: 8px; }
.info-box strong { display: block; font-size: 1rem; font-weight: 700; color: #0c1d3a; margin-bottom: 6px; line-height: 1.3; }
.info-box p { font-size: .82rem; color: #6b7a90; line-height: 1.6; margin: 0; }

/* ── SECTION UMUM ────────────────────────────────── */
.sec { padding: 80px 0; }
.sec-alt { background: #f5f2ec; }
.sec-label { display: inline-block; background: #eef2ff; color: #1e4dbf; font-size: .69rem; font-weight: 700; letter-spacing: .11em; text-transform: uppercase; padding: 5px 14px; border-radius: 50px; margin-bottom: 14px; }
.sec-title { font-family: 'Playfair Display', serif; font-size: clamp(1.5rem, 3vw, 2rem); color: #0c1d3a; margin-bottom: 14px; }
.sec-sub { font-size: .93rem; color: #6b7a90; line-height: 1.78; }

/* ── VISI & MISI ─────────────────────────────────── */
.vm-card { border-radius: 18px; padding: 32px 28px; height: 100%; }
.vm-card.visi { background: #0c1d3a; color: #fff; }
.vm-card.misi { background: #fff; border: 1.5px solid #dde3ee; }
.vm-icon { width: 50px; height: 50px; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; margin-bottom: 18px; }
.vm-card.visi .vm-icon { background: rgba(232,191,96,.2); color: #e8bf60; }
.vm-card.misi .vm-icon { background: #eef2ff; color: #1e4dbf; }
.vm-card h3 { font-family: 'Playfair Display', serif; font-size: 1.25rem; margin-bottom: 14px; }
.vm-card.visi h3 { color: #e8bf60; }
.vm-card.misi h3 { color: #0c1d3a; }
.vm-card p { font-size: .88rem; line-height: 1.78; }
.vm-card.visi p { color: rgba(255,255,255,.75); }
.vm-card.misi p { color: #6b7a90; }
.misi-list { list-style: none; padding: 0; margin: 0; }
.misi-list li { display: flex; align-items: flex-start; gap: 10px; font-size: .88rem; color: #6b7a90; line-height: 1.65; margin-bottom: 10px; }
.misi-list li i { color: #1fa563; font-size: 1rem; margin-top: 1px; flex-shrink: 0; }

/* ── NILAI-NILAI ─────────────────────────────────── */
.nilai-card {
  border-radius: 16px; padding: 28px 22px;
  background: #fff; border: 1.5px solid #dde3ee;
  height: 100%; transition: .25s;
}
.nilai-card:hover { transform: translateY(-4px); box-shadow: 0 14px 36px rgba(13,31,60,.1); border-color: #b8c6e0; }
.nilai-card .n-icon { width: 48px; height: 48px; border-radius: 13px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; margin-bottom: 14px; }
.nilai-card h5 { font-size: .93rem; font-weight: 700; color: #0c1d3a; margin-bottom: 7px; }
.nilai-card p { font-size: .82rem; color: #6b7a90; line-height: 1.7; margin: 0; }

/* ── CTA BAWAH ────────────────────────────────────── */
.cta-bot { background: #0c1d3a; padding: 80px 0; text-align: center; position: relative; overflow: hidden; }
.cta-bot::before {
  content: ''; position: absolute; top: -50%; right: -8%;
  width: 440px; height: 440px; border-radius: 50%;
  background: radial-gradient(circle, rgba(30,77,191,.2) 0%, transparent 68%);
}
.gold-pill { display: inline-block; background: rgba(255,255,255,.08); border: 1px solid rgba(255,255,255,.14); color: #e8bf60; font-size: .69rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; padding: 5px 14px; border-radius: 50px; margin-bottom: 18px; }
.cta-bot h2 { font-family: 'Playfair Display', serif; font-size: clamp(1.5rem, 3.2vw, 2.1rem); color: #fff; margin-bottom: 14px; }
.cta-bot p { font-size: .93rem; color: rgba(255,255,255,.67); line-height: 1.78; margin-bottom: 30px; }

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

/* ── ANIMASI REVEAL ──────────────────────────────── */
.reveal { opacity: 0; transform: translateY(28px); transition: opacity .55s ease, transform .55s ease; }
.reveal.show { opacity: 1; transform: none; }

/* ── RESPONSIF ───────────────────────────────────── */
@media (max-width: 991px) {
  .nav-menu { display: none; }
  .auth-desktop { display: none; }
  .burger-btn { display: flex; }
  .hero-tk-inner { grid-template-columns: 1fr; gap: 36px; }
  .info-card { display: none; }
}
@media (max-width: 575px) {
  .navbar-main { padding: 0 16px; }
  .hero-tk-inner { padding: 60px 16px; }
}
</style>
</head>
<body>

{{-- ══ NAVBAR ══ --}}
<nav class="navbar-main">
  <div class="nav-wrap">

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
      <li><a href="{{ route('lyn') }}">Layanan</a></li>
      <li><a href="{{ route('tk') }}" class="active">Tentang Kami</a></li>
    </ul>

    <div class="ms-auto auth-desktop">
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
      @endauth
    </div>

    {{-- Tombol burger — hanya tampil di HP (≤991px) --}}
    <button class="burger-btn" id="burgerBtn" aria-label="Buka menu">
      <i class="bi bi-list" id="burgerIcon"></i>
    </button>

  </div>
</nav>

{{-- ══ MOBILE MENU ══ --}}
<div class="mobile-menu" id="mobileMenu">
  <a href="{{ route('beranda') }}"><i class="bi bi-house-fill"></i> Beranda</a>
  <a href="{{ route('lyn') }}"><i class="bi bi-compass-fill"></i> Layanan</a>
  <a href="{{ route('tk') }}" class="active"><i class="bi bi-building"></i> Tentang Kami</a>
  @auth
    <a href="{{ route('profile.edit') }}"><i class="bi bi-person-circle"></i> Profil Saya</a>
    <form method="POST" action="{{ route('logout') }}" style="padding:0 24px;margin-top:4px;">
      @csrf
      <button type="submit" style="width:100%;padding:11px;background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.1);border-radius:10px;color:rgba(255,100,100,.85);font-size:.88rem;font-weight:600;cursor:pointer;">
        <i class="bi bi-box-arrow-right"></i> Keluar
      </button>
    </form>
  @endauth
  <a href="https://wa.me/6282324246645" target="_blank" rel="noopener" class="wa-mobile">
    <i class="bi bi-whatsapp"></i> Hubungi Kami via WhatsApp
  </a>
</div>


{{-- ══ HERO ══ --}}
<section class="hero-tk">
  <div class="hero-tk-inner">

    <div class="hero-left">
      <div class="badge-tk">
        <i class="bi bi-building"></i>
        Mengenal Nirwana Tour &amp; Travel
      </div>
      <h1>Perjalanan Penuh <em>Makna</em> Bersama Kami</h1>
      <p>
        Berdiri sejak 2005, Nirwana Tour &amp; Travel telah menjadi mitra perjalanan
        ribuan jamaah dan wisatawan di seluruh Indonesia.
      </p>
      <p>
        Berizin resmi Kementerian Agama RI, kami hadir dengan komitmen memberikan
        layanan terbaik — aman, nyaman, dan berkesan — dalam setiap perjalanan.
      </p>
      <div class="hero-btns">
        <a href="https://wa.me/6282324246645?text={{ urlencode('Halo, saya ingin konsultasi paket wisata.') }}"
           target="_blank" rel="noopener" class="btn-wa">
          <i class="bi bi-whatsapp"></i> Hubungi Kami
        </a>
        <a href="{{ route('lyn') }}" class="btn-ghost-dark">
          <i class="bi bi-compass"></i> Lihat Paket
        </a>
      </div>
    </div>

    <div class="info-card">
      <div class="stat-badge">
        <strong>19+</strong>
        <span>Tahun Pengalaman</span>
      </div>
      <div class="card-logo">N</div>
      <div class="info-box">
        <small>Izin Resmi</small>
        <strong>Terdaftar Kementerian Agama RI</strong>
        <p>Penyelenggara umroh &amp; haji khusus berlisensi resmi sejak 2005.</p>
      </div>
    </div>

  </div>
</section>


{{-- ══ VISI & MISI ══ --}}
<section class="sec sec-alt">
  <div class="container" style="max-width:1040px;">
    <div class="text-center mb-5">
      <span class="sec-label">Fondasi Kami</span>
      <h2 class="sec-title">Visi &amp; Misi</h2>
      <p class="sec-sub">Nilai-nilai yang menjadi landasan kami dalam melayani setiap perjalanan.</p>
    </div>
    <div class="row g-4">

      <div class="col-12 col-md-6 reveal">
        <div class="vm-card visi">
          <div class="vm-icon"><i class="bi bi-eye-fill"></i></div>
          <h3>Visi</h3>
          <p>
            Menjadi biro perjalanan wisata dan ibadah terpercaya di Indonesia yang memberikan
            pengalaman perjalanan terbaik, bermakna, dan tak terlupakan bagi setiap pelanggan.
          </p>
        </div>
      </div>

      <div class="col-12 col-md-6 reveal">
        <div class="vm-card misi">
          <div class="vm-icon"><i class="bi bi-bullseye"></i></div>
          <h3>Misi</h3>
          <ul class="misi-list">
            <li><i class="bi bi-check-circle-fill"></i> Memberikan pelayanan prima dengan standar profesional tinggi.</li>
            <li><i class="bi bi-check-circle-fill"></i> Menjamin keamanan dan kenyamanan setiap perjalanan jamaah.</li>
            <li><i class="bi bi-check-circle-fill"></i> Menyediakan paket dengan harga transparan tanpa biaya tersembunyi.</li>
            <li><i class="bi bi-check-circle-fill"></i> Terus berinovasi demi kepuasan dan kepercayaan pelanggan.</li>
          </ul>
        </div>
      </div>

    </div>
  </div>
</section>


{{-- ══ NILAI-NILAI ══ --}}
<section class="sec">
  <div class="container" style="max-width:1040px;">
    <div class="text-center mb-5">
      <span class="sec-label">Nilai Kami</span>
      <h2 class="sec-title">Empat Pilar Pelayanan</h2>
      <p class="sec-sub">Prinsip yang selalu kami pegang dalam melayani setiap perjalanan Anda.</p>
    </div>
    <div class="row g-4">

      <div class="col-12 col-sm-6 col-lg-3 reveal">
        <div class="nilai-card">
          <div class="n-icon" style="background:#eef2ff;color:#1e4dbf;"><i class="bi bi-patch-check-fill"></i></div>
          <h5>Integritas</h5>
          <p>Jujur dalam setiap informasi harga dan layanan. Tidak ada janji yang tidak ditepati.</p>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-3 reveal">
        <div class="nilai-card">
          <div class="n-icon" style="background:#d9f5ea;color:#1a6640;"><i class="bi bi-heart-fill"></i></div>
          <h5>Pelayanan Tulus</h5>
          <p>Melayani seperti keluarga sendiri — hangat, tanggap, dan selalu siap membantu.</p>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-3 reveal">
        <div class="nilai-card">
          <div class="n-icon" style="background:#fff4cc;color:#b07d00;"><i class="bi bi-shield-check"></i></div>
          <h5>Keamanan</h5>
          <p>Setiap perjalanan dirancang dengan standar keselamatan dan kenyamanan tertinggi.</p>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-3 reveal">
        <div class="nilai-card">
          <div class="n-icon" style="background:#fce8e8;color:#c0392b;"><i class="bi bi-trophy-fill"></i></div>
          <h5>Profesionalisme</h5>
          <p>Tim terlatih dan berpengalaman untuk memastikan setiap detail perjalanan sempurna.</p>
        </div>
      </div>

    </div>
  </div>
</section>


{{-- ══ STATS ══ --}}
<section class="sec sec-alt">
  <div class="container" style="max-width:900px;">
    <div class="text-center mb-5">
      <span class="sec-label">Pencapaian Kami</span>
      <h2 class="sec-title">Angka yang Berbicara</h2>
    </div>
    <div class="row g-4 text-center">
      <div class="col-6 col-md-3 reveal">
        <p style="font-family:'Playfair Display',serif;font-size:2.2rem;color:#0c1d3a;font-weight:700;line-height:1;">19+</p>
        <p style="font-size:.85rem;color:#6b7a90;">Tahun Pengalaman</p>
      </div>
      <div class="col-6 col-md-3 reveal">
        <p style="font-family:'Playfair Display',serif;font-size:2.2rem;color:#0c1d3a;font-weight:700;line-height:1;">12K+</p>
        <p style="font-size:.85rem;color:#6b7a90;">Jamaah Diberangkatkan</p>
      </div>
      <div class="col-6 col-md-3 reveal">
        <p style="font-family:'Playfair Display',serif;font-size:2.2rem;color:#0c1d3a;font-weight:700;line-height:1;">98%</p>
        <p style="font-size:.85rem;color:#6b7a90;">Kepuasan Pelanggan</p>
      </div>
      <div class="col-6 col-md-3 reveal">
        <p style="font-family:'Playfair Display',serif;font-size:2.2rem;color:#0c1d3a;font-weight:700;line-height:1;">50+</p>
        <p style="font-size:.85rem;color:#6b7a90;">Destinasi Tersedia</p>
      </div>
    </div>
  </div>
</section>


{{-- ══ CTA BAWAH ══ --}}
<section class="cta-bot">
  <div class="container" style="max-width:640px;position:relative;z-index:1;">
    <span class="gold-pill">Siap Berangkat?</span>
    <h2>Mulai Perjalanan Anda Bersama Nirwana</h2>
    <p>
      Konsultasikan kebutuhan perjalanan Anda kepada tim kami.
      Gratis, tanpa komitmen, dan kami siap membantu kapan saja.
    </p>
    <div class="d-flex gap-3 justify-content-center flex-wrap">
      <a href="https://wa.me/6282324246645?text={{ urlencode('Halo, saya ingin konsultasi paket wisata.') }}"
         target="_blank" rel="noopener" class="btn-wa">
        <i class="bi bi-whatsapp"></i> Chat Sekarang
      </a>
      <a href="{{ route('lyn') }}" class="btn-white">
        <i class="bi bi-compass"></i> Lihat Paket
      </a>
    </div>
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
        <a href="tel:+6282324246645" class="foot-link"><i class="bi bi-telephone"></i>+62 823-2424-6645</a>
        <a href="https://wa.me/6282324246645" target="_blank" rel="noopener" class="foot-link"><i class="bi bi-whatsapp"></i>+62 823-2424-6645</a>
        <a href="mailto:info@nirwanatravel.id" class="foot-link"><i class="bi bi-envelope"></i>info@nirwanatravel.id</a>
      </div>

    </div>

    <hr style="border-color:rgba(255,255,255,.07);margin:44px 0 22px;">
    <div class="d-flex flex-wrap justify-content-between gap-2">
      <p class="foot-copy mb-0">&copy; {{ date('Y') }} Nirwana Tour &amp; Travel. Hak cipta dilindungi.</p>
      <p class="foot-copy mb-0">By E-Team TIC</p>
    </div>
  </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // ── Toggle mobile menu ────────────────────────────────────
  var burgerBtn  = document.getElementById('burgerBtn');
  var mobileMenu = document.getElementById('mobileMenu');
  var burgerIcon = document.getElementById('burgerIcon');

  burgerBtn.addEventListener('click', function () {
    var buka = mobileMenu.classList.toggle('buka');
    burgerIcon.className = buka ? 'bi bi-x-lg' : 'bi bi-list';
  });

  // Tutup menu saat link diklik
  mobileMenu.querySelectorAll('a').forEach(function (link) {
    link.addEventListener('click', function () {
      mobileMenu.classList.remove('buka');
      burgerIcon.className = 'bi bi-list';
    });
  });

  // ── Animasi scroll reveal ─────────────────────────────────
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('show');
        io.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15 });

  document.querySelectorAll('.reveal').forEach(function (el) { io.observe(el); });

  // ── Double-klik logo → admin (tersembunyi) ────────────────
  document.getElementById('logo-link').addEventListener('dblclick', function (e) {
    e.preventDefault();
    window.location.href = '/admin';
  });
</script>
</body>
</html>