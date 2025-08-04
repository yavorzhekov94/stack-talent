<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $categories = Category::active()
            ->orderBy('name')
            ->limit(10)
            ->get();

        return view('index', compact('categories'));
    }
}
