<?php

namespace App\Http\Livewire\Frontend;

use App\Jobs\SendStudentRegistrationEmail;
use App\Mail\StudentRegistration;
use App\Models\AdmissionForm as ModelsAdmissionForm;
use App\Models\PageContent;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
// OR with multi
use Artesaos\SEOTools\Facades\JsonLdMulti;
// OR use only single facades 
use Artesaos\SEOTools\Facades\SEOTools;
use App\Models\Metadetails;
use Illuminate\Support\Facades\Route;
class AdmissionForm extends Component
{

    public $name ,$gender ,$dateOfBirth ,$countryOfBirth ,$nationality ,$admissionSought ,
    $studyingIn ,$fatherName ,$fatherPhone ,$motherName ,$motherPhone ,$parentEmail ,$address ;
   
   public $pageData;
    public function mount(){

        $getRouteName =  Route::currentRouteName(); 
        if($getRouteName){
            $seoMetaData =  Metadetails::where('name',$getRouteName )->first();
            if($seoMetaData){
                
                SEOTools::setTitle($seoMetaData->title ?? 'About us');
                SEOTools::setDescription($seoMetaData->description ?? '');
                SEOTools::opengraph()->setUrl(url()->current());
                SEOTools::setCanonical(url()->current());
                SEOTools::opengraph()->addProperty('type', 'website');
                SEOTools::twitter()->setSite($seoMetaData->title ?? '');
                $keywords = $seoMetaData->keywords ?? '';
                SEOMeta::addKeyword( $keywords);
                // SEOTools::jsonLd()->addImage('https://pinegroveschool.org/pinegrove/public/assets/images/logo.png');
        
       }
       $this->pageData =  PageContent::where('name',$getRouteName )->first();   
    }
    
    }
   
    public function render()
    {
        return view('livewire.frontend.admission-form')->layout('layouts.frontend');
    }

    public function submitForm()
    {
        // Validation logic
        $this->validate([
            'name' => 'required',
            'gender' => 'required',
            'dateOfBirth' => 'required|date',
            'countryOfBirth' => 'required',
            'nationality' => 'required',
            'admissionSought' => 'required',
            'studyingIn' => 'required',
            'fatherName' => 'required',
            'fatherPhone' => 'required',
            'motherName' => 'required',
            'motherPhone' => 'required',
            'parentEmail' => 'required|email',
            'address' => 'required',
        ]);
// dd($this->all());
        // Save data to the database
        $admissionForm = ModelsAdmissionForm::create([
            'name' => $this->name,
            'gender' => $this->gender,
            'date_of_birth' => $this->dateOfBirth,
            'country_of_birth' => $this->countryOfBirth,
            'nationality' => $this->nationality,
            'admission_sought' => $this->admissionSought,
            'studying_in' => $this->studyingIn,
            'father_name' => $this->fatherName,
            'father_phone' => $this->fatherPhone,
            'mother_name' => $this->motherName,
            'mother_phone' => $this->motherPhone,
            'parent_email' => $this->parentEmail,
            'address' => $this->address,
        ]);

        // Send email to admin
        SendStudentRegistrationEmail::dispatch($admissionForm);

        // Clear form fields after submission
        $this->resetFields();

        // Display success message
        session()->flash('success', 'Form submitted successfully!');
    }

    private function resetFields()
    {
        // Reset form fields
        $this->name = '';
        $this->gender = '';
        $this->dateOfBirth = '';
        $this->countryOfBirth = '';
        $this->nationality = '';
        $this->admissionSought = '';
        $this->studyingIn = '';
        $this->fatherName = '';
        $this->fatherPhone = '';
        $this->motherName = '';
        $this->motherPhone = '';
        $this->parentEmail = '';
        $this->address = '';
    }
}
