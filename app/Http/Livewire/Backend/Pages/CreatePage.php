<?php

namespace App\Http\Livewire\Backend\Pages;

use Livewire\Component;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\CreatePage as appCreatePage;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\UploadTrait;
class CreatePage extends Component
{

   use UploadTrait; 
   use WithFileUploads;

   /*dynamic dependant deropdown*/
   public $menu=NULL;
   public $subMenus;

   public $sort_id ,$getMenus , $records , $submenu,$heading,$desc,$image,$link,$sort,$status;

    protected $rules = [ 
        'menu' => 'required', 
        // 'submenu' => 'required |unique:create_pages,submenu_id', 
        'heading' => 'required', 
        'desc' => 'required',
        // 'image' => 'required',
        'sort' => 'required', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'menu.required' => 'Menu Required.',
          'submenu.required' => 'Sub Menu Required.',
          // 'submenu.unique' => 'SubMenu Already taken',
          'heading.required' => 'Heading Required.',
          'desc.required' => 'Description Required.',
          // 'image.required' => 'Image Required.',
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
    	 $this->records = appCreatePage::orderBy('submenu_id')->get();
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

      if(!is_null($this->image)){
      $image =  $this->image;
 
      // Define folder path
      $folder = '/uploads/page';
      $uploadedData = $this->uploadOne($image, $folder);
      // dd( $uploadedData );
    }   

      $createPage = new appCreatePage();
      $createPage->menu_id = $this->menu ?? Null;
      $createPage->submenu_id = $this->submenu ?? Null;
      $createPage->heading = $this->heading ?? Null;
      $createPage->slug =  strtolower(str_replace(' ', '-',$this->heading))?? Null;
      $createPage->description = $this->desc ?? Null;
      $createPage->image = $uploadedData['file_name'] ?? NULL;
      $createPage->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
      $createPage->link = $this->link ?? Null;
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

     public function delete($id){

      $createPage = appCreatePage::findOrFail($id);
      if(!is_null($createPage)){
        $createPage->delete();
      }

     }

}
