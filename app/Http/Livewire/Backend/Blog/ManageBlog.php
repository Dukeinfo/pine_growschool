<?php

namespace App\Http\Livewire\Backend\Blog;

use Livewire\Component;

class ManageBlog extends Component
{
    public function render()
    {
        return view('livewire.backend.blog.manage-blog')->layout('layouts.backend');
    }
}
