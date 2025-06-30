<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserProfileCreated;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    //
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $user = User::where('google_id', $googleUser->id)->first();

            if ($user) {
                Auth::login($user);
                return redirect()->intended(route('home'));
            }

            $first_name = explode(' ', $googleUser->name)[0];
            $last_name = explode(' ', $googleUser->name)[1];

            session([
                'google_user' => [
                    'email' => $googleUser->email,
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'google_id' => $googleUser->id,
                    'password' => Hash::make(Str::random(16)),
                ]
            ]);

            return redirect()->route('auth.google.select-user-type');


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

    public function showUserTypeForm()
    {
        if (!session()->has('google_user')) {
            return redirect()->route('login');
        }

        return view('pages.auth.google-user-type');
    }

    public function completeRegistration(Request $request)
    {

        $attributes = $request->validate([
            'user_type' => ['required', 'in:employee,employer'],
        ]);

        $data = session('google_user');

        $user = User::create([
            'email' => $data['email'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'google_id' => $data['google_id'],
            'password' => $data['password'],
            'user_type' => $attributes['user_type'],
            'email_verified_at' => now()
        ]);

        event(new UserProfileCreated($user));
        session()->forget('google_user');

        Auth::login($user);

        return redirect()->route('home');
    }
}
