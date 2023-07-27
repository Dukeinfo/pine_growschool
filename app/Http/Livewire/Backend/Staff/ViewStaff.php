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

class ViewStaff extends Component
{

    use WithFileUploads;
    public $department_id,$name,$designation, $image,$thumbnail, $sort,$status;


    public function render()
    {
    	$this->departments = Department::get();
        $this->records=Staff::orderBy('sort_id' ,'asc')->get();
        return view('livewire.backend.staff.view-staff')->layout('layouts.backend');
    }
   
    protected $rules = [
        'name' => 'required',
        'designation' => 'required', 
        'image' => 'required', 
        'sort' => 'required', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'name.required' => 'Name Required.',
          'designation.required' => 'Designation Required.',
          'image.required' => 'Image Required.',
          'sort.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
         
      ];
    private function resetInputFields(){
        $this->name = '';
        $this->designation = '';
        $this->image = '';
        $this->sort = '';
        $this->status = '';
        
    }

    public function addStaff(){

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
    
      $staff = new Staff();
      $staff->department_id= $this->department_id ?? NULL;
      $staff->name = $this->name ?? NULL;
      $staff->designation = $this->designation ?? NULL;
      $staff->image = $imageName ?? NULL;
      $staff->thumbnail = $thumbnailName ?? NULL;
      $staff->sort_id =$this->sort ?? NULL;
      $staff->status = $this->status ?? NULL;
      $staff->save();

       $this->resetInputFields();

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 

        


   }

    public function delete($id){

      $staff = Staff::findOrFail($id);
      if(!is_null($staff)){
        $staff->delete();
      }

     }

}
