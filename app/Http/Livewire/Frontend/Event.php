<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\SchoolCalendar;

class Event extends Component
{
    public function render()
    {
    	$this->events = SchoolCalendar::orderBy('sort_id','asc')->get();
        return view('livewire.frontend.event')->layout('layouts.frontend');
    }
}
