<?php

namespace App\Http\Livewire\Backend\Gallery;

use Livewire\Component;
use App\Models\Categories;
use App\Models\Gallery;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class EditGallery extends Component
{
    use WithFileUploads;

    public $galleryId,$category_id, $name, $image,$editimage,$sort,$status;

     public function mount($id){
        $gallery = Gallery::findOrFail($id);
        $this->galleryId = $gallery->id;
        $this->category_id = $gallery->category_id;
        $this->image = $gallery->image;
        $this->thumbnail = $gallery->thumbnail;
        $this->sort = $gallery->sort_id;
    	$this->status = $gallery->status;
     }


     public function editGallery(){

      if(!is_null($this->editimage)){
           
              // Generate a unique name for the image
        $imageName =  uniqid() . '.' . $this->editimage->getClientOriginalExtension();

        // Get the path where you want to save the image and thumbnail
        $directory = public_path('uploads/thumbnail');

        // Check if the directory exists, if not, create it
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true, true);
        }
        // Save the original image to the specified directory
        $this->editimage->storeAs('uploads', $imageName, 'public');
        // Generate a thumbnail and save it to the specified directory
        $thumbnailName = 'thumb_' . $imageName;
        Image::make($this->editimage)->fit(200, 200)->save($directory . '/' . $thumbnailName);
            

            $gallery = Gallery::find($this->galleryId);
            $gallery->category_id =$this->category_id ?? NULL;
            $gallery->image =$imageName ?? NULL;
            $gallery->thumbnail =   $thumbnailName ?? NULL;
            $gallery->sort_id =$this->sort;
            $gallery->status = $this->status;
            $gallery->save();
            return redirect()->route('manage_gallery'); 
 
        }
        else{
            $gallery = Gallery::find($this->galleryId);
            $gallery->category_id =$this->category_id ?? NULL;
            $gallery->sort_id =$this->sort;
            $gallery->status = $this->status;
            $gallery->save();
            return redirect()->route('manage_gallery'); 
        }
        
     }


    public function render()
    {
        $this->categories = Categories::get();
        return view('livewire.backend.gallery.edit-gallery')->layout('layouts.backend');
    }
}
