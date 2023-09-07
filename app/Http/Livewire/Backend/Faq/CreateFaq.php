<?php

namespace App\Http\Livewire\Backend\Faq;

use App\Models\FaqCategory;
use App\Models\FaqData;
use Livewire\Component;

class CreateFaq extends Component
{

    public $faq_categories_id;
    public $question;
    public $answer;
    public $sort_id;
    public $status;
    public $ip_address;
    public $login;
    public $faqData;

    public $search;
 
    protected $queryString = ['search'];

    public function mount($faqData = null)
    {
        $this->faqData = $faqData;
        if ($this->faqData) {
            $faqData = FaqData::findOrFail($this->faqData);
            $this->faq_categories_id = $faqData->faq_categories_id;
            $this->question = $faqData->question;
            $this->answer = $faqData->answer;
            $this->sort_id = $faqData->sort_id;
            $this->status = $faqData->status;
            $this->ip_address = $faqData->ip_address;
            $this->login = $faqData->login;
        }
    }
    public function createFaq(){
                // Validate the data
                $this->validate([
                    'faq_categories_id' => 'required',
                    'question' => 'required',
                    'answer' => 'required',
                    'sort_id' => 'required',
          
                ]);

                if ($this->faqData) {
                    $faqstore = FaqData::findOrFail($this->faqData);
                } else {
                    $faqstore = new FaqData();
                }
                $faqstore->faq_categories_id =  $this->faq_categories_id;
                $faqstore->question = $this->question;
                $faqstore->answer = $this->answer;
                $faqstore->sort_id =  $this->sort_id ?? Null;
                $faqstore->status =  "Active";
                $faqstore->ip_address =   getUserIp();
                $faqstore->login =  authUserId();
                $faqstore->save();
            // Create a new FAQ data record
                session()->flash('success', 'Faq saved successfully!');
                $this->resetForm();
    }

 
    public function render()
    {
                 $faqDataList = FaqData::where('question', 'like', '%'.$this->search.'%')->get();
                 $faqCategory = FaqCategory::orderBy('name')->get();
                return view('livewire.backend.faq.create-faq',['faqCategory' => $faqCategory ,'faqDataList' => $faqDataList] )->layout('layouts.backend');
    
    }
    public function editFaq($faqId)
    {
        $this->mount($faqId);
    }
    private function resetForm()
    {
        // Clear the form fields
        $this->faq_categories_id = '';
        $this->question = '';
        $this->answer = '';
        $this->sort_id = '';
        $this->status = '';
  
    }


    public function delete($id)
    {
        $faq = FaqData::findOrFail($id);
        $faq->delete();
        session()->flash('success', 'Data deleted successfully!');
    }
}
