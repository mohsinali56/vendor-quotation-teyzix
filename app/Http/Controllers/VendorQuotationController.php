<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuotationRequest;

class VendorQuotationController extends Controller
{
    public function index(Request $request)
    {
        $quotations = QuotationRequest::whereHas('vendors', function($q) {
            $q->where('vendor_id', auth()->id()); // <-- vendor_id use karo
        })->latest()->paginate(10)->withQueryString();

        return view('vendor.quotation-requests.index', compact('quotations'));
    }

    public function edit($id)
    {
        // Sirf 1 quotation fetch karo jo is vendor ko assigned hai
        $quotation = QuotationRequest::whereHas('vendors', function($q) {
            $q->where('vendor_id', auth()->id());
        })->findOrFail($id);

        // Pivot data nikal lo taake amount/notes form me show ho jaye
        $vendorPivot = $quotation->vendors->where('id', auth()->id())->first()->pivot;

        return view('vendor.quotation-requests.edit', compact('quotation', 'vendorPivot'));
    }
    

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'notes' => 'nullable|string|max:1000'
        ]);

        // Check karo ke ye request is vendor ki hai
        $qr = QuotationRequest::whereHas('vendors', function($q) {
            $q->where('vendor_id', auth()->id());
        })->findOrFail($id);
        
        $qr->vendors()->updateExistingPivot(auth()->id(), [
            'amount' => $validated['amount'],
            'notes' => $validated['notes'],
            'status' => 'submitted',
            'submission_date' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('vendor.quotation-requests.index')
                         ->with('success', 'Quote submitted successfully!');
    }
    public function compare($id)
{
    // Abhi sirf id leke page return kar do. Data baad me laenge
    return view('vendor.quotation-requests.compare', ['id' => $id]);
}
}