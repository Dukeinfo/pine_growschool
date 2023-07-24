<?php

namespace App\Http\Livewire\Backend\Gallery;

use Livewire\Component;
use App\Models\Categories;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Type\NullType;
use Intervention\Image\Facades\Image;
class ViewGalleryCategory extends Component
{
    use WithFileUploads;
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
 

      $categories = new Categories();
      $categories->name = $this->name ?? NULL;
      $categories->slug =  strtolower(str_replace(' ', '-',$this->name))?? Null;
      $categories->image = $imageName ?? NULL;
      $categories->thumbnail = $thumbnailName ?? NULL;
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
