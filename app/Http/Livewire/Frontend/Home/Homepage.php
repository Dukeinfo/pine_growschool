<?php

namespace App\Http\Livewire\Frontend\Home;

use Livewire\Component;

class Homepage extends Component
{
    public function render()
    {
        return view('livewire.frontend.home.homepage')->layout('layouts.frontend');
    }
}
