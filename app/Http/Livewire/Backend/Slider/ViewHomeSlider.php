<?php

namespace App\Http\Livewire\Backend\Slider;

use Livewire\Component;

class ViewHomeSlider extends Component
{
    public function render()
    {
        return view('livewire.backend.slider.view-home-slider')->layout('layouts.backend');
    }
}
