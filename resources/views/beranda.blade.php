<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nirwana Tour &amp; Travel</title>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<style>
/* ── RESET ───────────────────────────────────────── */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; overflow-x: hidden; }
body { font-family: 'Plus Jakarta Sans', sans-serif; color: #111827; overflow-x: hidden; }
a { text-decoration: none; }

/* ── NAVBAR ──────────────────────────────────────── */
.navbar-main {
  position: fixed; top: 0; left: 0; right: 0; z-index: 999;
  height: 68px; padding: 0 28px;
  display: flex; align-items: center;
  transition: background .3s;
}
.navbar-main.scrolled {
  background: rgba(12,29,58,.95);
  backdrop-filter: blur(14px);
  box-shadow: 0 2px 20px rgba(0,0,0,.2);
}
.nav-wrap { width: 100%; max-width: 1180px; margin: 0 auto; display: flex; align-items: center; }
.logo-box {
  width: 42px; height: 42px; border-radius: 10px;
  background: rgba(255,255,255,.12); border: 1px solid rgba(255,255,255,.22);
  display: flex; align-items: center; justify-content: center;
  overflow: hidden; padding: 4px; cursor: pointer;
}
.logo-box img { width: 100%; height: 100%; object-fit: contain; display: block; }
.logo-text strong { font-family: 'Playfair Display', serif; color: #fff; font-size: 1.05rem; display: block; line-height: 1.1; }
.logo-text small { color: rgba(255,255,255,.45); font-size: .6rem; letter-spacing: .1em; text-transform: uppercase; }
.nav-menu { display: flex; list-style: none; gap: 2px; margin: 0 auto; }
.nav-menu a { display: block; padding: 7px 13px; font-size: .87rem; font-weight: 500; color: rgba(255,255,255,.8); border-radius: 8px; transition: .2s; }
.nav-menu a:hover, .nav-menu a.active { color: #fff; background: rgba(255,255,255,.1); }

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
.btn-ghost {
  display: inline-flex; align-items: center; gap: 8px;
  background: transparent; color: #fff; font-weight: 600; font-size: .9rem;
  padding: 13px 28px; border-radius: 50px;
  border: 2px solid rgba(255,255,255,.4); transition: .2s;
}
.btn-ghost:hover { background: rgba(255,255,255,.1); border-color: rgba(255,255,255,.7); color: #fff; transform: translateY(-2px); }
.btn-white {
  display: inline-flex; align-items: center; gap: 8px;
  background: #fff; color: #0c1d3a; font-weight: 700; font-size: .9rem;
  padding: 13px 30px; border-radius: 50px;
  box-shadow: 0 6px 20px rgba(0,0,0,.22); transition: .2s;
}
.btn-white:hover { background: #f5f2ec; color: #0c1d3a; transform: translateY(-2px); }

/* ── HERO ────────────────────────────────────────── */
.hero {
  min-height: 100vh; display: flex; align-items: center; justify-content: center;
  position: relative; overflow: hidden; text-align: center;
  background: #0c1d3a;
}
.hero-video { position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0; }
.hero-overlay {
  position: absolute; inset: 0; z-index: 1;
  background: linear-gradient(145deg, rgba(10,22,40,.78) 0%, rgba(12,36,71,.62) 40%, rgba(14,45,94,.55) 65%, rgba(12,29,58,.78) 100%);
}
.hero-blob {
  position: absolute; border-radius: 50%; pointer-events: none;
  background: radial-gradient(circle, rgba(30,77,191,.55) 0%, transparent 70%);
  width: 560px; height: 560px; top: -10%; right: -8%; opacity: .3; z-index: 1;
}
.hero-body { position: relative; z-index: 2; max-width: 700px; padding: 0 20px; }
.hero-badge {
  display: inline-flex; align-items: center; gap: 8px;
  background: rgba(255,255,255,.1); border: 1px solid rgba(255,255,255,.2);
  color: rgba(255,255,255,.9); font-size: .74rem; font-weight: 600;
  letter-spacing: .1em; text-transform: uppercase;
  padding: 6px 16px; border-radius: 50px; margin-bottom: 24px;
  animation: fadeUp .65s ease both;
}
.dot { width: 6px; height: 6px; border-radius: 50%; background: #e8bf60; animation: blink 2s infinite; }
.hero h1 {
  font-family: 'Playfair Display', serif;
  font-size: clamp(2rem, 5.5vw, 3.4rem);
  color: #fff; line-height: 1.1; margin-bottom: 20px;
  animation: fadeUp .65s .15s ease both;
  text-shadow: 0 2px 18px rgba(0,0,0,.35);
}
.hero h1 em { font-style: italic; color: #e8bf60; }
.hero p {
  font-size: clamp(.88rem, 1.7vw, .97rem);
  color: rgba(255,255,255,.85); line-height: 1.8;
  max-width: 490px; margin: 0 auto 32px;
  animation: fadeUp .65s .28s ease both;
  text-shadow: 0 1px 10px rgba(0,0,0,.3);
}
.hero-btns { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; animation: fadeUp .65s .4s ease both; }
.scroll-hint {
  position: absolute; bottom: 28px; left: 50%; transform: translateX(-50%);
  display: flex; flex-direction: column; align-items: center; gap: 5px;
  color: rgba(255,255,255,.55); font-size: .68rem; letter-spacing: .1em; text-transform: uppercase;
  animation: scrollY 2.2s ease-in-out infinite; z-index: 2;
}
.scroll-hint-line { width: 1px; height: 28px; background: linear-gradient(to bottom, rgba(255,255,255,.55), transparent); }

/* ── STATS BAR ───────────────────────────────────── */
.stats { background: #0c1d3a; padding: 36px 0; }
.stat-item { text-align: center; }
.stat-item + .stat-item { border-left: 1px solid rgba(255,255,255,.1); }
.stat-num { font-family: 'Playfair Display', serif; font-size: 2rem; color: #e8bf60; line-height: 1; margin-bottom: 4px; }
.stat-lbl { font-size: .78rem; color: rgba(255,255,255,.5); }

/* ── CTA ATAS ────────────────────────────────────── */
.cta-top { background: #f5f2ec; border-bottom: 1px solid #dde3ee; padding: 64px 0; text-align: center; }
.pill { display: inline-block; background: #e8edf8; color: #163060; font-size: .69rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; padding: 5px 14px; border-radius: 50px; margin-bottom: 14px; }
.cta-top h2 { font-family: 'Playfair Display', serif; font-size: clamp(1.35rem, 2.8vw, 1.9rem); color: #0c1d3a; margin-bottom: 12px; }
.cta-top p { font-size: .93rem; color: #6b7a90; line-height: 1.78; margin-bottom: 28px; }

/* ── KEUNGGULAN ───────────────────────────────────── */
.keunggulan { padding: 88px 0; background: #fff; }
.sec-label { display: inline-block; background: #eef2ff; color: #1e4dbf; font-size: .69rem; font-weight: 700; letter-spacing: .11em; text-transform: uppercase; padding: 5px 14px; border-radius: 50px; margin-bottom: 14px; }
.sec-title { font-family: 'Playfair Display', serif; font-size: clamp(1.5rem, 3.2vw, 2.1rem); color: #0c1d3a; margin-bottom: 12px; }
.sec-sub { font-size: .93rem; color: #6b7a90; max-width: 480px; margin: 0 auto; line-height: 1.78; }
.k-card {
  background: #f5f2ec; border: 1px solid #dde3ee; border-radius: 16px;
  padding: 28px 22px; height: 100%; position: relative; overflow: hidden; transition: .25s;
}
.k-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px; background: transparent; transition: .25s; }
.k-card:hover { background: #fff; transform: translateY(-5px); box-shadow: 0 16px 40px rgba(13,31,60,.12); }
.k-card:hover::before { background: #1e4dbf; }
.k-icon { width: 50px; height: 50px; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; margin-bottom: 16px; }
.k-card h5 { font-size: .93rem; font-weight: 700; color: #0c1d3a; margin-bottom: 8px; }
.k-card p { font-size: .83rem; color: #6b7a90; line-height: 1.7; margin: 0; }

/* ── GALERI ───────────────────────────────────────── */
.galeri { padding: 88px 0; background: #f5f2ec; }
.galeri-grid {
  display: grid; grid-template-columns: repeat(3, 1fr);
  grid-auto-rows: 220px; gap: 14px;
  max-width: 1040px; margin: 0 auto; padding: 0 20px;
}
.gitem { overflow: hidden; border-radius: 16px; position: relative; background: #ccc; cursor: pointer; height: 100%; }
.gitem.tall { grid-row: span 2; }
.gitem img { width: 100%; height: 100%; object-fit: cover; transition: transform .45s; }
.gitem:hover img { transform: scale(1.06); }
.gitem-ov {
  position: absolute; inset: 0; border-radius: 16px;
  background: rgba(12,29,58,.4); display: flex; align-items: center; justify-content: center;
  opacity: 0; transition: .3s;
}
.gitem:hover .gitem-ov { opacity: 1; }
.gitem-ov i { font-size: 1.8rem; color: rgba(255,255,255,.9); }

/* ── LIGHTBOX ─────────────────────────────────────── */
.lb { display: none; position: fixed; inset: 0; background: rgba(0,0,0,.88); z-index: 2000; align-items: center; justify-content: center; }
.lb.show { display: flex; }
.lb img { max-width: 90vw; max-height: 85vh; border-radius: 12px; object-fit: contain; }
.lb-x { position: absolute; top: 20px; right: 24px; font-size: 2rem; color: rgba(255,255,255,.8); background: none; border: none; cursor: pointer; }
.lb-x:hover { color: #fff; }
.lb-cap { position: absolute; bottom: 28px; left: 50%; transform: translateX(-50%); color: rgba(255,255,255,.65); font-size: .85rem; white-space: nowrap; }

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

/* ── FOOTER ───────────────────────────────────────── */
footer { background: #0a1628; padding: 60px 0 28px; }
.foot-inner { max-width: 1040px; margin: 0 auto; padding: 0 24px; }
footer h3 { font-family: 'Playfair Display', serif; color: #fff; font-size: 1.2rem; margin-bottom: 4px; }
.foot-since { color: rgba(255,255,255,.32); font-size: .68rem; letter-spacing: .12em; text-transform: uppercase; display: block; margin-bottom: 12px; }
.foot-desc  { font-size: .83rem; color: rgba(255,255,255,.46); line-height: 1.75; margin-bottom: 18px; }
.socials { display: flex; gap: 8px; }
.socials a {
  width: 36px; height: 36px; border-radius: 9px;
  background: rgba(255,255,255,.07); border: 1px solid rgba(255,255,255,.1);
  display: flex; align-items: center; justify-content: center;
  color: rgba(255,255,255,.5); font-size: .95rem; transition: all .2s;
}
.socials a:hover { background: #1e4dbf; border-color: #1e4dbf; color: #fff; }
footer h4 { font-size: .72rem; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; color: rgba(255,255,255,.32); margin-bottom: 16px; }
.foot-link { display: block; font-size: .83rem; color: rgba(255,255,255,.52); margin-bottom: 10px; transition: color .2s; }
.foot-link:hover { color: #fff; }
.foot-link i { margin-right: 6px; color: rgba(255,255,255,.3); }
.foot-copy { font-size: .78rem; color: rgba(255,255,255,.28); }

/* ── ANIMASI ──────────────────────────────────────── */
@keyframes fadeUp  { from { opacity: 0; transform: translateY(22px); } to { opacity: 1; transform: none; } }
@keyframes blink   { 0%, 100% { opacity: 1; } 50% { opacity: .3; } }
@keyframes scrollY { 0%, 100% { transform: translateX(-50%) translateY(0); } 50% { transform: translateX(-50%) translateY(8px); } }

/* ── RESPONSIF ────────────────────────────────────── */
@media (max-width: 991px) {
  .nav-menu { display: none; }
  .auth-desktop { display: none; }
  .burger-btn { display: flex; }
}
@media (max-width: 767px) {
  .navbar-main { padding: 0 16px; }
  .galeri-grid {
    grid-template-columns: repeat(2, 1fr);
    grid-auto-rows: unset;
    gap: 10px;
    padding: 0 16px;
  }
  .gitem, .gitem.tall {
    aspect-ratio: 1 / 1;
    grid-row: span 1;
    height: unset;
  }
  .gitem:last-child:nth-child(odd) {
    grid-column: span 2;
    aspect-ratio: 2 / 1;
  }
}
</style>
</head>
<body>

{{-- ══ NAVBAR ══ --}}
<nav class="navbar-main" id="navbar">
  <div class="nav-wrap">

    <a href="{{ route('beranda') }}" id="logo-link" class="d-flex align-items-center gap-2 me-4">
      <div class="logo-box">
        <img src="{{ asset('img/header.png') }}" alt="Logo Nirwana Tour & Travel">
      </div>
      <div class="logo-text">
        <strong>Nirwana</strong>
        <small>Tour &amp; Travel</small>
      </div>
    </a>

    <ul class="nav-menu">
      <li><a href="{{ route('beranda') }}" class="active">Beranda</a></li>
      <li><a href="{{ route('lyn') }}">Layanan</a></li>
      <li><a href="{{ route('tk') }}">Tentang Kami</a></li>
    </ul>

    <div class="ms-auto auth-desktop">
      @auth
        <div class="dropdown">
          <button class="btn btn-sm d-flex align-items-center gap-2 rounded-pill text-white"
            style="background:rgba(255,255,255,.1);border:1.5px solid rgba(255,255,255,.18);padding:5px 14px 5px 6px;"
            data-bs-toggle="dropdown">
            <div style="width:30px;height:30px;border-radius:50%;background:#c49a2a;color:#fff;font-weight:700;font-size:.82rem;display:flex;align-items:center;justify-content:center;">
              {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
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

    {{-- Tombol burger hanya tampil di HP (≤991px) --}}
    <button class="burger-btn" id="burgerBtn" aria-label="Buka menu">
      <i class="bi bi-list" id="burgerIcon"></i>
    </button>

  </div>
</nav>

{{-- ══ MOBILE MENU ══ --}}
<div class="mobile-menu" id="mobileMenu">
  <a href="{{ route('beranda') }}" class="active"><i class="bi bi-house-fill"></i> Beranda</a>
  <a href="{{ route('lyn') }}"><i class="bi bi-compass-fill"></i> Layanan</a>
  <a href="{{ route('tk') }}"><i class="bi bi-building"></i> Tentang Kami</a>
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
<section class="hero">
  <video class="hero-video" autoplay muted loop playsinline>
    <source src="{{ asset('img/video.mp4') }}" type="video/mp4">
  </video>
  <div class="hero-overlay"></div>
  <div class="hero-blob"></div>

  <div class="hero-body">
    <div class="hero-badge">
      <span class="dot"></span>
      Perjalanan Terpercaya Sejak 2005
    </div>
    <h1>Wujudkan Perjalanan<br><em>Impian Anda</em> Bersama Kami</h1>
    <p>
      Nirwana Tour &amp; Travel hadir sebagai mitra perjalanan Anda, dari umroh, haji,
      hingga wisata nusantara dan mancanegara. Aman, nyaman, dan berkesan.
    </p>
    <div class="hero-btns">
      {{-- PERUBAHAN: Lihat Paket sekarang pakai btn-ghost (putih), Hubungi Kami pakai btn-wa (hijau) --}}
      <a href="https://wa.me/6282324246645" target="_blank" rel="noopener" class="btn-wa">
        <i class="bi bi-whatsapp"></i> Hubungi Kami
      </a>
      <a href="{{ route('lyn') }}" class="btn-ghost">
        <i class="bi bi-compass"></i> Lihat Paket
      </a>
    </div>
  </div>

  <div class="scroll-hint">
    <div class="scroll-hint-line"></div>
    Scroll
  </div>
</section>


{{-- ══ STATS BAR ══ --}}
<section class="stats">
  <div class="container">
    <div class="row g-0">
      <div class="col-6 col-md-3 stat-item">
        <p class="stat-num">19+</p>
        <p class="stat-lbl">Tahun Pengalaman</p>
      </div>
      <div class="col-6 col-md-3 stat-item">
        <p class="stat-num">12K+</p>
        <p class="stat-lbl">Jamaah Diberangkatkan</p>
      </div>
      <div class="col-6 col-md-3 stat-item">
        <p class="stat-num">98%</p>
        <p class="stat-lbl">Kepuasan Pelanggan</p>
      </div>
      <div class="col-6 col-md-3 stat-item">
        <p class="stat-num">50+</p>
        <p class="stat-lbl">Destinasi Tersedia</p>
      </div>
    </div>
  </div>
</section>


{{-- ══ CTA ATAS ══ --}}
<section class="cta-top">
  <div class="container" style="max-width:680px;">
    <span class="pill">Konsultasi Gratis</span>
    <h2>Siap Membantu Perjalanan Anda</h2>
    <p>
      Tim kami siap menjawab pertanyaan, membantu memilih paket yang tepat,
      dan memastikan perjalanan Anda berjalan lancar dari awal hingga akhir.
    </p>
    <a href="https://wa.me/6282324246645?text={{ urlencode('Halo, saya ingin konsultasi paket wisata.') }}"
       target="_blank" rel="noopener" class="btn-wa">
      <i class="bi bi-whatsapp"></i> Chat WhatsApp Sekarang
    </a>
  </div>
</section>


{{-- ══ KEUNGGULAN ══ --}}
<section class="keunggulan">
  <div class="container" style="max-width:1100px;">
    <div class="text-center mb-5">
      <span class="sec-label">Mengapa Kami</span>
      <h2 class="sec-title">6 Alasan Memilih Nirwana</h2>
      <p class="sec-sub">Kepercayaan Anda adalah prioritas utama kami dalam setiap perjalanan.</p>
    </div>
    <div class="row g-4">

      <div class="col-12 col-sm-6 col-lg-4">
        <div class="k-card">
          <div class="k-icon" style="background:#eef2ff;color:#1e4dbf;"><i class="bi bi-patch-check-fill"></i></div>
          <h5>Berizin Resmi Kemenag</h5>
          <p>Terdaftar resmi di Kementerian Agama RI sebagai penyelenggara umroh dan haji khusus berlisensi.</p>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-4">
        <div class="k-card">
          <div class="k-icon" style="background:#fff4cc;color:#b07d00;"><i class="bi bi-people-fill"></i></div>
          <h5>Pembimbing Berpengalaman</h5>
          <p>Didampingi pembimbing ibadah bersertifikat dengan pengalaman lebih dari 10 tahun di Tanah Suci.</p>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-4">
        <div class="k-card">
          <div class="k-icon" style="background:#d9f5ea;color:#1a6640;"><i class="bi bi-currency-dollar"></i></div>
          <h5>Harga Transparan</h5>
          <p>Tidak ada biaya tersembunyi. Semua sudah termasuk dalam harga paket yang tertera jelas dan pasti.</p>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-4">
        <div class="k-card">
          <div class="k-icon" style="background:#fce8e8;color:#c0392b;"><i class="bi bi-heart-fill"></i></div>
          <h5>Pelayanan Sepenuh Hati</h5>
          <p>Kami melayani seperti keluarga, dari pendaftaran hingga kepulangan, selalu ada tim yang siap membantu.</p>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-4">
        <div class="k-card">
          <div class="k-icon" style="background:#e8f0fe;color:#1a56db;"><i class="bi bi-geo-alt-fill"></i></div>
          <h5>Hotel Strategis</h5>
          <p>Akomodasi dipilih dengan teliti serta dekat Masjidil Haram dan Masjid Nabawi untuk kemudahan ibadah.</p>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-4">
        <div class="k-card">
          <div class="k-icon" style="background:#f0f4ff;color:#1e4dbf;"><i class="bi bi-shield-check"></i></div>
          <h5>Asuransi Perjalanan</h5>
          <p>Setiap jamaah dilindungi asuransi perjalanan resmi sehingga perjalanan lebih aman dan tenang.</p>
        </div>
      </div>

    </div>
  </div>
</section>


{{-- ══ GALERI ══ --}}
<section class="galeri">
  <div class="text-center mb-5">
    <span class="sec-label">Galeri</span>
    <h2 class="sec-title">Kenangan Perjalanan Kami</h2>
    <p class="sec-sub">Sekilas momen indah dari perjalanan para jamaah dan wisatawan bersama Nirwana.</p>
  </div>

  <div class="galeri-grid">
    <div class="gitem tall" onclick="bukaLb(this)">
      <img src="{{ asset('img/g1.jpeg') }}" alt="Galeri 1" loading="lazy">
      <div class="gitem-ov"><i class="bi bi-zoom-in"></i></div>
    </div>
    <div class="gitem" onclick="bukaLb(this)">
      <img src="{{ asset('img/g2.jpeg') }}" alt="Galeri 2" loading="lazy">
      <div class="gitem-ov"><i class="bi bi-zoom-in"></i></div>
    </div>
    <div class="gitem" onclick="bukaLb(this)">
      <img src="{{ asset('img/g3.jpeg') }}" alt="Galeri 3" loading="lazy">
      <div class="gitem-ov"><i class="bi bi-zoom-in"></i></div>
    </div>
    <div class="gitem" onclick="bukaLb(this)">
      <img src="{{ asset('img/g4.jpeg') }}" alt="Galeri 4" loading="lazy">
      <div class="gitem-ov"><i class="bi bi-zoom-in"></i></div>
    </div>
    <div class="gitem" onclick="bukaLb(this)">
      <img src="{{ asset('img/g5.jpeg') }}" alt="Galeri 5" loading="lazy">
      <div class="gitem-ov"><i class="bi bi-zoom-in"></i></div>
    </div>
  </div>
</section>

{{-- Lightbox --}}
<div class="lb" id="lightbox">
  <button class="lb-x" onclick="tutupLb()">&times;</button>
  <img id="lb-img" src="" alt="">
  <p class="lb-cap" id="lb-cap"></p>
</div>


{{-- ══ CTA BAWAH ══ --}}
<section class="cta-bot">
  <div class="container" style="max-width:640px;position:relative;z-index:1;">
    <span class="gold-pill">Paket Terlengkap</span>
    <h2>Temukan Paket Wisata yang Tepat untuk Anda</h2>
    <p>
      Kami menyediakan berbagai pilihan paket umroh, haji, wisata lokal, dan mancanegara
      dengan harga terbaik dan layanan profesional.
    </p>
    <a href="{{ route('lyn') }}" class="btn-white">
      <i class="bi bi-compass"></i> Lihat Semua Paket
    </a>
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
          <a href="https://www.instagram.com/nirwanatourtravels" target="_blank" rel="noopener" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
          <a href="https://www.facebook.com/NirwanaTourTravel" target="_blank" rel="noopener" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
          <a href="https://wa.me/6282324246645" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
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
        <a href="mailto:nirwanatourtravels@gmail.com" class="foot-link"><i class="bi bi-envelope"></i>nirwanatourtravels@gmail.com</a>
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
  // ── Navbar berubah warna saat scroll ──────────────────────
  window.addEventListener('scroll', function () {
    document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 40);
  });

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

  // ── Lightbox galeri ───────────────────────────────────────
  function bukaLb(el) {
    document.getElementById('lb-img').src = el.querySelector('img').src;
    document.getElementById('lb-cap').textContent = el.querySelector('img').alt;
    document.getElementById('lightbox').classList.add('show');
  }
  function tutupLb() {
    document.getElementById('lightbox').classList.remove('show');
  }
  document.getElementById('lightbox').addEventListener('click', function (e) {
    if (e.target === this) tutupLb();
  });

  // ── Double-klik logo → admin (tersembunyi) ────────────────
  document.getElementById('logo-link').addEventListener('dblclick', function (e) {
    e.preventDefault();
    window.location.href = '/admin';
  });
</script>
</body>
</html>