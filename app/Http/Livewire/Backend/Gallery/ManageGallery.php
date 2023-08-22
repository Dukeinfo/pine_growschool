<?php

namespace App\Http\Livewire\Backend\Gallery;

use Livewire\Component;
use App\Models\Categories;
use App\Models\Gallery;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
class ManageGallery extends Component
{
	use WithFileUploads;
  use UploadTrait;
    public $category_id,$name,$image,$sort,$status ,$records ,$categories ;
    public $search ,$s_name ,$year ,$title ,$addmision_no ,$lastUniqueSortingOrder;
 
    protected $queryString = ['search'];
    public function render()
    {
      $this->lastUniqueSortingOrder = Gallery::distinct()->orderBy('sort_id', 'desc')->value('sort_id');

      $years = [];
      $currentYear = date('Y');
      $endYear = $currentYear - 20;

      for ($year = $currentYear; $year >= $endYear; $year--) {
          $years[$year] = $year;
      }

      if($this->search ){
        $this->records = Gallery::join('categories', 'galleries.category_id','categories.id')
        ->select('galleries.*','categories.name')
        ->Where('title', 'like', '%'.trim($this->search).'%')
        ->orWhere('s_name', 'like', '%'.trim($this->search).'%')
        ->orWhere('year', 'like', '%'.trim($this->search).'%')
        ->orWhere('categories.name', 'like', '%'.trim($this->search).'%')
        ->get();
      }else 
      {
        $this->categories = Categories::orderBy('sort_id','asc')->get();
        $this->records = Gallery::orderBy('sort_id','asc')->get();
      }
        return view('livewire.backend.gallery.manage-gallery', compact('years','currentYear'))->layout('layouts.backend');
    }

        protected $rules = [
        'category_id' => 'required', 
        'year' => 'required',
        'image' => 'required', 
        'sort' => 'required| unique:galleries,sort_id', 
        'status' => 'required', 
       
     
      ];
      protected $messages = [
          'category_id.required' => 'Category Required.',
          'image.required' => 'Image Required.',
          'sort.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
          
      ];
    private function resetInputFields(){
        $this->category_id = '';
        $this->image = '';
        $this->title = '';
        $this->year = '';
        $this->s_name = '';
        $this->sort = '';
        $this->addmision_no = '';
        $this->status = '';
    }


   public function addGallery(){

     $validatedData = $this->validate();
     if(!is_null($this->image)){
      $image =  $this->image;
      // Define folder path
      $folder = '/uploads/gallery';
      $uploadedData = $this->uploadOne($image, $folder);

    }   

      $gallery = new Gallery();
      $gallery->category_id = $this->category_id;
      $gallery->title = $this->title;
      $gallery->year = $this->year;
      $gallery->s_name = $this->s_name;
      $gallery->addmision_no = $this->addmision_no;

      
      $gallery->image = $uploadedData['file_name'] ?? NULL;
      $gallery->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
      $gallery->slug =  $this->createSlug($this->title ?? NULL);
      $gallery->sort_id =$this->sort;
      $gallery->status = $this->status;
      $gallery->save();

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
          return Gallery::select('slug')->where('slug', 'like', $slug.'%')
          ->where('id', '<>', $id)
          ->get();
      }



     public function delete($id){

      $gallery = Gallery::findOrFail($id);
      if(!is_null($gallery)){
        $gallery->delete();
      }

     }

}
