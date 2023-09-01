<?php

namespace App\Http\Livewire\Frontend;

use App\Jobs\ApplicationJob;
use App\Mail\ThankYouForSubmissionEmail;
use App\Models\ApplicationForm;
use App\Models\ClassMaster;
use App\Models\Experience;
use App\Models\SubjectTeach;
use App\Traits\UploadTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Career extends Component
{

    use UploadTrait;	
    use WithFileUploads;
    
    public $getSubjects ,$getClassname;
    public $experiences = [];

    public $applicationDate;
    
   // Personal Information
   public $application_date;
   public $date_of_birth;
   public $marital_status;
   public $name;
   public $email;

   public $address;
   public $mobile_no;
   public $phone_no;
   public $landline_no;

   // Educational Information
   public $post_group;
   public $post_name;
   public $can_teach;
   public $upto_class;
   
   // 10th Grade Information
   public $stream_10th;
   public $subject_10th;
   public $university_10th;
   public $percentage_10th;

   // 12th Grade Information
   public $stream_12;
   public $subject_12;
   public $university_12;
   public $percentage_12;

   // Graduation Information
   public $stream_graduation;
   public $subject_graduation;
   public $university_graduation;
   public $percentage_graduation;

   // Post Graduation Information
   public $stream_post_graduation;
   public $subject_post_graduation;
   public $university_post_graduation;
   public $percentage_post_graduation;

   // B.Ed Information
   public $stream_bed;
   public $subject_bed;
   public $university_bed;
   public $percentage_bed;

   // Other Details
   public $other_details;
   public $expected_accommodation;
   public $futurePlans;
   public $future_plans;
   public $associated_with_pinegrove;
   public $photo;
   public  $current_job;
   public  $present_salary;
   public  $expected_salary;

   
   protected $rules = [
    // Personal Information
    'application_date' => 'required|date',
    'date_of_birth' => 'required|date',
    'marital_status' => 'required',
    'address' => 'required',
    'name' => 'required',
    'email' => 'required',

    'mobile_no' => 'required',
    'phone_no' => 'nullable',
    'landline_no' => 'nullable',

    // Educational Information
    'post_group' => 'required',
    'post_name' => 'required',
    'can_teach' => 'required',
    'upto_class' => 'required',

    // 10th Grade Information
    'stream_10th' => 'required',
    'subject_10th' => 'required',
    'university_10th' => 'required',
    'percentage_10th' => 'required|numeric|between:0,100', 

    // 12th Grade Information
    'stream_12' => 'required',
    'subject_12' => 'required',
    'university_12' => 'required',
    'percentage_12' => 'required|numeric|between:0,100', 

    // Graduation Information
    'stream_graduation' => 'required',
    'subject_graduation' => 'required',
    'university_graduation' => 'required',
    'percentage_graduation' => 'required|numeric|between:0,100', 

    // Post Graduation Information
    'stream_post_graduation' => 'required',
    'subject_post_graduation' => 'required',
    'university_post_graduation' => 'required',
    'percentage_post_graduation' => 'required|numeric|between:0,100', 

    // B.Ed Information
    'stream_bed' => 'required',
    'subject_bed' => 'required',
    'university_bed' => 'required',
    'percentage_bed' => 'required|numeric|between:0,100', 

    // Other Details
    'other_details' => 'required',
    'expected_accommodation' => 'required',
    'future_plans' => 'required',
    // Validation for radio buttons
    'associated_with_pinegrove' => 'required',
    // Validation for file upload
    'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
 
    'experiences.*.institution_name' => 'required',
    'experiences.*.period_from' => 'required|date',
    'experiences.*.period_to' => 'required|date',
    'current_job' => 'required',
    'present_salary' => 'required',
    'expected_salary'=> 'required',


];
protected $messages = [
    'experiences.*.institution_name.required' => 'The institution name field is required.',
    'experiences.*.period_from.required' => 'The period from field is required.',
    'experiences.*.period_from.date' => 'The period from field must be a valid date.',
    'experiences.*.period_to.required' => 'The period to field is required.',
    'experiences.*.period_to.date' => 'The period to field must be a valid date.',
    'experiences.*.period_to.after_or_equal' => 'The period to field must be after or equal to the period from field.',
];


    public function mount()
    {
        $this->addExperience();
        $this->applicationDate = Carbon::now()->toDateString(); 
    }
    
        public function addExperience()
        {
            $this->experiences[] = [
              'institution_name' => '',
              'experience_period_from' => '',
              'experience_period_to' => ''];
            $lastExperience = end($this->experiences);
            if (empty($lastExperience) || (!empty($lastExperience) && array_filter($lastExperience))) {
                $this->experiences[] =
                 ['institution_name' => '', 
                 'experience_period_from' => '',
                  'experience_period_to' => ''];
            }
        }

        public function removeExperience($index)
        {
            if ($index > 0) {
                unset($this->experiences[$index]);
                $this->experiences = array_values($this->experiences);
            }
        }
    public function render()
    {
            $this->getSubjects =    SubjectTeach::orderBy('name')->get();
            $this->getClassname =    ClassMaster::orderBy('id')->get();
            return view('livewire.frontend.career')->layout('layouts.frontend');
        }

    public function store()
    {

        $this->validate();

        if(!is_null($this->photo)){
            $image =  $this->photo;
           // Define folder path
           $folder = '/uploads/application';
           $uploadedData = $this->uploadOne($image, $folder);   
         }

        $data = [
            // Fill in the data array with the corresponding properties
            'application_date' => $this->application_date,
            'date_of_birth' => $this->date_of_birth,
            'marital_status' => $this->marital_status,
            'name' => $this->name,
            'email' => $this->email,

            'address' => $this->address,
            'mobile_no' => $this->mobile_no,
            'phone_no' => $this->phone_no,
            'landline_no' => $this->landline_no,
            'post_group' => $this->post_group,
            'post_name' => $this->post_name,
            'can_teach' => $this->can_teach,
            'upto_class' => $this->upto_class,
            'stream_10th' => $this->stream_10th,
            'subject_10th' => $this->subject_10th,
            'university_10th' => $this->university_10th,
            'percentage_10th' => $this->percentage_10th,
            'stream_12' => $this->stream_12,
            'subject_12' => $this->subject_12,
            'university_12' => $this->university_12,
            'percentage_12' => $this->percentage_12,
            'stream_graduation' => $this->stream_graduation,
            'subject_graduation' => $this->subject_graduation,
            'university_graduation' => $this->university_graduation,
            'percentage_graduation' => $this->percentage_graduation,
            'stream_post_graduation' => $this->stream_post_graduation,
            'subject_post_graduation' => $this->subject_post_graduation,
            'university_post_graduation' => $this->university_post_graduation,
            'percentage_post_graduation' => $this->percentage_post_graduation,
            'stream_bed' => $this->stream_bed,
            'subject_bed' => $this->subject_bed,
            'university_bed' => $this->university_bed,
            'percentage_bed' => $this->percentage_bed,
            'other_details' => $this->other_details,
            'current_job' => $this->current_job,
            'present_salary' => $this->present_salary,
            'expected_salary' =>$this->expected_salary,
            'expected_accommodation' => $this->expected_accommodation,
            'associated_with_pinegrove' => $this->associated_with_pinegrove,
            'future_plans' => $this->future_plans,
            'photo' => $uploadedData['file_name'] ?? Null,

        ];


        
                $appication_id =  ApplicationForm::create($data);

                    foreach ($this->experiences as $experienceData) {

                        $experiencedata[]  =    Experience::create([
                            'application_forms_id' =>  $appication_id->id, // Adjust this value accordingly
                            'institution_name' => $experienceData['institution_name'],
                            'experience_period_from' => Carbon::parse( $experienceData['period_from'])->format('Y-m-d'),
                            'experience_period_to' => Carbon::parse( $experienceData['period_to'])->format('Y-m-d'),
                            // Add other fields as needed
                        ]);
            

                }

             dispatch(new  ApplicationJob($data ,$experiencedata));
        
           // Send the thank-you email to the applicant
           if($this->email){
               Mail::to($this->email) 
               ->send(new ThankYouForSubmissionEmail());
            }

            $this->resetFormFields();
        // $this->experiences = [];
        session()->flash('success', 'Application submitted successfully!');
        return redirect()->route('home.homepage');
    }

    private function resetFormFields()
    {
        // Reset all form fields to their initial state
        $this->reset([
            'application_date',
            'date_of_birth',
            'marital_status',
            'name',
            'email',
            'address',
            'mobile_no',
            'phone_no',
            'landline_no',
            'post_group',
            'post_name',
            'can_teach',
            'upto_class',
            'stream_10th',
            'subject_10th',
            'university_10th',
            'percentage_10th',
            'stream_12',
            'subject_12',
            'university_12',
            'percentage_12',
            'stream_graduation',
            'subject_graduation',
            'university_graduation',
            'percentage_graduation',
            'stream_post_graduation',
            'subject_post_graduation',
            'university_post_graduation',
            'percentage_post_graduation',
            'stream_bed',
            'subject_bed',
            'university_bed',
            'percentage_bed',
            'other_details',
            'associated_with_pinegrove',
            'expected_accommodation',
            'future_plans',
            'photo',
            'current_job' ,
            'present_salary' ,
            'expected_salary',
        
       
        ]);
    }


 
}
