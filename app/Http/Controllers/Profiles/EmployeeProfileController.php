<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeProfileController extends Controller
{
    public function create() {
        return view('pages.profiles.employee-profile');
    }

    public function updateBasic(Request $request)
    {

    }
}
