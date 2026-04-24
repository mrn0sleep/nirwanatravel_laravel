<?php
session_start();
$isLoggedIn = isset($_SESSION['name']) && isset($_SESSION['email']);
$avatarLetter = $isLoggedIn ? strtoupper(substr($_SESSION['name'], 0, 1)) : 'G';
$base_url = "http://localhost/nirwanatravel/";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tentang Kami — Nirwana Tour & Travel</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    /* =============================================
       DESIGN TOKENS — identik dengan layanan.php
    ============================================= */
    :root {
      --navy:      #0d1f3c;
      --navy-mid:  #1a3560;
      --blue:      #2255b8;
      --blue-lt:   #4a7fe0;
      --gold:      #c9a040;
      --gold-lt:   #e8c060;
      --green:     #22a967;
      --green-lt:  #34d17c;
      --sand:      #f7f4ef;
      --cloud:     #f0f2f6;
      --ink:       #0d1520;
      --muted:     #5f6d82;
      --border:    #dde2ed;
      --white:     #ffffff;
      --radius-sm: 10px;
      --radius-md: 18px;
      --radius-lg: 28px;
      --shadow-sm: 0 2px 12px rgba(13,31,60,.07);
      --shadow-md: 0 8px 32px rgba(13,31,60,.12);
      --shadow-lg: 0 20px 60px rgba(13,31,60,.16);
      --font-head: 'DM Serif Display', serif;
      --font-body: 'DM Sans', sans-serif;
      --nav-h:     72px;
      --ease:      cubic-bezier(.4,0,.2,1);
    }
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: smooth; }
    body {
      font-family: var(--font-body);
      color: var(--ink);
      background: var(--white);
      overflow-x: hidden;
      -webkit-font-smoothing: antialiased;
    }

    /* =============================================
       NAVBAR — identik dengan layanan.php
    ============================================= */
    .navbar {
      position: fixed;
      top: 0; left: 0; right: 0;
      height: var(--nav-h);
      z-index: 1000;
      display: flex;
      align-items: center;
      padding: 0 40px;
      background: var(--navy);
      box-shadow: var(--shadow-md);
      transition: background .35s var(--ease), box-shadow .35s var(--ease);
    }
    .nav-inner {
      width: 100%;
      max-width: 1280px;
      margin: 0 auto;
      display: flex;
      align-items: center;
    }
    .nav-logo {
      display: flex;
      align-items: center;
      gap: 10px;
      text-decoration: none;
      flex-shrink: 0;
    }
    .nav-logo img {
      height: 42px;
      width: auto;
      object-fit: contain;
      filter: brightness(0) invert(1);
    }
    .nav-logo-text {
      font-family: var(--font-head);
      font-size: 1.15rem;
      color: var(--white);
      line-height: 1.2;
      letter-spacing: .01em;
    }
    .nav-logo-text small {
      display: block;
      font-family: var(--font-body);
      font-size: .65rem;
      font-weight: 400;
      color: rgba(255,255,255,.6);
      letter-spacing: .08em;
      text-transform: uppercase;
    }
    .nav-links {
      display: flex;
      align-items: center;
      gap: 4px;
      list-style: none;
      margin: 0 auto;
    }
    .nav-links a {
      font-size: .88rem;
      font-weight: 500;
      color: rgba(255,255,255,.75);
      text-decoration: none;
      padding: 8px 14px;
      border-radius: 8px;
      transition: color .2s, background .2s;
      white-space: nowrap;
    }
    .nav-links a:hover,
    .nav-links a.active {
      color: var(--white);
      background: rgba(255,255,255,.1);
    }
    .nav-dropdown { position: relative; }
    .nav-dropdown > a {
      display: flex;
      align-items: center;
      gap: 4px;
    }
    .nav-dropdown > a .caret {
      font-size: .7rem;
      transition: transform .25s var(--ease);
    }
    .nav-dropdown:hover > a .caret { transform: rotate(180deg); }
    .dropdown-panel {
      position: absolute;
      top: calc(100% + 12px);
      left: 50%;
      transform: translateX(-50%) translateY(8px);
      background: var(--white);
      border-radius: var(--radius-md);
      box-shadow: var(--shadow-lg);
      border: 1px solid var(--border);
      padding: 8px;
      min-width: 220px;
      opacity: 0;
      pointer-events: none;
      transition: opacity .22s var(--ease), transform .22s var(--ease);
    }
    .nav-dropdown:hover .dropdown-panel {
      opacity: 1;
      pointer-events: auto;
      transform: translateX(-50%) translateY(0);
    }
    .dropdown-panel a {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 10px 14px;
      border-radius: 10px;
      font-size: .88rem;
      font-weight: 500;
      color: var(--ink) !important;
      text-decoration: none;
      background: transparent !important;
      transition: background .15s !important;
    }
    .dropdown-panel a:hover { background: var(--cloud) !important; color: var(--navy-mid) !important; }
    .dropdown-panel a i {
      width: 28px;
      height: 28px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: var(--cloud);
      border-radius: 8px;
      font-size: .9rem;
      color: var(--blue);
      flex-shrink: 0;
    }
    .nav-auth { display: flex; align-items: center; gap: 12px; flex-shrink: 0; }
    .btn-login {
      font-family: var(--font-body);
      font-size: .88rem;
      font-weight: 600;
      color: var(--white);
      background: rgba(255,255,255,.12);
      border: 1.5px solid rgba(255,255,255,.28);
      padding: 8px 20px;
      border-radius: 50px;
      cursor: pointer;
      text-decoration: none;
      transition: background .2s, border-color .2s;
    }
    .btn-login:hover {
      background: rgba(255,255,255,.22);
      border-color: rgba(255,255,255,.5);
      color: var(--white);
    }
    .profile-box { position: relative; }
    .profile-trigger {
      display: flex;
      align-items: center;
      gap: 9px;
      cursor: pointer;
      padding: 5px 14px 5px 5px;
      border-radius: 50px;
      background: rgba(255,255,255,.1);
      border: 1.5px solid rgba(255,255,255,.2);
      transition: background .2s;
    }
    .profile-trigger:hover { background: rgba(255,255,255,.18); }
    .avatar-circle {
      width: 34px; height: 34px;
      border-radius: 50%;
      background: var(--gold);
      color: var(--white);
      font-weight: 700;
      font-size: .88rem;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }
    .profile-name {
      font-size: .85rem;
      font-weight: 600;
      color: var(--white);
      max-width: 100px;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }
    .profile-menu {
      position: absolute;
      top: calc(100% + 10px);
      right: 0;
      background: var(--white);
      border-radius: var(--radius-md);
      box-shadow: var(--shadow-lg);
      border: 1px solid var(--border);
      padding: 8px;
      min-width: 190px;
      opacity: 0;
      pointer-events: none;
      transform: translateY(8px);
      transition: opacity .22s var(--ease), transform .22s var(--ease);
    }
    .profile-box.open .profile-menu {
      opacity: 1;
      pointer-events: auto;
      transform: translateY(0);
    }
    .profile-menu a {
      display: flex;
      align-items: center;
      gap: 9px;
      padding: 10px 12px;
      border-radius: 9px;
      font-size: .88rem;
      font-weight: 500;
      color: var(--ink) !important;
      text-decoration: none;
      background: transparent !important;
      transition: background .15s !important;
    }
    .profile-menu a:hover { background: var(--cloud) !important; }
    .profile-menu .divider { height: 1px; background: var(--border); margin: 6px 0; }
    .profile-menu a.logout { color: #c0392b !important; }
    .nav-toggle {
      display: none;
      flex-direction: column;
      gap: 5px;
      cursor: pointer;
      padding: 8px;
      margin-left: auto;
      background: none;
      border: none;
    }
    .nav-toggle span {
      display: block;
      width: 24px; height: 2px;
      background: var(--white);
      border-radius: 2px;
      transition: transform .3s var(--ease), opacity .3s var(--ease);
    }
    .nav-toggle.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
    .nav-toggle.open span:nth-child(2) { opacity: 0; }
    .nav-toggle.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }
    .mobile-nav {
      display: none;
      position: fixed;
      top: var(--nav-h);
      left: 0; right: 0;
      background: rgba(13,31,60,.97);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      padding: 20px 24px 30px;
      z-index: 999;
      opacity: 0;
      transform: translateY(-10px);
      transition: opacity .3s var(--ease), transform .3s var(--ease);
    }
    .mobile-nav.open { opacity: 1; transform: translateY(0); }
    .mobile-nav a {
      display: block;
      padding: 13px 0;
      font-size: .95rem;
      font-weight: 500;
      color: rgba(255,255,255,.8);
      text-decoration: none;
      border-bottom: 1px solid rgba(255,255,255,.08);
    }
    .mobile-nav a:hover { color: var(--white); }
    .mobile-nav .mobile-sub { padding-left: 16px; }
    .mobile-nav .mobile-sub a { font-size: .88rem; border: none; padding: 9px 0; }
    .mobile-nav .mobile-auth { margin-top: 20px; }

    /* =============================================
       PAGE HERO — TENTANG KAMI
    ============================================= */
    .page-hero {
      background: var(--navy);
      padding: calc(var(--nav-h) + 70px) 0 0;
      position: relative;
      overflow: hidden;
    }
    /* Decorative background orbs */
    .page-hero::before {
      content: '';
      position: absolute;
      top: -10%; left: -8%;
      width: 600px; height: 600px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(66,119,232,.16) 0%, transparent 65%);
      pointer-events: none;
    }
    .page-hero::after {
      content: '';
      position: absolute;
      bottom: 10%; right: -5%;
      width: 480px; height: 480px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(201,160,64,.1) 0%, transparent 65%);
      pointer-events: none;
    }

    /* gold line accent top */
    .hero-accent-bar {
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 3px;
      background: linear-gradient(90deg, transparent, var(--gold), var(--gold-lt), var(--gold), transparent);
      opacity: .7;
    }

    .page-hero-inner {
      position: relative;
      z-index: 1;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 40px;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 64px;
      align-items: end;
    }
    .hero-left { padding-bottom: 72px; }
    .breadcrumb {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 28px;
      list-style: none;
    }
    .breadcrumb li { display: flex; align-items: center; gap: 8px; }
    .breadcrumb li + li::before {
      content: '/';
      color: rgba(255,255,255,.3);
      font-size: .8rem;
    }
    .breadcrumb a {
      font-size: .83rem;
      color: rgba(255,255,255,.55);
      text-decoration: none;
      transition: color .2s;
    }
    .breadcrumb a:hover { color: var(--white); }
    .breadcrumb span {
      font-size: .83rem;
      color: rgba(255,255,255,.85);
      font-weight: 500;
    }
    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      background: rgba(201,160,64,.15);
      border: 1px solid rgba(201,160,64,.3);
      color: var(--gold-lt);
      font-size: .73rem;
      font-weight: 700;
      letter-spacing: .12em;
      text-transform: uppercase;
      padding: 5px 14px;
      border-radius: 50px;
      margin-bottom: 22px;
    }
    .hero-badge i { font-size: .8rem; }
    .page-hero h1 {
      font-family: var(--font-head);
      font-size: clamp(2.2rem, 4.5vw, 3.4rem);
      color: var(--white);
      margin-bottom: 18px;
      line-height: 1.12;
    }
    .page-hero h1 em {
      font-style: italic;
      color: var(--gold-lt);
    }
    .page-hero .hero-lead {
      font-size: .97rem;
      color: rgba(255,255,255,.68);
      line-height: 1.8;
      margin-bottom: 36px;
      max-width: 480px;
    }
    /* Stats row */
    .hero-stats {
      display: flex;
      gap: 0;
      border: 1px solid rgba(255,255,255,.1);
      border-radius: var(--radius-md);
      overflow: hidden;
      background: rgba(255,255,255,.04);
      backdrop-filter: blur(10px);
    }
    .hero-stat {
      flex: 1;
      padding: 18px 20px;
      text-align: center;
      border-right: 1px solid rgba(255,255,255,.08);
    }
    .hero-stat:last-child { border-right: none; }
    .hero-stat .num {
      font-family: var(--font-head);
      font-size: 1.9rem;
      color: var(--gold-lt);
      line-height: 1;
      margin-bottom: 4px;
    }
    .hero-stat .lbl {
      font-size: .7rem;
      color: rgba(255,255,255,.5);
      font-weight: 500;
      letter-spacing: .02em;
    }

    /* Hero right: image column */
    .hero-right {
      position: relative;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
    }
    .hero-img-stack {
      position: relative;
    }
    .hero-img-main {
      width: 100%;
      height: 400px;
      object-fit: cover;
      border-radius: var(--radius-lg) var(--radius-lg) 0 0;
      display: block;
      filter: brightness(.9);
    }
    .hero-img-overlay {
      position: absolute;
      inset: 0;
      border-radius: var(--radius-lg) var(--radius-lg) 0 0;
      background: linear-gradient(to bottom, transparent 40%, rgba(13,31,60,.55) 100%);
    }
    /* Floating cert card */
    .cert-float {
      position: absolute;
      bottom: 24px; left: -28px;
      background: var(--white);
      border-radius: var(--radius-md);
      padding: 14px 18px;
      display: flex;
      align-items: center;
      gap: 12px;
      box-shadow: var(--shadow-lg);
      border: 1px solid var(--border);
      min-width: 220px;
    }
    .cert-float .cert-icon {
      width: 42px; height: 42px;
      background: linear-gradient(135deg, #fff7e0, #fdeeb5);
      border-radius: var(--radius-sm);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.3rem;
      flex-shrink: 0;
    }
    .cert-float .cert-label { font-size: .7rem; color: var(--muted); margin-bottom: 2px; }
    .cert-float .cert-val { font-size: .88rem; font-weight: 700; color: var(--navy); }
    /* Floating rating card */
    .rating-float {
      position: absolute;
      top: 36px; right: -20px;
      background: var(--navy);
      border-radius: var(--radius-md);
      padding: 14px 18px;
      display: flex;
      align-items: center;
      gap: 12px;
      box-shadow: 0 12px 40px rgba(13,31,60,.35);
      min-width: 180px;
    }
    .rating-float .rf-num {
      font-family: var(--font-head);
      font-size: 2rem;
      color: var(--gold-lt);
      line-height: 1;
    }
    .rating-float .rf-stars { color: var(--gold); font-size: .85rem; letter-spacing: 1px; }
    .rating-float .rf-label { font-size: .7rem; color: rgba(255,255,255,.5); margin-top: 2px; }

    /* =============================================
       SECTION SHARED STYLES
    ============================================= */
    .section-header {
      text-align: center;
      margin-bottom: 60px;
    }
    .section-badge {
      display: inline-block;
      background: #eef2ff;
      color: var(--blue);
      font-size: .72rem;
      font-weight: 700;
      letter-spacing: .12em;
      text-transform: uppercase;
      padding: 5px 16px;
      border-radius: 50px;
      margin-bottom: 16px;
    }
    .section-badge-gold {
      background: #fdf7e8;
      color: #9a740a;
    }
    .section-badge-green {
      background: #e0f7ee;
      color: var(--green);
    }
    .section-title {
      font-family: var(--font-head);
      font-size: clamp(1.7rem, 3.5vw, 2.4rem);
      color: var(--navy);
      margin-bottom: 12px;
      line-height: 1.2;
    }
    .section-sub {
      font-size: .97rem;
      color: var(--muted);
      max-width: 540px;
      margin: 0 auto;
      line-height: 1.75;
    }
    .container-main {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 40px;
    }

    /* =============================================
       VISI MISI — white bg
    ============================================= */
    .vm-section {
      padding: 96px 0 100px;
      background: var(--white);
    }
    .vm-grid {
      display: grid;
      grid-template-columns: 5fr 7fr;
      gap: 28px;
      align-items: stretch;
    }
    /* Visi card — dark */
    .visi-card {
      background: var(--navy);
      border-radius: var(--radius-lg);
      padding: 44px 36px;
      position: relative;
      overflow: hidden;
      display: flex;
      flex-direction: column;
    }
    .visi-card::before {
      content: '';
      position: absolute;
      top: -60px; right: -60px;
      width: 240px; height: 240px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(201,160,64,.14) 0%, transparent 65%);
      pointer-events: none;
    }
    .visi-icon {
      width: 54px; height: 54px;
      background: rgba(201,160,64,.15);
      border-radius: var(--radius-sm);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.4rem;
      color: var(--gold-lt);
      margin-bottom: 22px;
      flex-shrink: 0;
      border: 1px solid rgba(201,160,64,.25);
    }
    .visi-card h4 {
      font-family: var(--font-head);
      font-size: 1.35rem;
      color: var(--gold-lt);
      margin-bottom: 16px;
    }
    .visi-card p {
      font-size: .92rem;
      color: rgba(255,255,255,.72);
      line-height: 1.85;
      flex: 1;
    }
    .visi-quote {
      margin-top: 28px;
      padding-top: 22px;
      border-top: 1px solid rgba(255,255,255,.1);
      font-size: .82rem;
      color: rgba(255,255,255,.4);
      font-style: italic;
    }
    /* Misi card — light */
    .misi-card {
      background: var(--sand);
      border-radius: var(--radius-lg);
      padding: 44px 36px;
      border: 1px solid var(--border);
    }
    .misi-card h4 {
      font-family: var(--font-head);
      font-size: 1.35rem;
      color: var(--navy);
      margin-bottom: 28px;
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .misi-card h4 i {
      width: 38px; height: 38px;
      background: var(--navy);
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--gold);
      font-size: 1rem;
    }
    .misi-list { list-style: none; padding: 0; }
    .misi-list li {
      display: flex;
      gap: 14px;
      align-items: flex-start;
      padding: 14px 0;
      border-bottom: 1px solid var(--border);
    }
    .misi-list li:last-child { border-bottom: none; padding-bottom: 0; }
    .misi-num {
      flex-shrink: 0;
      width: 28px; height: 28px;
      background: var(--navy);
      color: var(--white);
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: .72rem;
      font-weight: 700;
      margin-top: 1px;
    }
    .misi-text {
      font-size: .88rem;
      color: var(--ink);
      line-height: 1.7;
    }

    /* =============================================
       SEJARAH / TIMELINE — sand bg
    ============================================= */
    .sejarah-section {
      padding: 96px 0 100px;
      background: var(--sand);
    }
    .timeline-wrap {
      display: grid;
      grid-template-columns: 1fr 2px 1fr;
      gap: 0 32px;
      max-width: 960px;
      margin: 0 auto;
      position: relative;
    }
    .timeline-line {
      grid-column: 2;
      grid-row: 1 / 99;
      width: 2px;
      background: linear-gradient(to bottom, var(--navy), var(--gold), var(--navy));
      border-radius: 2px;
      position: relative;
    }
    .tl-left  { grid-column: 1; text-align: right; }
    .tl-right { grid-column: 3; }
    .tl-spacer { grid-column: 1; height: 40px; }
    .tl-spacer-r { grid-column: 3; height: 40px; }

    .tl-card {
      background: var(--white);
      border-radius: var(--radius-md);
      padding: 22px 26px;
      border: 1px solid var(--border);
      position: relative;
      margin-bottom: 20px;
      transition: transform .25s var(--ease), box-shadow .25s var(--ease);
    }
    .tl-card:hover {
      transform: translateY(-4px);
      box-shadow: var(--shadow-md);
    }
    /* connector dot on the spine */
    .tl-left .tl-card::after {
      content: '';
      position: absolute;
      right: -44px; top: 22px;
      width: 12px; height: 12px;
      background: var(--gold);
      border-radius: 50%;
      border: 3px solid var(--sand);
      box-shadow: 0 0 0 3px var(--gold);
    }
    .tl-right .tl-card::before {
      content: '';
      position: absolute;
      left: -44px; top: 22px;
      width: 12px; height: 12px;
      background: var(--navy);
      border-radius: 50%;
      border: 3px solid var(--sand);
      box-shadow: 0 0 0 3px var(--navy);
    }
    .tl-year {
      font-size: .72rem;
      font-weight: 700;
      color: var(--gold);
      text-transform: uppercase;
      letter-spacing: .1em;
      margin-bottom: 6px;
    }
    .tl-card h6 {
      font-weight: 700;
      font-size: .93rem;
      color: var(--navy);
      margin-bottom: 6px;
    }
    .tl-card p {
      font-size: .83rem;
      color: var(--muted);
      line-height: 1.7;
    }

    /* =============================================
       REVIEW — white bg
    ============================================= */
    .review-section {
      padding: 96px 0 100px;
      background: var(--white);
    }
    .review-grid {
      display: grid;
      grid-template-columns: 280px 1fr;
      gap: 28px;
      align-items: start;
    }
    /* Score big card */
    .score-card {
      background: var(--navy);
      border-radius: var(--radius-lg);
      padding: 44px 28px 36px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }
    .score-card::before {
      content: '';
      position: absolute;
      bottom: -40px; left: -40px;
      width: 200px; height: 200px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(201,160,64,.12) 0%, transparent 65%);
    }
    .score-card .big-num {
      font-family: var(--font-head);
      font-size: 4.5rem;
      color: var(--gold-lt);
      line-height: 1;
      margin-bottom: 8px;
    }
    .score-card .stars-row {
      color: var(--gold);
      font-size: 1.1rem;
      letter-spacing: 2px;
      margin-bottom: 10px;
    }
    .score-card .score-label {
      font-size: .78rem;
      color: rgba(255,255,255,.55);
      line-height: 1.6;
      margin-bottom: 20px;
    }
    .score-divider { height: 1px; background: rgba(255,255,255,.1); margin: 18px 0; }
    .score-sources {
      display: flex;
      gap: 8px;
      justify-content: center;
      flex-wrap: wrap;
    }
    .score-sources span {
      font-size: .72rem;
      color: rgba(255,255,255,.45);
      background: rgba(255,255,255,.07);
      padding: 4px 10px;
      border-radius: 50px;
    }
    /* Review cards grid */
    .rev-cards-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 18px;
    }
    .rev-card {
      background: var(--sand);
      border-radius: var(--radius-md);
      padding: 26px 22px;
      border: 1px solid var(--border);
      display: flex;
      flex-direction: column;
      transition: transform .25s var(--ease), box-shadow .25s var(--ease);
    }
    .rev-card:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow-md);
    }
    .rev-stars { color: var(--gold); font-size: .85rem; letter-spacing: 1px; margin-bottom: 12px; }
    .rev-text {
      font-size: .86rem;
      color: var(--ink);
      line-height: 1.75;
      font-style: italic;
      flex: 1;
      margin-bottom: 18px;
    }
    .rev-author { display: flex; align-items: center; gap: 10px; }
    .rev-ava {
      width: 38px; height: 38px;
      border-radius: 50%;
      background: var(--navy);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      color: var(--gold);
      font-size: .92rem;
      flex-shrink: 0;
    }
    .rev-name { font-weight: 700; font-size: .85rem; color: var(--navy); }
    .rev-loc { font-size: .73rem; color: var(--muted); }

    /* =============================================
       LEGALITAS — sand bg
    ============================================= */
    .legalitas-section {
      padding: 80px 0 86px;
      background: var(--sand);
    }
    .leg-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 18px;
    }
    .leg-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      padding: 26px 22px;
      display: flex;
      gap: 14px;
      align-items: flex-start;
      transition: transform .22s var(--ease), box-shadow .22s var(--ease);
    }
    .leg-card:hover {
      transform: translateY(-4px);
      box-shadow: var(--shadow-sm);
    }
    .leg-icon {
      width: 46px; height: 46px;
      background: linear-gradient(135deg, #fdf7e8, #fdedb3);
      border-radius: var(--radius-sm);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.3rem;
      color: var(--gold);
      flex-shrink: 0;
      border: 1px solid #fde68a;
    }
    .leg-title { font-weight: 700; font-size: .9rem; color: var(--navy); margin-bottom: 3px; }
    .leg-val { font-size: .78rem; color: var(--muted); }

    /* =============================================
       LOKASI — white bg
    ============================================= */
    .lokasi-section {
      padding: 96px 0 100px;
      background: var(--white);
    }
    .lokasi-grid {
      display: grid;
      grid-template-columns: 2fr 1fr;
      gap: 28px;
    }
    .map-wrap {
      border-radius: var(--radius-lg);
      overflow: hidden;
      box-shadow: var(--shadow-md);
      height: 400px;
      border: 1px solid var(--border);
    }
    .map-wrap iframe {
      width: 100%; height: 100%;
      border: none;
      display: block;
    }
    .kontak-card {
      background: var(--navy);
      border-radius: var(--radius-lg);
      padding: 36px 32px;
      display: flex;
      flex-direction: column;
      gap: 0;
      position: relative;
      overflow: hidden;
    }
    .kontak-card::before {
      content: '';
      position: absolute;
      top: -50px; right: -50px;
      width: 200px; height: 200px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(201,160,64,.1) 0%, transparent 65%);
      pointer-events: none;
    }
    .kontak-card h5 {
      font-family: var(--font-head);
      font-size: 1.2rem;
      color: var(--white);
      margin-bottom: 28px;
    }
    .krow {
      display: flex;
      gap: 14px;
      align-items: flex-start;
      padding: 14px 0;
      border-bottom: 1px solid rgba(255,255,255,.07);
    }
    .krow:last-child { border-bottom: none; padding-bottom: 0; }
    .krow .kic {
      width: 38px; height: 38px;
      background: rgba(201,160,64,.12);
      border-radius: 10px;
      border: 1px solid rgba(201,160,64,.2);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--gold-lt);
      font-size: .95rem;
      flex-shrink: 0;
    }
    .krow .kl { font-size: .7rem; color: rgba(255,255,255,.45); margin-bottom: 2px; }
    .krow .kv { font-size: .87rem; color: var(--white); font-weight: 500; line-height: 1.55; }

    /* =============================================
       CTA BOTTOM — navy
    ============================================= */
    .cta-bottom {
      background: var(--navy);
      padding: 88px 0;
      text-align: center;
      position: relative;
      overflow: hidden;
    }
    .cta-bottom::before {
      content: '';
      position: absolute;
      top: -30%; left: -5%;
      width: 500px; height: 500px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(66,119,232,.2) 0%, transparent 65%);
      pointer-events: none;
    }
    .cta-bottom::after {
      content: '';
      position: absolute;
      bottom: -30%; right: -5%;
      width: 400px; height: 400px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(201,160,64,.1) 0%, transparent 65%);
      pointer-events: none;
    }
    .cta-bottom-inner {
      position: relative;
      z-index: 1;
      max-width: 580px;
      margin: 0 auto;
      padding: 0 24px;
    }
    .cta-bottom h2 {
      font-family: var(--font-head);
      font-size: clamp(1.7rem, 3.5vw, 2.4rem);
      color: var(--white);
      margin-bottom: 14px;
      line-height: 1.2;
    }
    .cta-bottom p {
      font-size: .97rem;
      color: rgba(255,255,255,.7);
      line-height: 1.75;
      margin-bottom: 36px;
    }
    .btn-wa-cta {
      display: inline-flex;
      align-items: center;
      gap: 9px;
      background: var(--green);
      color: var(--white);
      font-family: var(--font-body);
      font-weight: 700;
      font-size: .93rem;
      padding: 15px 34px;
      border-radius: 50px;
      text-decoration: none;
      box-shadow: 0 6px 24px rgba(34,169,103,.4);
      transition: background .22s, transform .2s, box-shadow .22s;
    }
    .btn-wa-cta:hover {
      background: var(--green-lt);
      color: var(--white);
      transform: translateY(-2px);
      box-shadow: 0 10px 32px rgba(34,169,103,.5);
    }

    /* =============================================
       FOOTER — identik dengan layanan.php
    ============================================= */
    .footer {
      background: var(--ink);
      padding: 60px 0 30px;
    }
    .footer-grid {
      max-width: 1100px;
      margin: 0 auto;
      padding: 0 24px;
      display: grid;
      grid-template-columns: 2fr 1fr 1fr;
      gap: 48px;
      margin-bottom: 48px;
    }
    .footer-brand h3 {
      font-family: var(--font-head);
      font-size: 1.3rem;
      color: var(--white);
      margin-bottom: 8px;
    }
    .footer-brand small {
      font-size: .75rem;
      color: rgba(255,255,255,.4);
      letter-spacing: .08em;
      text-transform: uppercase;
      display: block;
      margin-bottom: 16px;
    }
    .footer-brand p {
      font-size: .87rem;
      color: rgba(255,255,255,.5);
      line-height: 1.7;
      margin-bottom: 20px;
    }
    .footer-socials { display: flex; gap: 10px; }
    .footer-socials a {
      width: 36px; height: 36px;
      border-radius: 9px;
      background: rgba(255,255,255,.07);
      display: flex; align-items: center; justify-content: center;
      color: rgba(255,255,255,.6);
      font-size: 1rem;
      text-decoration: none;
      transition: background .2s, color .2s;
    }
    .footer-socials a:hover { background: var(--blue); color: var(--white); }
    .footer-col h4 {
      font-size: .78rem;
      font-weight: 700;
      letter-spacing: .12em;
      text-transform: uppercase;
      color: rgba(255,255,255,.4);
      margin-bottom: 16px;
    }
    .footer-col a {
      display: block;
      font-size: .87rem;
      color: rgba(255,255,255,.6);
      text-decoration: none;
      margin-bottom: 10px;
      transition: color .2s;
    }
    .footer-col a:hover { color: var(--white); }
    .footer-bottom {
      max-width: 1100px;
      margin: 0 auto;
      padding: 24px 24px 0;
      border-top: 1px solid rgba(255,255,255,.07);
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      flex-wrap: wrap;
    }
    .footer-bottom p {
      font-size: .82rem;
      color: rgba(255,255,255,.35);
    }

    /* =============================================
       SCROLL REVEAL
    ============================================= */
    .reveal {
      opacity: 0;
      transform: translateY(24px);
      transition: opacity .55s var(--ease), transform .55s var(--ease);
    }
    .reveal.visible {
      opacity: 1;
      transform: translateY(0);
    }
    .reveal-delay-1 { transition-delay: .07s; }
    .reveal-delay-2 { transition-delay: .14s; }
    .reveal-delay-3 { transition-delay: .21s; }
    .reveal-delay-4 { transition-delay: .28s; }

    /* =============================================
       RESPONSIVE
    ============================================= */
    @media (max-width: 1100px) {
      .page-hero-inner { gap: 40px; padding: 0 24px; }
      .leg-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 960px) {
      .vm-grid { grid-template-columns: 1fr; }
      .review-grid { grid-template-columns: 1fr; }
      .rev-cards-grid { grid-template-columns: repeat(2, 1fr); }
      .lokasi-grid { grid-template-columns: 1fr; }
      .timeline-wrap { grid-template-columns: 1fr; gap: 0; }
      .timeline-line { display: none; }
      .tl-left, .tl-right { grid-column: 1; text-align: left; }
      .tl-left .tl-card::after,
      .tl-right .tl-card::before { display: none; }
      .tl-spacer, .tl-spacer-r { display: none; }
    }
    @media (max-width: 768px) {
      .navbar { padding: 0 20px; }
      .nav-links, .nav-auth { display: none; }
      .nav-toggle { display: flex; }
      .page-hero-inner { grid-template-columns: 1fr; padding: 0 24px; }
      .hero-right { display: none; }
      .hero-left { padding-bottom: 52px; }
      .footer-grid { grid-template-columns: 1fr 1fr; }
      .container-main { padding: 0 24px; }
    }
    @media (max-width: 600px) {
      .rev-cards-grid { grid-template-columns: 1fr; }
      .leg-grid { grid-template-columns: 1fr; }
      .footer-grid { grid-template-columns: 1fr; gap: 32px; }
      .hero-stats { flex-direction: column; border: none; gap: 0; }
      .hero-stat { border-right: none; border-bottom: 1px solid rgba(255,255,255,.08); text-align: left; padding: 14px 0; }
      .hero-stat:last-child { border-bottom: none; }
    }
  </style>
