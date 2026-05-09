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
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body { font-family: 'Plus Jakarta Sans', sans-serif; color: #111827; background: #f5f2ec; }
a { text-decoration: none; }

/* NAVBAR */
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

/* BURGER */
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

/* MOBILE MENU */
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

/* WRAPPER UTAMA */
.halaman { padding-top: 68px; padding-bottom: 80px; }
.wrap { max-width: 720px; margin: 0 auto; padding: 28px 16px 0; }

/* HEADER PAKET */
.header-paket { background: #fff; border-radius: 16px; overflow: hidden; margin-bottom: 12px; }
.header-foto { width: 100%; height: 220px; object-fit: cover; display: block; }
.header-foto-placeholder {
  width: 100%; height: 220px;
  background: linear-gradient(145deg, #0a1628, #0e2d5e);
  display: flex; align-items: center; justify-content: center;
  color: rgba(255,255,255,.2); font-size: 3rem;
}
.header-info { padding: 20px 20px 16px; }
.crumb { font-size: .75rem; color: #9baac8; margin-bottom: 10px; }
.crumb a { color: #6b7a90; }
.crumb a:hover { color: #0c1d3a; }

/* Badge jenis */
.badge-jenis { display: inline-block; padding: 3px 10px; border-radius: 6px; font-size: .7rem; font-weight: 700; margin-bottom: 8px; }
.jenis-religi { background: #fff4cc; color: #7a5800; }
.jenis-lokal  { background: #d9f5ea; color: #1a6640; }
.jenis-manca  { background: #ddeeff; color: #0a3d80; }

.nama-paket { font-family: 'Playfair Display', serif; font-size: 1.5rem; color: #0c1d3a; font-weight: 700; margin-bottom: 10px; line-height: 1.25; }

/* Pills info */
.pills { display: flex; flex-wrap: wrap; gap: 6px; margin-bottom: 12px; }
.pill {
  display: inline-flex; align-items: center; gap: 5px;
  background: #f0f4ff; border: 1px solid #c9d4ec;
  color: #1e4dbf; font-size: .75rem; font-weight: 600;
  padding: 4px 10px; border-radius: 50px;
}
.pill i { font-size: .78rem; }

.deskripsi-singkat { font-size: .88rem; color: #6b7a90; line-height: 1.75; }

/* SEKSI KONTEN */
.seksi {
  background: #fff; border-radius: 14px;
  padding: 18px 20px; margin-bottom: 12px;
}
.seksi-judul {
  display: flex; align-items: center; gap: 8px;
  font-size: .88rem; font-weight: 700; color: #0c1d3a;
  margin-bottom: 14px; padding-bottom: 10px;
  border-bottom: 1px solid #f0f2f8;
}
.seksi-judul i { color: #1e4dbf; font-size: .95rem; }

/* Deskripsi lengkap */
.teks-deskripsi { font-size: .87rem; color: #4b5563; line-height: 1.85; }

/* Keunggulan */
.list-keunggulan { list-style: none; padding: 0; margin: 0; }
.list-keunggulan li {
  display: flex; align-items: flex-start; gap: 9px;
  font-size: .85rem; color: #374151; line-height: 1.6;
  padding: 7px 0; border-bottom: 1px solid #f5f5f5;
}
.list-keunggulan li:last-child { border-bottom: none; padding-bottom: 0; }
.list-keunggulan li i { color: #1fa563; margin-top: 2px; flex-shrink: 0; }

/* Fasilitas */
.list-fasilitas { list-style: none; padding: 0; margin: 0; display: flex; flex-wrap: wrap; gap: 8px; }
.list-fasilitas li {
  display: flex; align-items: center; gap: 6px;
  background: #f0f4ff; border: 1px solid #c9d4ec;
  padding: 5px 12px; border-radius: 50px;
  font-size: .8rem; color: #1e4dbf; font-weight: 500;
}

/* Syarat — CSS counter */
.list-syarat { list-style: none; padding: 0; margin: 0; counter-reset: no; }
.list-syarat li {
  counter-increment: no;
  display: flex; align-items: flex-start; gap: 10px;
  font-size: .85rem; color: #374151; line-height: 1.6;
  padding: 8px 0; border-bottom: 1px solid #f5f5f5;
}
.list-syarat li:last-child { border-bottom: none; }
.list-syarat li::before {
  content: counter(no);
  min-width: 22px; height: 22px; border-radius: 50%;
  background: #0c1d3a; color: #fff;
  font-size: .68rem; font-weight: 700;
  display: flex; align-items: center; justify-content: center; flex-shrink: 0;
}

/* Itinerary */
.timeline { position: relative; padding-left: 36px; }
.timeline::before { content: ''; position: absolute; left: 10px; top: 0; bottom: 0; width: 2px; background: #e4e9f5; }
.timeline-item { position: relative; margin-bottom: 18px; }
.timeline-item:last-child { margin-bottom: 0; }
.timeline-dot {
  position: absolute; left: -26px; top: 3px;
  width: 20px; height: 20px; border-radius: 50%;
  background: #1e4dbf; color: #fff;
  font-size: .62rem; font-weight: 700;
  display: flex; align-items: center; justify-content: center;
}
.timeline-label { font-size: .7rem; font-weight: 700; color: #1e4dbf; text-transform: uppercase; letter-spacing: .07em; margin-bottom: 3px; }
.timeline-desc  { font-size: .85rem; color: #4b5563; line-height: 1.7; }

/* STICKY BOTTOM BAR */
.bottom-bar {
  position: fixed; bottom: 0; left: 0; right: 0; z-index: 990;
  background: #fff; border-top: 1px solid #dde3ee;
  padding: 12px 20px;
  display: flex; align-items: center; justify-content: space-between; gap: 12px;
}
.bottom-harga { flex: 1; }
.bottom-harga small { display: block; font-size: .65rem; color: #9baac8; text-transform: uppercase; letter-spacing: .07em; margin-bottom: 1px; }
.bottom-harga strong { font-size: 1.25rem; font-weight: 800; color: #e8400c; }
.bottom-harga span { font-size: .72rem; color: #8a9bc0; font-weight: 400; }
.btn-pesan {
  display: inline-flex; align-items: center; gap: 7px;
  background: #1fa563; color: #fff; font-weight: 700; font-size: .88rem;
  padding: 12px 22px; border-radius: 12px; transition: background .2s;
  white-space: nowrap;
}
.btn-pesan:hover { background: #18935a; color: #fff; }
.btn-kembali-top {
  display: inline-flex; align-items: center; gap: 6px;
  color: #6b7a90; font-size: .82rem; font-weight: 500;
  margin-top: 4px; transition: color .2s;
}
.btn-kembali-top:hover { color: #0c1d3a; }

/* FOOTER */
footer { background: #0a1628; padding: 52px 0 24px; }
.foot-inner { max-width: 1040px; margin: 0 auto; padding: 0 24px; }
footer h3 { font-family: 'Playfair Display', serif; color: #fff; font-size: 1.1rem; margin-bottom: 4px; }
.foot-since { color: rgba(255,255,255,.32); font-size: .65rem; letter-spacing: .12em; text-transform: uppercase; display: block; margin-bottom: 10px; }
.foot-desc  { font-size: .82rem; color: rgba(255,255,255,.45); line-height: 1.75; margin-bottom: 16px; }
.socials { display: flex; gap: 8px; }
.socials a { width: 34px; height: 34px; border-radius: 8px; background: rgba(255,255,255,.07); border: 1px solid rgba(255,255,255,.1); display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,.5); font-size: .9rem; transition: all .2s; }
.socials a:hover { background: #1e4dbf; border-color: #1e4dbf; color: #fff; }
footer h4 { font-size: .68rem; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; color: rgba(255,255,255,.3); margin-bottom: 14px; }
.foot-link { display: block; font-size: .82rem; color: rgba(255,255,255,.5); margin-bottom: 9px; transition: color .2s; }
.foot-link:hover { color: #fff; }
.foot-link i { margin-right: 6px; color: rgba(255,255,255,.3); }
.foot-copy { font-size: .75rem; color: rgba(255,255,255,.25); }

/* RESPONSIF */
@media (max-width: 991px) {
  .nav-menu { display: none; }
  .auth-desktop { display: none; }
  .burger-btn { display: flex; }
}
@media (max-width: 575px) {
  .navbar-main { padding: 0 16px; }
  .header-foto, .header-foto-placeholder { height: 180px; }
  .nama-paket { font-size: 1.25rem; }
  .bottom-bar { padding: 10px 16px; }
}
</style>
</head>
<body>

{{-- NAVBAR --}}
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
      <li><a href="{{ route('lyn') }}" class="active">Layanan</a></li>
      <li><a href="{{ route('tk') }}">Tentang Kami</a></li>
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

    <button class="burger-btn" id="burgerBtn" aria-label="Buka menu">
      <i class="bi bi-list" id="burgerIcon"></i>
    </button>

  </div>
</nav>

{{-- MOBILE MENU --}}
<div class="mobile-menu" id="mobileMenu">
  <a href="{{ route('beranda') }}"><i class="bi bi-house-fill"></i> Beranda</a>
  <a href="{{ route('lyn') }}" class="active"><i class="bi bi-compass-fill"></i> Layanan</a>
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


{{-- KONTEN --}}
<div class="halaman">
  <div class="wrap">

    {{-- Header paket --}}
    <div class="header-paket">

      @if($paket->foto)
        <img src="{{ asset('storage/' . $paket->foto) }}" alt="{{ $paket->nama }}" class="header-foto">
      @else
        <div class="header-foto-placeholder"><i class="bi bi-image"></i></div>
      @endif

      <div class="header-info">
        <p class="crumb">
          <a href="{{ route('beranda') }}">Beranda</a> /
          <a href="{{ route('lyn') }}">Layanan</a> /
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

        <span class="badge-jenis {{ $jenisClass }}">{{ $paket->jenis_wisata }}</span>
        <h1 class="nama-paket">{{ $paket->nama }}</h1>

        <div class="pills">
          <span class="pill"><i class="bi bi-geo-alt-fill"></i> {{ $paket->lokasi }}</span>
          <span class="pill"><i class="bi bi-clock-fill"></i> {{ $paket->durasi }}</span>
        </div>

        @if($paket->p_singkat)
          <p class="deskripsi-singkat">{{ $paket->p_singkat }}</p>
        @endif
      </div>
    </div>

    {{-- Deskripsi Lengkap --}}
    @if($paket->deskripsi)
      <div class="seksi">
        <p class="seksi-judul"><i class="bi bi-file-text"></i> Deskripsi Lengkap</p>
        <div class="teks-deskripsi">{!! $paket->deskripsi !!}</div>
      </div>
    @endif

    {{-- Keunggulan Paket --}}
    @if($paket->keunggulanPaket->count() > 0)
      <div class="seksi">
        <p class="seksi-judul"><i class="bi bi-star"></i> Keunggulan Paket</p>
        <ul class="list-keunggulan">
          @foreach($paket->keunggulanPaket->sortBy('urutan') as $item)
            <li><i class="bi bi-check-circle-fill"></i> {{ $item->isi }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- Fasilitas --}}
    @if($paket->fasilitas->count() > 0)
      <div class="seksi">
        <p class="seksi-judul"><i class="bi bi-check2-circle"></i> Fasilitas</p>
        <ul class="list-fasilitas">
          @foreach($paket->fasilitas->sortBy('urutan') as $item)
            <li><i class="bi bi-check-lg"></i> {{ $item->nama }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- Itinerary --}}
    @if($paket->itinerary->count() > 0)
      <div class="seksi">
        <p class="seksi-judul"><i class="bi bi-calendar3"></i> Itinerary Perjalanan</p>
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

    {{-- Syarat & Ketentuan --}}
    @if($paket->syaratKetentuan->count() > 0)
      <div class="seksi">
        <p class="seksi-judul"><i class="bi bi-clipboard-check"></i> Syarat &amp; Ketentuan</p>
        <ul class="list-syarat">
          @foreach($paket->syaratKetentuan->sortBy('urutan') as $item)
            <li>{{ $item->isi }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- Tombol kembali --}}
    <a href="{{ route('lyn') }}" class="btn-kembali-top">
      <i class="bi bi-arrow-left"></i> Kembali ke Layanan
    </a>

  </div>
</div>


{{-- FOOTER --}}
<footer style="margin-bottom:72px;">
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
    <hr style="border-color:rgba(255,255,255,.07);margin:36px 0 18px;">
    <div class="d-flex flex-wrap justify-content-between gap-2">
      <p class="foot-copy mb-0">&copy; {{ date('Y') }} Nirwana Tour &amp; Travel. Hak cipta dilindungi.</p>
      <p class="foot-copy mb-0">Berizin resmi &mdash; Terdaftar Kemenparekraf</p>
    </div>
  </div>
</footer>


{{-- STICKY BOTTOM BAR --}}
<div class="bottom-bar">
  <div class="bottom-harga">
    <small>Harga per orang</small>
    <div>
      <strong>Rp {{ number_format($paket->harga, 0, ',', '.') }}</strong>
      <span>/ orang</span>
    </div>
  </div>
  <a href="https://wa.me/6282324246645?text={{ urlencode('Halo, saya ingin memesan paket ' . $paket->nama) }}"
     target="_blank" rel="noopener noreferrer" class="btn-pesan">
    <i class="bi bi-whatsapp"></i> Pesan Sekarang
  </a>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  var burgerBtn  = document.getElementById('burgerBtn');
  var mobileMenu = document.getElementById('mobileMenu');
  var burgerIcon = document.getElementById('burgerIcon');

  burgerBtn.addEventListener('click', function () {
    var buka = mobileMenu.classList.toggle('buka');
    burgerIcon.className = buka ? 'bi bi-x-lg' : 'bi bi-list';
  });

  mobileMenu.querySelectorAll('a').forEach(function (link) {
    link.addEventListener('click', function () {
      mobileMenu.classList.remove('buka');
      burgerIcon.className = 'bi bi-list';
    });
  });

  document.getElementById('logo-link').addEventListener('dblclick', function (e) {
    e.preventDefault();
    window.location.href = '/admin';
  });
</script>
</body>
</html>