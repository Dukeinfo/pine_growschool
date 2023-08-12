<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Metadetails;

use Livewire\Component;
use App\Models\Categories;
use App\Models\Gallery;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
// OR with multi
use Artesaos\SEOTools\Facades\JsonLdMulti;

// OR use only single facades 

use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Routing\Route;

class GalleryDetail extends Component
{

   public $galleryId,$category,$records;

   public $seo_keywords;

    public function mount($category_id )
    {
      $category = Categories::findOrFail($category_id);
        $this->category = $category->name;

       $this->records = Gallery::with(['Category'])->where('category_id', $category_id)->get();
       $getRouteName =  Route::currentRouteName(); 
       $seoMetaData =  Metadetails::where('name',$getRouteName )->first();
       if($seoMetaData){
           
       SEOTools::setTitle($seoMetaData->title ?? 'GalleryDetail');
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

        return view('livewire.frontend.gallery-detail')->layout('layouts.frontend');;
    }
}
