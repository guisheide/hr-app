<?php

namespace App\Livewire\Admin\Companies;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;


class Edit extends Component
{
    
    use WithFileUploads;

    public $company;

    public $logo;

    public function mount($id)
    {
        $this->company = Company::find($id);
    }

    public function rules()
    {
        return [
            'company.name' => 'required|string|max:255',
            'company.email' => 'required|email|max:255',
            'company.website' => 'nullable|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // 2048 KB = 2 MB
        ];
    }

    public function save()
    {
        $this->validate();
        $this->company->save();
        session()->flash('message', 'Company edited successfully.');
        return redirect()->route('companies.index');
    }

    public function render()
    {
        return view('livewire.admin.companies.edit');
    }
}
