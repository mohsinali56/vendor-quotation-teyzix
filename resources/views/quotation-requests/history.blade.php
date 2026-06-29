<x-app-layout>
    <style>
        .vq-page {
            background: #f4f3ef;
            min-height: calc(100vh - 62px);
            padding: 2rem 1.5rem;
            font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
        }
        .vq-container {
            max-width: 1100px;
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

        /* ── Filter Card ── */
        .vq-filter-card {
            background: #ffffff;
            border: 1px solid #e5e4df;
            border-radius: 14px;
            padding: 1.1rem 1.5rem;
            margin-bottom: 1.25rem;
        }
        .vq-filter-form {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }
        .vq-filter-label {
            font-size: 12px;
            font-weight: 700;
            color: #9a9994;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            white-space: nowrap;
            margin-right: 2px;
        }
        .vq-select,
        .vq-date-input {
            padding: 8px 14px;
            border: 1px solid #e0dfd9;
            border-radius: 8px;
            font-size: 13.5px;
            color: #1a1a2e;
            background: #fafaf8;
            outline: none;
            font-family: inherit;
            transition: border-color 0.15s;
            appearance: none;
            -webkit-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6' viewBox='0 0 10 6'%3E%3Cpath d='M1 1l4 4 4-4' stroke='%239a9994' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
            padding-right: 30px;
            cursor: pointer;
        }
        .vq-date-input {
            background-image: none;
            padding-right: 14px;
            cursor: pointer;
        }
        .vq-select:focus,
        .vq-date-input:focus {
            border-color: #4338ca;
            background-color: #ffffff;
        }
        .vq-filter-actions {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-left: auto;
        }
        .vq-btn-filter {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            background: #1a1a2e;
            color: #ffffff;
            font-size: 13px;
            font-weight: 600;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-family: inherit;
            transition: background 0.15s;
            white-space: nowrap;
        }
        .vq-btn-filter:hover { background: #0f3460; }
        .vq-btn-filter svg {
            width: 13px;
            height: 13px;
            stroke: #e8c547;
            fill: none;
        }
        .vq-btn-reset {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 14px;
            background: transparent;
            color: #6b6a66;
            font-size: 13px;
            font-weight: 500;
            border-radius: 8px;
            border: 1px solid #e0dfd9;
            text-decoration: none;
            transition: border-color 0.15s, color 0.15s;
            font-family: inherit;
            white-space: nowrap;
        }
        .vq-btn-reset:hover { border-color: #1a1a2e; color: #1a1a2e; }
        .vq-btn-reset svg {
            width: 13px;
            height: 13px;
            stroke: currentColor;
            fill: none;
        }

        /* ── Table Card ── */
        .vq-table-card {
            background: #ffffff;
            border: 1px solid #e5e4df;
            border-radius: 14px;
            overflow: hidden;
        }
        .vq-table-scroll {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        .vq-table {
            width: 100%;
            border-collapse: collapse;
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
        .vq-table tbody td {
            padding: 13px 18px;
            font-size: 13.5px;
            color: #3a3a38;
            vertical-align: middle;
        }

        /* Title cell */
        .vq-td-title {
            font-weight: 600;
            color: #1a1a2e;
        }

        /* Vendor cell */
        .vq-vendor-info { display: flex; flex-direction: column; gap: 1px; }
        .vq-vendor-name { font-size: 13.5px; font-weight: 600; color: #1a1a2e; }
        .vq-vendor-email { font-size: 12px; color: #9a9994; }

        /* Date cell */
        .vq-td-date {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 13px;
            color: #6b6a66;
            white-space: nowrap;
        }
        .vq-td-date svg {
            width: 13px;
            height: 13px;
            stroke: #b0afaa;
            fill: none;
            flex-shrink: 0;
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
            white-space: nowrap;
        }
        .vq-status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            flex-shrink: 0;
        }
        .vq-status.pending { background: #fffbeb; color: #92400e; border: 1px solid #fde68a; }
        .vq-status.pending .vq-status-dot { background: #f59e0b; }
        .vq-status.submitted { background: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0; }
        .vq-status.submitted .vq-status-dot { background: #10b981; }
        .vq-status.approved { background: #eef2ff; color: #3730a3; border: 1px solid #c7d2fe; }
        .vq-status.approved .vq-status-dot { background: #6366f1; }
        .vq-status.rejected { background: #fff5f5; color: #991b1b; border: 1px solid #fecaca; }
        .vq-status.rejected .vq-status-dot { background: #ef4444; }

        /* Empty state */
        .vq-empty-row td {
            text-align: center;
            padding: 3.5rem 1rem;
        }
        .vq-empty-inner {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }
        .vq-empty-icon {
            width: 48px;
            height: 48px;
            background: #f4f3ef;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 4px;
        }
        .vq-empty-icon svg { width: 22px; height: 22px; stroke: #9a9994; fill: none; }
        .vq-empty-title { font-size: 15px; font-weight: 600; color: #1a1a2e; }
        .vq-empty-text { font-size: 13px; color: #9a9994; }

        /* Pagination */
        .vq-pagination {
            padding: 14px 18px;
            border-top: 1px solid #f0efe9;
        }

        @media (max-width: 768px) {
            .vq-page { padding: 1.25rem 1rem; }
            .vq-page-title { font-size: 19px; }
            .vq-filter-card { padding: 1rem; }
            .vq-filter-form { gap: 8px; }
            .vq-filter-actions { margin-left: 0; width: 100%; }
            .vq-btn-filter, .vq-btn-reset { flex: 1; justify-content: center; }
        }
        @media (max-width: 480px) {
            .vq-page-header { flex-direction: column; align-items: flex-start; }
            .vq-select, .vq-date-input { width: 100%; }
            .vq-filter-form { flex-direction: column; align-items: stretch; }
            .vq-filter-label { display: none; }
        }
    </style>

  

    <div class="vq-page">
        <div class="vq-container">

            <div class="vq-page-header">
                <div>
                    <div class="vq-page-title">Quotation History</div>
                    <div class="vq-page-sub">View and filter all past quotation requests and vendor responses</div>
                </div>
            </div>

            {{-- Filter Card --}}
            <div class="vq-filter-card">
                <form method="GET" action="{{ route('quotation-requests.history') }}" class="vq-filter-form">
                    <span class="vq-filter-label">Filter by</span>

                    <select name="status" class="vq-select">
                        <option value="">All Status</option>
                        <option value="pending"   {{ request('status') == 'pending'   ? 'selected' : '' }}>Pending</option>
                        <option value="submitted" {{ request('status') == 'submitted' ? 'selected' : '' }}>Submitted</option>
                        <option value="approved"  {{ request('status') == 'approved'  ? 'selected' : '' }}>Approved</option>
                        <option value="rejected"  {{ request('status') == 'rejected'  ? 'selected' : '' }}>Rejected</option>
                    </select>

                    <input
                        type="date"
                        name="date"
                        value="{{ request('date') }}"
                        class="vq-date-input"
                    />

                    <div class="vq-filter-actions">
                        <a href="{{ route('quotation-requests.history') }}" class="vq-btn-reset">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="1 4 1 10 7 10"/>
                                <path d="M3.51 15a9 9 0 102.13-9.36L1 10"/>
                            </svg>
                            Reset
                        </a>
                        <button type="submit" class="vq-btn-filter">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/>
                            </svg>
                            Apply Filter
                        </button>
                    </div>
                </form>
            </div>

            {{-- Results Table --}}
            <div class="vq-table-card">
                <div class="vq-table-scroll">
                    <table class="vq-table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Vendor</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($requests as $request)
                                @foreach($request->vendors as $vendor)
                                    @php
                                        $pivotStatus = $vendor->pivot->status;
                                        $statusClass = match($pivotStatus) {
                                            'submitted' => 'submitted',
                                            'approved'  => 'approved',
                                            'rejected'  => 'rejected',
                                            default     => 'pending',
                                        };
                                    @endphp
                                    <tr>
                                        <td>
                                            <span class="vq-td-title">{{ $request->title }}</span>
                                        </td>
                                        <td>
                                            <div class="vq-vendor-info">
                                                <span class="vq-vendor-name">{{ $vendor->name }}</span>
                                                <span class="vq-vendor-email">{{ $vendor->email }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="vq-status {{ $statusClass }}">
                                                <span class="vq-status-dot"></span>
                                                {{ ucfirst($pivotStatus) }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="vq-td-date">
                                                <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                                    <line x1="16" y1="2" x2="16" y2="6"/>
                                                    <line x1="8" y1="2" x2="8" y2="6"/>
                                                    <line x1="3" y1="10" x2="21" y2="10"/>
                                                </svg>
                                                {{ $request->created_at->format('d M, Y') }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            @empty
                                <tr class="vq-empty-row">
                                    <td colspan="4">
                                        <div class="vq-empty-inner">
                                            <div class="vq-empty-icon">
                                                <svg viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="11" cy="11" r="8"/>
                                                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                                                </svg>
                                            </div>
                                            <div class="vq-empty-title">No records found</div>
                                            <div class="vq-empty-text">Try adjusting your filters or reset to see all records.</div>
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