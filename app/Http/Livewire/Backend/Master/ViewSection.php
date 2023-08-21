<?php

namespace App\Http\Livewire\Backend\Master;

use Livewire\Component;
use App\Models\SectionMaster;
use Illuminate\Support\Facades\Auth;

class ViewSection extends Component
{

   public $name,$sort_id,$status,$clientIp; 

    protected $rules = [
        'name' => 'required', 
        'sort_id' => 'required| unique:section_masters,sort_id', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'name.required' => 'Section Required.',
          'sort_id.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->name = '';
        $this->sort_id = '';
        $this->status = '';
    }

     public function addSection()
    {

      $validatedData = $this->validate();

      $sectionMaster = new SectionMaster();
      $sectionMaster->name = $this->name;
      $sectionMaster->sort_id =$this->sort_id;
      $sectionMaster->status = $this->status;
      $sectionMaster->login =  Auth::user()->id;
      $sectionMaster->ip_address =  $this->clientIp;
      $sectionMaster->save();

      $this->resetInputFields(); 

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
    } 

    public function delete($id){

      $section = SectionMaster::findOrFail($id);
      if(!is_null($section)){
        $section->delete();
      }

     }

    public function render()
    {
    	$this->records = SectionMaster::orderBy('sort_id','asc')->get();	
        return view('livewire.backend.master.view-section')->layout('layouts.backend');
    }
}
