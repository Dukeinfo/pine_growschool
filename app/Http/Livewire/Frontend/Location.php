<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Metadetails;
use App\Models\PageContent;
use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
// OR with multi
use Artesaos\SEOTools\Facades\JsonLdMulti;

// OR use only single facades 

use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Route;

class Location extends Component
{

    public $seo_keywords;
    public $pageData;

   public function mount(){
        $getRouteName =  Route::currentRouteName(); 
        if($getRouteName){
            $seoMetaData =  Metadetails::where('name',$getRouteName )->first();
            SEOTools::setTitle($seoMetaData->title ?? 'Location');
            if($seoMetaData){
                SEOTools::setDescription($seoMetaData->description ?? '');
                SEOTools::opengraph()->setUrl(url()->current());
                SEOTools::setCanonical(url()->current());
                SEOTools::opengraph()->addProperty('type', 'website');
                SEOTools::twitter()->setSite($seoMetaData->title ?? '');
                $keywords = $seoMetaData->keywords ?? '';
                SEOMeta::addKeyword( $keywords);
            }
            $this->pageData =  PageContent::where('name',$getRouteName )->first();   

        }
      
   }



    public function render()
    {
        return view('livewire.frontend.location')->layout('layouts.frontend');;
    }
}
