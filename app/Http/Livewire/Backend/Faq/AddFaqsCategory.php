<?php

namespace App\Http\Livewire\Backend\Faq;

use Livewire\Component;
use App\Models\FaqCategory;

class AddFaqsCategory extends Component
{

   public $name,$sort_id,$status ,$records; 
   public $seo_title ;
   public $seo_keywords ;
   public $seo_description  ;

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
        $this->seo_title  = '';
        $this->seo_keywords = '';
        $this->seo_description  = '';
    }


     public function addCategory()
    {

      $validatedData = $this->validate();

      $faqCategory = new FaqCategory();
      $faqCategory->name = $this->name;
      $faqCategory->sort_id =$this->sort_id;
      $faqCategory->slug =  strtolower(str_replace(' ', '-',$this->name)) ?? NULL;
      $faqCategory->seo_title = $this->seo_title ?? Null;
      $faqCategory->seo_keywords = $this->seo_keywords ?? Null;
      $faqCategory->seo_description = $this->seo_description ?? Null;
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
        return view('livewire.backend.faq.add-faqs-category')->layout('layouts.backend');
    }
}
