<?php

namespace App\Http\Livewire\Backend\Memories;

use Livewire\Component;
use App\Models\GuestBook;

class EditGuestBook extends Component
{
    public $guestId,$picDate, $visitor, $desc, $sort_id, $status;

    protected $listeners = ["selectDate" => 'getDate'];

     public function mount($id)
     {
        $guestBook = GuestBook::findOrFail($id);
        $this->guestId = $guestBook->id;
        $this->picDate = $guestBook->date;
        $this->visitor = $guestBook->visitor;
        $this->desc = $guestBook->comment;
    	$this->sort_id = $guestBook->sort_id;
    	$this->status = $guestBook->status;
     }

     public function getDate( $date ) {
        
        $this->picDate = $date;
    }

     public function editGuestBook(){


      $date=date('Y-m-d', strtotime($this->picDate));

      
      $guestBook = GuestBook::find($this->guestId);
      $guestBook->date = $date;
      $guestBook->visitor = $this->visitor;
      $guestBook->comment = $this->desc;
      $guestBook->sort_id =$this->sort_id;
      $guestBook->status = $this->status;
      $guestBook->save();

     return redirect()->route('view_guest_book'); 
      
    }

    public function render()
    {
        return view('livewire.backend.memories.edit-guest-book')->layout('layouts.backend');
    }
}
