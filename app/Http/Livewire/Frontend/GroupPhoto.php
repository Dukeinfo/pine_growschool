<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\GroupPhoto as appGroupPhoto;

class GroupPhoto extends Component
{
   public $year,$image;

    public function render()
    {
      $this->years = appGroupPhoto::orderBy('sort_id','asc')->get();	
        return view('livewire.frontend.group-photo')->layout('layouts.frontend');
    }

     protected $rules = [ 
        'year' => 'required', 
      ];
      protected $messages = [
          'year.required' => 'Academic Year Required.',
          
      ];
    private function resetInputFields(){
        $this->year = '';   
    }

    public function search(){
    	$validatedData = $this->validate();
    	
    	$recordCount =appGroupPhoto::where('year', $this->year)->count();
    	if($recordCount >0){
    		 $this->image = appGroupPhoto::where('year', $this->year)->first();
    	}
    }

}
