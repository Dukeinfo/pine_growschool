<?php

namespace App\Http\Livewire\Backend\Gallery;

use Livewire\Component;
use App\Models\Categories;
use App\Models\Gallery;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ManageGallery extends Component
{
	use WithFileUploads;

    public $category_id,$name,$image,$sort,$status ,$records ,$categories ;
    public $search ,$s_name ,$year ,$title;
 
    protected $queryString = ['search'];
    public function render()
    {
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
        'sort' => 'required', 
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
        $this->status = '';
    }


   public function addGallery(){

     $validatedData = $this->validate();
 
     if(!is_null($this->image)){
        // Generate a unique name for the image
        $imageName =  uniqid() . '.' . $this->image->getClientOriginalExtension();

        // Get the path where you want to save the image and thumbnail
        $directory = public_path('uploads/thumbnail');

        // Check if the directory exists, if not, create it
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true, true);
        }

        // Save the original image to the specified directory
        $this->image->storeAs('uploads', $imageName, 'public');

        // Generate a thumbnail and save it to the specified directory
        $thumbnailName = 'thumb_' . $imageName;
        Image::make($this->image)->fit(200, 200)->save($directory . '/' . $thumbnailName);

        // Set the thumbnail property to the thumbnail image name
        // $this->thumbnail = $thumbnailName;
    }  
 
    
      $gallery = new Gallery();
      $gallery->category_id = $this->category_id;
      $gallery->title = $this->title;
      $gallery->year = $this->year;
      $gallery->s_name = $this->s_name;

      $gallery->image = $imageName ?? NULL;
      $gallery->thumbnail = $thumbnailName ?? NULL;
      $gallery->sort_id =$this->sort;
      $gallery->status = $this->status;
      $gallery->save();

       $this->resetInputFields();

       $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 

    


   }


     public function delete($id){

      $gallery = Gallery::findOrFail($id);
      if(!is_null($gallery)){
        $gallery->delete();
      }

     }

}
