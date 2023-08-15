<?php

namespace App\Http\Livewire\Backend\Seo;

use Livewire\Component;
use App\Models\Headersnippets as appHeadersnippets;

class HeaderSnippets extends Component
{
   public $category, $desc, $sort_id, $status , $records;

   protected $rules = [
        'category' => 'required', 
        'desc' => 'required', 
        'sort_id' => 'required', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'category.required' => 'Category Required.',
          'desc.required' => 'Description Required.',
          'sort_id.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->category = '';
        $this->desc = '';
        $this->sort_id = '';
        $this->status = '';
    }

    public function addHeaderSnippets(){

      $validatedData = $this->validate();

      $check = appHeadersnippets::where(['category'=> $this->category  ])->count();	

      if($check==1){

          $message=$this->category .' already exists'; 

      	  $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'error',  
              'message' => $message,
          ]); 
      } else{

      $headersnippets = new appHeadersnippets();
      $headersnippets->category = $this->category;
      $headersnippets->description = $this->desc;
      $headersnippets->sort_id =$this->sort_id;
      $headersnippets->status = $this->status;
      $headersnippets->save();

      $this->resetInputFields(); 

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
     }

    }

     public function delete($id){

      $headersnippets = appHeadersnippets::findOrFail($id);
      if(!is_null($headersnippets)){
        $headersnippets->delete();
      }

     }

    public function render()
    {
    	$this->records = appHeadersnippets::orderBy('sort_id','asc')->get();
        return view('livewire.backend.seo.header-snippets')->layout('layouts.backend');
    
    }
}
