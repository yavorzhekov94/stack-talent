<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeProfileController extends Controller
{

    public function create() {
        return view('pages.profiles.employee-profile');
    }

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

    public function updateDetails(Request $request)
    {
        $user = auth()->user();
        $request->merge([
            'is_employed' => $request->has('is_employed') ? 1 : 0
        ]);
        $request->validate([
            'gender'           => ['required', 'in:male,female,other'],
            'country'          => ['required', 'string', 'max:255'],
            'state'            => ['nullable', 'string', 'max:255'],
            'city'             => ['nullable', 'string', 'max:255'],
            'phone'            => ['nullable', 'string', 'max:20', 'regex:/^[0-9+\s().-]{6,20}$/'],
            'experience'       => ['required', 'integer', 'min:0', 'max:100'],
            'education_level'  => ['required', 'in:high_school,bachelor,master,phd'],
            'dob'              => ['required', 'date', 'before:today'],
            'available_from'   => ['required', 'date', 'after_or_equal:today'],
            'is_employed'      => ['required', 'boolean'],
            'github_profile'   => ['nullable', 'url', 'max:255'],
            'linkedin_profile' => ['nullable', 'url', 'max:255'],
        ]);

        $user->employee()->update(
            $request->only(
                ['gender', 'country', 'state', 'city', 'phone', 'experience', 'education_level', 'dob',
                    'available_from', 'is_employed', 'github_profile', 'linkedin_profile'])
        );
        return back()->with('status', 'Details updated.');

    }
}
