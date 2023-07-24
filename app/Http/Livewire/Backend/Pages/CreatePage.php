<?php

namespace App\Http\Livewire\Backend\Pages;

use Livewire\Component;

class CreatePage extends Component
{
    public function render()
    {
        return view('livewire.backend.pages.create-page')->layout('layouts.backend');
    }
}
