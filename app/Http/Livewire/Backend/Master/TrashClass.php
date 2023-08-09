<?php

namespace App\Http\Livewire\Backend\Master;

use Livewire\Component;
use App\Models\ClassMaster;

class TrashClass extends Component
{
    public function render()
    {
      $this->records = ClassMaster::onlyTrashed()->orderBy('sort_id','asc')->get();
        return view('livewire.backend.master.trash-class')->layout('layouts.backend');
    }

      public function restore($id){
      $class = ClassMaster::withTrashed()->findOrFail($id);
      if(!is_null($class)){
        $class->restore();
      }

       return redirect()->route('view_class');
    }
}
