<?php

namespace App\Http\Livewire\Backend\Membership;

use Livewire\Component;
use App\Models\Memberships;

class TrashMemberShip extends Component
{
    public $records;
    public function render()
    {
        $this->records = Memberships::onlyTrashed()->orderBy('sort_id','asc')->get();
        return view('livewire.backend.membership.trash-member-ship')->layout('layouts.backend');
    }

    public function restore($id){
      $membership = Memberships::withTrashed()->findOrFail($id);
      if(!is_null($membership)){
        $membership->restore();
      }

       return redirect()->route('view_membership');
    }
}
