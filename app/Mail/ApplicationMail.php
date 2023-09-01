<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public  $data,$experiencedata;


    public function __construct($data ,$experiencedata)
    {
        $this->data = $data;
        $this->experiencedata = $experiencedata;

   
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.application')
        ->subject('Job Application Form')
        ->attach(storage_path('app/public/uploads/application/' . $this->data['photo']), [
            'as' => 'application_photo.jpg',
            'mime' => 'image/jpeg', // Replace with the actual mime type of your image
        ]);
    }
}
