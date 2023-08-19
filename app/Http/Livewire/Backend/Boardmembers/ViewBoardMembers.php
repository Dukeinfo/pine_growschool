<?php

namespace App\Http\Livewire\Backend\Boardmembers;

use Livewire\Component;
use App\Models\BoardMembers;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ViewBoardMembers extends Component
{
    use WithFileUploads;
    use UploadTrait;

    public  $records, $dated,$heading,$desc,$image,
    $thumbnail,$sort_id,$status ,$link;

    protected $listeners = ["selectDate" => 'getDate'];

    public function render()
    {
      $this->records = BoardMembers::orderBy('sort_id','asc')->get();  
     
        return view('livewire.backend.boardmembers.view-board-members')->layout('layouts.backend');
    }

        protected $rules = [ 
        'dated' => 'required', 
        'heading' => 'required',
        'desc' => 'required',
        'image' => 'required', 
        'sort_id' => 'required| unique:board_members,sort_id',
        'status' => 'required',    
     
      ];
      protected $messages = [
          'dated.required' => 'Date Required.',
          'heading.required' => 'Heading Required.',
          'desc.required' => 'Description Required.',
          'image.required' => 'Image Required.',
          'sort_id.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->dated = '';
        $this->heading = '';
        $this->desc = '';
        $this->image = '';
        $this->sort_id = '';
        $this->status = '';
        $this->link = '';

        
    }

  
    public function getDate( $date ) {
        
        $this->dated = $date;
    }

    public function addEvent(){

      $validatedData = $this->validate();

      $date=date('Y-m-d', strtotime($this->dated));

      if(!is_null($this->image)){
      $image =  $this->image;
      // Define folder path
      $folder = '/uploads/boardmembers';
      $uploadedData = $this->uploadOne($image, $folder);

      } 

      
    	$boardMembers = new BoardMembers();
      $boardMembers->dated = $date;
      $boardMembers->heading = $this->heading;
      $boardMembers->description = $this->desc;
      $boardMembers->image = $uploadedData['file_name'] ?? NULL;
      $boardMembers->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
      $boardMembers->sort_id =$this->sort_id;
      $boardMembers->link =$this->link;

      
      $boardMembers->status = $this->status;
      $boardMembers->save();

      $this->resetInputFields();
      $this->emit('formSubmitted');

      $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]);
    }

     public function delete($id){

      $boardMembers = BoardMembers::findOrFail($id);
      if(!is_null($boardMembers)){
        $boardMembers->delete();
      }

     }
}
