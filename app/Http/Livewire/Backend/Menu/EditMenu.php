<?php

namespace App\Http\Livewire\Backend\Menu;

use Livewire\Component;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class EditMenu extends Component
{
    public $menuId,$name,$sort_id,$status ,$clientIp ,$link;
      public function mount($id)
     {
        $menu = Menu::findOrFail($id);
        $this->menuId = $menu->id;
        $this->name = $menu->name;
        $this->link = $menu->link;

    	  $this->sort_id = $menu->sort_id;
  
    	  $this->status = $menu->status;
     }
     protected function rules()
     {
         return [
             'name' => ['required', Rule::unique('menus')->ignore($this->menuId)],
             'sort_id' => ['required'],
             'status' => 'required',
         ];
     }

      protected $messages = [
        'name.required' => 'Name is required.',
        'sort_id.required' => 'Sort is required.',
        'sort_id.unique' => 'This Sort number is already taken.',
        'status.required' => 'Status is required.',
      ];
   public function editMenu()
    {
      $this->validate();
        $menu = Menu::find($this->menuId);
        $menu->name = $this->name;
        $menu->link = $this->link ?? NUll;
        $menu->sort_id =$this->sort_id;
        // $menu->link =$this->link;

        $menu->status = $this->status;
        $menu->login =  Auth::user()->id;
        $menu->ip_address =  $this->clientIp;
        $menu->save();

     
      return redirect()->route('view_menu');  
    }

    public function render(Request $request)
    {
      $this->clientIp = $request->ip();

        return view('livewire.backend.menu.edit-menu')->layout('layouts.backend');;
    }
}
