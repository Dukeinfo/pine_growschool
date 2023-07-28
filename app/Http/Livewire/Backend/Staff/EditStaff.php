<?php

namespace App\Http\Livewire\Backend\Staff;

use Livewire\Component;
use App\Models\Department;
use App\Models\Staff;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Type\NullType;
use Intervention\Image\Facades\Image;

class EditStaff extends Component
{

    use WithFileUploads;
    public $staff_id,$department_id,$name,$designation, $image,$thumbnail, $editimage,$sort,$status;

    public function mount($id)
     {
        $staff = Staff::findOrFail($id);
        $this->staff_id = $staff->id;
        $this->department_id = $staff->department_id;
        $this->name = $staff->name;
        $this->designation = $staff->designation;
        $this->image = $staff->image;
        $this->thumbnail = $staff->thumbnail;
    	$this->sort = $staff->sort_id;
    	$this->status = $staff->status;
     }

     public function editStaff(){


     if(!is_null($this->editimage)){
           // Generate a unique name for the image
        $imageName =  uniqid() . '.' . $this->editimage->getClientOriginalExtension();

        // Get the path where you want to save the image and thumbnail
        $directory = public_path('uploads/thumbnail');

        // Check if the directory exists, if not, create it
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true, true);
        }
        // Save the original image to the specified directory
        $this->editimage->storeAs('uploads', $imageName, 'public');
        // Generate a thumbnail and save it to the specified directory
        $thumbnailName = 'thumb_' . $imageName;
        Image::make($this->editimage)->fit(200, 200)->save($directory . '/' . $thumbnailName);

        // Set the thumbnail property to the thumbnail image name
        // $this->thumbnail = $thumbnailName;
      $staff = Staff::find($this->staff_id);
      $staff->department_id= $this->department_id ?? NULL;
      $staff->name = $this->name ?? NULL;
      $staff->designation = $this->designation ?? NULL;
      $staff->image = $imageName ?? NULL;
      $staff->thumbnail = $thumbnailName ?? NULL;
      $staff->sort_id =$this->sort ?? NULL;
      $staff->status = $this->status ?? NULL;
      $staff->save();

      return redirect()->route('view_staff');  


    }  else{
    
      $staff = Staff::find($this->staff_id);
      $staff->department_id= $this->department_id ?? NULL;
      $staff->name = $this->name ?? NULL;
      $staff->designation = $this->designation ?? NULL;
      $staff->sort_id =$this->sort ?? NULL;
      $staff->status = $this->status ?? NULL;
      $staff->save();

      return redirect()->route('view_staff'); 
    }

   }

    public function render()
    {
      	$this->departments = Department::get();
        return view('livewire.backend.staff.edit-staff')->layout('layouts.backend');
    }
}
