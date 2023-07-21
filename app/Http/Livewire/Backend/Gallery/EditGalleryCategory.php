<?php

namespace App\Http\Livewire\Backend\Gallery;

use Livewire\Component;
use App\Models\Categories;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditGalleryCategory extends Component
{

    use WithFileUploads;

    public $categoryId, $name, $image,$editimage,$sort,$status;

     public function mount($id){
        $catgory = Categories::findOrFail($id);
        $this->categoryId = $catgory->id;
        $this->name = $catgory->name;
        $this->image = $catgory->image;
        $this->sort = $catgory->sort_id;
    	$this->status = $catgory->status;
     }

     public function editCategory(){

     	    if(!is_null($this->editimage)){

            if(isset($this->image)){
                $imagePath1 = Storage::path('public/uploads/'. $this->image);
              
                        if(File::exists($imagePath1)){
                            unlink($imagePath1);
                        }
                }
            $fileName = time().'_'.$this->editimage->getClientOriginalName();
            $filePath = $this->editimage->storeAs('uploads', $fileName, 'public');

            $category = Categories::find($this->categoryId);
            $category->name = $this->name;
            $category->slug =  strtolower(str_replace(' ', '-',$this->name));
            $category->image = $fileName;
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
