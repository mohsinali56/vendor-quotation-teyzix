<x-app-layout>
    <style>
        .vq-page {
            background: #f4f3ef;
            min-height: calc(100vh - 62px);
            padding: 2rem 1.5rem;
            font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
        }
        .vq-container {
            max-width: 960px;
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
        .vq-btn-back {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            background: #ffffff;
            color: #1a1a2e;
            font-size: 13px;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            border: 1px solid #e0dfd9;
            transition: border-color 0.15s;
            font-family: inherit;
            white-space: nowrap;
        }
        .vq-btn-back:hover { border-color: #1a1a2e; }
        .vq-btn-back svg {
            width: 14px;
            height: 14px;
            stroke: currentColor;
            fill: none;
        }

        /* ── Info Card ── */
        .vq-info-card {
            background: #ffffff;
            border: 1px solid #e5e4df;
            border-radius: 16px;
            padding: 1.75rem 2rem;
            margin-bottom: 1.25rem;
        }

        .vq-info-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }
        .vq-info-title {
            font-size: 20px;
            font-weight: 800;
            color: #1a1a2e;
            letter-spacing: -0.3px;
            line-height: 1.3;
        }

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
        .vq-status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            flex-shrink: 0;
        }
        .vq-status.draft { background: #f4f3ef; color: #6b6a66; border: 1px solid #e0dfd9; }
        .vq-status.draft .vq-status-dot { background: #b0afaa; }
        .vq-status.sent { background: #eef2ff; color: #3730a3; border: 1px solid #c7d2fe; }
        .vq-status.sent .vq-status-dot { background: #6366f1; }
        .vq-status.closed { background: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0; }
        .vq-status.closed .vq-status-dot { background: #10b981; }

        .vq-info-desc {
            font-size: 14px;
            color: #6b6a66;
            line-height: 1.7;
            margin-bottom: 1.25rem;
        }

        .vq-meta-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }
        .vq-meta-box {
            background: #f9f8f6;
            border: 1px solid #f0efe9;
            border-radius: 10px;
            padding: 12px 14px;
        }
        .vq-meta-label {
            font-size: 11px;
            font-weight: 700;
            color: #b0afaa;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }
        .vq-meta-value {
            font-size: 14px;
            font-weight: 600;
            color: #1a1a2e;
        }
        .vq-meta-value.budget { color: #3730a3; }

        /* ── Vendors Table Card ── */
        .vq-table-card {
            background: #ffffff;
            border: 1px solid #e5e4df;
            border-radius: 16px;
            overflow: hidden;
        }
        .vq-table-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.1rem 1.5rem;
            border-bottom: 1px solid #f0efe9;
            flex-wrap: wrap;
            gap: 8px;
        }
        .vq-table-title {
            font-size: 15px;
            font-weight: 700;
            color: #1a1a2e;
        }
        .vq-vendor-pill {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #1a1a2e;
            color: #e8c547;
            font-size: 11.5px;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 100px;
        }
        .vq-vendor-pill svg {
            width: 12px;
            height: 12px;
            stroke: #e8c547;
            fill: none;
        }

        .vq-table-scroll { overflow-x: auto; -webkit-overflow-scrolling: touch; }

        .vq-table {
            width: 100%;
            border-collapse: collapse;
        }
        .vq-table thead {
            background: #f9f8f6;
            border-bottom: 1px solid #e5e4df;
        }
        .vq-table thead th {
            padding: 11px 16px;
            font-size: 11px;
            font-weight: 700;
            color: #9a9994;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            text-align: left;
            white-space: nowrap;
        }
        .vq-table tbody tr {
            border-bottom: 1px solid #f0efe9;
            transition: background 0.12s;
        }
        .vq-table tbody tr:last-child { border-bottom: none; }
        .vq-table tbody tr:hover { background: #fafaf8; }
        .vq-table tbody td {
            padding: 13px 16px;
            font-size: 13.5px;
            color: #3a3a38;
            vertical-align: middle;
        }

        .vq-vendor-info { display: flex; flex-direction: column; gap: 2px; }
        .vq-vendor-name { font-size: 14px; font-weight: 600; color: #1a1a2e; }
        .vq-vendor-company { font-size: 12px; color: #9a9994; }

        .vq-pivot-status {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 11.5px;
            font-weight: 600;
            padding: 4px 11px;
            border-radius: 100px;
        }
        .vq-pivot-status.pending { background: #fffbeb; color: #92400e; border: 1px solid #fde68a; }
        .vq-pivot-status.pending .vq-status-dot { background: #f59e0b; }
        .vq-pivot-status.submitted { background: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0; }
        .vq-pivot-status.submitted .vq-status-dot { background: #10b981; }
        .vq-pivot-status.approved { background: #eef2ff; color: #3730a3; border: 1px solid #c7d2fe; }
        .vq-pivot-status.approved .vq-status-dot { background: #6366f1; }
        .vq-pivot-status.rejected { background: #fff5f5; color: #991b1b; border: 1px solid #fecaca; }
        .vq-pivot-status.rejected .vq-status-dot { background: #ef4444; }
        /* NAYA STATUS: Delivered */
        .vq-pivot-status.delivered { background: #e0f2fe; color: #075985; border: 1px solid #bae6fd; }
        .vq-pivot-status.delivered .vq-status-dot { background: #0ea5e9; }

        .vq-amount-text {
            font-size: 13.5px;
            font-weight: 600;
            color: #1a1a2e;
        }
        .vq-amount-na {
            font-size: 13px;
            color: #c0bfba;
        }

        .vq-btn-submit-sm {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 13px;
            background: #1a1a2e;
            color: #ffffff;
            font-size: 12.5px;
            font-weight: 600;
            border-radius: 7px;
            text-decoration: none;
            transition: background 0.15s;
            white-space: nowrap;
            font-family: inherit;
            border: none;
            cursor: pointer;
        }
        .vq-btn-submit-sm:hover { background: #0f3460; }
        .vq-btn-submit-sm svg {
            width: 12px;
            height: 12px;
            stroke: #e8c547;
            fill: none;
        }
        /* NAYA BUTTON: Blue for Delivered */
        .vq-btn-delivered {
            background: #2563eb;
        }
        .vq-btn-delivered:hover { background: #1d4ed8; }

        .vq-done-label {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 13px;
            color: #9a9994;
        }
        .vq-done-label svg {
            width: 13px;
            height: 13px;
            stroke: #10b981;
            fill: none;
        }

        .vq-empty-row td {
            text-align: center;
            padding: 3rem 1rem;
            color: #9a9994;
            font-size: 13.5px;
        }

        @media (max-width: 768px) {
            .vq-page { padding: 1.25rem 1rem; }
            .vq-info-card { padding: 1.25rem 1.1rem; }
            .vq-meta-grid { grid-template-columns: repeat(2, 1fr); }
            .vq-page-title { font-size: 19px; }
        }
        @media (max-width: 480px) {
            .vq-meta-grid { grid-template-columns: 1fr 1fr; }
            .vq-page-header { flex-direction: column; align-items: flex-start; }
            .vq-info-top { flex-direction: column; }
        }
    </style>

   

    <div class="vq-page">
        <div class="vq-container">

            <div class="vq-page-header">
                <div>
                    <div class="vq-page-title">Quotation Request Details</div>
                    <div class="vq-page-sub">Full details and vendor responses for this request</div>
                </div>
                <a href="{{ route('quotation-requests.index') }}" class="vq-btn-back">
                    <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"/>
                    </svg>
                    Back to Requests
                </a>
            </div>

            {{-- Info Card --}}
            <div class="vq-info-card">
                <div class="vq-info-top">
                    <div class="vq-info-title">{{ $quotationRequest->title }}</div>
                    @php
                        $statusClass = match($quotationRequest->status) {
                            'sent'   => 'sent',
                            'closed' => 'closed',
                            default  => 'draft',
                        };
                    @endphp
                    <span class="vq-status {{ $statusClass }}">
                        <span class="vq-status-dot"></span>
                        {{ ucfirst($quotationRequest->status) }}
                    </span>
                </div>

                <div class="vq-info-desc">{{ $quotationRequest->description }}</div>

                <div class="vq-meta-grid">
                    <div class="vq-meta-box">
                        <div class="vq-meta-label">Deadline</div>
                        <div class="vq-meta-value">{{ $quotationRequest->deadline->format('d M, Y') }}</div>
                    </div>
                    <div class="vq-meta-box">
                        <div class="vq-meta-label">Budget</div>
                        <div class="vq-meta-value budget">
                            {{ $quotationRequest->budget ? 'PKR ' . number_format($quotationRequest->budget) : 'N/A' }}
                        </div>
                    </div>
                    <div class="vq-meta-box">
                        <div class="vq-meta-label">Vendors Assigned</div>
                        <div class="vq-meta-value">{{ $quotationRequest->vendors->count() }}</div>
                    </div>
                </div>
            </div>

            {{-- Vendors Table Card --}}
            <div class="vq-table-card">
                <div class="vq-table-header">
                    <div class="vq-table-title">Assigned Vendors</div>
                    <div class="vq-vendor-pill">
                        <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M23 21v-2a4 4 0 00-3-3.87"/>
                            <path d="M16 3.13a4 4 0 010 7.75"/>
                        </svg>
                        {{ $quotationRequest->vendors->count() }} Vendor{{ $quotationRequest->vendors->count() != 1 ? 's' : '' }}
                    </div>
                </div>

                <div class="vq-table-scroll">
                    <table class="vq-table">
                        <thead>
                            <tr>
                                <th>Vendor</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($quotationRequest->vendors as $vendor)
                                @php
                                    $pivotStatus = $vendor->pivot->status;
                                    $pivotClass = match($pivotStatus) {
                                        'submitted' => 'submitted',
                                        'approved'  => 'approved', // 'accepted' ko 'approved' show karenge
                                        'accepted'  => 'approved', // YEH LINE NAYI HAI
                                        'rejected'  => 'rejected',
                                        'delivered' => 'delivered', // YEH LINE NAYI HAI
                                        default     => 'pending',
                                    };
                                @endphp
                                <tr>
                                    <td>
                                        <div class="vq-vendor-info">
                                            <span class="vq-vendor-name">{{ $vendor->name }}</span>
                                            <span class="vq-vendor-company">{{ $vendor->company ?? $vendor->email }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="vq-pivot-status {{ $pivotClass }}">
                                            <span class="vq-status-dot"></span>
                                            {{ ucfirst($pivotStatus) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($vendor->pivot->amount)
                                            <span class="vq-amount-text">PKR {{ number_format($vendor->pivot->amount) }}</span>
                                        @else
                                            <span class="vq-amount-na">—</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- NAYA LOGIC: Admin ka Mark Delivered Button --}}
                                        @if($pivotStatus == 'accepted')
                                            <form action="{{ route('admin.quotations.mark-delivered', [$quotationRequest->id, $vendor->id]) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="vq-btn-submit-sm vq-btn-delivered">
                                                    <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <polyline points="20 6 9 17 4 12"/>
                                                    </svg>
                                                    Mark Delivered
                                                </button>
                                            </form>
                                        @elseif($pivotStatus == 'pending')
                                            <span class="vq-amount-na">—</span>
                                        @else
                                            <span class="vq-done-label">
                                                <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="20 6 9 17 4 12"/>
                                                </svg>
                                                Done
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr class="vq-empty-row">
                                    <td colspan="4">No vendors assigned to this request.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>