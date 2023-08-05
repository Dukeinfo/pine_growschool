<?php

namespace App\Http\Livewire\Backend\Footer;

use App\Models\SocialApp;
use Livewire\Component;
use Livewire\WithFileUploads;

class SocialAppsManager extends Component
{
    use WithFileUploads;

    public $name;
    public $link;
    public $logo;
    public $icon; // Add the icon field
    public $selectedId;
    public $isEditing = false;

    protected $rules = [
        'name' => 'required|string',
        'link' => 'required|url',
        // 'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        // 'icon' => 'nullable|string|max:255',
    ];
    public function render()
    {
        $socialApps = SocialApp::all();
        return view('livewire.backend.footer.social-apps-manager',compact('socialApps'))->layout('layouts.backend');
        }

        public function create()
        {
            $this->resetValidation();
            $this->resetFields();
            $this->isEditing = false;
        }

        
    public function store()
    {
        $this->validate();

        if ($this->logo) {
            $logoPath = $this->logo->store('logos', 'public');
        }

        SocialApp::create([
            'name' => $this->name,
            'link' => $this->link,
            'icon' => $this->icon, 
            'logo' => isset($logoPath) ? $logoPath : null,
        ]);

        $this->resetFields();
        session()->flash('success', 'Social app created successfully!');
    }

    public function edit($id)
    {
        $socialApp = SocialApp::findOrFail($id);

        $this->selectedId = $socialApp->id;
        $this->name = $socialApp->name;
        $this->link = $socialApp->link;
        $this->icon = $socialApp->icon;
        $this->logo = null; // Clear the uploaded logo
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate();

        $socialApp = SocialApp::findOrFail($this->selectedId);

        $logoPath = null;
        if ($this->logo) {
            $logoPath = $this->logo->store('logos', 'public');
        }

        $socialApp->update([
            'name' => $this->name,
            'link' => $this->link,
            'icon' => $this->icon,

            'logo' => isset($logoPath) ? $logoPath : $socialApp->logo,
        ]);

        $this->resetFields();
        $this->isEditing = false;
        session()->flash('success', 'Social app updated successfully!');
    }

    public function delete($id)
    {
        $socialApp = SocialApp::findOrFail($id);
        $socialApp->delete();
        session()->flash('success', 'Social app deleted successfully!');
    }

    private function resetFields()
    {
        $this->name = '';
        $this->link = '';
        $this->logo = null;
        $this->icon = '';

    }
}
