<?php

namespace Azuriom\Plugin\CapeApi\Controllers;

use Azuriom\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CapeController extends Controller
{
    /**
     * Default cape dimensions
     */
    const DEFAULT_WIDTH = 64;
    const DEFAULT_HEIGHT = 32;

    /**
     * Show the plugin home page.
     */
    public function home()
    {
        return view('cape-api::index');
    }

    /**
     * Serve the user's cape image.
     */
    public function serveCape($userId)
    {
        $capeFile = public_path('storage/capes/' . $userId . '.png');

        if (!file_exists($capeFile)) {
            abort(404);
        }

        return response()->file($capeFile, [
            'Content-Type' => 'image/png',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0'
        ]);
    }

    /**
     * Show the cape management page.
     */
    public function show()
    {
        $user = auth()->user();
        $hasCape = file_exists(public_path('storage/capes/' . $user->id . '.png'));

        return view('cape-api::profile.cape', [
            'hasCape' => $hasCape,
            'width' => setting('cape-api.width', self::DEFAULT_WIDTH),
            'height' => setting('cape-api.height', self::DEFAULT_HEIGHT)
        ]);
    }

    /**
     * Upload a new cape for the user.
     */
    public function upload(Request $request)
    {
        $width = (int) setting('cape-api.width', self::DEFAULT_WIDTH);
        $height = (int) setting('cape-api.height', self::DEFAULT_HEIGHT);

        if (!$request->hasFile('cape')) {
            return $request->ajax() 
                ? response()->json(['success' => false, 'message' => trans('cape-api::messages.profile.upload.invalid')])
                : redirect()->back()->withErrors(['cape' => trans('cape-api::messages.profile.upload.invalid')]);
        }

        $file = $request->file('cape');

        if (!$file->isValid()) {
            return $request->ajax()
                ? response()->json(['success' => false, 'message' => trans('cape-api::messages.profile.upload.invalid')])
                : redirect()->back()->withErrors(['cape' => trans('cape-api::messages.profile.upload.invalid')]);
        }

        // Validate file type and size
        $request->validate([
            'cape' => ['required', 'file', 'mimes:png', 'max:2048']
        ]);

        try {
            // Get the temporary path
            $tempPath = $file->getPathname();
            
            // Verify the file exists and is readable
            if (!file_exists($tempPath) || !is_readable($tempPath)) {
                throw new \Exception('Uploaded file is not accessible');
            }

            // Check image dimensions
            $imageInfo = getimagesize($tempPath);
            if ($imageInfo === false || $imageInfo[0] !== $width || $imageInfo[1] !== $height) {
                $message = trans('cape-api::messages.profile.upload.dimensions', [
                    'width' => $width,
                    'height' => $height
                ]);
                return $request->ajax()
                    ? response()->json(['success' => false, 'message' => $message])
                    : redirect()->back()->withErrors(['cape' => $message]);
            }

            // Manually copy the file to the storage location
            $storagePath = storage_path('app/public/capes');
            $fileName = Auth::id() . '.png';
            
            // Ensure the directory exists
            if (!is_dir($storagePath)) {
                mkdir($storagePath, 0755, true);
            }

            // Move the uploaded file
            $fullPath = $storagePath . '/' . $fileName;
            if (!move_uploaded_file($tempPath, $fullPath)) {
                throw new \Exception('Failed to move uploaded file');
            }

            // Verify the file was moved successfully
            if (!file_exists($fullPath)) {
                throw new \Exception('File was not saved successfully');
            }

            $message = trans('cape-api::messages.profile.upload.success');
            return $request->ajax()
                ? response()->json(['success' => true, 'message' => $message])
                : redirect()->back()->with('success', $message);

        } catch (\Exception $e) {
            Log::error('Cape upload failed', [
                'error' => $e->getMessage(),
                'user' => Auth::id(),
                'temp_path' => $tempPath ?? 'N/A'
            ]);

            $message = trans('cape-api::messages.profile.upload.error');
            return $request->ajax()
                ? response()->json(['success' => false, 'message' => $message])
                : redirect()->back()->withErrors(['cape' => $message]);
        }
    }

    /**
     * Delete the user's cape.
     */
    public function delete()
    {
        $user = auth()->user();
        
        // Delete the cape if it exists
        if (Storage::exists('public/capes/' . $user->id . '.png')) {
            Storage::delete('public/capes/' . $user->id . '.png');
            return redirect()->route('cape-api.profile.cape')
                ->with('success', trans('cape-api::messages.profile.delete.success'));
        }

        return redirect()->route('cape-api.profile.cape')
            ->with('error', trans('cape-api::messages.profile.delete.error'));
    }
}
