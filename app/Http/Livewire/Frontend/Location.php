<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class Location extends Component
{
    public function render()
    {
        return view('livewire.frontend.location')->layout('layouts.frontend');;
    }
}
