<?php

namespace App\Jobs;

use App\Mail\StudentRegistration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
class SendStudentRegistrationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $admissionForm;

    public function __construct($admissionForm)
    {
        $this->admissionForm = $admissionForm;
    
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $adminEmail = DB::table('users')
        ->where('role_id', '1')
        ->value('email');
        if ($adminEmail) {
            Mail::to($adminEmail)->send(new StudentRegistration($this->admissionForm));
        }
    }
}
