<?php

namespace App\Http\Livewire\Backend\Menu;

use Livewire\Component;
use App\Models\Menu;

class EditMenu extends Component
{
    public $menuId,$name,$sort,$status;


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
        $menu->sort_id =$this->sort;
        $menu->status = $this->status;
        $menu->save();

     
      return redirect()->to('/admin/view/menu');  
    }

    public function render()
    {
        return view('livewire.backend.menu.edit-menu')->layout('layouts.backend');;
    }
}
