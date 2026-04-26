<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tentang Kami — Nirwana Tour & Travel</title>

{{-- Font dan library yang sama dengan beranda --}}
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<style>
/* ================================================
   DASAR — reset dan font
   ================================================ */
* { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body { font-family: 'Plus Jakarta Sans', sans-serif; color: #111827; }
a { text-decoration: none; }

/* ================================================
   NAVBAR — sama persis dengan beranda.blade.php
   ================================================ */
.navbar-main {
  position: fixed; top: 0; left: 0; right: 0; z-index: 999;
  height: 68px; padding: 0 28px;
  display: flex; align-items: center;
  background: rgba(12,29,58,.95);
  backdrop-filter: blur(14px);
  box-shadow: 0 2px 20px rgba(0,0,0,.2);
}
.nav-wrap { width: 100%; max-width: 1180px; margin: 0 auto; display: flex; align-items: center; }

/* Bingkai kecil tempat logo dipasang.
   File logo asli ada di: public/img/logo.png */
.logo-box {
  width: 42px; height: 42px; border-radius: 10px;
  background: rgba(255,255,255,.12); border: 1px solid rgba(255,255,255,.22);
  display: flex; align-items: center; justify-content: center;
  overflow: hidden; padding: 4px;
}
/* Gambar logo menyesuaikan kotak, tidak gepeng walau rasio file beda */
.logo-box img {
  width: 100%; height: 100%;
  object-fit: contain;
  display: block;
}
.logo-text strong { font-family: 'Playfair Display', serif; color: #fff; font-size: 1.05rem; display: block; line-height: 1.1; }
.logo-text small  { color: rgba(255,255,255,.45); font-size: .6rem; letter-spacing: .1em; text-transform: uppercase; }
.nav-menu { display: flex; list-style: none; gap: 2px; margin: 0 auto; }
.nav-menu a {
  display: block; padding: 7px 13px;
  font-size: .87rem; font-weight: 500; color: rgba(255,255,255,.8);
  border-radius: 8px; transition: .2s;
}
.nav-menu a:hover, .nav-menu a.active { color: #fff; background: rgba(255,255,255,.1); }

/* Tombol hamburger & menu mobile */
.nav-ham { display: none; }
.mob-nav {
  display: none;
  position: fixed; top: 68px; left: 0; right: 0;
  background: rgba(12,29,58,.97); backdrop-filter: blur(16px);
  padding: 16px 22px 28px; z-index: 998;
}
.mob-nav a { display: block; padding: 12px 0; font-size: .93rem; color: rgba(255,255,255,.75); border-bottom: 1px solid rgba(255,255,255,.07); }
.mob-nav a:hover { color: #fff; }

/* Tombol umum */
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

/* ================================================
   HERO TENTANG KAMI
   Layout 2 kolom: teks kiri, kartu kanan
   ================================================ */
.hero-tk {
  min-height: 100vh; padding-top: 68px;
  background: linear-gradient(145deg, #0a1628 0%, #0c2447 45%, #0c1d3a 100%);
  display: flex; align-items: center; position: relative; overflow: hidden;
}
/* Dekorasi lingkaran biru di belakang */
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

/* Kolom kiri: teks */
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
.hero-left p {
  font-size: .95rem; color: rgba(255,255,255,.72);
  line-height: 1.8; margin-bottom: 14px;
}
.hero-btns { display: flex; gap: 12px; flex-wrap: wrap; margin-top: 32px; }

/* Kolom kanan: kartu info perusahaan */
.info-card {
  background: linear-gradient(135deg, #e8bf60 0%, #c49a2a 100%);
  border-radius: 24px; padding: 32px; position: relative; overflow: hidden;
}
.info-card::before {
  content: ''; position: absolute;
  top: -30px; right: -30px; width: 160px; height: 160px;
  border-radius: 50%; background: rgba(255,255,255,.1);
}
/* Kotak angka besar di pojok kanan atas */
.stat-badge {
  position: absolute; top: 24px; right: 24px;
  background: #0c1d3a; color: #fff;
  border-radius: 14px; padding: 12px 18px; text-align: center;
}
.stat-badge strong { display: block; font-family: 'Playfair Display', serif; font-size: 1.6rem; color: #e8bf60; line-height: 1; }
.stat-badge span { font-size: .7rem; color: rgba(255,255,255,.7); line-height: 1.3; display: block; max-width: 80px; }
/* Logo bulat di dalam kartu */
.card-logo {
  width: 64px; height: 64px; border-radius: 16px;
  background: rgba(255,255,255,.25); border: 2px solid rgba(255,255,255,.4);
  display: flex; align-items: center; justify-content: center;
  font-family: 'Playfair Display', serif; color: #fff;
  font-size: 1.8rem; font-weight: 700; margin-bottom: 80px;
}
/* Kotak putih kecil di bawah kartu */
.info-box {
  background: #fff; border-radius: 16px; padding: 20px 22px;
}
.info-box small {
  display: block; font-size: .65rem; font-weight: 700;
  letter-spacing: .12em; text-transform: uppercase; color: #e8bf60; margin-bottom: 8px;
}
.info-box strong { display: block; font-size: 1rem; font-weight: 700; color: #0c1d3a; margin-bottom: 6px; line-height: 1.3; }
.info-box p { font-size: .82rem; color: #6b7a90; line-height: 1.6; margin: 0; }

/* ================================================
   SECTION VISI & MISI
   ================================================ */
.sec { padding: 80px 0; }
.sec-alt { background: #f5f2ec; }
.sec-label { display: inline-block; background: #eef2ff; color: #1e4dbf; font-size: .69rem; font-weight: 700; letter-spacing: .11em; text-transform: uppercase; padding: 5px 14px; border-radius: 50px; margin-bottom: 14px; }
.sec-title { font-family: 'Playfair Display', serif; font-size: clamp(1.5rem, 3vw, 2rem); color: #0c1d3a; margin-bottom: 14px; }
.sec-sub { font-size: .93rem; color: #6b7a90; line-height: 1.78; }

/* Kartu Visi / Misi */
.vm-card {
  border-radius: 18px; padding: 32px 28px; height: 100%;
}
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
/* List misi pakai bullet ikon centang */
.misi-list { list-style: none; padding: 0; margin: 0; }
.misi-list li { display: flex; align-items: flex-start; gap: 10px; font-size: .88rem; color: #6b7a90; line-height: 1.65; margin-bottom: 10px; }
.misi-list li i { color: #1fa563; font-size: 1rem; margin-top: 1px; flex-shrink: 0; }

/* ================================================
   SECTION NILAI-NILAI KAMI (4 kotak)
   ================================================ */
.nilai-card {
  border-radius: 16px; padding: 28px 22px;
  background: #fff; border: 1.5px solid #dde3ee;
  height: 100%; transition: .25s;
}
.nilai-card:hover { transform: translateY(-4px); box-shadow: 0 14px 36px rgba(13,31,60,.1); border-color: #b8c6e0; }
.nilai-card .n-icon { width: 48px; height: 48px; border-radius: 13px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; margin-bottom: 14px; }
.nilai-card h5 { font-size: .93rem; font-weight: 700; color: #0c1d3a; margin-bottom: 7px; }
.nilai-card p { font-size: .82rem; color: #6b7a90; line-height: 1.7; margin: 0; }

/* ================================================
   CTA BAWAH — ajakan hubungi
   ================================================ */
.cta-bot {
  background: #0c1d3a; padding: 80px 0; text-align: center; position: relative; overflow: hidden;
}
.cta-bot::before {
  content: ''; position: absolute; top: -50%; right: -8%;
  width: 440px; height: 440px; border-radius: 50%;
  background: radial-gradient(circle, rgba(30,77,191,.2) 0%, transparent 68%);
}
.gold-pill { display: inline-block; background: rgba(255,255,255,.08); border: 1px solid rgba(255,255,255,.14); color: #e8bf60; font-size: .69rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; padding: 5px 14px; border-radius: 50px; margin-bottom: 18px; }
.cta-bot h2 { font-family: 'Playfair Display', serif; font-size: clamp(1.5rem, 3.2vw, 2.1rem); color: #fff; margin-bottom: 14px; }
.cta-bot p { font-size: .93rem; color: rgba(255,255,255,.67); line-height: 1.78; margin-bottom: 30px; }
.btn-white { display: inline-flex; align-items: center; gap: 8px; background: #fff; color: #0c1d3a; font-weight: 700; font-size: .9rem; padding: 13px 30px; border-radius: 50px; box-shadow: 0 6px 20px rgba(0,0,0,.22); transition: .2s; }
.btn-white:hover { background: #f5f2ec; color: #0c1d3a; transform: translateY(-2px); }

/* ================================================
   FOOTER — sama dengan beranda.blade.php
   ================================================ */
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

/* ================================================
   ANIMASI scroll reveal
   ================================================ */
.reveal { opacity: 0; transform: translateY(20px); transition: opacity .45s ease, transform .45s ease; }
.reveal.show { opacity: 1; transform: translateY(0); }

/* ================================================
   RESPONSIF
   ================================================ */
@media (max-width: 767px) {
  .nav-menu { display: none; }
  .nav-ham  { display: flex !important; }
  .hero-tk-inner { grid-template-columns: 1fr; gap: 32px; padding: 56px 20px; }
  .hero-right { order: -1; } /* kartu tampil di atas di HP */
}
@media (max-width: 480px) {
  .hero-btns { flex-direction: column; }
}
</style>
</head>
<body>

{{-- ================================================
     NAVBAR — sama dengan beranda.blade.php
     ================================================ --}}
<nav class="navbar-main">
  <div class="nav-wrap">

    {{-- Logo kiri.
         File logo asli ada di: public/img/logo.png
         Helper asset() otomatis menghasilkan URL absolut yang benar
         (misal: http://situsanda.test/img/logo.png) --}}
    <a href="{{ route('beranda') }}" class="d-flex align-items-center gap-2">
      <div class="logo-box">
        <img src="{{ asset('img/logo.png') }}" alt="Logo Nirwana Tour & Travel">
      </div>
      <div class="logo-text ms-1">
        <strong>Nirwana</strong>
        <small>Tour &amp; Travel</small>
      </div>
    </a>

    {{-- Link menu desktop --}}
    <ul class="nav-menu">
      <li><a href="{{ route('beranda') }}">Beranda</a></li>
      <li><a href="{{ route('lyn') }}">Layanan</a></li>
      <li><a href="{{ route('tk') }}" class="active">Tentang Kami</a></li>
    </ul>

    {{-- Tombol login / profil --}}
    @auth
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
          <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profil</a></li>
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
      <a href="{{ route('login') }}" class="btn-wa ms-3" style="font-size:.86rem;padding:8px 20px;">
        <i class="bi bi-person"></i> Masuk
      </a>
    @endauth

    {{-- Hamburger untuk HP --}}
    <button id="navHam" class="nav-ham" style="flex-direction:column;gap:5px;background:none;border:none;padding:4px;cursor:pointer;margin-left:auto;" aria-label="Menu">
      <span style="display:block;width:22px;height:2px;background:#fff;border-radius:2px;"></span>
      <span style="display:block;width:22px;height:2px;background:#fff;border-radius:2px;"></span>
      <span style="display:block;width:22px;height:2px;background:#fff;border-radius:2px;"></span>
    </button>

  </div>
</nav>

{{-- Menu mobile --}}
<div class="mob-nav" id="mobNav">
  <a href="{{ route('beranda') }}">Beranda</a>
  <a href="{{ route('lyn') }}">Layanan</a>
  <a href="{{ route('tk') }}">Tentang Kami</a>
  <a href="{{ route('beranda') }}#galeri">Galeri</a>
  <a href="{{ route('beranda') }}#kontak">Kontak</a>
  <div class="mt-4">
    @auth
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" style="background:none;border:none;color:rgba(255,255,255,.6);font-size:.92rem;padding:0;">
          Logout ({{ Auth::user()->name }})
        </button>
      </form>
    @else
      <a href="{{ route('login') }}" class="btn-wa d-flex justify-content-center mt-2">
        <i class="bi bi-person me-2"></i> Masuk ke Akun
      </a>
    @endauth
  </div>
</div>


{{-- ================================================
     HERO TENTANG KAMI
     Kiri: judul + deskripsi + 2 tombol
     Kanan: kartu info perusahaan
     ================================================ --}}
<section class="hero-tk">
  <div class="hero-tk-inner">

    {{-- Kolom kiri --}}
    <div class="hero-left">
      <div class="badge-tk"><i class="bi bi-building"></i> Tentang Kami</div>
      <h1>Kenali Lebih Dekat<br><em>Tentang Kami</em></h1>
      <p>Kami adalah perusahaan wisata yang berkomitmen memberikan pengalaman perjalanan yang nyaman, berkesan, dan terpercaya bagi setiap pelanggan kami.</p>
      <p>Tim profesional Nirwana Tour &amp; Travel hadir untuk membimbing setiap perjalanan Anda secara penuh, memastikan setiap detail tertangani dengan baik.</p>

      {{-- Dua tombol berdampingan sesuai permintaan --}}
      <div class="hero-btns">
        <a href="https://wa.me/6282324246645?text={{ urlencode('Halo, saya ingin konsultasi paket wisata Nirwana Tour & Travel.') }}"
           target="_blank" class="btn-wa">
          <i class="bi bi-whatsapp"></i> Konsultasi Sekarang
        </a>
        <a href="{{ route('lyn') }}" class="btn-ghost-dark" style="color:#fff;border-color:rgba(255,255,255,.35);">
          Lihat Paket Layanan
        </a>
      </div>
    </div>

    {{-- Kolom kanan: kartu kuning emas --}}
    <div class="hero-right">
      <div class="info-card">
        {{-- Angka besar di pojok kanan atas kartu --}}
        <div class="stat-badge">
          <strong>15K+</strong>
          <span>Wisatawan terlayani</span>
        </div>

        {{-- Logo bulat N di kiri atas --}}
        <div class="card-logo">N</div>

        {{-- Kotak putih berisi info singkat di bawah --}}
        <div class="info-box">
          <small>Nirwana Tour &amp; Travel</small>
          <strong>Pengalaman Terpercaya Sejak 2005</strong>
          <p>Lebih dari dua dekade melayani ribuan wisatawan dengan dedikasi penuh, teknologi modern, dan komitmen terhadap kepuasan pelanggan.</p>
        </div>
      </div>
    </div>

  </div>
</section>


{{-- ================================================
     VISI & MISI
     Dua kartu berdampingan: visi (gelap) & misi (terang)
     ================================================ --}}
<section class="sec">
  <div class="container" style="max-width:1040px;">
    <div class="text-center mb-5 reveal">
      <span class="sec-label">Arah & Tujuan</span>
      <h2 class="sec-title">Visi &amp; Misi Kami</h2>
      <p class="sec-sub">Komitmen kami dalam menghadirkan layanan wisata terbaik.</p>
    </div>

    <div class="row g-4">
      {{-- Kartu Visi --}}
      <div class="col-12 col-md-5 reveal">
        <div class="vm-card visi">
          <div class="vm-icon"><i class="bi bi-eye-fill"></i></div>
          <h3>Visi</h3>
          <p>Menjadi perusahaan wisata terpercaya, profesional, dan terdepan di Indonesia — yang menghadirkan pengalaman perjalanan tak terlupakan bagi setiap pelanggan.</p>
        </div>
      </div>

      {{-- Kartu Misi --}}
      <div class="col-12 col-md-7 reveal">
        <div class="vm-card misi">
          <div class="vm-icon"><i class="bi bi-flag-fill"></i></div>
          <h3>Misi</h3>
          <ul class="misi-list">
            <li><i class="bi bi-check-circle-fill"></i> Memberikan layanan wisata yang aman, nyaman, dan terpercaya.</li>
            <li><i class="bi bi-check-circle-fill"></i> Menyediakan paket perjalanan yang transparan dan kompetitif.</li>
            <li><i class="bi bi-check-circle-fill"></i> Membangun tim pemandu wisata profesional dan bersertifikat.</li>
            <li><i class="bi bi-check-circle-fill"></i> Mengutamakan kepuasan dan keselamatan setiap pelanggan.</li>
            <li><i class="bi bi-check-circle-fill"></i> Terus berinovasi untuk pengalaman perjalanan yang lebih baik.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>


{{-- ================================================
     NILAI-NILAI KAMI
     4 kartu kecil: transparansi, profesional, amanah, inovatif
     ================================================ --}}
<section class="sec sec-alt">
  <div class="container" style="max-width:1040px;">
    <div class="text-center mb-5 reveal">
      <span class="sec-label" style="background:#e8f5f0;color:#1fa563;">Nilai Kami</span>
      <h2 class="sec-title">Prinsip yang Kami Pegang</h2>
      <p class="sec-sub">Nilai-nilai ini yang menjadi fondasi setiap pelayanan kami.</p>
    </div>

    <div class="row g-4">
      {{-- Data kartu dalam array supaya lebih ringkas --}}
      @foreach([
        ['bi-shield-fill-check','#d9f5ea','#1fa563','Amanah',        'Setiap kepercayaan yang diberikan pelanggan kami jaga dengan sepenuh hati dan tanggung jawab penuh.'],
        ['bi-eye-fill',         '#dde9ff','#1e4dbf','Transparan',    'Tidak ada biaya tersembunyi. Semua informasi harga dan jadwal kami sampaikan secara jelas dan terbuka.'],
        ['bi-people-fill',      '#fdf3d0','#c49a2a','Profesional',   'Tim kami terlatih dan bersertifikat, siap memberikan pelayanan terbaik di setiap tahap perjalanan.'],
        ['bi-lightbulb-fill',   '#eef0f7','#4a5568','Inovatif',      'Kami terus berkembang mengikuti kebutuhan pelanggan dengan solusi layanan yang modern dan mudah.'],
      ] as [$icon, $bg, $color, $nama, $desc])
      <div class="col-12 col-sm-6 col-lg-3 reveal">
        <div class="nilai-card">
          <div class="n-icon" style="background:{{ $bg }};color:{{ $color }};"><i class="bi {{ $icon }}"></i></div>
          <h5>{{ $nama }}</h5>
          <p>{{ $desc }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ================================================
     CTA BAWAH — ajakan hubungi / lihat layanan
     ================================================ --}}
<section class="cta-bot">
  <div class="container position-relative" style="z-index:1;max-width:540px;">
    <span class="gold-pill">Mulai Perjalanan Anda</span>
    <h2>Siap Berwisata Bersama Kami?</h2>
    <p>Hubungi tim kami sekarang untuk konsultasi gratis dan temukan paket yang paling sesuai untuk Anda.</p>
    <div class="d-flex gap-3 justify-content-center flex-wrap">
      <a href="https://wa.me/6282324246645?text={{ urlencode('Halo, saya ingin konsultasi paket wisata Nirwana Tour & Travel.') }}"
         target="_blank" class="btn-wa">
        <i class="bi bi-whatsapp"></i> Hubungi via WhatsApp
      </a>
      <a href="{{ route('lyn') }}" class="btn-white">
        <i class="bi bi-compass-fill"></i> Lihat Semua Layanan
      </a>
    </div>
  </div>
</section>


{{-- ================================================
     FOOTER — sama dengan beranda.blade.php
     ================================================ --}}
<footer id="kontak">
  <div class="foot-inner">
    <div class="row g-5">
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
      <div class="col-6 col-md-3">
        <h4>Navigasi</h4>
        <a href="{{ route('beranda') }}" class="foot-link">Beranda</a>
        <a href="{{ route('lyn') }}"     class="foot-link">Layanan</a>
        <a href="{{ route('tk') }}"      class="foot-link">Tentang Kami</a>
        <a href="{{ route('beranda') }}#galeri" class="foot-link">Galeri</a>
      </div>
      <div class="col-6 col-md-4">
        <h4>Kontak</h4>
        <a href="tel:+6282324246645"           class="foot-link"><i class="bi bi-telephone me-1"></i>+62 823-2424-6645</a>
        <a href="https://wa.me/6282324246645"  class="foot-link" target="_blank"><i class="bi bi-whatsapp me-1"></i>+62 823-2424-6645</a>
        <a href="mailto:info@nirwanatravel.id"  class="foot-link"><i class="bi bi-envelope me-1"></i>info@nirwanatravel.id</a>
      </div>
    </div>
    <div class="foot-bottom">
      <p>&copy; {{ date('Y') }} Nirwana Tour &amp; Travel. Hak cipta dilindungi.</p>
      <p>Berizin resmi — Terdaftar Kemenparekraf</p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Hamburger menu buka/tutup
const ham = document.getElementById('navHam');
const mob = document.getElementById('mobNav');
if (ham) ham.addEventListener('click', () => mob.style.display = mob.style.display === 'block' ? 'none' : 'block');

// Scroll reveal: elemen muncul pelan saat masuk layar
const io = new IntersectionObserver(entries => {
  entries.forEach(e => {
    if (e.isIntersecting) { e.target.classList.add('show'); io.unobserve(e.target); }
  });
}, { threshold: 0.1 });
document.querySelectorAll('.reveal').forEach(el => io.observe(el));
</script>
</body>
</html>