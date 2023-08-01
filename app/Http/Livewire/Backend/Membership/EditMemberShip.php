<?php

namespace App\Http\Livewire\Backend\Membership;

use Livewire\Component;
use App\Models\Memberships;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
class EditMemberShip extends Component
{
    use WithFileUploads;
    use UploadTrait;
    public $memberId,$name,$sort, $logo ,$image ,$thumbnail, $editimage,$hlink,$status; 

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

          
                $image =  $this->editimage;
                // Define folder path
                $folder = '/uploads/membership';
                $uploadedData = $this->uploadOne($image, $folder);
        
              

            $membership = Memberships::find($this->memberId);
            $membership->name = $this->name;
            $membership->logo = $uploadedData['file_name'] ?? NULL;
            $membership->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
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
