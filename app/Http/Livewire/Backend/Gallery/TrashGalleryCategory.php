<?php

namespace App\Http\Livewire\Backend\Gallery;

use Livewire\Component;
use App\Models\Categories;

class TrashGalleryCategory extends Component
{
  
    public $records;

    public function render()
    {
    	 $this->records = Categories::onlyTrashed()->orderBy('sort_id','asc')->get();
        return view('livewire.backend.gallery.trash-gallery-category')->layout('layouts.backend');
    }

    public function restore($id){
     $category = Categories::withTrashed()->findOrFail($id);
      if(!is_null($category)){
        $category->restore();
      }

       return redirect()->route('view_category');
    }
}
