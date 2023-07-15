<?php

namespace App\Http\Livewire\Backend\Blog;

use Livewire\Component;

class AddBlog extends Component
{
    public function render()
    {
        return view('livewire.backend.blog.add-blog')->layout('layouts.backend');
    }
}
