<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\ResultClassx;
use App\Models\ResultClassxi;
class EditResultx extends Component
{

    public $show;

    public $editId,$status,$year,$regstu,$passstu,$passper,$remarks;

    protected $listeners = ['showResultX' => 'showModal'];

    public function mount() {
    	$this->show = false;
    }

    public function showModal($dataId,$status) {
    	$this->status=$status;
    	if($status=="FIRST"){
        $result = ResultClassx::findOrFail($dataId);
        }
        if($status=="SECOND"){
        $result = ResultClassxi::findOrFail($dataId);
        }
        $this->editId = $result->id;
        $this->year = $result->year;
        $this->regstu = $result->regstu;
        $this->passstu = $result->passstu;
        $this->passper = $result->passper;
        $this->remarks = $result->remarks;


        $this->doShow();
    }

    public function doShow() {
        $this->show = true;
    }

    public function doClose() {
        $this->show = false;
    }

    public function doSomething() {

    	if($this->status=="FIRST"){
        $result = ResultClassx::findOrFail($this->editId);
         }
        if($this->status=="SECOND"){
        $result = ResultClassxi::findOrFail($this->editId);
        } 	
        $result->year = $this->year;
        $result->regstu = $this->regstu;
        $result->passstu = $this->passstu;
        $result->passper = $this->passper;
        $result->remarks = $this->remarks;
        $result->save();

       //EMIT FOR MANDATORY DATA
       $this->emit('showResult');

       $this->doClose();
    }


    public function render()
    {
        return view('livewire.modals.edit-resultx');
    }
}
