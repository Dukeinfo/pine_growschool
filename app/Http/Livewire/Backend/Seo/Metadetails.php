<?php

namespace App\Http\Livewire\Backend\Seo;

use App\Models\Menu;
use Livewire\Component;

class Metadetails extends Component
{
    public $getMenus;
    public function render()
    {
        $this->getMenus = Menu::orderBy('sort_id','asc')->get();	 

        return view('livewire.backend.seo.metadetails')->layout('layouts.backend');
    }
}
