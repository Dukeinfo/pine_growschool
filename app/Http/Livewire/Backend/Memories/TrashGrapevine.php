<?php

namespace App\Http\Livewire\Backend\Memories;

use Livewire\Component;
use App\Models\Grepevine;

class TrashGrapevine extends Component
{
    public function render()
    {
    	$this->records = Grepevine::onlyTrashed()->orderBy('sort_id','asc')->get();
        return view('livewire.backend.memories.trash-grapevine')->layout('layouts.backend');
    }

     public function restore($id){
      $grepevine = Grepevine::withTrashed()->findOrFail($id);
      if(!is_null($grepevine)){
        $grepevine->restore();
      }

       return redirect()->route('view_grapevine');
    }

    
}
