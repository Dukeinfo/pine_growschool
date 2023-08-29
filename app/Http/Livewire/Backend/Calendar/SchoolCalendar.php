<?php

namespace App\Http\Livewire\Backend\Calendar;

use Livewire\Component;
use App\Models\SchoolCalendar as appSchoolCalendar;

class SchoolCalendar extends Component
{

    public  $schoolDate,$schoolevent,$sort_id,$status;

    protected $listeners = ["selectDate" => 'getDate'];

    protected $rules = [ 
        'schoolDate' => 'required', 
        'schoolevent' => 'required',
        'sort_id' => 'required| unique:school_calendars,sort_id',
        'status' => 'required',    
     
      ];
      protected $messages = [
          'scholDate.required' => 'Date Required.',
          'schoolevent.required' => 'School Event Required.',
          'sort_id.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->schoolDate = '';
        $this->schoolevent = '';
        $this->sort_id = '';
        $this->status = '';
        
    }

  
    public function getDate( $date ) {
        
        $this->schoolDate = $date;
    }

    public function schoolEvent(){
    	

      $validatedData = $this->validate();

      $date=date('Y-m-d', strtotime($this->schoolDate));

      $schoolCalendar = new appSchoolCalendar();
      $schoolCalendar->date = $date;
      $schoolCalendar->event = $this->schoolevent;
      $schoolCalendar->sort_id =$this->sort_id;
      $schoolCalendar->status = $this->status;
      $schoolCalendar->save();

      $this->resetInputFields();

      $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]);
    }

      public function delete($id){

      $schoolCalendar = appSchoolCalendar::findOrFail($id);
      if(!is_null($schoolCalendar)){
        $schoolCalendar->delete();
      }

     }


    public function render()
    {
     $this->records = appSchoolCalendar::orderBy('sort_id','asc')->get();
        return view('livewire.backend.calendar.school-calendar')->layout('layouts.backend');
    }
}
