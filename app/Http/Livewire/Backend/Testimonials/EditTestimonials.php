<?php

namespace App\Http\Livewire\Backend\Testimonials;

use Livewire\Component;
use App\Models\Testimonials;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditTestimonials extends Component
{

    use WithFileUploads;

    public $testimoniaId,$name,$image,$editimage,$sort_id,$status,$desc;

    public function mount($id)
     {
        $testimonials = Testimonials::findOrFail($id);
        $this->testimoniaId = $testimonials->id;
        $this->name = $testimonials->name;
        $this->image = $testimonials->photo;
    	$this->sort_id = $testimonials->sort_id;
    	$this->status = $testimonials->status;
    	$this->desc = $testimonials->description;
     }

       public function editTestimonials() {
        if(!is_null($this->editimage)){
            if(isset($this->image)){
                $imagePath1 = Storage::path('public/uploads/'. $this->image);
              
                        if(File::exists($imagePath1)){
                            unlink($imagePath1);
                        }
                }
            $fileName = time().'_'.$this->editimage->getClientOriginalName();
            $filePath = $this->editimage->storeAs('uploads', $fileName, 'public');

            $testimonials = Testimonials::find($this->testimoniaId);
            $testimonials->name = $this->name;
            $testimonials->slug =  strtolower(str_replace(' ', '-',$this->name));
            $testimonials->photo = $fileName;
            $testimonials->sort_id =$this->sort_id;
            $testimonials->status = $this->status;
            $testimonials->description = $this->desc;
            $testimonials->save();
            
            return redirect()->route('view_testimonials'); 
 
        }
        else{
            $testimonials = Testimonials::find($this->testimoniaId);
            $testimonials->name = $this->name;
            $testimonials->slug =  strtolower(str_replace(' ', '-',$this->name));
            $testimonials->sort_id =$this->sort_id;
            $testimonials->status = $this->status;
            $testimonials->description = $this->desc;
            $testimonials->save();

            return redirect()->route('view_testimonials'); 
        }
        

     }
 

    public function render()
    {
        return view('livewire.backend.testimonials.edit-testimonials')->layout('layouts.backend');
    }
}
