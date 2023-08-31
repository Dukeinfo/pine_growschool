<?php

namespace App\Http\Livewire\Backend\Gallery;

use Livewire\Component;
use App\Models\GroupPhoto;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\UploadTrait;

class AddGroupPhoto extends Component
{
   use UploadTrait; 
   use WithFileUploads;

    public $acadmic_year,$title,$image,$sort_id,$status;

    protected $rules = [ 
        'acadmic_year' => 'required',
        'title' => 'required', 
        'image' => 'required',
        'sort_id' => 'required| unique:group_photos,sort_id', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'acadmic_year.required' => 'Acadmic Year Required.', 
          'title.required' => 'Title Required.',
          'image.required' => 'Image Required.',
          'sort_id.required' => 'Sort Id Required.',
          'status.required' => 'Status Required.',
          
      ];
    private function resetInputFields(){
        $this->year = '';
        $this->title = '';
        $this->image = '';
        $this->sort_id = '';
        $this->status = '';
       
    }


    public function groupPhoto(){

      $validatedData = $this->validate();

      if(!is_null($this->image)){
      $image =  $this->image;
 
      // Define folder path
      $folder = '/uploads/group_photo';
      $uploadedData = $this->uploadOne($image, $folder);
      // dd( $uploadedData );
    }   

      $group_photo = new GroupPhoto();
      $group_photo->year = $this->acadmic_year ?? Null;
      $group_photo->title = $this->title ?? Null;
      $group_photo->image = $uploadedData['file_name'] ?? NULL;
      $group_photo->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
      $group_photo->sort_id =$this->sort_id ?? Null;
      $group_photo->status = $this->status ?? Null;
      $group_photo->save();
      $this->resetInputFields();
        $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Successfully save!', 
            ]); 
        // Emit the 'formSubmitted' event
        $this->emit('formSubmitted');
    }



 public function delete($id){

      $groupPhoto = GroupPhoto::findOrFail($id);
      if(!is_null($groupPhoto)){
        $groupPhoto->delete();
      }

     }

    public function render()
    {
    	$this->records = GroupPhoto::orderBy('sort_id','asc')->get();
        return view('livewire.backend.gallery.add-group-photo')->layout('layouts.backend');
    }
}
