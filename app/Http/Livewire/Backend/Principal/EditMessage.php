<?php

namespace App\Http\Livewire\Backend\Principal;

use Livewire\Component;
use App\Models\Message;

class EditMessage extends Component
{

	public $messageId,$name,$heading,$pline,$desc,$sort,$status;

    public function mount($id)
     {
        $message = Message::findOrFail($id);
        $this->messageId = $message->id;
        $this->name = $message->name;
        $this->heading = $message->heading;
        $this->pline = $message->punch_line;
        $this->desc = $message->message;
    	$this->sort = $message->sort_id;
    	$this->status = $message->status;
     }

   public function editMessage(){

   	  $message = Message::find($this->messageId);
      $message->name = $this->name;
      $message->heading = $this->heading;
      $message->punch_line = $this->pline;
      $message->message = $this->desc;
      $message->sort_id =$this->sort;
      $message->status = $this->status;
      $message->save();

      return redirect()->route('create_message');
   

   }  

    public function render()
    {
        return view('livewire.backend.principal.edit-message');
    }
}
