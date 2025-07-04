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

    public function store()
    {

    }
}
