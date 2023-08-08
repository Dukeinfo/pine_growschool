<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class ContactUs extends Component
{
    public function render()
    {
        return view('livewire.frontend.contact-us')->layout('layouts.frontend');;
    }
}
