<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\DownloadDocument;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Response;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
// OR with multi
use Artesaos\SEOTools\Facades\JsonLdMulti;
// OR use only single facades 
use Artesaos\SEOTools\Facades\SEOTools;
use App\Models\Metadetails;
use App\Models\PageContent;
use Illuminate\Support\Facades\Route;
class DownloadResources extends Component
{
  public $documents;

  public $pageData;
  public function mount(){
      $getRouteName =  Route::currentRouteName(); 
      if($getRouteName){
      $seoMetaData =  Metadetails::where('name',$getRouteName )->first();
        SEOTools::setTitle($seoMetaData->title ?? 'Download Resources');
       if($seoMetaData){
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
    	$this->documents =  DownloadDocument::where('status', 'active' )->get();
        return view('livewire.frontend.download-resources')->layout('layouts.frontend');
    }

     public function download($document){
       $path =  Storage::path('public/uploads/document/'. $document);
     return response()->download($path);

   }
}
