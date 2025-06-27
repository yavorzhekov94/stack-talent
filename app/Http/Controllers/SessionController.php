<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create() {
        return view('pages.auth.login');
    }

    public function store(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();

            if ($user && $user->google_id) {
                throw ValidationException::withMessages([
                    'email' => __('custom.google_login_only'),
                ]);
            }

            $attributes = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            $remember = $request->filled('remember');

            if (!Auth::attempt($attributes, $remember)) {
                throw ValidationException::withMessages([
                    'email' => __('custom.email_credentials_not_match'),
                ]);
            }

            $request->session()->regenerate();
            return redirect()->intended(route('home'));

        } catch (ThrottleRequestsException $e) {
            return back()->withErrors([
                'email' => __('custom.email_to_many_attemps'),
            ]);
        }
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
