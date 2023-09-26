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

public $category_id;
public $year;
public $s_name;
public $addmision_no;

   public $seo_keywords;

    public function mount($category_id )
    {
      $category = Categories::findOrFail($category_id);
        $this->category_id = $category->category_id;
        $this->year = $category->year;
        $this->s_name = $category->s_name;
        $this->addmision_no = $category->addmision_no;


      //  $this->records = Gallery::where('category_id', $this->category_id)->latest()->get();
      $this->records = Gallery::where('category_id', $category_id)->when($this->year, function ($query) {
          return $query->where('year', 'like', '%' . $this->year . '%');
      })->when($this->s_name, function ($query) {
          return $query->where('s_name', 'like', '%' . $this->s_name . '%');
      })
->when($this->addmision_no, function ($query) {
          return $query->where('addmision_no', 'like', '%' . $this->addmision_no . '%');
      })->orderByRaw("CASE 
            WHEN year LIKE '%$this->year%' THEN 0
            WHEN s_name LIKE '%$this->s_name%' THEN 0
            WHEN addmision_no LIKE '%$this->addmision_no%' THEN 0
            ELSE 1
            END")
      ->get();
  


       $getRouteName =  Route::currentRouteName(); 

       if($getRouteName){
         $seoMetaData =  Metadetails::where('name',$getRouteName )->first();     
         SEOTools::setTitle($seoMetaData->title ?? 'Gallery Detail');
         if($seoMetaData){
              SEOTools::setDescription($seoMetaData->description ?? '');
              SEOTools::opengraph()->setUrl(url()->current());
              SEOTools::setCanonical(url()->current());
              SEOTools::opengraph()->addProperty('type', 'website');
              SEOTools::twitter()->setSite($seoMetaData->title ?? '');
              $keywords = $seoMetaData->keywords ?? '';
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
