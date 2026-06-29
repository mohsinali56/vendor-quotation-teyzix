<x-vendor-layout>
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

        /* ── Page Header ── */
        .vq-page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.75rem;
            flex-wrap: wrap;
            gap: 12px;
        }
        .vq-page-title {
            font-size: 22px;
            font-weight: 800;
            color: #1a1a2e;
            letter-spacing: -0.4px;
            margin-bottom: 3px;
        }
        .vq-page-sub {
            font-size: 13px;
            color: #9a9994;
        }
        .vq-count-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #1a1a2e;
            color: #e8c547;
            font-size: 12px;
            font-weight: 600;
            padding: 6px 16px;
            border-radius: 100px;
            white-space: nowrap;
        }
        .vq-count-pill svg { width: 13px; height: 13px; stroke: currentColor; fill: none; }

        /* ── Cards ── */
        .vq-cards { display: flex; flex-direction: column; gap: 14px; }

        .vq-card {
            background: #ffffff;
            border: 1px solid #e5e4df;
            border-radius: 14px;
            overflow: hidden;
            transition: box-shadow 0.15s, border-color 0.15s;
        }
        .vq-card:hover {
            border-color: #d0cfc9;
            box-shadow: 0 4px 16px rgba(0,0,0,0.06);
        }

        /* Card Main Body */
        .vq-card-body {
            padding: 1.25rem 1.5rem;
        }
        .vq-card-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 6px;
        }
        .vq-card-title {
            font-size: 16px;
            font-weight: 700;
            color: #1a1a2e;
            line-height: 1.3;
        }
        .vq-card-desc {
            font-size: 13.5px;
            color: #6b6a66;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        /* Status Badges */
        .vq-status {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
            font-weight: 600;
            padding: 5px 13px;
            border-radius: 100px;
            white-space: nowrap;
            flex-shrink: 0;
        }
        .vq-status-dot { width: 6px; height: 6px; border-radius: 50%; flex-shrink: 0; }

        .vq-status.pending   { background: #fffbeb; color: #92400e; border: 1px solid #fde68a; }
        .vq-status.pending .vq-status-dot   { background: #f59e0b; }
        .vq-status.submitted { background: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0; }
        .vq-status.submitted .vq-status-dot { background: #10b981; }
        .vq-status.accepted  { background: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0; }
        .vq-status.accepted .vq-status-dot  { background: #10b981; }
        .vq-status.rejected  { background: #fff5f5; color: #991b1b; border: 1px solid #fecaca; }
        .vq-status.rejected .vq-status-dot  { background: #ef4444; }
        .vq-status.delivered { background: #eef2ff; color: #3730a3; border: 1px solid #c7d2fe; }
        .vq-status.delivered .vq-status-dot { background: #6366f1; }

        /* Card Bottom Meta Row */
        .vq-card-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding-top: 12px;
            border-top: 1px solid #f0efe9;
            flex-wrap: wrap;
        }
        .vq-meta-row {
            display: flex;
            align-items: center;
            gap: 14px;
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

        .vq-quote-amount {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 13px;
            font-weight: 700;
            color: #065f46;
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            padding: 4px 12px;
            border-radius: 100px;
        }
        .vq-quote-amount svg { width: 12px; height: 12px; stroke: currentColor; fill: none; }
        .vq-quote-na {
            font-size: 13px;
            color: #b0afaa;
            font-style: italic;
        }

        /* ── Accepted Block ── */
        .vq-accepted-block {
            background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%);
            border-top: 1px solid #a7f3d0;
            padding: 1.1rem 1.5rem;
        }
        .vq-accepted-header {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
        }
        .vq-accepted-icon {
            width: 28px; height: 28px;
            background: #10b981;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .vq-accepted-icon svg { width: 14px; height: 14px; stroke: #fff; fill: none; }
        .vq-accepted-title {
            font-size: 13.5px;
            font-weight: 700;
            color: #065f46;
        }
        .vq-accepted-sub {
            font-size: 12px;
            color: #6b6a66;
            margin-top: 6px;
        }
        .vq-btn-whatsapp {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 18px;
            background: #25d366;
            color: #ffffff;
            font-size: 13px;
            font-weight: 700;
            border-radius: 9px;
            text-decoration: none;
            transition: background 0.15s;
            white-space: nowrap;
            margin-top: 10px;
        }
        .vq-btn-whatsapp:hover { background: #20b859; }
        .vq-btn-whatsapp svg { width: 16px; height: 16px; fill: #ffffff; }

        /* ── Delivered Block ── */
        .vq-delivered-block {
            background: linear-gradient(135deg, #eef2ff 0%, #e0e7ff 100%);
            border-top: 1px solid #c7d2fe;
            padding: 1.1rem 1.5rem;
        }
        .vq-delivered-header {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 6px;
        }
        .vq-delivered-icon {
            width: 28px; height: 28px;
            background: #6366f1;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .vq-delivered-icon svg { width: 14px; height: 14px; stroke: #fff; fill: none; }
        .vq-delivered-title {
            font-size: 13.5px;
            font-weight: 700;
            color: #3730a3;
        }
        .vq-delivered-sub {
            font-size: 12px;
            color: #6b6a66;
            margin-top: 4px;
        }

        /* ── Empty State ── */
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
            .vq-page-title { font-size: 19px; }
            .vq-card-body { padding: 1rem 1.1rem; }
            .vq-accepted-block,
            .vq-delivered-block { padding: 1rem 1.1rem; }
            .vq-card-top { flex-direction: column; gap: 6px; }
            .vq-card-bottom { flex-direction: column; align-items: flex-start; }
            .vq-btn-whatsapp { width: 100%; justify-content: center; }
        }
        @media (max-width: 400px) {
            .vq-page-header { flex-direction: column; align-items: flex-start; }
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Submitted Quotations') }}
        </h2>
    </x-slot>

    <div class="vq-page">
        <div class="vq-container">

            <div class="vq-page-header">
                <div>
                    <div class="vq-page-title">My Submitted Quotations</div>
                    <div class="vq-page-sub">Track status of all your submitted quotes</div>
                </div>
                <div class="vq-count-pill">
                    <svg viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                    </svg>
                    {{ $myQuotations->total() }} Quote{{ $myQuotations->total() != 1 ? 's' : '' }}
                </div>
            </div>

            <div class="vq-cards">
                @forelse($myQuotations as $request)
                    @php
                        $myQuote = $request->vendors->first();
                        $status  = $myQuote->pivot->status;
                        $statusClass = match($status) {
                            'accepted'  => 'accepted',
                            'rejected'  => 'rejected',
                            'delivered' => 'delivered',
                            'submitted' => 'submitted',
                            default     => 'pending',
                        };
                    @endphp

                    <div class="vq-card">

                        <div class="vq-card-body">
                            <div class="vq-card-top">
                                <div class="vq-card-title">{{ $request->title }}</div>
                                <span class="vq-status {{ $statusClass }}">
                                    <span class="vq-status-dot"></span>
                                    {{ ucfirst($status) }}
                                </span>
                            </div>

                            <div class="vq-card-desc">{{ $request->description }}</div>

                            <div class="vq-card-bottom">
                                <div class="vq-meta-row">
                                    @if($myQuote->pivot->amount)
                                        <span class="vq-quote-amount">
                                            <svg viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="12" y1="1" x2="12" y2="23"/>
                                                <path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>
                                            </svg>
                                            Rs {{ number_format($myQuote->pivot->amount) }}
                                        </span>
                                    @else
                                        <span class="vq-quote-na">Not Submitted</span>
                                    @endif

                                    <div class="vq-meta-item">
                                        <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                            <line x1="16" y1="2" x2="16" y2="6"/>
                                            <line x1="8" y1="2" x2="8" y2="6"/>
                                            <line x1="3" y1="10" x2="21" y2="10"/>
                                        </svg>
                                        Deadline: {{ $request->deadline->format('d M Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Accepted Block --}}
                        @if($status == 'accepted')
                            <div class="vq-accepted-block">
                                <div class="vq-accepted-header">
                                    <div class="vq-accepted-icon">
                                        <svg viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"/>
                                        </svg>
                                    </div>
                                    <div class="vq-accepted-title">Congratulations! Your quotation was accepted.</div>
                                </div>
                                <a href="https://wa.me/923052375234?text=Hi Admin, my quotation for '{{ $request->title }}' was accepted. Request ID: {{ $request->id }}"
                                   target="_blank"
                                   class="vq-btn-whatsapp">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                                        <path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.554 4.118 1.528 5.849L0 24l6.335-1.508A11.945 11.945 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.804 9.804 0 01-5.064-1.409l-.364-.214-3.762.896.952-3.672-.236-.375A9.818 9.818 0 012.182 12C2.182 6.58 6.58 2.182 12 2.182S21.818 6.58 21.818 12 17.42 21.818 12 21.818z"/>
                                    </svg>
                                    Contact Admin on WhatsApp
                                </a>
                                <div class="vq-accepted-sub">After project completion, Admin will mark it as Delivered.</div>
                            </div>
                        @endif

                        {{-- Delivered Block --}}
                        @if($status == 'delivered')
                            <div class="vq-delivered-block">
                                <div class="vq-delivered-header">
                                    <div class="vq-delivered-icon">
                                        <svg viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"/>
                                        </svg>
                                    </div>
                                    <div class="vq-delivered-title">Project Completed &amp; Approved by Admin.</div>
                                </div>
                                <div class="vq-delivered-sub">You can expect payment as per agreement.</div>
                            </div>
                        @endif

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
                        <div class="vq-empty-title">No quotations submitted yet</div>
                        <div class="vq-empty-text">You have not submitted any quotations yet.</div>
                    </div>
                @endforelse
            </div>

            @if($myQuotations->hasPages())
                <div style="margin-top:1.5rem;">
                    {{ $myQuotations->links() }}
                </div>
            @endif

        </div>
    </div>

</x-vendor-layout>