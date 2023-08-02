<?php

namespace App\Http\Livewire\Frontend\Home;

use App\Models\Menu;
use App\Models\Slider;
use App\Models\Memberships;
use App\Models\BoardMembers;
use Livewire\Component;

class Homepage extends Component
{

    public $menus;
    public $sliders;
    public $memberships;
    public function render()
    {
       $this->menus = Menu::orderBy('sort_id','asc')->where('status','Active')->get();	
       $this->sliders = Slider::orderBy('sort_id','asc')->where('status','Active')->get();	
       $this->memberships =  Memberships::orderBy('sort_id' ,'asc')->where('status','Active')->get(); 
       $this->boardmembers =  BoardMembers::orderBy('sort_id' ,'asc')->where('status','Active')->get(); 
        return view('livewire.frontend.home.homepage')->layout('layouts.frontend');
    }
}
