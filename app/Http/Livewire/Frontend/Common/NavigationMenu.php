<?php

namespace App\Http\Livewire\Frontend\Common;

use App\Models\Menu;
use Livewire\Component;

class NavigationMenu extends Component
{
    public $menus;

    public function mount()
    {
        $this->menus = Menu::orderBy('sort_id', 'asc')->where('status', 'Active')->get();
 

    }
    public function render()
    {
      
        return view('livewire.frontend.common.navigation-menu');
    }
}
