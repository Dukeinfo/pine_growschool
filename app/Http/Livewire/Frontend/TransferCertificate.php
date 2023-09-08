<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\TransferCertificate as appTransferCertificate;
use Illuminate\Support\Facades\Storage;
use Response;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Models\Metadetails;
use App\Models\PageContent;
use Illuminate\Support\Facades\Route;
class TransferCertificate extends Component
{
    public $search,$records ,$pageData ;


 
    protected $queryString = ['search'];
    public function searchresult(){
                $this->validate(
                    [  'search' => 'required', ],
                    [ 'search.required' => 'Addmission Number field required',  ]
                );
    	
    	$this->records = appTransferCertificate::where('admission_no', $this->search)->get();
    	
    }

     public function download($id){
       $getDownload = appTransferCertificate::where('id', $id)->first();
       $path =  Storage::path('public/uploads/document/'. $getDownload->file);
       return response()->download($path);

   } 

        public function mount(){
            $getRouteName =  Route::currentRouteName(); 
            if($getRouteName){
                $seoMetaData =  Metadetails::where('name',$getRouteName )->first();
                SEOTools::setTitle($seoMetaData->title ?? 'Transfer Certificate');
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
        return view('livewire.frontend.transfer-certificate' , [
            'records' => appTransferCertificate::where('admission_no', 'like', '%'.$this->search.'%')->get(),
        ])->layout('layouts.frontend');
    }
}
