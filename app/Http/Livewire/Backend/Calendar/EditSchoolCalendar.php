<?php

namespace App\Http\Livewire\Backend\Calendar;

use Livewire\Component;
use App\Models\SchoolCalendar;

class EditSchoolCalendar extends Component
{

   public  $editId,$schoolDate,$schoolevent,$sort_id,$status;

   protected $listeners = ["selectDate" => 'getDate'];

    public function mount($id)
     {
        $schoolCalendar = SchoolCalendar::findOrFail($id);
        $this->editId = $schoolCalendar->id;
        $this->schoolDate = $schoolCalendar->date;
        $this->schoolevent = $schoolCalendar->event;
    	$this->sort_id = $schoolCalendar->sort_id;
    	$this->status = $schoolCalendar->status;
     }

     public function getDate( $date ) {
        
        $this->schoolDate = $date;
    }


     public function editSchoolEvent(){
    	
      $date=date('Y-m-d', strtotime($this->schoolDate));

      $schoolCalendar = SchoolCalendar::find($this->editId);
      $schoolCalendar->date = $date;
      $schoolCalendar->event = $this->schoolevent;
      $schoolCalendar->sort_id =$this->sort_id;
      $schoolCalendar->status = $this->status;
      $schoolCalendar->save();

      return redirect()->route('school_calendar'); 
    }
  

    public function render()
    {
        return view('livewire.backend.calendar.edit-school-calendar')->layout('layouts.backend');
    }
}
