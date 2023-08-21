<?php

namespace App\Http\Livewire\Backend\Blog;

use Livewire\Component;
use App\Models\Blogs;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Type\NullType;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class AddBlog extends Component
{

    use WithFileUploads;
    use UploadTrait;
    public $title,$desc, $image,$sort,$status;
    public $records ,$thumbnail;

     protected $rules = [
        'title' => 'required', 
        'desc' => 'required', 
        'sort' => 'required| unique:blogs,sort_id', 
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
        $image =  $this->image;
        // Define folder path
        $folder = '/uploads/blogs';
        $uploadedData = $this->uploadOne($image, $folder);

      }  

      $blog = new Blogs();
      $blog->title = $this->title ?? NULL;
      $blog->slug =  $this->createSlug($this->title ?? NULL);
      $blog->description = $this->desc ?? NULL;
      $blog->image =$uploadedData['file_name'] ?? NULL;
      $blog->thumbnail = $uploadedData['thumbnail_name'] ?? NULL;
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
