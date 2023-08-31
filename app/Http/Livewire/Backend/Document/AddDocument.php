<?php

namespace App\Http\Livewire\Backend\Document;

use Livewire\Component;
use App\Models\DownloadDocument;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Response;

class AddDocument extends Component
{
    use WithFileUploads;

    public $name,$document, $sort_id, $status;

     protected $rules = [ 
     	'name' => 'required',
        'document' => 'required',
        'sort_id' => 'required| unique:download_documents,sort_id',
        'status' => 'required',    
     
      ];
      protected $messages = [
          'name.required' => 'Name Required.',
          'document.required' => 'Document Required.',
          'sort_id.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->name = '';
        $this->document = '';
        $this->sort_id = '';
        $this->status = '';
        
    }

   public function addDocument(){

    $validatedData = $this->validate();

    if(!is_null($this->document)){
            $fileName = time().'_'.$this->document->getClientOriginalName();
            $filePath = $this->document->storeAs('uploads/document', $fileName, 'public');
    }

      $document = new DownloadDocument();
      $document->name = $this->name;
      $document->file = $fileName;
      $document->sort_id =$this->sort_id;
      $document->status = $this->status;
      $document->save();

      $this->resetInputFields();

      $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]);

    }
    public function download($id){
       $getDownload = DownloadDocument::where('id', $id)->first();
       $path =  Storage::path('public/uploads/document/'. $getDownload->file);
     return response()->download($path);

   } 

    public function render()
    {
    	$this->records = DownloadDocument::orderBy('sort_id','asc')->get();
        return view('livewire.backend.document.add-document')->layout('layouts.backend');
    }
}
