<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */


    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => [
                'required',
                'confirmed',
                Password::min(8) // Minimum of 8 characters
                    ->letters() // At least one letter
                    ->mixedCase() // Both uppercase and lowercase letters
                    ->numbers() // At least one number
                    ->symbols() // At least one special character
            ],
        ]);
    
        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);
    
        return back()->with('status', 'Password updated successfully!');
    }
    
}
