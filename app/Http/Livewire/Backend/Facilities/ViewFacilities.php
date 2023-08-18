<?php

namespace App\Http\Livewire\Backend\Facilities;

use Livewire\Component;
use App\Models\Facilities;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\UploadTrait;
class ViewFacilities extends Component
{
    use UploadTrait;	
	  use WithFileUploads;

    public $image,$title,$desc,$link,$sort,$status;

    protected $rules = [
        'image' => 'required', 
        'title' => 'required', 
        'sort' => 'required', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'image.required' => 'Image Required.',
          'title.required' => 'Title Required.',
          'desc.required' => 'Message Required.',
          'sort.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->image = '';
        $this->title = '';
        $this->desc = '';
        $this->link = '';
        $this->sort = '';
        $this->status = '';
    }

   public function addFacilities()
    {

    $validatedData = $this->validate();

     if(!is_null($this->image)){
         $image =  $this->image;
        // Define folder path
        $folder = '/uploads/facility';
        $uploadedData = $this->uploadOne($image, $folder);   
      }

      $facilities = new Facilities();
      $facilities->image = $uploadedData['file_name'];
      $facilities->thumbnail = $uploadedData['thumbnail_name'];
      $facilities->title = $this->title;
      $facilities->description = $this->desc;
      $facilities->link = $this->link;
      $facilities->sort_id =$this->sort;
      $facilities->status = $this->status;
      $facilities->save();

      $this->resetInputFields(); 

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
          $this->emit('formSubmitted');
    } 

    public function delete($id){

      $facilities = Facilities::findOrFail($id);
      if(!is_null($facilities)){
        $facilities->delete();
      }

     }

    public function render()
    {
       $this->records = Facilities::orderBy('sort_id','asc')->get();	
       return view('livewire.backend.facilities.view-facilities')->layout('layouts.backend');
    }
}
