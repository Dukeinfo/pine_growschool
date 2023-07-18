<?php

namespace App\Http\Livewire\Backend\Slider;

use Livewire\Component;
use App\Models\Slider;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditHomeSlider extends Component
{

use WithFileUploads;

    public $sliderId,$name,$sort,$image, $editimage, $status;

     public function mount($id){
        $slider = Slider::findOrFail($id);
        $this->sliderId = $slider->id;
        $this->name = $slider->name;
        $this->image = $slider->image;
        $this->sort = $slider->sort_id;
    	$this->status = $slider->status;
     }


     public function editSlider() {
        if(!is_null($this->editimage)){

            if(isset($this->image)){
                $imagePath1 = Storage::path('public/uploads/'. $this->image);
              
                        if(File::exists($imagePath1)){
                            // dd($imagePath);
                            unlink($imagePath1);
                        }
                }
            $fileName = time().'_'.$this->editimage->getClientOriginalName();
            $filePath = $this->editimage->storeAs('uploads', $fileName, 'public');

            $slider = Slider::find($this->sliderId);
            $slider->name = $this->name;
            $slider->slug =  strtolower(str_replace(' ', '-',$this->name));
            $slider->image = $fileName;
            $slider->sort_id =$this->sort;
            $slider->status = $this->status;
            $slider->save();
            return redirect()->route('view_home_slider'); 
 
        }
        else{
            $slider = Slider::find($this->sliderId);
            $slider->name = $this->name;
            $slider->slug =  strtolower(str_replace(' ', '-',$this->name));
            $slider->sort_id =$this->sort;
            $slider->status = $this->status;
            $slider->save();
            return redirect()->route('view_home_slider'); 
        }
        

     }



    public function render(){

    	
        return view('livewire.backend.slider.edit-home-slider')->layout('layouts.backend');
    }
}
