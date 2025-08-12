<?php

namespace App\Http\Controllers\JobPosts;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobPostController extends Controller
{
    use AuthorizesRequests;
    public function create()
    {
        return view('pages.jobs.create');
    }

    public function index()
    {

        return view('pages.jobs.index');

    }

    public function show(string $job)
    {

    }

    public function myPosts()
    {

    }

    public function store()
    {

    }

    public function edit(string $job)
    {

    }

    public function update(string $job)
    {

    }

    public function destroy(string $job)
    {

    }
}
