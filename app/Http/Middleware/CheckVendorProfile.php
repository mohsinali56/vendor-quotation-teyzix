<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckVendorProfile
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        
        
        if($user->role === 'vendor' && !$user->vendor) {
            return redirect()->route('vendor.profile.create')
                ->with('warning', 'Please complete your profile first');
        }
        
        return $next($request);
    }
}