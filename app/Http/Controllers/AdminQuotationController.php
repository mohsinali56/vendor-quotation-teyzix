<?php

namespace App\Http\Controllers;

use App\Models\QuotationRequest;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
//use Illuminate\Http\Request;

class AdminQuotationController extends Controller
{
   public function compare($id)
{
    $req = QuotationRequest::with('vendors')->findOrFail($id);

    if (auth()->id() != $req->created_by) {
        abort(403, 'Unauthorized');
    }

    // 1. Sirf jin vendors ne amount diya hai un me se min nikalo
    $lowestAmount = $req->vendors->whereNotNull('pivot.amount')->min('pivot.amount');

    return view('admin.compare', compact('req', 'lowestAmount'));
}
public function acceptVendor($id, $vendorId)
    {
        $req = QuotationRequest::findOrFail($id);

        // 1. Security Check: Sirf wohi admin accept kare jisne request banayi
        if (auth()->id() != $req->created_by) {
            abort(403, 'Unauthorized Action');
        }

        // 2. Jis vendor ko accept kiya uska status = accepted
        $req->vendors()->updateExistingPivot($vendorId, ['status' => 'accepted']);

        // 3. Baaki sab vendors ka status = rejected kar do
        $otherVendorIds = $req->vendors()->where('vendor_id', '!=', $vendorId)->pluck('vendor_id')->toArray();
        
        if (!empty($otherVendorIds)) {
            $req->vendors()->updateExistingPivot($otherVendorIds, ['status' => 'rejected']);
        }

        // 4. Puri Quotation Request ka status bhi closed kar do
$req->update(['status' => 'closed']);

      return redirect()->route('quotation-requests.compare', $id)
                 ->with('success', 'Vendor Accepted Successfully!');
    }
   public function downloadPdf($id)
{
    // 1. Data nikal lo - sirf wahi columns jo pivot table me hain
    $quotationRequest = QuotationRequest::with(['vendors' => function($q) {
        $q->withPivot('amount', 'status', 'notes', 'submission_date'); // <- budget/deadline hata ke amount dal diya
    }])->findOrFail($id);

    // 2. Lowest amount nikal lo PDF ke liye
    $lowestAmount = $quotationRequest->vendors->whereNotNull('pivot.amount')->min('pivot.amount');

    // 3. PDF banao aur view load karo
    $pdf = Pdf::loadView('admin.pdf.quotation', compact('quotationRequest', 'lowestAmount'));

    // 4. Download karwa do
    return $pdf->download('quotation-'.$quotationRequest->id.'.pdf');
}

public function markDelivered(QuotationRequest $request, User $vendor)
{
    $request->vendors()->updateExistingPivot($vendor->id, ['status' => 'delivered']);
    return back()->with('success', 'Vendor marked as Delivered.');
}
}
