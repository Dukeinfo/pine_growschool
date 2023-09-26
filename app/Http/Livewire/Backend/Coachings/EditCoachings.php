<?php

namespace App\Http\Livewire\Backend\Coachings;

use Livewire\Component;
use App\Models\Coachings;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\UploadTrait;

class EditCoachings extends Component
{
	use UploadTrait;	
	use WithFileUploads;

     public $coachingId,$image,$editimage,$title,$desc,$link,$sort,$status;

    public function mount($id)
     {
        $coachings = Coachings::findOrFail($id);
        $this->coachingId = $coachings->id;
         $this->image = $coachings->image;
        $this->thumbnail = $coachings->thumbnail;
        $this->title = $coachings->title;
        $this->desc = $coachings->description;
         $this->link = $coachings->link;
    	$this->sort = $coachings->sort_id;
    	$this->status = $coachings->status;
     }

    public function editCoachings()
    {

     if(!is_null($this->editimage)){
         $editimage =  $this->editimage;
        // Define folder path
        $folder = '/uploads/coaching';
        $uploadedData = $this->uploadOne($editimage, $folder);  

      $coachings =Coachings::find($this->coachingId);
      $coachings->image = $uploadedData['file_name'];
      $coachings->thumbnail = $uploadedData['thumbnail_name'];
      $coachings->title = $this->title;
      $coachings->description = $this->desc;
      $coachings->link = $this->link;
      $coachings->sort_id =$this->sort;
      $coachings->status = $this->status;
      $coachings->save();

       return redirect()->route('view_coachings'); 

      }else{

      $coachings =Coachings::find($this->coachingId);
      $coachings->title = $this->title;
      $coachings->description = $this->desc;
      $coachings->sort_id =$this->sort;
      $coachings->status = $this->status;
      $coachings->save();

       return redirect()->route('view_coachings'); 

     }

    } 


    public function render()
    {
        return view('livewire.backend.coachings.edit-coachings')->layout('layouts.backend');
    }
}
