<?php

namespace App\Http\Livewire\Backend\Rollofhonour;

use Livewire\Component;
use App\Models\CategoryHonour;
use App\Models\SubCategoryHonour;
use App\Models\Rollofhonour;
class ViewRollofhonour extends Component
{
     /*dynamic dependant deropdown*/
   public $category=NULL;
   public $subCategories;

   public $subcategory,$studentname,$house,$branch,$year,$sort,$status;

        protected $rules = [
        'category' => 'required', 
        'subcategory' => 'required', 
        'studentname' => 'required', 
        'house' => 'required', 
        'branch' => 'required', 
        'year' => 'required',
        'sort' => 'required| unique:rollofhonours,sort_id', 
        'status' => 'required', 
       
     
      ];
      protected $messages = [
          'category.required' => 'Category Required.',
          'subcategory.required' => 'Sub Category Required.',
          'studentname.required' => 'Student Name Required.',
          'house.required' => 'House Required.',
          'branch.required' => 'Branch Required.',
          'year.required' => 'Year Required.',
          'sort.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
          
      ];
    private function resetInputFields(){
        $this->category = '';
        $this->subcategory = '';
        $this->studentname = '';
        $this->house = '';
        $this->branch = '';
        $this->year = '';
        $this->sort = '';
        $this->link = '';
        $this->addmision_no = '';
        $this->status = '';
    }

    public function saveRecord(){
    	 $validatedData = $this->validate();

      $rollofhonour = new Rollofhonour();
      $rollofhonour->category_honour_id = $this->category;
      $rollofhonour->sub_category = $this->subcategory;
      $rollofhonour->student_name = $this->studentname;
      $rollofhonour->house = $this->house;
      $rollofhonour->branch = $this->branch;
      $rollofhonour->year = $this->year;
      $rollofhonour->sort_id =$this->sort;
      $rollofhonour->status = $this->status;
      $rollofhonour->save();

       $this->resetInputFields();

       $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
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
    	  $this->records=Rollofhonour::latest()->orderBy('sort_id' ,'asc')->get();
        return view('livewire.backend.rollofhonour.view-rollofhonour', compact('years','currentYear'))->layout('layouts.backend')->layout('layouts.backend');
    }


    public function updatedCategory($categoryId)
    {
        if (!is_null($categoryId)) {
            $this->subCategories = SubCategoryHonour::where('category_honour_id', $categoryId)->get();
        }
    }

}
