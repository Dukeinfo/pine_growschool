<?php

namespace App\Http\Livewire\Backend\Slider;

use Livewire\Component;
use App\Models\Slider;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Type\NullType;
use Intervention\Image\Facades\Image;
class ViewHomeSlider extends Component
{
   use WithFileUploads;
   use UploadTrait;
    public $alt_tag, $image,$heading,$subheading,$sort,$status;
    public $records ,$thumbnail;

     protected $rules = [
        // 'alt_tab' => 'required', 
        'image.*' => 'required', 
        // 'heading' => 'required', 
        // 'subheading' => 'required', 
        'sort' => 'required', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          // 'alt_tag.required' => 'Alt Tab Required.',
          'image.required' => 'Images Required.',
          'heading.required' => 'Heading Required.',
          'subheading.required' => 'Sub heading Required.',
          'sort.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->alt_tag = '';
        $this->image = '';
        $this->heading = '';
        $this->subheading = '';
        $this->sort = '';
        $this->status = '';
    }

   public function addSlider(){
    $validatedData = $this->validate();
    if(!is_null($this->image ) && $this->image > 1){
  
        $folder = '/uploads/slider';
      foreach ($this->image as $img) {
        // Define folder path
        $uploadedData = $this->uploadOne($img, $folder);

 
      $slider = new Slider();
      $slider->alt_tag = $this->alt_tag ?? NULL;
      $slider->slug =  strtolower(str_replace(' ', '-',$this->heading))?? Null;
      $slider->image = $uploadedData['file_name']?? NULL;
      $slider->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;

      $slider->heading = $this->heading ?? NULL;
      $slider->subheading = $this->subheading ?? NULL;
      $slider->sort_id =$this->sort ?? NULL;
      $slider->status = $this->status ?? NULL;
      $slider->save();

    }

    $this->resetInputFields(); 
    $this->dispatchBrowserEvent('swal:modal', [
             'type' => 'success',  
             'message' => 'Successfully save!', 
         ]); 
        return redirect()->back();
  
    }  


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
