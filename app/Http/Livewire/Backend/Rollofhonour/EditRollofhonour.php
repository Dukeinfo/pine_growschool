<?php

namespace App\Http\Livewire\Backend\Rollofhonour;

use Livewire\Component;
use App\Models\CategoryHonour;
use App\Models\SubCategoryHonour;
use App\Models\Rollofhonour;

class EditRollofhonour extends Component
{

      /*dynamic dependant deropdown*/
   public $category=NULL;
   public $subCategories;

   
   public $editId,$subcategory,$studentname,$house,$branch,$year,$sort,$status;

   public function mount($id)
     {
        $rollofhonour = Rollofhonour::findOrFail($id);
        $this->editId = $rollofhonour->id;
        $this->category = $rollofhonour->category_honour_id;
        $this->subcategory = $rollofhonour->sub_category;
        $this->studentname = $rollofhonour->student_name;
        $this->house = $rollofhonour->house;
        $this->branch = $rollofhonour->branch;
        $this->year = $rollofhonour->year;
    	$this->sort = $rollofhonour->sort_id;
    	$this->status = $rollofhonour->status;
     }

      public function updatedCategory($categoryId)
    {
        if (!is_null($categoryId)) {
            $this->subCategories = SubCategoryHonour::where('category_honour_id', $categoryId)->get();
        }
    }
    

    public function editRecord(){
    	

      $rollofhonour = Rollofhonour::find($this->editId);
      $rollofhonour->category_honour_id = $this->category;
      $rollofhonour->sub_category = $this->subcategory;
      $rollofhonour->student_name = $this->studentname;
      $rollofhonour->house = $this->house;
      $rollofhonour->branch = $this->branch;
      $rollofhonour->year = $this->year;
      $rollofhonour->sort_id =$this->sort;
      $rollofhonour->status = $this->status;
      $rollofhonour->save();

      return redirect()->route('roll_of_honour');   
    } 

    public function render()
    {
    	$years = [];
      $currentYear = date('Y');
      $endYear = $currentYear - 20;

      for ($year = $currentYear; $year >= $endYear; $year--) {
          $years[$year] = $year;
      }

    	 $this->categories=CategoryHonour::latest()->orderBy('sort_id' ,'asc')->get();
    	 $this->subCategories=SubCategoryHonour::latest()->orderBy('sort_id' ,'asc')->get();
    	  $this->records=Rollofhonour::latest()->orderBy('sort_id' ,'asc')->get();

        return view('livewire.backend.rollofhonour.edit-rollofhonour', compact('years','currentYear'))->layout('layouts.backend');
    }
}
