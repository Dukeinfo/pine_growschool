<?php

namespace App\Http\Livewire\Backend\Gallery;

use Livewire\Component;
use App\Models\Categories;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ViewGalleryCategory extends Component
{
    use WithFileUploads;
    public $name, $image,$sort,$status;
    public $records;
    protected $rules = [
        'name' => 'required', 
        'image' => 'required', 
        'sort' => 'required', 
        'status' => 'required', 
     
      ];
    protected $messages = [
          'name.required' => 'Name Required.',
          'image.required' => 'Image Required.',
          'sort.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->name = '';
        $this->image = '';
        $this->sort = '';
        $this->status = '';
    }

    public function addCategory(){
    $validatedData = $this->validate();
    if(!is_null($this->image)){
      $fileName = time().'_'.$this->image->getClientOriginalName();
      $filePath = $this->image->storeAs('uploads', $fileName, 'public');
      $categories = new Categories();
      $categories->name = $this->name;
      $categories->slug =  strtolower(str_replace(' ', '-',$this->name))?? Null;
      $categories->image = $fileName;
      $categories->sort_id =$this->sort;
      $categories->status = $this->status;
      $categories->save();

        $this->resetInputFields(); 
        $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 

    }  


   }

   public function delete($id){

      $category = Categories::findOrFail($id);
      if(!is_null($category)){
        $category->delete();
      }

     }

    public function render()
    {
        $this->records=Categories::orderBy('sort_id' ,'asc')->get();
        return view('livewire.backend.gallery.view-gallery-category')->layout('layouts.backend');
    }
}
