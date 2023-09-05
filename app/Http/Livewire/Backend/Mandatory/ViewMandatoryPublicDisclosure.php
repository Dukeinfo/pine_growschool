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
class ViewMandatoryPublicDisclosure extends Component
{


   public $resultData=[];
   public $editStudentIndex=null; 

   protected $rules=[

    'resultData.*.year'=>['required'],

   ];

   protected $validationAttributes=[

    'resultData.*.year'=> 'year',

   ];

   public function editStudent($studentIndex){
      $this->editStudentIndex=$studentIndex;
   }


    public function saveStudent($studentIndex){

      $this->validate();  

      $Student=$this->resultData[$studentIndex];

      ResultClassx::find($Student['id'])->update([
          'year'  => $Student->year,

      ]);
      $this->editStudentIndex=null;
      $this->editStudentFeild=null;


   } 


   public function mount()
    {
    //display all general information feilds if exists
    $count = GeneralInformation::count();
    if($count > 0){
    $firstRow = GeneralInformation::first();
    $record = GeneralInformation::find($firstRow->id);
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

    //display all result academics information if exists
    $this->resultData = ResultClassx::where('general_information_id', $firstRow->id)->get();
   


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

   

    


 
    $this->add(1);
    $this->add(1);
    $this->add(1);
    $this->add(1);  

    $this->addother(1); 
    $this->addother(1); 
    $this->addother(1); 
    $this->addother(1); 
       
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

  
    public function render()
    {
        return view('livewire.backend.mandatory.view-mandatory-public-disclosure')->layout('layouts.backend');
    }
}
