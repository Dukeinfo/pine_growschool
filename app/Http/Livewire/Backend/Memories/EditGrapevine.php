<?php

namespace App\Http\Livewire\Backend\Memories;

use Livewire\Component;
use App\Models\Grepevine;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Response;

class EditGrapevine extends Component
{
    use WithFileUploads;

    public $grapId,$grapDate, $year, $issuenumber,$editdocument, $sort_id, $status;

     protected $listeners = ["selectDate" => 'getDate'];

       public function mount($id)
     {
        $grepevine = Grepevine::findOrFail($id);
        $this->grapId = $grepevine->id;
        $this->grapDate = $grepevine->date;
        $this->year = $grepevine->year;
        $this->issuenumber = $grepevine->issuenumber;
        $this->document = $grepevine->document;
    	$this->sort_id = $grepevine->sort_id;
    	$this->status = $grepevine->status;
     }

     public function getDate( $date ) {
        
        $this->grapDate = $date;
    }


   public function editGrapevine(){

  
    $date=date('Y-m-d', strtotime($this->grapDate));

    if(!is_null($this->editdocument)){
            $fileName = time().'_'.$this->editdocument->getClientOriginalName();
            $filePath = $this->editdocument->storeAs('uploads/document', $fileName, 'public');
    
      $grepevine =Grepevine::find($this->grapId);
      $grepevine->date = $date;
      $grepevine->year = $this->year;
      $grepevine->issuenumber = $this->issuenumber;
      $grepevine->document = $fileName;
      $grepevine->sort_id =$this->sort_id;
      $grepevine->status = $this->status;
      $grepevine->save();

      return redirect()->route('view_grapevine');

    }else{

      $grepevine =Grepevine::find($this->grapId);
      $grepevine->date = $date;
      $grepevine->year = $this->year;
      $grepevine->issuenumber = $this->issuenumber;
      $grepevine->sort_id =$this->sort_id;
      $grepevine->status = $this->status;
      $grepevine->save();

      return redirect()->route('view_grapevine'); 

    }      

     

    }


    public function render()
    {

      $years = [];
      $currentYear = date('Y');
      $endYear = $currentYear - 20;

      for ($year = $currentYear; $year >= $endYear; $year--) {
          $years[$year] = $year;
      }
  

        return view('livewire.backend.memories.edit-grapevine', compact('years','currentYear'))->layout('layouts.backend');
    }
}
