<?php

namespace App\Http\Livewire\Backend\Menu;

use Livewire\Component;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewMenu extends Component
{

    public $name,$sort,$status ,$records ,$clientIp ,$link;

    public function render(Request $request)
    {
      $this->clientIp = $request->ip();

      $this->records = Menu::orderBy('sort_id','asc')->get();	 
        return view('livewire.backend.menu.view-menu')->layout('layouts.backend');
    }
     protected $rules = [
        'name' => 'required | unique:menus,name', 
        'sort' => 'required | unique:menus,sort_id', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'name.required' => 'Name Required.',
          'sort.required' => 'Sort Required.',
          'sort.unique' => 'Sort number already taken.',

          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->name = '';
        $this->sort = '';
        $this->status = '';
        $this->link = '';
    }


    public function addMenu()
    {
      $validatedData = $this->validate();

      $menu = new Menu();
      $menu->name = $this->name;
      $menu->link = $this->link;
      $menu->sort_id =$this->sort;
      $menu->status = $this->status;
      $menu->login =  Auth::user()->id;
      $menu->ip_address =  $this->clientIp;
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


}
