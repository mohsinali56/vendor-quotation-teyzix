<x-app-layout>
    <style>
        .vq-page {
            background: #f4f3ef;
            min-height: calc(100vh - 62px);
            padding: 2rem 1.5rem;
            font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
        }
        .vq-container {
            max-width: 900px;
            margin: 0 auto;
        }

        /* ── Welcome Banner ── */
        .vq-banner {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 60%, #0f3460 100%);
            border-radius: 16px;
            padding: 1.75rem 2rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
            position: relative;
            overflow: hidden;
        }
        .vq-banner::before {
            content: '';
            position: absolute;
            top: -60px; right: -60px;
            width: 180px; height: 180px;
            background: rgba(232,197,71,0.07);
            border-radius: 50%;
        }
        .vq-banner-left { position: relative; z-index: 1; }
        .vq-banner-greeting {
            font-size: 13px;
            color: rgba(255,255,255,0.5);
            margin-bottom: 4px;
        }
        .vq-banner-name {
            font-size: 20px;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: -0.3px;
        }
        .vq-banner-name span { color: #e8c547; }
        .vq-banner-stats {
            display: flex;
            gap: 20px;
            position: relative;
            z-index: 1;
        }
        .vq-banner-stat {
            text-align: center;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 10px;
            padding: 10px 18px;
        }
        .vq-banner-stat-num {
            font-size: 20px;
            font-weight: 800;
            color: #e8c547;
            line-height: 1;
        }
        .vq-banner-stat-label {
            font-size: 10px;
            color: rgba(255,255,255,0.4);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 3px;
        }

        /* ── Alert ── */
        .vq-alert-success {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #ecfdf5;
            border: 1px solid #6ee7b7;
            color: #065f46;
            font-size: 13.5px;
            font-weight: 500;
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 1.25rem;
        }
        .vq-alert-success svg { width: 16px; height: 16px; stroke: #059669; fill: none; flex-shrink: 0; }

        /* ── Section Header ── */
        .vq-section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
            flex-wrap: wrap;
            gap: 8px;
        }
        .vq-section-title {
            font-size: 16px;
            font-weight: 700;
            color: #1a1a2e;
            letter-spacing: -0.2px;
        }
        .vq-count-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #1a1a2e;
            color: #e8c547;
            font-size: 11.5px;
            font-weight: 600;
            padding: 5px 13px;
            border-radius: 100px;
        }
        .vq-count-pill svg { width: 12px; height: 12px; stroke: currentColor; fill: none; }

        /* ── Cards ── */
        .vq-cards { display: flex; flex-direction: column; gap: 12px; }

        .vq-card {
            background: #ffffff;
            border: 1px solid #e5e4df;
            border-radius: 14px;
            padding: 1.25rem 1.5rem;
            transition: box-shadow 0.15s, border-color 0.15s;
        }
        .vq-card:hover {
            border-color: #d0cfc9;
            box-shadow: 0 4px 16px rgba(0,0,0,0.06);
        }

        .vq-card-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 6px;
        }
        .vq-card-title {
            font-size: 15px;
            font-weight: 700;
            color: #1a1a2e;
            line-height: 1.3;
        }
        .vq-card-budget {
            font-size: 14px;
            font-weight: 700;
            color: #1a1a2e;
            white-space: nowrap;
            flex-shrink: 0;
        }
        .vq-card-budget span { font-size: 11px; font-weight: 500; color: #9a9994; }

        .vq-card-desc {
            font-size: 13.5px;
            color: #6b6a66;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .vq-card-meta {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 14px;
            flex-wrap: wrap;
        }
        .vq-meta-item {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 12.5px;
            color: #9a9994;
        }
        .vq-meta-item svg { width: 13px; height: 13px; stroke: #b0afaa; fill: none; flex-shrink: 0; }

        .vq-card-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding-top: 12px;
            border-top: 1px solid #f0efe9;
            flex-wrap: wrap;
        }

        /* Status Badges */
        .vq-status {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 100px;
        }
        .vq-status-dot { width: 6px; height: 6px; border-radius: 50%; flex-shrink: 0; }
        .vq-status.pending   { background: #fffbeb; color: #92400e; border: 1px solid #fde68a; }
        .vq-status.pending .vq-status-dot   { background: #f59e0b; }
        .vq-status.submitted { background: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0; }
        .vq-status.submitted .vq-status-dot { background: #10b981; }
        .vq-status.approved  { background: #eef2ff; color: #3730a3; border: 1px solid #c7d2fe; }
        .vq-status.approved .vq-status-dot  { background: #6366f1; }
        .vq-status.rejected  { background: #fff5f5; color: #991b1b; border: 1px solid #fecaca; }
        .vq-status.rejected .vq-status-dot  { background: #ef4444; }

        /* Amount Badge */
        .vq-amount-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 100px;
            background: #eef2ff;
            color: #3730a3;
            border: 1px solid #c7d2fe;
        }
        .vq-amount-badge svg { width: 11px; height: 11px; stroke: currentColor; fill: none; }

        /* Action Buttons */
        .vq-btn-submit {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 16px;
            background: #1a1a2e;
            color: #ffffff;
            font-size: 13px;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            transition: background 0.15s;
            white-space: nowrap;
        }
        .vq-btn-submit:hover { background: #0f3460; }
        .vq-btn-submit svg { width: 13px; height: 13px; stroke: #e8c547; fill: none; }

        .vq-submitted-label {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 13px;
            font-weight: 500;
            color: #9a9994;
        }
        .vq-submitted-label svg { width: 14px; height: 14px; stroke: #10b981; fill: none; }

        /* Empty State */
        .vq-empty {
            text-align: center;
            padding: 4rem 2rem;
            background: #ffffff;
            border: 1px solid #e5e4df;
            border-radius: 14px;
        }
        .vq-empty-icon {
            width: 56px; height: 56px;
            background: #f4f3ef;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1rem;
        }
        .vq-empty-icon svg { width: 26px; height: 26px; stroke: #9a9994; fill: none; }
        .vq-empty-title { font-size: 16px; font-weight: 600; color: #1a1a2e; margin-bottom: 6px; }
        .vq-empty-text  { font-size: 13px; color: #9a9994; }

        @media (max-width: 640px) {
            .vq-page { padding: 1.25rem 1rem; }
            .vq-banner { padding: 1.25rem; }
            .vq-banner-name { font-size: 17px; }
            .vq-banner-stats { gap: 10px; }
            .vq-banner-stat { padding: 8px 12px; }
            .vq-card { padding: 1rem 1.1rem; }
            .vq-card-top { flex-direction: column; gap: 4px; }
            .vq-card-bottom { flex-direction: column; align-items: flex-start; }
            .vq-btn-submit { width: 100%; justify-content: center; }
        }
        @media (max-width: 400px) {
            .vq-banner { flex-direction: column; }
            .vq-banner-stats { width: 100%; justify-content: space-between; }
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl">Vendor Dashboard</h2>
    </x-slot>

    <div class="vq-page">
        <div class="vq-container">

            {{-- Welcome Banner --}}
            <div class="vq-banner">
                <div class="vq-banner-left">
                    <div class="vq-banner-greeting">Welcome back,</div>
                    <div class="vq-banner-name">
                        <span>{{ Auth::user()->name }}</span>
                    </div>
                </div>
                <div class="vq-banner-stats">
                    <div class="vq-banner-stat">
                        <div class="vq-banner-stat-num">{{ $requests->total() }}</div>
                        <div class="vq-banner-stat-label">Total</div>
                    </div>
                    <div class="vq-banner-stat">
                        <div class="vq-banner-stat-num">
                            {{ $requests->filter(fn($r) => $r->vendors->first()?->pivot->status === 'pending')->count() }}
                        </div>
                        <div class="vq-banner-stat-label">Pending</div>
                    </div>
                    <div class="vq-banner-stat">
                        <div class="vq-banner-stat-num">
                            {{ $requests->filter(fn($r) => $r->vendors->first()?->pivot->status === 'submitted')->count() }}
                        </div>
                        <div class="vq-banner-stat-label">Submitted</div>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="vq-alert-success">
                    <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 11-5.93-9.14"/>
                        <polyline points="22 4 12 14.01 9 11.01"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="vq-section-header">
                <div class="vq-section-title">My Quotation Requests</div>
                <div class="vq-count-pill">
                    <svg viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                    </svg>
                    {{ $requests->total() }} Request{{ $requests->total() != 1 ? 's' : '' }}
                </div>
            </div>

            <div class="vq-cards">
                @forelse($requests as $req)
                    @php
                        $pivot = $req->vendors->first()->pivot;
                        $statusClass = match($pivot->status) {
                            'submitted' => 'submitted',
                            'approved'  => 'approved',
                            'rejected'  => 'rejected',
                            default     => 'pending',
                        };
                    @endphp

                    <div class="vq-card">
                        <div class="vq-card-top">
                            <div class="vq-card-title">{{ $req->title }}</div>
                            @if($req->budget)
                                <div class="vq-card-budget">
                                    <span>Budget</span> Rs {{ number_format($req->budget) }}
                                </div>
                            @endif
                        </div>

                        <div class="vq-card-desc">{{ $req->description }}</div>

                        @if($req->deadline)
                            <div class="vq-card-meta">
                                <div class="vq-meta-item">
                                    <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                        <line x1="16" y1="2" x2="16" y2="6"/>
                                        <line x1="8" y1="2" x2="8" y2="6"/>
                                        <line x1="3" y1="10" x2="21" y2="10"/>
                                    </svg>
                                    Deadline: {{ \Carbon\Carbon::parse($req->deadline)->format('d M Y') }}
                                </div>
                            </div>
                        @endif

                        <div class="vq-card-bottom">
                            <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;">
                                <span class="vq-status {{ $statusClass }}">
                                    <span class="vq-status-dot"></span>
                                    {{ ucfirst($pivot->status) }}
                                </span>
                                @if($pivot->amount)
                                    <span class="vq-amount-badge">
                                        <svg viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="12" y1="1" x2="12" y2="23"/>
                                            <path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>
                                        </svg>
                                        PKR {{ number_format($pivot->amount) }}
                                    </span>
                                @endif
                            </div>

                            @if($pivot->status == 'pending')
                                <a href="{{ route('vendor.quotation-requests.edit', $req->id) }}" class="vq-btn-submit">
                                    <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="22" y1="2" x2="11" y2="13"/>
                                        <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                                    </svg>
                                    Submit Quotation
                                </a>
                            @else
                                <span class="vq-submitted-label">
                                    <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="20 6 9 17 4 12"/>
                                    </svg>
                                    Quote Submitted
                                </span>
                            @endif
                        </div>
                    </div>

                @empty
                    <div class="vq-empty">
                        <div class="vq-empty-icon">
                            <svg viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                                <polyline points="14 2 14 8 20 8"/>
                                <line x1="9" y1="13" x2="15" y2="13"/>
                                <line x1="9" y1="17" x2="15" y2="17"/>
                            </svg>
                        </div>
                        <div class="vq-empty-title">No requests yet</div>
                        <div class="vq-empty-text">You have no quotation requests assigned at the moment.</div>
                    </div>
                @endforelse
            </div>

            @if($requests->hasPages())
                <div style="margin-top:1.5rem;">{{ $requests->links() }}</div>
            @endif

        </div>
    </div>

</x-app-layout>