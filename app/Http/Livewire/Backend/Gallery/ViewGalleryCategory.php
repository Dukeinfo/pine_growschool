<?php

namespace App\Http\Livewire\Backend\Gallery;

use Livewire\Component;

class ViewGalleryCategory extends Component
{
    public function render()
    {
        return view('livewire.backend.gallery.view-gallery-category')->layout('layouts.backend');
    }
}
