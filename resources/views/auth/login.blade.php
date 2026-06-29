<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - VendorQuote</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
            background: #f4f3ef;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .topbar {
            width: 100%;
            max-width: 960px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.75rem;
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .brand-box {
            width: 36px;
            height: 36px;
            background: #1a1a2e;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .brand-name {
            font-size: 17px;
            font-weight: 700;
            color: #1a1a2e;
            letter-spacing: -0.3px;
            text-decoration: none;
        }
        .platform-pill {
            background: #eef2ff;
            color: #4338ca;
            font-size: 11px;
            font-weight: 500;
            padding: 4px 14px;
            border-radius: 100px;
            border: 1px solid #c7d2fe;
        }

        .main-card {
            width: 100%;
            max-width: 960px;
            background: #ffffff;
            border-radius: 18px;
            border: 1px solid #e5e4df;
            display: flex;
            overflow: hidden;
            min-height: 540px;
        }

        /* ── Left Panel ── */
        .left-panel {
            flex: 1;
            background: linear-gradient(145deg, #1a1a2e 0%, #16213e 55%, #0f3460 100%);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 3rem 2.5rem;
            position: relative;
            overflow: hidden;
        }
        .left-panel::before {
            content: '';
            position: absolute;
            top: -80px;
            right: -80px;
            width: 260px;
            height: 260px;
            background: rgba(232,197,71,0.06);
            border-radius: 50%;
        }
        .left-panel::after {
            content: '';
            position: absolute;
            bottom: -60px;
            left: -60px;
            width: 200px;
            height: 200px;
            background: rgba(67,56,202,0.1);
            border-radius: 50%;
        }
        .left-top { position: relative; z-index: 1; }

        .vq-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: rgba(232,197,71,0.12);
            border: 1px solid rgba(232,197,71,0.25);
            color: #e8c547;
            font-size: 11px;
            font-weight: 500;
            padding: 5px 14px;
            border-radius: 100px;
            margin-bottom: 1.5rem;
        }
        .vq-badge-dot {
            width: 5px;
            height: 5px;
            background: #e8c547;
            border-radius: 50%;
            display: inline-block;
        }

        .left-panel h1 {
            font-size: 28px;
            font-weight: 800;
            color: #ffffff;
            line-height: 1.25;
            letter-spacing: -0.5px;
            margin-bottom: 12px;
        }
        .left-panel h1 span { color: #e8c547; }

        .left-panel p {
            font-size: 13.5px;
            color: rgba(255,255,255,0.5);
            line-height: 1.75;
            margin-bottom: 2rem;
            max-width: 340px;
        }

        .features-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 11px;
        }
        .feat-item {
            display: flex;
            align-items: center;
            gap: 11px;
            font-size: 13px;
            color: rgba(255,255,255,0.7);
        }
        .feat-check {
            width: 20px;
            height: 20px;
            min-width: 20px;
            background: rgba(232,197,71,0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .left-bottom {
            position: relative;
            z-index: 1;
            margin-top: 2.5rem;
        }
        .stats { display: flex; gap: 28px; }
        .stat-num {
            font-size: 22px;
            font-weight: 800;
            color: #e8c547;
            line-height: 1;
        }
        .stat-label {
            font-size: 10px;
            color: rgba(255,255,255,0.4);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 3px;
        }

        /* ── Right Panel ── */
        .right-panel {
            width: 420px;
            flex-shrink: 0;
            padding: 3rem 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #ffffff;
        }
        .right-panel h2 {
            font-size: 22px;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 5px;
            letter-spacing: -0.3px;
        }
        .right-tagline {
            font-size: 13px;
            color: #9a9994;
            margin-bottom: 1.75rem;
        }

        /* ── Session Status ── */
        .session-status {
            background: #ecfdf5;
            border: 1px solid #6ee7b7;
            color: #065f46;
            font-size: 13px;
            padding: 10px 14px;
            border-radius: 8px;
            margin-bottom: 1.25rem;
        }

        /* ── Form ── */
        .form-group { margin-bottom: 1.1rem; }
        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #555555;
            margin-bottom: 6px;
            letter-spacing: 0.2px;
        }
        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #e0dfd9;
            border-radius: 8px;
            font-size: 14px;
            color: #1a1a2e;
            background: #fafaf8;
            outline: none;
            font-family: inherit;
            transition: border-color 0.15s;
        }
        .form-group input[type="email"]:focus,
        .form-group input[type="password"]:focus {
            border-color: #4338ca;
            background: #ffffff;
        }
        .form-group input::placeholder { color: #bbbbbb; }

        .error-msg {
            font-size: 12px;
            color: #e24b4a;
            margin-top: 4px;
            display: block;
        }

        /* ── Remember Me ── */
        .remember-row {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 1rem;
        }
        .remember-row input[type="checkbox"] {
            width: 15px;
            height: 15px;
            border: 1px solid #d0cfc9;
            border-radius: 4px;
            accent-color: #4338ca;
            cursor: pointer;
            flex-shrink: 0;
        }
        .remember-row label {
            font-size: 13px;
            color: #6b6a66;
            cursor: pointer;
        }

        /* ── Forgot + Submit row ── */
        .form-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-top: 0.5rem;
        }
        .forgot-link {
            font-size: 12px;
            color: #4338ca;
            text-decoration: none;
            white-space: nowrap;
        }
        .forgot-link:hover { text-decoration: underline; }

        .btn-login {
            flex: 1;
            padding: 11px 20px;
            background: #1a1a2e;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            font-family: inherit;
            letter-spacing: 0.1px;
            transition: background 0.15s;
            white-space: nowrap;
        }
        .btn-login:hover { background: #0f3460; }

        .divider {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 1.2rem 0;
        }
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #eeeeee;
        }
        .divider span { font-size: 12px; color: #bbbbbb; }

        .btn-create {
            width: 100%;
            padding: 10px;
            background: transparent;
            color: #1a1a2e;
            border: 1px solid #e0dfd9;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            font-family: inherit;
            text-align: center;
            text-decoration: none;
            display: block;
            transition: border-color 0.15s;
        }
        .btn-create:hover { border-color: #1a1a2e; }

        .trust-row {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 1.5rem;
        }
        .trust-row span {
            font-size: 11px;
            color: #b0afaa;
        }

        .page-footer {
            width: 100%;
            max-width: 960px;
            text-align: center;
            margin-top: 1.25rem;
            font-size: 11.5px;
            color: #b0afaa;
        }

        @media (max-width: 720px) {
            .main-card { flex-direction: column-reverse; }
            .right-panel { width: 100%; padding: 2rem 1.5rem; }
            .left-panel { padding: 2rem 1.5rem; }
            .left-panel h1 { font-size: 22px; }
            .platform-pill { display: none; }
        }
    </style>
</head>
<body>

    <div class="topbar">
        <div class="brand">
            <div class="brand-box">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="#e8c547" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 12h6m-6 4h6M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"/>
                </svg>
            </div>
            <a href="{{ url('/') }}" class="brand-name">VendorQuote</a>
        </div>
        <span class="platform-pill">Vendor Quotation Platform</span>
    </div>

    <div class="main-card">

        {{-- Left Panel --}}
        <div class="left-panel">
            <div class="left-top">
                <div class="vq-badge">
                    <span class="vq-badge-dot"></span>
                    Trusted by 500+ businesses
                </div>

                <h1>
                    Manage all vendor<br>
                    <span>quotations</span> in one place
                </h1>

                <p>
                    Streamline your procurement process, compare bids,
                    track approvals, and make smarter purchasing decisions —
                    all from one secure dashboard.
                </p>

                <ul class="features-list">
                    <li class="feat-item">
                        <div class="feat-check">
                            <svg width="11" height="11" viewBox="0 0 12 12" fill="none"
                                 stroke="#e8c547" stroke-width="2.5"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="2,6 5,9 10,3"/>
                            </svg>
                        </div>
                        Collect and compare vendor quotes instantly
                    </li>
                    <li class="feat-item">
                        <div class="feat-check">
                            <svg width="11" height="11" viewBox="0 0 12 12" fill="none"
                                 stroke="#e8c547" stroke-width="2.5"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="2,6 5,9 10,3"/>
                            </svg>
                        </div>
                        Automated approval workflows with full audit trail
                    </li>
                    <li class="feat-item">
                        <div class="feat-check">
                            <svg width="11" height="11" viewBox="0 0 12 12" fill="none"
                                 stroke="#e8c547" stroke-width="2.5"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="2,6 5,9 10,3"/>
                            </svg>
                        </div>
                        Real-time analytics and cost savings insights
                    </li>
                    <li class="feat-item">
                        <div class="feat-check">
                            <svg width="11" height="11" viewBox="0 0 12 12" fill="none"
                                 stroke="#e8c547" stroke-width="2.5"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="2,6 5,9 10,3"/>
                            </svg>
                        </div>
                        Secure vendor portal with role-based access
                    </li>
                </ul>
            </div>

            <div class="left-bottom">
                <div class="stats">
                    <div>
                        <div class="stat-num">500+</div>
                        <div class="stat-label">Vendors</div>
                    </div>
                    <div>
                        <div class="stat-num">99.9%</div>
                        <div class="stat-label">Uptime</div>
                    </div>
                    <div>
                        <div class="stat-num">24/7</div>
                        <div class="stat-label">Support</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Right Panel --}}
        <div class="right-panel">
            <h2>Welcome back</h2>
            <p class="right-tagline">Sign in to your VendorQuote account</p>

            {{-- Session Status --}}
            @if (session('status'))
                <div class="session-status">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="you@company.com"
                        required
                        autofocus
                        autocomplete="username"
                    />
                    @error('email')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="••••••••"
                        required
                        autocomplete="current-password"
                    />
                    @error('password')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Remember Me --}}
                <div class="remember-row">
                    <input id="remember_me" type="checkbox" name="remember" />
                    <label for="remember_me">Remember me</label>
                </div>

                {{-- Forgot + Login Button --}}
                <div class="form-footer">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-link">
                            Forgot your password?
                        </a>
                    @endif
                    <button type="submit" class="btn-login">
                        Sign in &rarr;
                    </button>
                </div>
            </form>

            @if (Route::has('register'))
                <div class="divider"><span>or</span></div>
                <a href="{{ route('register') }}" class="btn-create">
                    Create a new account
                </a>
            @endif

            <div class="trust-row">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                     stroke="#4338ca" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
                <span>256-bit SSL encrypted &middot; Your data is secure</span>
            </div>
        </div>

    </div>

    <div class="page-footer">
        &copy; {{ date('Y') }} VendorQuote &middot; All rights reserved
    </div>

</body>
</html>