<?php

namespace App\Http\Livewire\Frontend\Detail;

use Livewire\Component;

class DetailpageView extends Component
{
    public function render()
    {
        return view('livewire.frontend.detail.detailpage-view')->layout('layouts.frontend');
    }
}
