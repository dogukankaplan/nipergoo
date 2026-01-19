<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Product;
use App\Models\Page;
use App\Models\Project;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $categories = Category::active()->get();
        $products = Product::active()->get();
        $blogPosts = BlogPost::published()->get();
        $pages = Page::active()->get();
        $projects = Project::active()->get();

        $content = view('sitemap', compact('categories', 'products', 'blogPosts', 'pages', 'projects'));

        return response($content)->header('Content-Type', 'application/xml');
    }
}
