<?php

namespace App\Http\Livewire\Backend\Membership;

use Livewire\Component;
use App\Models\Memberships;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ViewMembership extends Component
{

    use WithFileUploads;

    public $name, $logo,$sort,$status;
    public $records;

     protected $rules = [
        'name' => 'required', 
        'logo' => 'required', 
        'sort' => 'required', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'name.required' => 'Name Required.',
          'logo.required' => 'Logo Required.',
          'sort.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->name = '';
        $this->logo = '';
        $this->sort = '';
        $this->status = '';
    }

   
   public function addMembership(){

    $validatedData = $this->validate();

    if(!is_null($this->logo)){
     $fileName = time().'_'.$this->logo->getClientOriginalName();
     $filePath = $this->logo->storeAs('uploads', $fileName, 'public');
    
      $slider = new Memberships();
      $slider->name = $this->name;
      $slider->logo = $fileName;
      $slider->sort_id =$this->sort;
      $slider->status = $this->status;
      $slider->save();

       $this->resetInputFields();

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 

      }  


   }

    public function delete($id){

       Memberships::destroy($id);

     }

    public function render()
    {
    	$this->records=Memberships::get();
    	
        return view('livewire.backend.membership.view-membership')->layout('layouts.backend');
    }
}
