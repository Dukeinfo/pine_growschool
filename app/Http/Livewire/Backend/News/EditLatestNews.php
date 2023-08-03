<?php

namespace App\Http\Livewire\Backend\News;

use Livewire\Component;
use App\Models\LatestNews;
use Illuminate\Support\Str;

class EditLatestNews extends Component
{

   public  $newsId,$newsDate,$title,$desc,$link,$sort_id,$status;

    protected $listeners = ["selectDate" => 'getDate'];

    public function getDate( $date ) {
        
        $this->newsDate = $date;
    }

    public function mount($id)
     {
        $latestNews = LatestNews::find($id);
        $this->newsId = $latestNews->id;
        $this->newsDate = $latestNews->date;
        $this->title = $latestNews->title;
        $this->desc = $latestNews->description;
        $this->link = $latestNews->link;
        $this->sort_id = $latestNews->sort_id;
    	$this->status = $latestNews->status;
      
     }

    public function editLatestNews(){
      $date=date('Y-m-d', strtotime($this->newsDate));

      $latestNews = LatestNews::find($this->newsId);
      $latestNews->date = $date;
      $latestNews->title = $this->title;
      $latestNews->slug =  $this->createSlug($this->title ?? NULL);
      $latestNews->description = $this->desc;
      $latestNews->link = $this->link;
      $latestNews->sort_id =$this->sort_id;
      $latestNews->status = $this->status;
      $latestNews->save();

      return redirect()->route('view_news'); 
    } 

     //CREATE SLUG
    public function createSlug($title, $id = 0)
       {
        $slug =  Str::slug($title);
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }

        $i = 1;
        $is_contain = true;
        do {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                $is_contain = false;
                return $newSlug;
            }
            $i++;
        } while ($is_contain);
      }


      //INCREMENT SLUG
      protected function getRelatedSlugs($slug, $id = 0)
      {
          return LatestNews::select('slug')->where('slug', 'like', $slug.'%')
          ->where('id', '<>', $id)
          ->get();
      }

    public function render()
    {
        return view('livewire.backend.news.edit-latest-news')->layout('layouts.backend');
    }
}
