<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    :root {
        --cream:   #faf7f2;
        --sand:    #e8dfd0;
        --brown:   #3b2f23;
        --gold:    #c9973a;
        --moss:    #4a6741;
        --sky:     #2c6e8a;
        --text:    #2d2416;
        --muted:   #7a6e62;
        --radius:  16px;
        --shadow:  0 4px 24px rgba(59,47,35,.09);
    }

    /* ===== CARDS ===== */
    .travel-card {
        background: #fff;
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow);
        border: none;
        display: flex;
        flex-direction: column;
        height: 100%;
        transition: transform .3s ease, box-shadow .3s ease;
    }
    .travel-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 16px 48px rgba(59,47,35,.15);
    }

    .card-photo {
        position: relative;
        height: 175px;
        overflow: hidden;
    }
    .card-photo img {
        width: 100%; height: 100%;
        object-fit: cover;
        transition: transform .45s ease;
    }
    .travel-card:hover .card-photo img { transform: scale(1.07); }

    .badge-jenis {
        position: absolute; top: 10px; left: 10px;
        padding: 4px 11px;
        border-radius: 40px;
        font-size: .65rem; font-weight: 700;
        letter-spacing: .3px;
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
    }
    .badge-religi { background: rgba(201,151,58,.88); color: #fff; }
    .badge-lokal  { background: rgba(74,103,65,.88);  color: #fff; }
    .badge-manca  { background: rgba(44,110,138,.88); color: #fff; }
    .badge-lain   { background: rgba(59,47,35,.75);   color: #fff; }

    .card-content {
        padding: 1rem 1.1rem .75rem;
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: .4rem;
    }
    .card-nama {
        font-family: 'Playfair Display', serif;
        font-size: 1rem; font-weight: 700;
        color: var(--brown);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .card-meta {
        display: flex; gap: 10px; flex-wrap: wrap;
        font-size: .74rem; color: var(--muted);
    }
    .card-meta span { display: flex; align-items: center; gap: 3px; }
    .card-singkat {
        font-size: .79rem;
        color: var(--muted);
        line-height: 1.55;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        margin: 0;
    }

    .card-footer-bar {
        padding: .75rem 1.1rem;
        border-top: 1.5px solid var(--cream);
        display: flex; justify-content: space-between; align-items: center;
    }
    .price-wrap small {
        display: block; font-size: .55rem; font-weight: 700;
        text-transform: uppercase; letter-spacing: 1px; color: var(--muted);
    }
    .price-wrap strong {
        font-family: 'Playfair Display', serif;
        font-size: 1.1rem; font-weight: 700; color: var(--gold);
    }
    .btn-detail {
        background: var(--brown); color: #fff;
        border: none; border-radius: 9px;
        padding: 7px 16px;
        font-size: .78rem; font-weight: 600;
        cursor: pointer;
        transition: background .2s, transform .15s;
        display: flex; align-items: center; gap: 5px;
        font-family: 'DM Sans', sans-serif;
    }
    .btn-detail:hover { background: var(--gold); transform: scale(1.04); }

    /* ===== MODAL ===== */
    .modal-content {
        border: none;
        border-radius: 22px;
        overflow: hidden;
        font-family: 'DM Sans', sans-serif;
    }
    .modal-hero {
        position: relative;
        height: 280px;
        overflow: hidden;
    }
    .modal-hero img {
        width: 100%; height: 100%;
        object-fit: cover;
    }
    .modal-hero .overlay {
        position: absolute; inset: 0;
        background: linear-gradient(to top, rgba(30,18,10,.78) 0%, transparent 55%);
    }
    .modal-hero .close-btn {
        position: absolute; top: 12px; right: 12px; z-index: 10;
        background: rgba(0,0,0,.4); border: none; border-radius: 50%;
        width: 34px; height: 34px; display: flex; align-items: center; justify-content: center;
        color: #fff; cursor: pointer; transition: background .2s;
    }
    .modal-hero .close-btn:hover { background: rgba(0,0,0,.7); }
    .modal-hero-info {
        position: absolute; bottom: 16px; left: 20px; right: 20px;
    }
    .modal-nama {
        font-family: 'Playfair Display', serif;
        font-size: 1.6rem; font-weight: 800;
        color: #fff; line-height: 1.2;
    }
    .modal-pills {
        display: flex; gap: 6px; flex-wrap: wrap; margin-top: 7px;
    }
    .modal-pill {
        background: rgba(255,255,255,.18);
        border: 1px solid rgba(255,255,255,.3);
        color: #fff; border-radius: 40px;
        padding: 3px 11px; font-size: .69rem; font-weight: 600;
        backdrop-filter: blur(4px);
        display: flex; align-items: center; gap: 4px;
    }

    .modal-scroll {
        padding: 1.5rem 1.6rem 1rem;
        max-height: 60vh;
        overflow-y: auto;
    }
    .modal-scroll::-webkit-scrollbar { width: 4px; }
    .modal-scroll::-webkit-scrollbar-thumb { background: var(--sand); border-radius: 10px; }

    .sec-title {
        font-family: 'Playfair Display', serif;
        font-size: .95rem; font-weight: 700;
        color: var(--brown);
        border-left: 3px solid var(--gold);
        padding-left: 9px;
        margin: 1.4rem 0 .65rem;
    }
    .sec-title:first-child { margin-top: 0; }

    .desc-box {
        background: var(--cream);
        border-radius: 11px;
        padding: 12px 14px;
        font-size: .84rem;
        line-height: 1.7;
        color: var(--text);
    }

    .chip-list { display: flex; flex-wrap: wrap; gap: 7px; }
    .chip {
        border-radius: 40px;
        padding: 4px 13px;
        font-size: .76rem; font-weight: 500;
    }
    .chip-default  { background: var(--cream); border: 1.5px solid var(--sand); color: var(--brown); }
    .chip-syarat   { background: #fff8ee; border: 1.5px solid #ffd59e; color: #7a4800; }
    .chip-fasilitas{ background: #f0f9ee; border: 1.5px solid #b8d9b0; color: #2e5a26; }

    .itin-list { list-style: none; padding: 0; position: relative; }
    .itin-list::before {
        content: ''; position: absolute;
        top: 0; bottom: 0; left: 14px;
        width: 2px; background: var(--sand);
    }
    .itin-item { display: flex; gap: 14px; padding-bottom: 16px; position: relative; }
    .day-dot {
        width: 30px; height: 30px; flex-shrink: 0;
        background: var(--brown); color: #fff;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: .65rem; font-weight: 700; z-index: 1;
    }
    .itin-desc {
        background: #fff;
        border: 1.5px solid var(--sand);
        border-radius: 11px;
        padding: 9px 13px;
        font-size: .81rem;
        line-height: 1.6;
        color: var(--text);
        flex: 1;
    }
    .itin-desc strong {
        display: block; font-size: .74rem;
        color: var(--brown); margin-bottom: 3px;
    }

    .modal-foot {
        padding: .9rem 1.6rem;
        border-top: 2px solid var(--cream);
        display: flex; justify-content: space-between; align-items: center; gap: 12px;
    }
    .modal-price strong {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem; color: var(--gold);
        display: block;
    }
    .modal-price small {
        font-size: .58rem; text-transform: uppercase;
        letter-spacing: 1px; color: var(--muted); font-weight: 700;
    }
    .btn-pesan {
        background: var(--gold); color: #fff;
        border: none; border-radius: 11px;
        padding: 10px 24px;
        font-size: .87rem; font-weight: 700;
        font-family: 'DM Sans', sans-serif;
        cursor: pointer; transition: background .2s, transform .15s;
    }
    .btn-pesan:hover { background: var(--brown); transform: scale(1.04); }

    @media (max-width: 576px) {
        .modal-hero { height: 210px; }
        .modal-nama { font-size: 1.2rem; }
        .modal-scroll { padding: 1rem 1rem .8rem; }
    }
</style>

{{-- ===== GRID CARDS ===== --}}
<div class="row g-3">

    @forelse($pakets as $paket)
    @php
        $bc = match($paket->jenis_wisata) {
            'Wisata Religi'      => 'badge-religi',
            'Wisata Lokal'       => 'badge-lokal',
            'Wisata Mancanegara' => 'badge-manca',
            default              => 'badge-lain',
        };
    @endphp

    <div class="col-6 col-md-4 col-lg-3">
        <div class="travel-card">

            <div class="card-photo">
                <span class="badge-jenis {{ $bc }}">{{ $paket->jenis_wisata }}</span>
                @if($paket->foto)
                    <img src="{{ Storage::url($paket->foto) }}" alt="{{ $paket->nama }}">
                @else
                    <img src="https://placehold.co/400x300/3b2f23/faf7f2?text={{ urlencode($paket->nama) }}" alt="{{ $paket->nama }}">
                @endif
            </div>

            <div class="card-content">
                <div class="card-nama">{{ $paket->nama }}</div>
                <div class="card-meta">
                    <span><i class="bi bi-geo-alt-fill text-danger"></i>{{ $paket->lokasi }}</span>
                    <span><i class="bi bi-clock"></i>{{ $paket->durasi }}</span>
                </div>
                <p class="card-singkat">{{ $paket->p_singkat }}</p>
            </div>

            <div class="card-footer-bar">
                <div class="price-wrap">
                    <small>Mulai dari</small>
                    <strong>Rp{{ number_format($paket->harga, 0, ',', '.') }}</strong>
                </div>
                <button class="btn-detail" data-bs-toggle="modal" data-bs-target="#modal{{ $paket->id }}">
                    Detail <i class="bi bi-arrow-right"></i>
                </button>
            </div>

        </div>
    </div>

    {{-- MODAL DETAIL --}}
    <div class="modal fade" id="modal{{ $paket->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <div class="modal-hero">
                    @if($paket->foto)
                        <img src="{{ Storage::url($paket->foto) }}" alt="{{ $paket->nama }}">
                    @else
                        <img src="https://placehold.co/900x400/3b2f23/faf7f2?text={{ urlencode($paket->nama) }}" alt="{{ $paket->nama }}">
                    @endif
                    <div class="overlay"></div>
                    <button class="close-btn" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i></button>
                    <div class="modal-hero-info">
                        <div class="modal-nama">{{ $paket->nama }}</div>
                        <div class="modal-pills">
                            <span class="modal-pill"><i class="bi bi-tag-fill"></i>{{ $paket->jenis_wisata }}</span>
                            <span class="modal-pill"><i class="bi bi-geo-alt-fill"></i>{{ $paket->lokasi }}</span>
                            <span class="modal-pill"><i class="bi bi-clock-fill"></i>{{ $paket->durasi }}</span>
                        </div>
                    </div>
                </div>

                <div class="modal-scroll">

                    <p class="desc-box" style="margin:0">{{ $paket->p_singkat }}</p>

                    @if($paket->deskripsi)
                    <div class="sec-title"><i class="bi bi-file-text me-1"></i>Deskripsi Lengkap</div>
                    <div class="desc-box">{{ $paket->deskripsi }}</div>
                    @endif

                    @if($paket->keunggulanPaket->count())
                    <div class="sec-title"><i class="bi bi-stars me-1"></i>Keunggulan Paket</div>
                    <div class="chip-list">
                        @foreach($paket->keunggulanPaket->sortBy('urutan') as $k)
                            <span class="chip chip-default">✦ {{ $k->isi }}</span>
                        @endforeach
                    </div>
                    @endif

                    @if($paket->fasilitas->count())
                    <div class="sec-title"><i class="bi bi-check-circle me-1"></i>Fasilitas</div>
                    <div class="chip-list">
                        @foreach($paket->fasilitas->sortBy('urutan') as $f)
                            <span class="chip chip-fasilitas"><i class="bi bi-check2 me-1"></i>{{ $f->nama }}</span>
                        @endforeach
                    </div>
                    @endif

                    @if($paket->syaratKetentuan->count())
                    <div class="sec-title"><i class="bi bi-clipboard-check me-1"></i>Syarat & Ketentuan</div>
                    <div class="chip-list">
                        @foreach($paket->syaratKetentuan->sortBy('urutan') as $s)
                            <span class="chip chip-syarat">📌 {{ $s->isi }}</span>
                        @endforeach
                    </div>
                    @endif

                    @if($paket->itinerary->count())
                    <div class="sec-title"><i class="bi bi-map me-1"></i>Itinerary</div>
                    <ul class="itin-list">
                        @foreach($paket->itinerary->sortBy('hari') as $it)
                        <li class="itin-item">
                            <div class="day-dot">H{{ $it->hari }}</div>
                            <div class="itin-desc">
                                <strong>Hari ke-{{ $it->hari }}</strong>
                                {{ $it->deskripsi }}
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @endif

                </div>

                <div class="modal-foot">
                    <div class="modal-price">
                        <small>Harga per orang</small>
                        <strong>Rp{{ number_format($paket->harga, 0, ',', '.') }}</strong>
                    </div>
                    <button class="btn-pesan"><i class="bi bi-send-fill me-2"></i>Pesan Sekarang</button>
                </div>

            </div>
        </div>
    </div>
    {{-- END MODAL --}}

    @empty
    <div class="col-12 text-center py-4">
        <i class="bi bi-inbox" style="font-size:2.5rem; color:#ccc;"></i>
        <p class="mt-2 text-muted">Belum ada paket tersedia.</p>
    </div>
    @endforelse

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>