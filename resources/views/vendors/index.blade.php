<x-app-layout>
    <style>
        .vendors-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .vendors-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
        }
        .btn-add {
            background-color: #2563eb;
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            text-decoration: none;
            display: inline-block;
        }
        .btn-add:hover {
            background-color: #1d4ed8;
        }
        .vendors-container {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .vendors-wrapper {
            max-width: 80rem;
            margin: 0 auto;
            padding: 0 1.5rem;
        }
        .search-input {
            width: 100%;
            padding: 0.5rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }
        @media (min-width: 768px) {
            .search-input { width: 33.333%; }
        }
        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }
        .table-card {
            background-color: #fff;
            overflow: hidden;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
            border-radius: 0.5rem;
        }
        .table-full {
            width: 100%;
        }
        .table-head {
            background-color: #f9fafb;
        }
        .th-cell {
            padding: 0.75rem 1.5rem;
            text-align: left;
            font-weight: 500;
        }
        .tr-border {
            border-top: 1px solid #e5e7eb;
        }
        .td-cell {
            padding: 1rem 1.5rem;
        }
        .action-link {
            color: #2563eb;
            text-decoration: none;
            margin-right: 0.5rem;
        }
        .action-link:hover {
            text-decoration: underline;
        }
        .btn-delete {
            color: #dc2626;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
        }
        .btn-delete:hover {
            text-decoration: underline;
        }
        .empty-row {
            padding: 1rem 1.5rem;
            text-align: center;
            color: #6b7280;
        }
        .pagination {
            padding: 1rem;
        }
    </style>

    <x-slot name="header">
        <div class="vendors-header">
            <h2 class="vendors-title">Vendors</h2>
            <a href="{{ route('vendors.create') }}" class="btn-add">+ Add Vendor</a>
        </div>
    </x-slot>

    <div class="vendors-container">
        <div class="vendors-wrapper">
            <!-- Search -->
<form method="GET" class="mb-4 flex gap-2">
    <input 
        type="text" 
        name="search" 
        value="{{ $search }}" 
        placeholder="Search vendor or company..."
        class="flex-1 md:w-1/3 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
    >
    <button type="submit" class="bg-blue-600 text-black px-5 py-2 rounded-lg hover:bg-blue-700">
        Search
    </button>
    
    @if($search)
    <a href="{{ route('vendors.index') }}" class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg hover:bg-gray-300">
        Clear
    </a>
    @endif
</form>

            @if(session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-card">
                <table class="table-full">
                    <thead class="table-head">
                        <tr>
                            <th class="th-cell">Vendor Name</th>
                            <th class="th-cell">Company</th>
                            <th class="th-cell">Email</th>
                            <th class="th-cell">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($vendors as $vendor)
                        <tr class="tr-border">
                            <td class="td-cell">
            <a href="{{ route('vendors.show', $vendor) }}" class="action-link">
                {{ $vendor->vendor_name }}
            </a>
        </td>
                            <td class="td-cell">{{ $vendor->company_name }}</td>
                            <td class="td-cell">{{ $vendor->email }}</td>
                            <td class="td-cell">
                                <a href="{{ route('vendors.edit', $vendor) }}" class="action-link">Edit</a>
                                <form action="{{ route('vendors.destroy', $vendor) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Delete?')" class="btn-delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="empty-row">No vendors found</td></tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="pagination">{{ $vendors->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>