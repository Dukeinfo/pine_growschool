<?php

namespace App\Http\Livewire\Backend\Boardmembers;

use Livewire\Component;
use App\Models\BoardMembers;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class EditBoardMembers extends Component
{
    use WithFileUploads;
    use UploadTrait;

    public  $boardId,$dated,$heading,$desc,$image, $link, $thumbnail,  $editimage,$sort_id,$status;

    protected $listeners = ["selectDate" => 'getDate'];


    public function mount($id)
     {
        $boardMembers = BoardMembers::findOrFail($id);
        $this->boardId = $boardMembers->id;
        $this->dated = $boardMembers->dated;
        $this->heading = $boardMembers->heading;
        $this->desc = $boardMembers->description;
        $this->image = $boardMembers->image;
        $this->thumbnail = $boardMembers->thumbnail;
    	$this->sort_id = $boardMembers->sort_id;
    	$this->link = $boardMembers->link;
    	$this->status = $boardMembers->status;
     }

      public function getDate( $date ) {
        
        $this->dated = $date;
    }

    public function editEvent(){

     $date=date('Y-m-d', strtotime($this->dated));

      if(!is_null($this->editimage)){

        $image =  $this->editimage;
        // Define folder path
        $folder = '/uploads/boardmembers';
        $uploadedData = $this->uploadOne($image, $folder);
                	
      $boardMembers =BoardMembers::find($this->boardId);
      $boardMembers->dated = $date;
      $boardMembers->heading = $this->heading;
      $boardMembers->description = $this->desc;
      $boardMembers->image = $uploadedData['file_name'] ?? NULL;
      $boardMembers->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
      $boardMembers->sort_id =$this->sort_id;
      $boardMembers->link =$this->link;

      $boardMembers->status = $this->status;
      $boardMembers->save();

 

     }else{

      $boardMembers =BoardMembers::find($this->boardId);
      $boardMembers->dated = $date;
      $boardMembers->heading = $this->heading;
      $boardMembers->description = $this->desc;
      $boardMembers->sort_id =$this->sort_id;
      $boardMembers->link =$this->link;

      $boardMembers->status = $this->status;
      $boardMembers->save();
 


     }
     $this->emit('formSubmitted');

       return redirect()->route('view_boardmembers'); 
    }

    public function render()
    {
        return view('livewire.backend.boardmembers.edit-board-members')->layout('layouts.backend');
    }
}
