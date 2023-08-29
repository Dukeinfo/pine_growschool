<?php

namespace App\Http\Livewire\Backend\Gallery;

use Livewire\Component;

class AddGroupPhoto extends Component
{
    public function render()
    {
        return view('livewire.backend.gallery.add-group-photo')->layout('layouts.backend');
    }
}
