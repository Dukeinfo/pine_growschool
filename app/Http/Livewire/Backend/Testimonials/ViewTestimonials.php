<?php

namespace App\Http\Livewire\Backend\Testimonials;

use Livewire\Component;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ViewTestimonials extends Component
{
  
    use WithFileUploads;

    public $name,$image,$sort_id,$status,$desc;

    public function render()
    {
        return view('livewire.backend.testimonials.view-testimonials')->layout('layouts.backend');
    }

    protected $rules = [ 
        'name' => 'required', 
        'image' => 'required', 
        'sort_id' => 'required',
        'status' => 'required', 
        'desc' => 'required', 
     
      ];
      protected $messages = [
          'name.required' => 'Name Required.',
          'image.required' => 'Image Required.',
          'sort_id.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
          'desc.required' => 'Description Required.',
      ];
    private function resetInputFields(){
        $this->name = '';
        $this->image = '';
        $this->sort_id = '';
        $this->status = '';
        $this->desc = '';
    }


    public function viewTestimonials(){

    	$validatedData = $this->validate();

    	dd($this->desc);
    }
}
