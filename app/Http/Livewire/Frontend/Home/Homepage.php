<?php

namespace App\Http\Livewire\Frontend\Home;

use App\Models\Menu;
use Livewire\Component;

class Homepage extends Component
{

    public $menus ;
    public function render()
    {
       $this->menus = Menu::orderBy('sort_id','asc')->where('status','Active')->get();	 
        return view('livewire.frontend.home.homepage')->layout('layouts.frontend');
    }
}
