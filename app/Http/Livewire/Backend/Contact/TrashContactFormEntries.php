<?php

namespace App\Http\Livewire\Backend\Contact;

use Livewire\Component;
use App\Models\ContactUs;

class TrashContactFormEntries extends Component
{
    public function render()
    {
    	$entries = ContactUs::onlyTrashed()->get();
        return view('livewire.backend.contact.trash-contact-form-entries',compact('entries'))->layout('layouts.backend');
    }

    public function restore($id){
      $contactus = ContactUs::withTrashed()->findOrFail($id);
      if(!is_null($contactus)){
        $contactus->restore();
      }

       return redirect()->route('contact_entries');
    }
}
