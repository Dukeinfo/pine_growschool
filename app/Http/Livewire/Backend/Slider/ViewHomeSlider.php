<?php

namespace App\Http\Livewire\Backend\Slider;

use Livewire\Component;
use App\Models\Slider;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ViewHomeSlider extends Component
{
   use WithFileUploads;

    public $name, $image,$sort,$status;
    public $records;

     protected $rules = [
        'name' => 'required', 
        'image' => 'required', 
        'sort' => 'required', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'name.required' => 'Name Required.',
          'image.required' => 'Image Required.',
          'sort.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->name = '';
        $this->image = '';
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
      $slider->image = $fileName;
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

       Slider::destroy($id);

     }
    public function render()
    {
       $this->records=Slider::get();

        return view('livewire.backend.slider.view-home-slider')->layout('layouts.backend');
    }
}
