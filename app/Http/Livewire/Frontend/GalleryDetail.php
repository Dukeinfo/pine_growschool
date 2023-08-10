<?php

namespace App\Http\Livewire\Frontend;

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
class GalleryDetail extends Component
{

   public $galleryId,$category,$records;

   public $seo_keywords;

    public function mount($category_id )
    {
      $category = Categories::findOrFail($category_id);
        $this->category = $category->name;

       $this->records = Gallery::with(['Category'])->where('category_id', $category_id)->get();

     SEOTools::setTitle('Pinegrow school | Gallery Detail');
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

        return view('livewire.frontend.gallery-detail')->layout('layouts.frontend');;
    }
}
