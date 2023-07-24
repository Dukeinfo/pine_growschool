<?php

namespace App\Http\Livewire\Backend\Slider;

use Livewire\Component;
use App\Models\Slider;

class TrashHomeSlider extends Component
{
	public $records;

    public function render()
    {
    	$this->records = Slider::onlyTrashed()->orderBy('sort_id','asc')->get();
        return view('livewire.backend.slider.trash-home-slider')->layout('layouts.backend');
    }

    public function restore($id){
      $slider = Slider::withTrashed()->findOrFail($id);
      if(!is_null($slider)){
        $slider->restore();
      }

       return redirect()->route('view_home_slider');
    }
}
