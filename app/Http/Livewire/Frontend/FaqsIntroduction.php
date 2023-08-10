<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
// OR with multi
use Artesaos\SEOTools\Facades\JsonLdMulti;

// OR use only single facades 

use Artesaos\SEOTools\Facades\SEOTools;

class FaqsIntroduction extends Component
{

   public $seo_keywords;

   public function mount(){
    SEOTools::setTitle('Pinegrow school | Faqs Introduction');
    SEOTools::setDescription('This is my page description of Pinegrow school');
    SEOTools::opengraph()->setUrl('https://pinegroveschool.org/pinegrove/');
    SEOTools::setCanonical('https://pinegroveschool.org/pinegrove/');
    SEOTools::opengraph()->addProperty('type', 'website');
    SEOTools::twitter()->setSite('Pinegrow school');
    SEOTools::jsonLd()->addImage('https://pinegroveschool.org/pinegrove/public/assets/images/logo.png');
    $keywords = $this->seo_keywords;
    SEOMeta::addKeyword( $keywords);
    
}


    public function render()
    {
        return view('livewire.frontend.faqs-introduction')->layout('layouts.frontend');;
    }
}
