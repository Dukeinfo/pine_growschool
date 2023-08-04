<?php

namespace App\Http\Livewire\Backend\Gallery;

use Livewire\Component;
use App\Models\KnowledgeHome;

class EditKnowledgeHome extends Component
{

   public $knowledgeId,$logo,$title,$desc,$link,$sort_id,$status;

    public function mount($id)
     {
        $knowledgeHome = KnowledgeHome::findOrFail($id);
        $this->knowledgeId = $knowledgeHome->id;
        $this->logo = $knowledgeHome->logo;
        $this->title = $knowledgeHome->title;
        $this->desc = $knowledgeHome->description;
        $this->link = $knowledgeHome->link;
    	$this->sort = $knowledgeHome->sort_id;
    	$this->status = $knowledgeHome->status;
     }

     public function editKnowledgeHome()
    {

      
      $knowledgeHome = KnowledgeHome::find($this->knowledgeId);
      $knowledgeHome->logo = $this->logo;
      $knowledgeHome->title = $this->title;
      $knowledgeHome->description = $this->desc;
      $knowledgeHome->link = $this->link;
      $knowledgeHome->sort_id =$this->sort_id;
      $knowledgeHome->status = $this->status;
      $knowledgeHome->save();

      return redirect()->route('view_knowledge_home'); 

    
    } 

    public function render()
    {
        return view('livewire.backend.gallery.edit-knowledge-home')->layout('layouts.backend');
    }
}
