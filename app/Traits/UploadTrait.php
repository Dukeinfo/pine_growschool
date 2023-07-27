<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image;
trait UploadTrait
{
    public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public')
    {
 
            // Generate a unique name for the image
            $file_name =  strtoupper(uniqid()) .'.'.$uploadedFile->getClientOriginalExtension();
            $file = $uploadedFile->storeAs($folder,$file_name, $disk);
            // Get the path where you want to save the image and thumbnail
            $directory = public_path('uploads/thumbnail');
   
            // Check if the directory exists, if not, create it
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0755, true, true);
            }

            // Generate a thumbnail and save it to the specified directory
            $thumbnailName = 'thumb_'.$file_name;
            Image::make($uploadedFile)->fit(100, 100)->save($directory.'/'.$thumbnailName);
            return ['file_name' => $file_name, 'thumbnail_name' => $thumbnailName];

          
         
    }
}