<?php

namespace App\Http\Livewire\Backend\Memories;

use Livewire\Component;
use App\Models\GuestBook;

class ViewGuestBook extends Component
{
    public $picDate, $visitor, $desc, $sort_id, $status;

    protected $listeners = ["selectDate" => 'getDate'];

    protected $rules = [ 
        'picDate' => 'required', 
        'visitor' => 'required',
        'desc' => 'required',
        'sort_id' => 'required| unique:guest_books,sort_id',
        'status' => 'required',    
     
      ];
      protected $messages = [
          'picDate.required' => 'Date Required.',
          'visitor.required' => 'Visitor Required.',
          'desc.required' => 'Comment Required.',
          'sort_id.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->picDate = '';
        $this->visitor = '';
        $this->desc = '';
        $this->sort_id = '';
        $this->status = '';
        
    }

  
    public function getDate( $date ) {
        
        $this->picDate = $date;
    }

     public function addGuestBook(){

      $validatedData = $this->validate();

      $date=date('Y-m-d', strtotime($this->picDate));

      
      $guestBook = new GuestBook();
      $guestBook->date = $date;
      $guestBook->visitor = $this->visitor;
      $guestBook->comment = $this->desc;
      $guestBook->sort_id =$this->sort_id;
      $guestBook->status = $this->status;
      $guestBook->save();

      $this->resetInputFields();

      $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]);
    }


    public function delete($id){

      $guestBook = GuestBook::findOrFail($id);
      if(!is_null($guestBook)){
        $guestBook->delete();
      }

     }

    public function render()
    {
    	  $this->records = GuestBook::orderBy('sort_id','asc')->get();
        return view('livewire.backend.memories.view-guest-book')->layout('layouts.backend');
    }
}
