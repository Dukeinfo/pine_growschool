<?php

namespace App\Http\Livewire\Backend\Principal;

use Livewire\Component;
use App\Models\Message as appMessage;

class Message extends Component
{

	public $name,$heading,$pline,$desc,$sort,$status;

	protected $rules = [
        'name' => 'required', 
        'heading' => 'required', 
        'pline' => 'required', 
        'sort' => 'required', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'name.required' => 'Name Required.',
          'heading.required' => 'Heading Required.',
          'pline.required' => 'Punch Line Required.',
          'desc.required' => 'Message Required.',
          'sort.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->name = '';
        $this->heading = '';
        $this->pline = '';
        $this->desc = '';
        $this->sort = '';
        $this->status = '';
    }

    public function addMessage()
    {

   
      $validatedData = $this->validate();

      $message = new appMessage();
      $message->name = $this->name;
      $message->heading = $this->heading;
      $message->punch_line = $this->pline;
      $message->message = $this->desc;
      $message->sort_id =$this->sort;
      $message->status = $this->status;
      $message->save();

      $this->resetInputFields(); 

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 
          $this->emit('formSubmitted');
    } 

    public function delete($id){

      $message = appMessage::findOrFail($id);
      if(!is_null($message)){
        $message->delete();
      }

     }


    public function render()
    {
    	$this->records = appMessage::orderBy('sort_id','asc')->get();
        return view('livewire.backend.principal.message')->layout('layouts.backend');
    }
}
