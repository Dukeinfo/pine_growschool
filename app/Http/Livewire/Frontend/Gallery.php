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
        ->where('status', 'Active')->orderBy('category_id')->groupBy('category_id')->get();

        $this->getYearwise= ModelsGallery::with(['galCategory'])       
        ->where('status', 'Active')->orderBy('year')->latest()->groupBy('year')->get();
}

public function searchGallery(){
        $this->search = $this->search;   
}



    public function render()
    {                    
      return view('livewire.frontend.gallery',[
            'galleryimages' => ModelsGallery::with(['galCategory'])
            ->join('categories', 'galleries.category_id', '=', 'categories.id')
            ->where(function ($query) {
                $search = trim($this->search);
                $query->where('galleries.addmision_no', 'like', '%' . $search . '%')
                    ->orWhere('galleries.s_name', 'like', '%' . $search . '%')
                    ->orWhere('galleries.year', 'like', '%' . $search . '%')
                    ->orWhere('categories.id', 'like', '%' . $search . '%'); // Assuming 'name' is the column you want to search in the 'categories' table
            })
            ->where('galleries.status', 'Active')
            ->orderBy('galleries.sort_id')
            ->groupBy('galleries.category_id')
            ->paginate(10)])->layout('layouts.frontend');

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
