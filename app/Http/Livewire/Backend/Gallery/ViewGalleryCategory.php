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
use Illuminate\Support\Str;
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
      $categories->slug =  $this->createSlug($this->name ?? NULL);
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


     //CREATE SLUG
    public function createSlug($title, $id = 0)
       {
        $slug =  Str::slug($title);
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }

        $i = 1;
        $is_contain = true;
        do {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                $is_contain = false;
                return $newSlug;
            }
            $i++;
        } while ($is_contain);
      }


      //INCREMENT SLUG
      protected function getRelatedSlugs($slug, $id = 0)
      {
          return Categories::select('slug')->where('slug', 'like', $slug.'%')
          ->where('id', '<>', $id)
          ->get();
      }



   public function delete($id){

      $category = Categories::findOrFail($id);
      if(!is_null($category)){
        $category->delete();
      }

     }

    public function render()
    {
        $this->records=Categories::latest()->orderBy('sort_id' ,'asc')->get();
        return view('livewire.backend.gallery.view-gallery-category')->layout('layouts.backend');
    }
}
