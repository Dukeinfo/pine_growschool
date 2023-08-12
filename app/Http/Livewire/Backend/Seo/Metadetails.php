<?php

namespace App\Http\Livewire\Backend\Seo;

use App\Models\Menu;
use App\Models\Metadetails as appMetadetails;
use Livewire\Component;

class Metadetails extends Component
{

    public $name ,$getMenus,$menu_id,$status,$seo_title,$seo_description,$seo_keywords ,$records;

    protected $rules = [
        'menu_id' => 'required', 
        'status' => 'required', 
        'seo_title' => 'required', 
        'seo_description' => 'required', 
        'seo_keywords' => 'required', 
     
      ];
      protected $messages = [
          'menu_id.required' => 'Menu Required.',
          'status.required' => 'Status Required.',
          'seo_title.required' => 'SEO title Required.',
          'seo_description.required' => 'SEO Description Required.',
          'seo_keywords.required' => 'SEO keywords Required.',
      ];
    private function resetInputFields(){
        $this->menu_id = '';
        $this->status = '';
        $this->seo_title = '';
        $this->seo_description = '';
        $this->seo_keywords = '';
    }

    public function render()
    {
        $this->getMenus = Menu::orderBy('sort_id','asc')->get();
        $this->records = appMetadetails::get();	 

        return view('livewire.backend.seo.metadetails')->layout('layouts.backend');
    }

    public function addMeta(){
	
      $validatedData = $this->validate();
    	
      $metadetails = new appMetadetails();
      $metadetails->menu_id = $this->menu_id;
      $metadetails->name = $this->name ?? Null;
      $metadetails->slug = strtolower(str_replace(' ', '-',$this->name))?? Null;
      $metadetails->status =$this->status;
      $metadetails->title = $this->seo_title;
      $metadetails->description = $this->seo_description;
      $metadetails->keywords = $this->seo_keywords;
      $metadetails->ip_address =getUserIp();
      $metadetails->login = authUserId();

      $metadetails->save();

      $this->resetInputFields(); 

      $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
          $this->emit('formSubmitted');
    }

     public function delete($id){

      $metadetails = appMetadetails::findOrFail($id);
      if(!is_null($metadetails)){
        $metadetails->delete();
      }

     }
}
