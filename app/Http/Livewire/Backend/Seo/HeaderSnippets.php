<?php

namespace App\Http\Livewire\Backend\Seo;

use Livewire\Component;

class HeaderSnippets extends Component
{
    public function render()
    {
        return view('livewire.backend.seo.header-snippets')->layout('layouts.backend');
    
    }
}
