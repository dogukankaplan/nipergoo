<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function category(string $slug): View
    {
        $category = Category::where('slug', $slug)->active()->firstOrFail();
        $products = $category->products()->active()->ordered()->get();
        $subcategories = $category->children()->active()->ordered()->get();

        return view('pages.products.category', compact('category', 'products', 'subcategories'));
    }

    public function show(string $categorySlug, string $productSlug): View
    {
        $category = Category::where('slug', $categorySlug)->active()->firstOrFail();
        $product = Product::where('slug', $productSlug)
            ->where('category_id', $category->id)
            ->active()
            ->firstOrFail();

        $relatedProducts = Product::where('category_id', $category->id)
            ->where('id', '!=', $product->id)
            ->active()
            ->ordered()
            ->take(4)
            ->get();

        return view('pages.products.show', compact('category', 'product', 'relatedProducts'));
    }
}
