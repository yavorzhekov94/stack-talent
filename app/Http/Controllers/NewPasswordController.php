<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules\Password as RulesPassword;

class NewPasswordController extends Controller
{
    public function create(Request $request, $token){
        $email = $request->query('email');

        $record = DB::table('password_reset_tokens')->where([
            'email' => $email
        ])->first();


        if (!$record || !Hash::check($token, $record->token)) {
            return redirect()->route('forgot-password.create')->withErrors([
                'email' => __('custom.reset_pass_invalid_email'),
            ]);
        }

        return view('pages.auth.reset-password', [
            'token' => $token,
            'email' => $email,
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'email' => ['required', 'email'],
            'token' => ['required'],
            'password' => ['required', 'confirmed', RulesPassword::min(8)->mixedCase()->numbers()->symbols()],
        ]);



        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),

            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                ])->save();

               Auth::login($user);
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);

    }
}
