<?php

namespace App\Http\Livewire\Backend\Seo;

use Livewire\Component;
use App\Models\Menu;
use App\Models\Metadetails;

class EditMetadetails extends Component
{

    public $metaId,$getMenus,$menu_id,$status,$seo_title,$seo_description,$seo_keywords;

  
    public function mount($id){
        $metadetails = Metadetails::findOrFail($id);
        $this->metaId = $metadetails->id;
        $this->menu_id = $metadetails->menu_id;
        $this->status = $metadetails->status;
        $this->seo_title = $metadetails->title;
        $this->seo_description = $metadetails->description;
        $this->seo_keywords = $metadetails->keywords;
     }

    public function render()
    {
    	 $this->getMenus = Menu::orderBy('sort_id','asc')->get();
        return view('livewire.backend.seo.edit-metadetails')->layout('layouts.backend');
    }

    public function editMeta(){
	    	
      $metadetails =Metadetails::find($this->metaId);
      $metadetails->menu_id = $this->menu_id;
      $metadetails->status =$this->status;
      $metadetails->title = $this->seo_title;
      $metadetails->description = $this->seo_description;
      $metadetails->keywords = $this->seo_keywords;
      $metadetails->save();

       return redirect()->route('manage_metadata'); 

      
    }
}
