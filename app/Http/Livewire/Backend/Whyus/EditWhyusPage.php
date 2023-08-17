<?php

namespace App\Http\Livewire\Backend\Whyus;

use App\Models\MultipleImages;
use Livewire\Component;
use App\Models\Whyus;
use App\Models\WhyusItem;
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
    
    /*add row*/
    public $inputs = [];
    public $i = 1;

    public $whyusId,$category,$title,$sub_title,$heading,$image,$editimage,$desc,$link,$sort_id,$status ,$thumbnail;

     public $item;
     public $items ,$edit_multi_images = [] ,$getMultiple;


      public function mount($id){
        $whyus = Whyus::findOrFail($id);
        $this->whyusId = $whyus->id;
        $this->category = $whyus->category;
        $this->title = $whyus->title;
        $this->sub_title = $whyus->sub_title;
        $this->image = $whyus->image;
        $this->thumbnail = $whyus->thumbnail;
        $this->desc = $whyus->description;
        $this->sort_id = $whyus->sort_id;
    	  $this->status = $whyus->status;

       $this->getMultiple =    MultipleImages::where('whyus_id' ,  $this->whyusId)->get();

       
     }

        public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }


    public function remove($i)
     {
        unset($this->inputs[$i]);
     }

     public function deletemultiple($id){
        $image = MultipleImages::where('whyus_id' ,  $this->whyusId)->where('id',$id)->first();
        if(!is_null($image)){
          $image->delete();
        }
        return redirect(request()->header('Referer'));
     }


     public function editWhyus(){

    
     if(!is_null($this->editimage)){
      $image =  $this->editimage;
      // Define folder path
      $folder = '/uploads/whyus';
      $uploadedData = $this->uploadOne($image, $folder);

      $whyus =Whyus::find($this->whyusId);
      $whyus->category = $this->category;
      $whyus->title = $this->title;
      $whyus->sub_title = $this->sub_title;
      $whyus->slug =  $this->createSlug($this->title ?? NULL);
      $whyus->image = $uploadedData['file_name'] ?? NULL;
      $whyus->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
      $whyus->description = $this->desc;
      $whyus->link = $this->link;
      $whyus->sort_id =$this->sort_id;
      $whyus->status = $this->status;
      $whyus->save();


     } else{  

      $whyus =Whyus::find($this->whyusId);
      $whyus->category = $this->category;
      $whyus->title = $this->title;
      $whyus->sub_title = $this->sub_title;
      $whyus->slug =  $this->createSlug($this->title ?? NULL);
      $whyus->description = $this->desc;
      $whyus->link = $this->link;
      $whyus->sort_id =$this->sort_id;
      $whyus->status = $this->status;
      $whyus->save();


      }  


      
      if(!is_null($this->edit_multi_images ) && $this->edit_multi_images > 1){

  
        $folder = '/uploads/multiple_images';
      foreach ($this->edit_multi_images as $img) {
        // Define folder path
        $uploadedData = $this->uploadOne($img, $folder);
        $whyusItem = new MultipleImages();
        $whyusItem->whyus_id = $this->whyusId;
        $whyusItem->multi_images =  $uploadedData['file_name']?? NULL;
        $whyusItem->thumbnail =  $uploadedData['thumbnail_name'] ?? NULL;
        $whyusItem->link = $this->link;;
        $whyusItem->status = $this->status;
        $whyusItem->ip_address = getUserIp();
        $whyusItem->login = authUserId();
        $whyusItem->save();

     }
    }
      return redirect()->route('whyus_page'); 
     
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
