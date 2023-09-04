<?php

namespace App\Http\Livewire\Backend\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminProfile extends Component
{
    use WithFileUploads;

    public $userId , $name ,$email ,$profile ,$profile_photo_path;
    public $old_pass, $password ,$password_confirmation;
    public function render()
    {
        return view('livewire.backend.profile.admin-profile')->layout('layouts.backend');
    }

    public function mount(){
        if (Auth::check()) {
            // Use $userId as needed
            $Getuser = User::where('id' , Auth::id())->first();
            $this->userId = $Getuser->id;
            $this->name = $Getuser->name;
            $this->email = $Getuser->email;
            $this->profile_photo_path = $Getuser->profile_photo_path;

        }
    }

    public function updateadminProfile(){
 
        if(!is_null($this->profile)){
            $fileName = time().'_'.$this->profile->getClientOriginalName();
        
            $filePath = $this->profile->storeAs('uploads', $fileName, 'public');
            $updateuser =  User::find( $this->userId);
            $updateuser->profile_photo_path = $fileName;
            $updateuser->name = $this->name;
            $updateuser->email = $this->email;
            $updateuser->save();    
           $this->dispatchBrowserEvent('swal:modal', [
                    'type' => 'success',  
                    'message' => 'Successfully save!', 
                ]); 
        }else{
            $updateuser =  User::find( $this->userId);
            $updateuser->name = $this->name;
            $updateuser->email = $this->email;
            $updateuser->save();    
           $this->dispatchBrowserEvent('swal:modal', [
                    'type' => 'success',  
                    'message' => 'Successfully save!', 
                ]); 
        }

            return redirect()->route('admin_dashboard');
    }



    public function resetPassword(){
        $validateData = $this->validate([
            'old_pass'=> 'required',
            'password' => 'required|confirmed'
         
        ]);
    //password save part 
        $hashedPassword =Auth::user()->password;
        //if else start 
        if(Hash::check($this->old_pass,$hashedPassword)){

            $user =User::find(Auth::id());
            $user->password=Hash::make($this->password);
            $user->save();
            Auth::logout();
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Password Changed Successfully!', 
            ]); 
            return redirect()->route('login');
         
         
        }else{
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',  
                'message' => 'Invalid password entered !', 
            ]); 
            
            return redirect()->back();

        }
        
    }
  
}
