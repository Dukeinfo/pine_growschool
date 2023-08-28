<?php

namespace App\Http\Livewire\Frontend;

use App\Jobs\SendStudentRegistrationEmail;
use App\Mail\StudentRegistration;
use App\Models\AdmissionForm as ModelsAdmissionForm;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class AdmissionForm extends Component
{

    public $name ,$gender ,$dateOfBirth ,$countryOfBirth ,$nationality ,$admissionSought ,
    $studyingIn ,$fatherName ,$fatherPhone ,$motherName ,$motherPhone ,$parentEmail ,$address ;
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