</head>
<body>

<!-- ======================================================
     NAVBAR
====================================================== -->
<nav class="navbar" id="mainNav">
  <div class="nav-inner">
    <a class="nav-logo" href="../index.php">
      <img src="../img/logo.PNG" alt="Nirwana">
      <div class="nav-logo-text">
        Nirwana
        <small>Tour & Travel</small>
      </div>
    </a>

    <ul class="nav-links">
      <li><a href="../index.php">Beranda</a></li>
      <li class="nav-dropdown">
        <a href="../layanan/layanan.php">
          Layanan
          <i class="bi bi-chevron-down caret"></i>
        </a>
        <div class="dropdown-panel">
          <a href="../layanan/layanan.php#keberangkatan">
            <i class="bi bi-calendar2-check"></i>
            Keberangkatan Terdekat
          </a>
          <a href="../layanan/layanan.php#jenis-layanan">
            <i class="bi bi-grid-1x2-fill"></i>
            Jenis-jenis Layanan
          </a>
        </div>
      </li>
      <li><a href="tentang_kami.php" class="active">Tentang Kami</a></li>
    </ul>

    <div class="nav-auth">
      <?php if ($isLoggedIn): ?>
      <div class="profile-box" id="profileBox">
        <div class="profile-trigger" id="profileTrigger">
          <div class="avatar-circle"><?= $avatarLetter ?></div>
          <span class="profile-name"><?= htmlspecialchars($_SESSION['name']) ?></span>
          <i class="bi bi-chevron-down" style="font-size:.72rem;color:rgba(255,255,255,.6)"></i>
        </div>
        <div class="profile-menu">
          <a href="#"><i class="bi bi-bag-check"></i>Pesanan Saya</a>
          <a href="#"><i class="bi bi-person"></i>Profil</a>
          <div class="divider"></div>
          <a href="/nirwanatravel/login/logout.php" class="logout"><i class="bi bi-box-arrow-right"></i>Logout</a>
        </div>
      </div>
      <?php else: ?>
      <a href="../login/login.php" class="btn-login">Masuk</a>
      <?php endif; ?>
    </div>

    <button class="nav-toggle" id="navToggle" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<!-- Mobile Nav -->
