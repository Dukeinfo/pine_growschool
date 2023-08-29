<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class Career extends Component
{
    public $experiences = [];
    
public $applicationDate ,$dateOfBirth ,$post_group ,$post_name ,
$can_teach ,$upto_class ,$qualification_10_stream ,$qualification_10_subject ,
$qualification_10_university ,$qualification_10_percentage ,$qualification_12_stream ,
$qualification_12_subject ,$qualification_12_university ,$qualification_12_percentage ,
$qualification_graduation_stream ,$qualification_graduation_subject ,
$qualification_graduation_university ,$qualification_graduation_percentage 
,$qualification_post_graduation_stream ,$qualification_post_graduation_subject 
,$qualification_post_graduation_university ,$qualification_post_graduation_percentage 
,$qualification_bed_stream ,$qualification_bed_subject ,$qualification_bed_university 
,$qualification_bed_percentage ,$other_education_details ,$marital_status ,$address 
,$mobile_no ,$phone_no ,$landline_no;

    public function mount()
    {
        $this->addExperience();
    }

    public function addExperience()
    {
        $this->experiences[] = ['institution' => '', 'period_from' => '', 'period_to' => ''];

        $lastExperience = end($this->experiences);

        if (empty($lastExperience) || (!empty($lastExperience) && array_filter($lastExperience))) {
            $this->experiences[] = ['institution' => '', 'period_from' => '', 'period_to' => ''];
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
        return view('livewire.frontend.career')->layout('layouts.frontend');
    }
}
