<?php

namespace App\Http\Livewire\Backend\Contact;


use App\Models\ContactUs as ModelsContactUs;
use Livewire\Component;

class ViewContactFormEntry extends Component
{
    public $contactId, $entry ,$message ,$created_at,$email,$name, $phone;


    public function mount($id = null)
    {
        $this->contactId = $id;
        if ($this->contactId) {
            $contact = ModelsContactUs::findOrFail($this->contactId);
            $this->created_at = $contact->created_at;
            $this->name = $contact->name;
            $this->email = $contact->email;
            $this->phone = $contact->phone;
            $this->message = $contact->message;

    
        }
    }
    public function render()
    {
        
        return view('livewire.backend.contact.view-contact-form-entry')->layout('layouts.backend');
    }
}
