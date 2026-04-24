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
  <title>Layanan — Nirwana Tour & Travel</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    /* =============================================
       DESIGN TOKENS (identik dengan index.php)
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
       NAVBAR (sama persis dengan index.php)
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
       PAGE HERO
    ============================================= */
    .page-hero {
      background: var(--navy);
      padding: calc(var(--nav-h) + 60px) 0 64px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }
    .page-hero::before {
      content: '';
      position: absolute;
      top: -30%; left: -5%;
      width: 500px; height: 500px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(66,119,232,.18) 0%, transparent 65%);
      pointer-events: none;
    }
    .page-hero::after {
      content: '';
      position: absolute;
      bottom: -40%; right: 0%;
      width: 400px; height: 400px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(201,160,64,.1) 0%, transparent 65%);
      pointer-events: none;
    }
    .page-hero-inner {
      position: relative;
      z-index: 1;
      max-width: 640px;
      margin: 0 auto;
      padding: 0 24px;
    }
    .breadcrumb {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      margin-bottom: 22px;
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
      color: rgba(255,255,255,.6);
      text-decoration: none;
      transition: color .2s;
    }
    .breadcrumb a:hover { color: var(--white); }
    .breadcrumb span {
      font-size: .83rem;
      color: rgba(255,255,255,.85);
      font-weight: 500;
    }
    .page-hero h1 {
      font-family: var(--font-head);
      font-size: clamp(2rem, 4.5vw, 3rem);
      color: var(--white);
      margin-bottom: 14px;
      line-height: 1.15;
    }
    .page-hero p {
      font-size: .97rem;
      color: rgba(255,255,255,.72);
      line-height: 1.75;
    }

    /* =============================================
       STICKY TABS
    ============================================= */
    .tabs-bar {
      position: sticky;
      top: var(--nav-h);
      z-index: 100;
      background: var(--white);
      border-bottom: 2px solid var(--border);
      box-shadow: 0 2px 12px rgba(13,31,60,.06);
    }
    .tabs-inner {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 24px;
      display: flex;
      gap: 0;
      overflow-x: auto;
      scrollbar-width: none;
    }
    .tabs-inner::-webkit-scrollbar { display: none; }
    .tab-link {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      padding: 17px 26px;
      font-family: var(--font-body);
      font-size: .88rem;
      font-weight: 600;
      color: var(--muted);
      text-decoration: none;
      border-bottom: 3px solid transparent;
      margin-bottom: -2px;
      white-space: nowrap;
      transition: color .2s, border-color .2s;
    }
    .tab-link:hover { color: var(--navy); }
    .tab-link.active {
      color: var(--navy);
      border-bottom-color: var(--navy);
    }
    .tab-link i { font-size: .95rem; }

    /* =============================================
       JADWAL SECTION
    ============================================= */
    .jadwal-section {
      padding: 90px 0 100px;
      background: var(--sand);
    }
    .section-header {
      text-align: center;
      margin-bottom: 56px;
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
      max-width: 560px;
      margin: 0 auto;
      line-height: 1.75;
    }
    .jadwal-list {
      max-width: 900px;
      margin: 0 auto;
      padding: 0 24px;
    }

    /* Jadwal card */
    .jadwal-card {
      display: flex;
      align-items: center;
      gap: 20px;
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      padding: 20px 24px;
      margin-bottom: 14px;
      transition: transform .22s var(--ease), box-shadow .22s var(--ease);
    }
    .jadwal-card:hover {
      transform: translateY(-3px);
      box-shadow: var(--shadow-md);
    }
    .date-box {
      background: var(--green);
      border-radius: var(--radius-sm);
      padding: 10px 14px;
      text-align: center;
      min-width: 68px;
      flex-shrink: 0;
    }
    .date-box .day {
      font-family: var(--font-head);
      font-size: 1.6rem;
      color: var(--white);
      line-height: 1;
    }
    .date-box .month {
      font-size: .7rem;
      color: rgba(255,255,255,.8);
      margin-top: 2px;
      font-weight: 500;
      letter-spacing: .05em;
    }
    .jadwal-info { flex: 1; min-width: 0; }
    .jadwal-info h6 {
      font-weight: 700;
      font-size: .97rem;
      color: var(--navy);
      margin-bottom: 6px;
      display: flex;
      align-items: center;
      gap: 8px;
      flex-wrap: wrap;
    }
    .seat-badge {
      font-size: .68rem;
      font-weight: 700;
      background: #fff3cd;
      color: #856404;
      padding: 3px 9px;
      border-radius: 50px;
      border: 1px solid #ffd97a;
    }
    .jadwal-tags { display: flex; flex-wrap: wrap; gap: 6px; margin: 7px 0; }
    .tag {
      font-size: .72rem;
      font-weight: 600;
      padding: 3px 10px;
      border-radius: 50px;
    }
    .tag-blue { background: #dbeafe; color: #1d4ed8; }
    .tag-red  { background: #fee2e2; color: #b91c1c; }
    .jadwal-hotel {
      font-size: .83rem;
      color: var(--muted);
    }
    .jadwal-hotel strong { color: var(--ink); font-weight: 500; }
    .jadwal-price { text-align: right; flex-shrink: 0; min-width: 110px; }
    .jadwal-price .label { font-size: .72rem; color: var(--muted); margin-bottom: 3px; }
    .jadwal-price .amount {
      font-family: var(--font-head);
      font-size: 1.5rem;
      color: var(--green);
      line-height: 1.1;
    }
    .jadwal-price .unit {
      font-size: .78rem;
      color: var(--muted);
      font-family: var(--font-body);
    }
    .btn-konsultasi {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      background: var(--green);
      color: var(--white);
      font-weight: 600;
      font-size: .83rem;
      padding: 10px 18px;
      border-radius: var(--radius-sm);
      text-decoration: none;
      white-space: nowrap;
      flex-shrink: 0;
      transition: background .2s, transform .15s;
    }
    .btn-konsultasi:hover {
      background: var(--green-lt);
      color: var(--white);
      transform: translateY(-1px);
    }

    /* jadwal toggle */
    .jadwal-extra { display: none; }
    .jadwal-extra.show { display: flex; }

    .btn-toggle {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: transparent;
      border: 2px solid var(--navy-mid);
      color: var(--navy-mid);
      font-family: var(--font-body);
      font-weight: 600;
      font-size: .88rem;
      padding: 10px 26px;
      border-radius: 50px;
      cursor: pointer;
      transition: background .2s, color .2s;
    }
    .btn-toggle:hover,
    .btn-toggle.expanded {
      background: var(--navy-mid);
      color: var(--white);
    }

    /* =============================================
       JENIS LAYANAN SECTION
    ============================================= */
    .layanan-section {
      padding: 90px 0 100px;
      background: var(--white);
    }
    .layanan-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 22px;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 24px;
    }
    .layanan-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      overflow: hidden;
      transition: transform .28s var(--ease), box-shadow .28s var(--ease);
      display: flex;
      flex-direction: column;
    }
    .layanan-card:hover {
      transform: translateY(-7px);
      box-shadow: var(--shadow-lg);
    }
    .card-thumb {
      height: 120px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2.8rem;
      flex-shrink: 0;
    }
    .thumb-1 { background: linear-gradient(135deg, #cfe8ff, #a8d4ff); }
    .thumb-2 { background: linear-gradient(135deg, #d1fae5, #a7f3d0); }
    .thumb-3 { background: linear-gradient(135deg, #fef3c7, #fde68a); }
    .thumb-4 { background: linear-gradient(135deg, #ede9fe, #ddd6fe); }
    .thumb-5 { background: linear-gradient(135deg, #fce7f3, #fbcfe8); }
    .thumb-6 { background: linear-gradient(135deg, #ffedd5, #fed7aa); }
    .thumb-7 { background: linear-gradient(135deg, #ecfdf5, #a7f3d0); }
    .thumb-8 { background: linear-gradient(135deg, #e0f2fe, #bae6fd); }
    .card-body {
      padding: 20px 22px 22px;
      flex: 1;
      display: flex;
      flex-direction: column;
    }
    .card-title {
      font-weight: 700;
      font-size: .97rem;
      color: var(--navy);
      margin-bottom: 8px;
    }
    .card-text {
      font-size: .85rem;
      color: var(--muted);
      line-height: 1.65;
      flex: 1;
      margin-bottom: 18px;
    }
    .btn-detail {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: var(--navy);
      color: var(--white);
      font-weight: 600;
      font-size: .85rem;
      padding: 10px 18px;
      border-radius: var(--radius-sm);
      text-decoration: none;
      align-self: flex-start;
      transition: background .2s, transform .15s;
    }
    .btn-detail:hover {
      background: var(--blue);
      color: var(--white);
      transform: translateY(-1px);
    }

    /* =============================================
       CTA BAWAH
    ============================================= */
    .cta-bottom {
      background: var(--navy);
      padding: 80px 0;
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
    .cta-bottom-inner {
      position: relative;
      z-index: 1;
      max-width: 580px;
      margin: 0 auto;
      padding: 0 24px;
    }
    .cta-bottom h2 {
      font-family: var(--font-head);
      font-size: clamp(1.7rem, 3.5vw, 2.3rem);
      color: var(--white);
      margin-bottom: 14px;
      line-height: 1.2;
    }
    .cta-bottom p {
      font-size: .97rem;
      color: rgba(255,255,255,.7);
      line-height: 1.75;
      margin-bottom: 32px;
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
      padding: 14px 32px;
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
       FOOTER
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
       RESPONSIVE
    ============================================= */
    @media (max-width: 1100px) {
      .layanan-grid { grid-template-columns: repeat(3, 1fr); }
    }
    @media (max-width: 900px) {
      .layanan-grid { grid-template-columns: repeat(2, 1fr); }
      .footer-grid { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 768px) {
      .navbar { padding: 0 20px; }
      .nav-links, .nav-auth { display: none; }
      .nav-toggle { display: flex; }
      .jadwal-card { flex-wrap: wrap; }
      .jadwal-price { min-width: auto; }
    }
    @media (max-width: 640px) {
      .layanan-grid { grid-template-columns: 1fr; }
      .footer-grid { grid-template-columns: 1fr; gap: 32px; }
      .jadwal-card { flex-direction: column; align-items: flex-start; }
      .jadwal-price { text-align: left; }
    }
  </style>
</head>
<body>

<!-- ======================================================
     NAVBAR
====================================================== -->
<nav class="navbar" id="mainNav">
  <div class="nav-inner">
    <a class="nav-logo" href="index.php">
      <img src="../img/logo.PNG" alt="Nirwana">
      <div class="nav-logo-text">
        Nirwana
        <small>Tour & Travel</small>
      </div>
    </a>

    <ul class="nav-links">
      <li><a href="../index.php">Beranda</a></li>
      <li class="nav-dropdown">
        <a href="layanan.php" class="active">
          Layanan
          <i class="bi bi-chevron-down caret"></i>
        </a>
        <div class="dropdown-panel">
          <a href="#keberangkatan">
            <i class="bi bi-calendar2-check"></i>
            Keberangkatan Terdekat
          </a>
          <a href="#jenis-layanan">
            <i class="bi bi-grid-1x2-fill"></i>
            Jenis-jenis Layanan
          </a>
        </div>
      </li>
      <li><a href="../tentang/tentang_kami.php">Tentang Kami</a></li>
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
          <a href="#"><i class="bi bi-bag-check me-1"></i>Pesanan Saya</a>
          <a href="#"><i class="bi bi-person me-1"></i>Profil</a>
          <div class="divider"></div>
          <a href="/nirwanatravel/login/logout.php" class="logout"><i class="bi bi-box-arrow-right me-1"></i>Logout</a>
        </div>
      </div>
      <?php else: ?>
      <a href="login/login.php" class="btn-login">Masuk</a>
      <?php endif; ?>
    </div>

    <button class="nav-toggle" id="navToggle" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<!-- Mobile Nav -->
<div class="mobile-nav" id="mobileNav">
  <a href="index.php">Beranda</a>
  <a href="layanan.php">Layanan</a>
  <div class="mobile-sub">
    <a href="#keberangkatan">— Keberangkatan Terdekat</a>
    <a href="#jenis-layanan">— Jenis-jenis Layanan</a>
  </div>
  <a href="tentang/tentang_kami.php">Tentang Kami</a>
  <div class="mobile-auth">
    <?php if ($isLoggedIn): ?>
    <a href="/nirwanatravel/login/logout.php" style="color:rgba(255,255,255,.6)">Logout (<?= htmlspecialchars($_SESSION['name']) ?>)</a>
    <?php else: ?>
    <a href="login/login.php" style="color:var(--gold-lt);font-weight:600">Masuk ke Akun</a>
    <?php endif; ?>
  </div>
</div>

<!-- ======================================================
     PAGE HERO
====================================================== -->
<div class="page-hero">
  <div class="page-hero-inner">
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="bi bi-house-fill"></i> Beranda</a></li>
      <li><span>Layanan</span></li>
    </ol>
    <h1>Layanan Nirwana<br>Tour & Travel</h1>
    <p>Jadwal keberangkatan terkini dan pilihan layanan lengkap untuk perjalanan impian Anda.</p>
  </div>
</div>

<!-- ======================================================
     STICKY TABS
====================================================== -->
<div class="tabs-bar" id="tabsBar">
  <div class="tabs-inner">
    <a href="#keberangkatan" class="tab-link active" id="tab-jadwal">
      <i class="bi bi-calendar2-check"></i>
      Keberangkatan Terdekat
    </a>
    <a href="#jenis-layanan" class="tab-link" id="tab-layanan">
      <i class="bi bi-grid-1x2-fill"></i>
      Jenis-jenis Layanan
    </a>
  </div>
</div>

<!-- ======================================================
     KEBERANGKATAN TERDEKAT
====================================================== -->
<section class="jadwal-section" id="keberangkatan">
  <div class="section-header">
    <span class="section-badge section-badge-green">🕐 Jadwal</span>
    <h2 class="section-title">Keberangkatan Terdekat</h2>
    <p class="section-sub">Berpengalaman lebih dari 10 tahun di bidang travel, selalu memberikan layanan terbaik untuk kenyamanan perjalanan Anda dan keluarga.</p>
  </div>

  <?php
  $jadwal = [
    ['tgl'=>'15','bln'=>'Sep 2026','nama'=>'Paket Wisata Eropa 10 Hari',    'tags'=>['Direct','Tour TH'],    'hotel_a'=>'Grand Sahid',       'hotel_b'=>'Pullman Zamzam',     'harga'=>'32,9','seat'=>true],
    ['tgl'=>'20','bln'=>'Jun 2026','nama'=>'Paket Wisata Jepang 9 Hari',    'tags'=>['Transit'],             'hotel_a'=>'Dormy Inn',          'hotel_b'=>'Mercure Tokyo',      'harga'=>'24,9','seat'=>true],
    ['tgl'=>'01','bln'=>'Sep 2026','nama'=>'Paket Bali Honeymoon 7 Hari',   'tags'=>['Direct','Tour TH'],    'hotel_a'=>'Kempinski Nusa Dua', 'hotel_b'=>'The Layar',          'harga'=>'31,8','seat'=>true],
    ['tgl'=>'01','bln'=>'Okt 2026','nama'=>'Paket Lombok Sumbawa 8 Hari',   'tags'=>['Direct','Tour TH'],    'hotel_a'=>'Qunci Villas',       'hotel_b'=>'Amanjiwo',           'harga'=>'31,8','seat'=>true],
    ['tgl'=>'18','bln'=>'Jun 2026','nama'=>'Paket Turki Murah 10 Hari',     'tags'=>['Direct','Tour TH'],    'hotel_a'=>'Delphin Palace',     'hotel_b'=>'CVK Park Bosphorus', 'harga'=>'28,9','seat'=>true],
    ['tgl'=>'04','bln'=>'Jul 2026','nama'=>'Paket Raja Ampat 6 Hari',       'tags'=>['Direct','Tour TH'],    'hotel_a'=>'Papua Paradise',     'hotel_b'=>'Misool Eco Resort',  'harga'=>'28,9','seat'=>true],
    ['tgl'=>'04','bln'=>'Sep 2026','nama'=>'Paket Korea Selatan 9 Hari',    'tags'=>['Direct','Tour TH'],    'hotel_a'=>'Lotte City Hotel',   'hotel_b'=>'Shilla Stay',        'harga'=>'28,9','seat'=>true],
    ['tgl'=>'18','bln'=>'Jun 2026','nama'=>'Paket Dubai Mewah 8 Hari',      'tags'=>['Transit','Tour TH'],   'hotel_a'=>'Address Downtown',   'hotel_b'=>'Atlantis Palm',      'harga'=>'28,5','seat'=>true],
  ];
  ?>

  <div class="jadwal-list">
    <?php foreach ($jadwal as $idx => $j):
      $isExtra = $idx >= 3;
      $cls = $isExtra ? 'jadwal-card jadwal-extra' : 'jadwal-card';
    ?>
    <div class="<?= $cls ?>">
      <div class="date-box">
        <div class="day"><?= $j['tgl'] ?></div>
        <div class="month"><?= $j['bln'] ?></div>
      </div>

      <div class="jadwal-info">
        <h6>
          <?= htmlspecialchars($j['nama']) ?>
          <?php if ($j['seat']): ?>
          <span class="seat-badge">Seat Terbatas</span>
          <?php endif; ?>
        </h6>
        <div class="jadwal-tags">
          <?php foreach ($j['tags'] as $tag): ?>
          <span class="tag <?= $tag === 'Transit' ? 'tag-red' : 'tag-blue' ?>"><?= $tag ?></span>
          <?php endforeach; ?>
        </div>
        <div class="jadwal-hotel">
          Hotel A: <strong><?= htmlspecialchars($j['hotel_a']) ?></strong>
          &nbsp;·&nbsp;
          Hotel B: <strong><?= htmlspecialchars($j['hotel_b']) ?></strong>
        </div>
      </div>

      <div class="jadwal-price">
        <div class="label">Harga Mulai</div>
        <div class="amount"><?= $j['harga'] ?> <span class="unit">Juta</span></div>
      </div>

      <a href="https://wa.me/6282324246645?text=Halo%2C%20saya%20tertarik%20dengan%20<?= urlencode($j['nama']) ?>%20Nirwana%20Tour%20%26%20Travel."
         target="_blank" rel="noopener" class="btn-konsultasi">
        <i class="bi bi-whatsapp"></i> Konsultasi
      </a>
    </div>
    <?php endforeach; ?>

    <div style="text-align:center;margin-top:32px;">
      <button class="btn-toggle" id="btnToggleJadwal" onclick="toggleJadwal(this)">
        <i class="bi bi-calendar3"></i> Tanggal Lainnya
      </button>
    </div>
  </div>
</section>

<!-- ======================================================
     JENIS LAYANAN
====================================================== -->
<section class="layanan-section" id="jenis-layanan">
  <div class="section-header">
    <span class="section-badge">Layanan Kami</span>
    <h2 class="section-title">Jenis-jenis Layanan</h2>
    <p class="section-sub">Berbagai pilihan perjalanan terbaik, dirancang untuk kenyamanan Anda</p>
  </div>

  <?php
  $layanan = [
    ['icon'=>'🏝️','thumb'=>'thumb-1','judul'=>'Paket Wisata Lokal',       'desc'=>'Nikmati keindahan wisata nusantara dengan paket perjalanan terjangkau dan menyenangkan.','link'=>'../detail/detail_layanan.php?id=1'],
    ['icon'=>'✈️','thumb'=>'thumb-2','judul'=>'Paket Wisata Mancanegara', 'desc'=>'Jelajahi berbagai destinasi luar negeri dengan layanan lengkap dan terpercaya.',         'link'=>'../detail/detail_layanan.php?id=2'],
    ['icon'=>'🎫','thumb'=>'thumb-3','judul'=>'Tiket Pesawat',             'desc'=>'Pesan tiket pesawat domestik maupun internasional dengan harga kompetitif.',              'link'=>'../detail/detail_layanan.php?id=3'],
    ['icon'=>'🚌','thumb'=>'thumb-4','judul'=>'Sewa Kendaraan',            'desc'=>'Armada kendaraan nyaman dan bersih siap menemani perjalanan wisata Anda.',                'link'=>'../detail/detail_layanan.php?id=4'],
    ['icon'=>'🏨','thumb'=>'thumb-5','judul'=>'Hotel & Penginapan',        'desc'=>'Pilihan akomodasi terbaik dari budget hingga bintang lima di berbagai kota.',             'link'=>'../detail/detail_layanan.php?id=5'],
    ['icon'=>'💑','thumb'=>'thumb-6','judul'=>'Paket Honeymoon',           'desc'=>'Rayakan momen spesial bersama pasangan dengan paket romantis pilihan kami.',              'link'=>'../detail/detail_layanan.php?id=6'],
    ['icon'=>'🕌','thumb'=>'thumb-7','judul'=>'Wisata Religi',             'desc'=>'Perjalanan spiritual penuh makna ke destinasi religi dalam dan luar negeri.',             'link'=>'../detail/detail_layanan.php?id=7'],
    ['icon'=>'👥','thumb'=>'thumb-8','judul'=>'Paket Grup & Rombongan',    'desc'=>'Layanan wisata khusus grup, instansi, maupun corporate dengan harga spesial.',           'link'=>'../detail/detail_layanan.php?id=8'],
  ];
  ?>

  <div class="layanan-grid">
    <?php foreach ($layanan as $item): ?>
    <div class="layanan-card">
      <div class="card-thumb <?= $item['thumb'] ?>"><?= $item['icon'] ?></div>
      <div class="card-body">
        <h5 class="card-title"><?= htmlspecialchars($item['judul']) ?></h5>
        <p class="card-text"><?= htmlspecialchars($item['desc']) ?></p>
        <a href="<?= htmlspecialchars($item['link']) ?>" class="btn-detail">
          Lihat Detail <i class="bi bi-arrow-right"></i>
        </a>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ======================================================
     CTA BAWAH
====================================================== -->
<section class="cta-bottom">
  <div class="cta-bottom-inner">
    <h2>Siap Merencanakan Perjalanan Anda?</h2>
    <p>Hubungi tim kami sekarang dan dapatkan konsultasi gratis untuk memilih paket terbaik.</p>
    <a href="https://wa.me/6282324246645?text=Halo%2C%20saya%20ingin%20konsultasi%20paket%20wisata%20Nirwana%20Tour%20%26%20Travel."
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
      <a href="index.php">Beranda</a>
      <a href="layanan.php">Layanan</a>
      <a href="tentang/tentang_kami.php">Tentang Kami</a>
    </div>
    <div class="footer-col">
      <h4>Kontak</h4>
      <a href="tel:+6282324246645"><i class="bi bi-telephone me-1"></i>+62 823-2424-6645</a>
      <a href="https://wa.me/+6282324246645"><i class="bi bi-whatsapp me-1"></i>+62 823-2424-6645</a>
      <a href="mailto:info@nirwanatravel.id"><i class="bi bi-envelope me-1"></i>info@nirwanatravel.id</a>
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
  const toggle   = document.getElementById('navToggle');
  const mobileNav = document.getElementById('mobileNav');

  toggle.addEventListener('click', () => {
    const isOpen = toggle.classList.toggle('open');
    mobileNav.classList.toggle('open', isOpen);
    mobileNav.style.display = isOpen ? 'block' : 'none';
  });

  /* ---- Close mobile nav on link click ---- */
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

  /* ---- Toggle jadwal tersembunyi ---- */
  window.toggleJadwal = function (btn) {
    const extras = document.querySelectorAll('.jadwal-extra');
    const isOpen = btn.classList.contains('expanded');

    extras.forEach(el => {
      el.classList.toggle('show', !isOpen);
    });
    btn.classList.toggle('expanded', !isOpen);

    if (isOpen) {
      btn.innerHTML = '<i class="bi bi-calendar3"></i> Tanggal Lainnya';
    } else {
      btn.innerHTML = '<i class="bi bi-chevron-up"></i> Sembunyikan';
    }
  };

  /* ---- Smooth scroll untuk anchor ---- */
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        const offset = 72 + 52; /* nav height + tab height */
        const top = target.getBoundingClientRect().top + window.scrollY - offset;
        window.scrollTo({ top, behavior: 'smooth' });
      }
    });
  });

  /* ---- Auto scroll ke hash setelah page load ---- */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      const target = document.querySelector(window.location.hash);
      if (target) {
        setTimeout(() => {
          const offset = 72 + 52;
          const top = target.getBoundingClientRect().top + window.scrollY - offset;
          window.scrollTo({ top, behavior: 'smooth' });
        }, 350);
      }
    }
  });

  /* ---- Tab highlight on scroll ---- */
  const sectionMap = {
    'keberangkatan': document.getElementById('tab-jadwal'),
    'jenis-layanan': document.getElementById('tab-layanan'),
  };
  const tabLinks = [
    document.getElementById('tab-jadwal'),
    document.getElementById('tab-layanan'),
  ];

  const io = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        tabLinks.forEach(t => t && t.classList.remove('active'));
        const tab = sectionMap[entry.target.id];
        if (tab) tab.classList.add('active');
      }
    });
  }, { rootMargin: '-30% 0px -60% 0px' });

  Object.keys(sectionMap).forEach(id => {
    const el = document.getElementById(id);
    if (el) io.observe(el);
  });

  /* ---- Scroll-reveal for layanan cards ---- */
  if ('IntersectionObserver' in window) {
    const cards = document.querySelectorAll('.layanan-card, .jadwal-card:not(.jadwal-extra)');
    cards.forEach((el, i) => {
      el.style.opacity = '0';
      el.style.transform = 'translateY(20px)';
      el.style.transition = `opacity .5s ${i * 0.06}s ease, transform .5s ${i * 0.06}s ease`;
    });
    const revealIO = new IntersectionObserver(entries => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          e.target.style.opacity = '1';
          e.target.style.transform = 'translateY(0)';
          revealIO.unobserve(e.target);
        }
      });
    }, { threshold: 0.1 });
    cards.forEach(el => revealIO.observe(el));
  }
})();
</script>
</body>
</html>