<?php

namespace App\Http\Livewire\Backend\Submenu;

use App\Models\Menu;
use App\Models\Submenu;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
class ViewSubMenu extends Component
{
  use UploadTrait;
  use WithFileUploads;
    public $image = null; 
    public $seo_description = null;
    public  $records, $getMenus,$menu_id ,$name ,$sort_id, $cms , $pname ,$status ;
    public   $url_link,$display_name ,$seo_title ,$clientIp  ,$seo_keywords; 
    public function render(Request $request)
    {
      $this->clientIp = $request->ip();

        $this->getMenus = Menu::get();
        $this->records=Submenu::orderBy('sort_id' ,'asc')->get();

        return view('livewire.backend.submenu.view-sub-menu')->layout('layouts.backend');
    }

    protected $rules = [ 
        'menu_id' => 'required', 
        'name' => 'required', 
        'sort_id' => 'required | numeric',
        'cms' => 'required', 
        // 'pname' => 'required', 
        'status' => 'required', 
        'image' =>  'required|file', 
     
      ];
      protected $messages = [
          'menu_id.required' => 'Menu Required.',
          'name.required' => 'Name Required.',
          'sort_id.required' => 'Sort Required.',
          'cms.required' => 'CMS Required.',
          // 'pname.required' => 'Page name Required.',
          'status.required' => 'Status Required.',
          
      ];


    public function addsubMenu(){
    $validatedData = $this->validate();
      if(!is_null($this->image)){
        $image =  $this->image;
        // Define folder path
        $folder = '/uploads/submenu';
        $uploadedData = $this->uploadOne($image, $folder);

      }   
      $submenu = new Submenu([
        'menu_id' => $this->menu_id,
        'name' => $this->name,
        'sort_id' => $this->sort_id,
        'cms' => $this->cms,
        'pname' => $this->pname,
        'status' => $this->status,
        'image' => $uploadedData['file_name'],
        'thumbnail' => $uploadedData['thumbnail_name'],
        'url_link' => $this->url_link,
        'display_name' => $this->display_name,
        'seo_title' => $this->seo_title,
        'seo_keywords' => $this->seo_keywords,
        'seo_description' => $this->seo_description,
        'login' => Auth::user()->id,
        'ip_address' => $this->clientIp,
    ]);
        // Save the new Submenu record to the database
        $submenu->save();

        // Reset the form fields
        $this->resetFormFields();

        // Emit the 'formSubmitted' event
        $this->emit('formSubmitted');

        // Trigger the SweetAlert modal
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Successfully saved!',
        ]);
      // Reset the image property to null
      $this->image = null;
        // return   redirect(request()->header('Referer'));
    } 

    private function resetFormFields()
    {
        $this->menu_id = null;
        $this->name = null;
        $this->sort_id = null;
        $this->cms = null;
        $this->pname = null;
        $this->status = null;
        $this->url_link = null;
        $this->display_name = null;
        $this->seo_title = null;
        $this->seo_keywords = null;
        $this->seo_description = null;
    }
    public function delete($id){
         $smenu = Submenu::findOrFail($id);
          if(!is_null($smenu)){
           $smenu->delete();
          }
     }
}
