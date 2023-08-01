<?php

namespace App\Http\Livewire\Backend\Facilities;

use Livewire\Component;
use App\Models\Facilities;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\UploadTrait;

class EditFacilities extends Component
{
    use UploadTrait;	
	use WithFileUploads;

    public $facilityId,$image,$editimage,$title,$desc,$sort,$status;

    public function mount($id)
     {
        $facilities = Facilities::findOrFail($id);
        $this->facilityId = $facilities->id;
         $this->image = $facilities->image;
        $this->thumbnail = $facilities->thumbnail;
        $this->title = $facilities->title;
        $this->desc = $facilities->description;
    	$this->sort = $facilities->sort_id;
    	$this->status = $facilities->status;
     }

    public function editFacilities()
    {

     if(!is_null($this->editimage)){
         $editimage =  $this->editimage;
        // Define folder path
        $folder = '/uploads';
        $uploadedData = $this->uploadOne($editimage, $folder);  

      $facilities =Facilities::find($this->facilityId);
      $facilities->image = $uploadedData['file_name'];
      $facilities->thumbnail = $uploadedData['thumbnail_name'];
      $facilities->title = $this->title;
      $facilities->description = $this->desc;
      $facilities->sort_id =$this->sort;
      $facilities->status = $this->status;
      $facilities->save();

       return redirect()->route('view_facilities'); 

      }else{

      $facilities =Facilities::find($this->facilityId);
      $facilities->title = $this->title;
      $facilities->description = $this->desc;
      $facilities->sort_id =$this->sort;
      $facilities->status = $this->status;
      $facilities->save();

       return redirect()->route('view_facilities'); 

     }

    } 


    public function render()
    {
        return view('livewire.backend.facilities.edit-facilities')->layout('layouts.backend');
    }
}
