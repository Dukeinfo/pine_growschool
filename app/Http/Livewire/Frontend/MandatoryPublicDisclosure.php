<?php

namespace App\Http\Livewire\Frontend;

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

use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
// OR with multi
use Artesaos\SEOTools\Facades\JsonLdMulti;

// OR use only single facades 
use Artesaos\SEOTools\Facades\SEOMeta;

use Artesaos\SEOTools\Facades\SEOTools;
use App\Models\Metadetails;
use App\Models\PageContent;
use Illuminate\Support\Facades\Route;

class MandatoryPublicDisclosure extends Component
{

   use UploadTrait;	
   use WithFileUploads;

   //GENERAL INFORMATION
   public $school_name,$application_no,$school_code,$school_add,$principal_detail,$school_email,$school_phone;
     public $pageData;
   //DOCUMENT INFORMATION
   public $doc1,$doc2,$doc3,$doc4,$doc5,$doc6,$doc7,$doc8;

   //DOCUMENT INFORMATION RESULT AND ACADEMICS
   public $doc1_aca,$doc2_aca,$doc3_aca,$doc4_aca,$doc5_aca;

   //STAFF INFORMATION
   public $principal_name,$school_teachers,$school_pgt,$school_tgt,$school_prt,$school_ratio,$school_educator,$school_cousellor;

   //SCHOOLINFRASTRUCTURE
   public $school_area,$school_rooms,$school_labs,$school_internet,$toilet_girls,$toilet_boys,$school_youtube;


   public function mount(){
     $getRouteName =  Route::currentRouteName(); 
     if($getRouteName){
         $seoMetaData =  Metadetails::where('name',$getRouteName )->first();
         SEOTools::setTitle($seoMetaData->title ?? 'Mandatory Public Disclosure');
         if($seoMetaData){
             SEOTools::setDescription($seoMetaData->description ?? '');
             SEOTools::opengraph()->setUrl(url()->current());
             SEOTools::setCanonical(url()->current());
             SEOTools::opengraph()->addProperty('type', 'website');
             SEOTools::twitter()->setSite($seoMetaData->title ?? '');
             $keywords = $seoMetaData->keywords ?? '';
             SEOMeta::addKeyword( $keywords);
         }
         $this->pageData =  PageContent::where('name',$getRouteName )->first();   

     }
   
}
   public $toAdd = [];

