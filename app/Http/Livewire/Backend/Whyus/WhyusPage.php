<?php

namespace App\Http\Livewire\Backend\Whyus;

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

    public $title,$heading,$image,$desc,$link,$sort_id,$status;
    public $item;

    protected $rules = [
        'title' => 'required', 
        'heading' => 'required',
        'image' => 'required', 
        'desc' => 'required', 
        'sort_id' => 'required', 
        'status' => 'required', 
       
      ];
      protected $messages = [
          'title.required' => 'Title Required.',
          'heading.required' => 'Heading Required.',
          'image.required' => 'Image Required.',
          'desc.required' => 'Description Required.',
          'sort_id.required' => 'Sort Id Required.',
          'status.required' => 'Status Required.',
          
      ];
    private function resetInputFields(){
        $this->title = '';
        $this->heading = '';
        $this->image = '';
        $this->desc = '';
        $this->link = '';
        $this->sort_id = '';
        $this->status = '';
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

     $validatedData = $this->validate();
     if(!is_null($this->image)){
      $image =  $this->image;
      // Define folder path
      $folder = '/uploads/whyus';
      $uploadedData = $this->uploadOne($image, $folder);

    }   

      $whyus = new Whyus();
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


    if (is_array($this->item)){
      foreach ($this->item as $key => $value) {

         $whyusItem = new WhyusItem();
         $whyusItem->whyus_id = $whyus->id;
         $whyusItem->item = $this->item[$key];
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