<div class="mobile-nav" id="mobileNav">
  <a href="../index.php">Beranda</a>
  <a href="../layanan/layanan.php">Layanan</a>
  <div class="mobile-sub">
    <a href="../layanan/layanan.php#keberangkatan">— Keberangkatan Terdekat</a>
    <a href="../layanan/layanan.php#jenis-layanan">— Jenis-jenis Layanan</a>
  </div>
  <a href="tentang_kami.php">Tentang Kami</a>
  <div class="mobile-auth">
    <?php if ($isLoggedIn): ?>
    <a href="/nirwanatravel/login/logout.php" style="color:rgba(255,255,255,.6)">Logout (<?= htmlspecialchars($_SESSION['name']) ?>)</a>
    <?php else: ?>
    <a href="../login/login.php" style="color:var(--gold-lt);font-weight:600">Masuk ke Akun</a>
    <?php endif; ?>
  </div>
</div>

<!-- ======================================================
     PAGE HERO — TENTANG KAMI
====================================================== -->
<div class="page-hero">
  <div class="hero-accent-bar"></div>
  <div class="page-hero-inner">

    <!-- Left -->
    <div class="hero-left">
      <ol class="breadcrumb">
        <li><a href="../index.php"><i class="bi bi-house-fill"></i> Beranda</a></li>
        <li><span>Tentang Kami</span></li>
      </ol>
      <div class="hero-badge">
        <i class="bi bi-award-fill"></i>
        Berpengalaman Sejak 2005
      </div>
      <h1>Perjalanan Terbaik<br><em>Dimulai dari Sini.</em></h1>
      <p class="hero-lead">Nirwana Tour &amp; Travel hadir sejak 2005 dengan misi sederhana: memberikan pengalaman wisata yang aman, nyaman, dan tak terlupakan bagi setiap pelanggan kami di seluruh Indonesia.</p>
      <div class="hero-stats">
        <div class="hero-stat">
          <div class="num">20+</div>
          <div class="lbl">Tahun Berpengalaman</div>
        </div>
        <div class="hero-stat">
          <div class="num">15K+</div>
          <div class="lbl">Wisatawan Dilayani</div>
        </div>
        <div class="hero-stat">
          <div class="num">100+</div>
          <div class="lbl">Destinasi Tersedia</div>
        </div>
        <div class="hero-stat">
          <div class="num">4.9</div>
          <div class="lbl">Rating Pelanggan</div>
        </div>
      </div>
    </div>

    <!-- Right: image -->
    <div class="hero-right">
      <div class="hero-img-stack">
        <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=760&q=80"
             alt="Tim Nirwana Travel" class="hero-img-main">
        <div class="hero-img-overlay"></div>

        <!-- Floating cards -->
        <div class="cert-float">
          <div class="cert-icon">🏅</div>
          <div>
            <div class="cert-label">Izin Resmi Terdaftar</div>
            <div class="cert-val">SK Kempar No. 021/TA/2005</div>
          </div>
        </div>

        <div class="rating-float">
          <div>
            <div class="rf-num">4.9</div>
            <div class="rf-stars">★★★★★</div>
            <div class="rf-label">1.200+ ulasan</div>
          </div>
          <div style="font-size:1.9rem;line-height:1">🌟</div>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- ======================================================
     VISI & MISI
