<?php

namespace App\Http\Livewire\Backend\Staff;

use App\Exports\ExportStaff;
use App\Exports\SampleExport;
use Livewire\Component;
use App\Models\Department;
use App\Models\Staff;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Type\NullType;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StaffImport ;

class ViewStaff extends Component
{
    use UploadTrait;
    use WithFileUploads;
    public $file;
    public $department_id,$name,$designation,$description, $image,$thumbnail, $sort,$status;
    public $departments ,$records;
    public   $selectedFields = ['name', 'designation', 'image' ,'sort_id' ,'status']; 
    public  $customHeadings = ['Name', 'Designation', 'Image' ,'Sort id' ,'status']; 


    public function import()
    {
        $this->validate([
            'file' => 'required|mimes:xlsx,xls|max:2048',
        ]);

        try {
            Excel::import(new StaffImport, $this->file);
            session()->flash('success', 'staff imported successfully!');
            $this->file = null;
        } catch (\Exception $e) {
            session()->flash('error', 'Error importing staff members Please check your Excel file and try again.');
        }
    }


    public function export_staff(){
        //  $data = Staff::all(); // Replace 'Example' with your model
        return Excel::download(new ExportStaff($this->selectedFields, $this->customHeadings), 'Staff.xlsx');
   
    }

    public function sampleexport() {
            return Excel::download(new SampleExport(), 'sample.xlsx');
        }

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
        'description' => 'required',
     
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
        $this->description  = '';
        
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
      $staff->description = $this->description ?? NULL;
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
          $this->emit('formSubmitted');

        


   }

    public function delete($id){

      $staff = Staff::findOrFail($id);
      if(!is_null($staff)){
        $staff->delete();
      }

     }

}
