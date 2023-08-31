<?php

namespace App\Http\Livewire\Backend\Certificate;

use Livewire\Component;
use App\Models\ClassMaster;
use App\Models\SectionMaster;
use App\Models\TransferCertificate;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Response;

class AddTransferCertificate extends Component
{

  use WithFileUploads;	

  public $year,$name,$classname,$section,$admno,$document,$sort_id,$status;

   protected $rules = [ 
        'year' => 'required', 
        'name' => 'required',
        'classname' => 'required',
        'section' => 'required',
        'admno' => 'required',
        'document' => 'required',
        'sort_id' => 'required| unique:transfer_certificates
,sort_id',
        'status' => 'required',    
     
      ];
      protected $messages = [
          'year.required' => 'Year Required.',
          'name.required' => 'name Required.',
          'classname.required' => 'Classname Required.',
          'section.required' => 'Section Required.',
          'admno.required' => 'Admission Number Required.',
          'document.required' => 'Document Required.',
          'sort_id.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->year = '';
        $this->name = '';
        $this->classname = '';
        $this->section = '';
        $this->admno = '';
        $this->docuemnt = '';
        $this->sort_id = '';
        $this->status = '';
        
    }

    public function addCertificate(){
    	$validatedData = $this->validate();
    	
    	if(!is_null($this->document)){
            $fileName = time().'_'.$this->document->getClientOriginalName();
            $filePath = $this->document->storeAs('uploads/document', $fileName, 'public');
         }

      $transferCertificate = new TransferCertificate();
      $transferCertificate->year = $this->year;
      $transferCertificate->name = $this->name;
      $transferCertificate->class = $this->classname;
      $transferCertificate->section = $this->section;
      $transferCertificate->admission_no = $this->admno;
      $transferCertificate->file = $fileName;
      $transferCertificate->sort_id =$this->sort_id;
      $transferCertificate->status = $this->status;
      $transferCertificate->save();

      $this->resetInputFields();

      $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]);
    }


     public function download($id){
       $getDownload = TransferCertificate::where('id', $id)->first();
       $path =  Storage::path('public/uploads/document/'. $getDownload->file);
       return response()->download($path);

   } 

     public function delete($id){

      $transferCertificate = TransferCertificate::findOrFail($id);
      if(!is_null($transferCertificate)){
        $transferCertificate->delete();
      }

     }


    public function render()
    {
      $years = [];
      $currentYear = date('Y');
      $endYear = $currentYear - 20;

      for ($year = $currentYear; $year >= $endYear; $year--) {
          $years[$year] = $year;
      }

      $this->getClass = ClassMaster::orderBy('sort_id','asc')->where('status','Active')->get();	
    	 $this->getSection = SectionMaster::orderBy('sort_id','asc')->where('status','Active')->get();	
     $this->records = TransferCertificate::orderBy('sort_id','asc')->get();	


        return view('livewire.backend.certificate.add-transfer-certificate', compact('years','currentYear'))->layout('layouts.backend');
    }

}
