<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;

class AdminDashboard extends Component
{
    public function render()
    {
        return view('livewire.backend.admin-dashboard')->layout('layouts.backend');
    }
    
}
