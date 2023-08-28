<?php

namespace App\Mail;

use App\Models\AdmissionForm;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentRegistration extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $admissionForm;

    public function __construct(AdmissionForm $admissionForm)
    {
        $this->admissionForm = $admissionForm;
    }

    public function build()
    {
        return $this->view('emails.admission_form')
            ->subject('New Student Registration');
    }
}
