<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class FaqsIntroduction extends Component
{
    public function render()
    {
        return view('livewire.frontend.faqs-introduction')->layout('layouts.frontend');;
    }
}
