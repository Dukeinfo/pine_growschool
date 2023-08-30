<?php

namespace App\Http\Livewire\Backend\Master;

use Livewire\Component;
use App\Models\FaqCategory;

class EditFaqsCategory extends Component
{
   public $editId,$name,$sort_id,$status ,$records; 

    public function mount($id)
     {
        $faqCategory = FaqCategory::findOrFail($id);
        $this->editId = $faqCategory->id;
        $this->name = $faqCategory->name;
    	$this->sort_id = $faqCategory->sort_id;
    	$this->status = $faqCategory->status;
     }

    public function addCategory()
    {

      $faqCategory =FaqCategory::find($this->editId);
      $faqCategory->name = $this->name;
      $faqCategory->sort_id =$this->sort_id;
      $faqCategory->status = $this->status;
      $faqCategory->save();

      return redirect()->route('faqs_category'); 

      
    } 



    public function render()
    {
        return view('livewire.backend.master.edit-faqs-category')->layout('layouts.backend');
    }
}
