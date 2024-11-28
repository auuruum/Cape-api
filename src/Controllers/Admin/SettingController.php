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
                'height' => setting('cape-api.height', 32),
                'width' => setting('cape-api.width', 64),
                'icon' => setting('cape-api.icon', 'bi bi-person-circle'),
                'show_cape' => setting('cape-api.show_cape', true),
            ]
        ]);
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'height' => 'required|integer|min:1|max:1024',
            'width' => 'required|integer|min:1|max:1024',
            'icon' => 'nullable|string|max:50',
            'show_cape' => 'boolean',
        ]);

        // Save settings using Setting model
        Setting::updateSettings([
            'cape-api.height' => (int) $validated['height'],
            'cape-api.width' => (int) $validated['width'],
            'cape-api.icon' => $validated['icon'] ?? '',
            'cape-api.show_cape' => (bool) ($validated['show_cape'] ?? false),
        ]);

        return redirect()->route('cape-api.admin.settings')
            ->with('success', trans('messages.status.success'));
    }
}
