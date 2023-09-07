<?php

namespace App\Http\Livewire\Frontend\Common;

use App\Models\CreatePage;
use App\Models\FaqCategory;
use App\Models\Submenu;
use Livewire\Component;

class SubmenuLoader extends Component
{
    public $submenus = [];
    public $menuId ;
    public $getpage = [];
    public function mount($menuId)
    {
      
        $this->menuId = $menuId;
        $this->loadSubmenus(); 
    }

    public function loadSubmenus()
    {
        $this->submenus = Submenu::with(['Menu'])->where('cms', 'No')
            ->where('menu_id', $this->menuId)
            ->orderBy('sort_id', 'asc')
            ->where('status', 'Active')
            ->get();

        $this->getpage = CreatePage::where('menu_id', $this->menuId)
            ->with(['SubMenu'])
            ->orderBy('sort_id', 'asc')
            ->where('status', 'Active')
            ->groupBy('submenu_id')
            ->get();
    }


    public function render()
    {
        

        return view('livewire.frontend.common.submenu-loader' );
    }
}
