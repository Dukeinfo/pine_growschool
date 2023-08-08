<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class GalleryDetail extends Component
{
    public function render()
    {
        return view('livewire.frontend.gallery-detail')->layout('layouts.frontend');;
    }
}
