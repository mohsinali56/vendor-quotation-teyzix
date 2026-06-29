<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        // Agar vendor hai to vendor table bhi update karo
        if($user->role === 'vendor') {
            $request->validate([
                'vendor_name' => 'required|string|max:255',
                'company_name' => 'required|string|max:255',
                'contact_number' => 'required|string|max:20',
                'business_address' => 'required|string',
            ]);

            if(!$user->vendor) {
                // Pehli dafa vendor profile create
                $user->vendor()->create([
                    'vendor_name' => $request->vendor_name,
                    'company_name' => $request->company_name,
                    'email' => $user->email,
                    'contact_number' => $request->contact_number,
                    'business_address' => $request->business_address,
                ]);
            } else {
                // Existing vendor profile update
                $user->vendor->update([
                    'vendor_name' => $request->vendor_name,
                    'company_name' => $request->company_name,
                    'contact_number' => $request->contact_number,
                    'business_address' => $request->business_address,
                ]);
            }
        }

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}