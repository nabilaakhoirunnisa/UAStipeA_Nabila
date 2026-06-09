<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Maju Jaya – Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            background: #f5f4f0;
        }

        /* ── LEFT PANEL ── */
        .left-panel {
            width: 400px;
            flex-shrink: 0;
            background: #0d0d0d;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 48px 48px;
            position: relative;
            overflow: hidden;
        }

        /* subtle circle deco */
        .left-panel::before {
            content: '';
            position: absolute;
            width: 320px; height: 320px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.05);
            bottom: -100px; right: -100px;
            pointer-events: none;
        }
        .left-panel::after {
            content: '';
            position: absolute;
            width: 180px; height: 180px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.04);
            bottom: -20px; right: -20px;
            pointer-events: none;
        }

        .brand-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 30px;
            font-weight: 600;
            color: #fff;
            letter-spacing: -0.01em;
            line-height: 1.1;
        }
        .brand-sub {
            font-size: 11px;
            font-weight: 300;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.35);
            margin-top: 8px;
        }

        .left-footer {
            font-size: 10.5px;
            color: rgba(255,255,255,0.20);
            letter-spacing: 0.04em;
        }

        /* ── RIGHT PANEL ── */
        .right-panel {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px 40px;
            background: #f5f4f0;
        }

        .login-box {
            width: 100%;
            max-width: 380px;
            animation: fadeUp 0.5s cubic-bezier(0.22,1,0.36,1) both;
        }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(18px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .login-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 28px;
            font-weight: 600;
            color: #0d0d0d;
            letter-spacing: -0.01em;
            margin-bottom: 4px;
        }
        .login-subtitle {
            font-size: 12.5px;
            color: rgba(13,13,13,0.45);
            margin-bottom: 32px;
            font-weight: 300;
        }

        /* flash error */
        .flash-error {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(122,26,26,0.07);
            border: 1px solid rgba(122,26,26,0.18);
            color: #7a1a1a;
            font-size: 12.5px;
            font-weight: 400;
            padding: 11px 14px;
            margin-bottom: 20px;
        }

        /* fields */
        .field { margin-bottom: 16px; }
        .field label {
            display: block;
            font-size: 10px;
            font-weight: 400;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            color: rgba(13,13,13,0.45);
            margin-bottom: 8px;
        }
        .field input {
            width: 100%;
            background: #fff;
            border: 1px solid rgba(13,13,13,0.12);
            border-radius: 0;
            padding: 11px 14px;
            font-family: 'DM Sans', sans-serif;
            font-size: 13.5px;
            color: #0d0d0d;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .field input::placeholder { color: rgba(13,13,13,0.20); }
        .field input:focus {
            border-color: #0d0d0d;
            box-shadow: none;
        }

        .pw-wrap { position: relative; }
        .pw-wrap input { padding-right: 42px; }
        .eye-btn {
            position: absolute;
            right: 12px; top: 50%;
            transform: translateY(-50%);
            background: none; border: none;
            cursor: pointer; padding: 0;
            color: rgba(13,13,13,0.25);
            transition: color 0.2s;
            line-height: 1;
        }
        .eye-btn:hover { color: #0d0d0d; }

        .form-extras {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 8px 0 24px;
        }
        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }
        .remember input[type="checkbox"] {
            width: 13px; height: 13px;
            accent-color: #0d0d0d;
            cursor: pointer;
        }
        .remember span {
            font-size: 12px;
            color: rgba(13,13,13,0.55);
            font-weight: 400;
        }
        .forgot-link {
            font-size: 12px;
            color: rgba(13,13,13,0.45);
            text-decoration: none;
            border-bottom: 1px solid rgba(13,13,13,0.20);
            padding-bottom: 1px;
            transition: color 0.2s, border-color 0.2s;
        }
        .forgot-link:hover {
            color: #0d0d0d;
            border-color: #0d0d0d;
        }

        .btn-login {
            width: 100%;
            background: #0d0d0d;
            color: #fff;
            border: none;
            border-radius: 0;
            padding: 13px;
            font-family: 'DM Sans', sans-serif;
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            cursor: pointer;
            transition: background 0.2s, transform 0.15s;
        }
        .btn-login:hover { background: #1a3a6b; }
        .btn-login:active { transform: scale(0.99); }

        .register-row {
            text-align: center;
            font-size: 12px;
            color: rgba(13,13,13,0.40);
            margin-top: 18px;
        }
        .register-row a {
            color: #0d0d0d;
            font-weight: 500;
            text-decoration: none;
            border-bottom: 1px solid rgba(13,13,13,0.30);
            padding-bottom: 1px;
        }
        .register-row a:hover { border-color: #0d0d0d; }

        @media (max-width: 720px) {
            .left-panel { display: none; }
        }
    </style>
</head>
<body>

    <!-- LEFT -->
    <div class="left-panel">
        <div>
            <p class="brand-name">PT Maju Jaya</p>
            <p class="brand-sub">Sales Order System</p>
        </div>
        <p class="left-footer">&copy; <?= date('Y') ?> PT Maju Jaya</p>
    </div>

    <!-- RIGHT -->
    <div class="right-panel">
        <div class="login-box">

            <h2 class="login-title">Masuk</h2>
            <p class="login-subtitle">Silakan login untuk melanjutkan</p>

            <?php if ($this->session->flashdata('error')): ?>
            <div class="flash-error">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                <?= $this->session->flashdata('error') ?>
            </div>
            <?php endif; ?>

            <?= form_open('auth/login') ?>

                <div class="field">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username"
                           placeholder="Masukkan username"
                           value="<?= set_value('username') ?>"
                           required autocomplete="username">
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <div class="pw-wrap">
                        <input type="password" id="password" name="password"
                               placeholder="Masukkan password"
                               required autocomplete="current-password">
                        <button type="button" class="eye-btn" onclick="togglePwd(this)">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="form-extras">
                    <label class="remember">
                        <input type="checkbox" name="remember">
                        <span>Ingat saya</span>
                    </label>
                    <a href="<?= base_url('auth/forgot') ?>" class="forgot-link">Lupa Password?</a>
                </div>

                <button type="submit" class="btn-login">Login</button>

            <?= form_close() ?>

            <p class="register-row">Belum punya akun? <a href="<?= base_url('auth/register') ?>">Daftar</a></p>

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
</script>
</body>
</html>