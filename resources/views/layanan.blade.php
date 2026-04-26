<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Layanan — Nirwana Tour &amp; Travel</title>

{{-- Google Fonts: Playfair Display untuk judul, Plus Jakarta Sans untuk teks --}}
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

{{-- Bootstrap 5 untuk grid + komponen siap pakai --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

{{-- Bootstrap Icons untuk ikon-ikon kecil --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<style>
/* ============================================
   RESET & DASAR
   Disamakan dengan beranda.blade.php
   ============================================ */
* { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body { font-family: 'Plus Jakarta Sans', sans-serif; color: #111827; background: #fff; }
a { text-decoration: none; }

/* ============================================
   NAVBAR (sama persis dengan beranda)
   ============================================ */
.navbar-main {
  position: fixed; top: 0; left: 0; right: 0; z-index: 999;
  height: 68px; padding: 0 28px;
  display: flex; align-items: center;
  background: rgba(12,29,58,.95); backdrop-filter: blur(14px);
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
  display: block; padding: 7px 13px; font-size: .87rem; font-weight: 500;
  color: rgba(255,255,255,.8); border-radius: 8px; transition: .2s;
}
.nav-menu a:hover, .nav-menu a.active { color: #fff; background: rgba(255,255,255,.1); }

/* ============================================
   TOMBOL (samakan style dengan beranda)
   ============================================ */
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
.btn-ghost:hover { background: rgba(255,255,255,.1); border-color: rgba(255,255,255,.7); color: #fff; }

/* ============================================
   HERO HALAMAN LAYANAN (mirip hero beranda, lebih ringkas)
   ============================================ */
.hero-lyn {
  padding: 130px 20px 70px; text-align: center; position: relative; overflow: hidden;
  background: linear-gradient(145deg, #0a1628 0%, #0c2447 40%, #0e2d5e 65%, #0c1d3a 100%);
}
.hero-lyn::before {
  content: ''; position: absolute; top: -10%; right: -8%;
  width: 480px; height: 480px; border-radius: 50%; pointer-events: none;
  background: radial-gradient(circle, rgba(30,77,191,.55) 0%, transparent 70%);
  opacity: .3;
}
.hero-lyn-body { position: relative; z-index: 1; max-width: 720px; margin: 0 auto; }
.hero-badge {
  display: inline-flex; align-items: center; gap: 8px;
  background: rgba(255,255,255,.1); border: 1px solid rgba(255,255,255,.2);
  color: rgba(255,255,255,.9); font-size: .74rem; font-weight: 600;
  letter-spacing: .1em; text-transform: uppercase;
  padding: 6px 16px; border-radius: 50px; margin-bottom: 20px;
}
.dot { width: 6px; height: 6px; border-radius: 50%; background: #e8bf60; animation: blink 2s infinite; }
.hero-lyn h1 {
  font-family: 'Playfair Display', serif; color: #fff;
  font-size: clamp(1.8rem, 4.5vw, 2.8rem); line-height: 1.15; margin-bottom: 14px;
}
.hero-lyn h1 em { font-style: italic; color: #e8bf60; }
.hero-lyn p {
  color: rgba(255,255,255,.72); font-size: .95rem; line-height: 1.78;
  max-width: 540px; margin: 0 auto 8px;
}
.crumb { color: rgba(255,255,255,.55); font-size: .8rem; margin-bottom: 14px; }
.crumb a { color: rgba(255,255,255,.7); }
.crumb a:hover { color: #e8bf60; }

/* ============================================
   LABEL & JUDUL SECTION (samakan dengan beranda)
   ============================================ */
.sec-label { display: inline-block; background: #eef2ff; color: #1e4dbf; font-size: .69rem; font-weight: 700; letter-spacing: .11em; text-transform: uppercase; padding: 5px 14px; border-radius: 50px; margin-bottom: 14px; }
.sec-title { font-family: 'Playfair Display', serif; font-size: clamp(1.5rem, 3.2vw, 2.1rem); color: #0c1d3a; margin-bottom: 12px; }
.sec-sub   { font-size: .93rem; color: #6b7a90; max-width: 520px; margin: 0 auto; line-height: 1.78; }

/* ============================================
   KARTU PAKET (gaya selaras dengan kartu keunggulan beranda)
   ============================================ */
.kartu-paket {
  background: #fff; border: 1px solid #dde3ee; border-radius: 16px;
  overflow: hidden; height: 100%; transition: .25s; position: relative;
  display: flex; flex-direction: column;
}
.kartu-paket:hover {
  transform: translateY(-5px);
  box-shadow: 0 16px 40px rgba(13,31,60,.12);
  border-color: #c9d4ec;
}
.kartu-paket .thumb { position: relative; overflow: hidden; }
.kartu-paket .thumb img { width: 100%; height: 180px; object-fit: cover; transition: transform .4s; }
.kartu-paket:hover .thumb img { transform: scale(1.05); }

/* Badge lokasi (kiri atas foto) */
.badge-lokasi {
  position: absolute; top: 10px; left: 10px;
  background: rgba(12,29,58,.85); color: #fff;
  padding: 5px 11px; border-radius: 50px;
  font-size: .7rem; font-weight: 600;
  display: inline-flex; align-items: center; gap: 4px;
}
/* Badge diskon (kanan bawah foto) */
.badge-diskon {
  position: absolute; bottom: 10px; right: 10px;
  background: #e8bf60; color: #0c1d3a;
  padding: 4px 10px; border-radius: 6px;
  font-size: .7rem; font-weight: 700;
}

.kartu-paket .isi { padding: 18px; flex: 1; display: flex; flex-direction: column; }
.kartu-paket .judul-paket { font-size: .95rem; font-weight: 700; color: #0c1d3a; margin-bottom: 8px; min-height: 44px; line-height: 1.4; }
.kartu-paket .rating { color: #1e4dbf; font-size: .82rem; font-weight: 700; }
.kartu-paket .ulasan { color: #8a9bc0; font-size: .78rem; }
.kartu-paket .harga-coret { color: #aab3c4; font-size: .8rem; text-decoration: line-through; }
.kartu-paket .harga { color: #e8400c; font-size: 1.1rem; font-weight: 700; margin-top: auto; }
.kartu-paket .harga small { color: #6b7a90; font-weight: 500; font-size: .72rem; }

.kartu-paket .aksi { padding: 0 18px 18px; }
.btn-pesan-kartu {
  display: flex; align-items: center; justify-content: center; gap: 6px;
  width: 100%; padding: 9px; border-radius: 10px;
  background: #1fa563; color: #fff; font-size: .82rem; font-weight: 600;
  transition: .2s;
}
.btn-pesan-kartu:hover { background: #22bd72; color: #fff; }

.link-kartu { color: inherit; }
.link-kartu:hover { color: inherit; }

/* ============================================
   TABEL JADWAL KEBERANGKATAN
   ============================================ */
.tbl-jadwal { background: #fff; border: 1px solid #dde3ee; border-radius: 16px; overflow: hidden; }
.tbl-jadwal table { margin: 0; }
.tbl-jadwal thead th {
  background: #0c1d3a; color: #fff; font-size: .78rem;
  font-weight: 600; letter-spacing: .04em; padding: 14px 18px; border: none;
}
.tbl-jadwal tbody td { font-size: .87rem; padding: 14px 18px; vertical-align: middle; color: #2a3a55; border-bottom: 1px solid #f0f3f8; }
.tbl-jadwal tbody tr:last-child td { border-bottom: none; }
.tbl-jadwal tbody tr:hover { background: #fafbfd; }
.kursi-banyak { background: #d9f5ea; color: #1fa563; }
.kursi-sedikit { background: #fde8e3; color: #d94a1c; }
.tbl-jadwal .badge { font-size: .72rem; font-weight: 700; padding: 5px 10px; border-radius: 50px; }
.btn-daftar {
  display: inline-flex; align-items: center; gap: 5px;
  background: #1fa563; color: #fff; font-size: .76rem; font-weight: 600;
  padding: 7px 14px; border-radius: 50px;
}
.btn-daftar:hover { background: #22bd72; color: #fff; }

/* ============================================
   FOOTER (sama dengan beranda)
   ============================================ */
footer { background: #0a1628; padding: 56px 0 28px; }
.foot-inner { max-width: 1040px; margin: 0 auto; padding: 0 20px; }
footer h3 { font-family: 'Playfair Display', serif; color: #fff; font-size: 1.18rem; margin-bottom: 4px; }
footer .since { color: rgba(255,255,255,.35); font-size: .69rem; letter-spacing: .12em; text-transform: uppercase; display: block; margin-bottom: 12px; }
footer .desc  { font-size: .83rem; color: rgba(255,255,255,.47); line-height: 1.72; margin-bottom: 16px; }
.socials { display: flex; gap: 8px; }
.socials a { width: 34px; height: 34px; border-radius: 8px; background: rgba(255,255,255,.06); display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,.55); font-size: .95rem; transition: .2s; }
.socials a:hover { background: #1e4dbf; color: #fff; }
footer h4 { font-size: .73rem; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; color: rgba(255,255,255,.35); margin-bottom: 14px; }
.foot-link { display: block; font-size: .83rem; color: rgba(255,255,255,.55); margin-bottom: 9px; transition: color .2s; }
.foot-link:hover { color: #fff; }
.foot-bottom { border-top: 1px solid rgba(255,255,255,.06); padding-top: 22px; margin-top: 44px; display: flex; justify-content: space-between; flex-wrap: wrap; gap: 8px; }
.foot-bottom p { font-size: .78rem; color: rgba(255,255,255,.3); }

/* ============================================
   ANIMASI & TARGET SCROLL
   ============================================ */
@keyframes blink { 0%, 100% { opacity: 1; } 50% { opacity: .3; } }
#paket, #jadwal { scroll-margin-top: 90px; }

/* ============================================
   RESPONSIF
   ============================================ */
@media (max-width: 767px) {
  .nav-menu { display: none; }
  .hero-lyn { padding: 110px 20px 50px; }
}
</style>
</head>
<body>

{{-- ========================================
     NAVBAR
     Dipakai sama persis seperti beranda
     ======================================== --}}
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
      <div class="logo-text">
        <strong>Nirwana</strong>
        <small>Tour &amp; Travel</small>
      </div>
    </a>

    {{-- Menu tengah --}}
    <ul class="nav-menu">
      <li><a href="{{ route('beranda') }}">Beranda</a></li>
      <li><a href="{{ route('lyn') }}" class="active">Layanan</a></li>
      <li><a href="{{ route('tk') }}">Tentang Kami</a></li>
    </ul>

    {{-- Tombol login / akun (sama dengan beranda) --}}
    @auth
      <div class="dropdown ms-3">
        <button class="btn btn-sm d-flex align-items-center gap-2 rounded-pill text-white"
          style="background:rgba(255,255,255,.1);border:1.5px solid rgba(255,255,255,.2)"
          data-bs-toggle="dropdown">
          <div style="width:30px;height:30px;border-radius:50%;background:#c49a2a;color:#fff;font-weight:700;font-size:.82rem;display:flex;align-items:center;justify-content:center;">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
          </div>
          <span style="font-size:.82rem;font-weight:600;">{{ Auth::user()->name }}</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end mt-2 rounded-3 shadow-lg" style="min-width:180px;">
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

  </div>
</nav>


{{-- ========================================
     HERO LAYANAN
     Dipakai untuk pembuka halaman, gaya gelap
     menyatu dengan tema beranda
     ======================================== --}}
<section class="hero-lyn">
  <div class="hero-lyn-body">
    <p class="crumb">
      <a href="{{ route('beranda') }}">Beranda</a> / Layanan
    </p>

    <div class="hero-badge">
      <span class="dot"></span>
      Pilih Paket Sesuai Kebutuhan
    </div>

    <h1>Jelajahi <em>Paket Wisata</em> Kami</h1>
    <p>Dari umroh, haji, hingga wisata domestik &amp; mancanegara — semua paket dikelola langsung oleh tim Nirwana Tour &amp; Travel.</p>
  </div>
</section>


{{-- ========================================
     JENIS-JENIS LAYANAN
     Loop kartu paket dari array $paket
     supaya tidak menulis berulang
     ======================================== --}}
<section class="py-5" id="paket" style="background:#f5f2ec;">
  <div class="container" style="max-width:1100px;">

    {{-- Judul section --}}
    <div class="text-center mb-5">
      <span class="sec-label">Layanan</span>
      <h2 class="sec-title">Jenis-Jenis Layanan</h2>
      <p class="sec-sub">Klik kartu untuk melihat detail paket lebih lengkap.</p>
    </div>

    {{-- Data paket disimpan dalam array satu kali, lalu di-loop.
         Field penting:
           id     → dipakai untuk link ke halaman detailtk
           lokasi → ditampilkan pada badge kiri atas
           diskon → tampil di kanan bawah foto (boleh kosong)
           harga_coret → harga sebelum diskon (boleh kosong) --}}
    @php
      $paket = [
        ['id'=>1,'judul'=>'Paket Umroh Ekonomi 9 Hari',     'lokasi'=>'Makkah',       'img'=>'img/paket/umroh-ekonomi.jpg','rating'=>'9.1/10','ulasan'=>'4.2k','harga_coret'=>'Rp 25.000.000','harga'=>'Rp 22.500.000','satuan'=>'/ orang','diskon'=>'Save 10%'],
        ['id'=>2,'judul'=>'Paket Umroh Plus 12 Hari',       'lokasi'=>'Madinah',      'img'=>'img/paket/umroh-plus.jpg',   'rating'=>'9.4/10','ulasan'=>'3.8k','harga_coret'=>'Rp 32.000.000','harga'=>'Rp 28.900.000','satuan'=>'/ orang','diskon'=>'Save 10%'],
        ['id'=>3,'judul'=>'Umroh Premium Bintang 5',        'lokasi'=>'Makkah',       'img'=>'img/paket/umroh-premium.jpg','rating'=>'9.7/10','ulasan'=>'2.1k','harga_coret'=>'',              'harga'=>'Rp 35.000.000','satuan'=>'/ orang','diskon'=>''],
        ['id'=>4,'judul'=>'Paket Haji Plus 26 Hari',        'lokasi'=>'Makkah',       'img'=>'img/paket/haji-plus.jpg',    'rating'=>'9.6/10','ulasan'=>'1.5k','harga_coret'=>'Rp 175.000.000','harga'=>'Rp 155.000.000','satuan'=>'/ orang','diskon'=>'Save 11%'],
        ['id'=>5,'judul'=>'Wisata Bali 4D3N All Inclusive', 'lokasi'=>'Bali',         'img'=>'img/paket/bali.jpg',         'rating'=>'9.2/10','ulasan'=>'11.4k','harga_coret'=>'Rp 4.200.000', 'harga'=>'Rp 3.500.000','satuan'=>'/ orang','diskon'=>'Save 17%'],
        ['id'=>6,'judul'=>'Wisata Yogyakarta 3D2N',         'lokasi'=>'Yogyakarta',   'img'=>'img/paket/yogya.jpg',        'rating'=>'9.0/10','ulasan'=>'8.7k','harga_coret'=>'',              'harga'=>'Rp 2.800.000','satuan'=>'/ orang','diskon'=>''],
        ['id'=>7,'judul'=>'Wisata Labuan Bajo 4D3N',        'lokasi'=>'Labuan Bajo',  'img'=>'img/paket/labuanbajo.jpg',   'rating'=>'9.5/10','ulasan'=>'5.2k','harga_coret'=>'Rp 6.000.000', 'harga'=>'Rp 5.200.000','satuan'=>'/ orang','diskon'=>'Save 13%'],
        ['id'=>8,'judul'=>'Wisata Malaysia 4D3N',           'lokasi'=>'Malaysia',     'img'=>'img/paket/malaysia.jpg',     'rating'=>'8.9/10','ulasan'=>'6.3k','harga_coret'=>'Rp 11.000.000','harga'=>'Rp 8.900.000','satuan'=>'/ orang','diskon'=>'Save 19%'],
      ];
    @endphp

    {{-- Grid kartu pakai bootstrap row + col --}}
    <div class="row g-4">
      @foreach($paket as $p)
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="kartu-paket">

            {{-- Link kartu menuju halaman detail dengan parameter id --}}
            <a href="{{ route('detailtk', ['id' => $p['id']]) }}" class="link-kartu">
              <div class="thumb">
                <img src="{{ asset($p['img']) }}" alt="{{ $p['judul'] }}">
                <span class="badge-lokasi"><i class="bi bi-geo-alt-fill"></i> {{ $p['lokasi'] }}</span>
                @if($p['diskon'])
                  <span class="badge-diskon">{{ $p['diskon'] }}</span>
                @endif
              </div>

              <div class="isi">
                <p class="judul-paket">{{ $p['judul'] }}</p>
                <p class="mb-2">
                  <span class="rating"><i class="bi bi-star-fill"></i> {{ $p['rating'] }}</span>
                  <span class="ulasan">· {{ $p['ulasan'] }} ulasan</span>
                </p>
                @if($p['harga_coret'])
                  <p class="harga-coret mb-1">{{ $p['harga_coret'] }}</p>
                @endif
                <p class="harga mb-0">{{ $p['harga'] }} <small>{{ $p['satuan'] }}</small></p>
              </div>
            </a>

            {{-- Tombol pesan via WhatsApp, urlencode supaya pesan rapi --}}
            <div class="aksi">
              <a href="https://wa.me/6282324246645?text={{ urlencode('Halo, saya mau tanya paket ' . $p['judul']) }}"
                 target="_blank" class="btn-pesan-kartu">
                <i class="bi bi-whatsapp"></i> Pesan Sekarang
              </a>
            </div>

          </div>
        </div>
      @endforeach
    </div>

  </div>
</section>


{{-- ========================================
     KEBERANGKATAN TERDEKAT
     Tabel jadwal dengan badge sisa kursi
     ======================================== --}}
<section class="py-5" id="jadwal" style="background:#fff;">
  <div class="container" style="max-width:1040px;">

    <div class="text-center mb-5">
      <span class="sec-label" style="background:#fdf3d0;color:#c49a2a;">Jadwal</span>
      <h2 class="sec-title">Keberangkatan Terdekat</h2>
      <p class="sec-sub">Daftarkan diri Anda segera sebelum kuota habis.</p>
    </div>

    {{-- Data jadwal disimpan dalam array, lalu di-loop ke baris tabel --}}
    @php
      $jadwal = [
        ['paket'=>'Umroh Ekonomi 9 Hari',    'tgl'=>'10 Mei 2025', 'durasi'=>'9 hari',  'kursi'=>12, 'penuh'=>false],
        ['paket'=>'Umroh Plus 12 Hari',      'tgl'=>'18 Mei 2025', 'durasi'=>'12 hari', 'kursi'=>5,  'penuh'=>true],
        ['paket'=>'Wisata Bali 4D3N',        'tgl'=>'25 Mei 2025', 'durasi'=>'4 hari',  'kursi'=>18, 'penuh'=>false],
        ['paket'=>'Wisata Malaysia 4D3N',    'tgl'=>'01 Jun 2025', 'durasi'=>'4 hari',  'kursi'=>8,  'penuh'=>false],
        ['paket'=>'Umroh Premium Bintang 5', 'tgl'=>'15 Jun 2025', 'durasi'=>'12 hari', 'kursi'=>3,  'penuh'=>true],
      ];
    @endphp

    <div class="tbl-jadwal">
      <div class="table-responsive">
        <table class="table align-middle">
          <thead>
            <tr>
              <th>Paket</th>
              <th>Tgl Berangkat</th>
              <th>Durasi</th>
              <th>Sisa Kursi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($jadwal as $j)
              <tr>
                <td><strong>{{ $j['paket'] }}</strong></td>
                <td>{{ $j['tgl'] }}</td>
                <td>{{ $j['durasi'] }}</td>
                <td>
                  {{-- Badge berubah warna sesuai jumlah kursi --}}
                  <span class="badge {{ $j['penuh'] ? 'kursi-sedikit' : 'kursi-banyak' }}">
                    {{ $j['kursi'] }} kursi
                  </span>
                </td>
                <td>
                  <a href="https://wa.me/6282324246645?text={{ urlencode('Halo, saya mau daftar ' . $j['paket'] . ' tanggal ' . $j['tgl']) }}"
                     target="_blank" class="btn-daftar">
                    <i class="bi bi-whatsapp"></i> Daftar
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>
</section>


{{-- ========================================
     FOOTER (sama dengan beranda)
     ======================================== --}}
<footer>
  <div class="foot-inner">
    <div class="row g-5">

      {{-- Kolom kiri: profil singkat + sosial media --}}
      <div class="col-12 col-md-5">
        <h3>Nirwana Tour &amp; Travel</h3>
        <span class="since">Since 2005</span>
        <p class="desc">Mitra perjalanan terpercaya Anda. Kami menghadirkan pengalaman wisata tak terlupakan dengan layanan profesional dan harga transparan.</p>
        <div class="socials">
          <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
          <a href="https://wa.me/6282324246645" target="_blank" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
          <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
        </div>
      </div>

      {{-- Kolom navigasi --}}
      <div class="col-6 col-md-3">
        <h4>Navigasi</h4>
        <a href="{{ route('beranda') }}" class="foot-link">Beranda</a>
        <a href="{{ route('lyn') }}"     class="foot-link">Layanan</a>
        <a href="{{ route('tk') }}"      class="foot-link">Tentang Kami</a>
      </div>

      {{-- Kolom kontak --}}
      <div class="col-6 col-md-4">
        <h4>Kontak</h4>
        <a href="tel:+6282324246645"           class="foot-link"><i class="bi bi-telephone me-1"></i>+62 823-2424-6645</a>
        <a href="https://wa.me/6282324246645"  class="foot-link" target="_blank"><i class="bi bi-whatsapp me-1"></i>+62 823-2424-6645</a>
        <a href="mailto:info@nirwanatravel.id" class="foot-link"><i class="bi bi-envelope me-1"></i>info@nirwanatravel.id</a>
      </div>

    </div>

    <div class="foot-bottom">
      <p>&copy; {{ date('Y') }} Nirwana Tour &amp; Travel. Hak cipta dilindungi.</p>
      <p>Berizin resmi — Terdaftar Kemenparekraf</p>
    </div>
  </div>
</footer>

{{-- Bootstrap JS untuk dropdown akun --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>