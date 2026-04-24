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
  <title>Nirwana Tour & Travel — Perjalanan Impian Anda Dimulai di Sini</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    /* =============================================
       DESIGN TOKENS
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
       NAVBAR
    ============================================= */
    .navbar {
      position: fixed;
      top: 0; left: 0; right: 0;
      height: var(--nav-h);
      z-index: 1000;
      display: flex;
      align-items: center;
      padding: 0 40px;
      background: transparent;
      transition: background .35s var(--ease), box-shadow .35s var(--ease), backdrop-filter .35s var(--ease);
    }
    .navbar.scrolled {
      background: rgba(13,31,60,.92);
      backdrop-filter: blur(18px);
      -webkit-backdrop-filter: blur(18px);
      box-shadow: 0 4px 30px rgba(0,0,0,.25);
    }
    .navbar.solid {
      background: var(--navy);
      box-shadow: var(--shadow-md);
    }
    .nav-inner {
      width: 100%;
      max-width: 1280px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      gap: 0;
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
      color: rgba(255,255,255,.82);
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
    /* Dropdown */
    .nav-dropdown {
      position: relative;
    }
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

    /* Bridge pseudo-element: menutup celah antara trigger dan panel */
    .nav-dropdown::after {
      content: '';
      position: absolute;
      top: 100%;
      left: 0;
      right: 0;
      height: 8px;
    }

    .dropdown-panel {
      position: absolute;
      top: calc(100% + 4px);
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
      color: var(--ink);
      text-decoration: none;
      transition: background .15s;
    }
    .dropdown-panel a:hover { background: var(--cloud); color: var(--navy-mid); }
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
    /* Nav Auth */
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
      backdrop-filter: blur(4px);
    }
    .btn-login:hover {
      background: rgba(255,255,255,.22);
      border-color: rgba(255,255,255,.5);
      color: var(--white);
    }
    /* Profile box */
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
      width: 34px;
      height: 34px;
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
      color: var(--ink);
      text-decoration: none;
      transition: background .15s;
    }
    .profile-menu a:hover { background: var(--cloud); }
    .profile-menu .divider { height: 1px; background: var(--border); margin: 6px 0; }
    .profile-menu a.logout { color: #c0392b; }
    /* Hamburger */
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
      width: 24px;
      height: 2px;
      background: var(--white);
      border-radius: 2px;
      transition: transform .3s var(--ease), opacity .3s var(--ease);
    }
    .nav-toggle.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
    .nav-toggle.open span:nth-child(2) { opacity: 0; }
    .nav-toggle.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

    /* Mobile nav */
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
      transform: translateY(-10px);
      opacity: 0;
      transition: opacity .3s var(--ease), transform .3s var(--ease);
    }
    .mobile-nav.open {
      opacity: 1;
      transform: translateY(0);
    }
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
       HERO
    ============================================= */
    .hero {
      position: relative;
      width: 100%;
      height: 100vh;
      min-height: 600px;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }
    .hero-video {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center;
      z-index: 0;
    }
    .hero-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(
        160deg,
        rgba(13,31,60,.7) 0%,
        rgba(13,31,60,.5) 50%,
        rgba(13,31,60,.8) 100%
      );
      z-index: 1;
    }
    .hero-grain {
      position: absolute;
      inset: 0;
      z-index: 2;
      opacity: .35;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.4'/%3E%3C/svg%3E");
      pointer-events: none;
    }
    .hero-content {
      position: relative;
      z-index: 3;
      text-align: center;
      max-width: 740px;
      padding: 0 24px;
    }
    .hero-eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(255,255,255,.1);
      border: 1px solid rgba(255,255,255,.22);
      color: rgba(255,255,255,.9);
      font-size: .8rem;
      font-weight: 600;
      letter-spacing: .1em;
      text-transform: uppercase;
      padding: 7px 18px;
      border-radius: 50px;
      margin-bottom: 26px;
      backdrop-filter: blur(6px);
      animation: fadeUp .8s var(--ease) both;
    }
    .hero-eyebrow .dot {
      width: 6px;
      height: 6px;
      border-radius: 50%;
      background: var(--gold-lt);
      animation: pulse 2s ease-in-out infinite;
    }
    @keyframes pulse {
      0%,100% { opacity: 1; transform: scale(1); }
      50% { opacity: .4; transform: scale(.7); }
    }
    .hero-title {
      font-family: var(--font-head);
      font-size: clamp(2.4rem, 6vw, 4rem);
      color: var(--white);
      line-height: 1.1;
      margin-bottom: 22px;
      animation: fadeUp .8s .15s var(--ease) both;
    }
    .hero-title em {
      font-style: italic;
      color: var(--gold-lt);
    }
    .hero-desc {
      font-size: clamp(.95rem, 1.8vw, 1.05rem);
      color: rgba(255,255,255,.78);
      line-height: 1.8;
      max-width: 520px;
      margin: 0 auto 38px;
      animation: fadeUp .8s .3s var(--ease) both;
    }
    .hero-ctas {
      display: flex;
      gap: 14px;
      justify-content: center;
      flex-wrap: wrap;
      animation: fadeUp .8s .45s var(--ease) both;
    }
    .btn-wa {
      display: inline-flex;
      align-items: center;
      gap: 9px;
      background: var(--green);
      color: var(--white);
      font-family: var(--font-body);
      font-weight: 600;
      font-size: .93rem;
      padding: 14px 30px;
      border-radius: 50px;
      text-decoration: none;
      box-shadow: 0 6px 24px rgba(34,169,103,.4);
      transition: background .22s var(--ease), transform .2s var(--ease), box-shadow .22s var(--ease);
    }
    .btn-wa:hover {
      background: var(--green-lt);
      color: var(--white);
      transform: translateY(-2px);
      box-shadow: 0 10px 32px rgba(34,169,103,.5);
    }
    .btn-outline-hero {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: transparent;
      color: var(--white);
      font-family: var(--font-body);
      font-weight: 600;
      font-size: .93rem;
      padding: 14px 30px;
      border-radius: 50px;
      border: 2px solid rgba(255,255,255,.5);
      text-decoration: none;
      backdrop-filter: blur(6px);
      transition: background .2s, border-color .2s, transform .2s;
    }
    .btn-outline-hero:hover {
      background: rgba(255,255,255,.12);
      border-color: var(--white);
      color: var(--white);
      transform: translateY(-2px);
    }
    .hero-scroll {
      position: absolute;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 3;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 6px;
      color: rgba(255,255,255,.5);
      font-size: .72rem;
      font-weight: 500;
      letter-spacing: .08em;
      text-transform: uppercase;
      animation: scrollBounce 2.4s ease-in-out infinite;
    }
    .hero-scroll-line {
      width: 1px;
      height: 32px;
      background: linear-gradient(to bottom, rgba(255,255,255,.5), transparent);
    }
    @keyframes scrollBounce {
      0%,100% { transform: translateX(-50%) translateY(0); }
      50% { transform: translateX(-50%) translateY(8px); }
    }
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(28px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    /* =============================================
       STATS STRIP
    ============================================= */
    .stats-strip {
      background: var(--navy);
      padding: 36px 0;
    }
    .stats-inner {
      max-width: 1000px;
      margin: 0 auto;
      padding: 0 24px;
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 0;
    }
    .stat-item {
      text-align: center;
      padding: 0 20px;
      position: relative;
    }
    .stat-item + .stat-item::before {
      content: '';
      position: absolute;
      left: 0; top: 20%; bottom: 20%;
      width: 1px;
      background: rgba(255,255,255,.12);
    }
    .stat-num {
      font-family: var(--font-head);
      font-size: 2.2rem;
      color: var(--gold-lt);
      line-height: 1;
      margin-bottom: 5px;
    }
    .stat-label {
      font-size: .82rem;
      color: rgba(255,255,255,.58);
      font-weight: 500;
      letter-spacing: .04em;
    }

    /* =============================================
       CTA STRIP (HUBUNGI)
    ============================================= */
    .cta-strip {
      background: var(--sand);
      border-bottom: 1px solid var(--border);
      padding: 60px 0;
      text-align: center;
    }
    .cta-strip-inner { max-width: 640px; margin: 0 auto; padding: 0 24px; }
    .cta-label {
      display: inline-block;
      background: var(--cloud);
      color: var(--muted);
      font-size: .72rem;
      font-weight: 700;
      letter-spacing: .12em;
      text-transform: uppercase;
      padding: 5px 16px;
      border-radius: 50px;
      margin-bottom: 16px;
    }
    .cta-strip h2 {
      font-family: var(--font-head);
      font-size: clamp(1.5rem, 3vw, 2.1rem);
      color: var(--navy);
      margin-bottom: 12px;
      line-height: 1.25;
    }
    .cta-strip p {
      font-size: .97rem;
      color: var(--muted);
      line-height: 1.75;
      margin-bottom: 30px;
    }

    /* =============================================
       KEUNGGULAN SECTION
    ============================================= */
    .keunggulan-section {
      padding: 100px 0;
      background: var(--white);
    }
    .section-header {
      text-align: center;
      margin-bottom: 64px;
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
    .section-title {
      font-family: var(--font-head);
      font-size: clamp(1.7rem, 3.5vw, 2.4rem);
      color: var(--navy);
      margin-bottom: 14px;
      line-height: 1.2;
    }
    .section-sub {
      font-size: .97rem;
      color: var(--muted);
      max-width: 520px;
      margin: 0 auto;
      line-height: 1.75;
    }
    .keunggulan-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 24px;
      max-width: 1100px;
      margin: 0 auto;
      padding: 0 24px;
    }
    .k-card {
      background: var(--sand);
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      padding: 36px 28px 32px;
      transition: transform .28s var(--ease), box-shadow .28s var(--ease), background .2s;
      position: relative;
      overflow: hidden;
    }
    .k-card::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 3px;
      border-radius: 3px 3px 0 0;
      background: transparent;
      transition: background .28s;
    }
    .k-card:hover {
      transform: translateY(-6px);
      box-shadow: var(--shadow-lg);
      background: var(--white);
    }
    .k-card:hover::before { background: var(--blue); }
    .k-icon {
      width: 60px;
      height: 60px;
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
      margin-bottom: 22px;
    }
    .k-icon-blue  { background: #e0ebff; color: var(--blue); }
    .k-icon-gold  { background: #fdf6e3; color: var(--gold); }
    .k-icon-green { background: #e0f7ee; color: var(--green); }
    .k-icon-slate { background: #eef0f6; color: #4a5568; }
    .k-icon-navy  { background: #e8edf8; color: var(--navy-mid); }
    .k-icon-warm  { background: #fdf0e0; color: #b07030; }
    .k-card h6 {
      font-family: var(--font-body);
      font-size: .97rem;
      font-weight: 700;
      color: var(--navy);
      margin-bottom: 10px;
      line-height: 1.4;
    }
    .k-card p {
      font-size: .87rem;
      color: var(--muted);
      line-height: 1.7;
    }

    /* =============================================
       CTA LAYANAN STRIP
    ============================================= */
    .cta-layanan {
      background: var(--navy);
      padding: 80px 0;
      text-align: center;
      position: relative;
      overflow: hidden;
    }
    .cta-layanan::before {
      content: '';
      position: absolute;
      top: -40%; left: -10%;
      width: 500px; height: 500px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(66,119,232,.2) 0%, transparent 65%);
      pointer-events: none;
    }
    .cta-layanan::after {
      content: '';
      position: absolute;
      bottom: -40%; right: -10%;
      width: 500px; height: 500px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(201,160,64,.1) 0%, transparent 65%);
      pointer-events: none;
    }
    .cta-layanan-inner {
      position: relative;
      z-index: 1;
      max-width: 600px;
      margin: 0 auto;
      padding: 0 24px;
    }
    .cta-layanan .badge-cl {
      display: inline-block;
      background: rgba(255,255,255,.08);
      border: 1px solid rgba(255,255,255,.15);
      color: var(--gold-lt);
      font-size: .72rem;
      font-weight: 700;
      letter-spacing: .1em;
      text-transform: uppercase;
      padding: 5px 16px;
      border-radius: 50px;
      margin-bottom: 20px;
    }
    .cta-layanan h2 {
      font-family: var(--font-head);
      font-size: clamp(1.7rem, 3.5vw, 2.4rem);
      color: var(--white);
      margin-bottom: 14px;
      line-height: 1.2;
    }
    .cta-layanan p {
      font-size: .97rem;
      color: rgba(255,255,255,.7);
      line-height: 1.75;
      margin-bottom: 34px;
    }
    .btn-layanan-main {
      display: inline-flex;
      align-items: center;
      gap: 9px;
      background: var(--white);
      color: var(--navy);
      font-family: var(--font-body);
      font-weight: 700;
      font-size: .93rem;
      padding: 14px 32px;
      border-radius: 50px;
      text-decoration: none;
      box-shadow: 0 6px 24px rgba(0,0,0,.25);
      transition: background .22s, transform .2s, box-shadow .22s;
    }
    .btn-layanan-main:hover {
      background: var(--sand);
      transform: translateY(-2px);
      box-shadow: 0 10px 32px rgba(0,0,0,.3);
      color: var(--navy);
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
    @media (max-width: 1024px) {
      .keunggulan-grid { grid-template-columns: repeat(2, 1fr); }
      .footer-grid { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 768px) {
      .navbar { padding: 0 20px; }
      .nav-links, .nav-auth { display: none; }
      .nav-toggle { display: flex; }
      .stats-inner { grid-template-columns: repeat(2, 1fr); gap: 24px; }
      .stat-item + .stat-item::before { display: none; }
      .keunggulan-grid { grid-template-columns: 1fr; }
      .footer-grid { grid-template-columns: 1fr; gap: 32px; }
    }
    @media (max-width: 480px) {
      .hero-ctas { flex-direction: column; align-items: center; }
      .stats-inner { grid-template-columns: 1fr 1fr; }
    }

    /* Container util */
    .container-xl {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 24px;
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
      <img src="img/logo.PNG" alt="Nirwana">
      <div class="nav-logo-text">
        Nirwana
        <small>Tour & Travel</small>
      </div>
    </a>

    <ul class="nav-links">
      <li><a href="{{ route('beranda') }}" class="{{ request()->routeIs('beranda') ? 'active' : '' }}">Beranda</a></li>
      <li class="nav-dropdown">
        <a href="{{ route('lyn') }}" class="{{ request()->routeIs('lyn') ? 'active' : '' }}"></a>
          Layanan
          <i class="bi bi-chevron-down caret"></i>
        </a>
        <div class="dropdown-panel">
          <a href="{{ route('lyn') }}#keberangkatan"></a>
            <i class="bi bi-calendar2-check"></i>
            Keberangkatan Terdekat
          </a>
          <a href="{{ route('lyn') }}#jenis-layanan"></a>
            <i class="bi bi-grid-1x2-fill"></i>
            Jenis-jenis Layanan
          </a>
        </div>
      </li>
      <li><a href="{{ route('tk') }}" class="{{ request()->routeIs('tk') ? 'active' : '' }}">Tentang Kami</a></li>
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
  <a href="{{ route('beranda') }}">Beranda</a>
  <a href="{{ route('lyn') }}">Layanan</a>
  <div class="mobile-sub">
     <a href="{{ route('lyn') }}#keberangkatan">— Keberangkatan Terdekat</a>
    <a href="{{ route('lyn') }}#jenis-layanan">— Jenis-jenis Layanan</a>
  </div>
  <a href="{{ route('tk') }}">Tentang Kami</a>
  <div class="mobile-auth">
    <?php if ($isLoggedIn): ?>
    <a href="/nirwanatravel/login/logout.php" style="color:rgba(255,255,255,.6)">Logout (<?= htmlspecialchars($_SESSION['name']) ?>)</a>
    <?php else: ?>
    <a href="login/login.php" style="color:var(--gold-lt);font-weight:600">Masuk ke Akun</a>
    <?php endif; ?>
  </div>
</div>

<!-- ======================================================
     HERO
====================================================== -->
<section class="hero" id="beranda">
  <video class="hero-video" autoplay muted loop playsinline poster="img/hero-poster.jpg">
    <source src="img/video.mp4" type="video/mp4">
  </video>
  <div class="hero-overlay"></div>
  <div class="hero-grain"></div>

  <div class="hero-content">
    <div class="hero-eyebrow">
      <span class="dot"></span>
      Layanan Wisata Profesional & Terpercaya
    </div>
    <h1 class="hero-title">
      Perjalanan Impian Anda<br>
      <em>Dimulai di Sini</em>
    </h1>
    <p class="hero-desc">
      Dari paket lokal hingga mancanegara — kami hadir dengan layanan penuh untuk kenyamanan Anda dan keluarga, sejak 2005.
    </p>
    <div class="hero-ctas">
      <a href="https://wa.me/6282324246645?text=Halo%2C%20saya%20ingin%20info%20paket%20wisata%20Nirwana%20Tour%20%26%20Travel."
         target="_blank" rel="noopener" class="btn-wa">
        <i class="bi bi-whatsapp"></i> Konsultasi Gratis
      </a>
      <a href="layananan/layanan.php" class="btn-outline-hero">
        <i class="bi bi-compass-fill"></i> Lihat Layanan
      </a>
    </div>
  </div>

  <div class="hero-scroll">
    <div class="hero-scroll-line"></div>
    Scroll
  </div>
</section>

<!-- ======================================================
     STATS STRIP
====================================================== -->
<div class="stats-strip">
  <div class="stats-inner">
    <div class="stat-item">
      <div class="stat-num">20+</div>
      <div class="stat-label">Tahun Berpengalaman</div>
    </div>
    <div class="stat-item">
      <div class="stat-num">15K+</div>
      <div class="stat-label">Wisatawan Terlayani</div>
    </div>
    <div class="stat-item">
      <div class="stat-num">8</div>
      <div class="stat-label">Jenis Layanan</div>
    </div>
    <div class="stat-item">
      <div class="stat-num">24/7</div>
      <div class="stat-label">Dukungan Pelanggan</div>
    </div>
  </div>
</div>

<!-- ======================================================
     CTA STRIP — HUBUNGI
====================================================== -->
<div class="cta-strip">
  <div class="cta-strip-inner">
    <span class="cta-label">Langkah Pertama</span>
    <h2>Wujudkan Perjalanan Impian Anda Bersama Kami</h2>
    <p>Nikmati layanan wisata profesional, aman, dan terpercaya — dari paket lokal hingga mancanegara, semua hadir untuk kenyamanan perjalanan Anda dan keluarga.</p>
    <a href="https://wa.me/6285640100555?text=Halo%2C%20saya%20ingin%20mengetahui%20lebih%20lanjut%20tentang%20paket%20wisata%20Nirwana%20Tour%20%26%20Travel."
       target="_blank" rel="noopener" class="btn-wa">
      <i class="bi bi-whatsapp"></i> Hubungi Kami via WhatsApp
    </a>
  </div>
</div>

<!-- ======================================================
     KEUNGGULAN
====================================================== -->
<section class="keunggulan-section" id="keunggulan">
  <div class="section-header">
    <span class="section-badge">Mengapa Kami</span>
    <h2 class="section-title">Keunggulan Nirwana Tour & Travel</h2>
    <p class="section-sub">Lebih dari sekadar perjalanan — kami menghadirkan pengalaman yang aman, nyaman, dan penuh kenangan.</p>
  </div>

  <div class="keunggulan-grid">
    <div class="k-card">
      <div class="k-icon k-icon-blue"><i class="bi bi-patch-check-fill"></i></div>
      <h6>Berizin Resmi & Terpercaya</h6>
      <p>Terdaftar dan berizin resmi sehingga setiap perjalanan Anda terjamin secara hukum dan profesional.</p>
    </div>
    <div class="k-card">
      <div class="k-icon k-icon-green"><i class="bi bi-shield-fill-check"></i></div>
      <h6>Jaminan Keberangkatan 100%</h6>
      <p>Setiap pemesanan dijamin berangkat sesuai jadwal yang telah disepakati, tanpa khawatir pembatalan sepihak.</p>
    </div>
    <div class="k-card">
      <div class="k-icon k-icon-gold"><i class="bi bi-star-fill"></i></div>
      <h6>Berpengalaman Sejak 2005</h6>
      <p>Lebih dari dua dekade melayani ribuan wisatawan dengan dedikasi penuh dan rekam jejak yang solid.</p>
    </div>
    <div class="k-card">
      <div class="k-icon k-icon-navy"><i class="bi bi-people-fill"></i></div>
      <h6>Pemandu Wisata Bersertifikat</h6>
      <p>Tim guide kami terlatih, berpengalaman, dan ramah — siap mendampingi setiap langkah perjalanan Anda.</p>
    </div>
    <div class="k-card">
      <div class="k-icon k-icon-warm"><i class="bi bi-wallet2"></i></div>
      <h6>Harga Transparan & Kompetitif</h6>
      <p>Tidak ada biaya tersembunyi. Kami menawarkan harga terbaik dengan paket yang fleksibel sesuai kebutuhan.</p>
    </div>
    <div class="k-card">
      <div class="k-icon k-icon-slate"><i class="bi bi-headset"></i></div>
      <h6>Layanan Pelanggan 24 Jam</h6>
      <p>Tim kami siap membantu kapan saja, sebelum, selama, maupun setelah perjalanan Anda berlangsung.</p>
    </div>
  </div>
</section>

<!-- ======================================================
     CTA LAYANAN
====================================================== -->
<section class="cta-layanan">
  <div class="cta-layanan-inner">
    <span class="badge-cl">Eksplorasi Lebih Lanjut</span>
    <h2>Temukan Paket Perjalanan yang Tepat untuk Anda</h2>
    <p>Lihat jadwal keberangkatan terdekat dan pilih layanan yang sesuai dengan kebutuhan perjalanan Anda.</p>
    <a href="layananan/layanan.php" class="btn-layanan-main">
      <i class="bi bi-compass-fill"></i> Lihat Semua Layanan
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
      <a href="layanan/layanan.php">Layanan</a>
      <a href="tentang/tentang_kami.php">Tentang Kami</a>
    </div>
    <div class="footer-col">
      <h4>Kontak</h4>
      <a href="tel:+6282324246645"><i class="bi bi-telephone me-1"></i>+62 823-2424-6645</a>
      <a href="https://wa.me/6282324246645"><i class="bi bi-whatsapp me-1"></i>+62 823-2424-6645</a>
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
  /* ---- Navbar scroll effect ---- */
  const nav = document.getElementById('mainNav');
  function updateNav() {
    if (window.scrollY > 60) nav.classList.add('scrolled');
    else nav.classList.remove('scrolled');
  }
  window.addEventListener('scroll', updateNav, { passive: true });
  updateNav();

  /* ---- Mobile nav toggle ---- */
  const toggle = document.getElementById('navToggle');
  const mobileNav = document.getElementById('mobileNav');
  toggle.addEventListener('click', () => {
    const isOpen = toggle.classList.toggle('open');
    mobileNav.classList.toggle('open', isOpen);
    mobileNav.style.display = isOpen ? 'block' : 'none';
  });

  /* ---- Profile dropdown ---- */
  const profileBox = document.getElementById('profileBox');
  const profileTrigger = document.getElementById('profileTrigger');
  if (profileBox && profileTrigger) {
    profileTrigger.addEventListener('click', (e) => {
      e.stopPropagation();
      profileBox.classList.toggle('open');
    });
    document.addEventListener('click', () => profileBox.classList.remove('open'));
  }

  /* ---- Close mobile nav on link click ---- */
  mobileNav && mobileNav.querySelectorAll('a').forEach(a => {
    a.addEventListener('click', () => {
      toggle.classList.remove('open');
      mobileNav.classList.remove('open');
      mobileNav.style.display = 'none';
    });
  });

  /* ---- Scroll-reveal for cards ---- */
  if ('IntersectionObserver' in window) {
    const cards = document.querySelectorAll('.k-card, .stat-item');
    cards.forEach((el, i) => {
      el.style.opacity = '0';
      el.style.transform = 'translateY(24px)';
      el.style.transition = `opacity .5s ${i * 0.08}s ease, transform .5s ${i * 0.08}s ease`;
    });
    const io = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          e.target.style.opacity = '1';
          e.target.style.transform = 'translateY(0)';
          io.unobserve(e.target);
        }
      });
    }, { threshold: 0.12 });
    cards.forEach(el => io.observe(el));
  }
})();
</script>
</body>
</html>