<?php

namespace App\Http\Livewire\Backend\Rollofhonour;

use Livewire\Component;
use App\Models\CategoryHonour;
use App\Models\SubCategoryHonour;

class SubCategory extends Component
{
    public $category_id ,$name,$sort_id,$status;
    public $records;

       protected $rules = [ 
        'category_id' => 'required', 
        'name' => 'required | unique:sub_category_honours,name', 
        'sort_id' => 'required| unique:sub_category_honours,sort_id',
        'status' => 'required', 
       
     
      ];
      protected $messages = [
          'category_id.required' => 'Menu Required.',
          'name.required' => 'Name Required.',
          'sort_id.required' => 'Sort Required.',
          'sort_id.unique' => 'Sort number already taken.',
          'status.required' => 'Status Required.',
          
      ];
    private function resetInputFields(){
        $this->name = '';
        $this->sort_id = '';
        $this->status = '';
    }

    public function addSubCategory(){
      $validatedData = $this->validate();

      $subcategories = new SubCategoryHonour();
      $subcategories->category_honour_id = $this->category_id ?? NULL;
      $subcategories->name = $this->name ?? NULL;
      $subcategories->sort_id =$this->sort_id ?? NULL;
      $subcategories->status = $this->status ?? NULL;
      $subcategories->save();

        $this->resetInputFields(); 
        $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 

    } 

       
   public function delete($id){

      $subCategoryHonour = SubCategoryHonour::findOrFail($id);
      if(!is_null($subCategoryHonour)){
        $subCategoryHonour->delete();
      }

     }  

    public function render()
    {
    	$this->categories=CategoryHonour::get();
    	$this->records=SubCategoryHonour::orderBy('sort_id' ,'asc')->get();

        return view('livewire.backend.rollofhonour.sub-category')->layout('layouts.backend');
    }
}
