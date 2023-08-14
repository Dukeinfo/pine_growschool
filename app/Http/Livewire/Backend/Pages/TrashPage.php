<?php

namespace App\Http\Livewire\Backend\Pages;

use Livewire\Component;
use App\Models\CreatePage;

class TrashPage extends Component
{
    public function render()
    {
    	$this->records = CreatePage::onlyTrashed()->orderBy('sort_id','asc')->get();
        return view('livewire.backend.pages.trash-page')->layout('layouts.backend');
    }

    public function restore($id){
      $createPage = CreatePage::withTrashed()->findOrFail($id);
      if(!is_null($createPage)){
        $createPage->restore();
      }

       return redirect()->route('create_page');
    }
}
