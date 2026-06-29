<x-app-layout>
    <x-slot name="title">Vendor Details</x-slot>

    <style>
        .page-container {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .detail-wrapper {
            max-width: 42rem;
            margin: 0 auto;
            background-color: #fff;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .detail-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }
        .detail-grid {
            display: grid;
            gap: 1rem;
        }
        .detail-item {
            border-bottom: 1px solid #f3f4f6;
            padding-bottom: 0.75rem;
        }
        .detail-label {
            font-size: 0.875rem;
            color: #6b7280;
            font-weight: 500;
            margin-bottom: 0.25rem;
        }
        .detail-value {
            font-size: 1rem;
            color: #111827;
        }
        .btn-group {
            margin-top: 1.5rem;
            display: flex;
            gap: 0.5rem;
        }
        .btn-back {
            color: #6b7280;
            text-decoration: none;
            padding: 0.5rem 1rem;
        }
        .btn-back:hover {
            text-decoration: underline;
        }
        .btn-edit {
            background-color: #2563eb;
            color: #fff;
            padding: 0.5rem 1.5rem;
            border-radius: 0.375rem;
            text-decoration: none;
        }
        .btn-edit:hover {
            background-color: #1d4ed8;
        }
        .btn-delete {
            background-color: #dc2626;
            color: #fff;
            padding: 0.5rem 1.5rem;
            border-radius: 0.375rem;
            border: none;
            cursor: pointer;
        }
        .btn-delete:hover {
            background-color: #b91c1c;
        }
    </style>

    <x-slot name="header">
        <h2 class="detail-title">Vendor Details</h2>
    </x-slot>

    <div class="page-container">
        <div class="detail-wrapper">
            <div class="detail-grid">
                <div class="detail-item">
                    <div class="detail-label">Vendor Name</div>
                    <div class="detail-value">{{ $vendor->vendor_name }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Company Name</div>
                    <div class="detail-value">{{ $vendor->company_name }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Email Address</div>
                    <div class="detail-value">{{ $vendor->email }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Contact Number</div>
                    <div class="detail-value">{{ $vendor->contact_number }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Business Address</div>
                    <div class="detail-value">{{ $vendor->business_address }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Created At</div>
                    <div class="detail-value">{{ $vendor->created_at->format('d M, Y h:i A') }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Last Updated</div>
                    <div class="detail-value">{{ $vendor->updated_at->format('d M, Y h:i A') }}</div>
                </div>
            </div>

            <div class="btn-group">
                <a href="{{ route('vendors.index') }}" class="btn-back">← Back</a>
                <a href="{{ route('vendors.edit', $vendor) }}" class="btn-edit">Edit</a>
                <form action="{{ route('vendors.destroy', $vendor) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Are you sure?')" class="btn-delete">Delete</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>