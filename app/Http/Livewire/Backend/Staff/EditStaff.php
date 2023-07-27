<?php

namespace App\Http\Livewire\Backend\Staff;

use Livewire\Component;

class EditStaff extends Component
{
    public function render()
    {
        return view('livewire.backend.staff.edit-staff')->layout('layouts.backend');
    }
}
