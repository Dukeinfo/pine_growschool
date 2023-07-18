<?php

namespace App\Http\Livewire\Backend\Slider;

use Livewire\Component;
use App\Models\Slider;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditHomeSlider extends Component
{

use WithFileUploads;

    public $sliderId,$name,$sort,$image,$status;

     public function mount($id)
     {
        $slider = Slider::findOrFail($id);
        $this->sliderId = $slider->id;
        $this->name = $slider->name;
         $this->image = $slider->image;
    	$this->sort = $slider->sort_id;
    	$this->status = $slider->status;
     }


     public function editSlider() {
        
         $slider = Slider::find($this->sliderId);
        $slider->name = $this->name;
        $slider->sort_id =$this->sort;
        $slider->status = $this->status;
        $slider->save();
        

     
        return redirect()->to('/admin/view/slider'); 
 

     }



    public function render()
    {

    	
        return view('livewire.backend.slider.edit-home-slider')->layout('layouts.backend');
    }
}
