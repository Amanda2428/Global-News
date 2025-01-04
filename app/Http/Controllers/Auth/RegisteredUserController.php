<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => [
                'required',
                'confirmed',
                Password::min(8) // Minimum of 8 characters
                    ->letters() // At least one letter
                    ->mixedCase() // Both uppercase and lowercase letters
                    ->numbers() // At least one number

            ],
            'subscribed' => ['required', 'integer'],
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'subscribed' => $request->subscribed,
        ]);
    
        event(new Registered($user));
    
        Auth::login($user);
    
        $user = User::where('email', '=', $request->email)->first();
    
        if ($user->role == 1) {
            return redirect(route('dashboard', absolute: false));
        } else {
            return redirect(route('user.home', absolute: false));
        }
    }
    
}
