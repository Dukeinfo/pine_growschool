<?php

namespace App\Http\Livewire\Backend\Gallery;

use Livewire\Component;
use App\Models\KnowledgeHome;

class TrashKnowledgeHome extends Component
{
    public function render()
    {
    	$this->records = KnowledgeHome::onlyTrashed()->orderBy('sort_id','asc')->get();
        return view('livewire.backend.gallery.trash-knowledge-home')->layout('layouts.backend');
    }

    public function restore($id){
      $knowledgeHome = KnowledgeHome::withTrashed()->findOrFail($id);
      if(!is_null($knowledgeHome)){
        $knowledgeHome->restore();
      }

       return redirect()->route('view_knowledge_home');
    }
}