====================================================== -->
<section class="vm-section" id="visi-misi">
  <div class="container-main">
    <div class="section-header reveal">
      <span class="section-badge section-badge-gold">Nilai Kami</span>
      <h2 class="section-title">Visi &amp; Misi</h2>
      <p class="section-sub">Landasan yang menggerakkan setiap langkah kami dalam melayani wisatawan Indonesia.</p>
    </div>

    <div class="vm-grid reveal">
      <!-- VISI -->
      <div class="visi-card">
        <div class="visi-icon"><i class="bi bi-eye-fill"></i></div>
        <h4>Visi Kami</h4>
        <p>Menjadi biro perjalanan wisata terpercaya dan terkemuka di Indonesia yang mengutamakan kepuasan pelanggan, profesionalisme, dan inovasi layanan dalam setiap perjalanan yang kami hadirkan.</p>
        <div class="visi-quote">"Setiap perjalanan adalah cerita yang layak untuk dikenang."</div>
      </div>

      <!-- MISI -->
      <div class="misi-card">
        <h4>
          <i class="bi bi-bullseye"></i>
          Misi Kami
        </h4>
        <ul class="misi-list">
          <li>
            <span class="misi-num">01</span>
            <span class="misi-text">Menyediakan paket wisata berkualitas dengan harga transparan, kompetitif, dan sesuai kebutuhan pelanggan.</span>
          </li>
          <li>
            <span class="misi-num">02</span>
            <span class="misi-text">Menghadirkan pemandu wisata bersertifikat yang ramah, profesional, dan berpengetahuan luas di setiap destinasi.</span>
          </li>
          <li>
            <span class="misi-num">03</span>
            <span class="misi-text">Memastikan keamanan dan kenyamanan perjalanan mulai dari keberangkatan hingga kepulangan ke tanah air.</span>
          </li>
          <li>
            <span class="misi-num">04</span>
            <span class="misi-text">Memberikan layanan pelanggan responsif 24 jam yang siap membantu sebelum, selama, dan sesudah perjalanan.</span>
          </li>
          <li>
            <span class="misi-num">05</span>
            <span class="misi-text">Terus berinovasi dalam layanan digital untuk kemudahan pemesanan dan komunikasi pelanggan.</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ======================================================
     SEJARAH / TIMELINE
