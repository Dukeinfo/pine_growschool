<?php

namespace App\Http\Livewire\Backend\Department;

use Livewire\Component;
use App\Models\Department;

class TrashDepartment extends Component
{
    public function render()
    {
    	$this->records = Department::onlyTrashed()->orderBy('sort_id','asc')->get();
        return view('livewire.backend.department.trash-department')->layout('layouts.backend');
    }

     public function restore($id){
      $department = Department::withTrashed()->findOrFail($id);
      if(!is_null($department)){
        $department->restore();
      }

       return redirect()->route('view_department');
    }
}
