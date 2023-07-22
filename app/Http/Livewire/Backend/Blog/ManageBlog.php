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

class ManageBlog extends Component
{
  public $records;
    public function render()
    {
    	$this->records=Blogs::orderBy('sort_id' ,'asc')->get();
        return view('livewire.backend.blog.manage-blog')->layout('layouts.backend');
    }


    public function delete($id){

      $blog = Blogs::findOrFail($id);
        if(!is_null($blog)){
          $blog->delete();
        }

     }
}
