<?php

namespace App\Http\Livewire\Backend\Staff;

use Livewire\Component;

class ViewStaff extends Component
{
    public function render()
    {
        return view('livewire.backend.staff.view-staff')->layout('layouts.backend');
    }
}
