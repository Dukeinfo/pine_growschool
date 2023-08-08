<?php

namespace App\Http\Livewire\Backend\Menu;

use Livewire\Component;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class EditMenu extends Component
{
    public $menuId,$name,$sort,$status ,$clientIp ,$link;
      public function mount($id)
     {
        $menu = Menu::findOrFail($id);
        $this->menuId = $menu->id;
        $this->name = $menu->name;
    	$this->sort = $menu->sort_id;
    	$this->status = $menu->status;
     }

   public function editMenu()
    {
        $menu = Menu::find($this->menuId);
        $menu->name = $this->name;
        $menu->link = $this->link;
        $menu->sort_id =$this->sort;
        $menu->status = $this->status;
        $menu->login =  Auth::user()->id;
        $menu->ip_address =  $this->clientIp;
        $menu->save();

     
      return redirect()->route('view_menu');  
    }

    public function render(Request $request)
    {
      $this->clientIp = $request->ip();

        return view('livewire.backend.menu.edit-menu')->layout('layouts.backend');;
    }
}
