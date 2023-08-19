<?php

namespace App\Http\Livewire\Backend\Testimonials;

use Livewire\Component;
use App\Models\Testimonials;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;



class ViewTestimonials extends Component
{
  
    use WithFileUploads;
    use UploadTrait;

    public $name,$image,$sort_id,$status,$desc ,$position, $link, $records;
    

    public function render()
    {
    
        $this->records =  Testimonials::orderBy('sort_id' ,'asc')->get();
        
        return view('livewire.backend.testimonials.view-testimonials')->layout('layouts.backend');
    }

    protected $rules = [ 
        'name' => 'required', 
        'image' => 'required', 
        'position' => 'required', 
        'sort_id' => 'required| unique:testimonials,sort_id',
        'status' => 'required', 
        'desc' => 'required', 
     
      ];
      protected $messages = [
          'name.required' => 'Name Required.',
          'image.required' => 'Image Required.',
          'sort_id.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
          'desc.required' => 'Description Required.',
      ];
    private function resetInputFields(){
        $this->name = '';
        $this->image = '';
        $this->position = '';
        $this->sort_id = '';
        $this->status = '';
        $this->desc = '';
        $this->link = '';
    }


    public function addTestimonials(){

     $validatedData = $this->validate();
     if(!is_null($this->image)){
      $image =  $this->image;
      // Define folder path
      $folder = '/uploads/testimonia';
      $uploadedData = $this->uploadOne($image, $folder);

    }   




      $testimonials = new Testimonials();
      $testimonials->name = $this->name;
      $testimonials->slug =  strtolower(str_replace(' ', '-',$this->name));
      $testimonials->photo = $uploadedData['file_name'] ?? Null;
      $testimonials->thumbnail = $uploadedData['thumbnail_name']?? Null;
      $testimonials->sort_id =$this->sort_id;
      $testimonials->status = $this->status;
      $testimonials->position = $this->position;
      $testimonials->description = $this->desc;
      $testimonials->link = $this->link;
      $testimonials->save();
      $this->resetInputFields();
        $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Successfully save!', 
            ]); 
            $this->emit('formSubmitted');
    }

     public function delete($id){
      $testimonial = Testimonials::findOrFail($id);
      if(!is_null($testimonial)){
        $testimonial->delete();
      }

     }

}
