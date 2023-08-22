<?php

namespace App\Http\Livewire\Backend\Memories;

use Livewire\Component;
use App\Models\GuestBook;

class TrashGuestBook extends Component
{
    public function render()
    {
    	$this->records = GuestBook::onlyTrashed()->orderBy('sort_id','asc')->get();
        return view('livewire.backend.memories.trash-guest-book')->layout('layouts.backend');
    }

    public function restore($id){
      $guestBook = GuestBook::withTrashed()->findOrFail($id);
      if(!is_null($guestBook)){
        $guestBook->restore();
      }

       return redirect()->route('view_guest_book');
    }
}
