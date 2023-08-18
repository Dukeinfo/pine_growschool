<?php

namespace App\Http\Livewire\Frontend\Home;

use App\Models\Menu;
use App\Models\Slider;
use App\Models\Memberships;
use App\Models\BoardMembers;
use App\Models\Facilities;
use App\Models\KnowledgeHome;
use App\Models\Testimonials;
use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
// OR with multi
use Artesaos\SEOTools\Facades\JsonLdMulti;
use App\Models\Metadetails;
use Illuminate\Support\Facades\Route;
// OR use only single facades 

use Artesaos\SEOTools\Facades\SEOTools;
class Homepage extends Component
{

    public $menus;
    public $sliders;
    public $memberships ,$boardmembers, $knowledgeHome ,
            $testimonials, $seo_keywords ,$getfacilities;

public function mount(){
    $getRouteName =  Route::currentRouteName(); 
    $seoMetaData =  Metadetails::where('name',$getRouteName )->first();
    if($seoMetaData){    
    SEOTools::setTitle($seoMetaData->title ?? 'Home ');
    SEOTools::setDescription($seoMetaData->description ?? '');
    SEOTools::opengraph()->setUrl(url()->current());
    SEOTools::setCanonical(url()->current());
    SEOTools::opengraph()->addProperty('type', 'website');
    SEOTools::twitter()->setSite($seoMetaData->title ?? '');
    $keywords = $seoMetaData->keywords;
    SEOMeta::addKeyword( $keywords);
    // SEOTools::jsonLd()->addImage('https://pinegroveschool.org/pinegrove/public/assets/images/logo.png');
    
   }
$this->menus = Menu::orderBy('sort_id','asc')->where('status','Active')->take(9)->get();	
$this->sliders = Slider::orderBy('sort_id','asc')->where('status','Active')->get();	
$this->memberships =  Memberships::orderBy('sort_id' ,'asc')->where('status','Active')->get(); 
$this->boardmembers =  BoardMembers::orderBy('sort_id' ,'asc')->where('status','Active')->get(); 
$this->knowledgeHome =  KnowledgeHome::orderBy('sort_id' ,'asc')->where('status','Active')->get(); 
$this->getfacilities =  Facilities::orderBy('sort_id' ,'asc')->where('status','Active')->get();
$this->testimonials =  Testimonials::orderBy('sort_id' ,'asc')->where('status','Active')->get(); 
}


    public function render()
    {


        return view('livewire.frontend.home.homepage')->layout('layouts.frontend');
    }
}
