<x-app-layout>
    <style>
        .vq-page {
            background: #f4f3ef;
            min-height: calc(100vh - 62px);
            padding: 2rem 1.5rem;
            font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
        }
        .vq-container {
            max-width: 1200px;
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
        .vq-btn-new {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 18px;
            background: #1a1a2e;
            color: #ffffff;
            font-size: 13.5px;
            font-weight: 600;
            border-radius: 9px;
            text-decoration: none;
            transition: background 0.15s;
            white-space: nowrap;
            font-family: inherit;
        }
        .vq-btn-new:hover { background: #0f3460; }
        .vq-btn-new svg {
            width: 15px;
            height: 15px;
            stroke: #e8c547;
            fill: none;
        }

        /* ── Success Alert ── */
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
            margin-bottom: 1.5rem;
        }
        .vq-alert-success svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
            stroke: #059669;
            fill: none;
        }

        /* ── Table Card ── */
        .vq-table-card {
            background: #ffffff;
            border: 1px solid #e5e4df;
            border-radius: 14px;
            overflow: hidden;
        }

        /* ── Table ── */
        .vq-table {
            width: 100%;
            border-collapse: collapse;
        }
        .vq-table thead {
            background: #f9f8f6;
            border-bottom: 1px solid #e5e4df;
        }
        .vq-table thead th {
            padding: 13px 18px;
            font-size: 11.5px;
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
            padding: 14px 18px;
            font-size: 13.5px;
            color: #3a3a38;
            vertical-align: middle;
        }

        /* Title cell */
        .vq-td-title {
            font-weight: 600;
            color: #1a1a2e;
            max-width: 200px;
        }

        /* Deadline cell */
        .vq-td-deadline {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 13px;
            color: #6b6a66;
            white-space: nowrap;
        }
        .vq-td-deadline svg {
            width: 13px;
            height: 13px;
            stroke: #b0afaa;
            fill: none;
            flex-shrink: 0;
        }

        /* Vendors count */
        .vq-vendor-count {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 13px;
            color: #6b6a66;
        }
        .vq-vendor-count svg {
            width: 13px;
            height: 13px;
            stroke: #b0afaa;
            fill: none;
        }

        /* Status Badges */
        .vq-status {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 11.5px;
            font-weight: 600;
            padding: 4px 11px;
            border-radius: 100px;
        }
        .vq-status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            flex-shrink: 0;
        }
        .vq-status.draft {
            background: #f4f3ef;
            color: #6b6a66;
            border: 1px solid #e0dfd9;
        }
        .vq-status.draft .vq-status-dot { background: #b0afaa; }
        .vq-status.sent {
            background: #eef2ff;
            color: #3730a3;
            border: 1px solid #c7d2fe;
        }
        .vq-status.sent .vq-status-dot { background: #6366f1; }
        .vq-status.closed {
            background: #ecfdf5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }
        .vq-status.closed .vq-status-dot { background: #10b981; }
        .vq-status.approved { /* NAYA */
            background: #ecfdf5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }
        .vq-status.approved .vq-status-dot { background: #10b981; }

        /* ── Action Cell ── */
        .vq-action-cell {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .vq-btn-view {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 13px;
            background: #f4f3ef;
            color: #1a1a2e;
            font-size: 12.5px;
            font-weight: 600;
            border-radius: 7px;
            text-decoration: none;
            border: 1px solid #e0dfd9;
            transition: background 0.12s, border-color 0.12s;
            white-space: nowrap;
            font-family: inherit;
        }
        .vq-btn-view:hover { background: #eceae4; border-color: #d0cfc9; }
        .vq-btn-view svg {
            width: 13px;
            height: 13px;
            stroke: currentColor;
            fill: none;
        }

        /* NAYA: Compare Button Style */
        .vq-btn-compare {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 13px;
            background: #0f3460; /* Dark Blue */
            color: #ffffff;
            font-size: 12.5px;
            font-weight: 600;
            border-radius: 7px;
            text-decoration: none;
            border: 1px solid #0f3460;
            transition: background 0.12s;
            white-space: nowrap;
            font-family: inherit;
        }
        .vq-btn-compare:hover { background: #1a1a2e; }
        .vq-btn-compare svg {
            width: 13px;
            height: 13px;
            stroke: #e8c547; /* Yellow icon */
            fill: none;
        }

        /* Inline approve/reject form */
        .vq-approve-form {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
        }
        .vq-select {
            padding: 6px 10px;
            font-size: 12.5px;
            color: #1a1a2e;
            background: #fafaf8;
            border: 1px solid #e0dfd9;
            border-radius: 7px;
            outline: none;
            font-family: inherit;
            cursor: pointer;
            transition: border-color 0.15s;
            appearance: none;
            -webkit-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6' viewBox='0 0 10 6'%3E%3Cpath d='M1 1l4 4 4-4' stroke='%239a9994' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 8px center;
            padding-right: 26px;
        }
        .vq-select:focus { border-color: #4338ca; }

        .vq-btn-update {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 13px;
            background: #1a1a2e;
            color: #ffffff;
            font-size: 12.5px;
            font-weight: 600;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            font-family: inherit;
            transition: background 0.15s;
            white-space: nowrap;
        }
        .vq-btn-update:hover { background: #0f3460; }

        /* ── Empty State ── */
        .vq-empty {
            text-align: center;
            padding: 4rem 2rem;
        }
        .vq-empty-icon {
            width: 52px;
            height: 52px;
            background: #f4f3ef;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }
        .vq-empty-icon svg {
            width: 24px;
            height: 24px;
            stroke: #9a9994;
            fill: none;
        }
        .vq-empty-title {
            font-size: 15px;
            font-weight: 600;
            color: #1a1a2e;
            margin-bottom: 5px;
        }
        .vq-empty-text { font-size: 13px; color: #9a9994; }

        /* ── Pagination ── */
        .vq-pagination {
            padding: 14px 18px;
            border-top: 1px solid #f0efe9;
        }

        /* ── Mobile Scroll Wrapper ── */
        .vq-table-scroll {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        @media (max-width: 768px) {
            .vq-page { padding: 1.25rem 1rem; }
            .vq-page-title { font-size: 19px; }
            .vq-table thead th { padding: 11px 14px; }
            .vq-table tbody td { padding: 12px 14px; }
            .vq-approve-form { flex-direction: column; align-items: flex-start; }
            .vq-btn-update { width: 100%; justify-content: center; }
        }

        @media (max-width: 480px) {
            .vq-page-header { flex-direction: column; align-items: flex-start; }
            .vq-btn-new { width: 100%; justify-content: center; }
        }
    </style>

   

    <div class="vq-page">
        <div class="vq-container">

            @if(session('success'))
                <div class="vq-alert-success">
                    <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 11-5.93-9.14"/>
                        <polyline points="22 4 12 14.01 9 11.01"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="vq-page-header">
                <div>
                    <div class="vq-page-title">Quotation Requests</div>
                    <div class="vq-page-sub">Manage and review all vendor quotation requests</div>
                </div>
                <a href="{{ route('quotation-requests.create') }}" class="vq-btn-new">
                    <svg viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"/>
                        <line x1="5" y1="12" x2="19" y2="12"/>
                    </svg>
                    New Request
                </a>
            </div>

            <div class="vq-table-card">
                <div class="vq-table-scroll">
                    <table class="vq-table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th>Vendors</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($requests as $request)
                                @php
                                    $statusClass = match($request->status) {
                                        'sent'     => 'sent',
                                        'closed'   => 'closed',
                                        'approved' => 'approved', /* NAYA */
                                        default    => 'draft',
                                    };
                                @endphp
                                <tr>
                                    <td>
                                        <span class="vq-td-title">{{ $request->title }}</span>
                                    </td>
                                    <td>
                                        <span class="vq-td-deadline">
                                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                                <line x1="16" y1="2" x2="16" y2="6"/>
                                                <line x1="8" y1="2" x2="8" y2="6"/>
                                                <line x1="3" y1="10" x2="21" y2="10"/>
                                            </svg>
                                            {{ $request->deadline->format('d M, Y') }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="vq-status {{ $statusClass }}">
                                            <span class="vq-status-dot"></span>
                                            {{ ucfirst($request->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="vq-vendor-count">
                                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                                                <circle cx="9" cy="7" r="4"/>
                                                <path d="M23 21v-2a4 4 0 00-3-3.87"/>
                                                <path d="M16 3.13a4 4 0 010 7.75"/>
                                            </svg>
                                            {{ $request->vendors->count() }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="vq-action-cell">
                                            <a href="{{ route('quotation-requests.show', $request) }}" class="vq-btn-view">
                                                <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                                    <circle cx="12" cy="12" r="3"/>
                                                </svg>
                                                View
                                            </a>

                                            {{-- NAYA: Compare Button --}}
                                            <a href="{{ route('quotation-requests.compare', $request->id) }}" class="vq-btn-compare">
                                                <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="3 6 5 6 21 6"/>
                                                    <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"/>
                                                    <line x1="10" y1="11" x2="10" y2="17"/>
                                                    <line x1="14" y1="11" x2="14" y2="17"/>
                                                </svg>
                                                Compare
                                            </a>

                                            @if($request->vendors->where('pivot.status', 'submitted')->count() > 0)
                                                <form method="POST" action="{{ route('quotation-requests.update-status', $request) }}" class="vq-approve-form">
                                                    @csrf
                                                    @method('PATCH')
                                                    <select name="vendor_id" class="vq-select" required>
                                                        <option value="">Select Vendor</option>
                                                        @foreach($request->vendors as $vendor)
                                                            @if($vendor->pivot->status == 'submitted')
                                                                <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <select name="status" class="vq-select" required>
                                                        <option value="approved">Approve</option>
                                                        <option value="rejected">Reject</option>
                                                    </select>
                                                    <button type="submit" class="vq-btn-update">
                                                        Update
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="vq-empty">
                                            <div class="vq-empty-icon">
                                                <svg viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                                                    <polyline points="14 2 14 8 20 8"/>
                                                </svg>
                                            </div>
                                            <div class="vq-empty-title">No quotation requests found</div>
                                            <div class="vq-empty-text">Create your first request to get started.</div>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="vq-pagination">
                    {{ $requests->links() }}
                </div>
            </div>

        </div>
    </div>

</x-app-layout>