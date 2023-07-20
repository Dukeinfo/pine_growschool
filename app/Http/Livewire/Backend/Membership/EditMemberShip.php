<?php

namespace App\Http\Livewire\Backend\Membership;

use Livewire\Component;
use App\Models\Memberships;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditMemberShip extends Component
{
    use WithFileUploads;
 
    public $memberId,$name,$sort, $logo ,$image,$hlink,$status, $editlogo; 

    public function mount($id)
     {
        $membership = Memberships::findOrFail($id);
        $this->memberId = $membership->id;
        $this->name = $membership->name;
        $this->logo = $membership->logo;
    	$this->sort = $membership->sort_id;
        $this->hlink = $membership->link;
    	$this->status = $membership->status;
     }

     public function editMembership() {
        if(!is_null($this->editlogo)){
            if(isset($this->logo)){
                $imagePath1 = Storage::path('public/uploads/'. $this->logo);
                        if(File::exists($imagePath1)){
                            unlink($imagePath1);
                        }
                }
            $fileName = time().'_'.$this->editlogo->getClientOriginalName();
            $filePath = $this->editlogo->storeAs('uploads', $fileName, 'public');

            $membership = Memberships::find($this->memberId);
            $membership->name = $this->name;
            $membership->logo = $fileName;
            $membership->sort_id =$this->sort;
            $membership->link = $this->hlink;
            $membership->status = $this->status;
            $membership->save();
             
            return redirect()->to('/admin/view/membership'); 
 
        }else{
            $membership = Memberships::find($this->memberId);
            $membership->name = $this->name;
            $membership->sort_id =$this->sort;
            $membership->link = $this->hlink;
            $membership->status = $this->status;
            $membership->save();
             
            return redirect()->to('/admin/view/membership'); 
 
        }
     }


    public function render()
    {
        return view('livewire.backend.membership.edit-member-ship')->layout('layouts.backend');
    }
}
