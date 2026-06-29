<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\QuotationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class VendorController extends Controller
{
    // Admin CRUD functions - same as before
    public function index(Request $request)
    {
        $search = $request->search;
        $vendors = Vendor::when($search, function($q) use($search){
            $q->where('vendor_name', 'like', "%$search%")
              ->orWhere('company_name', 'like', "%$search%");
        })->latest()->paginate(10);
        
        return view('vendors.index', compact('vendors', 'search'));
    }

    public function create()
    {
        return view('vendors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vendor_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'email' => 'required|email|unique:vendors',
            'contact_number' => 'required|string|max:20',
            'business_address' => 'required|string',
        ]);
        Vendor::create($validated);
        return redirect()->route('vendors.index')->with('success', 'Vendor added successfully!');
    }

    public function show(Vendor $vendor)
    {
        return view('vendors.show', compact('vendor'));
    }

    public function edit(Vendor $vendor)
    {
        return view('vendors.edit', compact('vendor'));
    }

    public function update(Request $request, Vendor $vendor)
    {
        $validated = $request->validate([
            'vendor_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'email' => 'required|email|unique:vendors,email,'.$vendor->id,
            'contact_number' => 'required|string|max:20',
            'business_address' => 'required|string',
        ]);
        $vendor->update($validated);
        return redirect()->route('vendors.index')->with('success', 'Vendor updated!');
    }

    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        return back()->with('success', 'Vendor deleted!');
    }

    // ===== Day 3: Vendor Portal Functions =====

    public function vendorIndex()
{
    $vendorId = auth()->id();
    
    $requests = QuotationRequest::whereHas('vendors', function($q) use ($vendorId){
        $q->where('vendor_id', $vendorId);
    })
    ->with(['vendors' => function($q) use ($vendorId){
        $q->where('vendor_id', $vendorId)
          ->withPivot('id', 'amount', 'notes', 'status', 'submission_date'); // id add kardia
    }])
    ->latest()
    ->paginate(10);

    return view('vendor.dashboard', compact('requests'));
}
    public function vendorCreate(QuotationRequest $request)
    {
        // Check ke ye request is vendor ko assign hai ya nahi
        if(!$request->vendors()->where('vendor_id', auth()->id())->exists()){
            abort(403);
        }
        return view('vendor.create', compact('request'));
    }

    

public function vendorStore(Request $request, QuotationRequest $quotationRequest)
{
    $validated = $request->validate([
        'amount' => 'required|numeric|min:0',
        'notes' => 'nullable|string',
    ]);

    DB::table('quotation_request_vendor')
        ->updateOrInsert(
            [
                'quotation_request_id' => $quotationRequest->id,
                'vendor_id' => auth()->id(),
            ],
            [
                'amount' => $validated['amount'],
                'notes' => $validated['notes'],
                'status' => 'submitted',
                'submission_date' => now(),
                'updated_at' => now(),
            ]
        );

    return redirect()->route('vendor.dashboard')->with('success', 'Quotation submitted successfully!');
}

public function myQuotations()
{
    $vendorId = auth()->id();

    // Sirf woh requests lao jahan is vendor ne quote submit kiya hai
    $myQuotations = QuotationRequest::whereHas('vendors', function($q) use ($vendorId) {
            $q->where('vendor_id', $vendorId);
        })
        ->with(['vendors' => function($q) use ($vendorId) {
            $q->where('vendor_id', $vendorId); // Sirf apna pivot data lao
        }])
        ->latest('quotation_requests.created_at')
        ->paginate(10);

    return view('vendor.my-quotations', compact('myQuotations'));
}

}