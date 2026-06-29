<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorProfileController extends Controller
{
    public function create()
    {
        return view('vendor.profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'vendor_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'business_address' => 'required|string',
        ]);

        Vendor::create([
            'user_id' => auth()->id(),
            'vendor_name' => $request->vendor_name,
            'company_name' => $request->company_name,
            'email' => auth()->user()->email,
            'contact_number' => $request->contact_number,
            'business_address' => $request->business_address,
        ]);

        return redirect()->route('vendor.dashboard')
            ->with('success', 'Profile completed successfully!');
    }
}