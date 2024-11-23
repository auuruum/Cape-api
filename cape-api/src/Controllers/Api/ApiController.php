<?php

namespace Azuriom\Plugin\CapeApi\Controllers\Api;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\User;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ApiController extends Controller
{
    /**
     * Show the plugin API default page.
     */
    public function index()
    {
        return response()->json('Hello World!');
    }

    /**
     * Retrieve a user's cape image.
     *
     * @param string $identifier User ID or username
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse|\Illuminate\Http\JsonResponse
     */
    public function getCape($identifier)
    {
        // Sanitize the identifier
        $identifier = trim($identifier);

        // Validate identifier format
        if (empty($identifier)) {
            return response()->json([
                'error' => 'Invalid identifier'
            ], 400);
        }

        // Try to find user by ID first
        $user = null;
        if (ctype_digit($identifier)) {
            $user = User::find($identifier);
        } 
        
        // If not found by ID, try by username
        if (!$user) {
            $user = User::where('name', $identifier)->first();
        }

        if (!$user) {
            return response()->json([
                'error' => 'User not found'
            ], 404);
        }

        $capeFile = public_path('storage/capes/' . $user->id . '.png');

        // Additional checks to prevent potential errors
        if (!$user->id || !file_exists($capeFile)) {
            return response()->json([
                'error' => 'Cape not found'
            ], 404);
        }

        // Ensure the file is readable
        if (!is_readable($capeFile)) {
            return response()->json([
                'error' => 'Cape file is not accessible'
            ], 403);
        }

        return response()->file($capeFile, [
            'Content-Type' => 'image/png'
        ]);
    }
}
