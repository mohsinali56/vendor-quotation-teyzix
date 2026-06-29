<style>
    .vq-nav {
        background: #ffffff;
        border-bottom: 1px solid #e5e4df;
        font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
        position: sticky;
        top: 0;
        z-index: 50;
    }
    .vq-nav-inner {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 1.5rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 62px;
    }

    /* ── Brand ── */
    .vq-brand {
        display: flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
        flex-shrink: 0;
    }
    .vq-brand-box {
        width: 32px;
        height: 32px;
        background: #1a1a2e;
        border-radius: 7px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .vq-brand-name {
        font-size: 16px;
        font-weight: 700;
        color: #1a1a2e;
        letter-spacing: -0.3px;
    }

    /* ── Desktop Nav Links ── */
    .vq-links {
        display: flex;
        align-items: center;
        gap: 2px;
        margin-left: 2rem;
    }
    .vq-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        font-size: 13.5px;
        font-weight: 500;
        color: #6b6a66;
        text-decoration: none;
        border-radius: 7px;
        border: 1px solid transparent;
        transition: color 0.15s, background 0.15s;
        white-space: nowrap;
    }
    .vq-link:hover {
        color: #1a1a2e;
        background: #f4f3ef;
    }
    .vq-link.active {
        color: #1a1a2e;
        background: #eef2ff;
        border-color: #c7d2fe;
        font-weight: 600;
    }
    .vq-link svg {
        width: 14px;
        height: 14px;
        flex-shrink: 0;
    }

    /* ── Right side ── */
    .vq-right {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-left: auto;
    }

    /* ── Role Badge ── */
    .vq-role-badge {
        font-size: 11px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 100px;
        text-transform: capitalize;
        letter-spacing: 0.2px;
    }
    .vq-role-badge.admin {
        background: #fef3c7;
        color: #92400e;
        border: 1px solid #fde68a;
    }
    .vq-role-badge.vendor {
        background: #eef2ff;
        color: #3730a3;
        border: 1px solid #c7d2fe;
    }

    /* ── User Dropdown ── */
    .vq-user-wrap {
        position: relative;
    }
    .vq-user-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 12px 6px 8px;
        background: #f4f3ef;
        border: 1px solid #e5e4df;
        border-radius: 8px;
        cursor: pointer;
        font-size: 13.5px;
        font-weight: 500;
        color: #1a1a2e;
        font-family: inherit;
        transition: background 0.15s, border-color 0.15s;
    }
    .vq-user-btn:hover {
        background: #eceae4;
        border-color: #d0cfc9;
    }
    .vq-avatar {
        width: 26px;
        height: 26px;
        background: #1a1a2e;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: 700;
        color: #e8c547;
        flex-shrink: 0;
    }
    .vq-chevron {
        width: 14px;
        height: 14px;
        color: #9a9994;
        transition: transform 0.2s;
    }

    /* Dropdown Menu */
    .vq-dropdown {
        display: none;
        position: absolute;
        top: calc(100% + 8px);
        right: 0;
        min-width: 200px;
        background: #ffffff;
        border: 1px solid #e5e4df;
        border-radius: 10px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.08), 0 2px 6px rgba(0,0,0,0.04);
        overflow: hidden;
        z-index: 100;
    }
    .vq-dropdown.open { display: block; }

    .vq-dropdown-header {
        padding: 12px 14px 10px;
        border-bottom: 1px solid #f0efe9;
    }
    .vq-dropdown-name {
        font-size: 13px;
        font-weight: 600;
        color: #1a1a2e;
    }
    .vq-dropdown-email {
        font-size: 12px;
        color: #9a9994;
        margin-top: 1px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 170px;
    }
    .vq-dropdown-item {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 9px 14px;
        font-size: 13px;
        color: #3a3a38;
        text-decoration: none;
        transition: background 0.12s;
        cursor: pointer;
        background: transparent;
        border: none;
        width: 100%;
        font-family: inherit;
        text-align: left;
    }
    .vq-dropdown-item:hover { background: #f4f3ef; color: #1a1a2e; }
    .vq-dropdown-item svg {
        width: 14px;
        height: 14px;
        flex-shrink: 0;
        color: #9a9994;
    }
    .vq-dropdown-divider {
        height: 1px;
        background: #f0efe9;
        margin: 4px 0;
    }
    .vq-dropdown-item.logout { color: #e24b4a; }
    .vq-dropdown-item.logout svg { color: #e24b4a; }
    .vq-dropdown-item.logout:hover { background: #fff5f5; }

    /* ── Mobile Hamburger ── */
    .vq-hamburger {
        display: none;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        background: #f4f3ef;
        border: 1px solid #e5e4df;
        border-radius: 7px;
        cursor: pointer;
        color: #1a1a2e;
    }
    .vq-hamburger svg { width: 18px; height: 18px; }

    /* ── Mobile Menu ── */
    .vq-mobile-menu {
        display: none;
        border-top: 1px solid #e5e4df;
        background: #ffffff;
    }
    .vq-mobile-menu.open { display: block; }

    .vq-mobile-links {
        padding: 10px 1rem;
        display: flex;
        flex-direction: column;
        gap: 2px;
    }
    .vq-mobile-link {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 9px 12px;
        font-size: 14px;
        font-weight: 500;
        color: #6b6a66;
        text-decoration: none;
        border-radius: 7px;
        transition: background 0.12s, color 0.12s;
    }
    .vq-mobile-link:hover { background: #f4f3ef; color: #1a1a2e; }
    .vq-mobile-link.active {
        background: #eef2ff;
        color: #1a1a2e;
        font-weight: 600;
    }
    .vq-mobile-link svg { width: 15px; height: 15px; flex-shrink: 0; }

    .vq-mobile-user {
        padding: 12px 1rem 14px;
        border-top: 1px solid #f0efe9;
    }
    .vq-mobile-user-info {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
    }
    .vq-mobile-avatar {
        width: 34px;
        height: 34px;
        background: #1a1a2e;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 700;
        color: #e8c547;
        flex-shrink: 0;
    }
    .vq-mobile-user-name {
        font-size: 14px;
        font-weight: 600;
        color: #1a1a2e;
    }
    .vq-mobile-user-email {
        font-size: 12px;
        color: #9a9994;
    }

    @media (max-width: 640px) {
        .vq-links { display: none; }
        .vq-role-badge { display: none; }
        .vq-user-wrap { display: none; }
        .vq-hamburger { display: flex; }
    }
</style>

<nav class="vq-nav">
    <div class="vq-nav-inner">

        {{-- Brand --}}
        <a href="{{ route('dashboard') }}" class="vq-brand">
            <div class="vq-brand-box">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                     stroke="#e8c547" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 12h6m-6 4h6M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"/>
                </svg>
            </div>
            <span class="vq-brand-name">VendorQuote</span>
        </a>

        {{-- Desktop Nav Links --}}
        <div class="vq-links">
            @auth
                @if(Auth::user()->role === 'vendor')
                    <a href="{{ route('vendor.dashboard') }}"
                       class="vq-link {{ request()->routeIs('vendor.dashboard') ? 'active' : '' }}">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
                            <rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>
                        </svg>
                        Dashboard
                    </a>

                    {{-- Vendor Quotation Requests Link --}}
                    <a href="{{ route('vendor.quotation-requests.index') }}"
                       class="vq-link {{ request()->routeIs('vendor.quotation-requests.*') ? 'active' : '' }}">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/><line x1="9" y1="13" x2="15" y2="13"/>
                            <line x1="9" y1="17" x2="15" y2="17"/>
                        </svg>
                        Quotation Requests
                    </a>

                    {{-- NEW: My Quotations Link --}}
                    <a href="{{ route('vendor.my.quotations') }}"
                       class="vq-link {{ request()->routeIs('vendor.my.quotations') ? 'active' : '' }}">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                            <polyline points="14 2 14 8 20 8"/>
                        </svg>
                        My Quotations
                    </a>
                @endif

                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}"
                       class="vq-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
                            <rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>
                        </svg>
                        Dashboard
                    </a>

                    <a href="{{ route('quotation-requests.index') }}"
                       class="vq-link {{ request()->routeIs('quotation-requests.index') ? 'active' : '' }}">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/><line x1="9" y1="13" x2="15" y2="13"/>
                            <line x1="9" y1="17" x2="15" y2="17"/>
                        </svg>
                        Quotation Requests
                    </a>

                    <a href="{{ route('quotation-requests.history') }}"
                       class="vq-link {{ request()->routeIs('quotation-requests.history') ? 'active' : '' }}">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <polyline points="12 6 12 12 16 14"/>
                        </svg>
                        Quotation History
                    </a>
                    
                @endif
            @endauth
        </div>

        {{-- Right Side --}}
        <div class="vq-right">
            @auth
                {{-- Role Badge --}}
                <span class="vq-role-badge {{ Auth::user()->role }}">
                    {{ ucfirst(Auth::user()->role) }}
                </span>

                {{-- User Dropdown --}}
                <div class="vq-user-wrap" id="vqUserWrap">
                    <button class="vq-user-btn" onclick="toggleVqDropdown()" type="button">
                        <div class="vq-avatar">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        {{ Auth::user()->name }}
                        <svg class="vq-chevron" id="vqChevron" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"/>
                        </svg>
                    </button>

                    <div class="vq-dropdown" id="vqDropdown">
                        <div class="vq-dropdown-header">
                            <div class="vq-dropdown-name">{{ Auth::user()->name }}</div>
                            <div class="vq-dropdown-email">{{ Auth::user()->email }}</div>
                        </div>

                        <a href="{{ route('profile.edit') }}" class="vq-dropdown-item">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>
                            Profile Settings
                        </a>

                        <div class="vq-dropdown-divider"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="vq-dropdown-item logout">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/>
                                    <polyline points="16 17 21 12 16 7"/>
                                    <line x1="21" y1="12" x2="9" y2="12"/>
                                </svg>
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            @endauth

            {{-- Mobile Hamburger --}}
            <button class="vq-hamburger" onclick="toggleVqMobile()" type="button">
                <svg id="vqHamIcon" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="6" x2="21" y2="6"/>
                    <line x1="3" y1="12" x2="21" y2="12"/>
                    <line x1="3" y1="18" x2="21" y2="18"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div class="vq-mobile-menu" id="vqMobileMenu">
        <div class="vq-mobile-links">
            @auth
                @if(Auth::user()->role === 'vendor')
                    <a href="{{ route('vendor.dashboard') }}"
                       class="vq-mobile-link {{ request()->routeIs('vendor.dashboard') ? 'active' : '' }}">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
                            <rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>
                        </svg>
                        Dashboard
                    </a>

                    {{-- Vendor Quotation Requests Mobile Link --}}
                    <a href="{{ route('vendor.quotation-requests.index') }}"
                       class="vq-mobile-link {{ request()->routeIs('vendor.quotation-requests.*') ? 'active' : '' }}">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/>
                        </svg>
                        Quotation Requests
                    </a>

                    {{-- NEW: My Quotations Mobile Link --}}
                    <a href="{{ route('vendor.my.quotations') }}"
                       class="vq-mobile-link {{ request()->routeIs('vendor.my.quotations') ? 'active' : '' }}">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                            <polyline points="14 2 14 8 20 8"/>
                        </svg>
                        My Quotations
                    </a>
                @endif

                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}"
                       class="vq-mobile-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
                            <rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>
                        </svg>
                        Dashboard
                    </a>

                    <a href="{{ route('quotation-requests.index') }}"
                       class="vq-mobile-link {{ request()->routeIs('quotation-requests.index') ? 'active' : '' }}">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/>
                        </svg>
                        Quotation Requests
                    </a>

                    <a href="{{ route('quotation-requests.history') }}"
                       class="vq-mobile-link {{ request()->routeIs('quotation-requests.history') ? 'active' : '' }}">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <polyline points="12 6 12 12 16 14"/>
                        </svg>
                        Quotation History
                    </a>
                @endif
            @endauth
        </div>

        {{-- Mobile User Info --}}
        @auth
        <div class="vq-mobile-user">
            <div class="vq-mobile-user-info">
                <div class="vq-mobile-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div>
                    <div class="vq-mobile-user-name">{{ Auth::user()->name }}</div>
                    <div class="vq-mobile-user-email">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div style="display:flex;flex-direction:column;gap:2px;">
                <a href="{{ route('profile.edit') }}" class="vq-mobile-link">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/>
                    </svg>
                    Profile Settings
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="vq-mobile-link"
                            style="width:100%;background:transparent;border:none;cursor:pointer;font-family:inherit;color:#e24b4a;"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:15px;height:15px;flex-shrink:0;">
                            <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/>
                            <polyline points="16 17 21 12 16 7"/>
                            <line x1="21" y1="12" x2="9" y2="12"/>
                        </svg>
                        Log Out
                    </button>
                </form>
            </div>
        </div>
        @endauth
    </div>
</nav>

<script>
    function toggleVqDropdown() {
        const dropdown = document.getElementById('vqDropdown');
        const chevron  = document.getElementById('vqChevron');
        dropdown.classList.toggle('open');
        chevron.style.transform = dropdown.classList.contains('open') ? 'rotate(180deg)' : '';
    }

    function toggleVqMobile() {
        document.getElementById('vqMobileMenu').classList.toggle('open');
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        const wrap = document.getElementById('vqUserWrap');
        if (wrap && !wrap.contains(e.target)) {
            document.getElementById('vqDropdown').classList.remove('open');
            document.getElementById('vqChevron').style.transform = '';
        }
    });
</script>