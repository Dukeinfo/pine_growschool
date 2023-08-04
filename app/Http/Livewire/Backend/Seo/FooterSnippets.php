<?php

namespace App\Http\Livewire\Backend\Seo;

use Livewire\Component;
use App\Models\Footersnippets as appFootersnippets;

class FooterSnippets extends Component
{

	public $desc,$sort_id, $status;

    protected $rules = [
        'desc' => 'required', 
        'sort_id' => 'required', 
        'status' => 'required', 
      ];
      protected $messages = [
          'desc.required' => 'Description Required.',
          'sort_id.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];

       private function resetInputFields(){
        $this->desc = '';
        $this->sort_id = '';
        $this->status = '';
      
    }

      public function addFootersnippets(){


      $validatedData = $this->validate();
    	
      $footersnippets = new appFootersnippets();
      $footersnippets->description = $this->desc;
      $footersnippets->sort_id =$this->sort_id;
      $footersnippets->status = $this->status;
      $footersnippets->save();

      $this->resetInputFields(); 

      $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
          $this->emit('formSubmitted');
    }

   public function delete($id){

      $footersnippets = appFootersnippets::findOrFail($id);
      if(!is_null($footersnippets)){
        $footersnippets->delete();
      }

     }
    
    public function render()
    {
      $this->records = appFootersnippets::orderBy('sort_id','asc')->get();
        return view('livewire.backend.seo.footer-snippets')->layout('layouts.backend');
    }
}
