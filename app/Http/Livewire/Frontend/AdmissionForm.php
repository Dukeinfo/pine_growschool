<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class AdmissionForm extends Component
{
    public function render()
    {
        return view('livewire.frontend.admission-form')->layout('layouts.frontend');
    }
}
