<?php

namespace App\Http\Livewire\Backend\Gallery;

use Livewire\Component;
use App\Models\Categories;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Type\NullType;
use Intervention\Image\Facades\Image;
class ViewGalleryCategory extends Component
{
    use WithFileUploads;
    use UploadTrait;
    public $name, $image,$sort,$status;
    public $records,$thumbnail;
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
      $image =  $this->image;
      // Define folder path
      $folder = '/uploads/gallery_cat';
      $uploadedData = $this->uploadOne($image, $folder);

    }  


      $categories = new Categories();
      $categories->name = $this->name ?? NULL;
      $categories->slug =  strtolower(str_replace(' ', '-',$this->name))?? Null;
      $categories->image = $uploadedData['file_name'] ?? NULL;
      $categories->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
      $categories->sort_id =$this->sort ?? NULL;
      $categories->status = $this->status ?? NULL;
      $categories->save();

        $this->resetInputFields(); 
        $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 




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
