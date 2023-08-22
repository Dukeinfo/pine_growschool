<?php

namespace App\Http\Livewire\Backend\Pages;

use Livewire\Component;
use App\Models\PageContent;

class TrashPageContent extends Component
{
    public function render()
    {
    	$this->records = PageContent::onlyTrashed()->orderBy('sort_id','asc')->get();
        return view('livewire.backend.pages.trash-page-content')->layout('layouts.backend');
    }

    public function restore($id){
      $pageContent = PageContent::withTrashed()->findOrFail($id);
      if(!is_null($pageContent)){
        $pageContent->restore();
      }

       return redirect()->route('page_content');
    }
}