====================================================== -->
<section class="sejarah-section" id="sejarah">
  <div class="container-main">
    <div class="section-header reveal">
      <span class="section-badge">Perjalanan Kami</span>
      <h2 class="section-title">Sejarah Nirwana Travel</h2>
      <p class="section-sub">Dari sebuah kantor kecil di Batu hingga melayani ribuan wisatawan setiap tahunnya.</p>
    </div>

    <div class="timeline-wrap reveal">
      <!-- Row 1: left -->
      <div class="tl-left">
        <div class="tl-card">
          <div class="tl-year">2005 — Berdiri</div>
          <h6>Nirwana Tour &amp; Travel Resmi Didirikan</h6>
          <p>Berawal dari passion perjalanan, Nirwana Travel dibuka di Batu, Jawa Timur, dengan layanan wisata lokal untuk keluarga dan grup.</p>
        </div>
      </div>
      <div class="timeline-line"></div>
      <div class="tl-spacer-r"></div>

      <!-- Row 2: right -->
      <div class="tl-spacer"></div>
      <div></div>
      <div class="tl-right">
        <div class="tl-card">
          <div class="tl-year">2008 — Berkembang</div>
          <h6>Ekspansi ke Wisata Mancanegara</h6>
          <p>Memperluas layanan ke destinasi internasional pertama: Singapura, Malaysia, dan Thailand dengan 500+ wisatawan di tahun pertama.</p>
        </div>
      </div>

      <!-- Row 3: left -->
      <div class="tl-left">
        <div class="tl-card">
          <div class="tl-year">2013 — Legalitas</div>
          <h6>Sertifikasi ASITA &amp; Izin Resmi Kempar</h6>
          <p>Terdaftar sebagai anggota ASITA dan mendapatkan izin operasional resmi dari Kementerian Pariwisata RI.</p>
        </div>
      </div>
      <div></div>
      <div class="tl-spacer-r"></div>

      <!-- Row 4: right -->
      <div class="tl-spacer"></div>
      <div></div>
      <div class="tl-right">
        <div class="tl-card">
          <div class="tl-year">2019 — Digital</div>
          <h6>Transformasi Digital &amp; Platform Online</h6>
          <p>Meluncurkan website dan sistem pemesanan online sehingga pelanggan dapat konsultasi dan booking dari mana saja.</p>
        </div>
      </div>

      <!-- Row 5: left -->
      <div class="tl-left">
        <div class="tl-card">
          <div class="tl-year">2025 — Kini</div>
          <h6>15.000+ Wisatawan &amp; 100+ Destinasi</h6>
          <p>Telah melayani lebih dari 15.000 wisatawan dengan 100+ pilihan destinasi domestik dan internasional setiap tahunnya.</p>
        </div>
      </div>
      <div></div>
      <div class="tl-spacer-r"></div>
    </div>
  </div>
