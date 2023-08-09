<?php

namespace App\Http\Livewire\Backend\Gallery;

use Livewire\Component;
use App\Models\OurTopper;

class TrashOurTopper extends Component
{
    public function render()
    {
    	$this->records = OurTopper::onlyTrashed()->orderBy('sort_id','asc')->get();
        return view('livewire.backend.gallery.trash-our-topper')->layout('layouts.backend');
    }

    public function restore($id){
      $ourTopper = OurTopper::withTrashed()->findOrFail($id);
      if(!is_null($ourTopper)){
        $ourTopper->restore();
      }

       return redirect()->route('view_our_topper');
    }
}
