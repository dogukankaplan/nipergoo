<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Feature;
use App\Models\Category;
use App\Models\Product;
use App\Models\Faq;
use App\Models\BlogPost;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $sliders = Slider::active()->ordered()->get();
        $features = Feature::active()->ordered()->get();
        $categories = Category::active()->parentOnly()->ordered()->with('children')->get();
        $featuredProducts = Product::active()->featured()->with('category')->take(6)->get();
        $faqs = Faq::active()->ordered()->get();
        $latestPosts = BlogPost::published()->latest()->take(3)->get();

        return view('pages.home', compact(
            'sliders',
            'features',
            'categories',
            'featuredProducts',
            'faqs',
            'latestPosts'
        ));
    }
}
