<?php

namespace App\Http\Livewire\Backend\Login;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Session;

class AdminLogin extends Component
{

   public $email, $password;

     protected $rules = [
        'email' => 'required|email', 
        'password' => 'required', 
     
      ];
      protected $messages = [
          'email.required' => 'Email Required.',
          'password.required' => 'Password Required.',
      ];
    private function resetInputFields(){
        $this->email = '';
        $this->password = '';
    }


    public function render()
    {
        return view('livewire.backend.login.admin-login')->layout('layouts.admin-login');
    }

      public function checkLogin()
    {

      $validatedData = $this->validate();

      if(Auth::attempt(array('email' => $this->email, 'password' => $this->password))){
               session()->flash('message', "You are Login successful.");
               return redirect()->to('/admin/dashboard');               
         }else{
             session()->flash('error', 'Wrong email or password.');
         }
       
    }
}
