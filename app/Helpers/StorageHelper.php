<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class StorageHelper
{
    /**
     * Get URL for storage file with environment awareness
     * In production: uses Storage::url() which doesn't require symlink
     * In development: uses asset('storage/' . path) which uses symlink
     */
    public static function url($path)
    {
        if (!$path) {
            return null;
        }

        // Always use /storage/ prefix which works in both dev and production
        // In production, storage:link should be created, or the files served from /storage
        return '/storage/' . $path;
    }
}
