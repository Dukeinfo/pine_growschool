<?php

namespace App\Http\Livewire\Backend\Submenu;

use Livewire\Component;
use App\Models\Menu;
use App\Models\Submenu;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
class EditSubMenu extends Component
{
  use WithFileUploads;

  public  $submenuId ,$image, $records, $getMenus,$menu_id ,$name ,$sort_id, $cms , $pname ,$status ;
  public   $url_link,$display_name ,$seo_title ,$clientIp ,$seo_description ,$seo_keywords; 
  public $editimage;
     public function mount($id){
        $submenu = Submenu::findOrFail($id);
        $this->submenuId = $submenu->id;
        $this->menu_id = $submenu->menu_id;
        $this->name = $submenu->name;
        $this->image = $submenu->name;
         $this->thumbnail = $submenu->thumbnail;
         $this->url_link = $submenu->url_link;
         $this->display_name = $submenu->display_name;
         $this->seo_title = $submenu->seo_title;  
        $this->seo_description = $submenu->seo_description;
        $this->seo_keywords = $submenu->seo_keywords;   


        $this->sort_id = $submenu->sort_id;
        $this->cms = $submenu->cms;
    	$this->pname = $submenu->pname;
    	$this->status = $submenu->status;
     } 

     public function render(Request $request)
     {
       $this->clientIp = $request->ip();
    	 $this->getMenus = Menu::get();
        return view('livewire.backend.submenu.edit-sub-menu')->layout('layouts.backend');
    }


      public function editsubMenu()
    {
      if(!is_null($this->editimage)){
       
           // Generate a unique name for the image
        $imageName =  uniqid() . '.' . $this->editimage->getClientOriginalExtension();

        // Get the path where you want to save the image and thumbnail
        $directory = public_path('uploads/thumbnail');

        // Check if the directory exists, if not, create it
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true, true);
        }
        // Save the original image to the specified directory
        $this->editimage->storeAs('uploads', $imageName, 'public');
        // Generate a thumbnail and save it to the specified directory
        $thumbnailName = 'thumb_' . $imageName;
        Image::make($this->editimage)->fit(200, 200)->save($directory . '/' . $thumbnailName);

        // Set the thumbnail property to the thumbnail image name
        // $this->thumbnail = $thumbnailName;
     

      $submenu = Submenu::find($this->submenuId);

      $submenu->menu_id = $this->menu_id;
      $submenu->name = $this->name;
      $submenu->sort_id =$this->sort_id;
      $submenu->cms =$this->cms;
      $submenu->pname =$this->pname;
      $submenu->status = $this->status;
      $submenu->image =   $imageName ?? NULL;
      $submenu->thumbnail =   $thumbnailName ?? NULL;
      $submenu->url_link =   $this->url_link ;
      $submenu->display_name =   $this->display_name ;
      $submenu->seo_title =   $this->seo_title ;
      $submenu->seo_keywords =   $this->seo_keywords ;
      $submenu->seo_description =   $this->seo_description ;
      $submenu->login =  Auth::user()->id;
      $submenu->ip_address =  $this->clientIp;
      $submenu->save();
  

      }  else{

      $submenu = Submenu::find($this->submenuId);

      $submenu->menu_id = $this->menu_id;
      $submenu->name = $this->name;
      $submenu->sort_id =$this->sort_id;
      $submenu->cms =$this->cms;
      $submenu->pname =$this->pname;
      $submenu->status = $this->status;

      $submenu->url_link =   $this->url_link ;
      $submenu->display_name =   $this->display_name ;
      $submenu->seo_title =   $this->seo_title ;
      $submenu->seo_keywords =   $this->seo_keywords ;
      $submenu->seo_description =   $this->seo_description ;
      $submenu->login =  Auth::user()->id;
      $submenu->ip_address =  $this->clientIp;
      $submenu->save();

     
      }
          $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Successfully updated!', 
            ]); 
      return redirect()->route('view_subnmenu'); 
      }

      
}
