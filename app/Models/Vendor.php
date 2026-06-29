<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Ye line add karo

class Vendor extends Model
{
    protected $fillable = [
        'user_id',
        'vendor_name',
        'company_name', 
        'email',
        'contact_number',
        'business_address'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function quotationRequests()
    {
        return $this->belongsToMany(QuotationRequest::class, 'quotation_request_vendor')
                    ->withPivot(['amount', 'submission_date', 'status', 'notes'])
                    ->withTimestamps();
    }
}