</section>

<!-- ======================================================
     REVIEW PELANGGAN
====================================================== -->
<section class="review-section" id="review">
  <div class="container-main">
    <div class="section-header reveal">
      <span class="section-badge section-badge-green">Testimoni</span>
      <h2 class="section-title">Apa Kata Pelanggan Kami?</h2>
      <p class="section-sub">Ribuan wisatawan puas menjadi bukti nyata komitmen layanan kami setiap harinya.</p>
    </div>

    <div class="review-grid reveal">
      <!-- Score card -->
      <div class="score-card">
        <div class="big-num">4.9</div>
        <div class="stars-row">★★★★★</div>
        <div class="score-label">Rating dari 1.200+ ulasan<br>wisatawan kami</div>
        <div class="score-divider"></div>
        <div class="score-sources">
          <span>📍 Google Maps</span>
          <span>✈️ Tripadvisor</span>
        </div>
      </div>

      <!-- Review cards -->
      <div class="rev-cards-grid">
        <div class="rev-card reveal reveal-delay-1">
          <div class="rev-stars">★★★★★</div>
          <p class="rev-text">"Paket Eropa yang kami pilih luar biasa! Semua sudah terurus dengan baik, mulai visa sampai hotel. Guide-nya ramah dan informatif sekali."</p>
          <div class="rev-author">
            <div class="rev-ava">A</div>
            <div>
              <div class="rev-name">Ahmad Fauzi</div>
              <div class="rev-loc">Jakarta Selatan</div>
            </div>
          </div>
        </div>
        <div class="rev-card reveal reveal-delay-2">
          <div class="rev-stars">★★★★★</div>
          <p class="rev-text">"Honeymoon ke Bali bersama Nirwana Travel benar-benar berkesan. Romantis, nyaman, dan tidak ada kendala sama sekali!"</p>
          <div class="rev-author">
            <div class="rev-ava">R</div>
            <div>
              <div class="rev-name">Rini &amp; Andi</div>
              <div class="rev-loc">Surabaya</div>
            </div>
          </div>
        </div>
        <div class="rev-card reveal reveal-delay-3">
          <div class="rev-stars">★★★★☆</div>
          <p class="rev-text">"Wisata religi ke Turki sangat berkesan. Penginapannya bersih, makanan halal semua, dan jadwalnya tertib banget."</p>
          <div class="rev-author">
            <div class="rev-ava">S</div>
            <div>
              <div class="rev-name">Siti Mardiyah</div>
              <div class="rev-loc">Malang</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======================================================
     LEGALITAS
