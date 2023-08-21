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
use Illuminate\Support\Facades\Route;
use Artesaos\SEOTools\Facades\SEOTools;


class GalleryDetail extends Component
{

   public $galleryId,$category,$records;

   public $seo_keywords;

    public function mount($category_id )
    {
      $category = Categories::findOrFail($category_id);
        $this->category = $category->name;

       $this->records = Gallery::where('category_id', $category_id)->get();
       $getRouteName =  Route::currentRouteName(); 

       if($getRouteName){
         $seoMetaData =  Metadetails::where('name',$getRouteName )->first();     
          if($seoMetaData){
              SEOTools::setTitle($seoMetaData->title ?? 'Gallery Detail');
              SEOTools::setDescription($seoMetaData->description ?? '');
              SEOTools::opengraph()->setUrl(url()->current());
              SEOTools::setCanonical(url()->current());
              SEOTools::opengraph()->addProperty('type', 'website');
              SEOTools::twitter()->setSite($seoMetaData->title ?? '');
              $keywords = $seoMetaData->keywords;
              SEOMeta::addKeyword( $keywords);

          }
          else{
              SEOTools::setTitle('Gallery Detail');
          }
      }

      
    }
            
    public function render()
    {

        return view('livewire.frontend.gallery-detail')->layout('layouts.frontend');;
    }
}
