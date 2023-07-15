<?php

namespace App\Http\Livewire\Backend\Membership;

use Livewire\Component;

class ViewMembership extends Component
{
    public function render()
    {
        return view('livewire.backend.membership.view-membership')->layout('layouts.backend');
    }
}
