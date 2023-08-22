<?php

namespace App\Http\Livewire\Backend\Footer;

use Livewire\Component;
use App\Models\SocialApp;

class TrashSocialAppsManager extends Component
{
    public function render()
    {
       $this->socialApps = SocialApp::onlyTrashed()->orderBy('sort_id','asc')->get();
        return view('livewire.backend.footer.trash-social-apps-manager')->layout('layouts.backend');
    }

    public function restore($id){
      $socialApp = SocialApp::withTrashed()->findOrFail($id);
      if(!is_null($socialApp)){
        $socialApp->restore();
      }

       return redirect()->route('social_view');
    }
}
