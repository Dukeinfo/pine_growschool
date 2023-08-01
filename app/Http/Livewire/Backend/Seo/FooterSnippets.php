<?php

namespace App\Http\Livewire\Backend\Seo;

use Livewire\Component;
use App\Models\Footersnippets as appFootersnippets;

class FooterSnippets extends Component
{

	public $desc;

    protected $rules = [
        'desc' => 'required', 
      
      ];
      protected $messages = [
          'desc.required' => 'Description Required.',
      ];

       private function resetInputFields(){
        $this->desc = '';
      
    }

      public function addFootersnippets(){


      $validatedData = $this->validate();
    	
      $footersnippets = new appFootersnippets();
      $footersnippets->description = $this->desc;
      $footersnippets->save();

      $this->resetInputFields(); 

      $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
          $this->emit('formSubmitted');
    }

    public function render()
    {
        return view('livewire.backend.seo.footer-snippets')->layout('layouts.backend');
    }
}
