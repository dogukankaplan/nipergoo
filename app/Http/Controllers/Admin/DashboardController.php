<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\BlogPost;
use App\Models\Product;
use App\Models\Category;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'messages' => ContactMessage::count(),
            'unread_messages' => ContactMessage::unread()->count(),
            'blog_posts' => BlogPost::count(),
            'products' => Product::count(),
            'categories' => Category::count(),
        ];

        $recentMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages'));
    }
}
