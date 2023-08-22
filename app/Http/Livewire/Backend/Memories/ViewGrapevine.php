<?php

namespace App\Http\Livewire\Backend\Memories;

use Livewire\Component;
use App\Models\Grepevine;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Response;

class ViewGrapevine extends Component
{
    use WithFileUploads;

    public $grapDate,$docuemnt, $year,$records, $issuenumber,$document, $sort_id, $status;

     protected $listeners = ["selectDate" => 'getDate'];

    protected $rules = [ 
        'grapDate' => 'required', 
        'year' => 'required',
        'issuenumber' => 'required',
        'document' => 'required',
        'sort_id' => 'required| unique:grepevines,sort_id',
        'status' => 'required',    
     
      ];
      protected $messages = [
          'grapDate.required' => 'Date Required.',
          'year.required' => 'Year Required.',
          'issuenumber.required' => 'Issue Number Required.',
          'docuemnt.required' => 'Document Required.',
          'sort_id.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->grapDate = '';
        $this->year = '';
        $this->issuenumber = '';
        $this->docuemnt = '';
        $this->sort_id = '';
        $this->status = '';
        
    }

  
    public function getDate( $date ) {
        
        $this->grapDate = $date;
    }


   public function addGrapevine(){

    $validatedData = $this->validate();

    $date=date('Y-m-d', strtotime($this->grapDate));

    if(!is_null($this->document)){
            $fileName = time().'_'.$this->document->getClientOriginalName();
            $filePath = $this->document->storeAs('uploads/document', $fileName, 'public');
    }

      $grepevine = new Grepevine();
      $grepevine->date = $date;
      $grepevine->year = $this->year;
      $grepevine->issuenumber = $this->issuenumber;
      $grepevine->document = $fileName;
      $grepevine->sort_id =$this->sort_id;
      $grepevine->status = $this->status;
      $grepevine->save();

      $this->resetInputFields();

      $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]);

    }
    public function download($id){
        $getDownload = Grepevine::where('id', $id)->first();
       $path =  Storage::path('public/uploads/document/'. $getDownload->document);
     return response()->download($path);

   } 

     public function delete($id){

      $grepevine = Grepevine::findOrFail($id);
      if(!is_null($grepevine)){
        $grepevine->delete();
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
  
     $this->records = Grepevine::orderBy('sort_id','asc')->get();      
     return view('livewire.backend.memories.view-grapevine', compact('years','currentYear'))->layout('layouts.backend');
    }
}
