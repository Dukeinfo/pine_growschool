<?php

namespace App\Http\Livewire\Backend\Submenu;

use App\Models\Menu;
use App\Models\Submenu;
use Livewire\Component;

class ViewSubMenu extends Component
{
    public $getMenus,$menu_id ,$name ,$sort_id, $cms , $pname ,$status ;
    public function render()
    {
        $this->getMenus = Menu::get();
        $this->records=Submenu::orderBy('sort_id' ,'asc')->get();

        return view('livewire.backend.submenu.view-sub-menu')->layout('layouts.backend');
    }



    protected $rules = [ 
        'menu_id' => 'required', 
        'name' => 'required', 
        'sort_id' => 'required',
        'cms' => 'required', 
        'pname' => 'required', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'menu_id.required' => 'Name Required.',
          'name.required' => 'Name Required.',
          'sort_id.required' => 'Sort Required.',
          'cms.required' => 'CMS Required.',
          'pname.required' => 'Page name Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->menu_id = '';
        $this->name = '';
        $this->sort_id = '';
        $this->cms = '';
        $this->pname = '';
        $this->status = '';
    }
    public function addsubMenu()
    {
      $validatedData = $this->validate();

      $submenu = new Submenu();
      $submenu->menu_id = $this->menu_id;
      $submenu->name = $this->name;
      $submenu->sort_id =$this->sort_id;
      $submenu->cms =$this->cms;
      $submenu->pname =$this->pname;
      $submenu->status = $this->status;
      $submenu->save();

      $this->resetInputFields(); 

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
    } 

    

    public function delete($id){

       Submenu::destroy($id);

     }
}
