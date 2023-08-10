<?php

namespace App\Http\Livewire\Frontend;

use App\Models\ContactUs as ModelsContactUs;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Mail\ContactUsMail;
class ContactUs extends Component
{
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $message;
    public function render()
    {
        return view('livewire.frontend.contact-us')->layout('layouts.frontend');;
    }

    public function send()
    {
        $validatedData =    $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        ModelsContactUs::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);
// Send email only when validation and database entry are successful
if (empty($this->getErrorBag()->messages())) {
      
        // Send email
        Mail::to('your@email.com')->send(new ContactUsMail([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->message,
        ]));
    }

    session()->flash('success', 'Your message has been sent successfully.');
    $this->resetForm();
    return redirect()->route('homepage');
    }

    private function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->subject = '';
        $this->message = '';
    }
}
