<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Metadetails;
use Illuminate\Support\Facades\Route;

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

class AboutUs extends Component
{

    public $seo_keywords ,$pageData;

    public function mount(){

    $getRouteName =  Route::currentRouteName(); 
    if($getRouteName){
        $seoMetaData =  Metadetails::where('name',$getRouteName )->first();
          if($seoMetaData){
            SEOTools::setTitle($seoMetaData->title ?? 'About us');
            SEOTools::setDescription($seoMetaData->description ?? '');
            SEOTools::opengraph()->setUrl(url()->current());
            SEOTools::setCanonical(url()->current());
            SEOTools::opengraph()->addProperty('type', 'website');
            SEOTools::twitter()->setSite($seoMetaData->title ?? '');
            $keywords = $seoMetaData->keywords ?? '';
            SEOMeta::addKeyword( $keywords);
                // SEOTools::jsonLd()->addImage('https://pinegroveschool.org/pinegrove/public/assets/images/logo.png');
                
   }
   $this->pageData =  PageContent::where('name',$getRouteName )->first();   
}

}


    public function render()
    {
        return view('livewire.frontend.about-us')->layout('layouts.frontend');
    }
}
