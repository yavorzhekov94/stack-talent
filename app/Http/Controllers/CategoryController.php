<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    use AuthorizesRequests;
    public function create()
    {
        return view('pages.category.create');
    }

    public function store(Request $request)
    {
        $request->merge([
            'is_active' => $request->has('is_active') ? 1 : 0
        ]);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1024'],
            'icon' => ['nullable', 'string', '255'],
            'is_active' => ['required', 'boolean'],
        ]);

        $category = Category::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'icon' => $validated['icon'],
            'slug' => Str::slug($validated['name']),
            'is_active' => $validated['is_active'],
        ]);

        return response()->json($category);
    }

    public function index()
    {
        $this->authorize('viewAny', Category::class);
        $categories = Category::orderBy('name')->get();
        return view('pages.category.index', compact('categories'));
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['success' => true]);

    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);

        return response()->json($category);
    }
}
