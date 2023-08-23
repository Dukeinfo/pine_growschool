<?php

namespace App\Http\Livewire\Backend\Rollofhonour;

use Livewire\Component;
use App\Models\CategoryHonour;
use Illuminate\Support\Str;
class AddCategory extends Component
{

    public $name,$sort,$status;
    public $records;

    protected $rules = [
        'name' => 'required', 
        'sort' => 'required| unique:category_honours,sort_id', 
        'status' => 'required', 
     
      ];
    protected $messages = [
          'name.required' => 'Name Required.',
          'sort.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->name = '';
        $this->sort = '';
        $this->status = '';
    }

    public function addCategory(){
    $validatedData = $this->validate();

      $categories = new CategoryHonour();
      $categories->name = $this->name ?? NULL;
      $categories->slug =  $this->createSlug($this->name ?? NULL);
      $categories->sort_id =$this->sort ?? NULL;
      $categories->status = $this->status ?? NULL;
      $categories->save();

        $this->resetInputFields(); 
        $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 

    } 

         //CREATE SLUG
    public function createSlug($title, $id = 0)
       {
        $slug =  Str::slug($title);
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }

        $i = 1;
        $is_contain = true;
        do {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                $is_contain = false;
                return $newSlug;
            }
            $i++;
        } while ($is_contain);
      }


      //INCREMENT SLUG
      protected function getRelatedSlugs($slug, $id = 0)
      {
          return CategoryHonour::select('slug')->where('slug', 'like', $slug.'%')
          ->where('id', '<>', $id)
          ->get();
      }

    
   public function delete($id){

      $category = CategoryHonour::findOrFail($id);
      if(!is_null($category)){
        $category->delete();
      }

     }  

    public function render()
    {
    	 $this->records=CategoryHonour::latest()->orderBy('sort_id' ,'asc')->get();
        return view('livewire.backend.rollofhonour.add-category')->layout('layouts.backend');
    }
}
