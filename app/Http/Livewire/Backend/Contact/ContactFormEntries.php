<?php

namespace App\Http\Livewire\Backend\Contact;

use App\Models\ContactUs;
use Livewire\Component;

class ContactFormEntries extends Component
{
    public function render()
    {
        $entries = ContactUs::latest()->get();
        return view('livewire.backend.contact.contact-form-entries',compact('entries'))->layout('layouts.backend');
    }

    public function delete($id)
    {
        $socialApp = ContactUs::findOrFail($id);
        $socialApp->delete();
        session()->flash('success', 'Message deleted successfully!');
    }
}
