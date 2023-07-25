<?php

namespace App\Http\Livewire\Backend\Department;

use Livewire\Component;
use App\Models\Department;
use Illuminate\Http\Request;

class ViewDepartment extends Component
{

    public $name,$sort,$status ,$records;

    public function render()
    {
    	$this->records = Department::orderBy('sort_id','asc')->get();
        return view('livewire.backend.department.view-department')->layout('layouts.backend');
    }

    protected $rules = [
        'name' => 'required', 
        'sort' => 'required', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'name.required' => 'Name Required.',
          'sort.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->name = '';
        $this->sort = '';
        $this->status = '';
    }

    public function addDepartment()
    {
      $validatedData = $this->validate();

      $department = new Department();
      $department->name = $this->name;
      $department->sort_id =$this->sort;
      $department->status = $this->status;
      $department->save();

      $this->resetInputFields(); 

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
    } 

    public function delete($id){

      $department = Department::findOrFail($id);
      if(!is_null($department)){
        $department->delete();
      }

     }


}
