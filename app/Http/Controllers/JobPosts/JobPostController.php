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
        $this->authorize('viewAny', JobPost::class);
        return view('pages.jobs.index');

    }
}
