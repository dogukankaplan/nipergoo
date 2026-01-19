<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\View\View;

class PageController extends Controller
{
    public function show(string $slug): View
    {
        $page = Page::where('slug', $slug)->active()->firstOrFail();

        return view('pages.page', compact('page'));
    }

    public function about(): View
    {
        $page = Page::where('slug', 'hakkimizda')->first();

        return view('pages.about', compact('page'));
    }
}
