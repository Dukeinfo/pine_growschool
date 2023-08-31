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

class EditTransferCertificate extends Component
{

   use WithFileUploads;	

    public $editid,$year,$name,$classname,$section,$admno,$editdocument,$sort_id,$status;

      public function mount($id)
     {
        $certificate = TransferCertificate::findOrFail($id);
        $this->editId = $certificate->id;
        $this->year = $certificate->year;
        $this->name = $certificate->name;
        $this->classname = $certificate->class;
        $this->section = $certificate->section;
        $this->admno = $certificate->admission_no;
        $this->document = $certificate->file;
    	$this->sort_id = $certificate->sort_id;
    	$this->status = $certificate->status;
     }

    public function editCertificate(){

    if(!is_null($this->editdocument)){
            $fileName = time().'_'.$this->editdocument->getClientOriginalName();
            $filePath = $this->editdocument->storeAs('uploads/document', $fileName, 'public');
    
      $transferCertificate = TransferCertificate::find($this->editId);
      $transferCertificate->year = $this->year;
      $transferCertificate->name = $this->name;
      $transferCertificate->class = $this->classname;
      $transferCertificate->section = $this->section;
      $transferCertificate->admission_no = $this->admno;
      $transferCertificate->file = $fileName;
      $transferCertificate->sort_id =$this->sort_id;
      $transferCertificate->status = $this->status;
      $transferCertificate->save();

      return redirect()->route('transfer_certificate');

    }else{

      $transferCertificate = TransferCertificate::find($this->editId);
      $transferCertificate->year = $this->year;
      $transferCertificate->name = $this->name;
      $transferCertificate->class = $this->classname;
      $transferCertificate->section = $this->section;
      $transferCertificate->admission_no = $this->admno;
      $transferCertificate->sort_id =$this->sort_id;
      $transferCertificate->status = $this->status;
      $transferCertificate->save();

      return redirect()->route('transfer_certificate'); 

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

        return view('livewire.backend.certificate.edit-transfer-certificate', compact('years','currentYear'))->layout('layouts.backend');
    }

     public function download($document){
       $path =  Storage::path('public/uploads/document/'. $document);
     return response()->download($path);

   } 
}
