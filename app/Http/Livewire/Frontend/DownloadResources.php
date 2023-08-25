<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class DownloadResources extends Component
{
    public function render()
    {
        return view('livewire.frontend.download-resources')->layout('layouts.frontend');
    }
}
