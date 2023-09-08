<?php

namespace App\Http\Livewire\Backend\Faq;

use Livewire\Component;
use App\Models\FaqCategory;

class EditFaqsCategory extends Component
{
   public $editId,$name,$sort_id,$status ,$records; 

    public $seo_title ;
    public $seo_keywords ;
    public $seo_description ;

    public function mount($id)
     {
        $faqCategory = FaqCategory::findOrFail($id);
        $this->editId = $faqCategory->id;
        $this->name = $faqCategory->name;
        $this->sort_id = $faqCategory->sort_id;
        $this->status = $faqCategory->status;
        $this->seo_title  =  $faqCategory->seo_title;
        $this->seo_keywords =  $faqCategory->seo_keywords;
        $this->seo_description  =  $faqCategory->seo_description;
     }

    public function addCategory()
    {

      $faqCategory =FaqCategory::find($this->editId);
      $faqCategory->name = $this->name;
      $faqCategory->slug =  strtolower(str_replace(' ', '-',$this->name)) ?? NULL;
      $faqCategory->seo_title = $this->seo_title ?? Null;
      $faqCategory->seo_keywords = $this->seo_keywords ?? Null;
      $faqCategory->seo_description = $this->seo_description ?? Null;
      $faqCategory->sort_id =$this->sort_id;

      $faqCategory->status = $this->status;
      $faqCategory->save();

      return redirect()->route('faqs_category'); 

      
    } 



    public function render()
    {
        return view('livewire.backend.faq.edit-faqs-category')->layout('layouts.backend');
    }
}
