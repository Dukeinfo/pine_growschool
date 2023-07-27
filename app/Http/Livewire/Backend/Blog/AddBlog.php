<?php

namespace App\Http\Livewire\Backend\Blog;

use Livewire\Component;
use App\Models\Blogs;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Type\NullType;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class AddBlog extends Component
{

    use WithFileUploads;

    public $title,$desc, $image,$sort,$status;
    public $records ,$thumbnail;

     protected $rules = [
        'title' => 'required', 
        'desc' => 'required', 
        'sort' => 'required', 
        'status' => 'required', 
     
      ];

    protected $messages = [
          'title.required' => 'Title Required.',
          'desc.required' => 'Description Required.',
          'sort.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];

    private function resetInputFields(){
        $this->title = '';
        $this->desc = '';
        $this->sort = '';
        $this->status = '';
    }      

    public function addBlog(){
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

      $blog = new Blogs();
      $blog->title = $this->title ?? NULL;
      $blog->slug =  $this->createSlug($this->title ?? NULL);
      $blog->description = $this->desc ?? NULL;
      $blog->image = $imageName ?? NULL;
      $blog->thumbnail = $thumbnailName ?? NULL;
      $blog->sort_id =$this->sort ?? NULL;
      $blog->status = $this->status ?? NULL;
      $blog->save();
      $this->resetInputFields(); 
      $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]); 

          $this->emit('formSubmitted');

          $this->image =NULL;
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
          return Blogs::select('slug')->where('slug', 'like', $slug.'%')
          ->where('id', '<>', $id)
          ->get();
      }

    public function delete($id){
       
       Blogs::destroy($id);

     }

    public function render()
    {

        return view('livewire.backend.blog.add-blog')->layout('layouts.backend');
    }
}
