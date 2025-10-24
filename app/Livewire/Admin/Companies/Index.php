<?php

namespace App\Livewire\Admin\Companies;

use App\Models\Company;
use Livewire\Component;

class Index extends Component
{
    public function delete ($id){
        $company = Company::find($id);
        if($company){
            $company->delete();
            session()->flash('message', 'Company deleted successfully.');
        }
    }

    public function render()
    {
        return view('livewire.admin.companies.index', [
            'companies' => Company::latest()->paginate(10),
        ]);
    }
}
