<?php

namespace App\Http\Livewire\Backend\VirtualTour;

use Livewire\Component;
use App\Models\VirtualTour;

class ViewVirtualTour extends Component
{

  public $link,$sort_id,$status; 

	protected $rules = [
        'link' => 'required', 
        'sort_id' => 'required', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'link.required' => 'Youtube Video Link Required.',
          'sort_id.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->link = '';
        $this->sort_id = '';
        $this->status = '';
    }

     public function virtualTour()
    {

      $validatedData = $this->validate();

      $virtualTour = new VirtualTour();
      $virtualTour->link = $this->link;
      $virtualTour->sort_id =$this->sort_id;
      $virtualTour->status = $this->status;
      $virtualTour->save();

      $this->resetInputFields(); 

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
    } 

    public function delete($id){

      $virtualTour = VirtualTour::findOrFail($id);
      if(!is_null($virtualTour)){
        $virtualTour->delete();
      }

     }

    public function render()
    {
      $this->records = VirtualTour::orderBy('sort_id','asc')->get();  
        return view('livewire.backend.virtual-tour.view-virtual-tour')->layout('layouts.backend');
    }
}
