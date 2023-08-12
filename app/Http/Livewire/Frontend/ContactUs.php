<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Metadetails;

use App\Models\ContactUs as ModelsContactUs;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Mail\ContactUsMail;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
// OR with multi
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Illuminate\Support\Facades\Route;
// OR use only single facades 

use Artesaos\SEOTools\Facades\SEOTools;
class ContactUs extends Component
{
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $message;


   public $seo_keywords;

   public function mount(){
    $getRouteName =  Route::currentRouteName(); 
    $seoMetaData =  Metadetails::where('name',$getRouteName )->first();
    if($seoMetaData){
        
    SEOTools::setTitle($seoMetaData->title ?? 'Contact us');
    SEOTools::setDescription($seoMetaData->description ?? '');
    SEOTools::opengraph()->setUrl(url()->current());
    SEOTools::setCanonical(url()->current());
    SEOTools::opengraph()->addProperty('type', 'website');
    SEOTools::twitter()->setSite($seoMetaData->title ?? '');
    $keywords = $seoMetaData->keywords;
    SEOMeta::addKeyword( $keywords);
}
}

    public function render()
    {
        return view('livewire.frontend.contact-us')->layout('layouts.frontend');;
    }

    public function send()
    {
        $validatedData =    $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        ModelsContactUs::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->message,
            'ip_address' => getUserIp(),

            
        ]);
// Send email only when validation and database entry are successful
if (empty($this->getErrorBag()->messages())) {
      
        // Send email
        Mail::to('info@juriskart.com')->send(new ContactUsMail([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->message,
            'ip_address' => getUserIp(),

        ]));
    }

    session()->flash('success', 'Your message has been sent successfully.');
    $this->resetForm();
    return redirect()->route('homepage');
    }

    private function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->subject = '';
        $this->message = '';
    }
}
