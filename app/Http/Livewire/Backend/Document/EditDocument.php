<?php

namespace App\Http\Livewire\Backend\Document;

use Livewire\Component;
use App\Models\DownloadDocument;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Response;

class EditDocument extends Component
{

     use WithFileUploads;

     public $editId,$name,$editdocument, $sort_id, $status;

      public function mount($id)
     {
        $document = DownloadDocument::findOrFail($id);
        $this->editId = $document->id;
        $this->name = $document->name;
        $this->document = $document->file;
    	$this->sort_id = $document->sort_id;
    	$this->status = $document->status;
     }

   public function editDocument(){

    if(!is_null($this->editdocument)){
            $fileName = time().'_'.$this->editdocument->getClientOriginalName();
            $filePath = $this->editdocument->storeAs('uploads/document', $fileName, 'public');
    
      $document =DownloadDocument::find($this->editId);
      $document->name = $this->name;
      $document->file = $fileName;
      $document->sort_id =$this->sort_id;
      $document->status = $this->status;
      $document->save();

      return redirect()->route('add_document');

    }else{

      $document =DownloadDocument::find($this->editId);
      $document->name = $this->name;
      $document->sort_id =$this->sort_id;
      $document->status = $this->status;
      $document->save();

      return redirect()->route('add_document'); 

    }      

     

    }  

    public function download($document){
       $path =  Storage::path('public/uploads/document/'. $document);
     return response()->download($path);

   } 

    public function render()
    {
        return view('livewire.backend.document.edit-document')->layout('layouts.backend');
    }
}
