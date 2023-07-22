<?php

namespace App\Http\Livewire\Backend\Submenu;

use Livewire\Component;
use App\Models\Submenu;

class TrashSubMenu extends Component
{
	public $records;
    public function render()
    {
    	$this->records = Submenu::onlyTrashed()->orderBy('sort_id','asc')->get();
        return view('livewire.backend.submenu.trash-sub-menu')->layout('layouts.backend');
    }

     public function restore($id){

     $smenu = Submenu::withTrashed()->findOrFail($id);
      if(!is_null($smenu)){
        $smenu->restore();
      }
         return redirect()->route('view_subnmenu');
    }
}
