<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nirwana Tour & Travel</title>

{{-- Google Fonts: Playfair Display untuk judul, Plus Jakarta Sans untuk teks biasa --}}
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

{{-- Bootstrap untuk layout grid dan komponen siap pakai --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

{{-- Bootstrap Icons untuk ikon-ikon di tombol dan kartu --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<style>
/* =============================================
   VARIABEL WARNA & FONT
   Disimpan di sini biar gampang diganti nanti
   ============================================= */
* { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; } /* efek scroll halus antar section */
body { font-family: 'Plus Jakarta Sans', sans-serif; color: #111827; }
a { text-decoration: none; }

/* =============================================
   NAVBAR (menu atas yang ikut scroll)
   ============================================= */
.navbar-main {
  position: fixed; top: 0; left: 0; right: 0; z-index: 999;
  height: 68px; padding: 0 28px;
  display: flex; align-items: center;
  transition: background .3s; /* animasi perubahan warna background */
}
/* Kelas ini ditambah lewat JavaScript saat user scroll ke bawah */
.navbar-main.scrolled {
  background: rgba(12,29,58,.95);
  backdrop-filter: blur(14px);
  box-shadow: 0 2px 20px rgba(0,0,0,.2);
}
.nav-wrap { width: 100%; max-width: 1180px; margin: 0 auto; display: flex; align-items: center; }

/* =============================================
   LOGO ASLI (file: public/img/logo.png)
   Kotak kecil sebagai bingkai supaya logo
   tetap rapi meskipun ukuran filenya berbeda
   ============================================= */
.logo-box {
    width: 42px; height: 42px; border-radius: 10px;
  background: rgba(255,255,255,.12); border: 1px solid rgba(255,255,255,.22);
  display: flex; align-items: center; justify-content: center;
  overflow: hidden; padding: 4px;
}
/* Gambar logo dipasang di dalam .logo-box, ukuran mengikuti container */
.logo-box img {
  width: 100%; height: 100%;
  object-fit: contain; /* logo tidak gepeng meskipun rasio file beda */
  display: block;
}
.logo-text strong { font-family: 'Playfair Display', serif; color: #fff; font-size: 1.05rem; display: block; line-height: 1.1; }
.logo-text small { color: rgba(255,255,255,.45); font-size: .6rem; letter-spacing: .1em; text-transform: uppercase; }

/* Link menu navigasi */
.nav-menu { display: flex; list-style: none; gap: 2px; margin: 0 auto; }
.nav-menu a {
  display: block; padding: 7px 13px;
  font-size: .87rem; font-weight: 500; color: rgba(255,255,255,.8);
  border-radius: 8px; transition: .2s;
}
.nav-menu a:hover,
.nav-menu a.active { color: #fff; background: rgba(255,255,255,.1); }

/* =============================================
   TOMBOL-TOMBOL (dipakai di banyak section)
   ============================================= */
/* Tombol hijau WhatsApp */
.btn-wa {
  display: inline-flex; align-items: center; gap: 8px;
  background: #1fa563; color: #fff; font-weight: 600; font-size: .9rem;
  padding: 13px 28px; border-radius: 50px;
  box-shadow: 0 5px 16px rgba(31,165,99,.35); transition: .2s;
}
.btn-wa:hover { background: #22bd72; color: #fff; transform: translateY(-2px); }

/* Tombol transparan dengan border putih */
.btn-ghost {
  display: inline-flex; align-items: center; gap: 8px;
  background: transparent; color: #fff; font-weight: 600; font-size: .9rem;
  padding: 13px 28px; border-radius: 50px;
  border: 2px solid rgba(255,255,255,.4); transition: .2s;
}
.btn-ghost:hover { background: rgba(255,255,255,.1); border-color: rgba(255,255,255,.7); color: #fff; transform: translateY(-2px); }

/* Tombol putih (dipakai di section CTA bawah) */
.btn-white {
  display: inline-flex; align-items: center; gap: 8px;
  background: #fff; color: #0c1d3a; font-weight: 700; font-size: .9rem;
  padding: 13px 30px; border-radius: 50px;
  box-shadow: 0 6px 20px rgba(0,0,0,.22); transition: .2s;
}
.btn-white:hover { background: #f5f2ec; color: #0c1d3a; transform: translateY(-2px); }

/* =============================================
   SECTION HERO (bagian pertama, layar penuh)
   Latar belakang berupa video (file: public/img/video.mp4)
   ============================================= */
.hero {
  min-height: 100vh; display: flex; align-items: center; justify-content: center;
  position: relative; overflow: hidden; text-align: center;
  background: #0c1d3a; /* warna fallback kalau video belum dimuat */
}

/* Video latar — menutupi seluruh hero, di belakang teks */
.hero-video {
  position: absolute; top: 0; left: 0;
  width: 100%; height: 100%;
  object-fit: cover; /* video di-crop supaya selalu menutupi area hero */
  z-index: 0;
}

/* Lapisan gelap di atas video supaya teks putih tetap terbaca jelas */
.hero-overlay {
  position: absolute; inset: 0; z-index: 1;
  background: linear-gradient(145deg,
    rgba(10,22,40,.78) 0%,
    rgba(12,36,71,.62) 40%,
    rgba(14,45,94,.55) 65%,
    rgba(12,29,58,.78) 100%);
}

/* Lingkaran biru samar di sudut kanan atas sebagai dekorasi */
.hero-blob {
  position: absolute; border-radius: 50%; pointer-events: none;
  background: radial-gradient(circle, rgba(30,77,191,.55) 0%, transparent 70%);
  width: 560px; height: 560px; top: -10%; right: -8%; opacity: .3;
  z-index: 1;
}
.hero-body { position: relative; z-index: 2; max-width: 700px; padding: 0 20px; }

/* Badge kecil di atas judul hero */
.hero-badge {
  display: inline-flex; align-items: center; gap: 8px;
  background: rgba(255,255,255,.1); border: 1px solid rgba(255,255,255,.2);
  color: rgba(255,255,255,.9); font-size: .74rem; font-weight: 600;
  letter-spacing: .1em; text-transform: uppercase;
  padding: 6px 16px; border-radius: 50px; margin-bottom: 24px;
  animation: fadeUp .65s ease both; /* muncul dari bawah saat halaman dibuka */
}
/* Titik kuning berkedip di dalam badge */
.dot { width: 6px; height: 6px; border-radius: 50%; background: #e8bf60; animation: blink 2s infinite; }

.hero h1 {
  font-family: 'Playfair Display', serif;
  font-size: clamp(2rem, 5.5vw, 3.4rem); /* ukuran font responsif */
  color: #fff; line-height: 1.1; margin-bottom: 20px;
  animation: fadeUp .65s .15s ease both;
  text-shadow: 0 2px 18px rgba(0,0,0,.35); /* sedikit bayangan supaya kontras dengan video */
}
.hero h1 em { font-style: italic; color: #e8bf60; } /* kata emas di judul */
.hero p {
  font-size: clamp(.88rem, 1.7vw, .97rem);
  color: rgba(255,255,255,.85); line-height: 1.8;
  max-width: 490px; margin: 0 auto 32px;
  animation: fadeUp .65s .28s ease both;
  text-shadow: 0 1px 10px rgba(0,0,0,.3);
}
.hero-btns { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; animation: fadeUp .65s .4s ease both; }

/* Indikator scroll di pojok bawah tengah */
.scroll-hint {
  position: absolute; bottom: 28px; left: 50%; transform: translateX(-50%);
  display: flex; flex-direction: column; align-items: center; gap: 5px;
  color: rgba(255,255,255,.55); font-size: .68rem; letter-spacing: .1em; text-transform: uppercase;
  animation: scrollY 2.2s ease-in-out infinite;
  z-index: 2;
}
.scroll-hint-line { width: 1px; height: 28px; background: linear-gradient(to bottom, rgba(255,255,255,.55), transparent); }

/* =============================================
   STATS BAR (angka-angka pencapaian)
   ============================================= */
.stats { background: #0c1d3a; padding: 36px 0; }
.stat-item { text-align: center; }
.stat-item + .stat-item { border-left: 1px solid rgba(255,255,255,.1); } /* garis pemisah antar angka */
.stat-num { font-family: 'Playfair Display', serif; font-size: 2rem; color: #e8bf60; line-height: 1; margin-bottom: 4px; }
.stat-lbl { font-size: .78rem; color: rgba(255,255,255,.5); }

/* =============================================
   SECTION CTA ATAS (ajakan hubungi di tengah halaman)
   ============================================= */
.cta-top { background: #f5f2ec; border-bottom: 1px solid #dde3ee; padding: 64px 0; text-align: center; }
.pill { display: inline-block; background: #e8edf8; color: #163060; font-size: .69rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; padding: 5px 14px; border-radius: 50px; margin-bottom: 14px; }
.cta-top h2 { font-family: 'Playfair Display', serif; font-size: clamp(1.35rem, 2.8vw, 1.9rem); color: #0c1d3a; margin-bottom: 12px; }
.cta-top p { font-size: .93rem; color: #6b7a90; line-height: 1.78; margin-bottom: 28px; }

/* =============================================
   SECTION KEUNGGULAN (6 kartu alasan memilih kami)
   ============================================= */
.keunggulan { padding: 88px 0; background: #fff; }
.sec-label { display: inline-block; background: #eef2ff; color: #1e4dbf; font-size: .69rem; font-weight: 700; letter-spacing: .11em; text-transform: uppercase; padding: 5px 14px; border-radius: 50px; margin-bottom: 14px; }
.sec-title { font-family: 'Playfair Display', serif; font-size: clamp(1.5rem, 3.2vw, 2.1rem); color: #0c1d3a; margin-bottom: 12px; }
.sec-sub { font-size: .93rem; color: #6b7a90; max-width: 480px; margin: 0 auto; line-height: 1.78; }

/* Kartu keunggulan */
.k-card {
  background: #f5f2ec; border: 1px solid #dde3ee; border-radius: 16px;
  padding: 28px 22px; height: 100%; position: relative; overflow: hidden; transition: .25s;
}
/* Garis tipis di atas kartu, muncul saat hover */
.k-card::before {
  content: ''; position: absolute; top: 0; left: 0; right: 0;
  height: 3px; background: transparent; transition: .25s;
}
.k-card:hover { background: #fff; transform: translateY(-5px); box-shadow: 0 16px 40px rgba(13,31,60,.12); }
.k-card:hover::before { background: #1e4dbf; }

/* Kotak ikon di kartu keunggulan */
.k-icon { width: 50px; height: 50px; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; margin-bottom: 16px; }
.k-card h5 { font-size: .93rem; font-weight: 700; color: #0c1d3a; margin-bottom: 8px; }
.k-card p { font-size: .83rem; color: #6b7a90; line-height: 1.7; margin: 0; }

/* =============================================
   SECTION GALERI (foto-foto perjalanan)
   ============================================= */
.galeri { padding: 88px 0; background: #f5f2ec; }
/* Grid foto dengan ukuran baris otomatis */
.galeri-grid {
  display: grid; grid-template-columns: repeat(3, 1fr);
  grid-auto-rows: 220px; gap: 14px;
  max-width: 1040px; margin: 0 auto; padding: 0 20px;
}
.gitem { overflow: hidden; border-radius: 16px; position: relative; background: #ccc; cursor: pointer; }
.gitem.tall { grid-row: span 2; } /* foto pertama lebih tinggi, makan 2 baris */
.gitem img { width: 100%; height: 100%; object-fit: cover; transition: transform .45s; }
.gitem:hover img { transform: scale(1.06); } /* zoom saat hover */

/* Overlay gelap + ikon zoom saat hover */
.gitem-ov {
  position: absolute; inset: 0; border-radius: 16px;
  background: rgba(12,29,58,.4); display: flex; align-items: center; justify-content: center;
  opacity: 0; transition: .3s;
}
.gitem:hover .gitem-ov { opacity: 1; }
.gitem-ov i { font-size: 1.8rem; color: rgba(255,255,255,.9); }

/* =============================================
   LIGHTBOX (tampilan foto fullscreen saat diklik)
   ============================================= */
.lb { display: none; position: fixed; inset: 0; background: rgba(0,0,0,.88); z-index: 2000; align-items: center; justify-content: center; }
.lb.show { display: flex; } /* ditampilkan lewat JavaScript */
.lb img { max-width: 90vw; max-height: 85vh; border-radius: 12px; object-fit: contain; }
.lb-x { position: absolute; top: 20px; right: 24px; font-size: 2rem; color: rgba(255,255,255,.8); background: none; border: none; cursor: pointer; }
.lb-x:hover { color: #fff; }
.lb-cap { position: absolute; bottom: 28px; left: 50%; transform: translateX(-50%); color: rgba(255,255,255,.65); font-size: .85rem; white-space: nowrap; }

/* =============================================
   SECTION CTA BAWAH (ajakan lihat layanan)
   ============================================= */
.cta-bot { background: #0c1d3a; padding: 80px 0; text-align: center; position: relative; overflow: hidden; }
/* Lingkaran dekorasi di kiri atas section ini */
.cta-bot::before {
  content: ''; position: absolute; top: -50%; left: -8%;
  width: 440px; height: 440px; border-radius: 50%;
  background: radial-gradient(circle, rgba(30,77,191,.2) 0%, transparent 68%);
}
.gold-pill { display: inline-block; background: rgba(255,255,255,.08); border: 1px solid rgba(255,255,255,.14); color: #e8bf60; font-size: .69rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; padding: 5px 14px; border-radius: 50px; margin-bottom: 18px; }
.cta-bot h2 { font-family: 'Playfair Display', serif; font-size: clamp(1.5rem, 3.2vw, 2.1rem); color: #fff; margin-bottom: 14px; }
.cta-bot p { font-size: .93rem; color: rgba(255,255,255,.67); line-height: 1.78; margin-bottom: 30px; }

/* =============================================
   FOOTER
   ============================================= */
footer { background: #0a1628; padding: 56px 0 28px; }
.foot-inner { max-width: 1040px; margin: 0 auto; padding: 0 20px; }
footer h3 { font-family: 'Playfair Display', serif; color: #fff; font-size: 1.18rem; margin-bottom: 4px; }
footer .since { color: rgba(255,255,255,.35); font-size: .69rem; letter-spacing: .12em; text-transform: uppercase; display: block; margin-bottom: 12px; }
footer .desc { font-size: .83rem; color: rgba(255,255,255,.47); line-height: 1.72; margin-bottom: 16px; }
.socials { display: flex; gap: 8px; }
.socials a { width: 34px; height: 34px; border-radius: 8px; background: rgba(255,255,255,.06); display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,.55); font-size: .95rem; transition: .2s; }
.socials a:hover { background: #1e4dbf; color: #fff; }
footer h4 { font-size: .73rem; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; color: rgba(255,255,255,.35); margin-bottom: 14px; }
.foot-link { display: block; font-size: .83rem; color: rgba(255,255,255,.55); margin-bottom: 9px; transition: color .2s; }
.foot-link:hover { color: #fff; }
.foot-bottom { border-top: 1px solid rgba(255,255,255,.06); padding-top: 22px; margin-top: 44px; display: flex; justify-content: space-between; flex-wrap: wrap; gap: 8px; }
.foot-bottom p { font-size: .78rem; color: rgba(255,255,255,.3); }

/* =============================================
   ANIMASI
   ============================================= */
@keyframes fadeUp { from { opacity: 0; transform: translateY(24px); } to { opacity: 1; transform: translateY(0); } }
@keyframes blink   { 0%, 100% { opacity: 1; } 50% { opacity: .3; } }
@keyframes scrollY { 0%, 100% { transform: translateX(-50%) translateY(0); } 50% { transform: translateX(-50%) translateY(8px); } }

/* =============================================
   MENU MOBILE
   Disembunyikan secara default, ditampilkan JS
   ============================================= */
/* Tombol hamburger disembunyikan di desktop */
.nav-ham { display: none; }

/* Menu mobile selalu tersembunyi dulu, JS yang buka */
.mob-nav {
  display: none;
  position: fixed; top: 68px; left: 0; right: 0;
  background: rgba(12,29,58,.97); backdrop-filter: blur(16px);
  padding: 16px 22px 28px; z-index: 998;
}
.mob-nav a { display: block; padding: 12px 0; font-size: .93rem; color: rgba(255,255,255,.75); border-bottom: 1px solid rgba(255,255,255,.07); }
.mob-nav a:hover { color: #fff; }

/* =============================================
   RESPONSIF (tampilan di HP dan tablet)
   ============================================= */
@media (max-width: 991px) {
  .galeri-grid { grid-template-columns: repeat(2, 1fr); }
  .gitem.tall { grid-row: span 1; }
}
@media (max-width: 767px) {
  .nav-menu { display: none; }         /* sembunyikan menu link desktop */
  .nav-ham  { display: flex !important; } /* tampilkan tombol hamburger */
  .stat-item + .stat-item { border-left: none; }
  .galeri-grid { grid-template-columns: 1fr 1fr; grid-auto-rows: 170px; }
}
@media (max-width: 480px) {
  .hero-btns { flex-direction: column; align-items: center; }
  .galeri-grid { grid-template-columns: 1fr; grid-auto-rows: 220px; }
}
</style>
</head>
<body>

{{-- ============================================
     NAVBAR
     Menu atas yang tetap kelihatan saat scroll
     ============================================ --}}
<nav class="navbar-main" id="mainNav">
  <div class="nav-wrap">

    {{-- Logo kiri.
         File logo asli ada di: public/img/logo.png
         Helper asset() otomatis menghasilkan URL absolut yang benar
         (misal: http://situsanda.test/img/logo.png) --}}
    <a href="{{ route('beranda') }}" class="d-flex align-items-center gap-2">
      <div class="logo-box">
        <img src="{{ asset('img/logo.png') }}" alt="Logo Nirwana Tour & Travel">
      </div>
      <div class="logo-text">
        <strong>Nirwana</strong>
        <small>Tour &amp; Travel</small>
      </div>
    </a>

    {{-- Link menu (desktop) --}}
    <ul class="nav-menu">
      <li><a href="{{ route('beranda') }}" class="{{ request()->routeIs('beranda') ? 'active' : '' }}">Beranda</a></li>
      <li><a href="{{ route('lyn') }}"     class="{{ request()->routeIs('lyn')     ? 'active' : '' }}">Layanan</a></li>
      <li><a href="{{ route('tk') }}"      class="{{ request()->routeIs('tk')      ? 'active' : '' }}">Tentang Kami</a></li>
    </ul>

    {{-- Tombol login / profil user --}}
    @auth
      {{-- Jika sudah login: tampilkan avatar + dropdown --}}
      <div class="dropdown ms-3">
        <button class="btn btn-sm d-flex align-items-center gap-2 rounded-pill text-white"
          style="background:rgba(255,255,255,.1);border:1.5px solid rgba(255,255,255,.2)"
          data-bs-toggle="dropdown">
          <div style="width:30px;height:30px;border-radius:50%;background:#c49a2a;color:#fff;font-weight:700;font-size:.82rem;display:flex;align-items:center;justify-content:center;">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
          </div>
          <span style="font-size:.82rem;font-weight:600;">{{ Auth::user()->name }}</span>
          <i class="bi bi-chevron-down" style="font-size:.6rem;"></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-end mt-2 rounded-3 shadow-lg" style="min-width:180px;">
          <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i class="bi bi-person me-2"></i>Profil</a></li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="dropdown-item text-danger">
                <i class="bi bi-box-arrow-right me-2"></i>Logout
              </button>
            </form>
          </li>
        </ul>
      </div>
    @else
      {{-- Jika belum login: tampilkan tombol Masuk --}}
      <a href="{{ route('login') }}" class="btn-wa ms-3" style="font-size:.86rem;padding:8px 20px;">
        <i class="bi bi-person"></i> Masuk
      </a>
    @endauth

    {{-- Tombol hamburger (muncul di HP, class nav-ham dikontrol CSS responsive) --}}
    <button id="navHam" class="nav-ham" style="flex-direction:column;gap:5px;background:none;border:none;padding:4px;cursor:pointer;margin-left:auto;" aria-label="Menu">
      <span style="display:block;width:22px;height:2px;background:#fff;border-radius:2px;"></span>
      <span style="display:block;width:22px;height:2px;background:#fff;border-radius:2px;"></span>
      <span style="display:block;width:22px;height:2px;background:#fff;border-radius:2px;"></span>
    </button>

  </div>
</nav>

{{-- Menu mobile (muncul saat hamburger diklik) --}}
<div class="mob-nav" id="mobNav">
  <a href="{{ route('beranda') }}">Beranda</a>
  <a href="{{ route('lyn') }}">Layanan</a>
  <a href="{{ route('tk') }}">Tentang Kami</a>
  <a href="#galeri">Galeri</a>
  <a href="#kontak">Kontak</a>
  <div class="mt-4">
    @auth
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" style="background:none;border:none;color:rgba(255,255,255,.6);font-size:.92rem;padding:0;">
          Logout ({{ Auth::user()->name }})
        </button>
      </form>
    @else
      <a href="{{ route('login') }}" class="btn-wa d-flex justify-content-center">
        <i class="bi bi-person me-2"></i> Masuk ke Akun
      </a>
    @endauth
  </div>
</div>


{{-- ============================================
     HERO
     Bagian pembuka halaman, layar penuh,
     dengan video sebagai latar belakang.
     File video ada di: public/img/video.mp4
     ============================================ --}}
<section class="hero" id="beranda">

  {{-- Video latar belakang.
       autoplay  = otomatis main saat halaman dibuka
       muted     = tanpa suara (wajib supaya autoplay diizinkan browser)
       loop      = diputar berulang
       playsinline = main inline di HP, tidak fullscreen otomatis
       preload="auto" = browser mulai memuat video sejak awal --}}
  <video class="hero-video" autoplay muted loop playsinline preload="auto"
         poster="{{ asset('img/logo.png') }}">
    <source src="{{ asset('img/video.mp4') }}" type="video/mp4">
    {{-- Pesan cadangan kalau browser tidak mendukung tag video --}}
    Browser Anda tidak mendukung pemutaran video.
  </video>

  {{-- Lapisan gelap di atas video supaya teks tetap terbaca --}}
  <div class="hero-overlay"></div>

  <div class="hero-blob"></div> {{-- dekorasi lingkaran biru --}}

  <div class="hero-body">
    <div class="hero-badge">
      <span class="dot"></span>
      Layanan Wisata Profesional &amp; Terpercaya
    </div>

    <h1>Perjalanan Impian Anda<br><em>Dimulai di Sini</em></h1>

    <p>Dari paket lokal hingga mancanegara — kami hadir dengan layanan penuh untuk kenyamanan Anda dan keluarga, sejak 2005.</p>

    <div class="hero-btns">
      <a href="https://wa.me/6282324246645?text={{ urlencode('Halo, saya ingin info paket wisata Nirwana Tour & Travel.') }}"
         target="_blank" class="btn-wa">
        <i class="bi bi-whatsapp"></i> Konsultasi Gratis
      </a>
      <a href="{{ route('lyn') }}" class="btn-ghost">Lihat Layanan</a>
    </div>
  </div>

  {{-- Indikator scroll kecil di bawah --}}
  <div class="scroll-hint">
    <div class="scroll-hint-line"></div>
    Scroll
  </div>
</section>


{{-- ============================================
     STATS BAR
     4 angka pencapaian perusahaan
     ============================================ --}}
<div class="stats">
  <div class="container" style="max-width:960px;">
    <div class="row g-0">
      {{-- Loop 4 angka sekaligus, lebih hemat dari nulis satu-satu --}}
      @foreach([['20+','Tahun Berpengalaman'],['15K+','Wisatawan Terlayani'],['8','Jenis Layanan'],['24/7','Dukungan Pelanggan']] as $s)
      <div class="col-6 col-md-3 stat-item py-1">
        <div class="stat-num">{{ $s[0] }}</div>
        <div class="stat-lbl">{{ $s[1] }}</div>
      </div>
      @endforeach
    </div>
  </div>
</div>


{{-- ============================================
     CTA HUBUNGI
     Ajakan kontak di tengah halaman
     ============================================ --}}
<div class="cta-top">
  <div class="container" style="max-width:580px;">
    <span class="pill">Langkah Pertama</span>
    <h2>Wujudkan Perjalanan Impian Anda Bersama Kami</h2>
    <p>Nikmati layanan wisata profesional, aman, dan terpercaya — dari paket lokal hingga mancanegara, semua hadir untuk kenyamanan Anda dan keluarga.</p>
    <a href="https://wa.me/6282324246645?text={{ urlencode('Halo, saya ingin info lebih lanjut tentang paket wisata Nirwana Tour & Travel.') }}"
       target="_blank" class="btn-wa">
      <i class="bi bi-whatsapp"></i> Hubungi via WhatsApp
    </a>
  </div>
</div>


{{-- ============================================
     KEUNGGULAN
     6 kartu alasan kenapa pilih Nirwana Travel
     ============================================ --}}
<section class="keunggulan" id="keunggulan">
  <div class="container">
    <div class="text-center mb-5">
      <span class="sec-label">Mengapa Kami</span>
      <h2 class="sec-title">Keunggulan Nirwana Tour &amp; Travel</h2>
      <p class="sec-sub">Lebih dari sekadar perjalanan — kami menghadirkan pengalaman yang aman, nyaman, dan penuh kenangan.</p>
    </div>

    <div class="row g-4" style="max-width:1040px;margin:0 auto;">
      {{-- Data kartu disimpan dalam array, lalu di-loop --}}
      {{-- Format: [ikon, warna bg, warna ikon, judul, deskripsi] --}}
      @foreach([
        ['bi-patch-check-fill', '#dde9ff', '#1e4dbf', 'Berizin Resmi & Terpercaya',       'Terdaftar dan berizin resmi sehingga setiap perjalanan Anda terjamin secara hukum dan profesional.'],
        ['bi-shield-fill-check','#d9f5ea', '#1fa563', 'Jaminan Keberangkatan 100%',        'Setiap pemesanan dijamin berangkat sesuai jadwal yang telah disepakati, tanpa khawatir pembatalan sepihak.'],
        ['bi-star-fill',        '#fdf3d0', '#c49a2a', 'Berpengalaman Sejak 2005',          'Lebih dari dua dekade melayani ribuan wisatawan dengan dedikasi penuh dan rekam jejak yang solid.'],
        ['bi-people-fill',      '#dce4f3', '#163060', 'Pemandu Wisata Bersertifikat',      'Tim guide kami terlatih, berpengalaman, dan ramah — siap mendampingi setiap langkah perjalanan Anda.'],
        ['bi-wallet2',          '#fdeedd', '#a0672a', 'Harga Transparan & Kompetitif',     'Tidak ada biaya tersembunyi. Kami menawarkan harga terbaik dengan paket yang fleksibel sesuai kebutuhan.'],
        ['bi-headset',          '#eef0f7', '#4a5568', 'Layanan Pelanggan 24 Jam',          'Tim kami siap membantu kapan saja, sebelum, selama, maupun setelah perjalanan Anda berlangsung.'],
      ] as [$icon, $bg, $color, $judul, $desc])
      <div class="col-12 col-sm-6 col-lg-4 reveal">
        <div class="k-card">
          <div class="k-icon" style="background:{{ $bg }};color:{{ $color }};"><i class="bi {{ $icon }}"></i></div>
          <h5>{{ $judul }}</h5>
          <p>{{ $desc }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>


{{-- ============================================
     GALERI
     Grid foto dokumentasi perjalanan
     ============================================ --}}
<section class="galeri" id="galeri">
  <div class="container">
    <div class="text-center mb-5">
      <span class="sec-label" style="background:#e8f5f0;color:#1fa563;">Galeri</span>
      <h2 class="sec-title">Dokumentasi Perjalanan</h2>
      <p class="sec-sub">Dokumentasi perjalanan ibadah jamaah selama berada di Tanah Suci.</p>
    </div>
  </div>

  <div class="galeri-grid">
    {{-- foto pertama pakai class "tall" supaya lebih tinggi (span 2 baris) --}}
    @foreach([
      ['img/galeri/foto1.jpg', "Jamaah di depan Ka'bah Masjidil Haram", true],
      ['img/galeri/foto2.jpg', 'Grup Umroh di Madinah',                 false],
      ['img/galeri/foto3.jpg', 'Masjid Nabawi Madinah',                 false],
      ['img/galeri/foto4.jpg', 'Panorama Tanah Suci',                   false],
      ['img/galeri/foto5.jpg', 'Langit senja Arab Saudi',               false],
      ['img/galeri/foto6.jpg', 'Jamaah foto bersama di Tanah Suci',     false],
    ] as [$src, $alt, $tall])
    <div class="gitem {{ $tall ? 'tall' : '' }}" onclick="openLb('{{ asset($src) }}','{{ $alt }}')">
      <img src="{{ asset($src) }}" alt="{{ $alt }}" loading="lazy">
      <div class="gitem-ov"><i class="bi bi-zoom-in"></i></div>
    </div>
    @endforeach
  </div>
</section>

{{-- Lightbox: muncul saat foto diklik, tutup saat klik background atau tombol × --}}
<div class="lb" id="lb" onclick="if(event.target===this)closeLb()">
  <button class="lb-x" onclick="closeLb()">&times;</button>
  <img src="" id="lbImg" alt="">
  <div class="lb-cap" id="lbCap"></div>
</div>


{{-- ============================================
     CTA LAYANAN
     Ajakan lihat semua paket di bagian bawah
     ============================================ --}}
<section class="cta-bot">
  <div class="container position-relative" style="z-index:1;max-width:540px;">
    <span class="gold-pill">Eksplorasi Lebih Lanjut</span>
    <h2>Temukan Paket Perjalanan yang Tepat untuk Anda</h2>
    <p>Lihat jadwal keberangkatan terdekat dan pilih layanan yang sesuai dengan kebutuhan Anda.</p>
    <a href="{{ route('lyn') }}" class="btn-white">
      <i class="bi bi-compass-fill"></i> Lihat Semua Layanan
    </a>
  </div>
</section>


{{-- ============================================
     FOOTER
     Informasi kontak dan navigasi di bawah halaman
     ============================================ --}}
<footer id="kontak">
  <div class="foot-inner">
    <div class="row g-5">

      {{-- Kolom kiri: deskripsi singkat + sosial media --}}
      <div class="col-12 col-md-5">
        <h3>Nirwana Tour &amp; Travel</h3>
        <span class="since">Since 2005</span>
        <p class="desc">Mitra perjalanan terpercaya Anda. Kami menghadirkan pengalaman wisata tak terlupakan dengan layanan profesional dan harga transparan.</p>
        <div class="socials">
          <a href="#"                          aria-label="Instagram"><i class="bi bi-instagram"></i></a>
          <a href="#"                          aria-label="Facebook"><i class="bi bi-facebook"></i></a>
          <a href="https://wa.me/6282324246645" aria-label="WhatsApp" target="_blank"><i class="bi bi-whatsapp"></i></a>
          <a href="#"                          aria-label="YouTube"><i class="bi bi-youtube"></i></a>
        </div>
      </div>

      {{-- Kolom tengah: link navigasi --}}
      <div class="col-6 col-md-3">
        <h4>Navigasi</h4>
        <a href="{{ route('beranda') }}" class="foot-link">Beranda</a>
        <a href="{{ route('lyn') }}"     class="foot-link">Layanan</a>
        <a href="{{ route('tk') }}"      class="foot-link">Tentang Kami</a>
        <a href="#galeri"                class="foot-link">Galeri</a>
      </div>

      {{-- Kolom kanan: info kontak --}}
      <div class="col-6 col-md-4">
        <h4>Kontak</h4>
        <a href="tel:+6282324246645"          class="foot-link"><i class="bi bi-telephone me-1"></i>+62 823-2424-6645</a>
        <a href="https://wa.me/6282324246645" class="foot-link" target="_blank"><i class="bi bi-whatsapp me-1"></i>+62 823-2424-6645</a>
        <a href="mailto:info@nirwanatravel.id" class="foot-link"><i class="bi bi-envelope me-1"></i>info@nirwanatravel.id</a>
      </div>

    </div>

    {{-- Baris paling bawah: copyright --}}
    <div class="foot-bottom">
      <p>&copy; {{ date('Y') }} Nirwana Tour &amp; Travel. Hak cipta dilindungi.</p>
      <p>Berizin resmi — Terdaftar Kemenparekraf</p>
    </div>
  </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Navbar: tambah class "scrolled" saat user scroll lebih dari 56px
const nav = document.getElementById('mainNav');
window.addEventListener('scroll', () => nav.classList.toggle('scrolled', scrollY > 56), { passive: true });
nav.classList.toggle('scrolled', scrollY > 56);

// Hamburger: tampilkan/sembunyikan menu mobile saat diklik
const ham = document.getElementById('navHam');
const mob = document.getElementById('mobNav');
if (ham) ham.addEventListener('click', () => mob.style.display = mob.style.display === 'block' ? 'none' : 'block');

// Scroll reveal: elemen muncul pelan saat masuk area tampilan layar
if ('IntersectionObserver' in window) {
  const els = document.querySelectorAll('.reveal .k-card, .stat-item, .gitem');
  els.forEach((el, i) => Object.assign(el.style, {
    opacity: 0,
    transform: 'translateY(20px)',
    transition: `opacity .4s ${i * .07}s ease, transform .4s ${i * .07}s ease`
  }));
  const io = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.style.opacity = 1;
        e.target.style.transform = 'translateY(0)';
        io.unobserve(e.target); // berhenti observe setelah muncul
      }
    });
  }, { threshold: 0.12 });
  els.forEach(el => io.observe(el));
}

// Lightbox: buka foto fullscreen
function openLb(src, alt) {
  document.getElementById('lbImg').src = src;
  document.getElementById('lbCap').textContent = alt;
  document.getElementById('lb').classList.add('show');
  document.body.style.overflow = 'hidden'; // matikan scroll background
}
// Tutup lightbox
function closeLb() {
  document.getElementById('lb').classList.remove('show');
  document.body.style.overflow = '';
}
// Tutup lightbox saat tekan tombol Escape
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeLb(); });
</script>
</body>
</html>