<?php

namespace App\Http\Livewire\Backend\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminProfile extends Component
{
    use WithFileUploads;

    public $submenuId , $name ,$email ,$profile;
    public function render()
    {
        return view('livewire.backend.profile.admin-profile')->layout('layouts.backend');
    }

    public function mount(){
        if (Auth::check()) {
            // Use $userId as needed
            $Getuser = User::where('id' , Auth::id())->first();
            $this->submenuId = $Getuser->id;
            $this->name = $Getuser->name;
            $this->email = $Getuser->email;
        }
    }

    public function updateadminProfile(){
 
        if(!is_null($this->profile)){
            $fileName = time().'_'.$this->profile->getClientOriginalName();
        
            $filePath = $this->profile->storeAs('uploads', $fileName, 'public');
            $updateuser =  User::find( $this->submenuId);
            $updateuser->profile_photo_path = $fileName;
            $updateuser->save();    
           $this->dispatchBrowserEvent('swal:modal', [
                    'type' => 'success',  
                    'message' => 'Successfully save!', 
                ]); 
        }else{
            $updateuser =  User::find( $this->submenuId);
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
}
