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

class ViewOurTopper extends Component
{
    use WithFileUploads;
    use UploadTrait;
    public $category,$name,$classname,$section,$percentage,$link,$image,$sort_id,$status;

    protected $rules = [
        'category' => 'required', 
        'name' => 'required', 
        'classname' => 'required',
        'section' => 'required',
        'percentage' => 'required',
        'image' => 'required', 
        'sort_id' => 'required', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'name.required' => 'Name Required.',
          'classname.required' => 'Class Required.',
          'section.required' => 'Section Required.',
          'percentage.required' => 'Percentage Required.',
          'image.required' => 'Image Required.',
          'sort_id.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->name = '';
        $this->classname = '';
        $this->section = '';
        $this->percentage = '';
        $this->image = '';
        $this->sort_id = '';
        $this->status = '';
    }

    public function addOurTopper(){
     $validatedData = $this->validate();
      if(!is_null($this->image)){
        $image =  $this->image;
        // Define folder path
        $folder = '/uploads/our-topper';
        $uploadedData = $this->uploadOne($image, $folder);
      }

      $ourTopper = new OurTopper();
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

      $this->resetInputFields(); 
      $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]);
    }

     public function delete($id){

      $ourTopper = OurTopper::findOrFail($id);
      if(!is_null($ourTopper)){
        $ourTopper->delete();
      }

     }

    public function render()
    {
    	$this->getClass = ClassMaster::orderBy('sort_id','asc')->where('status','Active')->get();	
    	 $this->getSection = SectionMaster::orderBy('sort_id','asc')->where('status','Active')->get();	
    	 $this->records = OurTopper::orderBy('sort_id','asc')->get();	
        return view('livewire.backend.gallery.view-our-topper')->layout('layouts.backend');
    }
}