====================================================== -->
<section class="legalitas-section" id="legalitas">
  <div class="container-main">
    <div class="section-header reveal">
      <span class="section-badge section-badge-gold">Legalitas</span>
      <h2 class="section-title">Terdaftar &amp; Berizin Resmi</h2>
      <p class="section-sub">Operasional kami didukung izin dan keanggotaan resmi dari lembaga berwenang.</p>
    </div>
    <div class="leg-grid reveal">
      <div class="leg-card">
        <div class="leg-icon"><i class="bi bi-building-check"></i></div>
        <div>
          <div class="leg-title">SK Kempar RI</div>
          <div class="leg-val">No. 021/TA/2005</div>
        </div>
      </div>
      <div class="leg-card">
        <div class="leg-icon"><i class="bi bi-award-fill"></i></div>
        <div>
          <div class="leg-title">Anggota ASITA</div>
          <div class="leg-val">Asosiasi Travel Indonesia</div>
        </div>
      </div>
      <div class="leg-card">
        <div class="leg-icon"><i class="bi bi-airplane-fill"></i></div>
        <div>
          <div class="leg-title">IATA Certified</div>
          <div class="leg-val">International Air Transport</div>
        </div>
      </div>
      <div class="leg-card">
        <div class="leg-icon"><i class="bi bi-shield-fill-check"></i></div>
        <div>
          <div class="leg-title">PT Nirwana Wisata</div>
          <div class="leg-val">Akte Notaris No. 07/2005</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======================================================
     PETA LOKASI & KONTAK
