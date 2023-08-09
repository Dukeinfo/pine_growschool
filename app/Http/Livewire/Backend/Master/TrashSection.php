<?php

namespace App\Http\Livewire\Backend\Master;

use Livewire\Component;
use App\Models\SectionMaster;

class TrashSection extends Component
{
    public function render()
    {
    	$this->records = SectionMaster::onlyTrashed()->orderBy('sort_id','asc')->get();
        return view('livewire.backend.master.trash-section')->layout('layouts.backend');
    }

     public function restore($id){
      $section = SectionMaster::withTrashed()->findOrFail($id);
      if(!is_null($section)){
        $section->restore();
      }

       return redirect()->route('view_section');
    }
}
