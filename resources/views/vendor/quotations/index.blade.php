<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">My Quotation Requests</h2></x-slot>
    
    <div class="py-6">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
            
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
            @endif
            

            @forelse($quotations as $quotation)
                <div class="border p-4 mb-4 rounded">
                    <h3 class="text-lg font-bold">{{ $quotation->title }}</h3>
                    <p class="text-gray-600">{{ $quotation->description }}</p>
                    <p><strong>Deadline:</strong> {{ $quotation->deadline->format('d M, Y') }}</p>
                    <p><strong>Budget:</strong> {{ $quotation->budget ? 'PKR '.number_format($quotation->budget) : 'N/A' }}</p>
                    
                    <a href="{{ route('vendor.quotation-requests.edit', $req->id) }}" 
                       class="mt-3 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Submit Quotation
                    </a>
                </div>
            @empty
                <p class="text-gray-500">No pending quotation requests</p>
            @endforelse
        </div>
    </div>
</x-app-layout>