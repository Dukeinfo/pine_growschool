<?php

namespace App\Http\Livewire\Backend\Facilities;

use Livewire\Component;
use App\Models\Facilities;

class TrashFacilities extends Component
{
    public function render()
    {
    	 $this->records = Facilities::onlyTrashed()->orderBy('sort_id','asc')->get();	
        return view('livewire.backend.facilities.trash-facilities')->layout('layouts.backend');
    }

      public function restore($id){
      $facilities = Facilities::withTrashed()->findOrFail($id);
      if(!is_null($facilities)){
        $facilities->restore();
      }

       return redirect()->route('view_facilities');
    }
}
