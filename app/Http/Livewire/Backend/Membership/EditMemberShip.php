<?php

namespace App\Http\Livewire\Backend\Membership;

use Livewire\Component;
use App\Models\Memberships;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditMemberShip extends Component
{
 
    public $memberId,$name,$sort,$image,$status;

    public function mount($id)
     {
        $membership = Memberships::findOrFail($id);
        $this->memberId = $membership->id;
        $this->name = $membership->name;
         $this->logo = $membership->logo;
    	$this->sort = $membership->sort_id;
    	$this->status = $membership->status;
     }

     public function editMembership() {
        
        $membership = Memberships::find($this->memberId);
        $membership->name = $this->name;
        $membership->sort_id =$this->sort;
        $membership->status = $this->status;
        $membership->save();
             
        return redirect()->to('/admin/view/membership'); 
 

     }


    public function render()
    {
        return view('livewire.backend.membership.edit-member-ship')->layout('layouts.backend');
    }
}
