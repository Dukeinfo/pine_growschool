<?php

namespace App\Http\Livewire\Backend\Staff;

use Livewire\Component;
use App\Models\Staff;

class TrashStaff extends Component
{
    public function render()
    {
    	 $this->records=Staff::onlyTrashed()->orderBy('sort_id' ,'asc')->get();
        return view('livewire.backend.staff.trash-staff')->layout('layouts.backend');
    }

    public function restore($id){
      $staff = Staff::withTrashed()->findOrFail($id);
      if(!is_null($staff)){
        $staff->restore();
      }

       return redirect()->route('view_staff');
    }
}
