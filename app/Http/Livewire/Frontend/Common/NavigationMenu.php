<?php

namespace App\Http\Livewire\Frontend\Common;

use App\Models\FaqCategory;
use App\Models\FaqData;
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
     
        $getfaqcat   = FaqCategory::orderBy('sort_id')->orderBy('name', 'ASC')->where('status', 'Active')->get();
        return view('livewire.frontend.common.navigation-menu',['getfaqcat' =>$getfaqcat ] );
    }
}
