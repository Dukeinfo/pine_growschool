<?php

namespace App\Http\Livewire\Backend\Submenu;

use App\Models\Menu;
use App\Models\Submenu;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
class ViewSubMenu extends Component
{
  use WithFileUploads;

    public $image, $records, $getMenus,$menu_id ,$name ,$sort_id, $cms , $pname ,$status ;
    public   $url_link,$display_name ,$seo_title ,$clientIp ,$seo_description ,$seo_keywords; 
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
    private function resetInputFields(){
        $this->menu_id = '';
        $this->name = '';
        $this->sort_id = '';
        $this->cms = '';
        $this->pname = '';
        $this->status = '';
        $this->image ='';
        $this->url_link  ='';
        $this->display_name ='';
        $this->seo_title ='';
        $this->seo_keywords = '';
        $this->seo_description = '';
    }
    public function addsubMenu()
    {
      $validatedData = $this->validate();
      if(!is_null($this->image)){
        $fileName = time().'_'.$this->image->getClientOriginalName();
        $filePath = $this->image->storeAs('uploads', $fileName, 'public');

        // Create an instance of Intervention Image
        // $image = Image::make($this->image);
    
        // Resize the image to create the thumbnail
        // $thumbnailImage = $image->fit(200, 200); // Change the dimensions as per your requirement


      }   
      $submenu = new Submenu();
      $submenu->menu_id = $this->menu_id;
      $submenu->name = $this->name;
      $submenu->sort_id =$this->sort_id;
      $submenu->cms =$this->cms;
      $submenu->pname =$this->pname;
      $submenu->status = $this->status;
      $submenu->image =   $fileName ;
      $submenu->url_link =   $this->url_link ;
      $submenu->display_name =   $this->display_name ;
      $submenu->seo_title =   $this->seo_title ;
      $submenu->seo_keywords =   $this->seo_keywords ;
      $submenu->seo_description =   $this->seo_description ;
      $submenu->login =  Auth::user()->id;
      $submenu->ip_address =  $this->clientIp;
      $submenu->save();
      $this->resetInputFields(); 
     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
     
    } 

    public function delete($id){
        Submenu::destroy($id);
     }
}
