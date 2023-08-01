<?php

namespace App\Http\Livewire\Backend\Gallery;

use Livewire\Component;
use App\Models\Categories;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditGalleryCategory extends Component
{

    use WithFileUploads;
    use UploadTrait;
    public $categoryId, $name, $image, $thumbnail,$editimage,$sort,$status;

     public function mount($id){
        $catgory = Categories::findOrFail($id);
        $this->categoryId = $catgory->id;
        $this->name = $catgory->name;
        $this->image = $catgory->image;
        $this->thumbnail = $catgory->thumbnail;

        $this->sort = $catgory->sort_id;
    	$this->status = $catgory->status;
     }

     public function editCategory(){

     	    if(!is_null($this->editimage)){
          
            $image =  $this->editimage;
            // Define folder path
            $folder = '/uploads/gallery_cat';
            $uploadedData = $this->uploadOne($image, $folder);
    

            $category = Categories::find($this->categoryId);
            $category->name = $this->name;
            $category->slug =  strtolower(str_replace(' ', '-',$this->name));
            $category->image =$uploadedData['file_name'] ?? Null;
            $category->thumbnail =$uploadedData['thumbnail_name']  ?? Null;

            
            $category->sort_id =$this->sort;
            $category->status = $this->status;
            $category->save();
            return redirect()->route('view_category'); 
 
        }
        else{
            $category = Categories::find($this->categoryId);
            $category->name = $this->name;
            $category->slug =  strtolower(str_replace(' ', '-',$this->name));
            $category->sort_id =$this->sort;
            $category->status = $this->status;
            $category->save();
            return redirect()->route('view_category'); 
        }
        
     }

    public function render()
    {
        return view('livewire.backend.gallery.edit-gallery-category')->layout('layouts.backend');
    }
}
