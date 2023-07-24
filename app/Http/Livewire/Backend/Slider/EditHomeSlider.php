<?php

namespace App\Http\Livewire\Backend\Slider;

use Livewire\Component;
use App\Models\Slider;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
class EditHomeSlider extends Component
{

use WithFileUploads;

    public $sliderId,$name,$sort,$image,$heading,$subheading,$editimage, $status;

     public function mount($id){
        $slider = Slider::findOrFail($id);
        $this->sliderId = $slider->id;
        $this->name = $slider->name;
        $this->image = $slider->image;
        $this->thumbnail = $slider->thumbnail;
        $this->heading = $slider->heading;
        $this->subheading = $slider->subheading;
        $this->sort = $slider->sort_id;
    	$this->status = $slider->status;
     }


     public function editSlider() {
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

        // Set the thumbnail property to the thumbnail image name
        // $this->thumbnail = $thumbnailName;

            $slider = Slider::find($this->sliderId);
            $slider->name = $this->name ?? NULL;
            $slider->slug =  strtolower(str_replace(' ', '-',$this->name));
            $slider->image = $imageName ?? NULL;
            $slider->thumbnail = $thumbnailName ?? NULL;
            $slider->heading = $this->heading ?? NULL;
            $slider->subheading = $this->subheading ?? NULL;
            $slider->sort_id =$this->sort ?? NULL;
            $slider->status = $this->status ?? NULL;
            $slider->save();
            return redirect()->route('view_home_slider'); 
 
        }
        else{
            $slider = Slider::find($this->sliderId);
            $slider->name = $this->name;
            $slider->slug =  strtolower(str_replace(' ', '-',$this->name));
            $slider->sort_id =$this->sort;
            $slider->status = $this->status;
            $slider->heading = $this->heading;
            $slider->subheading = $this->subheading;
            $slider->save();
            return redirect()->route('view_home_slider'); 
        }
        

     }



    public function render(){

    	
        return view('livewire.backend.slider.edit-home-slider')->layout('layouts.backend');
    }
}
