<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $posts = BlogPost::published()->latest()->paginate(9);

        return view('pages.blog.index', compact('posts'));
    }

    public function show(string $slug): View
    {
        $post = BlogPost::where('slug', $slug)->published()->firstOrFail();
        $relatedPosts = BlogPost::published()
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();

        return view('pages.blog.show', compact('post', 'relatedPosts'));
    }
}
