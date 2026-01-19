<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::with('category')->ordered()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create(): View
    {
        $categories = Category::ordered()->get();
        return view('admin.projects.form', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects',
            'client' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'completed_at' => 'nullable|date',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        $validated['slug'] = $validated['slug'] ?: Str::slug($validated['title']);
        $validated['image'] = $request->file('image')->store('projects', 'public');

        if ($request->hasFile('gallery')) {
            $galleryPaths = [];
            foreach ($request->file('gallery') as $file) {
                $galleryPaths[] = $file->store('projects/gallery', 'public');
            }
            $validated['gallery'] = $galleryPaths;
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Proje başarıyla eklendi.');
    }

    public function edit(Project $project): View
    {
        $categories = Category::ordered()->get();
        return view('admin.projects.form', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project): RedirectResponse
    {
        $validated = $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug,' . $project->id,
            'client' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'completed_at' => 'nullable|date',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        $validated['slug'] = $validated['slug'] ?: Str::slug($validated['title']);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($project->image);
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        if ($request->hasFile('gallery')) {
            if ($project->gallery) {
                foreach ($project->gallery as $img)
                    Storage::disk('public')->delete($img);
            }
            $galleryPaths = [];
            foreach ($request->file('gallery') as $file) {
                $galleryPaths[] = $file->store('projects/gallery', 'public');
            }
            $validated['gallery'] = $galleryPaths;
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Proje güncellendi.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        Storage::disk('public')->delete($project->image);
        if ($project->gallery) {
            foreach ($project->gallery as $img)
                Storage::disk('public')->delete($img);
        }
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Proje silindi.');
    }
}
