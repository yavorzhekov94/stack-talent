<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployerProfileController extends Controller
{
    public function create()
    {
        return view('pages.profiles.employer-profile');
    }

    public function updateDetails(Request $request)
    {
        $user = auth()->user();

        $request->merge([
            'is_verified' => $request->has('is_verified') ? 1 : 0
        ]);

        $request->validate([
            'country'          => ['required', 'string', 'max:255'],
            'state'            => ['nullable', 'string', 'max:255'],
            'city'             => ['nullable', 'string', 'max:255'],
            'phone'            => ['nullable', 'string', 'max:20', 'regex:/^[0-9+\s().-]{6,20}$/'],
            'company_name'     => ['nullable', 'string', 'max:255'],
            'company_address'  => ['nullable', 'string', 'max:1024'],
            'company_description'  => ['nullable', 'string', 'max:1024'],
            'company_email'    => ['required', 'email'],
            'company_size'     => ['required', 'in:1-10,11-50,51-200,200+'],
            'company_logo'     => ['nullable', 'url', 'max:255'],
            'company_website'  => ['nullable', 'url', 'max:255'],
            'is_verified'      => ['required', 'boolean'],
        ]);


        $user->employer()->update(
            $request->only(
                ['country', 'state', 'city', 'phone', 'company_name', 'company_address', 'company_description',
                    'company_email', 'company_size', 'company_logo', 'company_website', 'is_verified'])
        );
        return back()->with('status', 'Employer Details updated.');

    }
}
