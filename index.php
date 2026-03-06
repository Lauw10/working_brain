<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>WBG — Wireframe Page d'Accueil</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Source+Sans+3:wght@300;400;600;700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
<style>
  /* ─── TOKENS ─────────────────────────────────────── */
  :root {
    --navy:    #0A1628;
    --gold:    #C49A10;
    --gold-lt: #F5E6A3;
    --blue:    #1E6FD9;
    --green:   #10B981;
    --red:     #E53E3E;
    --cream:   #F8F7F2;
    --charcoal:#1A1A2E;
    --muted:   #6B7280;
    --border:  rgba(196,154,16,0.25);

    --ff-display: 'Playfair Display', Georgia, serif;
    --ff-body:    'Source Sans 3', sans-serif;
    --ff-mono:    'Roboto Mono', monospace;

    --radius: 6px;
    --shadow: 0 4px 24px rgba(10,22,40,0.15);
    --shadow-lg: 0 12px 48px rgba(10,22,40,0.25);
  }

  * { margin:0; padding:0; box-sizing:border-box; }

  html { scroll-behavior: smooth; }

  body {
    font-family: var(--ff-body);
    background: var(--cream);
    color: var(--charcoal);
    overflow-x: hidden;
  }

  /* ─── ANNOTATION LAYER ───────────────────────────── */
  .anno-toggle {
    position: fixed; top: 18px; right: 18px; z-index: 9999;
    background: var(--navy); color: var(--gold);
    border: 1px solid var(--gold); border-radius: 20px;
    padding: 8px 18px; font-family: var(--ff-mono); font-size: 12px;
    cursor: pointer; letter-spacing: .05em;
    transition: all .2s;
  }
  .anno-toggle:hover { background: var(--gold); color: var(--navy); }

  .fullscreen-toggle {
    position: fixed; top: 18px; right: 160px; z-index: 9999;
    background: var(--blue); color: #fff;
    border: none; border-radius: 20px;
    padding: 8px 18px; font-family: var(--ff-mono); font-size: 12px;
    cursor: pointer; letter-spacing: .05em;
    transition: all .2s;
  }
  .fullscreen-toggle:hover { background: var(--navy); }

  .annotation {
    display: none;
    position: absolute; z-index: 100;
    background: #FFFBEA; border: 1.5px solid var(--gold);
    border-radius: 6px; padding: 8px 12px;
    font-family: var(--ff-mono); font-size: 11px;
    color: var(--charcoal); max-width: 220px;
    box-shadow: 0 2px 12px rgba(0,0,0,.12);
    pointer-events: none;
  }
  .annotation::before {
    content: '📌 ';
  }
  body.show-annotations .annotation { display: block; }

  .anno-badge {
    display: inline-flex; align-items: center; justify-content: center;
    width: 20px; height: 20px; border-radius: 50%;
    background: var(--gold); color: var(--navy);
    font-family: var(--ff-mono); font-size: 10px; font-weight: 700;
    cursor: help; flex-shrink: 0;
    vertical-align: middle; margin-left: 6px;
  }

  /* ─── NAV ────────────────────────────────────────── */
  nav {
    background: var(--navy);
    border-bottom: 2px solid var(--gold);
    position: sticky; top: 0; z-index: 500;
    padding: 0 32px;
    display: flex; align-items: center; justify-content: space-between;
    height: 64px;
  }
  .nav-brand {
    display: flex; align-items: center; gap: 12px;
  }
  .nav-logo {
    width: 40px; height: 40px; border-radius: 50%;
    background: var(--gold);
    display: flex; align-items: center; justify-content: center;
    font-family: var(--ff-display); font-size: 16px; font-weight: 900;
    color: var(--navy);
  }
  .nav-name {
    font-family: var(--ff-display); font-size: 17px; font-weight: 700;
    color: #fff; letter-spacing: .02em;
  }
  .nav-name span { color: var(--gold); }
  .nav-links {
    display: flex; gap: 8px; list-style: none;
  }
  .nav-links a {
    color: rgba(255,255,255,.75); text-decoration: none;
    font-size: 14px; font-weight: 600; padding: 8px 14px;
    border-radius: var(--radius); transition: all .2s;
    letter-spacing: .03em;
  }
  .nav-links a:hover, .nav-links a.active {
    color: var(--gold); background: rgba(196,154,16,.1);
  }
  .nav-cta {
    background: var(--gold); color: var(--navy) !important;
    padding: 8px 18px !important; border-radius: 20px !important;
  }
  .nav-cta:hover { background: #e6b800 !important; color: var(--navy) !important; }

  /* ─── HERO ───────────────────────────────────────── */
  .hero {
    background: linear-gradient(135deg, var(--navy) 0%, #0d2040 60%, #122a50 100%);
    position: relative; overflow: hidden;
    padding: 60px 32px 48px;
    min-height: 320px;
    display: flex; flex-direction: column; justify-content: center;
  }
  .hero::before {
    content: '';
    position: absolute; inset: 0;
    background-image:
      radial-gradient(circle at 80% 50%, rgba(196,154,16,.07) 0%, transparent 60%),
      repeating-linear-gradient(45deg, rgba(255,255,255,.015) 0px, rgba(255,255,255,.015) 1px, transparent 1px, transparent 40px);
  }
  .hero-inner {
    position: relative; z-index: 1;
    max-width: 680px;
  }
  .hero-eyebrow {
    font-family: var(--ff-mono); font-size: 11px; font-weight: 700;
    color: var(--gold); letter-spacing: .18em; text-transform: uppercase;
    margin-bottom: 12px;
    display: flex; align-items: center; gap: 8px;
  }
  .hero-eyebrow::before {
    content: ''; display: block; width: 28px; height: 2px; background: var(--gold);
  }
  .hero h1 {
    font-family: var(--ff-display); font-size: clamp(28px, 4vw, 44px);
    font-weight: 900; color: #fff; line-height: 1.1;
    margin-bottom: 14px;
  }
  .hero h1 span { color: var(--gold); }
  .hero-sub {
    font-size: 15px; color: rgba(255,255,255,.65);
    line-height: 1.6; max-width: 520px;
    margin-bottom: 28px;
  }
  .hero-actions { display: flex; gap: 12px; flex-wrap: wrap; }
  .btn-primary {
    background: var(--gold); color: var(--navy);
    border: none; border-radius: 24px; padding: 12px 28px;
    font-family: var(--ff-body); font-size: 14px; font-weight: 700;
    cursor: pointer; letter-spacing: .04em; transition: all .2s;
    text-decoration: none; display: inline-block;
  }
  .btn-primary:hover { background: #e6b800; transform: translateY(-1px); box-shadow: 0 6px 20px rgba(196,154,16,.4); }
  .btn-outline {
    background: transparent; color: rgba(255,255,255,.85);
    border: 1.5px solid rgba(255,255,255,.3); border-radius: 24px;
    padding: 11px 24px; font-family: var(--ff-body); font-size: 14px;
    font-weight: 600; cursor: pointer; transition: all .2s;
    text-decoration: none; display: inline-block;
  }
  .btn-outline:hover { border-color: var(--gold); color: var(--gold); }

  /* ─── SCOREBOARD ─────────────────────────────────── */
  .scoreboard-section {
    background: var(--navy);
    padding: 0 32px 40px;
    position: relative;
  }
  .section-label {
    font-family: var(--ff-mono); font-size: 10px; font-weight: 700;
    color: var(--gold); letter-spacing: .2em; text-transform: uppercase;
    padding: 14px 0 20px;
    display: flex; align-items: center; gap: 8px;
  }
  .live-dot {
    width: 8px; height: 8px; border-radius: 50%;
    background: var(--red);
    animation: pulse 1.4s infinite;
  }
  @keyframes pulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50%       { opacity: .5; transform: scale(1.3); }
  }

  .scoreboard {
    background: linear-gradient(145deg, #0d1f3a, #0a1628);
    border: 1px solid rgba(196,154,16,.3);
    border-radius: 12px;
    overflow: hidden;
    box-shadow: var(--shadow-lg);
    position: relative;
  }
  .sb-header {
    background: rgba(196,154,16,.08);
    border-bottom: 1px solid rgba(196,154,16,.2);
    padding: 14px 24px;
    display: flex; align-items: center; justify-content: space-between;
  }
  .sb-title {
    font-family: var(--ff-display); font-size: 15px; color: var(--gold);
    font-weight: 700;
  }
  .sb-meta {
    display: flex; align-items: center; gap: 16px;
  }
  .sb-badge {
    font-family: var(--ff-mono); font-size: 10px; font-weight: 700;
    padding: 4px 10px; border-radius: 12px; letter-spacing: .1em;
  }
  .badge-live { background: rgba(229,62,62,.15); color: var(--red); border: 1px solid rgba(229,62,62,.3); }
  .badge-phase { background: rgba(30,111,217,.15); color: #6BA3E8; border: 1px solid rgba(30,111,217,.3); }

  .sb-body { padding: 28px 24px; }
  .sb-teams {
    display: grid; grid-template-columns: 1fr auto 1fr;
    align-items: center; gap: 16px;
    margin-bottom: 28px;
  }
  .team { text-align: center; }
  .team-name {
    font-family: var(--ff-display); font-size: 18px; font-weight: 700;
    color: #fff; margin-bottom: 4px;
  }
  .team-sub { font-size: 11px; color: var(--muted); font-family: var(--ff-mono); }
  .sb-score {
    display: flex; align-items: center; gap: 8px;
  }
  .score-val {
    font-family: var(--ff-mono); font-size: 52px; font-weight: 700;
    line-height: 1;
  }
  .score-a { color: var(--green); }
  .score-sep { font-family: var(--ff-mono); font-size: 28px; color: var(--muted); }
  .score-b { color: #fff; }

  .sb-footer {
    display: grid; grid-template-columns: repeat(3, 1fr);
    gap: 1px; background: rgba(196,154,16,.1);
    border-top: 1px solid rgba(196,154,16,.1);
  }
  .sb-stat {
    padding: 14px; text-align: center;
    background: rgba(10,22,40,.4);
  }
  .sb-stat-val {
    font-family: var(--ff-mono); font-size: 20px; font-weight: 700;
    color: var(--gold); display: block;
  }
  .sb-stat-lbl { font-size: 10px; color: var(--muted); letter-spacing: .1em; text-transform: uppercase; }

  .sb-fullscreen-btn {
    background: rgba(196,154,16,.1); border: 1px solid rgba(196,154,16,.25);
    color: var(--gold); padding: 8px 16px; border-radius: 20px;
    font-family: var(--ff-mono); font-size: 11px; cursor: pointer;
    transition: all .2s;
  }
  .sb-fullscreen-btn:hover { background: var(--gold); color: var(--navy); }

  /* ─── FULLSCREEN SCOREBOARD ──────────────────────── */
  .scoreboard-fullscreen {
    display: none;
    position: fixed; inset: 0; z-index: 9000;
    background: var(--navy);
    flex-direction: column; align-items: center; justify-content: center;
  }
  .scoreboard-fullscreen.active { display: flex; }
  .fs-close {
    position: absolute; top: 24px; right: 24px;
    background: rgba(255,255,255,.1); border: none; color: #fff;
    width: 44px; height: 44px; border-radius: 50%; font-size: 20px;
    cursor: pointer;
  }
  .fs-title {
    font-family: var(--ff-mono); font-size: 12px; color: var(--gold);
    letter-spacing: .25em; text-transform: uppercase; margin-bottom: 32px;
    display: flex; align-items: center; gap: 10px;
  }
  .fs-teams {
    display: flex; align-items: center; gap: 60px;
  }
  .fs-team { text-align: center; }
  .fs-team-name {
    font-family: var(--ff-display); font-size: 36px; font-weight: 900; color: #fff;
  }
  .fs-score {
    font-family: var(--ff-mono); font-size: clamp(80px, 15vw, 140px);
    font-weight: 700; line-height: 1;
  }
  .fs-score-a { color: var(--green); }
  .fs-score-b { color: #fff; }
  .fs-sep { font-family: var(--ff-mono); font-size: 60px; color: var(--muted); align-self: flex-start; margin-top: 20px; }
  .fs-time {
    margin-top: 32px; font-family: var(--ff-mono); font-size: 22px;
    color: var(--gold); letter-spacing: .1em;
  }

  /* ─── NEXT MATCH ─────────────────────────────────── */
  .next-match-bar {
    background: linear-gradient(90deg, rgba(196,154,16,.1) 0%, rgba(30,111,217,.08) 100%);
    border: 1px solid var(--border);
    border-radius: 10px;
    padding: 20px 28px;
    display: flex; align-items: center; justify-content: space-between;
    flex-wrap: wrap; gap: 16px;
    margin: 32px 32px 0;
  }
  .nm-label {
    font-family: var(--ff-mono); font-size: 10px; color: var(--gold);
    letter-spacing: .2em; text-transform: uppercase; margin-bottom: 6px;
  }
  .nm-info {
    font-family: var(--ff-display); font-size: 18px; font-weight: 700;
    color: var(--charcoal);
  }
  .nm-details {
    display: flex; gap: 24px; margin-top: 6px;
  }
  .nm-detail {
    font-size: 13px; color: var(--muted);
    display: flex; align-items: center; gap: 5px;
  }
  .nm-countdown {
    text-align: right;
  }
  .countdown-val {
    font-family: var(--ff-mono); font-size: 28px; font-weight: 700;
    color: var(--blue); letter-spacing: -.02em;
  }
  .countdown-lbl { font-size: 11px; color: var(--muted); }

  /* ─── ABOUT ──────────────────────────────────────── */
  .about-section {
    padding: 56px 32px;
    background: var(--cream);
  }
  .section-header {
    margin-bottom: 36px;
  }
  .section-eyebrow {
    font-family: var(--ff-mono); font-size: 10px; font-weight: 700;
    color: var(--gold); letter-spacing: .2em; text-transform: uppercase;
    margin-bottom: 8px;
    display: flex; align-items: center; gap: 8px;
  }
  .section-eyebrow::before { content:''; display:block; width:20px; height:2px; background: var(--gold); }
  .section-title {
    font-family: var(--ff-display); font-size: clamp(24px, 3vw, 32px);
    font-weight: 700; color: var(--navy); line-height: 1.2;
  }
  .about-grid {
    display: grid; grid-template-columns: 1fr 1fr; gap: 24px;
  }
  .about-card {
    background: #fff; border: 1px solid rgba(10,22,40,.08);
    border-radius: 10px; padding: 28px;
    position: relative; overflow: hidden;
    transition: box-shadow .2s, transform .2s;
    cursor: default;
  }
  .about-card:hover { box-shadow: var(--shadow); transform: translateY(-2px); }
  .about-card::before {
    content: ''; position: absolute; top: 0; left: 0;
    width: 4px; height: 100%; background: var(--gold);
  }
  .card-icon {
    width: 44px; height: 44px; border-radius: 10px;
    background: rgba(196,154,16,.1); display: flex; align-items: center;
    justify-content: center; font-size: 20px; margin-bottom: 14px;
  }
  .card-title {
    font-family: var(--ff-display); font-size: 17px; font-weight: 700;
    color: var(--navy); margin-bottom: 8px;
  }
  .card-text { font-size: 13px; color: var(--muted); line-height: 1.6; }

  /* ─── QUICK ACCESS ───────────────────────────────── */
  .quicknav {
    padding: 40px 32px 56px;
    background: var(--navy);
  }
  .qn-grid {
    display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px;
    margin-top: 28px;
  }
  .qn-card {
    background: rgba(255,255,255,.04);
    border: 1px solid rgba(196,154,16,.15);
    border-radius: 10px; padding: 24px 20px;
    text-align: center; cursor: pointer;
    transition: all .2s; text-decoration: none;
    display: block;
  }
  .qn-card:hover {
    background: rgba(196,154,16,.08);
    border-color: var(--gold);
    transform: translateY(-3px);
  }
  .qn-icon { font-size: 28px; margin-bottom: 10px; display: block; }
  .qn-title {
    font-family: var(--ff-display); font-size: 14px; font-weight: 700;
    color: #fff; margin-bottom: 4px;
  }
  .qn-sub { font-size: 11px; color: rgba(255,255,255,.4); }

  /* ─── STANDINGS PREVIEW ──────────────────────────── */
  .standings-section {
    padding: 56px 32px;
    background: #f0efe9;
  }
  .standings-table {
    width: 100%; border-collapse: collapse; margin-top: 28px;
    background: #fff; border-radius: 10px; overflow: hidden;
    box-shadow: 0 2px 16px rgba(10,22,40,.06);
  }
  .standings-table thead {
    background: var(--navy);
  }
  .standings-table th {
    padding: 12px 16px; text-align: left;
    font-family: var(--ff-mono); font-size: 10px; font-weight: 700;
    color: var(--gold); letter-spacing: .1em; text-transform: uppercase;
  }
  .standings-table td {
    padding: 12px 16px; border-bottom: 1px solid rgba(10,22,40,.06);
    font-size: 13px; color: var(--charcoal);
  }
  .standings-table tr:hover td { background: rgba(196,154,16,.04); }
  .rank { font-family: var(--ff-mono); font-weight: 700; color: var(--muted); }
  .rank-1 { color: var(--gold); }
  .rank-2 { color: #C0C0C0; }
  .rank-3 { color: #CD7F32; }
  .team-cell { font-weight: 700; color: var(--navy); }
  .pts { font-family: var(--ff-mono); font-weight: 700; color: var(--blue); }

  /* ─── FOOTER ─────────────────────────────────────── */
  footer {
    background: #050d1a;
    border-top: 2px solid var(--gold);
    padding: 40px 32px 24px;
    color: rgba(255,255,255,.5);
  }
  .footer-grid {
    display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 32px;
    margin-bottom: 32px;
  }
  .footer-brand-name {
    font-family: var(--ff-display); font-size: 18px; font-weight: 700;
    color: #fff; margin-bottom: 10px;
  }
  .footer-desc { font-size: 12px; line-height: 1.6; max-width: 240px; }
  .footer-heading {
    font-family: var(--ff-mono); font-size: 10px; font-weight: 700;
    color: var(--gold); letter-spacing: .15em; text-transform: uppercase;
    margin-bottom: 14px;
  }
  .footer-links { list-style: none; }
  .footer-links li { margin-bottom: 8px; }
  .footer-links a { color: rgba(255,255,255,.5); text-decoration: none; font-size: 13px; }
  .footer-links a:hover { color: var(--gold); }
  .footer-bottom {
    border-top: 1px solid rgba(255,255,255,.06);
    padding-top: 20px;
    display: flex; justify-content: space-between; align-items: center;
    font-size: 11px;
  }

  /* ─── WIREFRAME LEGEND ───────────────────────────── */
  .wf-legend {
    position: fixed; bottom: 18px; left: 18px; z-index: 9999;
    background: var(--navy); border: 1px solid var(--gold);
    border-radius: 10px; padding: 14px 18px;
    font-family: var(--ff-mono); font-size: 11px;
    max-width: 220px;
    box-shadow: var(--shadow);
  }
  .wf-legend-title {
    color: var(--gold); font-weight: 700; letter-spacing: .1em;
    text-transform: uppercase; margin-bottom: 10px; font-size: 10px;
  }
  .wf-legend-item { display: flex; align-items: center; gap: 8px; margin-bottom: 6px; color: rgba(255,255,255,.7); }
  .leg-dot { width: 10px; height: 10px; border-radius: 50%; flex-shrink: 0; }

  /* ─── TOOLTIP ────────────────────────────────────── */
  .tooltip-area {
    position: relative; cursor: help;
  }
  .tooltip-area:hover .annotation { display: block; top: 100%; left: 0; margin-top: 4px; }

  /* ─── MOBILE NOTE ────────────────────────────────── */
  @media (max-width: 700px) {
    nav { padding: 0 16px; }
    .nav-links { display: none; }
    .hero { padding: 40px 16px 32px; }
    .scoreboard-section { padding: 0 16px 32px; }
    .next-match-bar { margin: 24px 16px 0; padding: 16px; }
    .about-grid { grid-template-columns: 1fr; }
    .qn-grid { grid-template-columns: repeat(2, 1fr); }
    .footer-grid { grid-template-columns: 1fr 1fr; }
    .sb-teams { grid-template-columns: 1fr auto 1fr; }
    .score-val { font-size: 36px; }
    .wf-legend { display: none; }
  }
</style>
</head>
<body>

<!-- Controls -->
<button class="anno-toggle" onclick="document.body.classList.toggle('show-annotations'); this.textContent = document.body.classList.contains('show-annotations') ? '🔕 Masquer annotations' : '📌 Afficher annotations'">📌 Afficher annotations</button>
<!-- <button class="fullscreen-toggle" onclick="document.querySelector('.scoreboard-fullscreen').classList.toggle('active')">⛶ Mode Projection</button> -->

<!-- Wireframe Legend -->
<div class="wf-legend">
  <div class="wf-legend-title">Légende Wireframe</div>
  <div class="wf-legend-item"><div class="leg-dot" style="background:var(--gold)"></div> Composant principal</div>
  <div class="wf-legend-item"><div class="leg-dot" style="background:var(--blue)"></div> Interactif / cliquable</div>
  <div class="wf-legend-item"><div class="leg-dot" style="background:var(--red)"></div> Indicateur live</div>
  <div class="wf-legend-item"><div class="leg-dot" style="background:var(--green)"></div> Donnée dynamique</div>
</div>

<!-- ═══ FULLSCREEN SCOREBOARD ═══ -->
<div class="scoreboard-fullscreen">
  <button class="fs-close" onclick="this.closest('.scoreboard-fullscreen').classList.remove('active')">✕</button>
  <div class="fs-title">
    <div class="live-dot"></div>
    Ligue des Génies — 4ème Édition — Demi-Finale
  </div>
  <div class="fs-teams">
    <div class="fs-team">
      <div class="fs-score fs-score-a" id="fs-score-a">14</div>
      <div class="fs-team-name">Les Éclaireurs</div>
    </div>
    <div class="fs-sep">—</div>
    <div class="fs-team">
      <div class="fs-score fs-score-b" id="fs-score-b">11</div>
      <div class="fs-team-name">Alpha Genius</div>
    </div>
  </div>
  <div class="fs-time" id="fs-time">⏱ 08:24 restantes — Manche 2</div>
</div>

<!-- ═══ NAVIGATION ═══ -->
<nav>
  <div class="nav-brand">
    <div class="nav-logo">WBG</div>
    <div class="nav-name">Working Brain <span>Group</span></div>
  </div>
  <ul class="nav-links">
    <li><a href="#" class="active">Accueil</a></li>
    <li><a href="wireframe_LDG.php">Ligue des Génies</a></li>
    <li><a href="#">Classement</a></li>
    <li><a href="#">Archives</a></li>
    <li><a href="#">Équipe</a></li>
    <li><a href="#" class="nav-cta">Partenaires</a></li>
  </ul>
</nav>

<!-- ═══ HERO ═══ -->
<section class="hero">
  <div style="position:absolute;top:12px;right:12px">
    <span class="annotation" style="display:none;position:relative;top:auto;left:auto">BLOC A — Hero. Tagline courte, texte de mission, 2 CTA. Fond : navy + motif géométrique discret.</span>
  </div>
  <div class="hero-inner">
    <div class="hero-eyebrow">Ligue des Génies — 4ème Édition</div>
    <h1>L'intelligence<span> en compétition</span></h1>
    <p class="hero-sub">Le Working Brain Group organise la compétition intellectuelle de référence en Haïti. Suivez les matchs, les scores et les classements en temps réel.</p>
    <div class="hero-actions">
      <a href="#" class="btn-primary">Voir le scoreboard live</a>
      <a href="#" class="btn-outline">Calendrier des matchs →</a>
    </div>
  </div>
  <!-- Annotation badge -->
  <div style="position:absolute;bottom:16px;right:16px" class="tooltip-area">
    <span class="anno-badge">A</span>
    <div class="annotation">BLOC A — Section Hero. Priorité : ancrer l'identité WBG dès l'arrivée. CTA principal → scoreboard. CTA secondaire → calendrier.</div>
  </div>
</section>

<!-- ═══ SCOREBOARD SECTION ═══ -->
<section class="scoreboard-section">
  <div class="section-label">
    <div class="live-dot"></div>
    Scoreboard en direct
    <span class="anno-badge tooltip-area" style="cursor:help">B
      <div class="annotation" style="color:#333">BLOC B — Scoreboard Live. Technologie : WebSockets. Latence < 2s. Bouton plein écran pour projection TV.</div>
    </span>
  </div>

  <div class="scoreboard">
    <div class="sb-header">
      <div class="sb-title">Demi-Finale — Ligue des Génies</div>
      <div class="sb-meta">
        <span class="sb-badge badge-live">● EN DIRECT</span>
        <span class="sb-badge badge-phase">Manche 2 / 3</span>
        <button class="sb-fullscreen-btn" onclick="document.querySelector('.scoreboard-fullscreen').classList.add('active')">⛶ Plein écran</button>
      </div>
    </div>
    <div class="sb-body">
      <div class="sb-teams">
        <div class="team">
          <div class="team-name">Les Éclaireurs</div>
          <div class="team-sub">Équipe A · Port-au-Prince</div>
        </div>
        <div class="sb-score">
          <span class="score-val score-a" id="score-a">14</span>
          <span class="score-sep">–</span>
          <span class="score-val score-b" id="score-b">11</span>
        </div>
        <div class="team" style="text-align:right">
          <div class="team-name">Alpha Genius</div>
          <div class="team-sub">Équipe B · Cap-Haïtien</div>
        </div>
      </div>
    </div>
    <div class="sb-footer">
      <div class="sb-stat">
        <span class="sb-stat-val" id="timer">08:24</span>
        <span class="sb-stat-lbl">Temps restant</span>
      </div>
      <div class="sb-stat">
        <span class="sb-stat-val">Q2</span>
        <span class="sb-stat-lbl">Phase actuelle</span>
      </div>
      <div class="sb-stat">
        <span class="sb-stat-val" style="color:var(--green)">+3</span>
        <span class="sb-stat-lbl">Avance Éclaireurs</span>
      </div>
    </div>
  </div>
</section>

<!-- ═══ NEXT MATCH BAR ═══ -->
<div class="next-match-bar">
  <div>
    <div class="nm-label">Prochain match</div>
    <div class="nm-info">Les Titans vs. Cerveau Royal</div>
    <div class="nm-details">
      <span class="nm-detail">📅 Samedi 15 mars 2025</span>
      <span class="nm-detail">⏰ 14h00</span>
      <span class="nm-detail">📍 Salle Polyvalente, PAP</span>
    </div>
  </div>
  <div class="nm-countdown">
    <div class="countdown-val" id="countdown">2j 14h 37m</div>
    <div class="countdown-lbl">Avant le coup d'envoi</div>
  </div>
  <span class="anno-badge tooltip-area">C
    <div class="annotation" style="color:#333">BLOC C — Barre "Prochain match". Date, heure, lieu + compte à rebours dynamique. Toujours visible sur la home.</div>
  </span>
</div>

<!-- ═══ ABOUT ═══ -->
<section class="about-section">
  <div class="section-header tooltip-area">
    <div class="section-eyebrow">Notre organisation</div>
    <h2 class="section-title">Le Working Brain Group,<br>une vision nationale.</h2>
    <div class="annotation" style="color:#333;top:0;left:400px">BLOC D — Présentation WBG. Court (3-4 lignes max). Pas de long texte. Accent sur 4 valeurs clés.</div>
  </div>
  <div class="about-grid">
    <div class="about-card">
      <div class="card-icon">🧠</div>
      <div class="card-title">Excellence intellectuelle</div>
      <div class="card-text">Promouvoir la compétition intellectuelle comme moteur de développement des jeunes haïtiens.</div>
    </div>
    <div class="about-card">
      <div class="card-icon">🏆</div>
      <div class="card-title">Ligue des Génies</div>
      <div class="card-text">Compétition phare organisée depuis 4 éditions, réunissant les meilleures équipes du pays.</div>
    </div>
    <div class="about-card">
      <div class="card-icon">🤝</div>
      <div class="card-title">Partenariats stratégiques</div>
      <div class="card-text">Un réseau de partenaires et sponsors qui croient en la jeunesse haïtienne.</div>
    </div>
    <div class="about-card">
      <div class="card-icon">📈</div>
      <div class="card-title">Ambition nationale</div>
      <div class="card-text">Une organisation qui grandit et vise à représenter Haïti au niveau régional.</div>
    </div>
  </div>
</section>

<!-- ═══ QUICK NAV ═══ -->
<section class="quicknav">
  <div class="tooltip-area">
    <div class="section-eyebrow" style="color:rgba(196,154,16,.7)">Accès rapide</div>
    <h2 class="section-title" style="color:#fff">Tout le contenu WBG</h2>
    <div class="annotation" style="color:#333">BLOC E — Navigation rapide. 4 tuiles cliquables. Mobile : 2 colonnes. Important pour l'UX mobile.</div>
  </div>
  <div class="qn-grid">
    <a href="wireframe_LDG.php" class="qn-card">
      <span class="qn-icon">🏅</span>
      <div class="qn-title">Ligue des Génies</div>
      <div class="qn-sub">Scoreboard · Calendrier · Stats</div>
    </a>
    <a href="#" class="qn-card">
      <span class="qn-icon">👥</span>
      <div class="qn-title">Notre Équipe</div>
      <div class="qn-sub">Coordination · Comité</div>
    </a>
    <a href="#" class="qn-card">
      <span class="qn-icon">🤝</span>
      <div class="qn-title">Partenaires</div>
      <div class="qn-sub">Sponsors · Logos · Contact</div>
    </a>
    <a href="#" class="qn-card">
      <span class="qn-icon">📂</span>
      <div class="qn-title">Archives</div>
      <div class="qn-sub">1ère → 4ème édition</div>
    </a>
  </div>
</section>

<!-- ═══ STANDINGS PREVIEW ═══ -->
<section class="standings-section">
  <div class="section-header tooltip-area">
    <div class="section-eyebrow">Classement</div>
    <h2 class="section-title">Top équipes — Édition en cours</h2>
    <div class="annotation" style="color:#333">BLOC F — Aperçu classement (top 5). Lien "Voir tout" vers page Ligue. Mis à jour automatiquement.</div>
  </div>
  <table class="standings-table">
    <thead>
      <tr>
        <th>#</th>
        <th>Équipe</th>
        <th>J</th>
        <th>V</th>
        <th>D</th>
        <th>Diff.</th>
        <th>Pts</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="rank rank-1">1</td>
        <td class="team-cell">🥇 Les Éclaireurs</td>
        <td>6</td><td>5</td><td>1</td><td>+28</td>
        <td class="pts">15</td>
      </tr>
      <tr>
        <td class="rank rank-2">2</td>
        <td class="team-cell">🥈 Alpha Genius</td>
        <td>6</td><td>4</td><td>2</td><td>+17</td>
        <td class="pts">12</td>
      </tr>
      <tr>
        <td class="rank rank-3">3</td>
        <td class="team-cell">🥉 Les Titans</td>
        <td>6</td><td>4</td><td>2</td><td>+12</td>
        <td class="pts">12</td>
      </tr>
      <tr>
        <td class="rank">4</td>
        <td class="team-cell">Cerveau Royal</td>
        <td>6</td><td>3</td><td>3</td><td>+4</td>
        <td class="pts">9</td>
      </tr>
      <tr>
        <td class="rank">5</td>
        <td class="team-cell">Les Pionniers</td>
        <td>6</td><td>2</td><td>4</td><td>−8</td>
        <td class="pts">6</td>
      </tr>
    </tbody>
  </table>
  <div style="text-align:right;margin-top:14px">
    <a href="#" style="font-size:13px;color:var(--blue);font-weight:700;text-decoration:none">Voir le classement complet →</a>
  </div>
</section>

<!-- ═══ FOOTER ═══ -->
<footer>
  <div class="footer-grid">
    <div>
      <div class="footer-brand-name">Working Brain Group</div>
      <p class="footer-desc">Organisation dédiée à la promotion de l'excellence intellectuelle en Haïti à travers la compétition et le partage du savoir.</p>
    </div>
    <div>
      <div class="footer-heading">Navigation</div>
      <ul class="footer-links">
        <li><a href="#">Accueil</a></li>
        <li><a href="#">Ligue des Génies</a></li>
        <li><a href="#">Classement</a></li>
        <li><a href="#">Archives</a></li>
      </ul>
    </div>
    <div>
      <div class="footer-heading">Organisation</div>
      <ul class="footer-links">
        <li><a href="#">Notre équipe</a></li>
        <li><a href="#">Partenaires</a></li>
        <li><a href="#">Espace presse</a></li>
        <li><a href="#">Règlement (PDF)</a></li>
      </ul>
    </div>
    <div>
      <div class="footer-heading">Contact</div>
      <ul class="footer-links">
        <li><a href="#">Inscription équipes</a></li>
        <li><a href="#">Bénévolat</a></li>
        <li><a href="#">Devenir partenaire</a></li>
        <li><a href="#">Nous contacter</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <span>© 2025 Working Brain Group — Tous droits réservés</span>
    <span style="color:rgba(196,154,16,.6);font-family:var(--ff-mono);font-size:10px">WIREFRAME v1.0 — Page d'accueil</span>
  </div>
</footer>

<script>
  // ─── Simulate live score updates
  let scoreA = 14, scoreB = 11;
  let seconds = 504; // 8:24

  setInterval(() => {
    seconds = Math.max(0, seconds - 1);
    const m = Math.floor(seconds / 60).toString().padStart(2,'0');
    const s = (seconds % 60).toString().padStart(2,'0');
    const display = `${m}:${s}`;
    document.getElementById('timer').textContent = display;
    document.getElementById('fs-time').textContent = `⏱ ${display} restantes — Manche 2`;
  }, 1000);

  // Occasionally bump score for demo
  setInterval(() => {
    if (Math.random() > 0.6) {
      if (Math.random() > 0.45) {
        scoreA++;
        document.getElementById('score-a').textContent = scoreA;
        document.getElementById('fs-score-a').textContent = scoreA;
        flash('score-a');
      } else {
        scoreB++;
        document.getElementById('score-b').textContent = scoreB;
        document.getElementById('fs-score-b').textContent = scoreB;
        flash('score-b');
      }
    }
  }, 4000);

  function flash(id) {
    const el = document.getElementById(id);
    el.style.transition = 'color .1s';
    el.style.color = '#FFD700';
    setTimeout(() => {
      el.style.color = id === 'score-a' ? 'var(--green)' : '#fff';
    }, 600);
  }

  // ─── Countdown
  function updateCountdown() {
    const target = new Date();
    target.setDate(target.getDate() + 2);
    target.setHours(14, 0, 0, 0);
    const diff = target - new Date();
    const d = Math.floor(diff / 86400000);
    const h = Math.floor((diff % 86400000) / 3600000);
    const m = Math.floor((diff % 3600000) / 60000);
    document.getElementById('countdown').textContent = `${d}j ${h}h ${m}m`;
  }
  updateCountdown();
  setInterval(updateCountdown, 60000);
</script>
</body>
</html>