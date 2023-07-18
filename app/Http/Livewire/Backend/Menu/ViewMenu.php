<?php

namespace App\Http\Livewire\Backend\Menu;

use Livewire\Component;

class ViewMenu extends Component
{
    public function render()
    {
        return view('livewire.backend.menu.view-menu')->layout('layouts.backend');
    }
}
