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

class EditBlog extends Component
{

	use WithFileUploads;

    public $blogId,$title,$desc, $image,$editimage,$sort,$status;
    public $records ,$thumbnail;

     public function mount($id){
        $blog = Blogs::findOrFail($id);
        $this->blogId = $blog->id;
        $this->title = $blog->title;
        $this->desc = $blog->description;
        $this->image = $blog->image;
        $this->thumbnail = $blog->thumbnail;
        $this->sort = $blog->sort_id;
    	$this->status = $blog->status;
     }

     public function editBlog() {
        if(!is_null($this->editimage)){
    
         // Generate a unique name for the image
        $imageName =  uniqid() . '.' . $this->editimage->getClientOriginalExtension();

        // Get the path where you want to save the image and thumbnail
        $directory = public_path('uploads/thumbnail');

        // Check if the directory exists, if not, create it
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true, true);
        }
        // Save the original image to the specified directory
        $this->editimage->storeAs('uploads', $imageName, 'public');
        // Generate a thumbnail and save it to the specified directory
        $thumbnailName = 'thumb_' . $imageName;
        Image::make($this->editimage)->fit(200, 200)->save($directory . '/' . $thumbnailName);
            $blog = Blogs::find($this->blogId);
            $blog->title = $this->title;
            $blog->description = $this->desc;
            $blog->slug =  $this->createSlug($this->title ?? NULL);
            $blog->image = $imageName ?? NULL;
            $blog->thumbnail = $thumbnailName ?? NULL;
            $blog->sort_id =$this->sort;
            $blog->status = $this->status;
            $blog->save();
         
 
        }
        else{
            $blog = Blogs::find($this->blogId);
            $blog->title = $this->title;
            $blog->description = $this->desc;
            $blog->slug =  $this->createSlug($this->title ?? NULL);
            $blog->sort_id =$this->sort;
            $blog->status = $this->status;
            $blog->save();
        }
        return redirect()->route('manage_blog'); 
        

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


    public function render()
    {
        return view('livewire.backend.blog.edit-blog')->layout('layouts.backend');
    }
}
