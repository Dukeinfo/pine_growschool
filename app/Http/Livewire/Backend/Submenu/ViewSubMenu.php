<?php

namespace App\Http\Livewire\Backend\Submenu;

use App\Models\Menu;
use App\Models\Submenu;
use Livewire\Component;

class ViewSubMenu extends Component
{
    public $getMenus  ,$menu_id ,$name ,$sort_id ,$status ;
    public function render()
    {
           $this->getMenus =   Menu::get();
        return view('livewire.backend.submenu.view-sub-menu')->layout('layouts.backend');
    }


    protected $rules = [ 
        'menu_id' => 'required', 
        'name' => 'required', 
        'menu_id' => 'required', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'menu_id.required' => 'Name Required.',
          'name.required' => 'Name Required.',

          'menu_id.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->menu_id = '';
        $this->name = '';

        $this->menu_id = '';
        $this->status = '';
    }
    public function addsubMenu()
    {
      $submenu = new Submenu();
      $submenu->name = $this->name;
      $submenu->menu_id = $this->menu_id;
      $submenu->sort_id =$this->sort_id;
      $submenu->status = $this->status;
      $submenu->save();

      $this->resetInputFields(); 

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
    } 
}
