<?php

namespace App\Http\Livewire\Backend\Principal;

use Livewire\Component;
use App\Models\Message;

class TrashMessage extends Component
{
    public function render()
    {
    	$this->records = Message::onlyTrashed()->orderBy('sort_id','asc')->get();
        return view('livewire.backend.principal.trash-message')->layout('layouts.backend');
    }

    public function restore($id){
      $message = Message::withTrashed()->findOrFail($id);
      if(!is_null($message)){
        $message->restore();
      }

       return redirect()->route('create_message');
    }
}
