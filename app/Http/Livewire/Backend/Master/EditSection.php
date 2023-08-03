<?php

namespace App\Http\Livewire\Backend\Master;

use Livewire\Component;
use App\Models\SectionMaster;
use Illuminate\Support\Facades\Auth;

class EditSection extends Component
{

   public $sectionId,$name,$sort_id,$status,$clientIp; 

    public function mount($id)
     {
        $sectionMaster = SectionMaster::findOrFail($id);
        $this->sectionId = $sectionMaster->id;
        $this->name = $sectionMaster->name;
    	$this->sort_id = $sectionMaster->sort_id;
    	$this->status = $sectionMaster->status;
     }


     public function editSection(){

      $sectionMaster =SectionMaster::find($this->sectionId);
      $sectionMaster->name = $this->name;
      $sectionMaster->sort_id =$this->sort_id;
      $sectionMaster->status = $this->status;
      $sectionMaster->login =  Auth::user()->id;
      $sectionMaster->ip_address =  $this->clientIp;
      $sectionMaster->save();

      return redirect()->route('view_section'); 
     }
 

    public function render()
    {
        return view('livewire.backend.master.edit-section')->layout('layouts.backend');
    }
}
