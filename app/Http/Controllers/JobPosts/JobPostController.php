<?php

namespace App\Http\Controllers\JobPosts;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\JobPost;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class JobPostController extends Controller
{

    use AuthorizesRequests;
    public function create()
    {
        $categories = Category::orderBy('name')->get(['id', 'name']);
        return view('pages.jobs.create', compact('categories'));
    }

    public function index()
    {

        return view('pages.jobs.index');

    }

    public function show(JobPost $job)
    {
        return view('pages.jobs.show', compact('job'));
    }

    public function myPosts()
    {

    }

    public function store(Request $request)
    {
        $this->authorize('create', JobPost::class);

        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'required|string',
            'requirements' => 'nullable|string',
            'location'     => 'nullable|string|max:255',
            'salary_min'   => 'nullable|integer|min:0',
            'salary_max'   => 'nullable|integer|min:0',
            'category_id'  => 'required|exists:categories,id',
            'type'         => 'required|in:full_time,part_time,internship,contract',
            'is_remote'    => 'nullable|boolean',
            'tags_csv'     => 'nullable|string|max:500',
        ]);
        $validated['slug'] = Str::slug($validated['title']);

        $jobData = Arr::except($validated, ['tags_csv']);

        $jobData['user_id']   = auth()->id();
        $jobData['published_at'] = now();
        $jobData['is_remote'] = $request->boolean('is_remote');

        $job = JobPost::create($jobData);

        $tagIds = [];
        if (!empty($validated['tags_csv'])) {
            $names = collect(explode(',', $validated['tags_csv']))
                ->map(fn ($v) => trim($v))
                ->filter()
                ->unique();

            foreach ($names as $name) {
                $slug = Str::slug(mb_strtolower($name));
                if ($slug === '') continue;

                $tag = Tag::firstOrCreate(['slug' => $slug], ['name' => ucfirst($name)]);
                $tagIds[] = $tag->id;
            }
        }

        $job->tags()->sync($tagIds);

        return redirect()->route('jobs.show', $job)
            ->with('status', 'Jobs created successfully!');
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
