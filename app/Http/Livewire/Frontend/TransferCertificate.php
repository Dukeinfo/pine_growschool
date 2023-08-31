<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\TransferCertificate as appTransferCertificate;
use Illuminate\Support\Facades\Storage;
use Response;

class TransferCertificate extends Component
{
    public $admno,$records;


    protected $rules = [ 
        'admno' => 'required', 
      ];
      protected $messages = [
          'admno.required' => 'Admission Number Required.',
          
      ];
    private function resetInputFields(){
        $this->admno = '';   
    }

    public function search(){
    	$validatedData = $this->validate();
    	
    	$this->records=appTransferCertificate::where('admission_no', $this->admno)->get();
    	
    }

     public function download($id){
       $getDownload = appTransferCertificate::where('id', $id)->first();
       $path =  Storage::path('public/uploads/document/'. $getDownload->file);
       return response()->download($path);

   } 

    public function render()
    {
        return view('livewire.frontend.transfer-certificate')->layout('layouts.frontend');
    }
}
