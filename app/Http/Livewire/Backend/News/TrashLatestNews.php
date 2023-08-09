<?php

namespace App\Http\Livewire\Backend\News;

use Livewire\Component;
use App\Models\LatestNews;

class TrashLatestNews extends Component
{
    public function render()
    {
    	$this->records = LatestNews::onlyTrashed()->orderBy('sort_id','asc')->get();
        return view('livewire.backend.news.trash-latest-news')->layout('layouts.backend');
    }

     public function restore($id){
      $latestnews = LatestNews::withTrashed()->findOrFail($id);
      if(!is_null($latestnews)){
        $latestnews->restore();
      }

       return redirect()->route('view_news');
    }

}
