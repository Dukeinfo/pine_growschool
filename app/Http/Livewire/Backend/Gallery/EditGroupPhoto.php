<?php

namespace App\Http\Livewire\Backend\Gallery;

use Livewire\Component;
use App\Models\GroupPhoto;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\UploadTrait;

class EditGroupPhoto extends Component
{
    use UploadTrait; 
    use WithFileUploads;

    public  $acadmic_year,$title,$image,$editimage,$sort_id,$status;

         public function mount($id)
	     {
	        $group_photo = GroupPhoto::findOrFail($id);
	        $this->editId = $group_photo->id;
          $this->acadmic_year = $group_photo->year;
	        $this->title = $group_photo->title;
          $this->image = $group_photo->image;
            $this->thumbnail = $group_photo->thumbnail;
	    	$this->sort_id = $group_photo->sort_id;
	    	$this->status = $group_photo->status;

	 }

	  public function groupPhoto(){
      
      if(!is_null($this->editimage)){
      $image =  $this->editimage;
      // Define folder path
      $folder = '/uploads/group_photo';
      $uploadedData = $this->uploadOne($image, $folder);



      $group_photo = GroupPhoto::find($this->editId);
      $group_photo->year = $this->acadmic_year ?? Null;
      $group_photo->title = $this->title ?? Null;
      $group_photo->image = $uploadedData['file_name'] ?? NULL;
      $group_photo->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
      $group_photo->sort_id =$this->sort_id ?? Null;
      $group_photo->status = $this->status ?? Null;
      $group_photo->save();
      }else{
      $group_photo =  GroupPhoto::find($this->editId);
      $group_photo->year = $this->acadmic_year ?? Null;
      $group_photo->title = $this->title ?? Null;
      $group_photo->sort_id =$this->sort_id ?? Null;
      $group_photo->status = $this->status ?? Null;
      $group_photo->save();
      }
     
   
      return redirect()->route('group_phptos');    

    }

    public function render()
    {
        return view('livewire.backend.gallery.edit-group-photo')->layout('layouts.backend');
    }
}
