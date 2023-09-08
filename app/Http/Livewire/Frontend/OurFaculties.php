<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Staff;
use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Models\Metadetails;
use App\Models\PageContent;
use Illuminate\Support\Facades\Route;


class OurFaculties extends Component
{ 
    public $getStaffList  ,$pageData;

    public function mount(){
        $getRouteName =  Route::currentRouteName(); 
        if($getRouteName){
            $seoMetaData =  Metadetails::where('name',$getRouteName )->first();
            SEOTools::setTitle($seoMetaData->title ?? 'OurFaculties');
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
        $this->getStaffList =  Staff::get();
        return view('livewire.frontend.our-faculties')->layout('layouts.frontend');
    }
}
