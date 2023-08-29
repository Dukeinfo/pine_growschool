<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Staff;
use Livewire\Component;

class OurFaculties extends Component
{ 
    public $getStaffList ;
    public function render()
    {
        $this->getStaffList =  Staff::get();
        return view('livewire.frontend.our-faculties')->layout('layouts.frontend');
    }
}
