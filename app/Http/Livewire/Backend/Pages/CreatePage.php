<?php

namespace App\Http\Livewire\Backend\Pages;

use Livewire\Component;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\CreatePage as appCreatePage;

class CreatePage extends Component
{

   /*dynamic dependant deropdown*/
   public $menu=NULL;
   public $subMenus;

   public $sort_id ,$getMenus , $records , $submenu,$heading,$desc,$sort,$status;

    protected $rules = [ 
        'menu' => 'required', 
        'submenu' => 'required', 
        'heading' => 'required', 
        'desc' => 'required',
        'sort' => 'required', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'menu.required' => 'Menu Required.',
          'submenu.required' => 'Sub Menu Required.',
          'heading.required' => 'Heading Required.',
          'desc.required' => 'Description Required.',
          'sort.required' => 'Sort Id Required.',
          'status.required' => 'Status Required.',
          
      ];
    private function resetInputFields(){
        $this->menu = '';
        $this->submenu = ''; 
        $this->heading = ''; 
        $this->desc = '';
        $this->sort_id = '';
        $this->status = '';
       
    }

    public function render()
    {
    	$this->getMenus = Menu::get();
    	 $this->records = appCreatePage::orderBy('sort_id','asc')->get();
        return view('livewire.backend.pages.create-page')->layout('layouts.backend');
    }

    public function updatedMenu($menuId)
    {
        if (!is_null($menuId)) {
            $this->subMenus = Submenu::where('menu_id', $menuId)->where('cms','Yes')->get();
        }
    }



    public function createPage(){

      $validatedData = $this->validate();

      $createPage = new appCreatePage();
      $createPage->menu_id = $this->menu ?? Null;
      $createPage->submenu_id = $this->submenu ?? Null;
      $createPage->heading = $this->heading ?? Null;
      $createPage->slug =  strtolower(str_replace(' ', '-',$this->heading))?? Null;
      $createPage->description = $this->desc ?? Null;
      $createPage->sort_id =$this->sort ?? Null;
      $createPage->status = $this->status ?? Null;
      $createPage->save();
      $this->resetInputFields();
        $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Successfully save!', 
            ]); 
        // Emit the 'formSubmitted' event
        $this->emit('formSubmitted');
    }

}
