<?php

namespace App\Http\Livewire\Backend\Admissions;

use App\Models\AdmissionForm;
use Livewire\Component;

class AdmissionsInquery extends Component
{
    public $records;
    public function render()
    {
         $this->records = AdmissionForm::latest()->get();
        return view('livewire.backend.admissions.admissions-inquery')->layout('layouts.backend');
    }

    public function delete($id){
        
        $inquery = AdmissionForm::findOrFail($id);
          $inquery->delete();
       
        session()->flash('success', 'Inquery permanent deleted successfully!');
  

    }
}
