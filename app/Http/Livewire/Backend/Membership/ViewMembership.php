<?php

namespace App\Http\Livewire\Backend\Membership;

use Livewire\Component;
use App\Models\Memberships;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ViewMembership extends Component
{

    use WithFileUploads;

    public $name, $logo,$sort,$status;
    public $records;
    public $ipAddress;


     protected $rules = [
        'name' => 'required', 
        'logo' => 'required', 
        'sort' => 'required', 
        'status' => 'required', 
     
      ];
      protected $messages = [
          'name.required' => 'Name Required.',
          'logo.required' => 'Logo Required.',
          'sort.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->name = '';
        $this->logo = '';
        $this->sort = '';
        $this->status = '';
    }

   
   public function addMembership(){

    $validatedData = $this->validate();

    if(!is_null($this->logo)){
     $fileName = time().'_'.$this->logo->getClientOriginalName();
     $filePath = $this->logo->storeAs('uploads', $fileName, 'public');
    
      $membership = new Memberships();
      $membership->name = $this->name;
      $membership->slug =  strtolower(str_replace(' ', '-',$this->name));
      $membership->logo = $fileName;
      $membership->sort_id =$this->sort;
      $membership->status = $this->status;
      $membership->save();

       $this->resetInputFields();

     $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 

      }  


   }

    public function delete($id){
            $dellogo = Memberships::findOrFail($id);
            if(isset($dellogo->logo)){
                $logoimg = Storage::path('public/uploads/'. $dellogo->logo);
                    if(File::exists($logoimg)){
                        // dd($logoimg);
                        unlink($logoimg);
                    }
            }
            Memberships::destroy($id);

     }

    public function render()
    {
    	$this->records =  Memberships::orderBy('sort_id' ,'asc')->get();
   dd( $this->ip());
        return view('livewire.backend.membership.view-membership')->layout('layouts.backend');
    }
}
