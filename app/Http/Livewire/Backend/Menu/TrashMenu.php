<?php

namespace App\Http\Livewire\Backend\Menu;

use Livewire\Component;
use App\Models\Menu;

class TrashMenu extends Component
{
  public $records;
    public function render()
    {
    	 $this->records = Menu::onlyTrashed()->orderBy('sort_id','asc')->get();
        return view('livewire.backend.menu.trash-menu')->layout('layouts.backend');
    }

    public function restore($id){
     $menu = Menu::withTrashed()->findOrFail($id);
      if(!is_null($menu)){
        $menu->restore();
      }

       return redirect()->route('view_menu');
    }
}
