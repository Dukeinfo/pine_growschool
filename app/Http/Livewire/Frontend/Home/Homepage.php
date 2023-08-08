<?php

namespace App\Http\Livewire\Frontend\Home;

use App\Models\Menu;
use App\Models\Slider;
use App\Models\Memberships;
use App\Models\BoardMembers;
use App\Models\KnowledgeHome;
use App\Models\Testimonials;
use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
// OR with multi
use Artesaos\SEOTools\Facades\JsonLdMulti;

// OR use only single facades 

use Artesaos\SEOTools\Facades\SEOTools;
class Homepage extends Component
{

    public $menus;
    public $sliders;
    public $memberships ,$boardmembers, $knowledgeHome ,
            $testimonials, $seo_keywords;

public function mount(){
    SEOTools::setTitle('Pinegrow school | Home');
    SEOTools::setDescription('This is my page description of Pinegrow school');
    SEOTools::opengraph()->setUrl('https://pinegroveschool.org/pinegrove/');
    SEOTools::setCanonical('https://pinegroveschool.org/pinegrove/');
    SEOTools::opengraph()->addProperty('type', 'website');
    SEOTools::twitter()->setSite('Pinegrow school');
    SEOTools::jsonLd()->addImage('https://pinegroveschool.org/pinegrove/public/assets/images/logo.png');
    $this->seo_keywords ="keyword1  keyword2 keyword3";

    
    
}


    public function render()
    {
       $this->menus = Menu::orderBy('sort_id','asc')->where('status','Active')->take(9)->get();	
       $this->sliders = Slider::orderBy('sort_id','asc')->where('status','Active')->get();	
       $this->memberships =  Memberships::orderBy('sort_id' ,'asc')->where('status','Active')->get(); 
       $this->boardmembers =  BoardMembers::orderBy('sort_id' ,'asc')->where('status','Active')->get(); 
      
       $this->knowledgeHome =  KnowledgeHome::orderBy('sort_id' ,'asc')->where('status','Active')->get(); 
       
    $this->testimonials =  Testimonials::orderBy('sort_id' ,'asc')->where('status','Active')->get(); 

        return view('livewire.frontend.home.homepage')->layout('layouts.frontend');
    }
}
