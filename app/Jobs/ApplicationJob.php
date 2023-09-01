<?php

namespace App\Jobs;

use App\Mail\ApplicationMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ApplicationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $data,$experiencedata;


    public function __construct($data ,$experiencedata)
    {
        $this->data = $data;
        $this->experiencedata = $experiencedata;


    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $adminEmail = DB::table('users')
        ->where('role_id', '1')
        ->value('email');
        if ($adminEmail) {
            $email = new ApplicationMail( $this->data ,$this->experiencedata );
            Mail::to('nfo@juriskart.com')->send($email);
            // Mail::to($adminEmail)->send($email);

            
        }
    }
}
