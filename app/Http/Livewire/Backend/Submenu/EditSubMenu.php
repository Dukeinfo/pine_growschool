<?php

namespace App\Http\Livewire\Backend\Submenu;

use Livewire\Component;
use App\Models\Menu;
use App\Models\Submenu;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
class EditSubMenu extends Component
{
  use WithFileUploads;
  use UploadTrait;

  public  $submenuId ,$image, $records, $getMenus,$menu_id ,$name ,$sort_id, $cms , $pname ,$status ;
  public   $url_link,$display_name ,$seo_title ,$clientIp ,$seo_description ,$seo_keywords; 
  public $editimage, $thumbnail; 
     public function mount($id){
        $submenu = Submenu::findOrFail($id);
        $this->submenuId = $submenu->id;
        $this->menu_id = $submenu->menu_id;
        $this->name = $submenu->name;
        $this->image = $submenu->name;
         $this->thumbnail = $submenu->thumbnail;
         $this->url_link = $submenu->url_link;
         $this->display_name = $submenu->display_name;  //use slug here
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
        $image =  $this->editimage;
        // Define folder path
        $folder = '/uploads/submenu';
        $uploadedData = $this->uploadOne($image, $folder);
      $submenu = Submenu::find($this->submenuId);
      $submenu->menu_id = $this->menu_id;
      $submenu->name = $this->name;
      $submenu->sort_id =$this->sort_id;
      $submenu->cms =$this->cms;
      $submenu->pname =$this->pname;
      $submenu->status = $this->status;
      $submenu->image =   $uploadedData['file_name'] ?? NULL;
      $submenu->thumbnail =  $uploadedData['thumbnail_name'] ?? NULL;
      $submenu->url_link =   $this->url_link ;
      $submenu->display_name =   $this->display_name ;
      $submenu->slug =  $this->createSlug($this->display_name ?? NULL);
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
      $submenu->pname =$this->pname ?? NULL;
      $submenu->status = $this->status;

      $submenu->url_link =   $this->url_link ;
      $submenu->display_name =   $this->display_name ;
      $submenu->slug =  $this->createSlug($this->display_name ?? NULL);
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

           //CREATE SLUG
    public function createSlug($title, $id = 0)
       {
        $slug =  Str::slug($title);
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }

        $i = 1;
        $is_contain = true;
        do {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                $is_contain = false;
                return $newSlug;
            }
            $i++;
        } while ($is_contain);
      }


      //INCREMENT SLUG
      protected function getRelatedSlugs($slug, $id = 0)
      {
          return Submenu::select('slug')->where('slug', 'like', $slug.'%')
          ->where('id', '<>', $id)
          ->get();
      }


      
}
