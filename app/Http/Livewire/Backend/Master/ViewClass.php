<?php

namespace App\Http\Livewire\Backend\Master;

use Livewire\Component;
use App\Models\ClassMaster;
use Illuminate\Support\Facades\Auth;

class ViewClass extends Component
{

	public $classname,$sort_id,$status,$clientIp; 

	protected $rules = [
        'classname' => 'required', 
        'sort_id' => 'required', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'classname.required' => 'Class Name Required.',
          'sort_id.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->classname = '';
        $this->sort_id = '';
        $this->status = '';
    }


     public function addClass()
    {

      $validatedData = $this->validate();

      $classMaster = new ClassMaster();
      $classMaster->classname = $this->classname;
      $classMaster->sort_id =$this->sort_id;
      $classMaster->status = $this->status;
      $classMaster->login =  Auth::user()->id;
      $classMaster->ip_address =  $this->clientIp;
      $classMaster->save();

      $this->resetInputFields(); 

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
    } 

    public function delete($id){

      $classname = ClassMaster::findOrFail($id);
      if(!is_null($classname)){
        $classname->delete();
      }

     }

    public function render()
    {
    	$this->records = ClassMaster::orderBy('sort_id','asc')->get();	 
        return view('livewire.backend.master.view-class')->layout('layouts.backend');
    }
}
