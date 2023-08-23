<?php

namespace App\Http\Livewire\Backend\Rollofhonour;

use Livewire\Component;
use App\Models\CategoryHonour;
use App\Models\SubCategoryHonour;

class EditSubCategory extends Component
{

   public $subcategoryId,$category_id ,$name,$sort_id,$status;

     public function mount($id){
        $subcatgory = SubCategoryHonour::findOrFail($id);
        $this->subcategoryId = $subcatgory->id;
        $this->category_id = $subcatgory->category_honour_id;
        $this->name = $subcatgory->name;
        $this->sort_id = $subcatgory->sort_id;
    	$this->status = $subcatgory->status;
     }

      public function editSubCategory(){

      $subcategories =SubCategoryHonour::find($this->subcategoryId);
      $subcategories->category_honour_id = $this->category_id ?? NULL;
      $subcategories->name = $this->name ?? NULL;
      $subcategories->sort_id =$this->sort_id ?? NULL;
      $subcategories->status = $this->status ?? NULL;
      $subcategories->save();
      
       return redirect()->route('add_sub_category'); 	
    
    }    

    public function render()
    {
    		$this->categories=CategoryHonour::get();
        return view('livewire.backend.rollofhonour.edit-sub-category')->layout('layouts.backend');
    }
}
