<?php

namespace App\Http\Controllers;

use App\Models\QuotationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuotationRequestController extends Controller
{
    public function index()
    {
        
        $requests = QuotationRequest::with('creator')->latest()->paginate(10);
        return view('quotation-requests.index', compact('requests'));
    }

    public function create()
    {
        $vendors = User::where('role', 'vendor')->orderBy('name')->get();
        return view('quotation-requests.create', compact('vendors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline' => 'required|date|after_or_equal:today',
            'budget' => 'nullable|numeric|min:0',
            'vendor_ids' => 'required|array|min:1',
            'vendor_ids.*' => 'exists:users,id'
        ]);

        $qr = QuotationRequest::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'deadline' => $validated['deadline'],
            'budget' => $validated['budget'],
            'status' => 'sent',
            'created_by' => Auth::id()
        ]);

        // Attach vendors to pivot table with status
        $qr->vendors()->attach($validated['vendor_ids'], [
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('quotation-requests.show', $qr)
                         ->with('success', 'Quotation Request sent to vendors!');
    }

    public function show(QuotationRequest $quotationRequest)
    {
        $quotationRequest->load('vendors');
        return view('quotation-requests.show', compact('quotationRequest'));
    }
    public function updateStatus(Request $request, QuotationRequest $quotationRequest)
{
    $data = $request->validate([
        'vendor_id' => 'required|exists:users,id',
        'status' => 'required|in:approved,rejected'
    ]);

    $quotationRequest->vendors()->updateExistingPivot($data['vendor_id'], [
        'status' => $data['status']
    ]);

    return back()->with('success', 'Status updated successfully');
}
public function history(Request $request)
{
    $query = QuotationRequest::with('vendors');

    // Status filter
    if ($request->filled('status')) {
        $query->whereHas('vendors', function($q) use ($request) {
            $q->where('quotation_request_vendor.status', $request->status);
        });
    }

    // Date filter
    if ($request->filled('date')) {
        $query->whereDate('created_at', $request->date);
    }

    $requests = $query->latest()->paginate(10);

    return view('quotation-requests.history', compact('requests'));
}
}