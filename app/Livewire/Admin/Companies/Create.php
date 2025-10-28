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
            'company.website' => 'nullable|max:255', // 2048 KB = 2 MB
        ];
    }

    public function save()
    {
        $this->validate();
        $this->company->save();
        session()->flash('message', 'Company created successfully.');
        return redirect()->route('companies.index');
    }

    public function render()
    {
        return view('livewire.admin.companies.create');
    }
}
