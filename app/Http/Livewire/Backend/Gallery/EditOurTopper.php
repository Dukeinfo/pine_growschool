<?php

namespace App\Http\Livewire\Backend\Gallery;

use Livewire\Component;
use App\Models\ClassMaster;
use App\Models\SectionMaster;
use App\Models\OurTopper;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Type\NullType;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class EditOurTopper extends Component
{

    use WithFileUploads;
    use UploadTrait;
    public $ourtopperId,$category,$name,$classname,$section,$percentage,$link,$image,$sort_id,$status;

      public $editimage; 

      public function mount($id){
        $ourTopper = OurTopper::findOrFail($id);
        $this->ourtopperId = $ourTopper->id;
        $this->category = $ourTopper->category;
        $this->name = $ourTopper->name;
        $this->classname = $ourTopper->class;
        $this->section = $ourTopper->section;
        $this->percentage = $ourTopper->percentage;
        $this->link = $ourTopper->link;
        $this->image = $ourTopper->name;
        $this->thumbnail = $ourTopper->thumbnail;
        $this->sort_id = $ourTopper->sort_id;
    	$this->status = $ourTopper->status;
     } 

  public function editOurTopper(){
     
      if(!is_null($this->editimage)){
        $image =  $this->editimage;
        // Define folder path
        $folder = '/uploads/our-topper';
        $uploadedData = $this->uploadOne($image, $folder);

      $ourTopper =OurTopper::find($this->ourtopperId);
      $ourTopper->category = $this->category ?? NULL;
      $ourTopper->name = $this->name ?? NULL;
      $ourTopper->class = $this->classname ?? NULL;
      $ourTopper->section = $this->section ?? NULL;
      $ourTopper->percentage = $this->percentage ?? NULL;
      $ourTopper->link = $this->link ?? NULL;
      $ourTopper->image =$uploadedData['file_name'] ?? NULL;
      $ourTopper->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
      $ourTopper->sort_id =$this->sort_id ?? NULL;
      $ourTopper->status = $this->status ?? NULL;
      $ourTopper->save();

        return redirect()->route('view_our_topper'); 
      }

      else{
      $ourTopper =OurTopper::find($this->ourtopperId);
      $ourTopper->category = $this->category ?? NULL;
      $ourTopper->name = $this->name ?? NULL;
      $ourTopper->class = $this->classname ?? NULL;
      $ourTopper->section = $this->section ?? NULL;
      $ourTopper->percentage = $this->percentage ?? NULL;
      $ourTopper->link = $this->link ?? NULL;
      $ourTopper->sort_id =$this->sort_id ?? NULL;
      $ourTopper->status = $this->status ?? NULL;
      $ourTopper->save();

      return redirect()->route('view_our_topper'); 
      }
    }   

    public function render()
    {
    	$this->getClass = ClassMaster::orderBy('sort_id','asc')->where('status','Active')->get();	
    	 $this->getSection = SectionMaster::orderBy('sort_id','asc')->where('status','Active')->get();	
        return view('livewire.backend.gallery.edit-our-topper')->layout('layouts.backend');
    }
}
