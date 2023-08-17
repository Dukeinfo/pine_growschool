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

class WhyusPage extends Component
{
    use UploadTrait;	
    use WithFileUploads;

    /*add row*/
    public $inputs = [];
    public $i = 1;

    public $category,$title,$sub_title,$image,$desc,$link,$sort_id,$status;
    public $item ,$records ,$multi_images =[];

    protected $rules = [
        'category' => 'required| unique:whyuses,category',
        'title' => 'required',  
        'sub_title' => 'required', 
        'desc' => 'required', 
        'sort_id' => 'required| unique:whyuses,sort_id', 
        'status' => 'required', 
       
      ];
      protected $messages = [
          'category.required' => 'Page Section Required.',
          'title.required' => 'Title Required.',
          'sub_title.required' => 'Sub Title Required.',
          // 'image.required' => 'Image Required.',
          'desc.required' => 'Description Required.',
          'sort_id.required' => 'Sort Id Required.',
          'status.required' => 'Status Required.',
          
      ];
    private function resetInputFields(){
        $this->category = '';
        $this->title = '';
        $this->sub_title = '';
        $this->image = null;
        $this->desc = '';
        $this->link = '';
        $this->sort_id = '';
        $this->status = '';
        $this->item ='';
        $this->multi_images =null;

        
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


    public function addWhyus(){
if($this->multi_images){
 $this->validate([
    'multi_images.*' => 'required', 

  ]);
}
$validatedData = $this->validate();

     if(!is_null($this->image)){
      $image =  $this->image;
 
      // Define folder path
      $folder = '/uploads/whyus';
      $uploadedData = $this->uploadOne($image, $folder);
      // dd( $uploadedData );
    }   



      $whyus = new Whyus();
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


      if(!is_null($this->multi_images ) && $this->multi_images > 1){

  
          $folder = '/uploads/multiple_images';
        foreach ($this->multi_images as $img) {
          // Define folder path
          $uploadedData = $this->uploadOne($img, $folder);
          $whyusItem = new MultipleImages();
          $whyusItem->whyus_id = $whyus->id;
          $whyusItem->multi_images =  $uploadedData['file_name']?? NULL;
          $whyusItem->thumbnail =  $uploadedData['thumbnail_name'] ?? NULL;
          $whyusItem->link = $this->link;;
          $whyusItem->status = $this->status;
          $whyusItem->ip_address = getUserIp();
          $whyusItem->login = authUserId();
          $whyusItem->save();
 
       }
      }

 

    

       $this->resetInputFields();

       $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 

    


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



     public function delete($id){

      $whyus = Whyus::findOrFail($id);
      if(!is_null($whyus)){
        $whyus->delete();
      }

     }

    public function render()
    {
        $this->records = Whyus::orderBy('sort_id','asc')->get();	
        return view('livewire.backend.whyus.whyus-page')->layout('layouts.backend');
    }
}
