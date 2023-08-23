<?php

namespace App\Http\Livewire\Backend\Rollofhonour;

use Livewire\Component;
use App\Models\CategoryHonour;

class EditCategory extends Component
{

     public $categoryId,$name,$sort,$status;

     public function mount($id){
        $catgory = CategoryHonour::findOrFail($id);
        $this->categoryId = $catgory->id;
        $this->name = $catgory->name;
        $this->sort = $catgory->sort_id;
    	$this->status = $catgory->status;
     }

    public function editCategory(){

           $category = CategoryHonour::find($this->categoryId);
            $category->name = $this->name;
            $category->slug =  strtolower(str_replace(' ', '-',$this->name));
            $category->sort_id =$this->sort;
            $category->status = $this->status;
            $category->save();
            return redirect()->route('add_category'); 	
    
    }  

    public function render()
    {
        return view('livewire.backend.rollofhonour.edit-category')->layout('layouts.backend');
    }
}
