<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Metadetails;

use Livewire\Component;
use App\Models\Categories;
use App\Models\Gallery as ModelsGallery;
use Livewire\WithPagination;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
// OR with multi
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Illuminate\Contracts\Database\Eloquent\Builder;
// OR use only single facades 

use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Support\Facades\Route;

class Gallery extends Component
{

   use WithPagination;

   public  $albumTitleValue ;
   public  $yearValue ;
   public  $adminNoValue ;
   public  $studentNameValue ;
    public $searchField ='';
    public $galeryCategory;

    public $searchCategory;
    public $searchTitle;
    public $searchYear;
    public $searchName;
    
   protected $paginationTheme = 'bootstrap';
   public $selectedRecords = 2;

   public $seo_keywords;

 public $getcategorywise;
  public  $getYearwise;
  public $search = '';
 
  public function updatingSearch()
  {
      $this->resetPage('commentsPage');
  }
   public function mount(){
        $this->galeryCategory =   Categories::get();
 
  
    $getRouteName =  Route::currentRouteName(); 
    $seoMetaData =  Metadetails::where('name',$getRouteName )->first();
    if($seoMetaData){
        
    SEOTools::setTitle($seoMetaData->title ?? 'Gallery');
    SEOTools::setDescription($seoMetaData->description ?? '');
    SEOTools::opengraph()->setUrl(url()->current());
    SEOTools::setCanonical(url()->current());
    SEOTools::opengraph()->addProperty('type', 'website');
    SEOTools::twitter()->setSite($seoMetaData->title ?? '');
    $keywords = $seoMetaData->keywords;
    SEOMeta::addKeyword( $keywords);
}
        $this->getcategorywise = ModelsGallery::with(['galCategory'])       
        ->where('status', 'Active')->orderBy('category_id')->latest()->groupBy('category_id')->get();

        $this->getYearwise= ModelsGallery::with(['galCategory'])       
        ->where('status', 'Active')->orderBy('year')->latest()->groupBy('year')->get();
}

public function searchGallery(){
        $this->search = $this->search;
        

    
}



    public function render()
    {
                    
            //     $galleryimages =   ModelsGallery:: whereHas('galCategory', function (EloquentBuilder $query) {
            //     $query->whereIn('category_id', 'like', '%'.$this->yearValue.'%');
            // })
            // ->where('status', 'Active')
            // ->orderBy('sort_id')
            // ->groupBy('category_id')->paginate(10);

    

        

        return view('livewire.frontend.gallery'    ,    [
            'galleryimages' =>  ModelsGallery::with(['galCategory'])
            ->where('status', 'Active')
            ->where(function ($query) {
                $query->where('addmision_no', 'like', '%' . $this->search . '%')
                      ->orWhere('s_name', 'like', '%' . $this->search . '%')
                      ->orWhere('category_id', 'like', '%' . $this->search . '%')
                      ->orWhere('year', 'like', '%' . $this->search . '%');
            })
            ->orderBy('sort_id')
            ->groupBy('category_id')
            ->paginate(10)] )->layout('layouts.frontend');

        $this->resetInputFields();
    }

    public function resetallinput(){
        $this->resetInputFields();
    }
    
    private function resetInputFields(){
        $this->albumTitleValue = '';
        $this->yearValue = '';
        $this->adminNoValue = '';
        $this->studentNameValue = '';
    
        
    }
}
