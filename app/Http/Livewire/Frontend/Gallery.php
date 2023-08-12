<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Metadetails;

use Livewire\Component;
use App\Models\Categories;
use Livewire\WithPagination;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
// OR with multi
use Artesaos\SEOTools\Facades\JsonLdMulti;

// OR use only single facades 

use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Route;

class Gallery extends Component
{

   use WithPagination;
   protected $paginationTheme = 'bootstrap';
   public $selectedRecords = 2;

   public $seo_keywords;

   public $search = '';
 
   public function updatingSearch()
   {
	   $this->resetPage();
   }
   public function mount(){
    $getRouteName =  Route::currentRouteName(); 
    $seoMetaData =  Metadetails::where('name',$getRouteName )->first();
    if($seoMetaData){
        
    SEOTools::setTitle($seoMetaData->title ?? '');
    SEOTools::setDescription($seoMetaData->description ?? '');
    SEOTools::opengraph()->setUrl(url()->current());
    SEOTools::setCanonical(url()->current());
    SEOTools::opengraph()->addProperty('type', 'website');
    SEOTools::twitter()->setSite($seoMetaData->title ?? '');
    $keywords = $seoMetaData->keywords;
    SEOMeta::addKeyword( $keywords);
}
}


    public function render()
    {
		$categories = Categories::where('status', 'Active')
            ->orderBy('sort_id')
            ->latest()
            ->paginate($this->selectedRecords);

        return view('livewire.frontend.gallery', [
            'categoires' => $categories,
        ])->layout('layouts.frontend');
    }
}
