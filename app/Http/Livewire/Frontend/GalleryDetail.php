<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Categories;
use App\Models\Gallery;

class GalleryDetail extends Component
{

   public $galleryId,$category,$records;

    public function mount($category_id )
    {
      $category = Categories::findOrFail($category_id);
        $this->category = $category->name;

       $this->records = Gallery::with(['Category'])->where('category_id', $category_id)->get();
    }
            
    public function render()
    {

        return view('livewire.frontend.gallery-detail')->layout('layouts.frontend');;
    }
}
