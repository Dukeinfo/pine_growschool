<?php

namespace App\Http\Livewire\Backend\Boardmembers;

use Livewire\Component;
use App\Models\BoardMembers;

class TrashBoardMembers extends Component
{
    public function render()
    {
    	$this->records = BoardMembers::onlyTrashed()->orderBy('sort_id','asc')->get();
        return view('livewire.backend.boardmembers.trash-board-members')->layout('layouts.backend');
    }

    public function restore($id){
      $boardMembers = BoardMembers::withTrashed()->findOrFail($id);
      if(!is_null($boardMembers)){
        $boardMembers->restore();
      }

       return redirect()->route('view_boardmembers');
    }
}
