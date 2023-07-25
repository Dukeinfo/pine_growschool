<?php

namespace App\Http\Livewire\Backend\Membership;

use Livewire\Component;
use App\Models\Memberships;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
class EditMemberShip extends Component
{
    use WithFileUploads;
 
    public $memberId,$name,$sort, $logo ,$image,$editimage,$hlink,$status; 

    public function mount($id)
     {
        $membership = Memberships::findOrFail($id);
        $this->memberId = $membership->id;
        $this->name = $membership->name;
        $this->logo = $membership->logo;
        $this->thumbnail = $membership->thumbnail;
    	$this->sort = $membership->sort_id;
        $this->hlink = $membership->link;
    	$this->status = $membership->status;
     }

     public function editMembership() {
        if(!is_null($this->editimage)){

               // Generate a unique name for the image
        $imageName =  uniqid() . '.' . $this->editimage->getClientOriginalExtension();

        // Get the path where you want to save the image and thumbnail
        $directory = public_path('uploads/thumbnail');

        // Check if the directory exists, if not, create it
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true, true);
        }
        // Save the original image to the specified directory
        $this->editimage->storeAs('uploads', $imageName, 'public');
        // Generate a thumbnail and save it to the specified directory
        $thumbnailName = 'thumb_' . $imageName;
        Image::make($this->editimage)->fit(200, 200)->save($directory . '/' . $thumbnailName);

        // Set the thumbnail property to the thumbnail image name
        // $this->thumbnail = $thumbnailName; 
            

            $membership = Memberships::find($this->memberId);
            $membership->name = $this->name;
            $membership->logo = $imageName ?? NULL;
            $membership->thumbnail = $thumbnailName ?? NULL;
            $membership->sort_id =$this->sort;
            $membership->link = $this->hlink;
            $membership->status = $this->status;
            $membership->save();

            return redirect()->route('view_membership'); 
             
         
 
        }else{
            $membership = Memberships::find($this->memberId);
            $membership->name = $this->name;
            $membership->sort_id =$this->sort;
            $membership->link = $this->hlink;
            $membership->status = $this->status;
            $membership->save();
             
 
        }
        return redirect()->route('view_membership'); 

     }


    public function render()
    {
        return view('livewire.backend.membership.edit-member-ship')->layout('layouts.backend');
    }
}
