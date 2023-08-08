<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class Gallery extends Component
{
    public function render()
    {
        return view('livewire.frontend.gallery')->layout('layouts.frontend');;
    }
}
