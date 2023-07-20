<?php

namespace App\Http\Livewire\Backend\Menu;

use Livewire\Component;
use App\Models\Menu;

class ViewMenu extends Component
{

    public $name,$sort,$status ,$records;

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
      $validatedData = $this->validate();

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

      $menu = Menu::findOrFail($id);
      if(!is_null($menu)){
        $menu->delete();
      }

     }

    public function render()
    {

        $this->records = Menu::orderBy('sort_id','asc')->get();	 
        return view('livewire.backend.menu.view-menu')->layout('layouts.backend');
    }
}
