<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\BlogPost;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function index(Request $request): View
    {
        $query = $request->get('q', '');

        $products = collect();
        $categories = collect();
        $blogPosts = collect();
        $projects = collect();

        if (strlen($query) >= 2) {
            $products = Product::active()
                ->where(function ($q) use ($query) {
                    $q->where('title', 'like', "%{$query}%")
                        ->orWhere('description', 'like', "%{$query}%")
                        ->orWhere('short_description', 'like', "%{$query}%");
                })
                ->with('category')
                ->take(10)
                ->get();

            $categories = Category::active()
                ->where('name', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%")
                ->take(5)
                ->get();

            $blogPosts = BlogPost::published()
                ->where('title', 'like', "%{$query}%")
                ->orWhere('content', 'like', "%{$query}%")
                ->take(5)
                ->get();

            $projects = Project::active()
                ->where('title', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%")
                ->take(5)
                ->get();
        }

        return view('pages.search', compact('query', 'products', 'categories', 'blogPosts', 'projects'));
    }
}
