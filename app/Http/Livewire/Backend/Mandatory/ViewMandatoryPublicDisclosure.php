<?php

namespace App\Http\Livewire\Backend\Mandatory;

use Livewire\Component;
use App\Models\GeneralInformation;
use App\Models\DocumentInformation;
use App\Models\ResultAcademics;
use App\Models\ResultClassx;
use App\Models\ResultClassxi;
use App\Models\StaffInformation;
use App\Models\SchoolInfrastructure;

use App\Traits\UploadTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Response;
class ViewMandatoryPublicDisclosure extends Component
{

  use UploadTrait;  
   use WithFileUploads;

   public $editID;

     //GENERAL INFORMATION
   public $school_name,$application_no,$school_code,$school_add,$principal_detail,$school_email,$school_phone;


   //DOCUMENT INFORMATION
   public $editdoc1,$editdoc2,$editdoc3,$editdoc4,$editdoc5,$editdoc6,$editdoc7,$editdoc8;

   //DOCUMENT INFORMATION RESULT AND ACADEMICS
   public $editdoc1_aca,$editdoc2_aca,$editdoc3_aca,$editdoc4_aca,$editdoc5_aca;

   //STAFF INFORMATION
   public $principal_name,$school_teachers,$school_pgt,$school_tgt,$school_prt,$school_ratio,$school_educator,$school_cousellor;

   //SCHOOLINFRASTRUCTURE
   public $school_area,$school_rooms,$school_labs,$school_internet,$toilet_girls,$toilet_boys,$school_youtube;

   //LISTENER FOR SHOW LATEST UPDATED RECORD OF RESULT
   protected $listeners = ['showResult' => 'mount'];

   public function mount()
    {
    //display all general information feilds if exists
    $count = GeneralInformation::count();
    if($count > 0){
    $firstRow = GeneralInformation::first();
    $record = GeneralInformation::find($firstRow->id);
    $this->editID = $record->id;
    $this->school_name = $record->school_name;
    $this->application_no = $record->application_no;
    $this->school_code = $record->school_code;
    $this->school_add = $record->school_add;
    $this->principal_detail = $record->principal_detail;
    $this->school_email = $record->school_email;
    $this->school_phone = $record->school_phone;

    //display all document information if exists
    $document = DocumentInformation::where('general_information_id', $firstRow->id)->first();
    $this->doc1 = $document->doc1;
    $this->doc2 = $document->doc2;
    $this->doc3 = $document->doc3;
    $this->doc4 = $document->doc4;
    $this->doc5 = $document->doc5;
    $this->doc6 = $document->doc6;
    $this->doc7 = $document->doc7;
    $this->doc8 = $document->doc8;
 
    //display all result academics information if exists
    $resultacademics = ResultAcademics::where('general_information_id', $firstRow->id)->first();
    $this->doc1_aca= $resultacademics->doc1;
    $this->doc2_aca = $resultacademics->doc2;
    $this->doc3_aca = $resultacademics->doc3;
    $this->doc4_aca = $resultacademics->doc4;
    $this->doc5_aca = $resultacademics->doc5;

    //display all RESULT CLASS: X if exists
    $this->resultData = ResultClassx::where('general_information_id', $firstRow->id)->get();

    //display all RESULT CLASS: XII if exists
    $this->resultDataII = ResultClassxi::where('general_information_id', $firstRow->id)->get();
   

    //display all result academics information if exists
    $staffinformation = StaffInformation::where('general_information_id', $firstRow->id)->first();
    $this->principal_name= $staffinformation->principal_name;
    $this->school_teachers = $staffinformation->school_teachers;
    $this->school_pgt = $staffinformation->school_pgt;
    $this->school_tgt = $staffinformation->school_tgt;
    $this->school_prt = $staffinformation->school_prt;
    $this->school_ratio = $staffinformation->school_ratio;
    $this->school_educator = $staffinformation->school_educator;
    $this->school_cousellor = $staffinformation->school_cousellor;

     //display all result academics information if exists
    $infrastructure = SchoolInfrastructure::where('general_information_id', $firstRow->id)->first();
    $this->school_area= $infrastructure->school_area;
    $this->school_rooms = $infrastructure->school_rooms;
    $this->school_labs = $infrastructure->school_labs;
    $this->school_internet = $infrastructure->school_internet;
    $this->toilet_girls = $infrastructure->toilet_girls;
    $this->toilet_boys = $infrastructure->toilet_boys;
    $this->school_youtube = $infrastructure->school_youtube;
    }

   
    $this->add(1);  //first row
    $this->add(1);  //second row
    $this->add(1);  //third row
    $this->add(1);  //fourth row 

    $this->addother(1);  //first row
    $this->addother(1); //second row
    $this->addother(1); //third row
    $this->addother(1); //fourth row
       
    }


