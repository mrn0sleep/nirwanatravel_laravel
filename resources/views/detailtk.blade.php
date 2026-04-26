@php
/* ================================================================
   DATA SEMUA PAKET LAYANAN
   ----------------------------------------------------------------
   Disimpan di array $semuaPaket. Tiap paket punya isi yang berbeda
   (deskripsi, fasilitas, keunggulan, syarat) sesuai jenisnya
   sehingga halaman detail tampil sesuai paket yang dipilih.

   Cara akses:  /detailtk?id=1   (Umroh Ekonomi)
                /detailtk?id=5   (Wisata Bali)
   Default     : id = 1 jika tidak ada parameter id
   ================================================================ */

$semuaPaket = [

    /* ---------- 1. UMROH EKONOMI ---------- */
    1 => [
        'judul'   => 'Paket Umroh Ekonomi 9 Hari',
        'sub'     => 'Ibadah umroh hemat tetap nyaman',
        'lokasi'  => 'Makkah – Madinah',
        'durasi'  => '9 Hari 8 Malam',
        'tipe'    => 'Wisata Religi',
        'tanggal' => '10 Mei 2025',
        'harga'      => 'Rp 22.500.000',
        'harga_coret'=> 'Rp 25.000.000',
        'satuan'  => 'per jamaah',
        'img'     => 'img/paket/umroh-ekonomi.jpg',
        'deskripsi' => 'Paket Umroh Ekonomi 9 Hari dirancang untuk Anda yang ingin menunaikan ibadah umroh dengan biaya terjangkau, namun tetap nyaman dan terorganisir. Kami menggunakan maskapai resmi, hotel transit dekat dengan area Masjidil Haram dan Masjid Nabawi, serta dibimbing oleh pembimbing ibadah berpengalaman.',
        'fasilitas' => ['Tiket pesawat PP (ekonomi)', 'Hotel bintang 3 dekat Masjidil Haram', 'Hotel bintang 3 di Madinah', 'Bus AC selama di Tanah Suci', 'Makan 3x sehari menu Indonesia', 'Visa umroh & asuransi perjalanan', 'Pembimbing ibadah resmi', 'Perlengkapan umroh (koper, tas, kain ihram)'],
        'keunggulan'=> ['Harga paling terjangkau di kelasnya', 'Pembimbing berpengalaman lebih dari 10 tahun', 'Hotel berjarak ±500m dari Masjidil Haram', 'Sudah termasuk semua biaya — tidak ada biaya tersembunyi'],
        'syarat'    => ['Paspor berlaku minimal 6 bulan saat keberangkatan', 'Vaksin meningitis (sertifikat ICV)', 'DP minimal Rp 5.000.000 saat pendaftaran', 'Pelunasan H-30 sebelum keberangkatan', 'Fotokopi KTP & Kartu Keluarga'],
    ],

    /* ---------- 2. UMROH PLUS ---------- */
    2 => [
        'judul'   => 'Paket Umroh Plus 12 Hari',
        'sub'     => 'Umroh + city tour Madinah dan Jeddah',
        'lokasi'  => 'Makkah – Madinah – Jeddah',
        'durasi'  => '12 Hari 11 Malam',
        'tipe'    => 'Wisata Religi',
        'tanggal' => '18 Mei 2025',
        'harga'      => 'Rp 28.900.000',
        'harga_coret'=> 'Rp 32.000.000',
        'satuan'  => 'per jamaah',
        'img'     => 'img/paket/umroh-plus.jpg',
        'deskripsi' => 'Paket Umroh Plus 12 Hari memberikan waktu lebih panjang untuk beribadah dengan tenang, ditambah city tour ke tempat-tempat bersejarah Islam di Madinah dan Jeddah. Cocok untuk Anda yang ingin pengalaman umroh lebih lengkap.',
        'fasilitas' => ['Tiket pesawat PP', 'Hotel bintang 4 dekat Masjidil Haram', 'Hotel bintang 4 di Madinah', 'City tour Madinah & Jeddah', 'Bus AC eksklusif', 'Makan 3x sehari', 'Visa umroh & asuransi', 'Pembimbing ibadah & muthawwif lokal', 'Perlengkapan umroh lengkap'],
        'keunggulan'=> ['Hotel lebih dekat dan lebih nyaman', 'Plus city tour ziarah sejarah Islam', 'Group dibatasi maksimal 30 jamaah', 'Dokumentasi foto perjalanan'],
        'syarat'    => ['Paspor berlaku minimal 6 bulan', 'Vaksin meningitis', 'DP minimal Rp 7.500.000', 'Pelunasan H-30 keberangkatan', 'Foto berwarna latar putih 4x6'],
    ],

    /* ---------- 3. UMROH PREMIUM ---------- */
    3 => [
        'judul'   => 'Umroh Premium Bintang 5',
        'sub'     => 'Umroh eksklusif dengan hotel bintang 5',
        'lokasi'  => 'Makkah – Madinah',
        'durasi'  => '12 Hari 11 Malam',
        'tipe'    => 'Wisata Religi Premium',
        'tanggal' => '15 Juni 2025',
        'harga'      => 'Rp 35.000.000',
        'harga_coret'=> '',
        'satuan'  => 'per jamaah',
        'img'     => 'img/paket/umroh-premium.jpg',
        'deskripsi' => 'Paket Umroh Premium Bintang 5 menawarkan pengalaman ibadah dengan kenyamanan kelas atas. Menginap di hotel bintang 5 yang berjarak hanya beberapa langkah dari Masjidil Haram dan Masjid Nabawi, ditemani pembimbing senior dan layanan eksklusif.',
        'fasilitas' => ['Tiket pesawat full service (Garuda/Saudia)', 'Hotel bintang 5 di samping Masjidil Haram', 'Hotel bintang 5 di samping Masjid Nabawi', 'Bus AC mewah', 'Makan prasmanan internasional', 'Visa, asuransi, & handling bandara', 'Pembimbing ibadah senior', 'Perlengkapan umroh premium', 'Air zam-zam 5L gratis'],
        'keunggulan'=> ['Hotel bintang 5 langsung di area masjid', 'Maskapai full service', 'Group VIP maksimal 20 jamaah', 'Free upgrade kamar deluxe', 'Tour leader 24 jam'],
        'syarat'    => ['Paspor berlaku minimal 7 bulan', 'Vaksin meningitis', 'DP minimal Rp 10.000.000', 'Pelunasan H-45 keberangkatan', 'Foto formal 4x6 latar putih'],
    ],

    /* ---------- 4. HAJI PLUS ---------- */
    4 => [
        'judul'   => 'Paket Haji Plus 26 Hari',
        'sub'     => 'Haji khusus dengan layanan terbaik',
        'lokasi'  => 'Makkah – Madinah – Mina – Arafah',
        'durasi'  => '26 Hari',
        'tipe'    => 'Haji Khusus',
        'tanggal' => '20 Mei 2026',
        'harga'      => 'Rp 155.000.000',
        'harga_coret'=> 'Rp 175.000.000',
        'satuan'  => 'per jamaah',
        'img'     => 'img/paket/haji-plus.jpg',
        'deskripsi' => 'Paket Haji Plus 26 Hari merupakan layanan haji khusus dengan kuota resmi Kementerian Agama RI. Anda akan menjalankan seluruh rangkaian ibadah haji didampingi pembimbing yang sangat berpengalaman, dengan akomodasi terbaik di Makkah, Madinah, dan tenda Mina/Arafah.',
        'fasilitas' => ['Kuota haji resmi Kemenag', 'Tiket pesawat PP business/ekonomi', 'Hotel bintang 5 di Makkah & Madinah', 'Tenda Mina ber-AC kategori Maktab khusus', 'Catering 3x sehari menu Indonesia', 'Bus AC khusus jamaah', 'Pembimbing ibadah & dokter pendamping', 'Asuransi haji & jaminan visa', 'Perlengkapan haji lengkap'],
        'keunggulan'=> ['Kuota resmi Kementerian Agama RI', 'Tenda Mina kategori VIP (Maktab khusus)', 'Pembimbing ibadah berlisensi', 'Tim dokter mendampingi 24 jam', 'Group eksklusif maksimal 25 jamaah'],
        'syarat'    => ['Paspor berlaku minimal 8 bulan', 'Sudah berhaji wajib menunggu 10 tahun', 'Vaksin meningitis & vaksin lain sesuai aturan', 'DP minimal Rp 50.000.000', 'Surat keterangan sehat dari dokter', 'Mahram bagi jamaah wanita di bawah 45 tahun'],
    ],

    /* ---------- 5. WISATA BALI ---------- */
    5 => [
        'judul'   => 'Wisata Bali 4D3N All Inclusive',
        'sub'     => 'Liburan ke Pulau Dewata tanpa ribet',
        'lokasi'  => 'Bali (Kuta, Ubud, Tanah Lot, Uluwatu)',
        'durasi'  => '4 Hari 3 Malam',
        'tipe'    => 'Wisata Domestik',
        'tanggal' => '25 Mei 2025',
        'harga'      => 'Rp 3.500.000',
        'harga_coret'=> 'Rp 4.200.000',
        'satuan'  => 'per orang',
        'img'     => 'img/paket/bali.jpg',
        'deskripsi' => 'Nikmati keindahan Pulau Dewata bersama Nirwana Tour & Travel. Paket Bali 4D3N All Inclusive sudah termasuk tiket pesawat, hotel, transportasi, makan, dan tiket masuk objek wisata terkenal seperti Tanah Lot, Uluwatu, Pantai Kuta, dan Ubud.',
        'fasilitas' => ['Tiket pesawat Surabaya/Jakarta - Denpasar PP', 'Hotel bintang 3 di area Kuta', 'Mobil/Bus AC selama tour', 'Makan 3x sehari (resto lokal)', 'Tiket masuk objek wisata', 'Tour leader berpengalaman', 'Air mineral selama perjalanan', 'Asuransi perjalanan'],
        'keunggulan'=> ['Itinerary lengkap 6 destinasi populer', 'Free welcome drink di hotel', 'Pemandu wisata bersertifikat HPI', 'Foto group profesional di Tanah Lot'],
        'syarat'    => ['Membawa KTP/identitas asli', 'Booking minimal 14 hari sebelum keberangkatan', 'DP 30% saat pemesanan', 'Pelunasan H-7 keberangkatan'],
    ],

    /* ---------- 6. WISATA YOGYAKARTA ---------- */
    6 => [
        'judul'   => 'Wisata Yogyakarta 3D2N',
        'sub'     => 'Eksplorasi budaya dan alam Yogya',
        'lokasi'  => 'Yogyakarta (Borobudur, Prambanan, Malioboro)',
        'durasi'  => '3 Hari 2 Malam',
        'tipe'    => 'Wisata Domestik',
        'tanggal' => 'Setiap akhir pekan',
        'harga'      => 'Rp 2.800.000',
        'harga_coret'=> '',
        'satuan'  => 'per orang',
        'img'     => 'img/paket/yogya.jpg',
        'deskripsi' => 'Paket Wisata Yogyakarta 3D2N mengajak Anda menjelajahi kota istimewa yang penuh sejarah, budaya, dan kuliner. Mengunjungi Candi Borobudur saat sunrise, Candi Prambanan, Keraton Yogya, dan menikmati malam santai di Malioboro.',
        'fasilitas' => ['Hotel bintang 3 di pusat kota', 'Mobil/Bus AC pariwisata', 'Makan 3x sehari (gudeg & angkringan)', 'Tiket masuk Borobudur & Prambanan', 'Tour guide lokal', 'Driver berpengalaman', 'Asuransi perjalanan'],
        'keunggulan'=> ['Sunrise tour Borobudur eksklusif', 'Wisata kuliner khas Yogya', 'Belanja batik & oleh-oleh terjamin asli', 'Lokasi hotel strategis di Malioboro'],
        'syarat'    => ['Membawa KTP', 'Booking H-7 keberangkatan', 'DP 50% saat pemesanan', 'Pelunasan H-3 keberangkatan'],
    ],

    /* ---------- 7. WISATA LABUAN BAJO ---------- */
    7 => [
        'judul'   => 'Wisata Labuan Bajo 4D3N',
        'sub'     => 'Sailing trip Pulau Komodo & Padar',
        'lokasi'  => 'Labuan Bajo, Nusa Tenggara Timur',
        'durasi'  => '4 Hari 3 Malam',
        'tipe'    => 'Wisata Domestik',
        'tanggal' => '08 Juni 2025',
        'harga'      => 'Rp 5.200.000',
        'harga_coret'=> 'Rp 6.000.000',
        'satuan'  => 'per orang',
        'img'     => 'img/paket/labuanbajo.jpg',
        'deskripsi' => 'Paket Sailing Labuan Bajo 4D3N mengajak Anda menjelajahi taman nasional Komodo, Pulau Padar yang ikonik, Pink Beach, dan snorkeling di Manta Point. Pengalaman sekali seumur hidup yang wajib dicoba.',
        'fasilitas' => ['Tiket pesawat PP ke Komodo Airport', 'Penginapan 1 malam di Labuan Bajo', '2 malam tidur di kapal phinisi (kabin AC)', 'Makan selama sailing', 'Snorkeling gear & lifejacket', 'Tiket masuk taman nasional', 'Ranger guide Pulau Komodo', 'Dokumentasi drone & underwater'],
        'keunggulan'=> ['Kapal phinisi ber-AC bukan open deck', 'Free dokumentasi drone selama sailing', 'Itinerary 6 spot wisata utama', 'Group dibatasi 12 orang per kapal'],
        'syarat'    => ['Membawa KTP', 'Booking minimal H-21', 'Bisa berenang (disarankan)', 'DP 50% saat pemesanan', 'Pelunasan H-10 keberangkatan'],
    ],

    /* ---------- 8. WISATA MALAYSIA ---------- */
    8 => [
        'judul'   => 'Wisata Malaysia 4D3N',
        'sub'     => 'Kuala Lumpur – Genting – Putrajaya',
        'lokasi'  => 'Malaysia',
        'durasi'  => '4 Hari 3 Malam',
        'tipe'    => 'Wisata Mancanegara',
        'tanggal' => '01 Juni 2025',
        'harga'      => 'Rp 8.900.000',
        'harga_coret'=> 'Rp 11.000.000',
        'satuan'  => 'per orang',
        'img'     => 'img/paket/malaysia.jpg',
        'deskripsi' => 'Paket Wisata Malaysia 4D3N membawa Anda mengunjungi destinasi populer Negeri Jiran. Mulai dari ikon Petronas Twin Towers, Genting Highlands, Batu Caves, sampai pusat pemerintahan modern di Putrajaya.',
        'fasilitas' => ['Tiket pesawat PP Surabaya/Jakarta - Kuala Lumpur', 'Hotel bintang 3 di KL', 'Bus AC pariwisata', 'Makan 3x sehari (halal)', 'Tiket masuk objek wisata', 'Tour leader bahasa Indonesia', 'Asuransi perjalanan internasional', 'Air mineral selama tour'],
        'keunggulan'=> ['Sudah termasuk tiket Genting cable car', 'Hotel di pusat Bukit Bintang', 'Free belanja Mydin & Berjaya Times Square', 'Tour leader berpengalaman lebih dari 5 tahun'],
        'syarat'    => ['Paspor berlaku minimal 6 bulan', 'Booking minimal H-21', 'DP 30% saat pemesanan', 'Pelunasan H-14 keberangkatan', 'Tidak masuk daftar cekal imigrasi'],
    ],
];

