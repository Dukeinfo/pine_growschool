<?php

namespace App\Http\Livewire\Backend\Staff;

use Livewire\Component;
use App\Models\Department;
use App\Models\Staff;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Type\NullType;
use Intervention\Image\Facades\Image;

class ViewStaff extends Component
{
  use UploadTrait;

    use WithFileUploads;
    public $department_id,$name,$designation, $image,$thumbnail, $sort,$status;
    public $departments ,$records;
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
      $image =  $this->image;
      // Define folder path
      $folder = '/uploads/staff';
      $uploadedData = $this->uploadOne($image, $folder);
    }  
    
      $staff = new Staff();
      $staff->department_id= $this->department_id ?? NULL;
      $staff->name = $this->name ?? NULL;
      $staff->designation = $this->designation ?? NULL;
      $staff->image =  $uploadedData['file_name']?? NULL;
      $staff->thumbnail =  $uploadedData['thumbnail_name']?? NULL;
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
