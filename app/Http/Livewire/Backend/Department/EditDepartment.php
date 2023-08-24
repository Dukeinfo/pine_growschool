<?php

namespace App\Http\Livewire\Backend\Department;

use Livewire\Component;
use App\Models\Department;

class EditDepartment extends Component
{

    public $departmentId,$name,$desc,$sort,$status ,$records;

    public function mount($id)
     {
        $department = Department::findOrFail($id);
        $this->departmentId = $department->id;
        $this->name = $department->name;
        // $this->desc = $department->description;
    	$this->sort = $department->sort_id;
    	$this->status = $department->status;
     }

    public function editDepartment()
    {
      
      $department =Department::find($this->departmentId);
      $department->name = $this->name;
    //   $department->description = $this->desc;
      $department->sort_id =$this->sort;
      $department->status = $this->status;
      $department->save();

      return redirect()->route('view_department'); 

    } 


  
    public function render()
    {
        return view('livewire.backend.department.edit-department')->layout('layouts.backend');
    }
}
