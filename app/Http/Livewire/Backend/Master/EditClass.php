<?php

namespace App\Http\Livewire\Backend\Master;

use Livewire\Component;
use App\Models\ClassMaster;
use Illuminate\Support\Facades\Auth;

class EditClass extends Component
{
    public $classId,$classname,$sort_id,$status,$clientIp; 

      public function mount($id)
     {
        $classMaster = ClassMaster::findOrFail($id);
        $this->classId = $classMaster->id;
        $this->classname = $classMaster->classname;
    	$this->sort_id = $classMaster->sort_id;
    	$this->status = $classMaster->status;
     }

     public function editClass(){

      $classMaster =ClassMaster::find($this->classId);
      $classMaster->classname = $this->classname;
      $classMaster->sort_id =$this->sort_id;
      $classMaster->status = $this->status;
      $classMaster->login =  Auth::user()->id;
      $classMaster->ip_address =  $this->clientIp;
      $classMaster->save();

      return redirect()->route('view_class'); 
     }

    public function render()
    {
        return view('livewire.backend.master.edit-class')->layout('layouts.backend');
    }
}
