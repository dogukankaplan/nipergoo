<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::ordered()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create(): View
    {
        return view('admin.testimonials.form');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:1024',
            'rating' => 'integer|min:1|max:5',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('testimonials', 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')->with('success', 'Yorum başarıyla eklendi.');
    }

    public function edit(Testimonial $testimonial): View
    {
        return view('admin.testimonials.form', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:1024',
            'rating' => 'integer|min:1|max:5',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        if ($request->hasFile('image')) {
            if ($testimonial->image)
                Storage::disk('public')->delete($testimonial->image);
            $validated['image'] = $request->file('image')->store('testimonials', 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')->with('success', 'Yorum başarıyla güncellendi.');
    }

    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        if ($testimonial->image)
            Storage::disk('public')->delete($testimonial->image);
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Yorum silindi.');
    }
}
