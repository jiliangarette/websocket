<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ThemeController extends Controller
{
    public function index()
    {
        $themes = Theme::all();
        return response()->json($themes);
    }

    public function show($id)
{
    $theme = Theme::findOrFail($id);

    if ($theme->background_type === 'image' && !empty($theme->background_value)) {
        $expiresAt = Carbon::now()->addHour();
        $url = Storage::disk('spaces')->temporaryUrl($theme->background_value, $expiresAt);
        $theme->background_value_url = $url;
    } else {
        $theme->background_value_url = null;
    }

    return response()->json([
        'theme' => $theme,
        'temporary_url' => $theme->background_value_url
    ]);
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'main_color' => 'required|string',
            'accent_color' => 'required|string',
            'text_color' => 'required|string',
            'button_color' => 'required|string',
            'background_type' => 'required|in:color,image',
            'background_value' => 'required_if:background_type,image|nullable|max:2048',
        ]);

        if ($request->background_type === 'image' && $request->hasFile('background_value')) {
            $originalName = $request->file('background_value')->getClientOriginalName();
            $path = $request->file('background_value')->storeAs('themes', $originalName, [
                'disk' => 's3',
                'visibility' => 'public',
            ]);
            $validated['background_value'] = $path;
        }

        $theme = Theme::create($validated);
        return response()->json($theme, 201);
    }

    public function update(Request $request, $id)
    {
        $theme = Theme::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string',
            'main_color' => 'required|string',
            'accent_color' => 'required|string',
            'text_color' => 'required|string',
            'button_color' => 'required|string',
            'background_type' => 'required|in:color,image',
            'background_value' => 'required_if:background_type,image|nullable|max:2048',
        ]);

        if ($request->background_type === 'image' && $request->hasFile('background_value')) {
            // Delete the old image if it exists
            if (Storage::disk('s3')->exists($theme->background_value)) {
                Storage::disk('s3')->delete($theme->background_value);
            }

            // Retain the original filename
            $originalName = $request->file('background_value')->getClientOriginalName();
            $path = $request->file('background_value')->storeAs('themes', $originalName, [
                'disk' => 's3',
            ]);
            $validated['background_value'] = $path;
        }

        $theme->update($validated);
        return response()->json($theme);
    }

    public function destroy($id)
    {
        $theme = Theme::findOrFail($id);

        // Optionally delete the background image from storage if it exists
        if (Storage::disk('s3')->exists($theme->background_value)) {
            Storage::disk('s3')->delete($theme->background_value);
        }

        $theme->delete();
        return response()->json(null, 204);
    }
}