   public function store(){


      //GENERAL INFORMATION
      $generalInformation = new GeneralInformation();
      $generalInformation->school_name = $this->school_name;
      $generalInformation->application_no = $this->application_no;
      $generalInformation->school_code = $this->school_code;
      $generalInformation->school_add = $this->school_add;
      $generalInformation->principal_detail = $this->principal_detail;
      $generalInformation->school_email = $this->school_email;
      $generalInformation->school_phone = $this->school_phone;
      $generalInformation->save();


       //DOCUMENT INFORMATION
       if(!is_null($this->doc1)){
            $doc1 = time().'_'.$this->doc1->getClientOriginalName();
            $filePath = $this->doc1->storeAs('uploads/document', $doc1, 'public');
       }
       if(!is_null($this->doc2)){
            $doc2 = time().'_'.$this->doc2->getClientOriginalName();
            $filePath = $this->doc2->storeAs('uploads/document', $doc2, 'public');
       }
      if(!is_null($this->doc3)){
            $doc3 = time().'_'.$this->doc3->getClientOriginalName();
            $filePath = $this->doc3->storeAs('uploads/document', $doc3, 'public');
       }
      if(!is_null($this->doc4)){
            $doc4 = time().'_'.$this->doc4->getClientOriginalName();
            $filePath = $this->doc4->storeAs('uploads/document', $doc4, 'public');
       }
     if(!is_null($this->doc5)){
            $doc5 = time().'_'.$this->doc5->getClientOriginalName();
            $filePath = $this->doc5->storeAs('uploads/document', $doc5, 'public');
       }
    if(!is_null($this->doc6)){
            $doc6 = time().'_'.$this->doc6->getClientOriginalName();
            $filePath = $this->doc6->storeAs('uploads/document', $doc6, 'public');
       }  
     if(!is_null($this->doc7)){
            $doc7 = time().'_'.$this->doc7->getClientOriginalName();
            $filePath = $this->doc7->storeAs('uploads/document', $doc7, 'public');
       } 
      if(!is_null($this->doc8)){
            $doc8 = time().'_'.$this->doc8->getClientOriginalName();
            $filePath = $this->doc8->storeAs('uploads/document', $doc8, 'public');
       }      

         $document = new DocumentInformation();
         $document->general_information_id = $generalInformation->id;
         $document->doc1 = $doc1 ?? Null;
	     $document->doc2 = $doc2 ?? Null;
	     $document->doc3 = $doc3 ?? Null;
	     $document->doc4 = $doc4 ?? Null;
	     $document->doc5 = $doc5 ?? Null;
	     $document->doc6 = $doc6 ?? Null;
	     $document->doc7 = $doc7 ?? Null;
	     $document->doc8 = $doc8 ?? Null;
	     $document->save(); 

      //DOCUMENT INFORMATION RESULT AND ACADEMICS
       if(!is_null($this->doc1_aca)){
            $doc1_aca = time().'_'.$this->doc1_aca->getClientOriginalName();
            $filePath = $this->doc1_aca->storeAs('uploads/document', $doc1_aca, 'public');
       }
       if(!is_null($this->doc2_aca)){
            $doc2_aca = time().'_'.$this->doc2_aca->getClientOriginalName();
            $filePath = $this->doc2_aca->storeAs('uploads/document', $doc2_aca, 'public');
       }
      if(!is_null($this->doc3_aca)){
            $doc3_aca = time().'_'.$this->doc3_aca->getClientOriginalName();
            $filePath = $this->doc3_aca->storeAs('uploads/document', $doc3_aca, 'public');
       }
      if(!is_null($this->doc4_aca)){
            $doc4_aca = time().'_'.$this->doc4_aca->getClientOriginalName();
            $filePath = $this->doc4_aca->storeAs('uploads/document', $doc4_aca, 'public');
       }
     if(!is_null($this->doc5_aca)){
            $doc5_aca = time().'_'.$this->doc5_aca->getClientOriginalName();
            $filePath = $this->doc5_aca->storeAs('uploads/document', $doc5_aca, 'public');
       }

         $documentaca = new ResultAcademics();
         $documentaca->general_information_id = $generalInformation->id;
         $documentaca->doc1 = $doc1_aca ?? Null;
	       $documentaca->doc2 = $doc2_aca ?? Null;
	       $documentaca->doc3 = $doc3_aca ?? Null;
	       $documentaca->doc4 = $doc4_aca ?? Null;
	       $documentaca->doc5 = $doc5_aca ?? Null;
	       $documentaca->save();

      //STAFF INFORMATION
      $staffInformation = new StaffInformation();
      $staffInformation->general_information_id = $generalInformation->id;
      $staffInformation->principal_name = $this->principal_name;
      $staffInformation->school_teachers = $this->school_teachers;
      $staffInformation->school_pgt = $this->school_pgt;
      $staffInformation->school_tgt = $this->school_tgt;
      $staffInformation->school_prt = $this->school_prt;
      $staffInformation->school_ratio = $this->school_ratio;
      $staffInformation->school_educator = $this->school_educator;
      $staffInformation->school_cousellor = $this->school_cousellor;
      $staffInformation->save();

      //SCHOOL INFRASTRUCTURE
      $schoolInfrastructure = new SchoolInfrastructure();
      $schoolInfrastructure->general_information_id = $generalInformation->id;
      $schoolInfrastructure->school_area = $this->school_area;
      $schoolInfrastructure->school_rooms = $this->school_rooms;
      $schoolInfrastructure->school_labs = $this->school_labs;
      $schoolInfrastructure->school_internet = $this->school_internet;
      $schoolInfrastructure->toilet_girls = $this->toilet_girls;
      $schoolInfrastructure->toilet_boys = $this->toilet_boys;
      $schoolInfrastructure->school_youtube = $this->school_youtube;
      $schoolInfrastructure->save();

    
   	
   	
   }

    public function render()
    {
        return view('livewire.frontend.mandatory-public-disclosure')->layout('layouts.frontend');
    }
}
