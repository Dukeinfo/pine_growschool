<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class Career extends Component
{
    public $experiences = [];
    public function mount()
    {
        $this->addExperience();
    }

    public function addExperience()
    {
        $this->experiences[] = ['institution' => '', 'period_from' => '', 'period_to' => ''];

        $lastExperience = end($this->experiences);

        if (empty($lastExperience) || (!empty($lastExperience) && array_filter($lastExperience))) {
            $this->experiences[] = ['institution' => '', 'period_from' => '', 'period_to' => ''];
        }
    }

    public function removeExperience($index)
    {
        unset($this->experiences[$index]);
        $this->experiences = array_values($this->experiences);
    }
    public function render()
    {
        return view('livewire.frontend.career')->layout('layouts.frontend');
    }
}
