<?php

namespace App\Http\Livewire\Backend\Membership;

use Livewire\Component;
use App\Models\Memberships;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ViewMembership extends Component
{

    use WithFileUploads;

    public $name, $image,$sort,$hlink,$status;
    public $records;
   // public $ipAddress;


     protected $rules = [
        'name' => 'required', 
        'image' => 'required', 
        'sort' => 'required', 
        'status' => 'required', 
       
     
      ];
      protected $messages = [
          'name.required' => 'Name Required.',
          'image.required' => 'Logo Required.',
          'sort.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
          
      ];
    private function resetInputFields(){
        $this->name = '';
        $this->logo = '';
        $this->sort = '';
        $this->status = '';
        $this->hlink = '';
    }

   
   public function addMembership(){

     $validatedData = $this->validate();
 
     if(!is_null($this->image)){
        // Generate a unique name for the image
        $imageName =  uniqid() . '.' . $this->image->getClientOriginalExtension();

        // Get the path where you want to save the image and thumbnail
        $directory = public_path('uploads/thumbnail');

        // Check if the directory exists, if not, create it
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true, true);
        }

        // Save the original image to the specified directory
        $this->image->storeAs('uploads', $imageName, 'public');

        // Generate a thumbnail and save it to the specified directory
        $thumbnailName = 'thumb_' . $imageName;
        Image::make($this->image)->fit(200, 200)->save($directory . '/' . $thumbnailName);

        // Set the thumbnail property to the thumbnail image name
        // $this->thumbnail = $thumbnailName;
    }  
 
    
      $membership = new Memberships();
      $membership->name = $this->name;
      $membership->slug =  strtolower(str_replace(' ', '-',$this->name));
      $membership->logo = $imageName ?? NULL;
      $membership->thumbnail = $thumbnailName ?? NULL;
      $membership->sort_id =$this->sort;
      $membership->link = $this->hlink;
      $membership->status = $this->status;
      $membership->save();

       $this->resetInputFields();

       $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 

    


   }


     public function delete($id){

      $membership = Memberships::findOrFail($id);
      if(!is_null($membership)){
        $membership->delete();
      }

     }

    public function render()
    {
    $this->records =  Memberships::orderBy('sort_id' ,'asc')->get();
    return view('livewire.backend.membership.view-membership')->layout('layouts.backend');
    }
}
