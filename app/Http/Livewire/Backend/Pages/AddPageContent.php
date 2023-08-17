<?php

namespace App\Http\Livewire\Backend\Pages;

use Livewire\Component;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\PageContent;
use App\Models\CreatePage as appCreatePage;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\UploadTrait;

class AddPageContent extends Component
{
     use UploadTrait; 
     use WithFileUploads;

    /*dynamic dependant deropdown*/
    public $menu=NULL;
    public $getMenus;
    public $subMenus;

    public $sort_id, $records , $submenu,$heading,$desc,$image,$link,$sort,$status;


    protected $rules = [ 
        'menu' => 'required', 
        'submenu' => 'required |unique:create_pages,submenu_id', 
        'heading' => 'required', 
        'desc' => 'required',
        'image' => 'required',
        'sort' => 'required', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'menu.required' => 'Menu Required.',
          'submenu.required' => 'Sub Menu Required.',
          'submenu.unique' => 'SubMenu Already taken',
          'heading.required' => 'Heading Required.',
          'desc.required' => 'Description Required.',
          'image.required' => 'Image Required.',
          'sort.required' => 'Sort Id Required.',
          'status.required' => 'Status Required.',
          
      ];
    private function resetInputFields(){
        $this->menu = '';
        $this->submenu = ''; 
        $this->heading = ''; 
        $this->desc = '';
        $this->image = '';
        $this->link = '';
        $this->sort_id = '';
        $this->status = '';
       
    }

    public function render()
    {
    	$this->getMenus = Menu::get();
    	$this->records = PageContent::orderBy('sort_id','asc')->get();
        return view('livewire.backend.pages.add-page-content')->layout('layouts.backend');
    }


    public function updatedMenu($menuId)
    {
        if (!is_null($menuId)) {
            $this->subMenus = Submenu::where('menu_id', $menuId)->get();
        }
    }

     public function addContent(){

      $validatedData = $this->validate();

      if(!is_null($this->image)){
      $image =  $this->image;
 
      // Define folder path
      $folder = '/uploads/page';
      $uploadedData = $this->uploadOne($image, $folder);
      // dd( $uploadedData );
    }   

      $pageContent = new PageContent();
      $pageContent->menu_id = $this->menu ?? Null;
      $pageContent->submenu_id = $this->submenu ?? Null;
      $pageContent->heading = $this->heading ?? Null;
      $pageContent->slug =  strtolower(str_replace(' ', '-',$this->heading))?? Null;
      $pageContent->description = $this->desc ?? Null;
      $pageContent->image = $uploadedData['file_name'] ?? NULL;
      $pageContent->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
      $pageContent->link = $this->link ?? Null;
      $pageContent->sort_id =$this->sort ?? Null;
      $pageContent->status = $this->status ?? Null;
      $pageContent->save();
      $this->resetInputFields();
        $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Successfully save!', 
            ]); 
        // Emit the 'formSubmitted' event
        $this->emit('formSubmitted');
    }

     public function delete($id){

      $pageContent = PageContent::findOrFail($id);
      if(!is_null($pageContent)){
        $pageContent->delete();
      }

     }
}
