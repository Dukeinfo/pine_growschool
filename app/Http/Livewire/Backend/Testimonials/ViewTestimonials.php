<?php

namespace App\Http\Livewire\Backend\Testimonials;

use Livewire\Component;

class ViewTestimonials extends Component
{
    public function render()
    {
        return view('livewire.backend.testimonials.view-testimonials')->layout('layouts.backend');
    }
}
