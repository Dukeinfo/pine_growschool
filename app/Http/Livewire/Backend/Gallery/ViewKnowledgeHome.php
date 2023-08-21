<?php

namespace App\Http\Livewire\Backend\Gallery;

use Livewire\Component;
use App\Models\KnowledgeHome;

class ViewKnowledgeHome extends Component
{

    public $logo,$title,$desc,$link,$sort_id,$status;

    protected $rules = [
        'logo' => 'required', 
        'title' => 'required', 
        'sort_id' => 'required| unique:knowledge_homes,sort_id', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'logo.required' => 'Logo Required.',
          'title.required' => 'Title Required.',
          'desc.required' => 'Description Required.',
          'sort_id.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->logo = '';
        $this->title = '';
        $this->desc = '';
        $this->link = '';
        $this->sort_id = '';
        $this->status = '';
    }

   public function addKnowledgeHome()
    {

      $validatedData = $this->validate();

      $knowledgeHome = new KnowledgeHome();
      $knowledgeHome->logo = $this->logo;
      $knowledgeHome->title = $this->title;
      $knowledgeHome->description = $this->desc;
      $knowledgeHome->link = $this->link;
      $knowledgeHome->sort_id =$this->sort_id;
      $knowledgeHome->status = $this->status;
      $knowledgeHome->save();

      $this->resetInputFields(); 

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
          $this->emit('formSubmitted');
    } 

    public function delete($id){

      $knowledgeHome = KnowledgeHome::findOrFail($id);
      if(!is_null($knowledgeHome)){
        $knowledgeHome->delete();
      }

     }


    public function render()
    {
    	$this->records = KnowledgeHome::orderBy('sort_id','asc')->get();
        return view('livewire.backend.gallery.view-knowledge-home')->layout('layouts.backend');
    }
}
