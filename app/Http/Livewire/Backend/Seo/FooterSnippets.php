<?php

namespace App\Http\Livewire\Backend\Seo;

use Livewire\Component;

class FooterSnippets extends Component
{
    public function render()
    {
        return view('livewire.backend.seo.footer-snippets')->layout('layouts.backend');
    }
}
