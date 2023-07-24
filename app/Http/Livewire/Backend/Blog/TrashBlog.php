<?php

namespace App\Http\Livewire\Backend\Blog;

use Livewire\Component;
use App\Models\Blogs;

class TrashBlog extends Component
{
  
    public $records;
    
    public function render()
    {
    	$this->records = Blogs::onlyTrashed()->orderBy('sort_id','asc')->get();

        return view('livewire.backend.blog.trash-blog')->layout('layouts.backend');
    }

    public function restore($id){
      $blog = Blogs::withTrashed()->findOrFail($id);
      if(!is_null($blog)){
        $blog->restore();
      }

       return redirect()->route('manage_blog');
    }
}
