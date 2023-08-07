<?php

namespace App\Http\Livewire\Backend\Pages;

use Livewire\Component;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\CreatePage;

class EditPage extends Component
{
	    /*dynamic dependant deropdown*/
	   public $menu=NULL;
	   public $getMenus, $subMenus;

	   public $pageId;

	   public $submenu,$heading,$desc,$sort,$status;

	     public function mount($id)
	     {
	        $page = CreatePage::findOrFail($id);
	        $this->pageId = $page->id;
	        $this->menu = $page->menu_id;
	        $this->submenu = $page->submenu_id;
	        $this->heading = $page->heading;
	        $this->desc = $page->description;
          $this->link = $page->link;
	    	$this->sort = $page->sort_id;
	    	$this->status = $page->status;

	    	$this->subMenus = Submenu::where('menu_id', $this->menu)->get();
	     }

 
    public function render()
    {
    	$this->getMenus = Menu::get();
        return view('livewire.backend.pages.edit-page')->layout('layouts.backend');
    }


    public function updatedMenu($menuId)
    {
        if (!is_null($menuId)) {
            $this->subMenus = Submenu::where('menu_id', $menuId)->get();
        }
    }

    public function editPage(){

      $createPage = CreatePage::find($this->pageId);
      $createPage->menu_id = $this->menu ?? Null;
      $createPage->submenu_id = $this->submenu ?? Null;
      $createPage->heading = $this->heading ?? Null;
      $createPage->slug =  strtolower(str_replace(' ', '-',$this->heading))?? Null;
      $createPage->description = $this->desc ?? Null;
      $createPage->link = $this->link ?? Null;
      $createPage->sort_id =$this->sort ?? Null;
      $createPage->status = $this->status ?? Null;
      $createPage->save();
     
   
      return redirect()->route('create_page');    

    }
}
