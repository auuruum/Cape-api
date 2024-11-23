<?php

namespace Azuriom\Plugin\CapeApi\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Azuriom\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        return view('cape-api::admin.settings', [
            'settings' => [
                'height' => setting('cape-api.height', 32),  // Default height: 64
                'width' => setting('cape-api.width', 64),    // Default width: 32
            ]
        ]);
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'height' => 'required|integer|min:1|max:1024',
            'width' => 'required|integer|min:1|max:1024',
        ]);

        // Save settings using Setting model
        Setting::updateSettings([
            'cape-api.height' => (int) $validated['height'],
            'cape-api.width' => (int) $validated['width']
        ]);

        return redirect()->route('cape-api.admin.settings')
            ->with('success', 'Cape dimensions have been updated successfully!');
    }
}
