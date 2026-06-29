<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\QuotationRequest;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
   public function index()
    {
        // 1. Total Vendors
        $totalVendors = Vendor::count();

        // 2. Active Quotations - status = sent
        $activeQuotations = QuotationRequest::where('status', 'sent')->count();

        // 3. Pending Quotations - pivot table me status = pending
        $pendingQuotations = DB::table('quotation_request_vendor')
            ->where('status', 'pending')
            ->count();

        // 4. Approved Quotations - pivot table me status = approved  
        $approvedQuotations = DB::table('quotation_request_vendor')
            ->where('status', 'approved')
            ->count();

        // 5. Recent Activities - last 5 submitted quotations
$recentActivities = DB::table('quotation_request_vendor')
    ->join('quotation_requests', 'quotation_request_vendor.quotation_request_id', '=', 'quotation_requests.id')
    ->join('vendors', 'quotation_request_vendor.vendor_id', '=', 'vendors.id')
    ->where('quotation_request_vendor.status', 'submitted')
    ->select('vendors.vendor_name as name', 'quotation_requests.title', 'quotation_request_vendor.created_at as submitted_at')
    ->orderBy('quotation_request_vendor.created_at', 'desc')
    ->limit(5)
    ->get();

        return view('admin.dashboard', compact(
            'totalVendors', 
            'activeQuotations', 
            'pendingQuotations', 
            'approvedQuotations', 
            'recentActivities'
        ));
    }
}