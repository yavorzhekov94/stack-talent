<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('pages.category.create');
    }

    public function store(Request $request)
    {

    }

    public function index()
    {
        $categories = Category::orderBy('name')->get();
        return view('pages.category.index', compact('categories'));
    }

    public function destroy(Category $category)
    {

    }

    public function update(Category $category)
    {

    }
}
