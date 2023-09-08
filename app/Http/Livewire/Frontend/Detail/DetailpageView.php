<?php

namespace App\Http\Livewire\Frontend\Detail;

use Livewire\Component;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\CreatePage;
use Illuminate\Support\Facades\Crypt;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;

class DetailpageView extends Component
{
    public $pageId, $slug, $heading, $desc ,$image ,$display_name ,$name; 
    public $seotitle ,$seo_description  ,$seo_keywords , $url_link ,$backimage ,$submenuId;

    public function mount($page_id , $slug)
    {
        try {
        // $id = decrypt($encrypted_id);
        $id = $page_id;
 
        // Retrieve the item based on the ID
        $pageData = CreatePage::with(['SubMenu'])->findOrFail($id);
        if ($pageData->SubMenu->status === 'Inactive' ||  !$pageData || $pageData->status === 'Inactive' || $pageData->SubMenu->cms === "No"  ) {
            abort(404);
        }
            $this->pageId = $pageData->id;
            $this->slug = $pageData->slug;
            $this->heading = $pageData->heading;
            $this->backimage = $pageData->SubMenu->image;
            $this->submenuId = $pageData->SubMenu->id;

            $this->image = $pageData->image;
            $this->desc = $pageData->description;
            $this->url_link = $pageData->SubMenu->url_link;
            $this->display_name = $pageData->SubMenu->display_name;
            $this->name = $pageData->SubMenu->name;
            
            $this->seotitle = $pageData->SubMenu->seo_title;
            $this->seo_description = $pageData->SubMenu->seo_description;
            $this->seo_keywords = $pageData->SubMenu->seo_keywords ?? '';
            SEOTools::setTitle($this->seotitle  ?? 'Gallery Detail');
            SEOTools::setDescription( $this->seo_description ?? '');
            
            SEOTools::opengraph()->setUrl(url()->current());
            SEOTools::setCanonical( url()->current() ?? '');
            SEOTools::opengraph()->addProperty('type', 'website');
            SEOTools::twitter()->setSite($this->seotitle ?? '');
            SEOTools::jsonLd()->addImage('https://pinegroveschool.org/pinegrove/public/assets/images/logo.png');
            $keywords = $pageData->SubMenu->seo_keywords ?? '';
            SEOMeta::addKeyword( $keywords); //pluck returns the array of product keywords here
            // if ($this->slug !== $slug) {
        //     return redirect()->to(route('detail_page', ['item' => $this->pageId, 'slug' => $this->slug]));
        // }
    } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
        abort(404); // Redirect to a 404 error page if decryption fails
    }
   

    }
public function render()
    {
        $getpageData = CreatePage::with(['SubMenu'])->where('submenu_id',$this->submenuId)->orderby('sort_id')->get();
        return view('livewire.frontend.detail.detailpage-view' ,['getpageData' => $getpageData])->layout('layouts.frontend');
    }
}
