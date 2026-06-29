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
        .vq-header-actions {
            display: flex;
            align-items: center;
            gap: 10px;
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
            white-space: nowrap;
        }
        .vq-btn-back:hover { border-color: #1a1a2e; }
        .vq-btn-back svg { width: 14px; height: 14px; stroke: currentColor; fill: none; }

        /* NAYA BUTTON STYLE */
        .vq-btn-pdf {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            background: #065f46; /* Dark Green */
            color: #ffffff;
            font-size: 13px;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            border: 1px solid #065f46;
            transition: background 0.15s;
            white-space: nowrap;
        }
        .vq-btn-pdf:hover { background: #047857; }
        .vq-btn-pdf svg { width: 14px; height: 14px; stroke: currentColor; fill: none; }
        /* BUTTON STYLE END */

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

        .vq-info-card {
            background: #ffffff;
            border: 1px solid #e5e4df;
            border-radius: 14px;
            padding: 1.5rem 1.75rem;
            margin-bottom: 1.25rem;
        }
        .vq-info-title {
            font-size: 18px;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 1rem;
            letter-spacing: -0.3px;
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
            padding: 11px 14px;
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

        .vq-lowest-note {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
            font-size: 12px;
            font-weight: 600;
            padding: 5px 14px;
            border-radius: 100px;
        }
        .vq-lowest-note svg { width: 12px; height: 12px; stroke: #059669; fill: none; }

        .vq-table-card {
            background: #ffffff;
            border: 1px solid #e5e4df;
            border-radius: 14px;
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

        .vq-table-wrap {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        .vq-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 500px;
        }
        .vq-table thead {
            background: #f9f8f6;
            border-bottom: 1px solid #e5e4df;
        }
        .vq-table thead th {
            padding: 12px 18px;
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
        .vq-table tbody tr.vq-row-lowest {
            background: #f0fdf4;
            border-left: 3px solid #10b981;
        }
        .vq-table tbody tr.vq-row-lowest:hover { background: #dcfce7; }
        .vq-table tbody td {
            padding: 14px 18px;
            font-size: 13.5px;
            color: #3a3a38;
            vertical-align: middle;
        }

        .vq-vendor-name {
            font-size: 14px;
            font-weight: 600;
            color: #1a1a2e;
        }
        .vq-lowest-tag {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 10.5px;
            font-weight: 700;
            background: #dcfce7;
            color: #065f46;
            border: 1px solid #a7f3d0;
            padding: 2px 8px;
            border-radius: 100px;
            margin-left: 7px;
            vertical-align: middle;
        }
        .vq-lowest-tag svg { width: 9px; height: 9px; stroke: #059669; fill: none; }

        .vq-amount-value {
            font-size: 14px;
            font-weight: 700;
            color: #1a1a2e;
        }
        .vq-amount-na {
            font-size: 13px;
            color: #c0bfba;
            font-style: italic;
        }

        .vq-status {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 11.5px;
            font-weight: 600;
            padding: 4px 11px;
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

        .vq-btn-accept {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 7px 14px;
            background: #1a1a2e;
            color: #ffffff;
            font-size: 12.5px;
            font-weight: 600;
            border-radius: 7px;
            border: none;
            cursor: pointer;
            font-family: inherit;
            transition: background 0.15s;
            white-space: nowrap;
        }
        .vq-btn-accept:hover { background: #0f3460; }
        .vq-btn-accept svg { width: 12px; height: 12px; stroke: #e8c547; fill: none; }

        .vq-action-na {
            font-size: 13px;
            color: #c0bfba;
        }

        .vq-empty-row td {
            text-align: center;
            padding: 3rem 1rem;
            color: #9a9994;
            font-size: 13.5px;
        }

        @media (max-width: 768px) {
            .vq-page { padding: 1.25rem 1rem; }
            .vq-page-title { font-size: 19px; }
            .vq-info-card { padding: 1.1rem; }
            .vq-meta-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 480px) {
            .vq-page-header { flex-direction: column; align-items: flex-start; }
            .vq-header-actions { width: 100%; justify-content: flex-start; }
            .vq-meta-grid { grid-template-columns: 1fr 1fr; }
        }
    </style>

   

    <div class="vq-page">
        <div class="vq-container">

            <div class="vq-page-header">
                <div>
                    <div class="vq-page-title">Vendor Comparison</div>
                    <div class="vq-page-sub">Compare submitted quotes and accept the best offer</div>
                </div>
                <div class="vq-header-actions">
                    {{-- NAYA PDF BUTTON YAHAN LAGA DIYA --}}
                    <a href="{{ route('admin.quotation.pdf', $req->id) }}" class="vq-btn-pdf">
                        <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                            <polyline points="7 10 12 15 17 10"/>
                            <line x1="12" y1="15" x2="12" y2="3"/>
                        </svg>
                        Download PDF
                    </a>
                    <a href="{{ route('quotation-requests.index') }}" class="vq-btn-back">
                        <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="15 18 9 12 15 6"/>
                        </svg>
                        Back to Requests
                    </a>
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

            <div class="vq-info-card">
                <div class="vq-info-title">{{ $req->title }}</div>
                <div class="vq-meta-grid">
                    <div class="vq-meta-box">
                        <div class="vq-meta-label">Budget</div>
                        <div class="vq-meta-value budget">
                            {{ $req->budget ? 'PKR ' . number_format($req->budget) : 'N/A' }}
                        </div>
                    </div>
                    <div class="vq-meta-box">
                        <div class="vq-meta-label">Deadline</div>
                        <div class="vq-meta-value">
                            {{ \Carbon\Carbon::parse($req->deadline)->format('d M, Y') }}
                        </div>
                    </div>
                    <div class="vq-meta-box">
                        <div class="vq-meta-label">Vendors</div>
                        <div class="vq-meta-value">{{ $req->vendors->count() }}</div>
                    </div>
                </div>
            </div>

            <div class="vq-table-card">
                <div class="vq-table-header">
                    <div class="vq-table-title">Submitted Quotes</div>
                    @if($lowestAmount)
                        <div class="vq-lowest-note">
                            <svg viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                            Lowest: PKR {{ number_format($lowestAmount) }}
                        </div>
                    @endif
                </div>

                <div class="vq-table-wrap">
                    <table class="vq-table">
                        <thead>
                            <tr>
                                <th>Vendor Name</th>
                                <th>Quoted Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($req->vendors as $vendor)
                                @php
                                    $isLowest = $vendor->pivot->amount && $vendor->pivot->amount == $lowestAmount;
                                    $pivotStatus = $vendor->pivot->status;
                                    $statusClass = match($pivotStatus) {
                                        'submitted' => 'submitted',
                                        'approved'  => 'approved',
                                        'rejected'  => 'rejected',
                                        default     => 'pending',
                                    };
                                @endphp
                                <tr class="{{ $isLowest ? 'vq-row-lowest' : '' }}">
                                    <td>
                                        <span class="vq-vendor-name">{{ $vendor->name }}</span>
                                        @if($isLowest)
                                            <span class="vq-lowest-tag">
                                                <svg viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="20 6 9 17 4 12"/>
                                                </svg>
                                                Lowest Bid
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($vendor->pivot->amount)
                                            <span class="vq-amount-value">PKR {{ number_format($vendor->pivot->amount) }}</span>
                                        @else
                                            <span class="vq-amount-na">Not Submitted</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="vq-status {{ $statusClass }}">
                                            <span class="vq-status-dot"></span>
                                            {{ ucfirst($pivotStatus) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($pivotStatus == 'submitted')
                                            <form action="{{ route('admin.quotation.accept', [$req->id, $vendor->id]) }}" method="POST" style="margin:0;">
                                                @csrf
                                                <button type="submit" class="vq-btn-accept">
                                                    <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <polyline points="20 6 9 17 4 12"/>
                                                    </svg>
                                                    Accept
                                                </button>
                                            </form>
                                        @else
                                            <span class="vq-action-na">—</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr class="vq-empty-row">
                                    <td colspan="4">No vendors assigned to this request yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>