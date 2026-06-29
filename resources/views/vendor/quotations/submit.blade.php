<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Submit Quotation</h2></x-slot>
    
    <div class="py-6">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
            <h3 class="text-xl font-bold mb-2">{{ $quotation->title }}</h3>
            <p class="text-gray-600 mb-4">{{ $quotation->description }}</p>
            
            <form method="POST" action="{{ route('vendor.quotations.submit', $quotation->pivot->id) }}">
                @csrf
                <div class="mb-4">
                    <label class="block font-semibold mb-2">Your Amount (PKR)</label>
                    <input type="number" name="amount" step="0.01" min="0" 
                           class="w-full border rounded px-3 py-2" required>
                    @error('amount') 
                        <p class="text-red-500 text-sm">{{ $message }}</p> 
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-semibold mb-2">Notes (Optional)</label>
                    <textarea name="notes" rows="4" 
                              class="w-full border rounded px-3 py-2"></textarea>
                </div>
                
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Submit
                </button>
            </form>
        </div>
    </div>
</x-app-layout>