/* Ambil id dari URL. Jika tidak ada / tidak valid -> default 1.
   Pakai array_key_exists supaya aman dari id yang tidak terdaftar. */
$id     = request('id', 1);
$id     = array_key_exists((int)$id, $semuaPaket) ? (int)$id : 1;
$item   = $semuaPaket[$id];
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $item['judul'] }} — Nirwana Tour &amp; Travel</title>

{{-- Google Fonts: Playfair Display (judul) + Plus Jakarta Sans (teks) --}}
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

{{-- Bootstrap 5 + Bootstrap Icons --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<style>
/* ============================================
   RESET & DASAR — sama dengan beranda.blade.php
   ============================================ */
* { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body { font-family: 'Plus Jakarta Sans', sans-serif; color: #111827; background: #f5f2ec; }
a { text-decoration: none; }

/* ============================================
   NAVBAR (sama dengan beranda)
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
.nav-menu a { display: block; padding: 7px 13px; font-size: .87rem; font-weight: 500; color: rgba(255,255,255,.8); border-radius: 8px; transition: .2s; }
.nav-menu a:hover, .nav-menu a.active { color: #fff; background: rgba(255,255,255,.1); }

/* Tombol di navbar (login / akun) */
.btn-wa { display: inline-flex; align-items: center; gap: 8px; background: #1fa563; color: #fff; font-weight: 600; font-size: .9rem; padding: 13px 28px; border-radius: 50px; box-shadow: 0 5px 16px rgba(31,165,99,.35); transition: .2s; }
.btn-wa:hover { background: #22bd72; color: #fff; transform: translateY(-2px); }

/* ============================================
   HERO DETAIL — gradient navy seperti beranda
   ============================================ */
.hero-detail {
  padding: 130px 20px 60px; position: relative; overflow: hidden;
  background: linear-gradient(145deg, #0a1628 0%, #0c2447 40%, #0e2d5e 65%, #0c1d3a 100%);
}
.hero-detail::before {
  content: ''; position: absolute; top: -10%; right: -8%;
  width: 480px; height: 480px; border-radius: 50%; pointer-events: none;
  background: radial-gradient(circle, rgba(30,77,191,.55) 0%, transparent 70%); opacity: .3;
}
.hero-detail-body { position: relative; z-index: 1; max-width: 1100px; margin: 0 auto; }

/* Breadcrumb di atas judul */
.crumb { color: rgba(255,255,255,.55); font-size: .8rem; margin-bottom: 14px; }
.crumb a { color: rgba(255,255,255,.7); }
.crumb a:hover { color: #e8bf60; }
.crumb .sep { color: rgba(255,255,255,.3); margin: 0 6px; }

.hero-detail h1 {
  font-family: 'Playfair Display', serif; color: #fff;
  font-size: clamp(1.6rem, 4vw, 2.4rem); line-height: 1.2; margin-bottom: 8px;
}
.hero-detail h1 em { font-style: italic; color: #e8bf60; }
.hero-detail .sub { color: rgba(255,255,255,.7); font-size: .95rem; }

/* Pill kecil "Tipe layanan" */
.pill-tipe {
  display: inline-flex; align-items: center; gap: 6px;
  background: rgba(232,191,96,.15); color: #e8bf60;
  border: 1px solid rgba(232,191,96,.35);
  padding: 5px 14px; border-radius: 50px;
  font-size: .72rem; font-weight: 600; letter-spacing: .05em;
  margin-bottom: 14px;
}

/* ============================================
   KONTEN UTAMA
   ============================================ */
.detail-wrap { padding: 50px 0 70px; }

/* Bar info ringkas (4 kolom: tipe, durasi, lokasi, tanggal) */
.info-bar {
  background: #fff; border: 1px solid #dde3ee; border-radius: 16px;
  padding: 22px 26px; margin-bottom: 26px;
  box-shadow: 0 6px 18px rgba(13,31,60,.06);
}
.info-item { display: flex; align-items: center; gap: 12px; }
.info-icon {
  width: 44px; height: 44px; border-radius: 12px;
  background: #eef2ff; color: #1e4dbf;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.1rem; flex-shrink: 0;
}
.info-label { font-size: .72rem; color: #8a9bc0; margin-bottom: 2px; }
.info-val   { font-size: .87rem; font-weight: 700; color: #0c1d3a; }

/* Panel kotak konten (deskripsi, fasilitas, keunggulan, syarat) */
.panel {
  background: #fff; border: 1px solid #dde3ee; border-radius: 16px;
  margin-bottom: 16px; overflow: hidden;
  box-shadow: 0 4px 14px rgba(13,31,60,.05);
}
.panel-header {
  padding: 16px 22px; background: #0c1d3a; color: #fff;
  font-size: .92rem; font-weight: 600;
  display: flex; align-items: center; gap: 10px; cursor: pointer; user-select: none;
}
.panel-header .ico { color: #e8bf60; font-size: 1rem; }
.panel-header .arrow { margin-left: auto; transition: transform .25s; font-size: .8rem; opacity: .8; }
.panel-header.collapsed .arrow { transform: rotate(-90deg); }
.panel-body { padding: 20px 24px; }
.panel-body p { font-size: .9rem; color: #4a5568; line-height: 1.78; margin: 0; }

/* List dengan ceklis */
.list-check { list-style: none; padding: 0; margin: 0; }
.list-check li {
  font-size: .87rem; color: #2a3a55;
  padding: 9px 0; border-bottom: 1px dashed #e6ebf3;
  display: flex; align-items: flex-start; gap: 10px;
}
.list-check li:last-child { border-bottom: none; }
.list-check li i { color: #1fa563; font-size: 1rem; margin-top: 1px; flex-shrink: 0; }

/* ============================================
   SIDEBAR HARGA (sticky di kanan)
   ============================================ */
.harga-box {
  background: #fff; border: 1px solid #dde3ee; border-radius: 16px;
  overflow: hidden; box-shadow: 0 8px 22px rgba(13,31,60,.08);
  position: sticky; top: 90px;
}
.harga-box-header {
  background: #0c1d3a; color: #fff;
  padding: 16px 22px; font-size: .85rem; font-weight: 600;
  display: flex; align-items: center; gap: 8px;
}
.harga-box-header i { color: #e8bf60; }
.harga-box-body { padding: 22px; }
.harga-label  { font-size: .75rem; color: #8a9bc0; margin-bottom: 4px; }
.harga-coret  { font-size: .82rem; color: #aab3c4; text-decoration: line-through; margin-bottom: 2px; }
.harga-nilai  { font-family: 'Playfair Display', serif; font-size: 1.7rem; font-weight: 700; color: #e8400c; line-height: 1.1; margin-bottom: 4px; }
.harga-satuan { font-size: .76rem; color: #8a9bc0; margin-bottom: 18px; }
.harga-divider { border: none; border-top: 1px solid #eef0f7; margin: 16px 0; }

/* Info ringkas di sidebar */
.sidebar-info-item {
  display: flex; justify-content: space-between;
  font-size: .8rem; padding: 7px 0; border-bottom: 1px dashed #eef0f7;
}
.sidebar-info-item:last-of-type { border-bottom: none; }
.sidebar-info-item span:first-child { color: #8a9bc0; }
.sidebar-info-item span:last-child  { color: #0c1d3a; font-weight: 600; }

/* Tombol pesan & WhatsApp */
.btn-pesan {
  display: flex; align-items: center; justify-content: center; gap: 8px;
  width: 100%; padding: 12px; border-radius: 50px;
  background: #0c1d3a; color: #fff; font-size: .87rem; font-weight: 600;
  margin-bottom: 10px; transition: .2s; border: none;
}
.btn-pesan:hover { background: #163060; color: #fff; transform: translateY(-1px); }
.btn-wa-side {
  display: flex; align-items: center; justify-content: center; gap: 8px;
  width: 100%; padding: 12px; border-radius: 50px;
  background: #1fa563; color: #fff; font-size: .87rem; font-weight: 600; transition: .2s;
}
.btn-wa-side:hover { background: #22bd72; color: #fff; transform: translateY(-1px); }

/* ============================================
   FOOTER (sama dengan beranda)
   ============================================ */
footer { background: #0a1628; padding: 56px 0 28px; margin-top: 30px; }
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
   RESPONSIF
   ============================================ */
@media (max-width: 991px) {
  .harga-box { position: relative; top: 0; margin-top: 16px; }
}
@media (max-width: 767px) {
  .nav-menu { display: none; }
  .hero-detail { padding: 110px 20px 40px; }
}
</style>
</head>
<body>

{{-- ========================================
     NAVBAR — sama dengan beranda
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

    <ul class="nav-menu">
      <li><a href="{{ route('beranda') }}">Beranda</a></li>
      <li><a href="{{ route('lyn') }}" class="active">Layanan</a></li>
      <li><a href="{{ route('tk') }}">Tentang Kami</a></li>
    </ul>

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
     HERO DETAIL
     Menampilkan breadcrumb + judul + sub
     dari paket yang dipilih
     ======================================== --}}
<section class="hero-detail">
  <div class="hero-detail-body">

    {{-- Breadcrumb navigasi --}}
    <p class="crumb">
      <a href="{{ route('beranda') }}">Beranda</a>
      <span class="sep">›</span>
      <a href="{{ route('lyn') }}">Layanan</a>
      <span class="sep">›</span>
      <span style="color:rgba(255,255,255,.85);">{{ $item['judul'] }}</span>
    </p>

    <span class="pill-tipe"><i class="bi bi-bookmark-star-fill"></i> {{ $item['tipe'] }}</span>
    <h1>{{ $item['judul'] }}</h1>
    <p class="sub">{{ $item['sub'] }}</p>
  </div>
</section>


{{-- ========================================
     KONTEN DETAIL
     ======================================== --}}
<div class="detail-wrap">
  <div class="container" style="max-width:1100px;">

    {{-- ---- INFO BAR (4 kolom info ringkas) ---- --}}
    <div class="info-bar">
      <div class="row g-3 align-items-center">

        {{-- Info ditampilkan via loop, lebih ringkas dari menulis 4 blok mirip --}}
        @foreach([
          ['bi-bookmark-fill', 'Tipe Layanan',  $item['tipe']],
          ['bi-clock-fill',    'Durasi',        $item['durasi']],
          ['bi-geo-alt-fill',  'Lokasi',        $item['lokasi']],
          ['bi-calendar-event','Tgl Berangkat', $item['tanggal']],
        ] as [$ico, $label, $val])
          <div class="col-6 col-md-3">
            <div class="info-item">
              <div class="info-icon"><i class="bi {{ $ico }}"></i></div>
              <div>
                <div class="info-label">{{ $label }}</div>
                <div class="info-val">{{ $val }}</div>
              </div>
            </div>
          </div>
        @endforeach

      </div>
    </div>

    {{-- ---- 2 KOLOM: konten kiri, sidebar harga kanan ---- --}}
    <div class="row g-4">

      {{-- =================== KOLOM KIRI =================== --}}
      <div class="col-lg-8">

        {{-- Panel: DESKRIPSI --}}
        <div class="panel">
          <div class="panel-header" data-target="p-desk">
            <i class="bi bi-card-text ico"></i> Deskripsi Layanan
            <i class="bi bi-chevron-down arrow"></i>
          </div>
          <div class="panel-body" id="p-desk">
            <p>{{ $item['deskripsi'] }}</p>
          </div>
        </div>

        {{-- Panel: FASILITAS --}}
        <div class="panel">
          <div class="panel-header" data-target="p-fas">
            <i class="bi bi-gift-fill ico"></i> Fasilitas Termasuk
            <i class="bi bi-chevron-down arrow"></i>
          </div>
          <div class="panel-body" id="p-fas">
            <ul class="list-check">
              @foreach($item['fasilitas'] as $f)
                <li><i class="bi bi-check-circle-fill"></i> {{ $f }}</li>
              @endforeach
            </ul>
          </div>
        </div>

        {{-- Panel: KEUNGGULAN --}}
        <div class="panel">
          <div class="panel-header" data-target="p-keu">
            <i class="bi bi-stars ico"></i> Keunggulan Paket
            <i class="bi bi-chevron-down arrow"></i>
          </div>
          <div class="panel-body" id="p-keu">
            <ul class="list-check">
              @foreach($item['keunggulan'] as $k)
                <li><i class="bi bi-patch-check-fill"></i> {{ $k }}</li>
              @endforeach
            </ul>
          </div>
        </div>

        {{-- Panel: SYARAT & KETENTUAN (default tertutup) --}}
        <div class="panel">
          <div class="panel-header collapsed" data-target="p-syr">
            <i class="bi bi-file-text-fill ico"></i> Syarat &amp; Ketentuan
            <i class="bi bi-chevron-down arrow"></i>
          </div>
          <div class="panel-body" id="p-syr" style="display:none;">
            <ul class="list-check">
              @foreach($item['syarat'] as $s)
                <li><i class="bi bi-check-circle-fill"></i> {{ $s }}</li>
              @endforeach
            </ul>
          </div>
        </div>

      </div>

      {{-- =================== SIDEBAR KANAN =================== --}}
      <div class="col-lg-4">
        <div class="harga-box">

          <div class="harga-box-header">
            <i class="bi bi-tag-fill"></i> Informasi Harga
          </div>

          <div class="harga-box-body">
            <div class="harga-label">Mulai dari</div>

            {{-- Tampilkan harga coret hanya jika ada --}}
            @if($item['harga_coret'])
              <div class="harga-coret">{{ $item['harga_coret'] }}</div>
            @endif

            <div class="harga-nilai">{{ $item['harga'] }}</div>
            <div class="harga-satuan">{{ $item['satuan'] }}</div>

            <hr class="harga-divider">

            {{-- Info ringkas paket --}}
            <div class="sidebar-info-item"><span>Tipe</span>     <span>{{ $item['tipe'] }}</span></div>
            <div class="sidebar-info-item"><span>Durasi</span>   <span>{{ $item['durasi'] }}</span></div>
            <div class="sidebar-info-item"><span>Lokasi</span>   <span>{{ $item['lokasi'] }}</span></div>
            <div class="sidebar-info-item"><span>Berangkat</span><span>{{ $item['tanggal'] }}</span></div>

            <hr class="harga-divider">

            {{-- Tombol aksi: pesan dan konsultasi --}}
            <a href="{{ route('lyn') }}#jadwal" class="btn-pesan">
              <i class="bi bi-bag-check-fill"></i> Pesan Sekarang
            </a>
            <a href="https://wa.me/6282324246645?text={{ urlencode('Halo, saya tertarik dengan ' . $item['judul']) }}"
               target="_blank" class="btn-wa-side">
              <i class="bi bi-whatsapp"></i> Konsultasi via WhatsApp
            </a>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>


{{-- ========================================
     FOOTER (sama dengan beranda)
     ======================================== --}}
<footer>
  <div class="foot-inner">
    <div class="row g-5">

      <div class="col-12 col-md-5">
        <h3>Nirwana Tour &amp; Travel</h3>
        <span class="since">Since 2005</span>
        <p class="desc">Mitra perjalanan terpercaya Anda. Kami menghadirkan pengalaman wisata tak terlupakan dengan layanan profesional dan harga transparan.</p>
        <div class="socials">
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="https://wa.me/6282324246645" target="_blank"><i class="bi bi-whatsapp"></i></a>
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

<script>
/* ===========================================
   ACCORDION SEDERHANA
   Toggle tampil/sembunyi panel saat header diklik.
   Pakai loop forEach supaya berlaku ke semua panel.
   =========================================== */
document.querySelectorAll('.panel-header').forEach(header => {
  header.addEventListener('click', () => {
    const id   = header.getAttribute('data-target'); // ambil id body
    const body = document.getElementById(id);
    const tertutup = header.classList.contains('collapsed');

    if (tertutup) {
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