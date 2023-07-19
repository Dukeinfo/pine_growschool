<?php

namespace App\Http\Livewire\Backend\Submenu;

use Livewire\Component;
use App\Models\Menu;
use App\Models\Submenu;

class EditSubMenu extends Component
{

     public $submenuId,$getMenus,$menu_id ,$name ,$sort_id, $cms , $pname ,$status ;

     public function mount($id){
        $submenu = Submenu::findOrFail($id);
        $this->submenuId = $submenu->id;
        $this->menu_id = $submenu->menu_id;
        $this->name = $submenu->name;
        $this->sort_id = $submenu->sort_id;
        $this->cms = $submenu->cms;
    	$this->pname = $submenu->pname;
    	$this->status = $submenu->status;
     } 

    public function render()
    {
    	 $this->getMenus = Menu::get();
        return view('livewire.backend.submenu.edit-sub-menu')->layout('layouts.backend');
    }


      public function editsubMenu()
    {
      
      $submenu = Submenu::find($this->submenuId);
      $submenu->menu_id = $this->menu_id;
      $submenu->name = $this->name;
      $submenu->sort_id =$this->sort_id;
      $submenu->cms =$this->cms;
      $submenu->pname =$this->pname;
      $submenu->status = $this->status;
      $submenu->save();

      return redirect()->to('/admin/view/submenu'); 
      }

      
}
