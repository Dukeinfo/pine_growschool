<?php

namespace App\Http\Livewire\Backend\Seo;

use Livewire\Component;
use App\Models\Headersnippets;

class EditHeaderSnippets extends Component
{
    public $headerId,$category, $desc, $sort_id, $status;

    public function mount($id){
        $headersnippets = Headersnippets::findOrFail($id);
        $this->headerId = $headersnippets->id;
        $this->category = $headersnippets->category;
        $this->desc = $headersnippets->description;
    	$this->sort_id = $headersnippets->sort_id;
    	$this->status = $headersnippets->status;
     }

     public function editHeaderSnippets(){

      $headersnippets = Headersnippets::find($this->headerId);
      $headersnippets->category = $this->category;
      $headersnippets->description = $this->desc;
      $headersnippets->sort_id =$this->sort_id;
      $headersnippets->status = $this->status;
      $headersnippets->save();

     return redirect()->route('manage_snippets'); 

    }


    public function render()
    {

        return view('livewire.backend.seo.edit-header-snippets')->layout('layouts.backend');
    }
}
