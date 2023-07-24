<?php

namespace App\Http\Livewire\Backend\Testimonials;

use Livewire\Component;
use App\Models\Testimonials;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class EditTestimonials extends Component
{

    use WithFileUploads;

    public $testimoniaId,$name,$image,$editimage,$sort_id,$status,$desc;

    public function mount($id)
     {
        $testimonials = Testimonials::findOrFail($id);
        $this->testimoniaId = $testimonials->id;
        $this->name = $testimonials->name;
        $this->image = $testimonials->photo;
    	$this->sort_id = $testimonials->sort_id;
    	$this->status = $testimonials->status;
    	$this->desc = $testimonials->description;
     }

       public function editTestimonials() {
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
            
            $testimonials = Testimonials::find($this->testimoniaId);
            $testimonials->name = $this->name;
            $testimonials->slug =  strtolower(str_replace(' ', '-',$this->name));
            $testimonials->photo = $imageName ?? Null;
            $testimonials->thumbnail = $thumbnailName ?? Null;
            $testimonials->sort_id =$this->sort_id;
            $testimonials->status = $this->status;
            $testimonials->description = $this->desc;
            $testimonials->save();
            
            return redirect()->route('view_testimonials'); 
 
        }
        else{
            $testimonials = Testimonials::find($this->testimoniaId);
            $testimonials->name = $this->name;
            $testimonials->slug =  strtolower(str_replace(' ', '-',$this->name));
            $testimonials->sort_id =$this->sort_id;
            $testimonials->status = $this->status;
            $testimonials->description = $this->desc;
            $testimonials->save();

            return redirect()->route('view_testimonials'); 
        }
        

     }
 

    public function render()
    {
        return view('livewire.backend.testimonials.edit-testimonials')->layout('layouts.backend');
    }
}
