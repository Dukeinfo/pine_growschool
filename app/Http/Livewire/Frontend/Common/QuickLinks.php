<?php

namespace App\Http\Livewire\Frontend\Common;

use App\Models\CreatePage;
use App\Models\Menu;
use App\Models\Submenu;
use Livewire\Component;

class QuickLinks extends Component
{

    public $quickmenus, $quicksubmenus, $quickgetpages;

    public function mount(){
        $this->quickmenus = Menu::orderBy('sort_id', 'asc')
            ->where('status', 'Active')
            ->get();

        $this->quicksubmenus = Submenu::with(['Menu'])
            ->where('cms', 'No')
            ->orderBy('sort_id', 'asc')
            ->where('status', 'Active')
            ->groupBy('menu_id')
            ->get();

        $this->quickgetpages = CreatePage::with(['SubMenu', 'Menu'])
            ->orderBy('sort_id', 'asc')
            ->where('status', 'Active')
            ->get();
    }
    public function render()
    {
        return view('livewire.frontend.common.quick-links', [
            'quickmenus' => $this->quickmenus,
            'quicksubmenus' => $this->quicksubmenus,
            'quickgetpages' => $this->quickgetpages,
        ]);
    }
}
