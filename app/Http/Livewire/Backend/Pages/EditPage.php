<?php

namespace App\Http\Livewire\Backend\Pages;

use Livewire\Component;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\CreatePage;
use Illuminate\Validation\Rule;    
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\UploadTrait;
class EditPage extends Component
{

   use UploadTrait; 
   use WithFileUploads;

	    /*dynamic dependant deropdown*/
	   public $menu=NULL;
	   public $getMenus, $subMenus;

	   public $pageId ,$link;

	   public $submenu_id,$heading,$desc,$image,$editimage,$sort,$status;

	     public function mount($id)
	     {
	        $page = CreatePage::findOrFail($id);
	        $this->pageId = $page->id;
	        $this->menu = $page->menu_id;
	        $this->submenu_id = $page->submenu_id;
	        $this->heading = $page->heading;
	        $this->desc = $page->description;
          $this->image = $page->image;
          $this->thumbnail = $page->thumbnail;
          $this->link = $page->link;
	    	$this->sort = $page->sort_id;
	    	$this->status = $page->status;

	    	$this->subMenus = Submenu::where('menu_id', $this->menu)->where('cms','Yes')->get();
	     }
         protected function rules()
             {
                 return [
                     
                     'menu' => 'required', 
                    //  'submenu' => 'required |unique:create_pages,submenu_id', 
                     'submenu_id' => ['required', Rule::unique('create_pages')->ignore($this->pageId)],
                     'heading' => 'required', 
                     'desc' => 'required',
                     'sort' => 'required', 
                     'status' => 'required', 
                 ];
             }
 
          protected $messages = [
              'menu.required' => 'Menu Required.',
              'submenu_id.required' => 'Sub Menu Required.',
              'submenu_id.unique' => 'SubMenu Already taken',
              'heading.required' => 'Heading Required.',
              'desc.required' => 'Description Required.',
              'sort.required' => 'Sort Id Required.',
              'status.required' => 'Status Required.',
              
          ];
    public function render()
    {
    	$this->getMenus = Menu::get();
        return view('livewire.backend.pages.edit-page')->layout('layouts.backend');
    }


    public function updatedMenu($menuId)
    {
        if (!is_null($menuId)) {
            $this->subMenus = Submenu::where('menu_id', $menuId)->where('cms','Yes')->get();
        }
    }

    public function editPage(){
      $this->validate();

      if(!is_null($this->editimage)){
      $image =  $this->editimage;
      // Define folder path
      $folder = '/uploads/page';
      $uploadedData = $this->uploadOne($image, $folder);

      $createPage = CreatePage::find($this->pageId);
      $createPage->menu_id = $this->menu ?? Null;
      $createPage->submenu_id = $this->submenu_id ?? Null;
      $createPage->heading = $this->heading ?? Null;
      $createPage->slug =  strtolower(str_replace(' ', '-',$this->heading))?? Null;
      $createPage->description = $this->desc ?? Null;
      $createPage->image = $uploadedData['file_name'] ?? NULL;
      $createPage->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
      $createPage->link = $this->link ?? Null;
      $createPage->sort_id =$this->sort ?? Null;
      $createPage->status = $this->status ?? Null;
      $createPage->save();
      }else{
      $createPage = CreatePage::find($this->pageId);
      $createPage->menu_id = $this->menu ?? Null;
      $createPage->submenu_id = $this->submenu_id ?? Null;
      $createPage->heading = $this->heading ?? Null;
      $createPage->slug =  strtolower(str_replace(' ', '-',$this->heading))?? Null;
      $createPage->description = $this->desc ?? Null;
      $createPage->link = $this->link ?? Null;
      $createPage->sort_id =$this->sort ?? Null;
      $createPage->status = $this->status ?? Null;
      $createPage->save();
      }
     
   
      return redirect()->route('create_page');    

    }
}
