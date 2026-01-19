<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use App\Models\Category;
use App\Models\Product;
use App\Mail\QuoteRequestMail;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;

class QuoteController extends Controller
{
    public function index(): View
    {
        $categories = Category::active()->ordered()->get();
        $products = Product::active()->ordered()->get();

        return view('pages.quote', compact('categories', 'products'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'product_id' => 'nullable|exists:products,id',
            'project_details' => 'nullable|string',
            'budget_range' => 'nullable|string|max:100',
            'timeline' => 'nullable|string|max:100',
            'message' => 'nullable|string',
        ]);

        $quote = QuoteRequest::create($validated);

        // Send notification email to admin
        if (setting('contact_email')) {
            try {
                Mail::to(setting('contact_email'))->send(new QuoteRequestMail($quote));
            } catch (\Exception $e) {
                // Log error but don't fail
            }
        }

        return redirect()->back()->with('success', 'Teklif talebiniz başarıyla gönderildi. En kısa sürede sizinle iletişime geçeceğiz.');
    }
}
