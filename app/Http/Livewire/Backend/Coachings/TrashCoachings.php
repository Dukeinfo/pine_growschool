<?php

namespace App\Http\Livewire\Backend\Coachings;

use Livewire\Component;
use App\Models\Coachings;

class TrashCoachings extends Component
{
    public function render()
    {
    	$this->records = Coachings::onlyTrashed()->orderBy('sort_id','asc')->get();
        return view('livewire.backend.coachings.trash-coachings')->layout('layouts.backend');
    }

    public function restore($id){
      $coachings = Coachings::withTrashed()->findOrFail($id);
      if(!is_null($coachings)){
        $coachings->restore();
      }

       return redirect()->route('view_coachings');
    }
}
