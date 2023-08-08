<?php

namespace App\Http\Livewire\Frontend\Detail;

use Livewire\Component;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\CreatePage;
use Illuminate\Support\Facades\Crypt;
use Artesaos\SEOTools\Facades\SEOTools;
class DetailpageView extends Component
{
    public $pageId, $slug, $heading, $desc;
    public $seotitle ,$seo_description  ,$seo_keywords , $url_link;

    public function mount($page_id , $slug)
    {
        try {
        // $id = decrypt($encrypted_id);
        $id = $page_id;

        // Retrieve the item based on the ID
        $pageData = CreatePage::with(['SubMenu'])->findOrFail($id);

            $this->pageId = $pageData->id;
            $this->slug = $pageData->slug;
            $this->heading = $pageData->heading;
            $this->desc = $pageData->description;
            $this->url_link = $pageData->url_link;
            $this->seotitle = $pageData->SubMenu->seo_title;
            $this->seo_description = $pageData->SubMenu->seo_description;
            $this->seo_keywords = $pageData->SubMenu->seo_keywords ?? '';
            SEOTools::setTitle($this->seotitle );
            SEOTools::setDescription( $this->seo_description);
            SEOTools::opengraph()->setUrl(url()->current());
            SEOTools::setCanonical( url()->current() ?? '');
            SEOTools::opengraph()->addProperty('type', 'website');
            SEOTools::twitter()->setSite($this->seotitle);
            SEOTools::jsonLd()->addImage('https://pinegroveschool.org/pinegrove/public/assets/images/logo.png');
        // if ($this->slug !== $slug) {
        //     return redirect()->to(route('detail_page', ['item' => $this->pageId, 'slug' => $this->slug]));
        // }
    } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
        abort(404); // Redirect to a 404 error page if decryption fails
    }
   

    }
public function render()
    {
        return view('livewire.frontend.detail.detailpage-view')->layout('layouts.frontend');
    }
}
