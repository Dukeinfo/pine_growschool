<?php

namespace App\Http\Livewire\Backend\Menu;

use Livewire\Component;
use App\Models\Menu;

class ViewMenu extends Component
{

    public $name,$sort,$status;

     protected $rules = [
        'name' => 'required', 
        'sort' => 'required', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'name.required' => 'Name Required.',
          'sort.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->name = '';
        $this->sort = '';
        $this->status = '';
    }


    public function addMenu()
    {
      $menu = new Menu();
      $menu->name = $this->name;
      $menu->sort_id =$this->sort;
      $menu->status = $this->status;
      $menu->save();

      $this->resetInputFields(); 

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
    } 

    public function delete($id){

       Menu::destroy($id);

     }

    public function render()
    {

        $this->records=Menu::orderBy('sort_id','asc')->get();	 
        return view('livewire.backend.menu.view-menu')->layout('layouts.backend');
    }
}
