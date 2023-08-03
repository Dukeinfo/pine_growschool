<?php

namespace App\Http\Livewire\Backend\News;

use Livewire\Component;
use App\Models\LatestNews;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Type\NullType;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ViewLatestNews extends Component
{
    use WithFileUploads;
    use UploadTrait;
    public  $newsDate,$title,$desc,$link,$sort_id,$status;

    protected $listeners = ["selectDate" => 'getDate'];

     protected $rules = [ 
        'newsDate' => 'required', 
        'title' => 'required',
        'desc' => 'required',
        'sort_id' => 'required',
        'status' => 'required',    
     
      ];
      protected $messages = [
          'newsDate.required' => 'Date Required.',
          'title.required' => 'Title Required.',
          'desc.required' => 'Description Required.',
          'sort_id.required' => 'Sort Required.',
          'status.required' => 'Status Required.',
      ];
    private function resetInputFields(){
        $this->newsDate = '';
        $this->title = '';
        $this->desc = '';
        $this->sort_id = '';
        $this->status = '';
        
    }

  
    public function getDate( $date ) {
        
        $this->newsDate = $date;
    }


    public function addLatestNews(){

      $validatedData = $this->validate();

      $date=date('Y-m-d', strtotime($this->newsDate));

      
      $latestNews = new LatestNews();
      $latestNews->date = $date;
      $latestNews->title = $this->title;
      $latestNews->slug =  $this->createSlug($this->title ?? NULL);
      $latestNews->description = $this->desc;
      $latestNews->link = $this->link;
      $latestNews->sort_id =$this->sort_id;
      $latestNews->status = $this->status;
      $latestNews->save();

      $this->resetInputFields();

      $this->dispatchBrowserEvent('swal:modal', [
              'type' => 'success',  
              'message' => 'Successfully save!', 
          ]);
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


      public function delete($id){

      $latestNews = LatestNews::findOrFail($id);
      if(!is_null($latestNews)){
        $latestNews->delete();
      }

     }

    public function render()
    {
    	 $this->records = LatestNews::orderBy('sort_id','asc')->get();
        return view('livewire.backend.news.view-latest-news')->layout('layouts.backend');
    }
}
