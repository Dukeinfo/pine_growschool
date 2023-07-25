<?php

namespace App\Http\Livewire\Backend\Testimonials;

use Livewire\Component;
use App\Models\Testimonials;

class TrashTestimonials extends Component
{
	public $records;
    public function render()
    {
    	$this->records = Testimonials::onlyTrashed()->orderBy('sort_id','asc')->get();
        return view('livewire.backend.testimonials.trash-testimonials')->layout('layouts.backend');
    }

    public function restore($id){
      $testimonials = Testimonials::withTrashed()->findOrFail($id);
      if(!is_null($testimonials)){
        $testimonials->restore();
      }

       return redirect()->route('view_testimonials');
    }
}
