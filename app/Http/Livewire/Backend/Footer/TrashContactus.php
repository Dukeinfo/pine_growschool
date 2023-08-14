<?php

namespace App\Http\Livewire\Backend\Footer;

use Livewire\Component;
use App\Models\ContactInfo;

class TrashContactus extends Component
{
    public function render()
    {
    	$contacts = ContactInfo::onlyTrashed()->orderBy('sort_id','asc')->get();
        return view('livewire.backend.footer.trash-contactus',compact('contacts'))->layout('layouts.backend');
    }

     public function restore($id){
      $contactinfo = ContactInfo::withTrashed()->findOrFail($id);
      if(!is_null($contactinfo)){
        $contactinfo->restore();
      }

       return redirect()->route('contact_view');
    }
}
