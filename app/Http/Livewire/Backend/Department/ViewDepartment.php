<?php

namespace App\Http\Livewire\Backend\Department;

use Livewire\Component;

class ViewDepartment extends Component
{
    public function render()
    {
        return view('livewire.backend.department.view-department')->layout('layouts.backend');
    }
}
