<?php 

// app/Helpers/ImageHelper.php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image ;
use Illuminate\Support\Facades\Storage;

class ImageHelper
{
    public static function uploadAndGenerateThumbnail($image, $destinationDirectory)
    {
        if (!is_null($image)) {
            // Generate a unique name for the image
            $imageName = strtoupper(uniqid()) . '.' . $image->getClientOriginalExtension();

            // Check if the directory exists, if not, create it
            if (!File::exists($destinationDirectory)) {
                File::makeDirectory($destinationDirectory, 0755, true, true);
            }

            // Save the original image to the specified directory
            $image->storeAs($destinationDirectory, $imageName);

            // Generate a thumbnail and save it to the specified directory
            $thumbnailName = 'thumb_' . $imageName;
            Image::make($image)->fit(200, 200)->save($destinationDirectory . '/' . $thumbnailName);

            // Return the image and thumbnail names
            return ['image' => $imageName, 'thumbnail' => $thumbnailName];
        }

        return null;
    }
}
