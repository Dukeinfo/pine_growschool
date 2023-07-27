<?php

namespace App\Http\Livewire\Backend\Testimonials;

use Livewire\Component;
use App\Models\Testimonials;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ViewTestimonials extends Component
{
  
    use WithFileUploads;

    public $name,$image,$sort_id,$status,$desc ,$records;
    

    public function render()
    {
    
        $this->records =  Testimonials::orderBy('sort_id' ,'asc')->get();
        
        return view('livewire.backend.testimonials.view-testimonials')->layout('layouts.backend');
    }

    protected $rules = [ 
        'name' => 'required', 
        'image' => 'required', 
        'sort_id' => 'required',
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
        $this->sort_id = '';
        $this->status = '';
        $this->desc = '';
    }


    public function addTestimonials(){

     $validatedData = $this->validate();

     if(!is_null($this->image)){
        // Generate a unique name for the image
        $imageName =  uniqid() . '.' . $this->image->getClientOriginalExtension();

        // Get the path where you want to save the image and thumbnail
        $directory = public_path('uploads/thumbnail');

        // Check if the directory exists, if not, create it
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true, true);
        }

        // Save the original image to the specified directory
        $this->image->storeAs('uploads', $imageName, 'public');

        // Generate a thumbnail and save it to the specified directory
        $thumbnailName = 'thumb_' . $imageName;
        Image::make($this->image)->fit(200, 200)->save($directory . '/' . $thumbnailName);

        // Set the thumbnail property to the thumbnail image name
        // $this->thumbnail = $thumbnailName;
    }  


      $testimonials = new Testimonials();
      $testimonials->name = $this->name;
      $testimonials->slug =  strtolower(str_replace(' ', '-',$this->name));
      $testimonials->photo = $imageName ?? Null;
      $testimonials->thumbnail = $thumbnailName ?? Null;
      $testimonials->sort_id =$this->sort_id;
      $testimonials->status = $this->status;
      $testimonials->description = $this->desc;
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
