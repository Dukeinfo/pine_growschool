<?php

namespace App\Http\Livewire\Frontend\Detail;

use Livewire\Component;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\CreatePage;
use Illuminate\Support\Facades\Crypt;

class DetailpageView extends Component
{
    public $pageId, $slug, $heading, $desc;

    public function mount($encrypted_id , $slug)
    {

        try {
       
        $id = decrypt($encrypted_id);
        // Retrieve the item based on the ID
        $pageData = CreatePage::with(['SubMenu'])->findOrFail($id);
        $this->pageId = $pageData->id;
        $this->slug = $pageData->slug;
        $this->heading = $pageData->heading;
        $this->desc = $pageData->description;

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
