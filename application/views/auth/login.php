<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Maju Jaya – Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --ink:      #0d0d0d;
            --ink-60:   rgba(13,13,13,0.6);
            --ink-20:   rgba(13,13,13,0.12);
            --ink-08:   rgba(13,13,13,0.06);
            --paper:    #f5f4f0;
            --white:    #ffffff;
            --accent:   #1a1a1a;
            --line:     rgba(13,13,13,0.15);
        }

        html, body {
            height: 100%;
            font-family: 'DM Sans', sans-serif;
            background: var(--paper);
            color: var(--ink);
            overflow: hidden;
        }

        /* ── GRID BACKGROUND ── */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(var(--ink-08) 1px, transparent 1px),
                linear-gradient(90deg, var(--ink-08) 1px, transparent 1px);
            background-size: 48px 48px;
            pointer-events: none;
            z-index: 0;
        }

        /* ── DECORATIVE CIRCLE ── */
        .deco-circle {
            position: fixed;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            border: 1px solid var(--line);
            top: -200px;
            left: -100px;
            pointer-events: none;
            z-index: 0;
            animation: spin 40s linear infinite;
        }
        .deco-circle::after {
            content: '';
            position: absolute;
            inset: 60px;
            border-radius: 50%;
            border: 1px solid var(--ink-20);
        }
        @keyframes spin { to { transform: rotate(360deg); } }

        .deco-line {
            position: fixed;
            bottom: 0; right: 0;
            width: 50vw; height: 50vh;
            border-top: 1px solid var(--line);
            border-left: 1px solid var(--line);
            border-radius: 100% 0 0 0;
            pointer-events: none;
            z-index: 0;
        }

        /* ── LAYOUT ── */
        .wrapper {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        /* ── LEFT PANEL ── */
        .panel-left {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 56px 64px;
            border-right: 1px solid var(--line);
        }

        .brand {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .brand-label {
            font-size: 10px;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: var(--ink-60);
            font-weight: 400;
        }
        .brand-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 28px;
            font-weight: 600;
            line-height: 1.15;
            letter-spacing: -0.01em;
        }
        .brand-sub {
            font-size: 11px;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--ink-60);
            font-weight: 300;
            margin-top: 2px;
        }

        .hero-text {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 48px 0;
        }
        .hero-kicker {
            font-size: 10px;
            letter-spacing: 0.24em;
            text-transform: uppercase;
            color: var(--ink-60);
            margin-bottom: 20px;
        }
        .hero-headline {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(40px, 5vw, 68px);
            font-weight: 300;
            line-height: 1.08;
            letter-spacing: -0.02em;
        }
        .hero-headline em {
            font-style: italic;
            font-weight: 300;
        }
        .hero-divider {
            width: 40px;
            height: 1px;
            background: var(--ink);
            margin: 28px 0;
        }
        .hero-desc {
            font-size: 13px;
            color: var(--ink-60);
            line-height: 1.7;
            max-width: 320px;
            font-weight: 300;
        }

        .panel-footer {
            font-size: 10px;
            color: var(--ink-60);
            letter-spacing: 0.08em;
        }

        /* ── RIGHT PANEL ── */
        .panel-right {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 56px 64px;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            animation: fadeUp 0.7s cubic-bezier(0.22,1,0.36,1) both;
        }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .login-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 36px;
            font-weight: 600;
            letter-spacing: -0.02em;
            margin-bottom: 6px;
        }
        .login-subtitle {
            font-size: 12px;
            color: var(--ink-60);
            letter-spacing: 0.06em;
            margin-bottom: 40px;
            font-weight: 300;
        }

        /* ── FLASH ERROR ── */
        .flash-error {
            display: flex;
            align-items: center;
            gap: 10px;
            background: var(--ink);
            color: var(--paper);
            font-size: 12px;
            padding: 12px 16px;
            border-radius: 2px;
            margin-bottom: 24px;
            letter-spacing: 0.04em;
            animation: fadeUp 0.4s ease both;
        }
        .flash-error svg { flex-shrink: 0; }

        /* ── FORM ── */
        .field {
            position: relative;
            margin-bottom: 20px;
        }
        .field label {
            display: block;
            font-size: 10px;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--ink-60);
            margin-bottom: 8px;
            font-weight: 400;
        }
        .field input {
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 1px solid var(--line);
            padding: 10px 0;
            font-family: 'DM Sans', sans-serif;
            font-size: 15px;
            color: var(--ink);
            outline: none;
            transition: border-color 0.25s;
        }
        .field input::placeholder { color: var(--ink-20); }
        .field input:focus { border-color: var(--ink); }

        /* eye toggle */
        .eye-btn {
            position: absolute;
            right: 0; bottom: 10px;
            background: none; border: none;
            cursor: pointer;
            color: var(--ink-60);
            padding: 0;
            line-height: 1;
            transition: color 0.2s;
        }
        .eye-btn:hover { color: var(--ink); }

        /* ── REMEMBER + EXTRAS ── */
        .form-extras {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 24px 0 32px;
        }
        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }
        .remember input[type="checkbox"] { display: none; }
        .checkbox-box {
            width: 14px; height: 14px;
            border: 1px solid var(--line);
            display: flex; align-items: center; justify-content: center;
            transition: background 0.2s, border-color 0.2s;
            flex-shrink: 0;
        }
        .remember input:checked + .checkbox-box {
            background: var(--ink);
            border-color: var(--ink);
        }
        .checkbox-icon { display: none; }
        .remember input:checked ~ .checkbox-icon { display: block; }
        .remember span {
            font-size: 12px;
            color: var(--ink-60);
            letter-spacing: 0.04em;
        }
        .forgot-link {
            font-size: 11px;
            color: var(--ink-60);
            text-decoration: none;
            letter-spacing: 0.08em;
            border-bottom: 1px solid transparent;
            transition: color 0.2s, border-color 0.2s;
        }
        .forgot-link:hover { color: var(--ink); border-color: var(--ink); }

        /* ── SUBMIT BUTTON ── */
        .btn-login {
            width: 100%;
            background: var(--ink);
            color: var(--paper);
            border: none;
            padding: 16px;
            font-family: 'DM Sans', sans-serif;
            font-size: 11px;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            cursor: pointer;
            transition: background 0.25s, transform 0.15s;
            position: relative;
            overflow: hidden;
        }
        .btn-login::after {
            content: '';
            position: absolute;
            inset: 0;
            background: white;
            opacity: 0;
            transition: opacity 0.3s;
        }
        .btn-login:hover { background: #333; }
        .btn-login:active { transform: scale(0.99); }

        /* ── REGISTER LINK ── */
        .register-row {
            text-align: center;
            margin-top: 24px;
            font-size: 12px;
            color: var(--ink-60);
        }
        .register-row a {
            color: var(--ink);
            text-decoration: none;
            font-weight: 500;
            border-bottom: 1px solid var(--ink);
            padding-bottom: 1px;
            transition: opacity 0.2s;
        }
        .register-row a:hover { opacity: 0.6; }

        /* ── RESPONSIVE ── */
        @media (max-width: 768px) {
            .wrapper { grid-template-columns: 1fr; }
            .panel-left { display: none; }
            .panel-right { padding: 40px 28px; align-items: flex-start; padding-top: 80px; }
            .login-card { max-width: 100%; }
        }
    </style>
</head>
<body>

<div class="deco-circle"></div>
<div class="deco-line"></div>

<div class="wrapper">

    <!-- LEFT -->
    <div class="panel-left">
        <div class="brand">
            <span class="brand-label">Sistem Sales Order</span>
            <span class="brand-name">PT Maju Jaya</span>
            <span class="brand-sub">Distribusi Alat Elektronik</span>
        </div>

        <div class="hero-text">
            <p class="hero-kicker">Platform Manajemen Penjualan</p>
            <h1 class="hero-headline">Efisien.<br><em>Akurat.</em><br>Terpadu.</h1>
            <div class="hero-divider"></div>
            <p class="hero-desc">Kelola sales order, produk, dan pelanggan dalam satu platform terintegrasi. Dirancang untuk tim sales yang dinamis.</p>
        </div>

        <p class="panel-footer">&copy; <?= date('Y') ?> PT Maju Jaya &nbsp;·&nbsp; All rights reserved</p>
    </div>

    <!-- RIGHT -->
    <div class="panel-right">
        <div class="login-card">

            <h2 class="login-title">Masuk</h2>
            <p class="login-subtitle">Selamat datang kembali — masukkan kredensial Anda</p>

            <?php if($this->session->flashdata('error')): ?>
            <div class="flash-error">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                <?= $this->session->flashdata('error') ?>
            </div>
            <?php endif; ?>

            <?= form_open('auth/login') ?>

                <div class="field">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username"
                           placeholder="Masukkan username Anda"
                           value="<?= set_value('username') ?>" required autocomplete="username">
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password"
                           placeholder="••••••••" required autocomplete="current-password">
                    <button type="button" class="eye-btn" onclick="togglePwd(this)" aria-label="Tampilkan password">
                        <svg id="eye-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                    </button>
                </div>

                <div class="form-extras">
                    <label class="remember">
                        <input type="checkbox" name="remember" id="remember">
                        <span class="checkbox-box"></span>
                        <svg class="checkbox-icon" style="position:absolute;pointer-events:none;margin-left:1px" width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="white" stroke-width="2"><polyline points="2,6 5,9 10,3"/></svg>
                        <span>Ingat saya</span>
                    </label>
                    <a href="<?= base_url('auth/forgot') ?>" class="forgot-link">Lupa Password?</a>
                </div>

                <button type="submit" class="btn-login">Masuk ke Sistem</button>

            <?= form_close() ?>

            <p class="register-row">Belum punya akun? <a href="<?= base_url('auth/register') ?>">Daftar sekarang</a></p>
        </div>
    </div>

</div>

<script>
function togglePwd(btn) {
    const input = document.getElementById('password');
    const isHidden = input.type === 'password';
    input.type = isHidden ? 'text' : 'password';
    btn.querySelector('svg').innerHTML = isHidden
        ? '<path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/>'
        : '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
}

// checkbox SVG fix — keep icon aligned
document.querySelectorAll('.remember input[type="checkbox"]').forEach(cb => {
    cb.addEventListener('change', function() {
        const icon = this.parentElement.querySelector('.checkbox-icon');
        icon.style.display = this.checked ? 'block' : 'none';
    });
});
</script>
</body>
</html>