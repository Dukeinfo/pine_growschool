<?php

namespace App\Http\Livewire\Backend\Master;

use Livewire\Component;
use App\Models\FaqCategory;

class AddFaqsCategory extends Component
{

   public $name,$sort_id,$status ,$records; 

	protected $rules = [
        'name' => 'required', 
        'sort_id' => 'required| unique:faq_categories,sort_id', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'name.required' => 'Category name Required.',
          'sort_id.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->name = '';
        $this->sort_id = '';
        $this->status = '';
    }


     public function addCategory()
    {

      $validatedData = $this->validate();

      $faqCategory = new FaqCategory();
      $faqCategory->name = $this->name;
      $faqCategory->sort_id =$this->sort_id;
      $faqCategory->status = $this->status;
      $faqCategory->save();

      $this->resetInputFields(); 

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
    } 

    public function delete($id){

      $faqCategory = FaqCategory::findOrFail($id);
      if(!is_null($faqCategory)){
        $faqCategory->delete();
      }

     }


    public function render()
    {
    	$this->records = FaqCategory::orderBy('sort_id','asc')->get();
        return view('livewire.backend.master.add-faqs-category')->layout('layouts.backend');
    }
}
