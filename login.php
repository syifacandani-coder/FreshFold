<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>FreshFold — Sistem Laundry</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link
    href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap"
    rel="stylesheet">
  <style>
    :root {
      --green: #176b55;
      --dark: #10513f;
      --soft: #e8f5ef;
      --ink: #20332b;
      --muted: #7c8982;
      --line: #e7ede9;
      --bg: #f7f9f7;
      --white: #fff;
      --orange: #b97b24;
      --blue: #4777bd;
      --red: #c05e4e
    }

    * {
      box-sizing: border-box
    }

    body {
      margin: 0;
      background: var(--bg);
      color: var(--ink);
      font-family: 'DM Sans', sans-serif
    }

    button,
    input,
    select {
      font: inherit
    }

    button {
      cursor: pointer
    }

    .app {
      display: none;
      min-height: 100vh
    }

    .sidebar {
      width: 245px;
      flex-shrink: 0;
      background: #fff;
      border-right: 1px solid var(--line);
      padding: 25px 17px;
      display: flex;
      flex-direction: column
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 0 9px 32px
    }

    .brand-mark {
      width: 42px;
      height: 42px;
      border-radius: 14px;
      background: var(--green);
      color: white;
      display: grid;
      place-items: center;
      font-size: 22px
    }

    .brand-name {
      font: 800 21px Manrope, sans-serif;
      letter-spacing: -.8px
    }

    .brand-name span {
      color: var(--green)
    }

    .brand-sub {
      font-size: 10px;
      color: var(--muted);
      letter-spacing: 1px;
      margin-top: 2px
    }

    .nav-label {
      font-size: 10px;
      font-weight: 700;
      letter-spacing: 1.4px;
      color: #a0aaa4;
      margin: 12px 12px
    }

    .nav {
      display: grid;
      gap: 5px
    }

    .nav-btn {
      border: 0;
      background: transparent;
      color: #718078;
      text-align: left;
      padding: 13px 14px;
      border-radius: 11px;
      font-size: 13px;
      font-weight: 600
    }

    .nav-btn:hover,
    .nav-btn.active {
      background: var(--soft);
      color: var(--green)
    }

    .nav-btn span {
      display: inline-block;
      width: 28px;
      font-size: 16px
    }

    .side-bottom {
      margin-top: auto
    }

    .help {
      margin: 25px 4px 20px;
      padding: 15px;
      background: #f5f8f5;
      border: 1px solid var(--line);
      border-radius: 14px
    }

    .help b {
      font-size: 12px
    }

    .help p {
      font-size: 11px;
      color: var(--muted);
      line-height: 1.6
    }

    .help button {
      width: 100%;
      background: white;
      border: 1px solid var(--line);
      border-radius: 8px;
      padding: 9px;
      color: var(--green);
      font-size: 11px;
      font-weight: 700
    }

    .profile {
      border-top: 1px solid var(--line);
      padding: 17px 6px 0;
      display: flex;
      align-items: center;
      gap: 10px
    }

    .avatar {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background: #e5efe8;
      color: var(--green);
      display: grid;
      place-items: center;
      font-size: 12px;
      font-weight: 800
    }

    .profile b {
      font-size: 12px
    }

    .profile small {
      display: block;
      color: var(--muted);
      font-size: 10px;
      margin-top: 3px
    }

    .main {
      flex: 1;
      min-width: 0
    }

    .topbar {
      height: 76px;
      background: white;
      border-bottom: 1px solid var(--line);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 34px
    }

    .crumb {
      font-size: 12px;
      color: var(--muted)
    }

    .crumb b {
      color: var(--ink)
    }

    .date {
      background: var(--bg);
      padding: 10px 13px;
      border-radius: 9px;
      color: var(--muted);
      font-size: 12px
    }

    .content {
      max-width: 1450px;
      margin: auto;
      padding: 32px 34px 48px
    }

    .page {
      display: none
    }

    .page.active {
      display: block;
      animation: fade .2s ease
    }

    @keyframes fade {
      from {
        opacity: .5;
        transform: translateY(3px)
      }

      to {
        opacity: 1;
        transform: none
      }
    }

    .heading {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      gap: 15px;
      margin-bottom: 25px
    }

    h1 {
      font: 800 27px Manrope, sans-serif;
      letter-spacing: -.8px;
      margin: 0 0 7px
    }

    .sub {
      font-size: 13px;
      color: var(--muted);
      margin: 0;
      line-height: 1.6
    }

    .primary,
    .secondary {
      border-radius: 10px;
      padding: 12px 15px;
      font-size: 12px;
      font-weight: 700
    }

    .primary {
      border: 0;
      background: var(--green);
      color: white;
      box-shadow: 0 5px 14px #176b5520
    }

    .primary:hover {
      background: var(--dark)
    }

    .secondary {
      border: 1px solid var(--line);
      background: white;
      color: var(--ink)
    }

    .stats {
      display: grid;
      grid-template-columns: repeat(4, minmax(0, 1fr));
      gap: 15px;
      margin-bottom: 22px
    }

    .stat,
    .panel {
      background: white;
      border: 1px solid var(--line);
      border-radius: 16px;
      box-shadow: 0 8px 28px #203e3008
    }

    .stat {
      padding: 19px
    }

    .stat-top {
      display: flex;
      justify-content: space-between;
      gap: 8px;
      color: var(--muted);
      font-size: 12px;
      font-weight: 600
    }

    .stat-icon {
      width: 35px;
      height: 35px;
      border-radius: 11px;
      background: var(--soft);
      color: var(--green);
      display: grid;
      place-items: center;
      font-size: 17px
    }

    .stat-value {
      font: 800 24px Manrope, sans-serif;
      letter-spacing: -.7px;
      margin: 15px 0 6px
    }

    .stat-note {
      font-size: 10px;
      color: var(--muted)
    }

    .layout {
      display: grid;
      grid-template-columns: minmax(0, 1.6fr) minmax(260px, .8fr);
      gap: 18px
    }

    .panel {
      padding: 21px;
      min-width: 0
    }

    .panel-head {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 10px;
      margin-bottom: 18px
    }

    .panel-title {
      font: 800 15px Manrope, sans-serif;
      margin: 0
    }

    .panel-sub {
      font-size: 11px;
      color: var(--muted);
      margin-top: 5px
    }

    .link {
      border: 0;
      background: transparent;
      color: var(--green);
      font-weight: 700;
      font-size: 11px
    }

    .table-wrap {
      overflow-x: auto
    }

    table {
      width: 100%;
      border-collapse: collapse;
      min-width: 590px
    }

    th {
      text-align: left;
      font-size: 10px;
      color: #98a29c;
      padding: 0 10px 12px;
      border-bottom: 1px solid var(--line);
      white-space: nowrap
    }

    td {
      padding: 14px 10px;
      border-bottom: 1px solid #f0f3f1;
      font-size: 11px;
      white-space: nowrap
    }

    tr:last-child td {
      border-bottom: 0
    }

    .order-id {
      font-weight: 800;
      color: var(--green)
    }

    .customer {
      font-weight: 700;
      font-size: 12px
    }

    .muted {
      font-size: 10px;
      color: var(--muted);
      margin-top: 4px
    }

    .status {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      padding: 6px 9px;
      border-radius: 30px;
      font-size: 10px;
      font-weight: 700
    }

    .status:before {
      content: '';
      width: 5px;
      height: 5px;
      border-radius: 50%;
      background: currentColor
    }

    .wait {
      background: #fff3df;
      color: var(--orange)
    }

    .process {
      background: #eaf2ff;
      color: var(--blue)
    }

    .done {
      background: #e8f5ed;
      color: #28764e
    }

    .taken {
      background: #eee;
      color: #68716c
    }

    .unpaid {
      background: #fff0ed;
      color: var(--red)
    }

    .quick {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px
    }

    .quick button {
      border: 1px solid var(--line);
      background: white;
      text-align: left;
      border-radius: 12px;
      padding: 14px
    }

    .quick button:hover {
      border-color: #b6d6c4
    }

    .quick .emoji {
      font-size: 19px;
      margin-bottom: 10px
    }

    .quick b {
      display: block;
      font-size: 11px
    }

    .quick small {
      display: block;
      color: var(--muted);
      font-size: 10px;
      line-height: 1.5;
      margin-top: 5px
    }

    .progress-list {
      display: grid;
      gap: 16px
    }

    .progress-row {
      display: grid;
      grid-template-columns: 1fr auto;
      gap: 8px;
      font-size: 11px
    }

    .progress-bar {
      grid-column: 1/-1;
      height: 7px;
      background: #eef2ef;
      border-radius: 9px;
      overflow: hidden
    }

    .fill {
      height: 100%;
      background: var(--green);
      border-radius: 9px
    }

    .filters {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      margin-bottom: 16px
    }

    .field,
    .select {
      width: 100%;
      border: 1px solid #e1e9e3;
      background: white;
      border-radius: 10px;
      padding: 12px;
      color: var(--ink);
      outline: none;
      font-size: 12px
    }

    .field:focus,
    .select:focus {
      border-color: #83b59b;
      box-shadow: 0 0 0 3px #176b5510
    }

    .search {
      flex: 1;
      min-width: 200px
    }

    .filter-select {
      width: auto;
      min-width: 155px
    }

    .form-panel {
      max-width: 900px
    }

    .form-title {
      font: 800 13px Manrope, sans-serif;
      margin: 3px 0 16px
    }

    .form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px
    }

    .form-group {
      display: grid;
      gap: 8px
    }

    .form-group label {
      font-size: 11px;
      font-weight: 700;
      color: #53625a
    }

    .form-group.full {
      grid-column: 1/-1
    }

    .spacer {
      height: 27px
    }

    .price-box {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #f2f8f4;
      border: 1px solid #dfede3;
      border-radius: 12px;
      padding: 17px;
      margin-top: 22px
    }

    .price-box span {
      font-size: 12px;
      color: #66776d;
      line-height: 1.7
    }

    .price-box strong {
      font: 800 22px Manrope, sans-serif;
      color: var(--green)
    }

    .form-actions {
      display: flex;
      justify-content: flex-end;
      gap: 9px;
      margin-top: 21px
    }

    .tracking-hero {
      background: linear-gradient(125deg, #125640, #208064);
      color: white;
      border-radius: 18px;
      padding: 30px;
      display: grid;
      grid-template-columns: 1.2fr .8fr;
      gap: 15px;
      overflow: hidden
    }

    .tracking-hero h2 {
      font: 800 25px Manrope, sans-serif;
      margin: 0 0 10px
    }

    .tracking-hero p {
      color: #d3e9df;
      font-size: 12px;
      line-height: 1.7;
      max-width: 400px
    }

    .tracking-form {
      display: flex;
      gap: 8px;
      max-width: 430px
    }

    .tracking-form input {
      border: 0;
      border-radius: 9px;
      padding: 13px;
      min-width: 0;
      flex: 1;
      font-size: 12px
    }

    .tracking-form button {
      border: 0;
      border-radius: 9px;
      background: #e4f4e9;
      color: var(--dark);
      padding: 0 15px;
      font-size: 12px;
      font-weight: 800
    }

    .laundry-emoji {
      display: grid;
      place-items: center;
      font-size: 85px
    }

    .timeline {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      margin: 25px 0
    }

    .step {
      position: relative;
      text-align: center;
      padding-top: 29px;
      font-size: 10px;
      color: #9aa59e
    }

    .step:before {
      content: '';
      position: absolute;
      top: 0;
      left: calc(50% - 9px);
      width: 18px;
      height: 18px;
      border-radius: 50%;
      background: #e9eeeb;
      border: 4px solid #e9eeeb;
      z-index: 2
    }

    .step:after {
      content: '';
      position: absolute;
      top: 8px;
      left: 50%;
      width: 100%;
      height: 3px;
      background: #e9eeeb
    }

    .step:last-child:after {
      display: none
    }

    .step.complete {
      color: var(--green);
      font-weight: 700
    }

    .step.complete:before {
      background: var(--green);
      border-color: #d8eee1
    }

    .step.complete:after {
      background: var(--green)
    }

    .info-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 10px
    }

    .info-tile {
      background: #f8faf8;
      border: 1px solid var(--line);
      border-radius: 11px;
      padding: 14px
    }

    .info-tile span {
      display: block;
      color: var(--muted);
      font-size: 10px;
      margin-bottom: 7px
    }

    .info-tile b {
      font-size: 12px
    }

    .empty {
      text-align: center;
      color: var(--muted);
      padding: 28px 12px;
      font-size: 12px
    }

    .toast {
      position: fixed;
      right: 22px;
      bottom: 22px;
      background: #203b30;
      color: white;
      padding: 13px 17px;
      border-radius: 10px;
      box-shadow: 0 10px 30px #0002;
      font-size: 12px;
      opacity: 0;
      transform: translateY(10px);
      pointer-events: none;
      transition: .2s;
      z-index: 50
    }

    .toast.show {
      opacity: 1;
      transform: none
    }

    .modal-backdrop {
      position: fixed;
      inset: 0;
      background: #14251e70;
      display: none;
      place-items: center;
      padding: 20px;
      z-index: 40
    }

    .modal-backdrop.show {
      display: grid
    }

    .modal {
      background: white;
      border-radius: 17px;
      padding: 24px;
      width: min(100%, 430px)
    }

    .modal h3 {
      font: 800 19px Manrope, sans-serif;
      margin: 0 0 7px
    }

    .modal p {
      font-size: 12px;
      color: var(--muted);
      line-height: 1.5
    }

    .modal-actions {
      display: flex;
      justify-content: flex-end;
      gap: 8px;
      margin-top: 20px
    }

    .mobile-menu {
      display: none
    }

    @media(max-width:1050px) {
      .sidebar {
        width: 215px
      }

      .content {
        padding: 26px 22px
      }

      .topbar {
        padding: 0 22px
      }

      .stats {
        grid-template-columns: repeat(2, 1fr)
      }

      .layout {
        grid-template-columns: 1fr
      }
    }

    @media(max-width:700px) {
      .sidebar {
        position: fixed;
        z-index: 35;
        inset: 0 auto 0 0;
        width: 250px;
        transform: translateX(-105%);
        transition: .25s;
        box-shadow: 10px 0 35px #0001
      }

      .sidebar.open {
        transform: none
      }

      .mobile-menu {
        display: inline-block;
        border: 1px solid var(--line);
        background: white;
        border-radius: 8px;
        padding: 8px;
        margin-right: 10px
      }

      .topbar {
        height: 65px;
        padding: 0 14px
      }

      .content {
        padding: 23px 13px
      }

      .heading {
        align-items: flex-start
      }

      h1 {
        font-size: 22px
      }

      .heading .primary {
        padding: 10px;
        font-size: 11px
      }

      .stat {
        padding: 14px
      }

      .stat-value {
        font-size: 20px
      }

      .stat-top {
        font-size: 10px
      }

      .stat-icon {
        width: 30px;
        height: 30px
      }

      .panel {
        padding: 15px
      }

      .form-grid {
        grid-template-columns: 1fr
      }

      .form-group.full {
        grid-column: auto
      }

      .tracking-hero {
        grid-template-columns: 1fr;
        padding: 22px
      }

      .laundry-emoji {
        display: none
      }

      .tracking-form {
        flex-direction: column
      }

      .tracking-form button {
        padding: 13px
      }

      .info-grid {
        grid-template-columns: 1fr
      }

      .step {
        font-size: 9px
      }

      .date {
        display: none
      }
    }

    .login-screen {
      min-height: 100vh;
      display: grid;
      grid-template-columns: 1.05fr .95fr;
      background: #f7f9f7;
      font-family: 'DM Sans', sans-serif
    }

    .login-visual {
      background: linear-gradient(145deg, #104b3a, #176b55 65%, #2c8a6d);
      color: white;
      padding: clamp(28px, 6vw, 78px);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      position: relative;
      overflow: hidden
    }

    .login-visual:before,
    .login-visual:after {
      content: '';
      position: absolute;
      border: 1px solid #ffffff20;
      border-radius: 50%;
      width: 360px;
      height: 360px;
      right: -100px;
      top: 15%;
    }

    .login-visual:after {
      width: 520px;
      height: 520px;
      right: -180px;
      top: 5%;
    }

    .login-brand {
      display: flex;
      align-items: center;
      gap: 12px;
      position: relative;
      z-index: 1
    }

    .login-brand .brand-mark {
      background: #ffffff20;
      border: 1px solid #ffffff30
    }

    .login-brand .brand-name span {
      color: #c3ebd4
    }

    .login-tagline {
      position: relative;
      z-index: 1;
      max-width: 520px
    }

    .login-tagline .eyebrow {
      font-size: 11px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: #c3ebd4;
      font-weight: 700
    }

    .login-tagline h1 {
      font-size: clamp(32px, 4vw, 52px);
      line-height: 1.12;
      margin: 18px 0
    }

    .login-tagline p {
      font-size: 14px;
      line-height: 1.8;
      color: #d5e9df;
      max-width: 390px
    }

    .login-foot {
      font-size: 11px;
      color: #c3dfd1;
      position: relative;
      z-index: 1
    }

    .login-side {
      display: grid;
      place-items: center;
      padding: 28px
    }

    .login-card {
      width: min(100%, 390px);
      background: white;
      padding: clamp(25px, 4vw, 42px);
      border: 1px solid #e7ede9;
      border-radius: 22px;
      box-shadow: 0 18px 55px #203e300d
    }

    .login-icon {
      width: 50px;
      height: 50px;
      display: grid;
      place-items: center;
      border-radius: 15px;
      background: #e8f5ef;
      font-size: 23px;
      margin-bottom: 24px
    }

    .login-card h2 {
      font: 800 26px Manrope, sans-serif;
      margin: 0 0 8px;
      letter-spacing: -.7px
    }

    .login-desc {
      color: #7c8982;
      font-size: 12px;
      line-height: 1.7;
      margin: 0 0 25px
    }

    .login-card .form-group {
      margin-bottom: 16px
    }

    .login-card .form-group label {
      font-size: 12px
    }

    .login-card .field {
      padding: 14px;
      font-size: 13px
    }

    .login-submit {
      width: 100%;
      margin-top: 8px;
      padding: 14px
    }

    .login-error {
      display: none;
      background: #fff0ed;
      color: #b44d40;
      border: 1px solid #f5d7d1;
      border-radius: 9px;
      padding: 10px 12px;
      font-size: 11px;
      margin-bottom: 14px
    }

    .login-error.show {
      display: block
    }

    .login-hint {
      margin-top: 20px;
      padding: 12px;
      background: #f7f9f7;
      border-radius: 10px;
      color: #738078;
      font-size: 10px;
      line-height: 1.7
    }

    .logout-btn {
      margin-left: auto;
      border: 1px solid var(--line);
      background: white;
      color: #a34b40;
      border-radius: 8px;
      padding: 8px;
      font-size: 10px;
      font-weight: 700
    }

    .login-card .field:focus {
      border-color: #83b59b;
      box-shadow: 0 0 0 3px #176b5510
    }

    @media(max-width:760px) {
      .login-screen {
        grid-template-columns: 1fr
      }

      .login-visual {
        min-height: 230px;
        padding: 25px
      }

      .login-tagline {
        margin-top: 32px
      }

      .login-tagline h1 {
        font-size: 31px;
        margin: 10px 0
      }

      .login-tagline p {
        font-size: 12px;
        margin-bottom: 0
      }

      .login-foot {
        display: none
      }

      .login-side {
        padding: 25px 18px 35px
      }

      .login-card {
        padding: 27px
      }
    }
  </style>
</head>

<body>
  <section class="login-screen" id="loginScreen">
    <div class="login-visual">
      <div class="login-brand">
        <div class="brand-mark">✦</div>
        <div>
          <div class="brand-name" style="color:white">Fresh<span>Fold</span></div>
          <div class="brand-sub" style="color:#c3dfd1">LAUNDRY MANAGEMENT</div>
        </div>
      </div>
      <div class="login-tagline">
        <div class="eyebrow">Fresh laundry, fresh start</div>
        <h1>Kelola laundry jadi lebih mudah.</h1>
        <p>Satu tempat untuk memantau pesanan, mengatur proses pencucian, dan melihat laporan FreshFold.</p>
      </div>
      <div class="login-foot">© 2026 FreshFold Laundry Management</div>
    </div>
    <div class="login-side">
      <form class="login-card" id="loginForm">
        <div class="login-icon">🔐</div>
        <h2>Login Admin</h2>
        <p class="login-desc">Selamat datang kembali! Masuk menggunakan akun administrator FreshFold.</p>
        <div class="login-error" id="loginError">Username atau password salah. Coba periksa kembali.</div>
        <div class="form-group"><label for="adminUsername">Username</label><input class="field" id="adminUsername"
            name="username" placeholder="Masukkan username" autocomplete="username" required></div>
        <div class="form-group"><label for="adminPassword">Password</label><input class="field" id="adminPassword"
            name="password" type="password" placeholder="Masukkan password" autocomplete="current-password" required>
        </div>
        <button class="primary login-submit" type="submit">Masuk ke Dashboard →</button>
        <div class="login-hint"><b>Demo login</b><br>Username: <b>admin</b><br>Password:
          <b>freshfold123</b><br><span>Ini login demo frontend. Untuk keamanan sungguhan, autentikasi perlu dibuat di
            backend (misalnya PHP + database).</span>
        </div>
      </form>
    </div>
  </section>

  <div class="app" id="mainApp">
    <aside class="sidebar" id="sidebar">
      <div class="brand">
        <div class="brand-mark">✦</div>
        <div>
          <div class="brand-name">fresh<span>fold</span></div>
          <div class="brand-sub">LAUNDRY MANAGEMENT</div>
        </div>
      </div>
      <div class="nav-label">MENU UTAMA</div>
      <nav class="nav"><button class="nav-btn active" data-page="dashboard"><span>▦</span>Dashboard</button><button
          class="nav-btn" data-page="orders"><span>▤</span>Data Pesanan</button><button class="nav-btn"
          data-page="new-order"><span>＋</span>Buat Pesanan</button><button class="nav-btn"
          data-page="tracking"><span>⌕</span>Cek Status Laundry</button></nav>
      <div class="nav-label" style="margin-top:25px">LAINNYA</div>
      <nav class="nav"><button class="nav-btn" data-page="reports"><span>▥</span>Laporan Ringkas</button></nav>
      <div class="side-bottom">
        <div class="help"><b>Butuh bantuan?</b>
          <p>Kelola pesanan laundry jadi lebih mudah dan teratur.</p><button
            onclick="toast('Hubungi admin FreshFold untuk bantuan.')">Pusat Bantuan ↗</button>
        </div>
        <div class="profile">
          <div class="avatar">AD</div>
          <div><b>Admin FreshFold</b><small>Administrator</small></div><button class="logout-btn"
            onclick="logoutAdmin()">Keluar</button>
        </div>
      </div>
    </aside>
    <main class="main">
      <header class="topbar">
        <div><button class="mobile-menu" id="mobileMenu">☰</button><span class="crumb">Workspace　/　<b
              id="breadcrumb">Dashboard</b></span></div>
        <div class="date" id="todayDate"></div>
      </header>
      <div class="content">
        <section class="page active" id="page-dashboard">
          <div class="heading">
            <div>
              <h1>Selamat pagi, Admin! 👋</h1>
              <p class="sub">Ini ringkasan aktivitas laundry kamu hari ini.</p>
            </div><button class="primary" onclick="navigate('new-order')">＋ Buat Pesanan Baru</button>
          </div>
          <div class="stats">
            <div class="stat">
              <div class="stat-top">Total Pesanan <span class="stat-icon">▤</span></div>
              <div class="stat-value" id="statTotal">0</div>
              <div class="stat-note">Seluruh transaksi tercatat</div>
            </div>
            <div class="stat">
              <div class="stat-top">Sedang Diproses <span class="stat-icon"
                  style="background:#eaf2ff;color:#5588ce">◷</span></div>
              <div class="stat-value" id="statProcess">0</div>
              <div class="stat-note">Pesanan belum selesai</div>
            </div>
            <div class="stat">
              <div class="stat-top">Siap Diambil <span class="stat-icon"
                  style="background:#fff3df;color:#bd812e">✓</span></div>
              <div class="stat-value" id="statReady">0</div>
              <div class="stat-note">Menunggu pelanggan</div>
            </div>
            <div class="stat">
              <div class="stat-top">Pendapatan Dibayar <span class="stat-icon"
                  style="background:#f2eaff;color:#8a65bb">↗</span></div>
              <div class="stat-value" id="statRevenue">Rp0</div>
              <div class="stat-note">Pembayaran terkonfirmasi</div>
            </div>
          </div>
          <div class="layout">
            <div class="panel">
              <div class="panel-head">
                <div>
                  <h3 class="panel-title">Pesanan Terbaru</h3>
                  <div class="panel-sub">Pantau transaksi laundry terbaru</div>
                </div><button class="link" onclick="navigate('orders')">Lihat semua →</button>
              </div>
              <div class="table-wrap">
                <table>
                  <thead>
                    <tr>
                      <th>NO. PESANAN</th>
                      <th>PELANGGAN</th>
                      <th>LAYANAN</th>
                      <th>TOTAL</th>
                      <th>STATUS</th>
                    </tr>
                  </thead>
                  <tbody id="recentOrders"></tbody>
                </table>
              </div>
            </div>
            <div style="display:grid;gap:18px;align-content:start">
              <div class="panel">
                <div class="panel-head">
                  <div>
                    <h3 class="panel-title">Akses Cepat</h3>
                    <div class="panel-sub">Menu yang sering digunakan</div>
                  </div>
                </div>
                <div class="quick"><button onclick="navigate('new-order')">
                    <div class="emoji">🧺</div><b>Pesanan Baru</b><small>Catat laundry masuk</small>
                  </button><button onclick="navigate('orders')">
                    <div class="emoji">📋</div><b>Kelola Pesanan</b><small>Perbarui status</small>
                  </button><button onclick="navigate('tracking')">
                    <div class="emoji">🔎</div><b>Cek Status</b><small>Lacak pesanan</small>
                  </button><button onclick="navigate('reports')">
                    <div class="emoji">📈</div><b>Laporan</b><small>Ringkasan transaksi</small>
                  </button></div>
              </div>
              <div class="panel">
                <div class="panel-head">
                  <div>
                    <h3 class="panel-title">Ringkasan Status</h3>
                    <div class="panel-sub">Komposisi pesanan saat ini</div>
                  </div>
                </div>
                <div class="progress-list" id="statusSummary"></div>
              </div>
            </div>
          </div>
        </section>
        <section class="page" id="page-orders">
          <div class="heading">
            <div>
              <h1>Data Pesanan</h1>
              <p class="sub">Kelola semua transaksi laundry dalam satu tempat.</p>
            </div><button class="primary" onclick="navigate('new-order')">＋ Pesanan Baru</button>
          </div>
          <div class="panel">
            <div class="filters"><input class="field search" id="orderSearch"
                placeholder="⌕ Cari nomor pesanan atau nama pelanggan..."><select class="select filter-select"
                id="statusFilter">
                <option value="all">Semua Status</option>
                <option>Menunggu Proses</option>
                <option>Sedang Diproses</option>
                <option>Selesai</option>
                <option>Sudah Diambil</option>
              </select></div>
            <div class="table-wrap">
              <table>
                <thead>
                  <tr>
                    <th>NO. PESANAN</th>
                    <th>PELANGGAN</th>
                    <th>LAYANAN</th>
                    <th>BERAT</th>
                    <th>TOTAL</th>
                    <th>STATUS LAUNDRY</th>
                    <th>PEMBAYARAN</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <tbody id="allOrders"></tbody>
              </table>
            </div>
          </div>
        </section>
        <section class="page" id="page-new-order">
          <div class="heading">
            <div>
              <h1>Buat Pesanan Baru</h1>
              <p class="sub">Masukkan detail pelanggan dan layanan laundry.</p>
            </div>
          </div>
          <div class="panel form-panel">
            <form id="orderForm">
              <h3 class="form-title">Informasi Pelanggan</h3>
              <div class="form-grid">
                <div class="form-group"><label for="customerName">Nama pelanggan *</label><input class="field"
                    id="customerName" required placeholder="Contoh: Rina Putri"></div>
                <div class="form-group"><label for="customerPhone">Nomor HP / WhatsApp *</label><input class="field"
                    id="customerPhone" required inputmode="tel" placeholder="Contoh: 081234567890"></div>
              </div>
              <div class="spacer"></div>
              <h3 class="form-title">Detail Layanan</h3>
              <div class="form-grid">
                <div class="form-group"><label for="serviceType">Jenis layanan *</label><select class="select"
                    id="serviceType">
                    <option value="Cuci + Setrika" data-price="7000">Cuci + Setrika — Rp7.000/kg</option>
                    <option value="Cuci Kering" data-price="5000">Cuci Kering — Rp5.000/kg</option>
                    <option value="Setrika Saja" data-price="4000">Setrika Saja — Rp4.000/kg</option>
                    <option value="Express" data-price="12000">Express — Rp12.000/kg</option>
                  </select></div>
                <div class="form-group"><label for="weight">Berat pakaian (kg) *</label><input class="field" id="weight"
                    type="number" min="0.1" step="0.1" required placeholder="Contoh: 3"></div>
                <div class="form-group"><label for="orderDate">Tanggal masuk *</label><input class="field"
                    id="orderDate" type="date" required></div>
                <div class="form-group"><label for="dueDate">Estimasi selesai *</label><input class="field" id="dueDate"
                    type="date" required></div>
                <div class="form-group full"><label for="orderNotes">Catatan (opsional)</label><input class="field"
                    id="orderNotes" placeholder="Contoh: pisahkan pakaian putih"></div>
              </div>
              <div class="price-box"><span>Estimasi total pembayaran<br><small id="priceDetail">Pilih layanan dan
                    masukkan berat pakaian.</small></span><strong id="priceTotal">Rp0</strong></div>
              <div class="form-actions"><button type="button" class="secondary"
                  onclick="navigate('orders')">Batal</button><button type="submit" class="primary">Simpan Pesanan
                  ↗</button></div>
            </form>
          </div>
        </section>
        <section class="page" id="page-tracking">
          <div class="heading">
            <div>
              <h1>Cek Status Laundry</h1>
              <p class="sub">Lacak proses laundry dengan nomor pesanan.</p>
            </div>
          </div>
          <div class="tracking-hero">
            <div>
              <h2>Pakaian bersih, hati tenang.</h2>
              <p>Masukkan nomor pesanan yang diberikan oleh admin untuk melihat status pengerjaan laundry kamu.</p>
              <form class="tracking-form" id="trackingForm"><input id="trackingId" placeholder="Contoh: LD-001"
                  required><button type="submit">Lacak Pesanan</button></form>
            </div>
            <div class="laundry-emoji">🧺</div>
          </div>
          <div id="trackingResult" style="margin-top:20px"></div>
        </section>
        <section class="page" id="page-reports">
          <div class="heading">
            <div>
              <h1>Laporan Ringkas</h1>
              <p class="sub">Ringkasan transaksi dan pembayaran laundry.</p>
            </div><button class="secondary" onclick="exportCSV()">↓ Unduh CSV</button>
          </div>
          <div class="stats">
            <div class="stat">
              <div class="stat-top">Total Transaksi</div>
              <div class="stat-value" id="reportOrders">0</div>
              <div class="stat-note">Semua pesanan</div>
            </div>
            <div class="stat">
              <div class="stat-top">Pendapatan Dibayar</div>
              <div class="stat-value" id="reportPaid">Rp0</div>
              <div class="stat-note">Pembayaran terkonfirmasi</div>
            </div>
            <div class="stat">
              <div class="stat-top">Belum Dibayar</div>
              <div class="stat-value" id="reportUnpaid">Rp0</div>
              <div class="stat-note">Menunggu pembayaran</div>
            </div>
            <div class="stat">
              <div class="stat-top">Berat Laundry</div>
              <div class="stat-value" id="reportWeight">0 kg</div>
              <div class="stat-note">Total pakaian tercatat</div>
            </div>
          </div>
          <div class="panel">
            <div class="panel-head">
              <div>
                <h3 class="panel-title">Rincian Seluruh Pesanan</h3>
                <div class="panel-sub">Data demo yang tersimpan di halaman ini</div>
              </div>
            </div>
            <div class="table-wrap">
              <table>
                <thead>
                  <tr>
                    <th>NO. PESANAN</th>
                    <th>PELANGGAN</th>
                    <th>TANGGAL MASUK</th>
                    <th>LAYANAN</th>
                    <th>BERAT</th>
                    <th>TOTAL</th>
                    <th>PEMBAYARAN</th>
                  </tr>
                </thead>
                <tbody id="reportTable"></tbody>
              </table>
            </div>
          </div>
        </section>
      </div>
    </main>
  </div>
  <div class="toast" id="toast"></div>
  <div class="modal-backdrop" id="statusModal">
    <div class="modal">
      <h3>Perbarui Pesanan</h3>
      <p id="modalDescription">Ubah status laundry dan pembayaran.</p><input type="hidden" id="modalOrderId">
      <div class="form-group"><label for="modalStatus">Status laundry</label><select class="select" id="modalStatus">
          <option>Menunggu Proses</option>
          <option>Sedang Diproses</option>
          <option>Selesai</option>
          <option>Sudah Diambil</option>
        </select></div>
      <div class="form-group" style="margin-top:14px"><label for="modalPayment">Status pembayaran</label><select
          class="select" id="modalPayment">
          <option>Belum Dibayar</option>
          <option>Lunas</option>
        </select></div>
      <div class="modal-actions"><button class="secondary" onclick="closeModal()">Batal</button><button
          class="secondary" style="color:#b42318;border-color:#e7b7b3" onclick="deleteOrder()">Hapus
          Pesanan</button><button class="primary" onclick="saveStatus()">Simpan Perubahan</button></div>
    </div>
  </div>
  <script>
    const rupiah = n => new Intl.NumberFormat('id-ID', {style: 'currency', currency: 'IDR', maximumFractionDigits: 0}).format(n);
    const iso = d => `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(2, '0')}-${String(d.getDate()).padStart(2, '0')}`;
    const today = new Date(), future = new Date(); future.setDate(future.getDate() + 2); document.getElementById('todayDate').textContent = new Intl.DateTimeFormat('id-ID', {weekday: 'short', day: 'numeric', month: 'short', year: 'numeric'}).format(today); document.getElementById('orderDate').value = iso(today); document.getElementById('dueDate').value = iso(future);
    let orders = JSON.parse(localStorage.getItem('freshfoldOrders') || '[]'); let nextId = orders.reduce((max, o) => Math.max(max, Number(String(o.id).split('-')[1]) || 0), 0) + 1; function persistOrders() {localStorage.setItem('freshfoldOrders', JSON.stringify(orders))}
    const statuses = ['Menunggu Proses', 'Sedang Diproses', 'Selesai', 'Sudah Diambil']; const cls = s => ({'Menunggu Proses': 'wait', 'Sedang Diproses': 'process', 'Selesai': 'done', 'Sudah Diambil': 'taken'}[s] || 'wait'); const dateFmt = d => d ? new Intl.DateTimeFormat('id-ID', {day: '2-digit', month: 'short', year: 'numeric'}).format(new Date(d + 'T00:00:00')) : '-'; const esc = s => String(s).replace(/[&<>"']/g, c => ({'&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'}[c])); const badge = s => `<span class="status ${cls(s)}">${esc(s)}</span>`; const payBadge = s => `<span class="status ${s === 'Lunas' ? 'done' : 'unpaid'}">${esc(s)}</span>`;
    function toast(msg) {let el = document.getElementById('toast'); el.textContent = msg; el.classList.add('show'); clearTimeout(window.toastTimer); window.toastTimer = setTimeout(() => el.classList.remove('show'), 2600)}
    function navigate(page) {document.querySelectorAll('.page').forEach(p => p.classList.toggle('active', p.id === 'page-' + page)); document.querySelectorAll('.nav-btn[data-page]').forEach(b => b.classList.toggle('active', b.dataset.page === page)); let labels = {dashboard: 'Dashboard', orders: 'Data Pesanan', 'new-order': 'Buat Pesanan', tracking: 'Cek Status Laundry', reports: 'Laporan Ringkas'}; document.getElementById('breadcrumb').textContent = labels[page] || 'Dashboard'; document.getElementById('sidebar').classList.remove('open'); if (page === 'dashboard') renderDashboard(); if (page === 'orders') renderOrders(); if (page === 'reports') renderReports(); window.scrollTo({top: 0, behavior: 'smooth'})} document.querySelectorAll('.nav-btn[data-page]').forEach(b => b.addEventListener('click', () => navigate(b.dataset.page))); document.getElementById('mobileMenu').onclick = () => document.getElementById('sidebar').classList.toggle('open');
    function renderDashboard() {document.getElementById('statTotal').textContent = orders.length; document.getElementById('statProcess').textContent = orders.filter(o => ['Menunggu Proses', 'Sedang Diproses'].includes(o.status)).length; document.getElementById('statReady').textContent = orders.filter(o => o.status === 'Selesai').length; document.getElementById('statRevenue').textContent = rupiah(orders.filter(o => o.payment === 'Lunas').reduce((s, o) => s + o.total, 0)); let recent = [...orders].reverse().slice(0, 5); document.getElementById('recentOrders').innerHTML = recent.length ? recent.map(o => `<tr><td><span class="order-id">${esc(o.id)}</span></td><td><div class="customer">${esc(o.name)}</div><div class="muted">${esc(o.phone)}</div></td><td>${esc(o.service)}</td><td>${rupiah(o.total)}</td><td>${badge(o.status)}</td></tr>`).join('') : '<tr><td colspan="5" class="empty">Belum ada pesanan.</td></tr>'; document.getElementById('statusSummary').innerHTML = statuses.map(s => {let count = orders.filter(o => o.status === s).length; return `<div class="progress-row"><span>${s}</span><span style="color:var(--muted)">${count} pesanan</span><div class="progress-bar"><div class="fill" style="width:${count / Math.max(1, orders.length) * 100}%"></div></div></div>`}).join('')}
    function renderOrders() {let q = (document.getElementById('orderSearch').value || '').toLowerCase(), f = document.getElementById('statusFilter').value; let list = [...orders].reverse().filter(o => (o.id.toLowerCase().includes(q) || o.name.toLowerCase().includes(q) || o.phone.includes(q)) && (f === 'all' || o.status === f)); document.getElementById('allOrders').innerHTML = list.length ? list.map(o => `<tr><td><span class="order-id">${esc(o.id)}</span><div class="muted">${dateFmt(o.date)}</div></td><td><div class="customer">${esc(o.name)}</div><div class="muted">${esc(o.phone)}</div></td><td>${esc(o.service)}</td><td>${o.weight} kg</td><td><b>${rupiah(o.total)}</b></td><td>${badge(o.status)}</td><td>${payBadge(o.payment)}</td><td><button class="secondary" style="padding:7px 9px" onclick="openModal('${o.id}')">Kelola</button></td></tr>`).join('') : '<tr><td colspan="8" class="empty">Pesanan tidak ditemukan.</td></tr>'} document.getElementById('orderSearch').addEventListener('input', renderOrders); document.getElementById('statusFilter').addEventListener('change', renderOrders);
    function updatePrice() {let s = document.getElementById('serviceType'), price = Number(s.options[s.selectedIndex].dataset.price || 0), w = Number(document.getElementById('weight').value || 0); document.getElementById('priceTotal').textContent = rupiah(Math.round(price * w)); document.getElementById('priceDetail').textContent = `${rupiah(price)} × ${w || 0} kg`} document.getElementById('serviceType').addEventListener('change', updatePrice); document.getElementById('weight').addEventListener('input', updatePrice);
    document.getElementById('orderForm').addEventListener('submit', e => {e.preventDefault(); let name = document.getElementById('customerName').value.trim(), phone = document.getElementById('customerPhone').value.trim(), sel = document.getElementById('serviceType'), service = sel.value, price = Number(sel.options[sel.selectedIndex].dataset.price), weight = Number(document.getElementById('weight').value), date = document.getElementById('orderDate').value, due = document.getElementById('dueDate').value; if (!name || !phone || weight <= 0 || !date || !due) return toast('Mohon lengkapi semua data wajib.'); if (due < date) return toast('Tanggal selesai tidak boleh sebelum tanggal masuk.'); let id = 'LD-' + String(nextId++).padStart(3, '0'); orders.push({id, name, phone, service, weight, total: Math.round(price * weight), date, due, notes: document.getElementById('orderNotes').value.trim(), status: 'Menunggu Proses', payment: 'Belum Dibayar'}); persistOrders(); e.target.reset(); document.getElementById('orderDate').value = iso(today); document.getElementById('dueDate').value = iso(future); updatePrice(); renderDashboard(); toast(`Pesanan ${id} berhasil dibuat!`); navigate('orders')});
    function openModal(id) {let o = orders.find(x => x.id === id); if (!o) return; document.getElementById('modalOrderId').value = id; document.getElementById('modalDescription').textContent = `${o.id} · ${o.name} · ${rupiah(o.total)}`; document.getElementById('modalStatus').value = o.status; document.getElementById('modalPayment').value = o.payment; document.getElementById('statusModal').classList.add('show')} function closeModal() {document.getElementById('statusModal').classList.remove('show')} function deleteOrder() {let id = document.getElementById('modalOrderId').value; let o = orders.find(x => x.id === id); if (!o) return; if (!confirm('Yakin ingin menghapus pesanan ' + o.name + ' (' + o.id + ')?')) return; orders = orders.filter(x => x.id !== id); persistOrders(); closeModal(); renderOrders(); renderDashboard(); renderReports(); toast('Pesanan ' + id + ' berhasil dihapus.')} function saveStatus() {let o = orders.find(x => x.id === document.getElementById('modalOrderId').value); if (!o) return; o.status = document.getElementById('modalStatus').value; o.payment = document.getElementById('modalPayment').value; persistOrders(); closeModal(); renderOrders(); renderDashboard(); renderReports(); toast('Status pesanan berhasil diperbarui.')} document.getElementById('statusModal').addEventListener('click', e => {if (e.target.id === 'statusModal') closeModal()});
    document.getElementById('trackingForm').addEventListener('submit', e => {e.preventDefault(); let id = document.getElementById('trackingId').value.trim().toUpperCase(), o = orders.find(x => x.id.toUpperCase() === id), result = document.getElementById('trackingResult'); if (!o) {result.innerHTML = '<div class="panel empty">🔎<br><b style="color:var(--ink)">Pesanan tidak ditemukan</b><p>Periksa kembali nomor pesanan kamu.</p></div>'; return } let idx = statuses.indexOf(o.status); result.innerHTML = `<div class="panel"><div class="panel-head"><div><h3 class="panel-title">Detail Pesanan ${esc(o.id)}</h3><div class="panel-sub">Status terbaru pesanan laundry kamu</div></div>${badge(o.status)}</div><div class="timeline">${statuses.map((s, i) => `<div class="step ${i <= idx ? 'complete' : ''}">${s}</div>`).join('')}</div><div class="info-grid"><div class="info-tile"><span>Nama pelanggan</span><b>${esc(o.name)}</b></div><div class="info-tile"><span>Jenis layanan</span><b>${esc(o.service)}</b></div><div class="info-tile"><span>Estimasi selesai</span><b>${dateFmt(o.due)}</b></div><div class="info-tile"><span>Berat pakaian</span><b>${o.weight} kg</b></div><div class="info-tile"><span>Total tagihan</span><b>${rupiah(o.total)}</b></div><div class="info-tile"><span>Pembayaran</span><b>${esc(o.payment)}</b></div></div></div>`});
    function renderReports() {document.getElementById('reportOrders').textContent = orders.length; document.getElementById('reportPaid').textContent = rupiah(orders.filter(o => o.payment === 'Lunas').reduce((s, o) => s + o.total, 0)); document.getElementById('reportUnpaid').textContent = rupiah(orders.filter(o => o.payment !== 'Lunas').reduce((s, o) => s + o.total, 0)); document.getElementById('reportWeight').textContent = orders.reduce((s, o) => s + o.weight, 0).toLocaleString('id-ID') + ' kg'; document.getElementById('reportTable').innerHTML = [...orders].reverse().map(o => `<tr><td><span class="order-id">${esc(o.id)}</span></td><td>${esc(o.name)}</td><td>${dateFmt(o.date)}</td><td>${esc(o.service)}</td><td>${o.weight} kg</td><td>${rupiah(o.total)}</td><td>${payBadge(o.payment)}</td></tr>`).join('') || '<tr><td colspan="7" class="empty">Belum ada data transaksi.</td></tr>'}
    function exportCSV() {let rows = [['Nomor Pesanan', 'Nama', 'Nomor HP', 'Layanan', 'Berat (kg)', 'Total', 'Tanggal Masuk', 'Estimasi Selesai', 'Status Laundry', 'Pembayaran'], ...orders.map(o => [o.id, o.name, o.phone, o.service, o.weight, o.total, o.date, o.due, o.status, o.payment])], csv = rows.map(r => r.map(v => '"' + String(v).replace(/"/g, '""') + '"').join(',')).join('\r\n'), blob = new Blob(['\ufeff' + csv], {type: 'text/csv;charset=utf-8;'}), url = URL.createObjectURL(blob), a = document.createElement('a'); a.href = url; a.download = 'laporan-freshfold.csv'; a.click(); URL.revokeObjectURL(url); toast('Laporan CSV berhasil diunduh.')}
    updatePrice();

    const ADMIN_USERNAME = 'admin'; const ADMIN_PASSWORD = 'freshfold123';
    document.getElementById('loginForm').addEventListener('submit', function (e) {e.preventDefault(); const u = document.getElementById('adminUsername').value.trim(); const p = document.getElementById('adminPassword').value; const err = document.getElementById('loginError'); if (u === ADMIN_USERNAME && p === ADMIN_PASSWORD) {err.classList.remove('show'); document.getElementById('loginScreen').style.display = 'none'; document.getElementById('mainApp').style.display = 'flex'; renderDashboard(); renderOrders(); renderReports(); toast('Berhasil login. Selamat datang, Admin!');} else {err.classList.add('show'); document.getElementById('adminPassword').value = ''; document.getElementById('adminPassword').focus();} });
    function logoutAdmin() {document.getElementById('mainApp').style.display = 'none'; document.getElementById('loginScreen').style.display = 'grid'; document.getElementById('loginForm').reset(); document.getElementById('loginError').classList.remove('show'); document.getElementById('adminUsername').focus();}
  </script>
</body>

</html>