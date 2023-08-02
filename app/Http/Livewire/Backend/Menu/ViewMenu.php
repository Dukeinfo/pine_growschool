<?php

namespace App\Http\Livewire\Backend\Menu;

use Livewire\Component;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewMenu extends Component
{

    public $name,$sort,$status ,$records ,$clientIp;

    public function render(Request $request)
    {
      $this->clientIp = $request->ip();

      $this->records = Menu::orderBy('sort_id','asc')->get();	 
        return view('livewire.backend.menu.view-menu')->layout('layouts.backend');
    }
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
