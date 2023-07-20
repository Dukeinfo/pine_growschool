<?php

namespace App\Http\Livewire\Backend\Slider;

use Livewire\Component;
use App\Models\Slider;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Type\NullType;

class ViewHomeSlider extends Component
{
   use WithFileUploads;

    public $name, $image,$heading,$subheading,$sort,$status;
    public $records;

     protected $rules = [
        'name' => 'required', 
        'image' => 'required', 
        'heading' => 'required', 
        'subheading' => 'required', 
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
     $fileName = time().'_'.$this->image->getClientOriginalName();
     $filePath = $this->image->storeAs('uploads', $fileName, 'public');
    
      $slider = new Slider();
      $slider->name = $this->name;
      $slider->slug =  strtolower(str_replace(' ', '-',$this->name))?? Null;
      $slider->image = $fileName;
      $slider->heading = $this->heading;
      $slider->subheading = $this->subheading;
      $slider->sort_id =$this->sort;
      $slider->status = $this->status;
      $slider->save();

      $this->resetInputFields(); 

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 

      }  


   }

    public function delete($id){
        $slider = Slider::findOrFail($id);
        if(isset($slider->image)){
            $imagePath1 = Storage::path('public/uploads/'. $slider->image);
                 if(File::exists($imagePath1)){
                    unlink($imagePath1);
                }
            }
       Slider::destroy($id);

     }
    public function render()
    {
       $this->records=Slider::orderBy('sort_id' ,'asc')->get();

        return view('livewire.backend.slider.view-home-slider')->layout('layouts.backend');
    }
}
