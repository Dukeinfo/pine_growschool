<?php

namespace App\Http\Livewire\Backend\VirtualTour;

use Livewire\Component;
use App\Models\VirtualTour;

class EditVirtualTour extends Component
{
    public $editId,$link,$sort_id,$status; 

     public function mount($id)
     {
        $virtualTour = VirtualTour::findOrFail($id);
        $this->editId = $virtualTour->id;
        $this->link = $virtualTour->link;
    	$this->sort_id = $virtualTour->sort_id;
    	$this->status = $virtualTour->status;
     }

       public function editVirtualTour()
    {

      $virtualTour =VirtualTour::find($this->editId);
      $virtualTour->link = $this->link;
      $virtualTour->sort_id =$this->sort_id;
      $virtualTour->status = $this->status;
      $virtualTour->save();

     return redirect()->route('virtual_tour'); 

       
    } 

    public function render()
    {
        return view('livewire.backend.virtual-tour.edit-virtual-tour')->layout('layouts.backend');
    }
}
