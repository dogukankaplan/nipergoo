<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index(): View
    {
        $settings = Setting::all()->groupBy('group');

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        foreach ($request->except(['_token', '_method']) as $key => $value) {
            $setting = Setting::where('key', $key)->first();

            if ($setting) {
                if ($setting->type === 'image' && $request->hasFile($key)) {
                    // Delete old image
                    if ($setting->value) {
                        Storage::disk('public')->delete($setting->value);
                    }
                    $value = $request->file($key)->store('settings', 'public');
                }

                $setting->update(['value' => $value]);
            }
        }

        return redirect()->back()->with('success', 'Ayarlar başarıyla güncellendi.');
    }
}
