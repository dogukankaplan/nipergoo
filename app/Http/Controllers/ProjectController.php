<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::active()->ordered()->with('category')->paginate(12);

        return view('pages.projects.index', compact('projects'));
    }

    public function show(string $slug): View
    {
        $project = Project::where('slug', $slug)->active()->firstOrFail();
        $relatedProjects = Project::active()
            ->where('id', '!=', $project->id)
            ->where('category_id', $project->category_id)
            ->take(3)
            ->get();

        return view('pages.projects.show', compact('project', 'relatedProjects'));
    }
}
