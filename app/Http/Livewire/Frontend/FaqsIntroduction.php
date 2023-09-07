<?php

namespace App\Http\Livewire\Frontend;

use App\Models\FaqCategory;
use App\Models\FaqData;
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
   public $faqDataId;
   public $faqCatName;


public function mount($id , $slug)
{
    try {
    // $id = decrypt($encrypted_id);
    $faqid = $id;

    // Retrieve the item based on the ID
    $getFaqCategory =   FaqCategory::findOrFail($faqid);
    $this->faqDataId = $getFaqCategory->id;
    $this->faqCatName = $getFaqCategory->name; 
    if ($getFaqCategory->status === 'Inactive'   ) {
        abort(404);
    }

} catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
    abort(404); // Redirect to a 404 error page if decryption fails
}


}


    public function render()
    {

        $faqpageData = FaqData::with(['getfaqcat'])->where('faq_categories_id' , $this->faqDataId)->get();

        return view('livewire.frontend.faqs-introduction' ,['faqpageData' => $faqpageData])->layout('layouts.frontend');;
    }
}
