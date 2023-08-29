<?php

namespace App\Http\Livewire\Backend\Gallery;

use Livewire\Component;

class EditGroupPhoto extends Component
{
    public function render()
    {
        return view('livewire.backend.gallery.edit-group-photo')->layout('layouts.backend');
    }
}
