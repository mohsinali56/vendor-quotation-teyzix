<?php
namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class QuotationRequest extends Model
{
    protected $fillable = ['title', 'description', 'deadline', 'budget', 'status', 'created_by'];

     protected $casts = [
        'deadline' => 'date',
    ];
    
   public function vendors()
{
    return $this->belongsToMany(
        User::class,  // Vendor::class ki jagah User::class
        'quotation_request_vendor',
        'quotation_request_id',
        'vendor_id'
    )
    ->withPivot(['amount', 'submission_date', 'status', 'notes'])
    ->withTimestamps();
}
    
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}