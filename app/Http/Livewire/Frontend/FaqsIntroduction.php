<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Metadetails;
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

class FaqsIntroduction extends Component
{

   public $seo_keywords;

   public function mount(){
    $getRouteName =  Route::currentRouteName(); 
    $seoMetaData =  Metadetails::where('name',$getRouteName )->first();
    if($seoMetaData){
        
    SEOTools::setTitle($seoMetaData->title ?? 'Faqs Introduction');
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
        return view('livewire.frontend.faqs-introduction')->layout('layouts.frontend');;
    }
}
