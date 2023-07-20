<?php

namespace App\Http\Livewire\Backend\Testimonials;

use Livewire\Component;
use App\Models\Testimonials;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ViewTestimonials extends Component
{
  
    use WithFileUploads;

    public $name,$image,$sort_id,$status,$desc;

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


    public function viewTestimonials(){

    	$validatedData = $this->validate();

      if(!is_null($this->image)){
      $fileName = time().'_'.$this->image->getClientOriginalName();
      $filePath = $this->image->storeAs('uploads', $fileName, 'public');
    
      $testimonials = new Testimonials();
      $testimonials->name = $this->name;
      $testimonials->slug =  strtolower(str_replace(' ', '-',$this->name));
      $testimonials->photo = $fileName;
      $testimonials->sort_id =$this->sort_id;
      $testimonials->status = $this->status;
      $testimonials->description = $this->desc;
      $testimonials->save();

      $this->resetInputFields();

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 

      }
    }

     public function delete($id){
            $delphoto = Testimonials::findOrFail($id);
            if(isset($delphoto->photo)){
                $photo = Storage::path('public/uploads/'. $delphoto->photo);
                    if(File::exists($photo)){
                        unlink($photo);
                    }
            }
            Testimonials::destroy($id);

     }

}
