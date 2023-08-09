<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Categories;
use Livewire\WithPagination;

class Gallery extends Component
{

   use WithPagination;

   public $selectedRecords = 2;

    public function render()
    {
        return view('livewire.frontend.gallery',[
        'categoires' => Categories::where('status','Active')->orderBy('sort_id')->latest()->paginate($this->selectedRecords)
      ])->layout('layouts.frontend');
    }
}
