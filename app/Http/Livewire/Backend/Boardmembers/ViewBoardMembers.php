<?php

namespace App\Http\Livewire\Backend\Boardmembers;

use Livewire\Component;

class ViewBoardMembers extends Component
{
    public function render()
    {
        return view('livewire.backend.boardmembers.view-board-members')->layout('layouts.backend');
    }
}
