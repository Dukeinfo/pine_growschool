<?php

namespace Database\Seeders;

use App\Models\Slider;
use App\Traits\UploadTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

use Illuminate\Http\UploadedFile;
class SliderSeeder extends Seeder
{
    use UploadTrait;

    public function run()
    {
        Slider::truncate();

        $imageDirectory = public_path('assets/images/slider');
        $imageFiles = File::allFiles($imageDirectory);
        $storageFolder = 'uploads/slider'; // Specify the storage folder

        $sliders = [];

        foreach ($imageFiles as $file) {
            $uploadedFile = new UploadedFile(
                $file->getPathname(),
                $file->getFilename(),
            );

            $uploadedData = $this->uploadOne($uploadedFile, $storageFolder);
            if ($uploadedData) {
                $sliders[] = [
                    'alt_tag' => 'test',
                    'slug' => 'test',
                    'image' => $uploadedData['file_name'],
                    'thumbnail' => $uploadedData['thumbnail_name'], // Assuming you extract the filename from the uploaded data
                    'status' => 'Active',
                ];
            }
        }

        foreach ($sliders as $sliderData) {
            Slider::create($sliderData);
        }
    }
}
