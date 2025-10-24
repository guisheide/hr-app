<?php

namespace App\Livewire\Admin\Companies;

use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;

    public $company;

    public $logo;

    public function mount()
    {
        $this->company = new \App\Models\Company();
    }

    public function rules()
    {
        return [
            'company.name' => 'required|string|max:255',
            'company.email' => 'required|email|max:255',
            'company.website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // 2048 KB = 2 MB
        ];
    }

    public function save()
    {
        $this->validate();
        if ($this->logo) {
            $logoPath = $this->logo->store('logos', 'public');
            $this->company->logo = $logoPath;
        }
        $this->company->save();
        session()->flash('message', 'Company created successfully.');
        return redirect()->route('admin.companies.index');
    }

    public function render()
    {
        return view('livewire.admin.companies.create');
    }
}
