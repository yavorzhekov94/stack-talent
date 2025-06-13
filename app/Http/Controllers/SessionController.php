<?php

namespace App\Http\Controllers;

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
            $attributes = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (!Auth::attempt($attributes)) {
                throw ValidationException::withMessages([
                    'email' => 'Sorry, those credentials do not match.',
                ]);
            }

            $request->session()->regenerate();
            return redirect()->intended(route('home'));

        } catch (ThrottleRequestsException $e) {
            return back()->withErrors([
                'email' => 'Too many login attempts. Please try again in a minute.'
            ]);
        }
    }
}
