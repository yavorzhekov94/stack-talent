<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function updateBasic(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
        ]);
        $user->update($request->only(['first_name', 'last_name']));

        return back()->with('status', 'Basic info updated.');

    }
    public function updatePassword(Request $request)
    {
        $password_rules = Password::min(8)->mixedCase()->numbers()->symbols();

        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', $password_rules],
        ]);

        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('status', 'Password updated.');
    }
}
