<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FeatureController extends Controller
{
    public function index(): View
    {
        $features = Feature::ordered()->get();
        return view('admin.features.index', compact('features'));
    }

    public function create(): View
    {
        return view('admin.features.form');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        $validated['is_active'] = $request->has('is_active');

        Feature::create($validated);

        return redirect()->route('admin.features.index')->with('success', 'Özellik başarıyla oluşturuldu.');
    }

    public function edit(Feature $feature): View
    {
        return view('admin.features.form', compact('feature'));
    }

    public function update(Request $request, Feature $feature): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $feature->update($validated);

        return redirect()->route('admin.features.index')->with('success', 'Özellik başarıyla güncellendi.');
    }

    public function destroy(Feature $feature): RedirectResponse
    {
        $feature->delete();

        return redirect()->route('admin.features.index')->with('success', 'Özellik başarıyla silindi.');
    }
}