   //RESULT CLASS: X
   public $inputs = [];
   public $i = 1;

      public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

  //RESULT CLASS: X
   public $inputother = [];
   public $ii = 1;


   public function addother($ii)
    {
        $ii = $ii + 1;
        $this->ii = $ii;
        array_push($this->inputother ,$ii);
    }

    public function editRecord(){
         //GENERAL INFORMATION
      $generalInformation =GeneralInformation::find($this->editID);
      $generalInformation->school_name = $this->school_name;
      $generalInformation->application_no = $this->application_no;
      $generalInformation->school_code = $this->school_code;
      $generalInformation->school_add = $this->school_add;
      $generalInformation->principal_detail = $this->principal_detail;
      $generalInformation->school_email = $this->school_email;
      $generalInformation->school_phone = $this->school_phone;
      $generalInformation->save();
    
      //DOCUMENT INFORMATION
       if(!is_null($this->editdoc1)){
            $doc1 = time().'_'.$this->editdoc1->getClientOriginalName();
            $filePath = $this->editdoc1->storeAs('uploads/document', $doc1, 'public');
             DocumentInformation::where('general_information_id', $this->editID)->update([
             'doc1' => $doc1 , 
              ]);
       }
       if(!is_null($this->editdoc2)){
            $doc2 = time().'_'.$this->editdoc2->getClientOriginalName();
            $filePath = $this->editdoc2->storeAs('uploads/document', $doc2, 'public');
            DocumentInformation::where('general_information_id', $this->editID)->update([
             'doc2' => $doc2 , 
              ]);
       }
      if(!is_null($this->editdoc3)){
            $doc3 = time().'_'.$this->editdoc3->getClientOriginalName();
            $filePath = $this->editdoc3->storeAs('uploads/document', $doc3, 'public');
            DocumentInformation::where('general_information_id', $this->editID)->update([
             'doc3' => $doc3 , 
              ]);
       }
      if(!is_null($this->editdoc4)){
            $doc4 = time().'_'.$this->editdoc4->getClientOriginalName();
            $filePath = $this->editdoc4->storeAs('uploads/document', $doc4, 'public');
             DocumentInformation::where('general_information_id', $this->editID)->update([
             'doc4' => $doc4 , 
              ]);
       }
     if(!is_null($this->editdoc5)){
            $doc5 = time().'_'.$this->editdoc5->getClientOriginalName();
            $filePath = $this->editdoc5->storeAs('uploads/document', $doc5, 'public');
             DocumentInformation::where('general_information_id', $this->editID)->update([
             'doc5' => $doc5 , 
              ]);
       }
    if(!is_null($this->editdoc6)){
            $doc6 = time().'_'.$this->editdoc6->getClientOriginalName();
            $filePath = $this->editdoc6->storeAs('uploads/document', $doc6, 'public');
            DocumentInformation::where('general_information_id', $this->editID)->update([
             'doc6' => $doc6 , 
              ]);
       }  
     if(!is_null($this->editdoc7)){
            $doc7 = time().'_'.$this->editdoc7->getClientOriginalName();
            $filePath = $this->editdoc7->storeAs('uploads/document', $doc7, 'public');
            DocumentInformation::where('general_information_id', $this->editID)->update([
             'doc7' => $doc7 , 
              ]);
       } 
      if(!is_null($this->editdoc8)){
            $doc8 = time().'_'.$this->editdoc8->getClientOriginalName();
            $filePath = $this->editdoc8->storeAs('uploads/document', $doc8, 'public');
            DocumentInformation::where('general_information_id', $this->editID)->update([
             'doc8' => $doc8 , 
              ]);
       }   
   


    //RESULT AND ACADEMICS DOCUMENT INFORMATON
    
       if(!is_null($this->editdoc1_aca)){
            $doc1_aca = time().'_'.$this->editdoc1_aca->getClientOriginalName();
            $filePath = $this->editdoc1_aca->storeAs('uploads/document', $doc1_aca, 'public');
            ResultAcademics::where('general_information_id', $this->editID)->update([
             'doc1' => $doc1_aca , 
              ]);
       }
       if(!is_null($this->editdoc2_aca)){
            $doc2_aca = time().'_'.$this->editdoc2_aca->getClientOriginalName();
            $filePath = $this->editdoc2_aca->storeAs('uploads/document', $doc2_aca, 'public');
             ResultAcademics::where('general_information_id', $this->editID)->update([
             'doc2' => $doc2_aca , 
              ]);
       }
      if(!is_null($this->editdoc3_aca)){
            $doc3_aca = time().'_'.$this->editdoc3_aca->getClientOriginalName();
            $filePath = $this->editdoc3_aca->storeAs('uploads/document', $doc3_aca, 'public');
            ResultAcademics::where('general_information_id', $this->editID)->update([
             'doc3' => $doc3_aca , 
              ]);
       }
      if(!is_null($this->editdoc4_aca)){
            $doc4_aca = time().'_'.$this->editdoc4_aca->getClientOriginalName();
            $filePath = $this->editdoc4_aca->storeAs('uploads/document', $doc4_aca, 'public');
             ResultAcademics::where('general_information_id', $this->editID)->update([
             'doc4' => $doc4_aca , 
              ]);
       }
     if(!is_null($this->editdoc5_aca)){
            $doc5_aca = time().'_'.$this->editdoc5_aca->getClientOriginalName();
            $filePath = $this->editdoc5_aca->storeAs('uploads/document', $doc5_aca, 'public');
              ResultAcademics::where('general_information_id', $this->editID)->update([
             'doc5' => $doc5_aca , 
              ]);
       }   
        
    //STAFF INFORMATION
    StaffInformation::where('general_information_id', $this->editID)->update([
             'principal_name' => $this->principal_name , 
             'school_teachers' => $this->school_teachers , 
             'school_pgt' => $this->school_pgt , 
             'school_tgt' => $this->school_tgt , 
             'school_prt' => $this->school_prt ,
             'school_ratio' => $this->school_ratio ,
             'school_educator' => $this->school_educator ,  
             'school_cousellor' => $this->school_cousellor ,  
              ]);

    //SCHOOL INFRASTRUCTURE
    SchoolInfrastructure::where('general_information_id', $this->editID)->update([
             'school_area' => $this->school_area , 
             'school_rooms' => $this->school_rooms , 
             'school_labs' => $this->school_labs , 
             'school_internet' => $this->school_internet , 
             'toilet_girls' => $this->toilet_girls ,
             'toilet_boys' => $this->toilet_boys ,
             'school_youtube' => $this->school_youtube ,    
              ]);

    $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]);



    }
   
 public function download($document){
       $path =  Storage::path('public/uploads/document/'. $document);
     return response()->download($path);

   } 
  
    public function render()
    {
        return view('livewire.backend.mandatory.view-mandatory-public-disclosure')->layout('layouts.backend');
    }
}
