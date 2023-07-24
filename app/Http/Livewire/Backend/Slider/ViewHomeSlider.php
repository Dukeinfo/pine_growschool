<?php

namespace App\Http\Livewire\Backend\Slider;

use Livewire\Component;
use App\Models\Slider;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Type\NullType;
use Intervention\Image\Facades\Image;
class ViewHomeSlider extends Component
{
   use WithFileUploads;

    public $name, $image,$heading,$subheading,$sort,$status;
    public $records ,$thumbnail;

     protected $rules = [
        // 'name' => 'required', 
        'image' => 'required', 
        // 'heading' => 'required', 
        // 'subheading' => 'required', 
        'sort' => 'required', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'name.required' => 'Name Required.',
          'image.required' => 'Image Required.',
          'heading.required' => 'Heading Required.',
          'subheading.required' => 'Sub heading Required.',
          'sort.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->name = '';
        $this->image = '';
        $this->heading = '';
        $this->subheading = '';
        $this->sort = '';
        $this->status = '';
    }

   public function addSlider(){

    $validatedData = $this->validate();

    if(!is_null($this->image)){
        // Generate a unique name for the image
        $imageName =  uniqid() . '.' . $this->image->getClientOriginalExtension();

        // Get the path where you want to save the image and thumbnail
        $directory = public_path('uploads/thumbnail');

        // Check if the directory exists, if not, create it
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true, true);
        }

        // Save the original image to the specified directory
        $this->image->storeAs('uploads', $imageName, 'public');

        // Generate a thumbnail and save it to the specified directory
        $thumbnailName = 'thumb_' . $imageName;
        Image::make($this->image)->fit(200, 200)->save($directory . '/' . $thumbnailName);

        // Set the thumbnail property to the thumbnail image name
        // $this->thumbnail = $thumbnailName;
    }  

      $slider = new Slider();
      $slider->name = $this->name ?? NULL;
      $slider->slug =  strtolower(str_replace(' ', '-',$this->name))?? Null;
      $slider->image = $imageName ?? NULL;
      $slider->thumbnail = $thumbnailName ?? NULL;

      $slider->heading = $this->heading ?? NULL;
      $slider->subheading = $this->subheading ?? NULL;
      $slider->sort_id =$this->sort ?? NULL;
      $slider->status = $this->status ?? NULL;
      $slider->save();

      $this->resetInputFields(); 

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 


   }

    public function delete($id){
      $slider = Slider::findOrFail($id);
      if(!is_null($slider)){
        $slider->delete();
      }
      

     }
    public function render()
    {
       $this->records=Slider::orderBy('sort_id' ,'asc')->get();

        return view('livewire.backend.slider.view-home-slider')->layout('layouts.backend');
    }
}
