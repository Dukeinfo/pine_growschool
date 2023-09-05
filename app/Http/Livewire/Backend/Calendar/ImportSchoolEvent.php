<?php

namespace App\Http\Livewire\Backend\Calendar;

use Livewire\Component;
use App\Models\SchoolCalendar;
use App\Exports\ExportSchoolEvent;
use App\Exports\ExportSchoolEventSample;
use App\Imports\SchoolEventImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Type\NullType;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;


class ImportSchoolEvent extends Component
{

	use WithFileUploads;
    use UploadTrait;
    public $file ;

    public   $selectedFields = [ 'date',	'event', 'sort_id',	'status']; 
    public  $customHeadings = [ 'Date',	'Event','Sort ID',	'Status']; 

    public function importEvent(){
      $this->validate([
        'file' => 'required|mimes:xlsx,xls|max:2048',
    ]);

    try {
        Excel::import(new SchoolEventImport, $this->file);
        session()->flash('success', 'School event imported successfully!');
        $this->file = null;
    } catch (\Exception $e) {
        session()->flash('error', 'Error importing school event Please check your Excel file and try again.');
    }
    }


  public function export_event(){
  return Excel::download(new ExportSchoolEvent($this->selectedFields, $this->customHeadings), 'SchoolEvent.xlsx');

}

public function download_sample() {
      return Excel::download(new ExportSchoolEventSample(), 'downloadsample.xlsx');
  }


    public function render()
    {
    	 $this->records = SchoolCalendar::orderBy('sort_id','asc')->get();
        return view('livewire.backend.calendar.import-school-event')->layout('layouts.backend');
    }

      public function delete($id){

      $schoolCalendar = SchoolCalendar::findOrFail($id);
      if(!is_null($schoolCalendar)){
          $schoolCalendar->delete();
      }

     }

}
