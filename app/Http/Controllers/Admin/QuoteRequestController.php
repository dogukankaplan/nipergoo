<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class QuoteRequestController extends Controller
{
    public function index(): View
    {
        $quotes = QuoteRequest::with(['category', 'product'])->latest()->paginate(20);
        return view('admin.quotes.index', compact('quotes'));
    }

    public function show(QuoteRequest $quote): View
    {
        $quote->markAsRead();
        return view('admin.quotes.show', compact('quote'));
    }

    public function updateStatus(QuoteRequest $quote, string $status): RedirectResponse
    {
        $quote->update(['status' => $status]);
        return redirect()->back()->with('success', 'Durum güncellendi.');
    }

    public function destroy(QuoteRequest $quote): RedirectResponse
    {
        $quote->delete();
        return redirect()->route('admin.quotes.index')->with('success', 'Teklif talebi silindi.');
    }
}
