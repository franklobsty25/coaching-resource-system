<?php

namespace App;

use Illuminate\Support\Facades\Crypt;

trait Util
{
    public static function encrypt($id): string
    {
        return Crypt::encryptString($id);
    }

    public static function decrypt(string $id): string
    {
        return Crypt::decryptString($id);
    }

    public static function uploadSingleFile($file, $directory = 'uploads'): string
    {
        if (env('APP_ENV') === 'production') {
            return 'storage/app/public/' . $file->store(path: $directory);
        } else {
            return 'storage/' . $file->store(path: $directory);
        }
    }

    public static function uploadMultipleFiles($files, $directory = 'uploads'): string
    {
        $paths = [];
        foreach ($files as $file) {
            if (env('APP_ENV') === 'production') {
                $paths[] = 'storage/app/public/' . $file->store(path: $directory);
            } else {
                $paths[] = 'storage/' . $file->store(path: $directory);
            }
        }

        return implode('|', $paths);
    }
}
