<?php

namespace App\Http\Traits;


trait FileUpload
{
    public function uploadImage($file, $filename, $folder)
    {
        $file->move(public_path($folder), $filename);

        return $filename;
    }

    public function removeImage($file, $folder)
    {
        $path = public_path($folder . '/' . $file);
        if (file_exists($path)) {
            unlink($path);
        }
    }
}
