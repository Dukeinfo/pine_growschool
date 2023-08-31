<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\DownloadDocument;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Response;

class DownloadResources extends Component
{
    public function render()
    {
    	$this->documents =  DownloadDocument::where('status', 'active' )->get();
        return view('livewire.frontend.download-resources')->layout('layouts.frontend');
    }

     public function download($document){
       $path =  Storage::path('public/uploads/document/'. $document);
     return response()->download($path);

   }
}