====================================================== -->
<section class="lokasi-section" id="lokasi">
  <div class="container-main">
    <div class="section-header reveal">
      <span class="section-badge">Kantor Kami</span>
      <h2 class="section-title">Temukan Kami di Sini</h2>
      <p class="section-sub">Kunjungi kantor kami atau hubungi tim kami kapan saja untuk konsultasi perjalanan Anda.</p>
    </div>
    <div class="lokasi-grid reveal">
      <div class="map-wrap">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.552!2d122.5231!3d-7.8686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd629b!2sBatu%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1"
          allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
      <div class="kontak-card">
        <h5><i class="bi bi-geo-alt-fill" style="color:var(--gold-lt);margin-right:8px;"></i>Informasi Kontak</h5>
        <div class="krow">
          <div class="kic"><i class="bi bi-geo-alt-fill"></i></div>
          <div>
            <div class="kl">Alamat Kantor</div>
            <div class="kv">Jl. Diponegoro No. 45,<br>Kota Batu, Jawa Timur 65314</div>
          </div>
        </div>
        <div class="krow">
          <div class="kic"><i class="bi bi-whatsapp"></i></div>
          <div>
            <div class="kl">WhatsApp</div>
            <div class="kv">+62 823-2424-6645</div>
          </div>
        </div>
        <div class="krow">
          <div class="kic"><i class="bi bi-telephone-fill"></i></div>
          <div>
            <div class="kl">Telepon Kantor</div>
            <div class="kv">(0341) 592-1234</div>
          </div>
        </div>
        <div class="krow">
          <div class="kic"><i class="bi bi-envelope-fill"></i></div>
          <div>
            <div class="kl">Email</div>
            <div class="kv">info@nirwanatravel.id</div>
          </div>
        </div>
        <div class="krow">
          <div class="kic"><i class="bi bi-clock-fill"></i></div>
          <div>
            <div class="kl">Jam Operasional</div>
            <div class="kv">Senin – Sabtu: 08.00–17.00 WIB</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ======================================================
     CTA BOTTOM
====================================================== -->
<section class="cta-bottom">
  <div class="cta-bottom-inner">
    <h2>Siap Merencanakan Perjalanan Impian Anda?</h2>
    <p>Konsultasi gratis dengan tim kami. Kami bantu pilihkan paket terbaik sesuai kebutuhan dan budget Anda.</p>
    <a href="https://wa.me/6282324246645?text=Halo%2C%20saya%20ingin%20konsultasi%20tentang%20Nirwana%20Tour%20%26%20Travel."
       target="_blank" rel="noopener" class="btn-wa-cta">
      <i class="bi bi-whatsapp"></i> Konsultasi Gratis via WhatsApp
    </a>
  </div>
</section>

<!-- ======================================================
     FOOTER
====================================================== -->
<footer class="footer">
  <div class="footer-grid">
    <div class="footer-brand">
      <h3>Nirwana Tour & Travel</h3>
      <small>Since 2005</small>
      <p>Mitra perjalanan terpercaya Anda. Kami menghadirkan pengalaman wisata yang tak terlupakan dengan layanan profesional dan harga transparan.</p>
      <div class="footer-socials">
        <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://wa.me/6282324246645" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
        <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
      </div>
    </div>
    <div class="footer-col">
      <h4>Navigasi</h4>
      <a href="../index.php">Beranda</a>
      <a href="../layanan/layanan.php">Layanan</a>
      <a href="tentang_kami.php">Tentang Kami</a>
    </div>
    <div class="footer-col">
      <h4>Kontak</h4>
      <a href="tel:+6282324246645"><i class="bi bi-telephone" style="margin-right:6px;"></i>+62 823-2424-6645</a>
      <a href="https://wa.me/6282324246645"><i class="bi bi-whatsapp" style="margin-right:6px;"></i>+62 823-2424-6645</a>
      <a href="mailto:info@nirwanatravel.id"><i class="bi bi-envelope" style="margin-right:6px;"></i>info@nirwanatravel.id</a>
    </div>
  </div>
  <div class="footer-bottom">
    <p>&copy; <?= date('Y') ?> Nirwana Tour & Travel. Hak cipta dilindungi.</p>
    <p>Berizin resmi — Terdaftar Kemenparekraf</p>
  </div>
</footer>

<script>
(function () {
  /* ---- Mobile nav toggle ---- */
  const toggle    = document.getElementById('navToggle');
  const mobileNav = document.getElementById('mobileNav');

  toggle.addEventListener('click', () => {
    const isOpen = toggle.classList.toggle('open');
    mobileNav.classList.toggle('open', isOpen);
    mobileNav.style.display = isOpen ? 'block' : 'none';
  });

  mobileNav.querySelectorAll('a').forEach(a => {
    a.addEventListener('click', () => {
      toggle.classList.remove('open');
      mobileNav.classList.remove('open');
      mobileNav.style.display = 'none';
    });
  });

  /* ---- Profile dropdown ---- */
  const profileBox     = document.getElementById('profileBox');
  const profileTrigger = document.getElementById('profileTrigger');
  if (profileBox && profileTrigger) {
    profileTrigger.addEventListener('click', e => {
      e.stopPropagation();
      profileBox.classList.toggle('open');
    });
    document.addEventListener('click', () => profileBox.classList.remove('open'));
  }

  /* ---- Scroll reveal ---- */
  if ('IntersectionObserver' in window) {
    const els = document.querySelectorAll('.reveal');
    const io = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          e.target.classList.add('visible');
          io.unobserve(e.target);
        }
      });
    }, { threshold: 0.1 });
    els.forEach(el => io.observe(el));
  } else {
    document.querySelectorAll('.reveal').forEach(el => el.classList.add('visible'));
  }

  /* ---- Smooth scroll untuk anchor ---- */
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        const offset = 72;
        const top = target.getBoundingClientRect().top + window.scrollY - offset;
        window.scrollTo({ top, behavior: 'smooth' });
      }
    });
  });
})();
</script>
</body>
</html>