<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    //
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $user = User::where('email', $googleUser->email)->first();

            if (!$user) {
                $user = User::create([
                    'email' => $googleUser->email,
                    'first_name' => $googleUser->name,
                    'last_name' => $googleUser->name,
                    'google_id' => $googleUser->id,
                ]);
            }

            Auth::login($user);
            return redirect()->intended(route('home'));

        } catch (\Exception $e) {

            return redirect()
                    ->route('login')
                    ->withErrors(['google_error' => 'Login with Google failed.']);
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
}
