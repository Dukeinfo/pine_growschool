<?php

namespace App\Http\Livewire\Backend\Whyus;

use Livewire\Component;
use App\Models\Whyus;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

class EditWhyusPage extends Component
{

    use UploadTrait;	
    use WithFileUploads;

    public $whyusId,$title,$heading,$image,$editimage,$desc,$link,$sort_id,$status;


      public function mount($id){
        $whyus = Whyus::findOrFail($id);
        $this->whyusId = $whyus->id;
        $this->title = $whyus->title;
        $this->heading = $whyus->heading;
        $this->image = $whyus->image;
        $this->thumbnail = $whyus->thumbnail;
        $this->desc = $whyus->description;
        $this->sort_id = $whyus->sort_id;
    	$this->status = $whyus->status;
     }


     public function editWhyus(){

    
     if(!is_null($this->editimage)){
      $image =  $this->editimage;
      // Define folder path
      $folder = '/uploads/whyus';
      $uploadedData = $this->uploadOne($image, $folder);

      $whyus =Whyus::find($this->whyusId);
      $whyus->title = $this->title;
      $whyus->heading = $this->heading;
      $whyus->slug =  $this->createSlug($this->title ?? NULL);
      $whyus->image = $uploadedData['file_name'] ?? NULL;
      $whyus->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
      $whyus->description = $this->desc;
      $whyus->link = $this->link;
      $whyus->sort_id =$this->sort_id;
      $whyus->status = $this->status;
      $whyus->save();

      return redirect()->route('whyus_page'); 

     } else{  

      $whyus =Whyus::find($this->whyusId);
      $whyus->title = $this->title;
      $whyus->heading = $this->heading;
      $whyus->slug =  $this->createSlug($this->title ?? NULL);
      $whyus->description = $this->desc;
      $whyus->link = $this->link;
      $whyus->sort_id =$this->sort_id;
      $whyus->status = $this->status;
      $whyus->save();

      return redirect()->route('whyus_page'); 

      }  
     
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
          return Whyus::select('slug')->where('slug', 'like', $slug.'%')
          ->where('id', '<>', $id)
          ->get();
      }

    public function render()
    {
        return view('livewire.backend.whyus.edit-whyus-page')->layout('layouts.backend');
    }
}
